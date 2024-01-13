@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Developers</h1>
        <div class="text-right mb-3">
            <a class="btn btn-primary" href="{{ route('developers.create') }}">Create New Developer</a>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Staff ID</th>
                    <th>Associated Projects</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($developers as $developer)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $developer->name }}</td>
                        <td>{{ $developer->StaffID }}</td>
                        <td>
                            @if($developer->projects && $developer->projects->count() > 0)
                                <ul>
                                    @foreach($developer->projects as $project)
                                        <li>{{ $project->title }}</li>
                                    @endforeach
                                </ul>
                            @else
                                No projects assigned.
                            @endif
                        </td>
                        <td>
                            <a class="btn btn-info" href="{{ route('developers.show', $developer->id) }}">View</a>
                            <a class="btn btn-warning" href="{{ route('developers.edit', $developer->id) }}">Edit</a>
                            <form action="{{ route('developers.destroy', $developer->id) }}" method="POST" style="display: inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this developer?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
