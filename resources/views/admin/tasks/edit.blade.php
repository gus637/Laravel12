@extends("admin.tasks.layout")

{{--'task' => 'required|string|min:10|max:200',--}}
{{--'begindate' => 'required|date',--}}
{{--'enddate' => 'date|after_or_equal:begindate',--}}
{{--'user_id' => 'int|exists:users,id',--}}
{{--'project_id' => 'required|int|exists:projects,id',--}}
{{--'activity_id' => 'required|int|exists:activities,id',--}}
@section("content")
    <div class="card mt-6">
        <!-- header -->
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Task Admin</h1>
        </div>
        <!-- end header -->

        <!-- errors -->
        @if($errors->any())
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8"
                 style="min-width: 240px">
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- body -->
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rounded-lg px-8 pt-6 pb-8 mb-4"
                      action="{{ route('tasks.update', ["task" => $task->id])}}" method="POST">
                    @csrf
                    @method('PUT')
                    <label class="block text-sm">
                        <span class="text-gray-700">Task</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="task" value="{{ old("task", $task->task) }}" type="text" required min="10" max="200"/>
                    </label>
                    @error('task')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700">Begin Date</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="begindate" value="{{ old("begindate", $task->begindate) }}" type="date" required/>
                    </label>
                    @error('begindate')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700">End Date</span>
                        <input class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                               name="enddate" value="{{ old("enddate", $task->enddate) }}" type="date"/>
                    </label>
                    @error('enddate')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700">User</span>
                        <select class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                                name="user_id">
                            <option value="" disabled selected>Select a user</option>
                            <option value="">-- No User --</option>
                            @foreach($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id', $tesk->user_id) === $user->id ? 'selected' : '' }}>
                                    {{ $user->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    @error('user_id')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700">Project</span>
                        <select class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                                name="project_id" required>
                            <option value="" disabled selected>Select a project</option>
                            @foreach($projects as $project)
                                <option value="{{ $project->id }}" {{ old('project_id', $task->project_id) === $project->id ? 'selected' : '' }}>
                                    {{ $project->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    @error('project_id')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <label class="block text-sm">
                        <span class="text-gray-700">Activity</span>
                        <select class="bg-gray-200  block rounded w-full p-2 mt-1 focus:border-purple-400
                        focus:outline-none focus:shadow-outline-purple form-input"
                                name="activity_id" required>
                            <option value="" disabled selected>Select an activity</option>
                            @foreach($activities as $activity)
                                <option value="{{ $activity->id }}" {{ old('activity_id', $task->activity_id) === $activity->id ? 'selected' : '' }}>
                                    {{ $activity->name }}
                                </option>
                            @endforeach
                        </select>
                    </label>
                    @error('activity_id')
                    <p class="text-red-500">{{ $message }}</p>
                    @enderror
                    <button class="mt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150
                    bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700
                    focus:outline-none focus:shadow-outline-purple">update</button>
                </form>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection
