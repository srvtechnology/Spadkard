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
                    <a href="{{ route('user.logout') }}" ><i class="fas fa-power-off"></i> Logout</a>
                    <br>
                    <a href="{{ route('user.form.view') }}" ><i class="fas fa-power-off"></i> Form</a>
                    <br>
                    <a href="{{ route('user.dashboard') }}" ><i class="fas fa-power-off"></i> Dashboard</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
