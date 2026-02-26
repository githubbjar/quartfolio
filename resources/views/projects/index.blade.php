<x-layout title="Projects - Quartfolio: Jerry M. Janquart Design and Development Portfolio">
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

                <a class="font-bold btn-sm text-white bg-black hover:bg-gray-500 rounded-none"
                href="">
                    ^ Import .csv
                </a>
            </div>


            <form action="{{ route('admin.projects.import') }}" method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            <input type="file" name="csv_file" accept=".csv,text/csv" required>
            <button type="submit" class="btn-sm text-white bg-black px-4 py-2 rounded-none">Import CSV</button>
        </form>

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
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $projects->links() }}
        </div>

    </div>
    </x-section.art-layout>
</x-layout>
