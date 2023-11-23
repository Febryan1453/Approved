@extends('layouts.app')

@section('title', 'Proses Aproved')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Proses Aproved') }}</div>

                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Birth Date</th>
                                <th scope="col">Status</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $key => $user)
                                <tr>
                                    <th scope="row">{{ $key + 1 }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->birthdate }}</td>
                                    <td>{{ $user->status }}</td>
                                    <td>
                                        {{-- Actions, for example, a link to edit --}}
                                        <span style="color: blue; cursor: pointer;"
                                        onclick="event.preventDefault();
                                                        document.getElementById('approve-form-{{ $user->id }}').submit();">
                                            {{ __('Approve') }}
                                        </span>

                                        <form id="approve-form-{{ $user->id }}" action="{{ route('admin.approved',$user->id) }}" method="POST" class="d-none">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No data available</td>
                                </tr>
                                @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
