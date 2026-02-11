<x-section.layout bg="web-dev-bg">

    <x-section.header>
        <x-section.title>Web Development</x-section.title>
        <x-section.subtitle>Full Stack. From page to screen&#8212;current tools, professional workflow.</x-section.subtitle>
        <x-section.tools>PHP/MySQL, Laravel Ecosystem, Git, VS Code, Shopify, Google Analytics, Vite, Tailwind, Bootstrap, Chat GPT</x-section.tools>
    </x-section.header>

    <!-- Carousel built with Swiper.js [https://swiperjs.com/] -->
    <!-- * Initialized in src/js/main.js -->
    <!-- * Custom styles in src/css/additional-styles/theme.scss -->
    <div class="mx-auto overflow-hidden">
        <div class="carousel swiper">
            <div class="swiper-wrapper">

                @foreach($websites as $website)
                @php
                    $imagePathWebsite = "images/websites/{$website->slug}.webp";
                @endphp                
                <!-- Carousel item -->
                <div class="swiper-slide max-w-lg">
                    <img 
                        class="duration-300" 
                        src="{{ asset($imagePathWebsite) }}" 
                        width="540" 
                        height="460" 
                        alt="{{ $website->title }}" 
                    />
                    <div class="absolute inset-0 flex flex-col duration-300 translate-z-0">            
                        <div class="absolute bottom-0 right-0 p-6">
                            <a class="text-xs font-bold text-center text-white py-2 px-3 rounded-full bg-gray-900 hover:bg-gray-900/50 transition duration-150 ease-in-out" href="{{ $website->description }}" target="_blank">{{ $website->title }}</a>
                        </div>
                    </div>
                </div>
                @endforeach
                                
            </div>
        </div>
    </div>

    <x-section.carousel-arrows />

</x-section.layout>