@extends('layouts.app')

@section('content')
    @if ($users->isEmpty())
        <div class="content">
            <div class="title m-b-md">
                <h1 class="text-center font-weight-bold"> There is no any applicants </h1>
            </div>
        </div>
    @endif
    @foreach($users as $user)
        <table class="table table-hover">
            <div class="container">
                <div class="row">
                    <div class="col-sm">
                        {{$user->name}} 
                    </div>
                    <div class="col-sm">
                        {{$user->last_name}}
                    </div>
                    <div class="col-sm">
                        {{$user->phone_number}}
                    </div>
                    @if ($user->employed_type_id == 2)
                        <div class="col-sm">
                            <a href="{{ url('/employ', [$user->id]) }}" class="btn btn-xs btn-info pull-right">+</a>
                            <!-- <button type="submit" class="btn btn-success" >+</button> -->
                        </div>
                    @else
                        <div class="col-sm">
                            <button type="button" class="btn btn-outline-secondary" disabled>+</button>
                        </div>
                    @endif
                </div>
            </div>
        </table>
    @endforeach
@endsection