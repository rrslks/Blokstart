<x-app-layout>
    <x-slot name="header">
        <h2 class="font-doodle text-2xl">
            About Me
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="doodle-card p-6">
                <div class="flex flex-col sm:flex-row gap-6 items-center sm:items-start">
                    <img src="https://via.placeholder.com/150"
                         class="w-32 h-32 object-cover rounded-full border-3 border-[#2E2A24]">

                    <div>
                        <h3 class="font-doodle text-2xl mb-2">Who am I?</h3>
                        <p class="mb-4">
                            Hey, my name is Rares Andrei Arhire, I am Romanian and i'm a student building this portfolio to showcase the projects
                            I've worked on. I study software engineering and I have a passion for web development, especially with Html and CSS.
                        </p>
                    </div>
                </div>
            </div>

            <div class="doodle-card p-6">
                <h3 class="font-doodle text-2xl mb-4">Skills & Tools</h3>

                <div class="grid grid-cols-3 sm:grid-cols-4 gap-4">
                    @php
                        $skills = [
                            ['name' => 'Laravel', 'icon' => 'https://cdn.simpleicons.org/laravel/FF2D20'],
                            ['name' => 'PHP', 'icon' => 'https://cdn.simpleicons.org/php/777BB4'],
                            ['name' => 'MySQL', 'icon' => 'https://cdn.simpleicons.org/mysql/4479A1'],
                            ['name' => 'JavaScript', 'icon' => 'https://cdn.simpleicons.org/javascript/F7DF1E'],
                            ['name' => 'HTML5', 'icon' => 'https://cdn.simpleicons.org/html5/E34F26'],
                            ['name' => 'CSS3', 'icon' => 'https://cdn.simpleicons.org/css3/1572B6'],
                            ['name' => 'Tailwind CSS', 'icon' => 'https://cdn.simpleicons.org/tailwindcss/06B6D4'],
                            ['name' => 'Git', 'icon' => 'https://cdn.simpleicons.org/git/F05032'],
                        ];
                    @endphp

                    @foreach ($skills as $skill)
                        <div class="flex flex-col items-center gap-2 doodle-btn p-3 bg-[#FFFDF8]">
                            <img src="{{ $skill['icon'] }}" alt="{{ $skill['name'] }}"
     class="w-10 h-10 object-contain" style="width: 60px; height: 60px;">
                            <span class="text-sm font-doodle">{{ $skill['name'] }}</span>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
