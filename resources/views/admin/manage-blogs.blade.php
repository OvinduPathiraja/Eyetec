@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex justify-between items-center mb-6">
        <div>
            <h1 class="text-2xl font-bold">Manage Blogs</h1>
            <p class="text-sm text-gray-500">Create, update and manage blog posts</p>
        </div>

        <a href="{{ route('admin.blogs.create') }}"
            class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-semibold">
            + Add Blog
        </a>
    </div>

    <div class="bg-white rounded-xl shadow overflow-x-auto">
        <table class="w-full text-sm">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3">Image</th>
                    <th class="p-3">Title</th>
                    <th class="p-3">Author</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Published</th>
                    <th class="p-3">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($blogs as $blog)
                <tr class="border-b">
                    <td class="p-3">
                        <img src="{{ $blog->image ? asset($blog->image) : asset('images/placeholder.png') }}"
                            class="w-16 h-16 object-contain rounded">
                    </td>
                    <td class="p-3 font-semibold">{{ $blog->title }}</td>
                    <td class="p-3">{{ $blog->author }}</td>
                    <td class="p-3">
                        <span class="px-2 py-1 rounded text-xs text-white
                            {{ $blog->is_published ? 'bg-green-600' : 'bg-gray-500' }}">
                            {{ $blog->is_published ? 'Published' : 'Draft' }}
                        </span>
                    </td>
                    <td class="p-3 text-sm text-gray-600">
                        {{ $blog->published_at ? $blog->published_at->format('M d, Y') : 'N/A' }}
                    </td>
                    <td class="pt-6 p-3 flex gap-2">
                        <a href="{{ route('admin.blogs.edit', $blog) }}" class="border px-3 py-1 rounded">
                            Edit
                        </a>
                        <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}">
                            @csrf @method('DELETE')
                            <button class="border border-red-600 text-red-600 px-3 py-1 rounded">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="p-4 text-center text-gray-500">
                        No blogs found
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection