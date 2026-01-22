<?php /** @noinspection ReturnTypeCanBeDeclaredInspection */

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProjectStoreRequest;
use App\Http\Requests\ProjectUpdateRequest;
use App\Models\Project;

use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class ProjectController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', ['projects' => $projects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProjectStoreRequest $request): RedirectResponse
    {
        $project = Project::create($request->validated());

        return to_route('projects.index')
            ->with("status", "Project $project->name is aangemaakt");
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', ['project' => $project]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', ['project' => $project]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProjectUpdateRequest $request, Project $project)
    {
        $data = $request->validated();
        $project->name = $data['name'];
        $project->description = $data['description'];
        $project->update();
        return to_route('projects.index')
            ->with("status", "Project $project->name is gewijzigd");
    }
    public function delete(Project $project)
    {
        return view('admin.projects.delete', ['project' => $project]);
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();
        return to_route('projects.index')
            ->with("status", "Project $project->name is verwijderd");
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using("show project"), only:["index"]),
            new Middleware(PermissionMiddleware::using("create project"), only:['create', 'store']),
            new Middleware(PermissionMiddleware::using("edit project"), only:['edit', 'update']),
            new Middleware(PermissionMiddleware::using("delete project"), only:['delete', 'destroy'])
        ];
    }
}
