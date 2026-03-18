<x-layout title="Projects | Quartfolio">
    <x-hero />
    <x-section.art-layout bg="graphics-bg">
        <x-section.header>
            <x-section.title>All Projects</x-section.title>
            <x-section.subtitle>Add / Edit / Scrap / Import</x-section.subtitle>


            <div class="flex gap-4 mt-6 justify-center">

                <a class="font-bold btn-sm text-white bg-black hover:bg-gray-500 rounded-none"
                href="{{ route('admin.projects.create') }}">
                    + Add Project
                </a>

                <div x-data="{ open: false }" class="relative">
                    <button
                        type="button"
                        @click="open = true"
                        class="font-bold btn-sm text-white bg-black hover:bg-gray-500 rounded-none"
                    >
                        ^ Import .csv
                    </button>

                        <!-- Modal Overlay -->
                        <div
                            x-show="open"
                            class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                            style="display: none;"
                        >
                            <!-- Modal Box -->
                            <div
                                @click.away="open = false"
                                class="bg-white p-6 w-full max-w-md shadow-lg"
                            >
                                <h2 class="text-xl font-bold mb-4">Import CSV</h2>

                                <form action="{{ route('admin.projects.import') }}"
                                    method="POST"
                                    enctype="multipart/form-data"
                                    class="space-y-4">
                                    @csrf

                                    <input type="file"
                                        name="csv_file"
                                        accept=".csv,text/csv"
                                        required
                                        class="block w-full border p-2">

                                    <div class="flex justify-end gap-2">
                                        <button type="button"
                                                @click="open = false"
                                                class="px-4 py-2 border">
                                            Cancel
                                        </button>

                                        <button type="submit"
                                                class="btn-sm text-white bg-black px-4 py-2 rounded-none">
                                            Import CSV
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>

        </x-section.header>


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

    <div class="max-w-4xl mx-auto py-4 px-4">

        <div class="overflow-x-auto bg-white shadow rounded-none">
            <div
                x-data="{
                    open: false,
                    action: '',
                    title: '',
                    confirm(action, title) {
                        this.action = action;
                        this.title = title;
                        this.open = true;
                    }
                }"
                @keydown.escape.window="open = false"
            >
            <table class="min-w-full border-collapse">
                <thead class="bg-black text-gray-300 text-left">
                    <tr>
                        <th class="px-4 py-3 text-sm font-semibold text-center uppercase">Featured</th>
                        <th class="px-4 py-3 text-sm font-semibold uppercase">Title</th>
                        <th class="px-4 py-3 text-sm font-semibold uppercase">Project Date</th>
                        <th class="px-4 py-3 text-sm font-semibold uppercase">Type</th>

                        <th class="px-4 py-3 text-sm font-semibold text-center uppercase">Scrap</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse ($projects as $project)
                        <tr class="hover:bg-gray-50">

                            <td class="px-4 py-3 text-center">
                                <form method="POST" action="{{ route('admin.projects.toggleFeatured', $project) }}">
                                    @csrf
                                    @method('PATCH')

                                    <button type="submit" class="cursor-pointer">
                                        @if ($project->is_featured)
                                            <span class="text-black font-bold">✓</span>
                                        @else
                                            <span class="text-gray-400">—</span>
                                        @endif
                                    </button>
                                </form>
                            </td>

                            <td class="px-4 py-3 font-bold">
                                {{ $project->title }}
                            </td>

                            <td class="px-4 py-3 text-sm">
                                {{ $project->quarter_label }} {{ $project->year }}
                            </td>

                            <td class="px-4 py-3 capitalize">
                                {{ $project->type }}
                            </td>

                            <!--

                            <td class="px-4 py-3 text-center space-x-2">
                                <form action="{{ route('admin.projects.destroy', $project) }}"
                                    method="POST"
                                    onsubmit="return confirm('Delete this project?')"
                                    class="inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="text-black hover:text-red-800">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                

                            </td>

                            -->

                            <td class="px-4 py-3 text-center space-x-2">
                                <button
                                    type="button"
                                    class="text-black hover:text-red-800"
                                    @click="confirm('{{ route('admin.projects.destroy', $project) }}', @js($project->title))"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                                No projects found.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <div
                x-show="open"
                class="fixed inset-0 bg-black/50 flex items-center justify-center z-50"
                style="display: none;"
            >
                <div
                    @click.away="open = false"
                    class="bg-white p-6 w-full max-w-md shadow-lg"
                >
                    <h2 class="font-bold mb-3">Scrap project?</h2>

                    <p class="mb-5">
                        This will delete
                        <span class="font-semibold" x-text="`“${title}”`"></span>.
                        This cannot be undone.
                    </p>

                    <form :action="action" method="POST" class="flex justify-end gap-2">
                        @csrf
                        @method('DELETE')

                        <button
                            type="button"
                            @click="open = false"
                            class="px-4 py-2 border"
                        >
                            Cancel
                        </button>

                        <button
                            type="submit"
                            class="px-4 py-2 bg-black text-white rounded-none"
                        >
                            Scrap
                        </button>
                    </form>
                </div>
            </div>

            </div>  
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $projects->links() }}
        </div>

    </div>
    </x-section.art-layout>
</x-layout>
