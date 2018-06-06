@extends('layouts.theme_main')
@section('title', 'County Tax Sale App (CTSA) | Sign In')
@section('content')

    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="locksreen-col text-center  wow fadeInUp">
            {{--@include('layouts.message')--}}
            <form class="m-t" method="POST" action="{{ route('logedin') }}">
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
                <br/>
                <div class="input-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="password" type="password" class="form-control" name="password" placeholder="*******">
                </div>
                @if ($errors->has('password'))
                    <span class="help-block">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                @endif
                <br/>
                <div class="mr-front-cta">
                    <button type="submit" class="btn btn-lg btn-blue btn-block">Sign In</button>
                </div>
                <br/>
                <p>
                    <a href="{{ route('forgot-what') }}" style="color:#fff; font-size:14px;">
                        Having login Issues?
                    </a>
                </p>
                <a href="{{ route('signup') }}" class="btn btn-lg btn-blue btn-outline btn-block">
                    Register
                </a>
                <br/>
                <br/>
                <i style="color:#fff; font-size:14px;">Next Harris County Delinquent Tax Sale Date
                    <br/>
                    <b>{{ date('F d, Y', strtotime($auction_date->date)) }} </b>
                    <br/>
                </i>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    </div>

@stop