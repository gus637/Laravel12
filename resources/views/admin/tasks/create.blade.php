@extends("admin.tasks.layout")

{{--'task' => 'required|string|min:10|max:200',--}}
{{--'begindate' => 'required|date',--}}
{{--'enddate' => 'date|after_or_equal:begindate',--}}
{{--'user_id' => 'int|exists:users,id',--}}
{{--'project_id' => 'required|int|exists:projects,id',--}}
{{--'activity_id' => 'required|int|exists:activities,id',--}}
@section("content")
    <form method="POST" action="{{ route('tasks.store') }}" class="mt-4">
        @csrf
        <div class="mb-3">
            <label for="task" class="form-label">Task</label>
            <input type="text" class="form-control" id="task" name="task" value="{{ old('task') }}" required maxlength="200" minlength="10">
            @error('task')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="begindate" class="form-label">Begin Date</label>
            <input type="date" class="form-control" id="begindate" name="begindate" value="{{ old('begindate') }}" required>
            @error('begindate')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="enddate" class="form-label">End Date</label>
            <input type="date" class="form-control" id="enddate" name="enddate" value="{{ old('enddate') }}">
            @error('enddate')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label">User</label>
            <select class="form-select" id="user_id" name="user_id">
                <option value="" disabled selected>Select a user</option>
                <option value="">-- No User --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}" {{ old('user_id') === $user->id ? 'selected' : '' }}>
                        {{ $user->name }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="project_id" class="form-label">Project</label>
            <select class="form-select" id="project_id" name="project_id" required>
                <option value="" disabled selected>Select a project</option>
                @foreach($projects as $project)
                    <option value="{{ $project->id }}" {{ old('project_id') === $project->id ? 'selected' : '' }}>
                        {{ $project->name }}
                    </option>
                @endforeach
            </select>
            @error('project_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="activity_id" class="form-label">Activity</label>
            <select class="form-select" id="activity_id" name="activity_id" required>
                <option value="" disabled selected>Select an activity</option>
                @foreach($activities as $activity)
                    <option value="{{ $activity->id }}" {{ old('activity_id') === $activity->id ? 'selected' : '' }}>
                        {{ $activity->name }}
                    </option>
                @endforeach
            </select>
            @error('activity_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create Task</button>
    </form>
@endsection
