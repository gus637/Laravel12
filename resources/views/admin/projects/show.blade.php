@extends('layouts.layoutadmin')
@include('admin.projects.topmenu')
@section('content')
    <div class="card mt-6">
        <!-- header -->
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Project Details</h1>
        </div>
        <!-- end header -->
        <!-- content -->
        <div class="py-4 px-6">
            <h2 class="text-sm font-semibold text-gray-800">Project details</h2>
            <p class="py-2 text-sm text-gray-700">Id: {{ $project->id }}</p>
            <p class="py-2 text-sm text-gray-700">Naam: {{ $project->name }}</p>
            <p class="py-2 text-sm text-gray-700">Datum: {{ $project->created_at }}</p>

            <p class="py-2 text-sm text-gray-700">Beschrijving:<br>
                {{ $project->description }}
            </p>

        </div>
        <!-- end content -->
    </div>

@endsection
