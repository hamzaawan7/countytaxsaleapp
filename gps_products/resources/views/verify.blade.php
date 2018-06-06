@extends('layouts.theme_main')
@section('title', 'County Tax Sale App (CTSA) | Verify')
@section('content')

    <div class="col-md-4">
    </div>
    <div class="mr-front-content col-xs-12 col-sm-12 col-md-4 col-lg-4">
                        <span class="offers">
                            PLEASE VERIFY 4 DIGIT CODE FROM YOUR PHONE
                        </span>
        <br/>
        <br/>
        <div class="locksreen-col text-center  wow fadeInUp">
            {{--@include('layouts.message')--}}
            <form class="form-horizontal" role="form" method="POST" action="{{ route('verify') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                    <!-- <label for="code" class="col-md-4 control-label">Code</label> -->

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                        <input id="code" class="form-control" name="code" value="{{ old('code') }}"
                               required autofocus>
                    </div>
                    @if ($errors->has('code'))
                        <span class="help-block">
                                    <strong>{{ $errors->first('code') }}</strong>
                                </span>
                    @endif
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue btn-lg btn-block"> Verify Account
                    </button>

                </div>
            </form>
        </div>
    </div>
    <div class="col-md-4">
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function () {

            $('#phonevali').validate({
                rules: {
                    phone: {
                        required: true,
                        phoneUS: true
                    }
                },
                submitHandler: function (form) {
                    alert('valid form submitted');
                    return false;
                }
            });

        });
    </script>

@endsection