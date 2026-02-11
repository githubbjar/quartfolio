<button
    
    class="font-medium px-3 py-2 transition duration-150 ease-in-out flex items-center justify-center"

    :class="category === '{{ $category }}' ? 'bg-black' : 'bg-white hover:bg-gray-200'"
    
    @click="category = '{{ $category }}'"
>
    <span 
    
    :class="category === '{{ $category }}' ? 'text-white font-bold' : 'text-gray-600'">{{ $slot }}

    </span>
    
</button>