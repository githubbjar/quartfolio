<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    // Public-facing index and show methods

    // covers -- index and show, with previous/next navigation
    public function coversIndex()
    {
        $covers = Project::where('type', 'cover')
            ->orderByDesc('id')
            ->paginate(9);

        return view('covers.index', compact('covers'));
    }

    public function coverShow(Project $project)
    {
        abort_unless($project->type === 'cover', 404);

        // "Previous" in the index (id DESC) = higher id (newer insert)
        $previous = Project::where('type', 'cover')
            ->where('id', '>', $project->id)
            ->orderBy('id')          // smallest id greater than current (closest previous)
            ->first();

        // "Next" in the index (id DESC) = lower id
        $next = Project::where('type', 'cover')
            ->where('id', '<', $project->id)
            ->orderByDesc('id')      // largest id less than current (closest next)
            ->first();

        return view('covers.show', compact('project', 'previous', 'next'));
    }

    // layouts -- index and show, similar to covers but separate views and pagination
    public function layoutsIndex()
    {
        $layouts = Project::where('type', 'layout')
            ->orderByDesc('id')
            ->paginate(8);

        $featuredLayout = Project::where('type', 'layout')
            ->where('is_featured', 1)
            ->inRandomOrder()
            ->first();

        return view('layouts.index', compact('layouts', 'featuredLayout'));
    }

    public function layoutShow(Project $project)
    {
        abort_unless($project->type === 'layout', 404);

        // "Previous" in the index (id DESC) = higher id (newer insert)
        $previous = Project::where('type', 'layout')
            ->where('id', '>', $project->id)
            ->orderBy('id')          // smallest id greater than current (closest previous)
            ->first();

        // "Next" in the index (id DESC) = lower id
        $next = Project::where('type', 'layout')
            ->where('id', '<', $project->id)
            ->orderByDesc('id')      // largest id less than current (closest next)
            ->first();

        return view('layouts.show', compact('project', 'previous', 'next'));
    }

    // promotions -- index and show, similar to covers but separate views and pagination

    public function promotionsIndex()
    {
        $promotions = Project::where('type', 'promotion')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('promotions.index', compact('promotions'));
    }

    public function promotionShow(Project $project)
    {
        abort_unless($project->type === 'promotion', 404);

        $previous = Project::where('type', 'promotion')
            ->where('created_at', '>', $project->created_at)
            ->orderBy('created_at')
            ->first();

        $next = Project::where('type', 'promotion')
            ->where('created_at', '<', $project->created_at)
            ->orderBy('created_at', 'desc')
            ->first();

        return view('promotions.show', compact('project', 'previous', 'next'));
    }

    // eblasts -- index only, no show page

    public function eblastsIndex()
    {
        $eblasts = Project::where('type', 'eblast')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('eblasts.index', compact('eblasts'));
    }

    public function eblastShow(Project $project)
    {
        // Previous eblast project
        $previous = Project::where('type', 'eblast')
            ->where('id', '<', $project->id)
            ->orderBy('id', 'desc')
            ->first();

        // Next eblast project
        $next = Project::where('type', 'eblast')
            ->where('id', '>', $project->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('eblasts.show', compact('project', 'previous', 'next'));
    }

    // admin-facing index, create, store, toggleFeatured, and destroy methods

    public function projectsIndex()
    {
        $projects = Project::orderBy('type', 'asc')
            ->orderBy('year', 'desc')      // newest year first
            ->orderBy('quarter', 'desc')   // newest quarter first
            ->paginate(20);

        return view('projects.index', compact('projects'));

    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'type' => ['required', 'string', 'max:50'],
            'year' => ['required', 'integer', 'between:1900,'.(now()->year + 1)],
            'quarter' => ['required', 'integer', 'between:1,4'],
            'description' => ['nullable', 'string'],
            'is_featured' => ['nullable', 'boolean'],
            'external_url' => ['nullable', 'url'],
        ]);

        $data['is_featured'] = (bool) $request->input('is_featured', false);

        // Create project (slug auto-generated in model)
        $project = Project::create($data);

        // Set image paths based on final slug
        $project->update([
            'hero_path' => "projects/{$project->slug}-hero.webp",
            'thumb_path' => "projects/{$project->slug}-thumb.webp",
        ]);

        return redirect()
            ->route('admin.projects.index')
            ->with('status', 'Project created.');
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
            ->route('admin.projects.index')
            ->with('success', 'Project deleted.');
    }
}
