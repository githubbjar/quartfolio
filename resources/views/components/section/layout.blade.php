<!-- Tabs -->
<section {{ $attributes->merge(['class' => $bg . ' relative']) }}>
    
    <div class="h-10 bg-black clip-diagonal"></div>
    
    <div class="relative mx-auto">
        
        <div class="pb-5">

            {{ $slot }}
                        
        </div>
    </div>
</section>            