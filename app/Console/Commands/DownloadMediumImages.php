<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DownloadMediumImages extends Command
{
    protected $signature = 'download:medium-images {--post-id= : Download images for specific post only}';
    protected $description = 'Download Medium CDN images to local storage';

    public function handle()
    {
        // Ensure storage directory exists
        if (!Storage::disk('public')->exists('blog-images')) {
            Storage::disk('public')->makeDirectory('blog-images');
            $this->info('Created blog-images directory');
        }

        // Get posts with Medium images
        $query = Post::query();

        if ($this->option('post-id')) {
            $query->where('id', $this->option('post-id'));
        } else {
            // Only process posts with Medium CDN images
            $query->where('featured_image', 'like', '%cdn-images%medium.com%')
                  ->orWhere('content', 'like', '%cdn-images%medium.com%');
        }

        $posts = $query->get();

        if ($posts->isEmpty()) {
            $this->info('No posts with Medium images found');
            return 0;
        }

        $this->info("Processing {$posts->count()} posts...");
        $bar = $this->output->createProgressBar($posts->count());
        $bar->start();

        $downloadedCount = 0;
        $errorCount = 0;

        foreach ($posts as $post) {
            try {
                $updated = false;

                // Download featured image
                if ($post->featured_image && str_contains($post->featured_image, 'cdn-images')) {
                    $localPath = $this->downloadImage($post->featured_image, $post->slug);
                    if ($localPath) {
                        $post->featured_image = $localPath;
                        $updated = true;
                        $downloadedCount++;
                    }
                }

                // Download images in content
                $content = $post->content;
                preg_match_all('/!\[\]\((https:\/\/cdn-images[^)]+)\)/', $content, $matches);

                if (!empty($matches[1])) {
                    foreach ($matches[1] as $imageUrl) {
                        $localPath = $this->downloadImage($imageUrl, $post->slug);
                        if ($localPath) {
                            $content = str_replace($imageUrl, $localPath, $content);
                            $downloadedCount++;
                            $updated = true;
                        }
                    }
                    $post->content = $content;
                }

                if ($updated) {
                    $post->save();
                }
            } catch (\Exception $e) {
                $this->error("Error processing post {$post->id}: " . $e->getMessage());
                $errorCount++;
            }

            $bar->advance();
        }

        $bar->finish();
        $this->newLine(2);
        $this->info("Download complete!");
        $this->info("Images downloaded: {$downloadedCount}");
        if ($errorCount > 0) {
            $this->warn("Errors: {$errorCount}");
        }

        return 0;
    }

    protected function downloadImage($url, $slug)
    {
        try {
            // Generate unique filename
            $extension = pathinfo(parse_url($url, PHP_URL_PATH), PATHINFO_EXTENSION);
            if (empty($extension) || strlen($extension) > 4) {
                $extension = 'jpeg'; // Default to jpeg
            }

            $filename = $slug . '-' . Str::random(8) . '.' . $extension;
            $path = 'blog-images/' . $filename;

            // Download image with custom headers to bypass Medium restrictions
            $context = stream_context_create([
                'http' => [
                    'method' => 'GET',
                    'header' => "User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36\r\n" .
                                "Accept: image/webp,image/apng,image/*,*/*;q=0.8\r\n" .
                                "Referer: https://medium.com/\r\n"
                ],
                'ssl' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ]
            ]);

            $imageData = @file_get_contents($url, false, $context);

            if ($imageData === false) {
                $this->warn("Failed to download: {$url}");
                return null;
            }

            // Save to storage
            Storage::disk('public')->put($path, $imageData);

            // Return relative path (consistent with Filament uploads)
            return $path;

        } catch (\Exception $e) {
            $this->warn("Error downloading {$url}: " . $e->getMessage());
            return null;
        }
    }
}
