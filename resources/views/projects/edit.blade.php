<x-app-layout>
    <x-slot name="header">
        <h2 class="font-doodle text-2xl">
            Edit Project
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="doodle-card p-6">

                <form method="POST" action="{{ route('projects.update', $project) }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label for="title" class="block font-doodle text-lg mb-1">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $project->title) }}"
                               class="w-full doodle-btn px-3 py-2 bg-[#FFFDF8]">
                        @error('title')
                            <p class="text-[#FF6F59] text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block font-doodle text-lg mb-1">Description</label>
                        <textarea name="description" id="description" rows="5"
                                  class="w-full doodle-btn px-3 py-2 bg-[#FFFDF8]">{{ old('description', $project->description) }}</textarea>
                        @error('description')
                            <p class="text-[#FF6F59] text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    @if ($project->images->count())
                        <div>
                            <label class="block font-doodle text-lg mb-1">Current Images</label>
                            <div class="grid grid-cols-3 gap-3">
                                @foreach ($project->images as $image)
                                    <img src="{{ Storage::url($image->path) }}"
                                         class="w-full h-24 object-cover rounded-lg border-2 border-[#2E2A24]">
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <div>
                        <label for="images" class="block font-doodle text-lg mb-1">Add More Images</label>
                        <input type="file" name="images[]" id="images" multiple accept="image/*"
                               class="w-full doodle-btn px-3 py-2 bg-[#FFFDF8]">
                        @error('images.*')
                            <p class="text-[#FF6F59] text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block font-doodle text-lg mb-1">Tags</label>
                        <div class="flex flex-wrap gap-3">
                            @foreach ($tags as $tag)
                                <label class="flex items-center gap-1 doodle-btn px-3 py-1 bg-[#FFFDF8]">
                                    <input type="checkbox" name="tags[]" value="{{ $tag->id }}"
                                           @checked($project->tags->contains($tag))>
                                    {{ $tag->name }}
                                </label>
                            @endforeach
                        </div>
                    </div>

                    <button type="submit" class="doodle-btn px-4 py-2 bg-[#7CB342] text-[#2E2A24] font-doodle">
                        Save Changes
                    </button>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
