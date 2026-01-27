@extends("admin.tasks.layout")

@section("content")
{{--
    'task' => 'required|string|max:40',
    'user_id' => 'integer|exists:users,id',
    'project_id' => 'required|exists:projects,id',
    'activity_id' => 'required|exists:activities,id',
--}}
    <div class="container mt-5">
        <h1 class="mb-4">Edit Task</h1>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="task" class="form-label">Task Name</label>
                <input type="text" class="form-control" id="task" name="task" value="{{ old('task', $task->task) }}" required maxlength="40">
            </div>
            <div class="mb-3">
                <label for="user" class="form-label">Assign to User</label>
                <select class="form-select" id="user" name="user" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ (old('user', $task->user->id) === $user->id) ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="project" class="form-label">Project</label>
                <select class="form-select" id="project" name="project" required>
                    @foreach($projects as $project)
                        <option value="{{ $project->id }}" {{ (old('project', $task->project->id) === $project->id) ? 'selected' : '' }}>
                            {{ $project->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="activity" class="form-label">Activity</label>
                <select class="form-select" id="activity" name="activity" required>
                    @foreach($activities as $activity)
                        <option value="{{ $activity->id }}" {{ (old('activity', $task->activity->id) === $activity->id) ? 'selected' : '' }}>
                            {{ $activity->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
