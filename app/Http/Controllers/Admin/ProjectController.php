<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use League\CommonMark\Normalizer\SlugNormalizer;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::orderBy('name', 'asc')->get();
        // dd($types);
        return view('admin.projects.create', compact('types'));
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
            'type_id' => 'nullable|exists:types,id',
        ]);


        // dd($request->all());
        $form_data = $request->all();
        $slug = Str::slug($form_data['project_name']);
        $n = 0;
        do {
            $find = Project::where('slug', $slug)->first();
            if ($find !== null) {
                $n++;
                $slug = $slug . '-' . $n;
            }
        } while ($find !== null);

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

        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $types = Type::orderBy('name', 'asc')->get();
        return view('admin.projects.edit', compact('project', 'types'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'project_name' => ['required', 'max:150', Rule::unique('projects')->ignore($project->id)],
            'project_description' => 'required|max:500',
            'slug' => ['required', 'max:255', Rule::unique('projects')->ignore($project->id)],
            'github_link' => 'url:http,https',
            'type_id' => 'nullable|exists:types,id',
        ]);

        $form_data = $request->all();
        $project->update($form_data);
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return view('admin.projects.index');
    }
}
