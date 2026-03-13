<div x-show="['{{ $category }}'].includes(category)" class="text-center pt-4 pb-6">
    <a class="font-bold btn-sm rounded-none text-white bg-black hover:bg-gray-600 mt-3" href="{{ $url }}">
        More {{ $slot }}
    </a>
</div>