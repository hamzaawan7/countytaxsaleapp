@extends('layouts.theme_main')
@section('title', 'County Tax Sale App (CTSA) | Forgot Username')
@section('content')


    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
        <div class="locksreen-col text-center  wow fadeInUp">
            {{--@include('layouts.message')--}}
            <form class="m-t" method="POST" action="{{ route('send-username') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <div class="input-group">
                                        <span class="input-group-addon"><i
                                                    class="glyphicon glyphicon-earphone"></i></span>
                        <input id="phone" type="tel" {{--pattern="^\d{4}-\d{3}-\d{4}$"--}} required
                               class="form-control" name="phone_number" placeholder="(___) ___-___"
                               autofocus value="{{ old('phone_number') }}">
                    </div>
                    <span>Please enter phone number and we will message you the username</span>
                    @if ($errors->has('phone_number'))
                        <span class="help-block">
                               <strong>{{ $errors->first('phone_number') }}</strong>
                           </span>
                    @endif
                </div>
                <button type="submit" class="btn btn-blue btn-lg btn-block ">Send Message</button>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    </div>


@stop