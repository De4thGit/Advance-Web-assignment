@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Business Units Dashboard</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title">List of Business Units</h5>
                    </div>
                    <div class="card-body">
                        <a class="btn btn-primary mb-3" href="{{ route('business_units.create') }}">Add New Business Unit</a>

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Name</th>
                                    <th>BuID</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php($i=1)
                                @foreach($businessUnits as $unit)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $unit->BuID }}</td>
                                        <td>{{ $unit->name }}</td>
                                        <td>
                                            <form action="{{ route('business_units.destroy', $unit) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <a class="btn btn-info" href="{{ route('business_units.show', $unit) }}">Details</a>
                                                <a class="btn btn-warning" href="{{ route('business_units.edit', $unit) }}">Edit</a>
                                                <input class="btn btn-danger" type="submit" value="Delete" onclick="return confirm('Confirm DELETE?')">
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <!-- Another section or action here if needed -->
            </div>
        </div>
    </div>
@endsection
