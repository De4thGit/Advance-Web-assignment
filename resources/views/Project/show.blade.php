<!-- resources/views/ProgressReport/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <!-- Display progress report details -->
        <div class="card">
            <div class="card-header"><h1>Progress Report Details</h1></div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>ID</td>
                        <td>{{ $progressReport->id }}</td>
                    </tr>
                    <tr>
                        <td>Project</td>
                        <td>{{ $progressReport->project->title }}</td>
                    </tr>
                    <tr>
                        <td>Date of Progress</td>
                        <td>{{ $progressReport->date_of_progress }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>{{ $progressReport->progress_status }}</td>
                    </tr>
                    <tr>
                        <td>Description</td>
                        <td>{{ $progressReport->progress_description }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('progress_reports.index') }}">Back</a>
            <a class="btn btn-primary" href="{{ route('progress_reports.edit', $progressReport->id) }}">Edit Details</a>
        </div>
    </div>
@endsection
