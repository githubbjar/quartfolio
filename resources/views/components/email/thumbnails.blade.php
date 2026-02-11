
<div class="max-w-6xl mx-auto px-4">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        @foreach($eblasts as $eblast)
            
            @php
                $imagePathEblast = "images/eblasts/{$eblast->slug}.webp";
            @endphp  
            
            <a href="{{ $eblast->description }}" target="_blank">
                <div class="h-124 overflow-hidden hover:overflow-y-auto">
                    <img
                        src="{{ asset($imagePathEblast) }}"
                        alt=""
                        class="w-full"
                    />
                </div>
            </a>

        @endforeach
    
    </div>

</div>    



