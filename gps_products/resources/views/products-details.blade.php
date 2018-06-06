@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Property Detail')
@section('content')

    <style>
        .successModal .modal-dialog {
            width: 280px !important;
            margin: 210px auto !important;
        }

        .pro_detailss {
            padding: 15px;
            border-bottom: 1px solid #ddd;
        }
    </style>

    <?php
    use App\Favorite;
    ?>
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

            <div class="container">
                <div class="row">

                    @include('layouts.message')
                    <div class="product_contents  wow fadeInUp">

                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-12">
                                    <a class="pull-right" href="{{ redirect()->back()->getTargetUrl() }}">
                                        Go back to Previous Search
                                    </a>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <p>Detailed</p>
                                        <h3 class="pro_title">
                                            <a href="{{ route('products-views', ['id' => $product->id ]) }}">
                                                {{ $product->address }}
                                            </a>
                                            <p class="pull-right">
                                                <?php
                                                $favorite = Favorite::where('user_id', Auth::user()->id)->where('product_id', $product->id)->first();
                                                ?>
                                                <a href="#" onclick="return false"
                                                   id="product{{$product->id}}"
                                                   style="color: @if(!empty($favorite)) #E24244 @else #bbb8b8  @endif;">
                                                    <i class="fa fa-heart"></i>
                                                </a>
                                                <script>
                                                    $("#product<?=$product->id?>").click(function () {
                                                        $.ajax({
                                                            url: "{{ route('add-favorite', ['id' => $product->id ]) }}",
                                                            success: function (result) {
                                                                if (result == 1) {
                                                                    $('#product<?= $product->id ?>').css('color', '#E24244');
                                                                } else {
                                                                    $('#product<?= $product->id ?>').css('color', '#bbb8b8');
                                                                }
                                                                return false;
                                                            }
                                                        });
                                                    });
                                                </script>
                                            </p>
                                        </h3>
                                    </div>
                                </div>
                                <hr>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>STATUS</h4>
                                        @if($product->status == 'active')
                                            <p>
                                                <b><span style="color:green;text-transform: uppercase;">{{ $product->status }}</span></b>
                                            </p>
                                        @else
                                            <p>
                                                <b><span style="color:indianred;text-transform: uppercase;">{{ $product->status }} </span></b>
                                            </p>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Owner name</h4>
                                        <h3 class="pro_title">{{ ucfirst($product->owner_name ) }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Mailing Add</h4>
                                        <h3 class="pro_title">{{ ucfirst($product->mailing_add ) }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Type</h4>
                                        <h3 class="pro_title">{{ ucfirst($product->type ) }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Adjudged Value</h4>
                                        <h3 class="pro_title">{{ $product->adjudged_value  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Minimum bid</h4>
                                        <h3 class="pro_title">{{ $product->min_bid  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Precinct</h4>
                                        <h3 class="pro_title">{{ $product->precinct  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Sale #</h4>
                                        <h3 class="pro_title">{{ $product->sale  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Land SF</h4>
                                        <h3 class="pro_title">{{ $product->land_sf  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Living SF</h4>
                                        <h3 class="pro_title">{{ $product->living_sf  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Exemption Type</h4>
                                        <h3 class="pro_title">{{ $product->exemption_type  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Cause #</h4>
                                        <h3 class="pro_title">{{ $product->cause  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Account #</h4>
                                        <h3 class="pro_title">{{ $product->account  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Tax Year In Judgement</h4>
                                        <h3 class="pro_title">{{ $product->tax_years  }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Judgment </h4>
                                        <h3 class="pro_title"> {{ Carbon\Carbon::parse($product->judgment)->subDay(0)->format('m-d-Y') }}</h3>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Photo</h4>
                                        @if(count($product->image_url)>0)
                                            <img src="{{ $product->image_url }}" class="img-responsive" alt=""
                                                 style="width:300px; height:220px">
                                        @else
                                            <img src="{{ asset('asset/images/thumb.jpg') }}" class="img-responsive"
                                                 alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="row pro_detailss">
                                        <h4>Description</h4>
                                        <p>{{ $product->description  }}</p>
                                    </div>
                                </div>
                            <!-- <div class="col-xs-12">
                          <div class="row auctions">
                            <p>Online Auction:  {{ date('M d', strtotime($product->auction_start)) }} - {{ date('M d', strtotime($product->auction_end)) }} </p>

                          </div>
                        </div> -->
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


