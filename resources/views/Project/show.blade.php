<!-- resources/views/Project/show.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>{{ $project->title }}</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Description</td>
                        <td>{{ $project->description }}</td>
                    </tr>
                    <tr>
                        <td>Start Date</td>
                        <td>{{ $project->start_date }}</td>
                    </tr>
                    <tr>
                        <td>End Date</td>
                        <td>{{ $project->end_date }}</td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td>
                            @if($project->progressReports->count() > 0)
                                {{ $project->progressReports->last()->progress_status }}
                            @else
                                No progress report
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Lead Developer</td>
                        <td>{{ $project->leadDeveloper->name }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('projects.index') }}">Back</a>
            <a class="btn btn-primary" href="{{ route('projects.edit', $project->id) }}">Edit Project</a>
        </div>
    </div>
@endsection
