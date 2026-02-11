<x-layout title="Messages - Quartfolio: Jerry M. Janquart Design and Development Portfolio">
    <x-hero />
    <x-section.art-layout bg="graphics-bg">
        <x-section.header>

                @if (session('success'))
                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    class="max-w-xl mx-auto mb-4 flex items-center justify-between rounded-none text-white bg-red-900 px-4 py-3 text-white-800 border"
                >
                    <span>{{ session('success') }}</span>

                    <button @click="show = false" class="text-white hover:text-gray-600">
                        ✕
                    </button>
                </div>
            @endif
            
            <x-section.title>Messages</x-section.title>
            <x-section.subtitle>Read / Scrap</x-section.subtitle>
        </x-section.header>

    

    <div class="max-w-4xl mx-auto py-4 px-4">

        <div class="overflow-x-auto bg-white shadow rounded-none">
            <table class="min-w-full border-collapse">
                <thead class="bg-black text-gray-300 text-left">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold uppercase text-center">Message</th>
                        <th class="px-4 py-3 text-sm font-semibold uppercase">Name</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center uppercase">Read</th>
                        <th class="px-4 py-3 text-sm font-semibold text-center uppercase">Scrap</th>
                    </tr>
                </thead>

                <tbody class="divide-y">

                    @forelse ($messages as $message)
                        <tr class="hover:bg-gray-50">
                           
                            <td class="px-4 py-3 text-center" x-data="{ open: false }">
                                <button @click="open = true" type="button">
                                    <i class="fa fa-envelope"></i>
                                </button>

                                <!-- Overlay -->
                                <div
                                    x-show="open"
                                    x-transition.opacity
                                    class="fixed inset-0 bg-black/60 z-40"
                                    @click="open = false"
                                    x-cloak
                                ></div>

                                <!-- Modal -->
                                <div
                                    x-show="open"
                                    x-transition
                                    class="fixed inset-0 z-50 flex items-center justify-center p-4"
                                    @keydown.escape.window="open = false"
                                    x-cloak
                                >
                                    <div class="bg-white max-w-lg w-full rounded-lg shadow-xl p-6 relative" @click.stop>
                                        <button
                                            @click="open = false"
                                            type="button"
                                            class="absolute top-3 right-3 text-gray-500 hover:text-black"
                                        >
                                            ✕
                                        </button>

                                        <h2 class="text-xl font-bold mb-4">Subject: {{ $message->subject }}</h2>

                                        <p class="text-gray-700 leading-relaxed mb-5">
                                            {{ $message->created_at->format('M d, Y h:i A') }} <br />by {{ $message->name }} ({{ $message->email }})
                                        </p>
                                        <hr />
                                        <p class="text-gray-700 leading-relaxed font-bold mt-3 mb-3 text-left">
                                            {{ $message->message }}
                                        </p>
                                        <hr />

                                        <div class="mt-6 text-right">
                                            <form method="POST" action="{{ route('messages.toggleRead', $message) }}">
                                                @csrf
                                                @method('PATCH')

                                                <button
                                                    type="submit"
                                                    class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300"
                                                >
                                                    {{ $message->is_read ? 'Mark as Unread' : 'Mark as Read' }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            
                            <td class="px-4 py-3 font-bold">
                                {{ $message->name }} &#8212; {{ $message->email }}
                            </td>                            

                            <td class="px-4 py-3 font-bold text-center">
                                {{ $message->is_read ? '✓' : 'x' }}
                            </td>

                            <td class="px-4 py-3 text-center space-x-2">
                                <form action="{{ route('message.destroy', $message->id) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this message?')"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-black hover:text-red-800">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>

                            </td>

                            
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                No messages found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        

    </div>
    </x-section.art-layout>
</x-layout>