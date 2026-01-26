<?php

namespace App\Http\Controllers\Admin;

//use App\Http\Controllers\Controller;
//use App\Models\Task;
//use App\Http\Requests\TaskStoreRequest;
//use App\Http\Requests\TaskUpdateRequest;
//use GuzzleHttp\Middleware;
//use Illuminate\Routing\Controllers\HasMiddleware;
//use Spatie\Permission\Middleware\PermissionMiddleware;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaskStoreRequest;
use App\Http\Requests\TaskUpdateRequest;
use App\Models\Task;
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
        return view("admin.tasks.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TaskStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        return view("admin.tasks.show", ["task" => $task]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view("admin.tasks.edit", ["task" => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TaskUpdateRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }

    public function delete()
    {
        return view("admin.tasks.delete");
    }

    public static function middleware(): array
    {
        return [
            new Middleware(PermissionMiddleware::using('index task'), only: ['index']),
            new Middleware(PermissionMiddleware::using('create task'), only: ['create', 'store']),
            new Middleware(PermissionMiddleware::using('show task'), only: ['show']),
            new Middleware(PermissionMiddleware::using('edit task'), only: ['edit', 'update']),
            new Middleware(PermissionMiddleware::using('delete task'), only: ['delete', 'destroy'])
        ];
    }
}
