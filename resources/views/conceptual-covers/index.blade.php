<x-layout title="Conceptual Covers | Quartfolio">

    <x-hero />
    
    <x-section.art-layout bg="graphics-bg">
        @if ($conceptualCovers->onFirstPage())
        <section class="max-w-6xl mx-auto px-6 lg:py-6 grid lg:grid-cols-[1fr_2fr] gap-12 items-center">

            <!-- LEFT COLUMN -->
            <x-section.header>

                <p class="text-center text-md uppercase tracking-widest text-gray-700 mb-4">
                    Graphic Design
                </p>

                <div class="">
                    <h2 class="tinos-regular h2 mb-4 uppercase">Conceptual Covers</h2>
                </div>

                <p class="tinos-regular text-center text-2xl font-bold leading-tight">
                    Concept-driven explorations of book cover design, typography, and publishing systems.
                </p>

                <div class="flex justify-center mt-12">
                <div
                    class="w-40 h-2.5 bg-black"
                    style="clip-path: polygon(8% 100%, 0% 100%, 6% 0%, 100% 20%, 100% 100%);"
                ></div>
            </div>

            </x-section.header>

            <!-- RIGHT COLUMN -->
            <div class="hidden md:flex justify-end">
                <img 
                    src="" 
                    alt="Featured Covers"
                    class="w-full rotate-1"
                >
            </div>


            
        </section>
        @endif
        

        <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl px-0 pt-10">
            <div class="stagger-grid grid md:grid-cols-3 gap-6">
                
                @foreach ($conceptualCovers as $conceptualCover)
                    <div x-show="['1'].includes(category)">
                        <div class="relative">                                    
                            <a href="{{ route('conceptual-covers.show', $conceptualCover) }}">
                                <img src="{{ $conceptualCover->thumb_url }}" alt="{{ $conceptualCover->title }}" class="duration-200 hover:scale-103">
                            </a>
                        </div>
                    </div>
                @endforeach
            
            </div>
            
            <div class="flex justify-center mt-7 pb-20">
                    {{ $conceptualCovers->links() }}
            </div>
        
        </div>

    </x-section.layout>

    

</x-layout>