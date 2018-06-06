@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Premium Payments')
@section('content')

    <div id="wrapper">
        <!-- Page Content -->
        @include('layouts.sidebar')
        <div id="page-content-wrapper">
            <div class="menus_headerss">
                <div class="col-xs-3">
                    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                        <span class="hamb-top"></span>
                        <span class="hamb-middle"></span>
                        <span class="hamb-bottom"></span>
                    </button>
                </div>
                <div class="col-xs-6">
                    <h4 class="text-center head_apps">Payment Info</h4>
                </div>
                <div class="col-xs-3">

                </div>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="account_stat  wow fadeInUp">
                        <div class="col-xs-6"><h4>Account Status</h4></div>
                        <div class="col-xs-6"><h4
                                    class="pull-right">@isset(Auth::user()->premium_user->status) {{ucfirst(Auth::user()->premium_user->status)}} @endisset</h4>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-xs-11 col-sm-12 col-md-11">
                    <h4 style="text-align: center;">YOUR CREDIT CARD WILL NOT BE CHARGED UNTIL FREE TRIAL PERIOD
                        ENDS</h4>
                </div>
            </div>

            <div class="row">
                @if($cards->count()<2)
                    <div class="col-xs-12" style="text-align: center;">
                        <form action="{{ route('new-card') }}"
                        " method="post">
                        {{ csrf_field() }}

                        <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                data-key="<?php echo $stripe_pub_key; ?>"
                                data-description="Add Credit Card"
                                data-label="Add Credit Card"
                                data-email="<?php echo $user->email; ?>"
                                data-allow-remember-me=false
                                data-panel-label="Save"
                                data-locale="auto">

                        </script>
                        </form>
                    </div>
                @endif
                <div class=" widget stored-cards full-size">
                    <ul>
                        @foreach($cards as $list)
                            <li class="col-xs-11 col-sm-4 col-md-3 visa stored-card cr-cd{{$list->id}}"
                                data-vendor="visa"
                                style="margin-left: 5px;">
                                <div class="vendor">{{ $list->card_type }}</div>
                                <div class=""></div>
                                <div class="card-number"><span>✖✖✖✖</span> <span>✖✖✖✖</span> <span>✖✖✖✖</span>
                                    <span>{{ substr($list->card_number, -4) }}</span></div>
                                <div class="card-name">{{ $list->cardholder_name }}</div>
                                <button style="margin-top: 170px;margin-bottom: 10px; " data-id="{{$list->id}}"
                                        class="r{{$list->id}} btn btn-danger btn-remove pull-right">Remove
                                </button>
                            </li>


                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        @endsection

        @section('scripts')
            <script type="text/javascript">
                $('.btn-remove').click(function () {
                    var id = $(this).attr('data-id');
                    if (confirm("You are sure want to delete this card?")) {
                        $.ajax({
                            url: "removecard/" + id, dataType: 'json', success: function (result) {
                                console.log(result.a.length)
                                if (result.status == 1) {
                                    $('.cr-cd' + id).fadeOut(300, function () {
                                        $(this).remove();
                                    });
                                    if (result.a.length == 1) {
                                        $('.r' + result.a[0]).hide();
                                        location.reload();
                                    }
                                }
                                else
                                    alert("You can not delete this card!");

                            }
                        });


                    }

                })
            </script>
@endsection