@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Dashboard')
@section('content')

                    <div class="container">
                        <div class="page-title">
                            <h3>My Dashboard</h3>
                            
                        </div><!--end page title-->

                        <div class="widget-row">
                            <div class="row">
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Other User</h4>
                                            <h2>{{ $users }}</h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Premium User</h4>
                                            <h2>{{ $preusers }}</h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Active Product</h4>
                                            <h2>{{ $productss }}</h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="widget-box clearfix">
                                        <div class="pull-left">
                                            <h4 style="font-size: 12px;">Cancelled Product</h4>
                                            <h2>{{ $productsss }}</h2>
                                        </div>
                                        <div class="text-right">
                                            <span class="sparkline7"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!--end widget-->

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="panel-box">
                                    <h4>Total Products</h4>
                                    <div><canvas id="lineChart" height="120"></canvas></div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="panel-box">
                                    <h4>Monthly Favorites Compare</h4>
                                    <canvas id="polarChart" height="242"></canvas>
                                </div>
                            </div>
                        </div>


                   @stop