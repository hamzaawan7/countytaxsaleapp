@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Sign Up Phone')
@section('content')

    <div class="container wow fadeInUp">
        <div class="row">
            <div class="locksreen-col text-center">
                <img src="{{ asset('asset/images/tax.png') }}" class="img-responsive">
                <div class="col-xs-12">
                    <div class="row">
                        <div class="congrates">
                            <h2>CONGRATULATIONS!</h2>
                            <p>YOU QUALIFY FOR THE <span class="offers">7 DAY</span> TRIAL</p>

                            <div class="col-xs-12">
                                <div class="row  text-center">
                                    <p class="pricess">
                                        $4.99/mo
                                        <span class="try125">After Trial Period Ends</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            <!--  <form id="phonevali" class="m-t" role="form" action="">
                   <div class="form-group">
                       <div class="input-group">
                       <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
                       <input id="phone" type="tel" pattern="^\d{4}-\d{3}-\d{4}$" required class="form-control" name="phone" placeholder="(___) ___-___">

                     </div>
                     </div>


                       <a href="{{ route('signup-credit-card-info') }}" class="btn btn-theme btn-lg btn-block">Next</a><br>
                   </form> -->

                <div class="form-group{{ $errors->has('phone_number') ? ' has-error' : '' }}">
                    <label for="name" class="col-md-4 control-label">Phone Number</label>
                    <div class="col-md-6">
                        <input id="name" type="tel" class="form-control" name="phone_number"
                               value="{{ old('phone_number') }}" required autofocus>

                        @if ($errors->has('phone_number'))
                            <span class="help-block">
                                <strong>{{ $errors->first('phone_number') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>

                <form class="form-horizontal" role="form" method="POST" action="{{ route('verify') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('code') ? ' has-error' : '' }}">
                        <label for="code" class="col-md-4 control-label">Code</label>

                        <div class="col-md-6">
                            <input id="code" type="number" class="form-control" name="code" value="{{ old('code') }}"
                                   required autofocus>

                            @if ($errors->has('code'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('code') }}</strong>
                                    </span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            <button type="submit" class="btn btn-primary">
                                Verify Account
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </div>
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