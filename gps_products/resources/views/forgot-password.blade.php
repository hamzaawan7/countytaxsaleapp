@extends('layouts.main')
@section('title', 'GPS Product | Sign In')
@section('content')

        <div class="container">
            <div class="row">
                <div class="locksreen-col text-center  wow fadeInUp">
                    @include('layouts.message')
                    <img src="{{ asset('asset/images/tax.png') }}" class="img-responsive">
                    <form class="m-t" method="POST" action="{{ route('logedin') }}">
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
                        <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                            <input id="password" type="password" class="form-control" name="password" placeholder="*******">
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                        <br>
                        <button type="submit" class="btn btn-theme btn-lg btn-block ">Sign In</button><br>
                        <p><a href="{{ route('forgot-what') }}" style="color:#000; font-size:14px;">Having login Issues?</a></p>
						<hr>
						<a href="{{ route('signup') }}" class="btn btn-warns btn-lg btn-block ">Sign Up</a><br>
                
                    </form>
                </div>
            </div>
        </div>

@stop