@extends('layouts.layoutadmin')

@include('admin.projects.topmenu')

@section('content')
    <div class="card mt-6">
        <!-- header -->
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Project Admin</h1>
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
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                    <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b bg-gray-50">
                        <th class="px-4 py-3">Id</th>
                        <th class="px-4 py-3">Naam</th>
                        <th class="px-4 py-3">Description</th>
                        <th class="px-4 py-3">Details</th>
                        @can("edit project")
                        <th class="px-4 py-3">Edit</th>
                        @endcan
                        @can("delete project")
                        <th class="px-4 py-3">Delete</th>
                        @endcan
                    </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                    @foreach($projects as $project)
                        <tr class="text-gray-700">
                            <td class="px-4 py-3 text-sm">{{ $project->id }}</td>
                            <td class="px-4 py-3 text-sm">{{ $project->name, 20}}</td>
                            <td class="px-4 py-3 text-sm">{{ Str::limit($project->description, 30) }}</td>
                            <td class="px-4 py-3 text-sm"><a href="{{ route("projects.show", $project) }}">Details</a></td>
                            @can("edit project")
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route("projects.edit", $project) }}">Wijzigen</a>
                                </div>
                            </td>
                            @endcan
                            @can("delete project")
                            <td>
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{ route("projects.delete", $project) }}">Verwijderen</a>
                                </div>
                            </td>
                            @endcan
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- end body -->
    </div>
@endsection
