@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('projects.update', $project) }}">
            @method('PATCH')
            @csrf

            <div class="card">
                <div class="card-header">Update Project Information</div>
                <div class="card-body">
                    <!-- Example for selecting business unit -->
                    <div class="form-group row mb-3">
                        <label for="bu_id" class="col-sm-2 col-form-label">Business Unit</label>
                        <div class="col-sm-10">
                            <select name="bu_id" class="form-control" id="bu_id" required>
                                <option value="" disabled>Select a Business Unit</option>
                                @foreach($businessUnits as $businessUnit)
                                    <option value="{{ $businessUnit->id }}" {{ $project->bu_id == $businessUnit->id ? 'selected' : '' }}>
                                        {{ $businessUnit->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('bu_id')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <!-- Additional fields -->
                    <div class="form-group row mb-3">
                        <label for="title" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                            <input type="text" name="title" class="form-control" id="title" value="{{ $project->title }}">
                            @error('title')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="description" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                            <textarea name="description" class="form-control" id="description">{{ $project->description }}</textarea>
                            @error('description')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="start_date" class="col-sm-2 col-form-label">Start Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $project->start_date }}">
                            @error('start_date')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="duration" class="col-sm-2 col-form-label">Duration</label>
                        <div class="col-sm-10">
                            <input type="number" name="duration" class="form-control" id="duration" value="{{ $project->duration }}">
                            @error('duration')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="end_date" class="col-sm-2 col-form-label">End Date</label>
                        <div class="col-sm-10">
                            <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $project->end_date }}">
                            @error('end_date')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="lead_developer_id" class="col-sm-2 col-form-label">Lead Developer</label>
                        <div class="col-sm-10">
                            <select name="lead_developer_id" class="form-control" id="lead_developer_id" required>
                                <option value="" disabled>Select a Lead Developer</option>
                                @foreach($developers as $developer)
                                    <option value="{{ $developer->id }}" {{ $project->lead_developer_id == $developer->id ? 'selected' : '' }}>
                                        {{ $developer->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('lead_developer_id')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="platform" class="col-sm-2 col-form-label">Platform</label>
                        <div class="col-sm-10">
                            <input type="text" name="platform" class="form-control" id="platform" value="{{ $project->platform }}">
                            @error('platform')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="deployment_type" class="col-sm-2 col-form-label">Deployment Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="deployment_type" class="form-control" id="deployment_type" value="{{ $project->deployment_type }}">
                            @error('deployment_type')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="development_methodology" class="col-sm-2 col-form-label">Development Methodology</label>
                        <div class="col-sm-10">
                            <input type="text" name="development_methodology" class="form-control" id="development_methodology" value="{{ $project->development_methodology }}">
                            @error('development_methodology')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>

            <div class="text-center mt-3">
                <a class="btn btn-warning" href="{{ route('projects.index') }}">Back</a>&nbsp;
                <input class="btn btn-secondary" type="reset" value="Reset"> &nbsp;
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
