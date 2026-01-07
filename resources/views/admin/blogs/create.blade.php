<x-app-layout>
<div class="max-w-4xl mx-auto py-10">

<form method="POST"
      enctype="multipart/form-data"
      action="{{ isset($blog)
        ? route('admin.blogs.update',$blog)
        : route('admin.blogs.store') }}">

@csrf
@if(isset($blog)) @method('PUT') @endif

<input name="title" placeholder="Title"
       class="w-full border p-2 mb-4"
       value="{{ $blog->title ?? '' }}">

<textarea name="content"
          class="w-full border p-2 h-40 mb-4">
{{ $blog->content ?? '' }}
</textarea>

<select name="status" class="border p-2 mb-4">
    <option value="published" {{ ($blog->is_published ?? true) ? 'selected' : '' }}>Published</option>
    <option value="draft" {{ isset($blog) && !$blog->is_published ? 'selected' : '' }}>Draft</option>
</select>

<div class="mb-4">
    <label class="block text-sm font-semibold mb-1">Image</label>
    <input type="file" name="image" class="border p-2 w-full">
    @if(!empty($blog?->image))
        <div class="mt-2">
            <img src="{{ asset($blog->image) }}" alt="Blog image" class="h-24 rounded">
        </div>
    @endif
</div>

<button class="bg-red-600 text-white px-6 py-2 rounded mt-4">
Save
</button>

</form>

</div>
</x-app-layout>
