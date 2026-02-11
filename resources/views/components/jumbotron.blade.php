@props([
    'title' => '',
    'subtitle' => '',
    'image' => null,
])

<section
    x-data="{ show: false }"
    x-init="requestAnimationFrame(() => show = true)"
    class="relative overflow-hidden bg-gray-900 text-white"
>
    {{-- Background image --}}
    @if ($image)
        <div
            class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('{{ Vite::asset($image) }}');"
            x-show="show"
            x-transition.opacity.duration.1000ms
        ></div>

        {{-- Overlay --}}
        <div class="absolute inset-0 bg-black/50"></div>
    @endif

    {{-- Content --}}
    <div class="relative mx-auto max-w-7xl px-6 py-16 sm:py-20 lg:py-28">
        <div class="max-w-3xl">
            <h1
                x-show="show"
                x-transition:enter="transition ease-out duration-700"
                x-transition:enter-start="opacity-0 translate-y-6"
                x-transition:enter-end="opacity-100 translate-y-0"
                class="text-3xl sm:text-4xl lg:text-5xl font-bold tracking-tight"
            >
                {{ $title }}
            </h1>

            @if ($subtitle)
                <p
                    x-show="show"
                    x-transition:enter="transition ease-out delay-150 duration-700"
                    x-transition:enter-start="opacity-0 translate-y-6"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="mt-4 text-base sm:text-lg text-gray-200"
                >
                    {{ $subtitle }}
                </p>
            @endif

            @if ($slot->isNotEmpty())
                <div
                    x-show="show"
                    x-transition:enter="transition ease-out delay-300 duration-700"
                    x-transition:enter-start="opacity-0 translate-y-6"
                    x-transition:enter-end="opacity-100 translate-y-0"
                    class="mt-8 flex flex-wrap gap-4"
                >
                    {{ $slot }}
                </div>
            @endif
        </div>
    </div>
</section>
