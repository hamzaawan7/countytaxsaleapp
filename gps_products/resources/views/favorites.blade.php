@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Favorites')
@section('content')
    <style>
        .successModal .modal-dialog {
            width: 280px !important;
            margin: 210px auto !important;
        }
    </style>

    <div id="wrapper">

        <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
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
                    <h4 class="text-center head_apps">Favorites</h4>
                </div>
                <div class="col-xs-3">
                    <ul class="list-inline filete_box  pull-right">
                        <li>
                            <a href="{{ route('export-favorites') }}" target="_blank" title="Export CSV"><i class="fa fa-download" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard') }}" title="Dashboard"><i class="fa fa-list-ul" aria-hidden="true"></i></a>
                        </li>
                        <li>
                            <a href="{{ route('search-results') }}" title="Search"><i class="fa fa-filter" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="search_boxes wow fadeInRight">
                        <form action="{{ route('search-view') }}" method="get" role="search">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control searches" id="usr"
                                       placeholder="&#xF002;   Search Properties By Address/ Zip Code/ Account Number/ Cause Number"
                                       value="{{ old('search') }}" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-12" style="display: none;">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @include('layouts.message')
            @if(count($favorites) > 0)
                @foreach($favorites as $favorite)
                    <div class="product_contents wow fadeInUp" style="padding-top: 1.5%">
                        <div class="col-xs-12 col-md-2">
                            <div class="pro_img">
                                @if(count($favorite->product->image_url)>0)
                                    <img src="{{ $favorite->product->image_url  }}" class="img-responsive" alt="">
                                @else
                                    <img src="{{ asset('asset/images/thumb.jpg') }}" class="img-responsive" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10">
                            <div class="col-xs-8">
                                <div class="row pro_details">
                                    <h3 class="pro_title">
                                        <a href="{{ route('products-views', ['id' => $favorite->product->id ]) }}">{{ $favorite->product->address }}</a>
                                    </h3>
                                    <p><span class="pro_price">
                          <?php
                                            //echo sprintf('$ %s', number_format($favorite->product->min_bid, 2));
                                            echo $favorite->product->min_bid;
                                            ?>
                          </span> <a href="#" onclick="return false">Minimum Bid</a></p>
                                    <p><b>PCT # {{ $favorite->product->precinct }} {{ $favorite->product->type }}
                                            # {{ $favorite->product->sale }} CAUSE
                                            # {{ $favorite->product->cause }} </b></p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="favorites">
                                    <a href="#" onclick="return false"
                                       id="product{{$favorite->product->id}}"
                                       style="color: @if(!empty($favorite->product->favorite) && $favorite->user_id == Auth::user()->id) #E24244 @else #eee  @endif;">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    <script>
                                        $("#product<?=$favorite->product->id?>").click(function () {
                                            $.ajax({
                                                url: "{{ route('add-favorite', ['id' => $favorite->product->id ]) }}",
                                                success: function (result) {
                                                    if (result == 1) {
                                                        $('#product<?= $favorite->product->id ?>').css('color', '#E24244');
                                                    } else {
                                                        $('#product<?= $favorite->product->id ?>').css('color', '#bbb8b8');
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row auctions">
                                    @if($favorite->product->status == 'active')
                                        <p>STATUS: <span
                                                    style="color:green;text-transform: uppercase;">{{ $favorite->product->status }}</span>
                                        </p>
                                    @else
                                        <p>STATUS: <span
                                                    style="color:indianred;text-transform: uppercase;">{{ $favorite->product->status }} </span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                @endforeach
            @else
                <h2 class="text-center" style="margin-top:200px">Property Not Found !</h2>
            @endif
            <br><br><br>
        </div>
    </div>

@stop


