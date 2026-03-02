<x-layout title="Send Me a Message - Quartfolio: Jerry M. Janquart Design and Development Portfolio">
    <x-hero />
    <x-section.art-layout bg="graphics-bg">
        <x-section.header>
            <x-section.title>Contact Form</x-section.title>
            <x-section.subtitle>Send me a message!</x-section.subtitle>
        </x-section.header>

    <div class="max-w-3xl mx-auto py-10 px-4">

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('messages.store') }}"
            method="POST"
            class="space-y-6 bg-white p-6 rounded shadow"
        >
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Title --}}
                <div>
                    <label class="block font-semibold mb-1">Your Name</label>
                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="w-full border rounded px-3 py-2"
                        required
                    >
                </div>

                {{-- Subject Line --}}
                <div>
                    <label class="block font-semibold mb-1">Subject of message</label>
                    <input
                        type="text"
                        name="subject"
                        value="{{ old('subject') }}"
                        class="w-full border rounded px-3 py-2"
                    >
                </div>



            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                {{-- Phone --}}
                <div>
                    <label class="block font-semibold mb-1">Your Phone #</label>
                    <input
                        type="text"
                        name="phone"
                        value="{{ old('phone') }}"
                        class="w-full border rounded px-3 py-2"
                        required
                    >
                </div>

                {{-- Email --}}
                <div>
                    <label class="block font-semibold mb-1">Your Email Address</label>
                    <input
                        type="text"
                        name="email"
                        value="{{ old('email') }}"
                        class="w-full border rounded px-3 py-2"
                        required
                    >
                </div>
            </div>


            {{-- Message --}}
            <div>
                <label class="block font-semibold mb-1">Message</label>
                <textarea
                    name="message"
                    rows="5"
                    class="w-full border rounded px-3 py-2"
                >{{ old('message') }}</textarea>
            </div>

            {{-- Actions --}}
            <div class="flex justify-between items-center">
                <a
                    href="{{ route('home') }}"
                    class="text-gray-600 hover:underline"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="bg-black text-white px-6 py-2 rounded hover:bg-red-800 transition"
                >
                    Send Message
                </button>
            </div>

            {{-- Honeypot --}}
            <div class="hidden">
                <label for="company">Company</label>
                <input
                    type="text"
                    name="company"
                    id="company"
                    value=""
                    tabindex="-1"
                    autocomplete="off"
                >
            </div>

        </form>
    </div>
    </x-section.art-layout>
</x-layout>
