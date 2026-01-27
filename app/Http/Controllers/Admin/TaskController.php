<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Activity;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Spatie\Permission\Middleware\PermissionMiddleware;

class TaskController extends Controller implements HasMiddleware
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::with(["project", "activity"])->paginate(15);
        return view("admin.tasks.index", ["tasks" => $tasks]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.tasks.create", [
            "users" => User::all(),
            "projects" => Project::all(),
            "activities" => Activity::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request): RedirectResponse
    {
        /** Validate the request data
         * @var array{
         *     task: string,
         *     begindate: string,
         *     enddate: string|null,
         *     user_id: int|null,
         *     project_id: int,
         *     activity_id: int
         * } $data
         */
        $data = $request->validated();
//        dd($data);
//         Create a new Task instance and save it to the database
        $task = new Task();
        $task->task = $data['task'];
        $task->begindate = $data['begindate'];
        $task->enddate = $data['enddate'] ?? null;
        $task->user_id = $data['user_id'] ?? null;
        $task->project_id = $data['project_id'];
        $task->activity_id = $data['activity_id'];
        $task->save();

        return to_route("tasks.index")
            ->with("status", "Taak: $task->task is aangemaakt");
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view("admin.tasks.show", [
            "task" => $task,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view("admin.tasks.edit", [
            "task" => $task,
            "users" => User::all(),
            "projects" => Project::all(),
            "activities" => Activity::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        $task->update($request->validated());
        return to_route("tasks.index")
            ->with("status", "Taak $task->task is aangepast");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task): void
    {
        //

    }

    public function delete()
    {
//        return view("admin.tasks.delete");
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using("index task"), only:['index']),
            new Middleware(PermissionMiddleware::using("show task"), only:["show"]),
            new Middleware(PermissionMiddleware::using("create task"), only:['create', 'store']),
            new Middleware(PermissionMiddleware::using("edit task"), only:['edit', 'update']),
            new Middleware(PermissionMiddleware::using("delete task"), only:['delete', 'destroy'])
        ];
    }
}
