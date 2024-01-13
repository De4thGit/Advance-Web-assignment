<!-- resources/views/Developer/edit.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('developers.update', $developer->id) }}">
            @csrf
            @method('PUT')
            <div class="card mb-3">
                <div class="card-header">Edit Developer Details</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" value="{{ $developer->name }}" required>
                            @error('name')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="StaffID" class="col-sm-2 col-form-label">Staff ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="StaffID" class="form-control" id="StaffID" value="{{ $developer->StaffID }}" required>
                            @error('StaffID')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="project_id" class="col-sm-2 col-form-label">Project</label>
                        <div class="col-sm-10">
                            <select name="project_id" class="form-control" id="project_id" required>
                                <option value="" disabled>Select a Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ $developer->project_id == $project->id ? 'selected' : '' }}>{{ $project->title }}</option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('developers.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
