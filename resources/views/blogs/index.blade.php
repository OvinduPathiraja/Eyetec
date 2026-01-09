<x-guest-layout>
<div class="max-w-6xl mx-auto py-10">

    <h1 class="text-3xl font-bold mb-6">Blog</h1>

    @forelse($blogs as $blog)
        <div class="bg-white p-6 rounded shadow mb-4 grid md:grid-cols-[160px,1fr] gap-4">
            <div>
                @if($blog->image)
                    <img src="{{ asset($blog->image) }}" alt="{{ $blog->title }}" class="h-32 w-full object-cover rounded">
                @else
                    <div class="h-32 w-full bg-gray-100 rounded flex items-center justify-center text-gray-400 text-sm">
                        No image
                    </div>
                @endif
            </div>
            <div>
                <h2 class="text-xl font-bold">
                    <a href="{{ route('blogs.show', $blog->id) }}"
                       class="hover:text-red-600">
                        {{ $blog->title }}
                    </a>
                </h2>

                <p class="text-gray-600 mt-2">
                    {{ \Illuminate\Support\Str::limit($blog->content, 150) }}
                </p>
            </div>
        </div>
    @empty
        <p class="text-gray-500">No blogs available.</p>
    @endforelse

</div>
</x-guest-layout>
