@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <!-- Add buttons to link to index pages -->
                    <div class="mt-3">
                        <a href="{{ route('business_units.index') }}" class="btn btn-primary">Business Units</a>
                        <a href="{{ route('projects.index') }}" class="btn btn-primary">Projects</a>
                        <a href="{{ route('developers.index') }}" class="btn btn-primary">Developers</a>
                        <a href="{{ route('progress_reports.index') }}" class="btn btn-primary">Progress Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
