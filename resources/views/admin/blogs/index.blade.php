@extends('layouts.admin')

@section('content')
<div class="max-w-7xl mx-auto py-10 px-4">

    <div class="flex justify-between mb-6">
        <h1 class="text-2xl font-bold">Manage Blogs</h1>

        <a href="{{ route('admin.blogs.create') }}"
            class="bg-red-600 text-white px-4 py-2 rounded">
            + New Blog
        </a>
    </div>

    <table class="w-full bg-white rounded shadow text-sm">
        <thead class="bg-gray-100">
            <tr>
                <th class="p-3">Image</th>
                <th class="p-3">Title</th>
                <th class="p-3">Status</th>
                <th class="p-3">Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($blogs as $blog)
            <tr class="border-t">
                <td class="p-3">
                    @if($blog->image)
                    <img src="{{ asset($blog->image) }}" alt="Blog image" class="h-12 w-16 object-cover rounded">
                    @else
                    <span class="text-gray-400">—</span>
                    @endif
                </td>
                <td class="p-3">{{ $blog->title }}</td>
                <td class="p-3">
                    {{ $blog->is_published ? 'Published' : 'Draft' }}
                </td>
                <td class="p-3 flex gap-3">
                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-blue-600">Edit</a>

                    <form method="POST" action="{{ route('admin.blogs.destroy', $blog) }}">
                        @csrf @method('DELETE')
                        <button class="text-red-600">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-6">
        {{ $blogs->links() }}
    </div>

</div>
@endsection