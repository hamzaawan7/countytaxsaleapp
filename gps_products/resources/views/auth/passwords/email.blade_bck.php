@extends('layouts.main')
@section('title', 'GPS Product | Forgot Username')
@section('content')

    <div class="container">
        <div class="row">
            <div class="locksreen-col text-center  wow fadeInUp">
                @include('layouts.message')
                <a href="{{ route('/') }}">
                    <img src="{{ asset('asset/images/tax.png') }}" class="img-responsive">
                </a>
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    {{ csrf_field() }}
                    <div class="input-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                        <input id="email" type="text" class="form-control" name="email" placeholder="jhondoe@gmail.com" value="{{ old('email') }}" autofocus>
                    </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                    @endif
                    <br>
                    <button type="submit" class="btn btn-theme btn-lg btn-block ">Send Email</button><br>
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('estatus') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
    </div>
@stop