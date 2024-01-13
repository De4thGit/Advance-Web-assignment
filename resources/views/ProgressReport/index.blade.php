@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="mb-3">
            <a class="btn btn-success" href="{{ route('progress_reports.create') }}">Create Progress Report</a>
        </div>
        <!-- Display progress reports in a table -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Project</th>
                    <th>Date of Progress</th>
                    <th>Status</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($progressReports as $progressReport)
                    <tr>
                        <td>{{ $progressReport->id }}</td>
                        <td>{{ $progressReport->project->title }}</td>
                        <td>{{ $progressReport->date_of_progress }}</td>
                        <td>{{ $progressReport->progress_status }}</td>
                        <td>{{ $progressReport->progress_description }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('progress_reports.show', $progressReport->id) }}">View</a>
                            <a class="btn btn-warning" href="{{ route('progress_reports.edit', $progressReport->id) }}">Edit</a>
                            <!-- Add delete button if needed -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
