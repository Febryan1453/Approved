@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('My Profile') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <div class="mb-3">
                        <h5><strong>Name:</strong> {{ auth()->user()->name }}</h5>
                        <h5><strong>Email:</strong> {{ auth()->user()->email }}</h5>
                        <h5><strong>Status:</strong> {{ auth()->user()->status }}</h5>
                        <h5><strong>Birthdate:</strong> {{ auth()->user()->birthdate }}</h5>
                    </div>

                    <a href="#" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
