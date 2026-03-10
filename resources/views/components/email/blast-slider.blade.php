<x-section.layout bg="blast-bg" id="blasts">

    <x-section.header>
        <x-section.title>Email Marketing</x-section.title>
        <x-section.subtitle>Promotions, fundraising, announcements & sales — email campaigns that deliver measurable results.</x-section.subtitle>
        <x-section.tools>Constant Contact, Mail Chimp, Photoshop</x-section.tools>
    </x-section.header>

    <x-email.stats />

    <x-email.thumbnails :eblasts="$eblasts" />
    
    <x-design.more-button category="1" :url="route('eblasts.index')">
        Eblasts — {{ $eblastCount }}
    </x-design.more-button>

</x-section.layout>