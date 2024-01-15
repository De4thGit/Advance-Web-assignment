<!-- resources/views/Project/create.blade.php -->
@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('projects.store') }}">
            @csrf

            

            <div class="card mb-3">
                <div class="card-header">Add New Project</div>
                <div class="card-body">

                <div class="form-group row mb-3">
                        <label for="bu_id" class="col-sm-2 col-form-label">Business Unit</label>
                        <div class="col-sm-10">
                            <select name="bu_id" class="form-control" id="bu_id" required>
                                <option value="" disabled selected>Select a Business Unit</option>
                                @foreach($businessUnits as $businessUnit)
                                    <option value="{{ $businessUnit->id }}">{{ $businessUnit->name }}</option>
                                @endforeach
                            </select>
                            @error('bu_id')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title">
                            @error('title')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" id="description" rows="3"></textarea>
                            @error('description')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" class="form-control" id="start_date">
                            @error('start_date')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="number" name="duration" class="form-control" id="duration">
                            @error('duration')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="end_date" class="form-control" id="end_date">
                            @error('end_date')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    
                    <div class="form-group row mb-3">
                        <label for="platform" class="col-sm-2 col-form-label">Platform</label>
                        <div class="col-sm-10">
                            <input type="text" name="platform" class="form-control" id="platform">
                            @error('platform')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="deployment_type" class="col-sm-2 col-form-label">Deployment Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="deployment_type" class="form-control" id="deployment_type">
                            @error('deployment_type')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="development_methodology" class="col-sm-2 col-form-label">Development Methodology</label>
                        <div class="col-sm-10">
                            <input type="text" name="development_methodology" class="form-control" id="development_methodology">
                            @error('development_methodology')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('projects.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
