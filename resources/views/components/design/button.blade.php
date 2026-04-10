<button
  class="w-3/4 font-medium px-3 py-2 transition duration-150 ease-in-out flex items-center justify-center mx-auto"
  :class="{
    'bg-gray-700': category === '{{ $category }}',
    'bg-white hover:bg-gray-200': category !== '{{ $category }}'
  }"
  @click="category = '{{ $category }}'"
>
  <span :class="category === '{{ $category }}' ? 'text-white font-bold' : 'text-gray-600'">
    {{ $slot }}
  </span>
</button>