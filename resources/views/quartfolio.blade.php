<x-layout title="Quartfolio: Jerry M. Janquart Design and Development Portfolio">
 
    <x-hero />
    <x-design.tabs :covers="$covers" :layouts="$layouts" :coverCount="$coverCount" :layoutCount="$layoutCount" />
    <x-testimonials.testimonials />
    <x-development.web-slider :websites="$websites" />
    <x-email.blast-slider :eblasts="$eblasts" />
    
</x-layout>