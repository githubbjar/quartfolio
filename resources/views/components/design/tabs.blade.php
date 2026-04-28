<x-section.layout bg="graphics-bg" id="design">

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
        <x-section.subtitle>Two decades in publishing—designing marketing, campaigns, and editorial materials that serve the message.</x-section.subtitle>
        <x-section.tools>InDesign · Photoshop · Illustrator · Word
        </x-section.tools>
    </x-section.header> 

    <!-- Section content -->
    <div x-data="{ category: '3' }">

            <!-- Category buttons -->
            <div class="flex flex-col items-center sm:flex-row sm:items-center justify-center gap-3 sm:gap-4 mb-6">

                <x-design.button category="3">Marketing & Campaigns</x-design.button>
                <x-design.button category="2">Layouts</x-design.button>
                <x-design.button category="1">Covers</x-design.button>

            </div>
            
            <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl px-10 lg:px-1">
                
                
                <!-- Covers DIM: lg. 1000x1305; sm. 500x653-->
                <div
                    x-show="['1'].includes(category)"
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                    >
                    @foreach ($covers as $cover)
                        <div @class(['hidden lg:block' => $loop->index === 2])>
                            <a href="{{ route('covers.show', $cover) }}" class="block w-full">
                                <img class="block w-full h-auto transition duration-200 hover:scale-103" src="{{ $cover->thumb_url }}" alt="{{ $cover->title }}">
                            </a>
                        </div>
                    @endforeach
                </div>



                <!-- Layouts -->
                <div x-show="['2'].includes(category)" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mx-auto justify-items-center">    
                    @foreach ($layouts as $layout)
                        <div x-show="['2'].includes(category)">
                            <div class="relative">                                    
                                <a href="{{ route('layouts.show', $layout) }}" class="block w-full">
                                <img class="block w-full h-auto duration-200 hover:scale-103" src="{{ $layout->thumb_url }}" alt="{{ $layout->title }}">
                            </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Marketing & Campaigns -->
                <div x-show="['3'].includes(category)" class="grid grid-cols-1 lg:grid-cols-2 gap-6 mx-auto justify-items-center">    
                    @foreach ($marketingPieces as $marketingPiece)
                        <div x-show="['3'].includes(category)">
                            <div class="relative">                                    
                                <a href="{{ route('marketing.show', $marketingPiece) }}" class="block w-full">
                                <img class="block w-full h-auto duration-200 hover:scale-103" src="{{ $marketingPiece->thumb_url }}" alt="{{ $marketingPiece->title }}">
                            </a>
                            </div>
                        </div>
                    @endforeach
                </div>

            <x-design.more-button category="1" :url="route('covers.index')">
                Covers — {{ $coverCount }}
            </x-design.more-button>

            <x-design.more-button category="2" :url="route('layouts.index')">
                Layouts — {{ $layoutCount }}
            </x-design.more-button>

            <x-design.more-button category="3" :url="route('marketing.index')">
                Marketing & Campaigns — {{ $marketingPiecesCount }}
            </x-design.more-button>

    </div>

</x-section.layout>