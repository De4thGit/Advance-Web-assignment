<!-- resources/views/Developer/show.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h1>Developer Details</h1>
            </div>
            <div class="card-body">
                <table class="table">
                    <tr>
                        <td>Developer ID</td>
                        <td>{{ $developer->id }}</td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>{{ $developer->name }}</td>
                    </tr>
                    <tr>
                        <td>Staff ID</td>
                        <td>{{ $developer->StaffID }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="text-center mt-3">
            <a class="btn btn-warning" href="{{ route('developers.index') }}">Back</a>
            <a class="btn btn-primary" href="{{ route('developers.edit', $developer->id) }}">Edit Details</a>
        </div>
    </div>
@endsection
