<x-layout title="Covers - Quartfolio: Jerry M. Janquart Design and Development Portfolio">

    <x-hero />
    
    <x-section.art-layout bg="graphics-bg">
        @if ($covers->onFirstPage())
        <section class="max-w-6xl mx-auto px-6 grid md:grid-cols-2 gap-12 items-center -mt-30 mb-6">

            <!-- LEFT COLUMN -->
            <x-section.header>

                <p class="text-center text-md uppercase tracking-widest text-gray-700 mb-4 mt-30">
                    Graphic Design
                </p>

                <div class="">
                    <h2 class="tinos-regular h2 mb-4 uppercase">Covers</h2>
                </div>

                <p class="tinos-regular text-center text-2xl font-bold leading-tight">
                    Cover design for magazines and books across two decades of publishing—combining concept, typography, and imagery to frame each issue’s central story.
                </p>

                <div class="flex justify-center mt-12">
                <div
                    class="w-40 h-[10px] bg-black"
                    style="clip-path: polygon(8% 100%, 0% 100%, 6% 0%, 100% 20%, 100% 100%);"
                ></div>
            </div>

            </x-section.header>

            <!-- RIGHT COLUMN -->
            <div class="flex justify-center md:justify-end">
                <img 
                    src="{{ $featuredCover->hero_url }}" alt="{{ $featuredCover->title }}" 
                    class="max-w-sm md:max-w-md lg:max-w-lg rotate-1"
                >
            </div>

            
        </section>
        @endif
        

        <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl px-10 lg:px-1 pt-10">
            <div class="stagger-grid grid md:grid-cols-3 gap-6">
                
                @foreach ($covers as $cover)
                    <div x-show="['1'].includes(category)">
                        <div class="relative">                                    
                            <a href="{{ route('covers.show', $cover) }}">
                                <img src="{{ $cover->thumb_url }}" alt="{{ $cover->title }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            
            </div>
            
            <div class="flex justify-center mt-7 pb-20">
                    {{ $covers->links() }}
            </div>
        
        </div>

    </x-section.layout>

    

</x-layout>