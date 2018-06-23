@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Search Results')
@section('content')

    <div id="wrapper">

        <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="menus_headerss">
                <div class="col-xs-2">
                    <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                        <span class="hamb-top"></span>
                        <span class="hamb-middle"></span>
                        <span class="hamb-bottom"></span>
                    </button>
                </div>
                <div class="col-xs-6">
                    <h4 class="text-center head_apps">Filter</h4>
                </div>
                <div class="col-xs-4">
                    <ul class="list-inline filete_box  pull-right">
                        <li><a href="{{ route('dashboard') }}"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
                        <li><a href="{{ route('search-results') }}"><i class="fa fa-filter" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3  wow fadeInUp">
                        <h4 class="page-header">Create a Custom Filter</h4>
                        <div class="col-xs-12" style="display: none;">
                            @if(count($products) >0)
                                @foreach($products as $product)
                                    Precinct: {{ $product->precinct }},
                                    Search: {{ $product->zipcode }}.<br>
                                @endforeach
                            @endif
                        </div>
                        <form class="filter-form" id="basicform" action="{{ route('custom-filter-view') }}" method="get"
                              role="search">

                            <div class="form-group checkboxs">
                                <label for="choice-animals-dogs"> PRECINCT </label>
                                <div class="reveal-if-active">
                                    <div class="squaredFour"><span class="bold">1</span><input type="checkbox"
                                                                                               id="precinct-1"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="1"
                                                                                               @isset($precincts) @if(in_array(1,$precincts)) checked @endif @endisset><label
                                                for="precinct-1"></label></div>
                                    <div class="squaredFour"><span class="bold">2</span><input type="checkbox"
                                                                                               id="precinct-2"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="2"
                                                                                               @isset($precincts) @if(in_array(2,$precincts)) checked @endif @endisset><label
                                                for="precinct-2"></label></div>
                                    <div class="squaredFour"><span class="bold">3</span><input type="checkbox"
                                                                                               id="precinct-3"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="3"
                                                                                               @isset($precincts) @if(in_array(3,$precincts)) checked @endif @endisset><label
                                                for="precinct-3"></label></div>
                                    <div class="squaredFour"><span class="bold">4</span><input type="checkbox"
                                                                                               id="precinct-4"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="4"
                                                                                               @isset($precincts) @if(in_array(4,$precincts)) checked @endif @endisset><label
                                                for="precinct-4"></label></div>
                                    <div class="squaredFour"><span class="bold">5</span><input type="checkbox"
                                                                                               id="precinct-5"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="5"
                                                                                               @isset($precincts) @if(in_array(5,$precincts)) checked @endif @endisset><label
                                                for="precinct-5"></label></div>
                                    <div class="squaredFour"><span class="bold">6</span><input type="checkbox"
                                                                                               id="precinct-6"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="6"
                                                                                               @isset($precincts) @if(in_array(6,$precincts)) checked @endif @endisset><label
                                                for="precinct-6"></label></div>
                                    <div class="squaredFour"><span class="bold">7</span><input type="checkbox"
                                                                                               id="precinct-7"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="7"
                                                                                               @isset($precincts) @if(in_array(7,$precincts)) checked @endif @endisset><label
                                                for="precinct-7"></label></div>
                                    <div class="squaredFour"><span class="bold">8</span><input type="checkbox"
                                                                                               id="precinct-8"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="8"
                                                                                               @isset($precincts) @if(in_array(8,$precincts)) checked @endif @endisset><label
                                                for="precinct-8"></label></div>
                                    <div class="squaredFour"><span class="bold">All</span><input type="checkbox"
                                                                                                 id="precinctAll"
                                                                                                 class="require-if-active precinct"><label
                                                for="precinctAll"></label></div>
                                </div>
                            </div>
                            <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}" style="clear: both">
                                <label for="search">Search By Address/ Zip Code/ Account Number/ Cause Number</label>
                                <input id="search" type="text" class="form-control" name="search"
                                       placeholder="Search By Address/ Zip Code/ Account Number/ Cause Number"
                                       value="{{ old('search',$_GET['search']) }}">
                                @if ($errors->has('search'))
                                    <span class="help-block">
                                        <strong style="color:#a94442">{{ $errors->first('search') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" id="low_bid_value" name="low_bid_value" value="0"/>
                            <input type="hidden" id="high_bid_value" name="high_bid_value" value="100000"/>
                            <input type="hidden" id="low_adjudged_value" name="low_adjudged_value" value="0"/>
                            <input type="hidden" id="high_adjudged_value" name="high_adjudged_value" value="100000"/>
                            <input type="hidden" id="low_land_value" name="low_land_value" value="0"/>
                            <input type="hidden" id="high_land_value" name="high_land_value" value="10000"/>
                            <input type="hidden" id="low_building_value" name="low_building_value" value="0"/>
                            <input type="hidden" id="high_building_value" name="high_building_value" value="10000"/>
                            {{--<div id='volume' class='slider'>
                                    <output class='slider-output'>$50,000</output>
                                    <!-- <output class='min'>1000</output>
                                    <output class='max'>2000000</output> -->
                                    <div class='slider-track'>
                                        <div class='slider-thumb'></div>
                                        <div class='slider-level'></div>
                                    </div>
                                    <span style="float: left;width: 30%;    margin-top: 5px;">$1,000</span>
                                    <input class='slider-input' name="adjudged_value" type='range' value='50000'
                                           min='1000' max='100000'/>
                                    <span style="text-align: right;margin-top: -19px;;">$100,000+</span>
                                </div>--}}
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="bid_amount">Bid Amount</label>
                                        <div id="bid-container"></div>
                                        <div style="float: left">$0</div>
                                        <div id="bid_amount" style="text-align: center;">$0 - $100000</div>
                                        <div style="float: right; margin-top: -16px">$100,000+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="adjudged_amount">Adjudged Value</label>
                                        <div id="adjudged-container"></div>
                                        <div style="float: left">$0</div>
                                        <div id="adjudged_amount" style="text-align: center;">$0 - $100000</div>
                                        <div style="float: right; margin-top: -16px">$100,000+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="land_amount">Land (in Sq Ft)</label>
                                        <div id="land-container"></div>
                                        <div style="float: left">0</div>
                                        <div id="land_amount" style="text-align: center;">0 - 10,000</div>
                                        <div style="float: right; margin-top: -16px">10,000+</div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="building_amount">Building (in Sq Ft)</label>
                                        <div id="building-container"></div>
                                        <div style="float: left">0</div>
                                        <div id="building_amount" style="text-align: center;">0 - 10000</div>
                                        <div style="float: right; margin-top: -16px">10,000+</div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="row">
                                    <br><br>
                                    <div class="col-xs-6 text-center">
                                        <a href="{{ route('search-results') }}" class="filter_clear"> Clear Filters</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="row">
                                            <button type="submit" class="btn btn-theme btn-lg btn-block"> Update
                                                Results
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br> <br> <br>
                            </div>

                            <!--  <button type="submit" class="btn btn-theme btn-lg btn-block ">Custom Filter</button><br> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('scripts')

    <script type="text/javascript">

        $(document).ready(function () {
            $("#precinctAll").click(function () {

                $(".precinct").prop('checked', $(this).prop('checked'));


            });

        });

    </script>


@stop
