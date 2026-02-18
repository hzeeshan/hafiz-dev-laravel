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
        if (
            $post->status !== 'published' ||
            ($post->published_at && $post->published_at->isFuture())
        ) {
            abort(404);
        }

        $post->increment('views');

        $tags = $post->tags ?? [];

        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where(function ($query) use ($tags) {
                foreach ($tags as $tag) {
                    $query->orWhereJsonContains('tags', $tag);
                }
            })
            ->get()
            ->map(function ($related) use ($tags) {
                $related->relevance_score = count(array_intersect($tags, $related->tags ?? []));
                return $related;
            })
            ->sort(function ($a, $b) {
                $scoreCompare = $b->relevance_score <=> $a->relevance_score;
                if ($scoreCompare !== 0) return $scoreCompare;
                return $b->published_at <=> $a->published_at;
            })
            ->take(3)
            ->values();

        if ($relatedPosts->count() < 3) {
            $excludeIds = $relatedPosts->pluck('id')->push($post->id)->all();
            $fillCount = 3 - $relatedPosts->count();

            $fallbackPosts = Post::published()
                ->whereNotIn('id', $excludeIds)
                ->orderBy('published_at', 'desc')
                ->limit($fillCount)
                ->get();

            $relatedPosts = $relatedPosts->concat($fallbackPosts);
        }

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

    /**
     * Preview a post using its unique preview token.
     * Works for posts in any status (draft, review, published).
     * Does NOT increment view count.
     */
    public function preview(string $token)
    {
        // Find post by preview token
        $post = Post::where('preview_token', $token)->firstOrFail();

        // Get related posts (same tags, published only)
        $relatedPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->where(function ($query) use ($post) {
                foreach ($post->tags ?? [] as $tag) {
                    $query->orWhereJsonContains('tags', $tag);
                }
            })
            ->limit(3)
            ->get();

        // Use the same view as regular blog posts, but add a preview flag
        return view('blog.show', [
            'post' => $post,
            'relatedPosts' => $relatedPosts,
            'isPreview' => true, // So we can show a banner if needed
        ]);
    }
}
