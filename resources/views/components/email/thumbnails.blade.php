
<div class="max-w-6xl mx-auto px-4">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

        @foreach($eblasts as $eblast)
            
            <a href="{{ $eblast->external_url }}" target="_blank" rel="noopener noreferrer">
                <div class="h-124 overflow-hidden hover:overflow-y-auto">
                    <img src="{{ $eblast->thumb_url }}" alt="{{ $eblast->title }}" class="w-full">
                </div>
            </a>

        @endforeach
    
    </div>

</div>    



