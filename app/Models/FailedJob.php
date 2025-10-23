<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class FailedJob extends Model
{
    protected $table = 'failed_jobs';

    public $timestamps = false;

    protected $fillable = [
        'uuid',
        'connection',
        'queue',
        'payload',
        'exception',
        'failed_at',
    ];

    protected $casts = [
        'failed_at' => 'datetime',
    ];

    /**
     * Get the job class name from the payload
     */
    public function getJobClass(): string
    {
        $payload = $this->getDecodedPayload();
        $displayName = $payload['displayName'] ?? 'Unknown Job';

        // Extract just the class name (e.g., "GenerateBlogPostJob" from full namespace)
        if (str_contains($displayName, '\\')) {
            return class_basename($displayName);
        }

        return $displayName;
    }

    /**
     * Get the full job class name with namespace
     */
    public function getFullJobClass(): string
    {
        $payload = $this->getDecodedPayload();
        return $payload['displayName'] ?? 'Unknown Job';
    }

    /**
     * Get the decoded payload as array
     */
    public function getDecodedPayload(): array
    {
        if (empty($this->payload)) {
            return [];
        }

        try {
            return json_decode($this->payload, true) ?? [];
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get BlogTopic ID if this is a GenerateBlogPostJob
     */
    public function getBlogTopicId(): ?int
    {
        $payload = $this->getDecodedPayload();

        // The job data is serialized inside the payload
        $command = $payload['data']['command'] ?? null;

        if (!$command) {
            return null;
        }

        // Try to extract topic ID from serialized command
        // Laravel serializes objects, so we need to unserialize
        try {
            $job = unserialize($command);

            if (method_exists($job, '__get') && isset($job->topic)) {
                return $job->topic->id ?? null;
            }

            // Try reflection as fallback
            if (property_exists($job, 'topic')) {
                $reflection = new \ReflectionClass($job);
                $property = $reflection->getProperty('topic');
                $property->setAccessible(true);
                $topic = $property->getValue($job);
                return $topic->id ?? null;
            }
        } catch (\Exception $e) {
            // Serialization failed, return null
        }

        return null;
    }

    /**
     * Get related BlogTopic if applicable
     */
    public function blogTopic(): ?\App\Models\BlogTopic
    {
        $topicId = $this->getBlogTopicId();

        if (!$topicId) {
            return null;
        }

        return BlogTopic::find($topicId);
    }

    /**
     * Get a readable, truncated exception message
     */
    public function getExceptionPreview(int $length = 150): string
    {
        if (empty($this->exception)) {
            return 'No exception message';
        }

        // Get first line of exception
        $firstLine = strtok($this->exception, "\n");

        if (strlen($firstLine) > $length) {
            return substr($firstLine, 0, $length) . '...';
        }

        return $firstLine;
    }

    /**
     * Get formatted exception for display
     */
    public function getFormattedException(): string
    {
        return $this->exception ?? 'No exception details available';
    }

    /**
     * Check if this is a blog generation job
     */
    public function isBlogGenerationJob(): bool
    {
        return str_contains($this->getJobClass(), 'GenerateBlogPost');
    }

    /**
     * Check if this is a publishing job
     */
    public function isPublishingJob(): bool
    {
        $jobClass = $this->getJobClass();
        return str_contains($jobClass, 'PublishTo');
    }

    /**
     * Get a user-friendly job type label
     */
    public function getJobTypeLabel(): string
    {
        $jobClass = $this->getJobClass();

        return match (true) {
            str_contains($jobClass, 'GenerateBlogPost') => 'Blog Generation',
            str_contains($jobClass, 'PublishToDevTo') => 'Dev.to Publishing',
            str_contains($jobClass, 'PublishToHashnode') => 'Hashnode Publishing',
            default => 'Other Job',
        };
    }

    /**
     * Get formatted job data for display
     */
    public function getFormattedJobData(): array
    {
        $payload = $this->getDecodedPayload();
        $topic = $this->blogTopic();

        return [
            'job_class' => $this->getJobClass(),
            'full_class' => $this->getFullJobClass(),
            'queue' => $this->queue,
            'connection' => $this->connection,
            'uuid' => $this->uuid,
            'failed_at' => $this->failed_at,
            'topic_id' => $this->getBlogTopicId(),
            'topic_title' => $topic?->title,
            'job_type' => $this->getJobTypeLabel(),
        ];
    }

    /**
     * Retry this failed job
     */
    public function retry(): void
    {
        \Artisan::call('queue:retry', ['id' => $this->uuid]);
    }

    /**
     * Retry all failed jobs
     */
    public static function retryAll(): void
    {
        \Artisan::call('queue:retry', ['id' => 'all']);
    }
}
