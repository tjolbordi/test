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

                    @if (Auth()->user()->activation_id == 2)
                        {{ __('You are logged in! Please activate your email.') }}
                        <a href="sendemail"> Activate Email </a>
                    @else 
                        {{ __('Your Account Is Activated') }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
