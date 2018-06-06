@extends('layouts.theme_main')
@section('title', 'County Tax Sale App (CTSA) | Forgot Password')
@section('content')

    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="locksreen-col text-center  wow fadeInUp">
            {{--@include('layouts.message')--}}
            <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                {{ csrf_field() }}
                <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input id="email" type="text" class="form-control" name="email" placeholder="jhondoe@gmail.com"
                           value="{{ old('email') }}" autofocus>
                </div>
                @if ($errors->has('email'))
                    <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                @endif
                <br>
                <button type="submit" class="btn btn-blue btn-lg btn-block ">Send Email</button>
                <br>
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('estatus') }}
                    </div>
                @endif
            </form>
        </div>
    </div>
    <div class="col-md-4">
    </div>
@stop