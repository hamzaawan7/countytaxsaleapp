@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Dashboard')
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
                    <h4 class="text-center head_apps">Legal</h4>
                </div>
                <div class="col-xs-3">

                </div>
            </div>


            <div class="row">
                <div class="col-xs-12">
                    <div class="account_prem  wow fadeInUp"
                         style="margin-top : 30px; padding-left: 5%; padding-right: 5%">
                        <?= $legal->text ?>
                        <div class="clearfix"></div>
                    </div>

                </div>


            </div>
        </div>
    </div>

@endsection