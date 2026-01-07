<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::orderByDesc('published_at')->paginate(10);
        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'status'  => 'required|in:published,draft',
            'image'   => 'nullable|image|max:2048',
        ]);

        $isPublished = $data['status'] === 'published';

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title'        => $data['title'],
            'content'      => $data['content'],
            'author'       => auth()->user()?->name,
            'is_published' => $isPublished,
            'published_at' => $isPublished ? now() : null,
            'image'        => $imagePath ? 'storage/' . $imagePath : null,
        ]);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog created');
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, Blog $blog)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'status'  => 'required|in:published,draft',
            'image'   => 'nullable|image|max:2048',
        ]);

        $isPublished = $data['status'] === 'published';

        // If moving from draft to published, set the published_at timestamp
        $publishedAt = $blog->published_at;
        if ($isPublished && !$blog->is_published) {
            $publishedAt = now();
        } elseif (!$isPublished) {
            $publishedAt = null;
        }

        $payload = [
            'title'        => $data['title'],
            'content'      => $data['content'],
            'is_published' => $isPublished,
            'published_at' => $publishedAt,
        ];

        if ($request->hasFile('image')) {
            if ($blog->image && file_exists(public_path($blog->image))) {
                @unlink(public_path($blog->image));
            }
            $path = $request->file('image')->store('blogs', 'public');
            $payload['image'] = 'storage/' . $path;
        }

        $blog->update($payload);

        return redirect()->route('admin.blogs.index')
            ->with('success', 'Blog updated');
    }

    public function destroy(Blog $blog)
    {
        $blog->delete();

        return back()->with('success', 'Blog deleted');
    }
}
