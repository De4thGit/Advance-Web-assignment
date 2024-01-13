@extends('layouts.app')
@section('content')
    <div class="container">
        <form method="POST" action="{{ route('developers.store') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">Add New Developer</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" required>
                            @error('name')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="StaffID" class="col-sm-2 col-form-label">Staff ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="StaffID" class="form-control" id="StaffID" required>
                            @error('StaffID')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center">
                <a class="btn btn-warning" href="{{ route('developers.index') }}">Back</a>
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
