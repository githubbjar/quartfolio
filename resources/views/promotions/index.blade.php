<x-layout title="Promotions - Quartfolio: Jerry M. Janquart Design and Development Portfolio">

    <x-hero />
    
    <x-section.art-layout bg="graphics-bg">
        <x-section.header>
            <x-section.title>Graphic Design / Promotions</x-section.title>
            <x-section.subtitle>Twenty years in magazine and book publishing creating on-brand visuals that elevate the message.</x-section.subtitle>
            <x-section.tools>InDesign, Photoshop, Illustrator, Word</x-section.tools>
        </x-section.header>

        <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl px-10 lg:px-1">
            <div class="grid md:grid-cols-3 gap-6">
                
                @foreach ($promotions as $promotion)
                    <div x-show="['3'].includes(category)">
                        <div class="relative">                                    
                            <a href="{{ route('promotions.show', $promotion) }}">
                                <img src="{{ asset($promotion->thumb_path) }}" alt="{{ $promotion->title }}">
                            </a>
                        </div>
                    </div>
                @endforeach
            
            </div>
            
            <div class="flex justify-center mt-7">
                    {{ $promotions->links() }}
            </div>
        
        </div>

    </x-section.layout>

    

</x-layout>