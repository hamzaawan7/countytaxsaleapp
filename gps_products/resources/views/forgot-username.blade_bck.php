@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Forgot Username')
@section('content')

    <div class="container">
        <div class="row">
            <div class="locksreen-col text-center  wow fadeInUp">
                @include('layouts.message')
                <a href="{{ route('/') }}">
                    <img src="{{ asset('asset/images/tax.png') }}" class="img-responsive">
                </a>
                <form class="m-t" method="POST" action="{{ route('send-username') }}">
                    {{ csrf_field() }}
                    <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
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
                    <button type="submit" class="btn btn-theme btn-lg btn-block ">Send Message</button>
                </form>
            </div>
        </div>
    </div>

@stop