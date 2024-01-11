@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Business Unit Details</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Business Unit ID</td>
                        <td>{{ $businessUnit->BuID }}</td>
                    </tr>
                    <tr>
                        <td>Business Unit Name</td>
                        <td>{{ $businessUnit->name }}</td>
                    </tr>
                    <tr>
                        <td>Associated Projects</td>
                        <td>
                            @if($businessUnit->projects->count() > 0)
                                <ul>
                                    @foreach($businessUnit->projects as $project)
                                        <li>{{ $project->title }}</li>
                                    @endforeach
                                </ul>
                            @else
                                No projects associated.
                            @endif
                        </td>
                    </tr>
                    <!-- Add other fields as needed -->

                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('business_units.index') }}">Back</a>
        </div>
    </div>
@endsection
