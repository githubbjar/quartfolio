<x-layout title="Create Project - Quartfolio: Jerry M. Janquart Design and Development Portfolio">
    <x-hero />
    <x-section.art-layout bg="graphics-bg">
        <x-section.header>
            <x-section.title>Project</x-section.title>
            <x-section.subtitle>Add</x-section.subtitle>
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
            action="{{ route('admin.projects.store') }}"
            method="POST"
            class="space-y-6 bg-white p-6 rounded shadow"
        >
            @csrf

            {{-- Title --}}
            <div>
                <label class="block font-semibold mb-1">Title</label>
                <input
                    type="text"
                    name="title"
                    value="{{ old('title') }}"
                    class="w-full border rounded px-3 py-2"
                    required
                >
            </div>

            {{-- Type --}}
            <div>
                <label class="block font-semibold mb-1">Type</label>
                <select
                    name="type"
                    class="w-full border rounded px-3 py-2"
                    required
                >
                    <option value="">Select type</option>

                    <option value="cover">Cover</option>
                    <option value="layout">Layout</option>
                    <option value="website">Website</option>
                    <option value="eblast">Eblast</option>
                    <option value="promotion">Promotion</option>

                </select>
            </div>

            <div class="grid grid-cols-2 gap-4">
                {{-- Year --}}
                <div>
                    <label class="block font-semibold mb-1">Year</label>
                    <input
                        type="number"
                        name="year"
                        value="{{ old('year') }}"
                        class="w-full border rounded px-3 py-2"
                        placeholder="2026"
                        min="1900"
                        max="{{ now()->year + 1 }}"
                        required
                    >
                </div>

                {{-- Quarter --}}
                <div>
                    <label class="block font-semibold mb-1">Season</label>
                    <select
                        name="quarter"
                        class="w-full border rounded px-3 py-2"
                        required
                    >
                        <option value="">Select season</option>
                        <option value="1" @selected(old('quarter') == 1)>1 Spring</option>
                        <option value="2" @selected(old('quarter') == 2)>2 Summer</option>
                        <option value="3" @selected(old('quarter') == 3)>3 Fall</option>
                        <option value="4" @selected(old('quarter') == 4)>4 Winter</option>
                    </select>
                </div>
            </div>


            {{-- Description --}}
            <div>
                <label class="block font-semibold mb-1">Description</label>
                <textarea
                    name="description"
                    rows="5"
                    class="w-full border rounded px-3 py-2"
                >{{ old('description') }}</textarea>
            </div>

            {{-- External URL (for websites & eblasts only) --}}
            <div>
                <label class="block font-semibold mb-1">External URL</label>
                <input
                    type="url"
                    name="external_url"
                    value="{{ old('external_url') }}"
                    class="w-full border rounded px-3 py-2"
                    placeholder="https://example.com"
                >
                <p class="text-sm text-gray-500 mt-1">
                    Only required for Website and Eblast projects.
                </p>
            </div>

            {{-- Featured --}}
            <div class="flex items-center gap-2">
                <input type="hidden" name="is_featured" value="0">

                <input
                    type="checkbox"
                    name="is_featured"
                    id="is_featured"
                    value="1"
                    class="rounded"
                    {{ old('is_featured', $project->is_featured ?? false) ? 'checked' : '' }}
                >

                <label for="is_featured" class="font-semibold">
                    Featured project
                </label>
            </div>

            {{-- Actions --}}
            <div class="flex justify-between items-center">
                <a
                    href="{{ route('admin.projects.index') }}"
                    class="text-gray-600 hover:underline"
                >
                    Cancel
                </a>

                <button
                    type="submit"
                    class="bg-black text-white px-6 py-2 rounded hover:bg-red-800 transition"
                >
                    Save Project
                </button>
            </div>

        </form>
    </div>
    </x-section.art-layout>
</x-layout>
