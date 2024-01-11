@extends('layouts.app')

@section('content')
    <div class="container">
        <form method="POST" action="{{ route('business_units.update', $businessUnit) }}">
            @method('PATCH')
            @csrf

            <div class="card">
                <div class="card-header">Update Business Unit Information</div>
                <div class="card-body">
                    <div class="form-group row mb-3">
                        <label for="BuID" class="col-sm-2 col-form-label">Business Unit ID</label>
                        <div class="col-sm-10">
                            <input type="text" name="BuID" class="form-control" id="BuID" value="{{ $businessUnit->BuID }}">
                            @error('BuID')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="name" class="col-sm-2 col-form-label">Business Unit Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="name" class="form-control" id="name" value="{{ $businessUnit->name }}">
                            @error('name')
                                <strong style="width: 100%; margin-top: 0.25rem; font-size: 80%; color: #e3342f;">{{ $message }}</strong>
                            @enderror
                        </div>
                    </div>
                    <!-- Add more fields as needed for business unit edit -->

                </div>
            </div>

            <div class="text-center mt-3">
                <a class="btn btn-warning" href="{{ route('business_units.index') }}">Back</a>&nbsp;
                <input class="btn btn-secondary" type="reset" value="Reset"> &nbsp;
                <input class="btn btn-primary" type="submit" value="Submit">
            </div>
        </form>
    </div>
@endsection
