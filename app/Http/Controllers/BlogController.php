<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    /**
     * Public blog listing
     */
    public function index()
    {
        try {
            $blogs = Blog::where('is_published', true)
                ->orderByDesc('published_at')
                ->get();
        } catch (\Throwable $e) {
            // Graceful fallback if Mongo is unreachable/misconfigured
            return back()->with('error', 'Blog service is unavailable. Please try again later.');
        }

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show single blog
     */
    public function show($id)
    {
        try {
            $blog = Blog::where('_id', $id)
                ->where('is_published', true)
                ->firstOrFail();
        } catch (\Throwable $e) {
            abort(404);
        }

        return view('blogs.show', compact('blog'));
    }
}
