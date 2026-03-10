<x-layout title="Email Blasts - Quartfolio: Jerry M. Janquart Design and Development Portfolio">

    <x-hero />

    <x-section.art-layout bg="blast-bg">
    
        <x-section.header>
            <x-section.title>Email Marketing</x-section.title>
            <x-section.subtitle>Promotions, announcements, fundraising, sales & more! Compelling blasts that deliver.</x-section.subtitle>
            <x-section.tools>Constant Contact, Mail Chimp, Photoshop</x-section.tools>
        </x-section.header>

        <div class="mx-auto lg:max-w-6xl md:max-w-5xl max-w-2xl px-10 lg:px-1 pt-10 pb-10">
            <div class="stagger-grid grid md:grid-cols-3 gap-x-6 gap-y-12">
                
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