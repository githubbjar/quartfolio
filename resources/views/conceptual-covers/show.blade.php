<x-layout :title="$project->title . ' (Book ' .  ucfirst($project->type) . ') | Quartfolio'">

    <x-hero />
    
    <x-section.art-layout bg="graphics-bg" class="relative">


        <div class="mt-6">
        <div class="grid grid-cols-[1fr_2fr_1fr] gap-6 md:max-w-3xl mx-auto mt-5">
            <div>
                @if ($previous)
                <a class="btn-sm relative w-8 md:w-12 h-8 md:h-12 p-1 mt-3 box-content flex items-center justify-center group bg-black hover:bg-gray-700 ml-2 rounded-none" href="{{ $previous->slug }}">
                    <span class="sr-only">Previous</span>
                    <svg class="w-4 h-4 fill-current text-white dark:text-gray-400 group-hover:text-white" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.7 14.7l1.4-1.4L3.8 9H16V7H3.8l4.3-4.3-1.4-1.4L0 8z" />
                    </svg>
                </a>
                @endif
            </div>
            <div class="bg-white text-black p-4 w-fit mx-auto"
                style="clip-path: polygon(0 0, 100% 0, 98% 100%, 2% 96%);">

                <h1 class="tinos-regular text-center text-lg md:text-2xl font-bold leading-tight pb-2">
                    {{ $project->title }}
                </h1>

                @if($project->quarter && $project->year)
                <p class="tinos-regular leading-tight text-center text-sm md:text-md tracking-wide uppercase text-black">
                    Book {{ $project->type }} &#8212; {{ $project->quarter_label }} {{ $project->year }}
                </p>
                @endif

            </div>
            <div class="flex">
                 @if ($next)
                <a class="btn-sm relative w-8 md:w-12 h-8 md:h-12 p-1 mt-3 box-content flex items-center justify-center group bg-black hover:bg-gray-700 mr-2 rounded-none ml-auto" href="{{ $next->slug }}">
                    <span class="sr-only">Next</span>
                    <svg class="w-4 h-4 fill-current text-white dark:text-gray-400 group-hover:text-white" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                       <path d="M9.3 14.7l-1.4-1.4L12.2 9H0V7h12.2L7.9 2.7l1.4-1.4L16 8z" />
                    </svg>
                </a>
                @endif
            </div>
        </div>
        </div>


        <div
            class="max-w-sm mx-auto md:max-w-6xl
                opacity-0 scale-95
                animate-[fadeScale_0.6s_ease-out_0.2s_forwards]"
        >
            <img
                src="{{ $project->hero_url }}"
                alt="{{ $project->title }}"
                class="w-full h-auto"
            >
        </div>

        <p class="text-center text-sm uppercase tracking-widest text-gray-700 mb-4 mt-6 md:mt-2">
            Project Overview
        </p>

        <div class="mx-auto lg:max-w-2xl px-4 pb-10">
            <p class="tinos-regular text-center text-2xl font-bold leading-tight">
                {!! $project->description !!}
            </p>
            <div class="flex justify-center mt-12">
                <div
                    class="w-40 h-2.5 bg-black"
                    style="clip-path: polygon(8% 100%, 0% 100%, 6% 0%, 100% 20%, 100% 100%);"
                ></div>
            </div>
        </div>

       

        

    </x-section.layout>

    

</x-layout>