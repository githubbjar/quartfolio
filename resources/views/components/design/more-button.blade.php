<div x-show="['{{ $category }}'].includes(category)" class="text-center pt-5 pb-10">
    <a class="font-bold btn-sm rounded-none text-white bg-black hover:bg-gray-600 mt-3" href="{{ $url }}">
        More {{ $slot }}
    </a>
</div>