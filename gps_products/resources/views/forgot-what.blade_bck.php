@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Forgot')
@section('content')

    <div class="container">
        <div class="row">
            <div class="locksreen-col text-center  wow fadeInUp">
                @include('layouts.message')
                <a href="{{ route('/') }}">
                    <img src="{{ asset('asset/images/tax.png') }}" class="img-responsive">
                </a>
                {{ csrf_field() }}
                <a href="{{ route('forgot-username') }}" class="btn btn-theme btn-lg btn-block ">Forgot Username</a>
                <br/>
                <a href="{{ route('password.request') }}" class="btn btn-warns btn-lg btn-block ">Forgot Password</a>
                <br>
            </div>
        </div>
    </div>

@stop