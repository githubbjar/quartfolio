<x-layout>
 
    <x-hero />
    <x-design.tabs 
        :covers="$covers" 
        :layouts="$layouts" 
        :marketingPieces="$marketingPieces" 
        :coverCount="$coverCount" 
        :layoutCount="$layoutCount" 
        :marketingPiecesCount="$marketingPiecesCount" />
    <x-testimonials.testimonials />
    <x-development.web-slider :websites="$websites" />
    <x-email.blast-slider :eblasts="$eblasts" :eblastCount="$eblastCount" />
    
</x-layout>