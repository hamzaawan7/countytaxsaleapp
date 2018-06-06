@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Choose Payment')
@section('content')

       <div class="container">
            <div class="row">
                <div class="credit-contents  wow fadeInUp">
                    <h4 class="text-center">Add Credit Card</h4>
                    <form class="m-t" role="form" action="">
                        <div class="creadit_forms">
                                <div class="form-group">
                                   <img src="images/credit-cards.png" class="img-responsive creadit_card" alt="">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Card Number">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Expiration Date">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="text" class="form-control" name="email" placeholder="CVV">
                                </div>
                                <div class="form-group">
                                    <input id="email" type="text" class="form-control" name="email" placeholder="Cardholder Name">
                                </div>
                                <div class="form-group">
                                    <!-- <input id="email" type="text" class="form-control" name="email" placeholder="Country"> -->
                                    <div class="bfh-selectbox bfh-countries" data-country="US" data-flags="true">
                                      <input type="hidden" value="">
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
                                    <p>Your credit card will be charged after free trail period ends unless you cancle </p>
                                </div>
                               
                            </div>
                        </div>
                        <div class="col-xs-12">
                            <button type="button" data-toggle="modal" data-target="#successModal" class="btn btn-theme btn-lg btn-block card_pay ">Sign Up</button><br>
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
                                <p class="text-center"><a href="#" data-dismiss="modal" style="color:#00AEEE">Okay</a></p>
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
    
      <link href="{{ asset('asset/css/bootstrap-formhelpers.min.css') }}" rel="stylesheet">
      <script src="{{ asset('asset/js/bootstrap-formhelpers.min.js') }}"></script>


@endsection
