<!-- resources/views/Project/index.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <a class="btn btn-primary" href="{{ route('projects.create') }}">Create New Project</a>
        <table class="table mt-3">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Lead Developer</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                    <tr>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->description }}</td>
                        <td>{{ $project->start_date }}</td>
                        <td>{{ $project->end_date }}</td>
                        <td>
                            @if($project->progressReports->count() > 0)
                                {{ $project->progressReports->last()->progress_status }}
                            @else
                                No progress report
                            @endif
                        </td>
                        <td>{{ $project->leadDeveloper->name }}</td>
                        <td>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">Show</a>
                            <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning">Edit</a>
                            <form method="POST" action="{{ route('projects.destroy', $project->id) }}" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this project?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
