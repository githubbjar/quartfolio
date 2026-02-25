<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectImportController extends Controller
{
    public function __invoke(Request $request)
{
    $request->validate([
        'csv_file' => ['required', 'file', 'mimes:csv,txt'],
    ]);

    $path = $request->file('csv_file')->getRealPath();
    $file = fopen($path, 'r');

    if (!$file) {
        return back()->with('success', 'Could not read CSV file.');
    }

    $header = fgetcsv($file); // skip header

    while (($row = fgetcsv($file)) !== false) {

        if (count($row) < 9 || trim(implode('', $row)) === '') {
            continue;
        }

        Project::create([
            'title'        => $row[0],
            'type'         => $row[1],
            'description'  => $row[2] ?: null,
            'is_featured'  => !empty($row[3]),
            'year'         => (int) $row[4],
            'quarter'      => (int) $row[5],
            'hero_path'    => $row[6] ? 'projects/' . ltrim($row[6], '/') : null,
            'thumb_path'   => $row[7] ? 'projects/' . ltrim($row[7], '/') : null,
            'external_url' => $row[8] ?: null,
        ]);
    }

    fclose($file);

    return back()->with('success', 'Projects imported successfully!');
}
}