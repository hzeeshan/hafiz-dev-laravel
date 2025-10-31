<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        // Get tag filter if present
        $tag = $request->get('tag');

        // Redirect /blog?page=1 to /blog to avoid duplicate content
        if ($request->has('page') && $request->get('page') == 1) {
            return redirect()->route('blog.index', $request->except('page'), 301);
        }

        // Build query
        $query = Post::published()->orderBy('published_at', 'desc');

        // Filter by tag if provided
        if ($tag) {
            $query->whereJsonContains('tags', $tag);
        }

        $posts = $query->paginate(12);

        return view('blog.index', [
            'posts' => $posts,
            'activeTag' => $tag,
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
