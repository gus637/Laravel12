@extends("admin.tasks.layout")


@section("content")
    <div class="card mt-6">
        <!-- header -->
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Taak Admin</h1>
        </div>
        <!-- end header -->
        @if(session('status'))
            <div class="card-body">
                <div class="bg-green-400 text-green-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">{{ session('status') }}</div>
            </div>
        @endif
        @if(session('status-wrong'))
            <div class="card-body">
                <div class="bg-red-400 text-red-800 rounded-lg shadow-md p-6 pr-10 mb-8" style="min-width: 240px">{{ session('status-wrong') }}</div>
            </div>
        @endif
        <!-- body -->
        <div class="card-body grid grid-cols-1 gap-7 lg:grid-cols-1">
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
                        @can('show tasks')
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
                <tbody class="bg-white divide-y">
                    @foreach($tasks as $task)
                        <tr>
                            <td>{{ $task->id }}</td>
                            <td>{{ Str::limit($task->task, 50) }}</td>
                            <td>{{ $task->begindate }}</td>
                            <td>{{ $task->enddate ?? '' }}</td>
                            <td>{{ $task->user->name ?? "N/A" }}</td>
                            <td>{{ Str::limit($task->project->name, 50) }}</td>
                            <td>{{ $task->activity->name }}</td>
                            @can('show task')
                            <td><a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info">View</a></td>
                            @endcan
                            @can('edit task')
                            <td><a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a></td>
                            @endcan
                            @can('delete task')
                            <td><a href="{{ route('tasks.delete', $task->id) }}" class="btn btn-danger">Delete</a></td>
                            @endcan
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div>
            {{ $tasks->links() }}
        </div>
    <!-- end body -->
    </div>
@endsection
