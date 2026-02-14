<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ToolFeedback extends Model
{
    protected $table = 'tool_feedback';

    protected $fillable = [
        'tool_slug',
        'type',
        'message',
        'email',
        'url',
        'user_agent',
        'ip_address',
    ];

    protected $casts = [
        'is_resolved' => 'boolean',
    ];
}
