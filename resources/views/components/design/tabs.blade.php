<x-section.layout bg="graphics-bg">

    @if (session('success'))
        <div
            x-data="{ show: true }"
            x-show="show"
            x-transition
            class="max-w-xl mx-auto mb-4 flex items-center justify-between rounded-none text-white bg-red-900 px-4 py-3 text-white-800 border"
        >
            <span>{{ session('success') }}</span>

            <button @click="show = false" class="text-white hover:text-gray-600">
                ✕
            </button>
        </div>
        
    @endif

    <x-section.header>
        <x-section.title>Graphic Design</x-section.title>
        <x-section.subtitle>Twenty years in magazine and book publishing creating on-brand visuals that elevate the message.</x-section.subtitle>
        <x-section.tools>InDesign, Photoshop, Illustrator, Word
        </x-section.tools>
    </x-section.header> 

    <!-- Section content -->
    <div x-data="{ category: '1' }">

            <!-- Category buttons -->
            <div class="flex items-center justify-center gap-4 mb-6">

                <x-design.button category="1">Covers</x-button-tabs>
                <x-design.button category="2">Layouts</x-button-tabs>
                <x-design.button category="3">Misc.</x-button-tabs>
                
            </div>
            
            <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl px-10 lg:px-1">
                
                
                <!-- Covers DIM: lg. 1000x1305; sm. 500x653-->
                <div
                    x-show="['1'].includes(category)"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                    >
                    @foreach ($covers as $cover)
                        <div @class(['hidden lg:block' => $loop->index === 2])>
                            <a href="/covers/{{ $cover->slug }}" class="block w-full">
                                <img class="block w-full h-auto" src="{{ asset($cover->thumb_path) }}" alt="{{ $cover->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>



                <!-- Layouts -->
                <div x-show="['2'].includes(category)" class="grid grid-cols-1 md:grid-cols-2 gap-6 mx-auto justify-items-center">    
                    @foreach ($layouts as $layout)
                        <div x-show="['2'].includes(category)">
                            <div class="relative">                                    
                                <a href="/layouts/{{ $layout->slug }}">
                                    <img src="{{ asset($layout->thumb_path) }}" alt="{{ $layout->title }}">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                


            <x-design.more-button category="1" url="/covers">Covers &#8212; {{ $coverCount }} </x-design.more-button>
            <x-design.more-button category="2" url="/layouts">Layouts &#8212; {{ $layoutCount }}</x-design.more-button>

    </div>

</x-section.layout>