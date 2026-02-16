<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function coversIndex()
    {
        $covers = Project::where('type', 'cover')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('covers.index', compact('covers'));
    }

    public function layoutsIndex()
    {
        $layouts = Project::where('type', 'layout')
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        return view('layouts.index', compact('layouts'));
    }

    public function eblastsIndex()
    {
        $eblasts = Project::where('type', 'eblast')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('eblasts.index', compact('eblasts'));
    }

    public function projectsIndex()
    {
        $projects = Project::orderBy('type', 'asc')->paginate(10);

        return view('projects.index', compact('projects'));

    }

    public function coverShow(Project $project)
    {
        // Previous cover project
        $previous = Project::where('type', 'cover')
            ->where('id', '<', $project->id)
            ->orderBy('id', 'desc')
            ->first();

        // Next cover project
        $next = Project::where('type', 'cover')
            ->where('id', '>', $project->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('covers.show', compact('project', 'previous', 'next'));
    }

    public function layoutShow(Project $project)
    {
        // Previous cover project
        $previous = Project::where('type', 'layout')
            ->where('id', '<', $project->id)
            ->orderBy('id', 'desc')
            ->first();

        // Next cover project
        $next = Project::where('type', 'layout')
            ->where('id', '>', $project->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('layouts.show', compact('project', 'previous', 'next'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:projects,slug',
            'type' => 'required|string|max:50',
            'year' => ['required', 'integer', 'between:1900,'.(now()->year + 1)],
            'quarter' => ['required', 'integer', 'between:1,4'],
            'description' => 'nullable|string',
            'is_featured' => 'boolean',
        ]);

        $validated['slug'] = $validated['slug']
            ?? Str::slug($validated['title']);

        $validated['is_featured'] = $request->boolean('is_featured');

        Project::create($validated);

        return redirect()
            ->route('projects.index')
            ->with('success', 'Project created successfully.');
    }

    public function toggleFeatured(Project $project)
    {
        $project->update([
            'is_featured' => ! $project->is_featured,
        ]);

        return back()
            ->with('success', 'Project updated.');
    }

    public function destroy(Project $project)
    {
        $project->delete();

        return redirect()
            ->back()
            ->with('success', 'Project deleted.');
    }
}
