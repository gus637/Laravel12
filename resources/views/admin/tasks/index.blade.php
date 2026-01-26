@extends("layouts.layoutadmin")


@section("content")
    <div class="container mt-5">
        <h1 class="mb-4">Tasks Management</h1>
        <table class="table table-bordered backdrop-grayscale">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Task</th>
                    <th>Begindatum</th>
                    <th>Einddatum</th>
                    <th>Gebruiker</th>
                    <th>Project</th>
                    <th>activity</th>
                    @can('view tasks')
                        <th>view</th>
                    @endcan
                    @can('edit tasks')
                        <th>edit</th>
                    @endcan
                    @can('delete tasks')
                        <th>delete</th>
                    @endcan
                </tr>
            </thead>
            <tbody class="">
                @foreach($tasks as $task)
                    <tr>
                        <td>{{ $task->id }}</td>
                        <td>{{ Str::limit($task->task, 50) }}</td>
                        <td>{{ $task->begindate }}</td>
                        <td>{{ $task->enddate ?? '' }}</td>
                        <td>{{ $task->user->name ?? "N/A" }}</td>
                        <td>{{ Str::limit($task->project->name, 50) }}</td>
                        <td>{{ $task->activity->name }}</td>
                        @can('view task')
                        <td><a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a></td>
                        @endcan
                        @can('edit task')
                        <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a></td>
                        @endcan
                        @can('delete task')
                        <td><a href="{{ route('admin.tasks.delete', $task->id) }}" class="btn btn-danger">Delete</a></td>
                        @endcan
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div>
        {{ $tasks->links() }}
    </div>
@endsection
