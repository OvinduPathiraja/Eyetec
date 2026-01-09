<x-guest-layout>
<div class="max-w-4xl mx-auto py-10">

    <a href="{{ route('blogs.index') }}"
       class="text-sm text-gray-500 hover:text-red-600">
        ← Back to Blogs
    </a>

    <h1 class="text-3xl font-bold mt-4">
        {{ $blog->title }}
    </h1>

    @if($blog->image)
        <div class="mt-4">
            <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="w-full max-h-96 object-cover rounded-lg">
        </div>
    @endif

    <p class="text-gray-600 mt-6 leading-relaxed">
        {{ $blog->content }}
    </p>

</div>
</x-guest-layout>
