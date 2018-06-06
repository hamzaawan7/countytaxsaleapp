@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Properties')
@section('content')

                    <div class="container">
                        <div class="page-title">
                            <h3>Properties</h3>
                        </div><!--end page title-->

                       

                       

                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box">
                                @include('../layouts/message')
                                    @if(count($products) > 0)
                                    <div class="table-responsive">
                                        <table id="basic-datatables" class="table table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                                <tr>
                                                    <th>Address</th>
                                                    <th>Zip-Code</th>
                                                    <th>Precinct</th>
                                                    <th>Sale </th>
                                                    <th>Type</th>
                                                    <th>Cause</th>
                                                    <th>Minimum Bid</th>
                                                    <th>Adjusted Value</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach($products as $product)
                                                <tr>
                                                    <td>{{ $product->address }}</td>
                                                    <td>{{ $product->zipcode }}</td>
                                                    <td>{{ $product->precinct }}</td>
                                                    <td>{{ $product->sale }}</td>                   
                                                    <td>{{ $product->type }}</td>                   
                                                    <td>{{ $product->cause }}</td>
                                                    <td>{{ $product->min_bid }}</td>                   
                                                    <td>{{ $product->adjudged_value }}</td>
                                                    <td>
                                                    @if($product->status == 'active')
                                                    <button class="btn btn-success btn-xs">{{ $product->status }}</button>
                                                    @else
                                                    <button class="btn btn-warning btn-xs">{{ $product->status }}</button>
                                                    @endif
                                                    </td>                   
                                                    <td>
                                                        <a href="{{ route('admin-auction-products', ['id' => $product->id ]) }}" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                                                        <a href="{{ route('admin-edit-products', ['id' => $product->id ]) }}" class="btn btn-danger btn-xs"><i class="fa fa-edit"></i></a>
                                                        <a href="{{ route('admin-del-products', ['id' => $product->id ]) }}" class="btn btn-warning btn-xs"><i class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    @else
                                    <h2>Data Not Found !</h2>
                                    @endif
                                </div>
                            </div>
                        </div>
                        </div>

                   @stop