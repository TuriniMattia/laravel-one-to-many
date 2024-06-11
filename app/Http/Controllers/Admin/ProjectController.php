<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_name' => 'required|max:150|unique:projects',
            'project_description' => 'required|max:500',
            'github_link' => 'url:http,https',
        ]);


        // dd($request->all());
        $form_data = $request->all();
        $form_data['slug'] = Str::slug($form_data['project_name']);

        $new_project = Project::create($form_data);

        return redirect()->route('admin.projects.show', $new_project);

        // $project = Project::create(
        //     $request->only('project_name', 'project_description') +
        //         [
        //             'slug' => $request->project_name,
        //         ]
        // );
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        //
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        //
    }
}
