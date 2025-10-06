<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::published()
            ->orderBy('published_at', 'desc')
            ->paginate(12);

        return view('blog.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        // Only show published posts
        if ($post->status !== 'published' ||
            ($post->published_at && $post->published_at->isFuture())) {
            abort(404);
        }

        // Increment view count
        $post->increment('views');

        // Get related posts (same tags)
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where(function ($query) use ($post) {
                foreach ($post->tags ?? [] as $tag) {
                    $query->orWhereJsonContains('tags', $tag);
                }
            })
            ->limit(3)
            ->get();

        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
        ]);
    }

    public function trackView(Post $post)
    {
        $post->increment('views');
        return response()->json(['success' => true]);
    }
}
