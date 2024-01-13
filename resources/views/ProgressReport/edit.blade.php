<!-- resources/views/ProgressReport/edit.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('progress_reports.update', $progressReport->id) }}">
            @csrf
            @method('PUT')
            <div class="card mb-3">
                <div class="card-header">Edit Progress Report</div>
                <div class="card-body">
                    <!-- Add form fields as needed -->
                    <div class="form-group row mb-3">
                        <label for="project_id" class="col-sm-2 col-form-label">Project</label>
                        <div class="col-sm-10">
                            <select name="project_id" class="form-control" id="project_id" required>
                                <option value="" disabled>Select a Project</option>
                                @foreach($projects as $project)
                                    <option value="{{ $project->id }}" {{ $progressReport->project_id == $project->id ? 'selected' : '' }}>
                                        {{ $project->title }}
                                    </option>
                                @endforeach
                            </select>
                            @error('project_id')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <!-- Add other form fields -->
                    <div class="form-group row mb-3">
                        <label for="date_of_progress" class="col-sm-2 col-form-label">Date of Progress</label>
                        <div class="col-sm-10">
                            <input type="date" name="date_of_progress" class="form-control" id="date_of_progress" value="{{ $progressReport->date_of_progress }}" required>
                            @error('date_of_progress')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="progress_status" class="col-sm-2 col-form-label">Progress Status</label>
                        <div class="col-sm-10">
                            <select name="progress_status" class="form-control" id="progress_status" required>
                                <option value="" disabled selected>Select Progress Status</option>
                                <option value="ahead_of_schedule" {{ $progressReport->progress_status === 'ahead_of_schedule' ? 'selected' : '' }}>Ahead of Schedule</option>
                                <option value="on_schedule" {{ $progressReport->progress_status === 'on_schedule' ? 'selected' : '' }}>On Schedule</option>
                                <option value="delayed" {{ $progressReport->progress_status === 'delayed' ? 'selected' : '' }}>Delayed</option>
                                <option value="completed" {{ $progressReport->progress_status === 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                            @error('progress_status')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="progress_description" class="col-sm-2 col-form-label">Progress Description</label>
                        <div class="col-sm-10">
                            <textarea name="progress_description" class="form-control" id="progress_description" required>{{ $progressReport->progress_description }}</textarea>
                            @error('progress_description')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('progress_reports.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Update">
            </div>
        </form>
    </div>
@endsection
