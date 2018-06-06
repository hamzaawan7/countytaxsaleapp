@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Sign Up Credit Card')
@section('content')

    <div class="container wow fadeInUp">
        <div class="row">
            <div class="credit-contents ">
                <h4 class="text-center">Add Credit Card</h4>
                <form class="m-t" role="form" action="{{ route('credit-card-info') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="creadit_forms">
                        <div class="form-group">
                            <img src="{{ asset('asset/images/credit-cards.png') }}" class="img-responsive creadit_card"
                                 alt="">
                        </div>
                        <div class="form-group{{ $errors->has('card_number') ? ' has-error' : '' }}">
                            <input id="card_number" type="text" class="form-control" name="card_number"
                                   placeholder="Card Number">
                            @if ($errors->has('card_number'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('card_number') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('expire_date') ? ' has-error' : '' }}">
                            <input id="expire_date" type="text" class="form-control" name="expire_date"
                                   placeholder="Expiration Date (MM/YY)">
                            @if ($errors->has('expire_date'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('expire_date') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('cvv') ? ' has-error' : '' }}">
                            <input id="cvv" type="text" class="form-control" name="cvv" placeholder="CVV">
                            @if ($errors->has('cvv'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('cvv') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <input id="referal_id" type="text" class="form-control" name="referal_id"
                                   placeholder="Referal ID">
                        </div>
                        <div class="form-group{{ $errors->has('cardholder_name') ? ' has-error' : '' }}">
                            <input id="cardholder_name" type="text" class="form-control" name="cardholder_name"
                                   placeholder="Cardholder Name">
                            @if ($errors->has('cardholder_name'))
                                <span class="help-block">
                                            <strong>{{ $errors->first('cardholder_name') }}</strong>
                                        </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <!-- <input id="email" type="text" class="form-control" name="email" placeholder="Country"> -->
                            <div class="bfh-selectbox bfh-countries" data-country="US" data-flags="true">
                                <input type="hidden" value="" name="country">
                                <a class="bfh-selectbox-toggle" role="button" data-toggle="bfh-selectbox" href="#">
                                    <span class="bfh-selectbox-option input-medium" data-option=""></span>
                                    <b class="caret"></b>
                                </a>
                                <div class="bfh-selectbox-options">
                                    <input type="text" class="bfh-selectbox-filter">
                                    <div role="listbox">
                                        <ul role="option">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="congratess text-center">
                                <p>Your credit card will be charged after free trail period ends unless you cancel </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-xs-12"><!-- data-toggle="modal" data-target="#successModal" -->
                        <button type="submit" class="btn btn-theme btn-lg btn-block card_pay">Sign Up</button>
                        <br>
                    </div>
                </form>

                <!-- Modal -->
                <div id="successModal" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-body text-center">
                                <h4>Thanks for Registering!</h4>
                                <p>You can Now login with the credentials that you set in the previous step.</p>
                            </div>
                            <div class="modal-footer">
                                <!-- <p class="text-center"><a href="#" data-dismiss="modal" style="color:#00AEEE">Okay</a></p> -->
                                <p class="text-center"><a href="{{ route('dashboard') }}" style="color:#00AEEE">Okay</a>
                                </p>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Modal -->
            </div>
        </div>
    </div>

@endsection
@section('scripts')
    <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
    <script src="{{ asset('assets/checkout-stripe.js') }}"></script>
    <style>
        .bfh-selectbox .bfh-selectbox-options {
            width: 100% !important;
        }
    </style>
    @if(session('modal'))
        <script>
            $(window).on('load', function () {
                $('#success<?php echo session('modal'); ?>').modal('show');
            });
        </script>


    @endif

    <link href="{{ asset('asset/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet">
    <script src="{{ asset('asset/js/bootstrap-formhelpers.min.js') }}"></script>


@endsection
