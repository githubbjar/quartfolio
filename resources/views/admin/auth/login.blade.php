<x-layout title="Login - Quartfolio: Jerry M. Janquart Design and Development Portfolio">

    <x-hero />
    
    <x-section.art-layout bg="graphics-bg">
        
        <x-section.header>
            <x-section.title>Login</x-section.title>
            <x-section.subtitle>For editing projects and reading messages.</x-section.subtitle>
        </x-section.header>

         @if (session('admin_logged_in'))
            <div
            x-data="{ show: true }"
            x-show="show"
            x-transition
            class="max-w-xl mx-auto mb-4 flex items-center justify-between rounded-none text-white bg-red-900 px-4 py-3 text-white-800 border"
        >
            <span>Already logged in.</span>

            <button @click="show = false" class="text-white hover:text-gray-600">
                ✕
            </button>
        </div>
         @endif

        <div class="max-w-3xl mx-auto py-10 px-4">
            

            @if ($errors->any())
                <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded text-sm">
                    {{ $errors->first() }}
                </div>
            @endif

            <form 
                method="POST" 
                action="{{ route('admin.login.post') }}" 
                class="space-y-6 bg-white p-6 rounded shadow">
                
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                    <div>
                        <label class="block font-semibold mb-1">Email</label>
                        <input
                            type="email"
                            name="email"
                            value="{{ old('email') }}"
                            class="w-full border rounded px-3 py-2"
                            required
                            autofocus
                        >
                    </div>

                    <div>
                        <label class="block font-semibold mb-1">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="w-full border rounded px-3 py-2"
                            required
                        >
                    </div>

                </div>
                
                <div class="flex justify-center">
                    <button class="bg-black text-white px-6 py-2 rounded hover:bg-red-800 transition">
                        Sign in
                    </button>
                </div>

                
            </form>
        </div>
    </x-section.art-layout>
</x-layout>
