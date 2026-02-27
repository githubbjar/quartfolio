<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectImportController extends Controller

    // csv format: title, type, description, is_featured (1 or empty), year, quarter (1-4), external_url
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'csv_file' => ['required', 'file', 'mimes:csv,txt'],
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $file = fopen($path, 'r');

        if (! $file) {
            return back()->with('fail', 'Could not read CSV file.');
        }

        $header = fgetcsv($file); // skip header

        while (($row = fgetcsv($file)) !== false) {

            if (count($row) < 7 || trim(implode('', $row)) === '') {
                continue;
            }

            $project = Project::create([
                'title' => $row[0],
                'type' => $row[1],
                'description' => $row[2] ?: null,
                'is_featured' => ! empty($row[3]),
                'year' => (int) $row[4],
                'quarter' => (int) $row[5],
                'external_url' => $row[6] ?: null,
            ]);

            $project->update([
                'hero_path' => "projects/{$project->slug}-hero.webp",
                'thumb_path' => "projects/{$project->slug}-thumb.webp",
            ]);
        }

        fclose($file);

        return back()->with('success', 'Projects imported successfully!');
    }
}
