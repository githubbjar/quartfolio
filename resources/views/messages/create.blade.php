<x-layout title="Send Me a Message - Quartfolio: Jerry M. Janquart Design and Development Portfolio">
    <x-hero />
    <x-section.art-layout bg="graphics-bg">


        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    

        <section class="max-w-6xl mx-auto px-6 grid md:grid-cols-12 gap-12 items-center pb-24 -mt-20">
        
        <!-- Left Column -->
        <div class="md:col-span-7">
            <x-section.header>

                    <p class="text-center text-md uppercase tracking-widest text-gray-700 mb-4 mt-10">
                        Contact 
                    </p>

                    <div class="">
                        <h2 class="tinos-regular h2 mb-4 uppercase leading-none tracking-wide">Let's Connect</h2>
                    </div>

                    <p class="tinos-regular text-center text-2xl font-bold leading-tight">
                        I'd love to help you with your next project! Please fill out the form and I'll get back to you as soon as possible.
                    </p>

                    <div class="flex justify-center mt-12">
                    <div
                        class="w-40 h-2.5 bg-black"
                        style="clip-path: polygon(8% 100%, 0% 100%, 6% 0%, 100% 20%, 100% 100%);"
                    ></div>
                </div>

                </x-section.header>
            </div>
        
        <!-- Right Column -->
    <div class="md:col-span-5">
        
            <form
    action="{{ route('messages.store') }}"
    method="POST"
    class="space-y-6 bg-white p-8 max-w-2xl"
>
    @csrf

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block text-sm font-semibold mb-2 tracking-wide text-black">
                Your Name
            </label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                class="w-full border border-black/25 bg-white px-4 py-3 text-black focus:outline-none focus:border-black focus:ring-0 transition"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 tracking-wide text-black">
                Subject of Message
            </label>
            <input
                type="text"
                name="subject"
                value="{{ old('subject') }}"
                class="w-full border border-black/25 bg-white px-4 py-3 text-black focus:outline-none focus:border-black focus:ring-0 transition"
            >
        </div>

    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

        <div>
            <label class="block text-sm font-semibold mb-2 tracking-wide text-black">
                Your Phone #
            </label>
            <input
                type="text"
                name="phone"
                value="{{ old('phone') }}"
                class="w-full border border-black/25 bg-white px-4 py-3 text-black focus:outline-none focus:border-black focus:ring-0 transition"
                required
            >
        </div>

        <div>
            <label class="block text-sm font-semibold mb-2 tracking-wide text-black">
                Your Email Address
            </label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                class="w-full border border-black/25 bg-white px-4 py-3 text-black focus:outline-none focus:border-black focus:ring-0 transition"
                required
            >
        </div>

    </div>

    <div>
        <label class="block text-sm font-semibold mb-2 tracking-wide text-black">
            Message
        </label>
        <textarea
            name="message"
            rows="6"
            class="w-full border border-black/25 bg-white px-4 py-3 text-black focus:outline-none focus:border-black focus:ring-0 transition resize-none"
        >{{ old('message') }}</textarea>
    </div>

    <div class="flex justify-end items-center pt-2">
        <button
            type="submit"
            class="bg-black text-white px-6 py-3 hover:bg-gray-800 transition"
        >
            Send Message
        </button>
    </div>

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
