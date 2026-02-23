<x-layout title="Quartfolio: Jerry M. Janquart Design and Development Portfolio">
 
    <x-hero />
    <x-design.tabs 
        :covers="$covers" 
        :layouts="$layouts" 
        :promotions="$promotions" 
        :coverCount="$coverCount" 
        :layoutCount="$layoutCount" 
        :promotionCount="$promotionCount" />
    <x-testimonials.testimonials />
    <x-development.web-slider :websites="$websites" />
    <x-email.blast-slider :eblasts="$eblasts" :eblastCount="$eblastCount" />
    
</x-layout>