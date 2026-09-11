<x-app-layout>
    <x-slot name="header">
        <h2 class="font-doodle text-2xl">
            {{ $project->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="doodle-card p-6">

                @if ($project->images->count())
                    <div class="grid grid-cols-2 gap-3 mb-6">
                        @foreach ($project->images as $image)
                            <img src="{{ Storage::url($image->path) }}"
                                 class="w-full h-48 object-cover rounded-lg border-2 border-[#2E2A24]">
                        @endforeach
                    </div>
                @endif

                <p class="mb-6">{{ $project->description }}</p>

                @if ($project->tags->count())
                    <div class="flex flex-wrap gap-2 mb-6">
                        @foreach ($project->tags as $tag)
                            <span class="px-3 py-1 doodle-btn text-sm bg-[#FFC94D]">{{ $tag->name }}</span>
                        @endforeach
                    </div>
                @endif

                @auth
                    <div class="flex gap-3">
                        <a href="{{ route('projects.edit', $project) }}"
                           class="doodle-btn px-4 py-2 bg-[#6EC6FF] font-doodle">
                            Edit
                        </a>

                        <form method="POST" action="{{ route('projects.destroy', $project) }}"
                              x-data="{ confirmName: '' }"
                              onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <div class="flex gap-2 items-center">
                                <input type="text" x-model="confirmName"
                                       placeholder="Type '{{ $project->title }}' to confirm"
                                       class="doodle-btn px-3 py-1 bg-[#FFFDF8] text-sm">
                                <button type="submit"
                                        class="doodle-btn px-4 py-2 bg-[#FF6F59] font-doodle"
                                        :disabled="confirmName !== '{{ $project->title }}'"
                                        :class="confirmName !== '{{ $project->title }}' ? 'opacity-40 cursor-not-allowed' : ''">
                                    Delete
                                </button>
                            </div>
                        </form>
                    </div>
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
