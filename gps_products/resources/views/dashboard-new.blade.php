@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Dashboard')
@section('content')

    <div id="wrapper" style="background-color: #FFF;">
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
                    <h4 class="text-center head_apps">Dashboard</h4>
                </div>
                <div class="col-xs-3">

                </div>
            </div>

            <div class="col-xs-12">
                <div class="row">
                    <div class="account_prem  wow fadeInUp" style="height: 100%;">
                        <div class="premium_box"
                             style="width:300px; margin:0 auto; height:320px; vertical-align: center;padding-top:80px">
                            <h5 class="auctions-date"> ALL PROPERTIES LISTED FOR <?= date('d F, Y', strtotime($auction_date->date)) ?></h5>
                            <p>
                                <a href="{{ route('property-near-me') }}" class="btn btn-default btn-block price_btns">
                                    SEARCH PROPERTIES NEAR ME
                                </a>
                            </p>
                            <p>
                                <a href="{{ route('search-results') }}" class="btn btn-default btn-block price_btns1">
                                    SEARCH PROPERTIES IN PRECINCT
                                </a>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var canvalHeight=$("html").innerHeight()-180;
setTimeout(function(){
$(".premium_box").css('height',canvalHeight+"px");
 }, 1);
        
    </script>

@endsection