<x-layout title="Marketing & Campaign Design | Quartfolio">
    <x-hero />
    
    <x-section.art-layout bg="graphics-bg">
        
        
        @if ($marketingPieces->onFirstPage())

        <section class="max-w-6xl mx-auto px-6 lg:py-6 grid lg:grid-cols-[1fr_2fr] gap-12 items-center">

            <!-- LEFT COLUMN -->
            <x-section.header>

                <p class="text-center text-md uppercase tracking-widest text-gray-700">
                    Graphic Design
                </p>

                <div class="">
                    <h2 class="tinos-regular text-3xl mb-4 uppercase leading-none">Marketing & Campaigns</h2>
                </div>

                <p class="tinos-regular text-center text-2xl font-bold leading-tight">
                    Campaign-driven design across print, digital, and in-person environments, supporting content, promotion, and audience engagement.
                </p>

                <div class="flex justify-center mt-12">
                <div
                    class="w-40 h-2.5 bg-black"
                    style="clip-path: polygon(8% 100%, 0% 100%, 6% 0%, 100% 20%, 100% 100%);"
                ></div>
            </div>

            </x-section.header>

            <!-- RIGHT COLUMN w/ placeholder image -->
            <div class="hidden md:flex justify-end">
                <img 
                    src="{{ asset('images/marketing-index.webp') }}" 
                    alt="Featured Covers"
                    class="w-full rotate-1"
                >
            </div>

            
        </section>
        @endif




        <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl pt-10">
            <div class="stagger-grid grid md:grid-cols-2 gap-6">
                
                @foreach ($marketingPieces as $marketingPiece)
                    <div x-show="['1'].includes(category)">
                        <div class="relative">                                    
                            <a href="{{ route('marketing.show', $marketingPiece) }}">
                                <img src="{{ $marketingPiece->thumb_url }}" alt="{{ $marketingPiece->title }}" class="duration-200 hover:scale-103">
                            </a>
                        </div>
                    </div>
                @endforeach
            
            </div>
            
            <div class="flex justify-center mt-7 pb-10">
                    {{ $marketingPieces->links() }}
            </div>
        
        </div>

    </x-section.layout>

    

</x-layout>