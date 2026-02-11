<x-section.layout bg="blast-bg">

    <x-section.header>
        <x-section.title>Email Marketing</x-section.title>
        <x-section.subtitle>Promotions, announcements, fundraising, sales & more! Compelling blasts that deliver.</x-section.subtitle>
        <x-section.tools>Constant Contact, Mail Chimp, Photoshop</x-section.tools>
    </x-section.header>

    <x-email.stats />

    <x-email.thumbnails :eblasts="$eblasts" />

    <x-design.more-button category="" url="/eblasts">Eblasts</x-section.more-button>

</x-section.layout>