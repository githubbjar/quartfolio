<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    // Public-facing index and show methods

    // covers -- index and show, with previous/next navigation
    public function coversIndex()
    {
        $covers = Project::where('type', 'cover')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('covers.index', compact('covers'));
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

    // layouts -- index and show, similar to covers but separate views and pagination
    public function layoutsIndex()
    {
        $layouts = Project::where('type', 'layout')
            ->orderBy('created_at', 'desc')
            ->paginate(4);

        return view('layouts.index', compact('layouts'));
    }

    public function layoutShow(Project $project)
    {
        // Previous layout project
        $previous = Project::where('type', 'layout')
            ->where('id', '<', $project->id)
            ->orderBy('id', 'desc')
            ->first();

        // Next layout project
        $next = Project::where('type', 'layout')
            ->where('id', '>', $project->id)
            ->orderBy('id', 'asc')
            ->first();

        return view('layouts.show', compact('project', 'previous', 'next'));
    }

    // eblasts -- index only, no show page

    public function eblastsIndex()
    {
        $eblasts = Project::where('type', 'eblast')
            ->orderBy('created_at', 'desc')
            ->paginate(3);

        return view('eblasts.index', compact('eblasts'));
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

        // checkbox safety
        $data['is_featured'] = (bool) $request->input('is_featured', false);

        // Create a base slug from title
        $baseSlug = Str::slug($data['title']);

        // Ensure uniqueness (salvo-issue-76, salvo-issue-76-2, etc.)
        $slug = $baseSlug;
        $i = 2;
        while (Project::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$i}";
            $i++;
        }

        $data['slug'] = $slug;

        // Auto-generate image paths (served via public/storage after storage:link)
        // Files should live at: storage/app/public/projects/{slug}-hero.webp and -thumb.webp
        $data['hero_path'] = "storage/projects/{$slug}-hero.webp";
        $data['thumb_path'] = "storage/projects/{$slug}-thumb.webp";

        Project::create($data);

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
