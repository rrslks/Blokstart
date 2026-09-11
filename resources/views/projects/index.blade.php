<x-app-layout>
    <x-slot name="header">
        <h2 class="font-doodle text-2xl">
            My Projects
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Tag filters -->
            <div class="mb-6 flex flex-wrap gap-2">
                <a href="{{ route('projects.index') }}"
                   class="px-3 py-1 doodle-btn text-sm {{ !request('tag') ? 'bg-[#FFC94D]' : 'bg-[#FFFDF8]' }}">
                    All
                </a>
                @foreach ($tags as $tag)
                    <a href="{{ route('projects.index', ['tag' => $tag->name]) }}"
                       class="px-3 py-1 doodle-btn text-sm {{ request('tag') === $tag->name ? 'bg-[#FFC94D]' : 'bg-[#FFFDF8]' }}">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </div>

            @auth
                <a href="{{ route('projects.create') }}" class="inline-block mb-6 px-4 py-2 doodle-btn bg-[#7CB342] text-black font-doodle">
                    + Add Project
                </a>
            @endauth

            <!-- Project grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse ($projects as $project)
                    <a href="{{ route('projects.show', $project) }}" class="doodle-card p-4">
                        @if ($project->images->first())
                            <img src="{{ Storage::url($project->images->first()->path) }}"
                                 class="w-full h-40 object-cover rounded-lg mb-3 border-2 border-[#2E2A24]">
                        @endif
                        <h3 class="text-lg font-doodle">{{ $project->title }}</h3>
                        <p class="text-sm mt-1 line-clamp-2">{{ $project->description }}</p>
                    </a>
                @empty
                    <p class="font-doodle text-lg">No projects yet — add your first one!</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>
