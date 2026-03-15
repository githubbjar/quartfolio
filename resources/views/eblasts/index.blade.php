<x-layout title="Email Marketing | Quartfolio">
    <x-hero />

    <x-section.art-layout bg="blast-bg">

        <section class="max-w-6xl mx-auto px-6 lg:py-6 grid lg:grid-cols-[1fr_2fr] gap-12 items-center">

            <!-- LEFT COLUMN -->
            <x-section.header>

                <p class="text-center text-md uppercase tracking-widest text-gray-700">
                    Marketing
                </p>

                <div class="">
                    <h2 class="tinos-regular h2 mb-4 uppercase">Eblasts</h2>
                </div>

                <p class="tinos-regular text-center text-2xl font-bold leading-tight">
                    Promotions, announcements, fundraising, sales & more! Compelling blasts that deliver.
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
                    src="{{ asset('images/covers-index.webp') }}" 
                    alt="Featured Covers"
                    class="w-full rotate-1"
                >
            </div>

            
        </section>
    
        

        <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl px-10 lg:px-1 pt-10 pb-10">
            <div class="stagger-grid grid md:grid-cols-3 gap-x-10 gap-y-12">
                
                @foreach($eblasts as $eblast)
            
                    <a href="{{ $eblast->external_url }}" target="_blank" rel="noopener noreferrer">
                        <div class="h-124 overflow-hidden hover:overflow-y-auto">
                            <img src="{{ $eblast->thumb_url }}" alt="{{ $eblast->title }}" class="w-full">
                        </div>
                    </a>

                @endforeach

            
            </div>
            
            <div class="flex justify-center mt-7">
                    {{ $eblasts->links() }}
            </div>

    </x-section.art-layout>

</x-layout>