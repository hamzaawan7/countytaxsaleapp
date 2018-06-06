@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Property')
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
                    <h4 class="text-center head_apps">County App</h4>
                </div>
                <div class="col-xs-3">
                    <ul class="list-inline filete_box  pull-right">
                        <li><a href="{{ route('dashboard') }}"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('search-results') }}"><i class="fa fa-filter" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="search_boxes  wow fadeInRight">
                        <form action="{{ route('search-view') }}" method="get" role="search">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control searches" id="usr"
                                       placeholder="&#xF002;   Search Properties" value="{{ Request::get('search') }}"
                                       autocomplete="off">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">

                    @include('layouts.message')
                    <div class="product_contents wow fadeInUp" style="padding-top: 1.5%">
                        <div class="col-xs-12 col-md-2">
                            <div class="pro_img">
                                @if(count($product->image_url)>0)
                                    <img src="{{ $product->image_url  }}" class="img-responsive" alt="">
                                @else
                                    <img src="{{ asset('asset/images/thumb.jpg') }}" class="img-responsive" alt="">
                                @endif
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-10">
                            <div class="col-xs-8">
                                <div class="row pro_details">
                                    <h3 class="pro_title">
                                        <a href="{{ route('products-views', ['id' => $product->id ]) }}">{{ $product->address }}</a>
                                    </h3>
                                    <p><span class="pro_price">
                          <?php
                                            //echo sprintf('$ %s', number_format($product->min_bid, 2));
                                            echo $product->min_bid;
                                            ?>
                          </span> <a href="#" onclick="return false">Minimum Bid</a></p>
                                    <p><b>PCT # {{ $product->precinct }} {{ $product->type }}
                                            # {{ $product->sale }} CAUSE # {{ $product->cause }} </b></p>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <div class="favorites">
                                    <a href="#" onclick="return false"
                                       id="product{{$product->id}}"
                                       style="color: @if(count($product->favorite) >0 && $product->favorite->user_id == Auth::user()->id) #E24244 @else #eee  @endif;">
                                        <i class="fa fa-heart"></i>
                                    </a>
                                    <script>
                                        $("#product<?=$product->id?>").click(function () {
                                            $.ajax({
                                                url: "{{ route('add-favorite', ['id' => $product->id ]) }}",
                                                success: function (result) {
                                                    if (result == 1) {
                                                        $('#product<?= $product->id ?>').css('color' , '#E24244');
                                                    } else {
                                                        $('#product<?= $product->id ?>').css('color' , '#EEE');
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>
                            </div>
                            <div class="col-xs-12">
                                <div class="row auctions">
                                    @if($product->status == 'active')
                                        <p>STATUS: <span
                                                    style="color:green;text-transform: uppercase;">{{ $product->status }}</span>
                                        </p>
                                    @else
                                        <p>STATUS: <span
                                                    style="color:indianred;text-transform: uppercase;">{{ $product->status }} </span>
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>

                <br><br><br>


            </div>
        </div>

    </div>
    </div>

@stop


