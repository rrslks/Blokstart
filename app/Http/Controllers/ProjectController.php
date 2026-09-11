<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Tag;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $projects = Project::with('tags', 'images')
        ->when($request->tag, function ($query, $tag) {
            $query->whereHas('tags', fn ($q) => $q->where('name', $tag));
        })
        ->latest()
        ->get();

    $tags = Tag::all();

    return view('projects.index', compact('projects', 'tags'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $tags = Tag::all();
    return view('projects.create', compact('tags'));
}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'images.*' => 'nullable|image|max:4096',
        'tags' => 'nullable|array',
    ]);

    $project = Project::create($validated);

    foreach ($request->file('images', []) as $file) {
    if (!$file || !$file->isValid()) {
        continue;
    }

    $path = $file->store('projects', 'public');
    $project->images()->create(['path' => $path]);
}

    $project->tags()->sync($request->input('tags', []));

    return redirect()->route('projects.index');
}

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
{
    $project->load('images', 'tags');
    return view('projects.show', compact('project'));
}

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
{
    $project->load('tags');
    $tags = Tag::all();
    return view('projects.edit', compact('project', 'tags'));
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'images.*' => 'nullable|image|max:4096',
        'tags' => 'nullable|array',
    ]);

    $project->update($validated);

    foreach ($request->file('images', []) as $file) {
    if (!$file || !$file->isValid()) {
        continue;
    }

    $path = $file->store('projects', 'public');
    $project->images()->create(['path' => $path]);
}

    $project->tags()->sync($request->input('tags', []));

    return redirect()->route('projects.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
{
    $project->delete();
    return redirect()->route('projects.index');
}
}
