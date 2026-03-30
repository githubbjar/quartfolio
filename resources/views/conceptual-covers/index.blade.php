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
                    <h2 class="tinos-regular h2 mb-4 uppercase">Conceptual Cover</h2>
                </div>

                <p class="tinos-regular text-center text-2xl font-bold leading-tight">
                    Concept-driven exploration of bible cover design, typography, and publishing systems.
                </p>

                <div class="flex justify-center mt-12">
                <div
                    class="w-40 h-2.5 bg-black"
                    style="clip-path: polygon(8% 100%, 0% 100%, 6% 0%, 100% 20%, 100% 100%);"
                ></div>
            </div>

            </x-section.header>

            <!-- RIGHT COLUMN -->
            <div class="md:flex justify-end mb-20">
                <a href="/conceptual-covers/the-new-cambridge-paragraph-bible">
                <img 
                    src="/storage/projects/the-new-cambridge-paragraph-bible-thumb.webp" 
                    alt="Featured Covers"
                    class="w-full rotate-1"
                >
                </a>
            </div>


            
        </section>
        @endif
        

        

    </x-section.layout>

    

</x-layout>