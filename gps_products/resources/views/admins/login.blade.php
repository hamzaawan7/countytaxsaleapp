<!DOCTYPE html>
<html>
    
<head>
        <title>County Tax Sale App (CTSA)</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/fontawesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/metisMenu.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/morris-0.4.3.min.css') }}" rel="stylesheet">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
        <script src="{{ asset('assets/js/modernizr.js') }}"></script>
    </head>
    <body class="fixed-left">
<div class="container">
            <div class="row">
                <div class="locksreen-col text-center">
                    <h3>Login to Dashboard</h3>
                    @include('layouts.message')
                    <form class="m-t" action="{{ route('admin-loggedin') }}" method="post">
                     <input type="hidden" name="_token" value="{{ Session::token() }}">
                         <div class="form-group{{ $errors->has('email') ? ' has-error': '' }}">
                            <input type="email" name="email" class="form-control" placeholder="Email">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error': '' }}">
                            <input type="password" name="password" class="form-control" placeholder="Password">
                            @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-theme btn-lg btn-block">Login</button><br>
                        <p>Copyright © 2016</p>
                    </form>
                </div>
            </div>
        </div>
        <!-- Plugins  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/metisMenu.js') }}"></script>
         <script src="{{ asset('assets/js/core.js') }}"></script>
        <script src="{{ asset('assets/js/mediaquery.js') }}"></script>
        <script src="{{ asset('assets/js/equalize.js') }}"></script>
        <script src="{{ asset('assets/js/app.js') }}"></script>

    </body>

</html>
