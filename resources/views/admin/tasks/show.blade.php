@extends("admin.tasks.layout")

{{--Task id--}}
{{--De task--}}
{{--Begindate--}}
{{--Enddate, indien beschikbaar, anders toon je 'N/A'--}}
{{--De user met naam, indien beschikbaar, anders toon je 'N/A'--}}
{{--De projectnaam--}}
{{--De activity status--}}
{{--Datum van het aanmaken van de task--}}

@section("content")
    <div class="card mt-6">
        <!-- header -->
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">Taak Details</h1>
        </div>
        <!-- end header -->
        <!-- body -->
        <div class="card-body grid grid-cols-1 gap-7 lg:grid-cols-1">
            <table class="table table-bordered backdrop-grayscale">
                <tbody class="bg-white divide-y">
                    <tr>
                        <th>ID</th>
                        <td>{{ $task->id }}</td>
                    </tr>
                    <tr>
                        <th>Taak</th>
                        <td>{{ $task->task }}</td>
                    </tr>
                    <tr>
                        <th>Begindatum</th>
                        <td>{{ $task->begindate }}</td>
                    </tr>
                    <tr>
                        <th>Einddatum</th>
                        <td>{{ $task->enddate ?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Gebruiker</th>
                        <td>{{ $task->user?->name?? 'N/A' }}</td>
                    </tr>
                    <tr>
                        <th>Project</th>
                        <td>{{ $task->project->name }}</td>
                    </tr>
                    <tr>
                        <th>Activity Status</th>
                        <td>{{ $task->activity->name }}</td>
                    </tr>
                    <tr>
                        <th>Aangemaakt op</th>
                        <td>{{ $task->created_at }}</td>
                    </tr>
@endsection
