@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Profile')
@section('content')

                    <div class="container">
                        <div class="page-title">
                            <h3>Profile View</h3>
                            
                        </div><!--end page title-->

                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box">
                                    <div class="col-sm-8 col-sm-offset-2">
                                    @include('../layouts/message')
                                        <h4>Profile View</h4>
                                        <img src="data:image/jpeg;base64,{{ base64_encode( $user->photo ) }}" alt="{{ $user->name }}" class="profile-user-img img-responsive img-circle">
                                       <br>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                              <tr>
                                                <th>Name</th>
                                                <th>Details</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>Name</td>
                                                <td>{{ $user->name }}</td>
                                              </tr>
                                              <tr>
                                                <td>Email</td>
                                                <td>{{ $user->email }}</td>
                                              </tr>
                                              <tr>
                                                <td>Address</td>
                                                <td>{{ $user->address }}</td>
                                              </tr>
                                              <tr>
                                                <td>Zip Code</td>
                                                <td>{{ $user->zipcode }}</td>
                                              </tr>
                                              <tr>
                                                <td>Phone Number</td>
                                                <td>{{ $user->phone_number }}</td>
                                              </tr>
                                              <tr>
                                                <td>Country</td>
                                                <td>{{ $user->country }}</td>
                                              </tr>
                                              <tr>
                                                <td>Description</td>
                                                <td>{{ $user->description }}</td>
                                              </tr>
                                               <tr>
                                                <td colspan="2"><b>All Alerts</b> </td>
                                              </tr>
                                              <tr>
                                                <td>Status Alert</td>
                                                <td>{{ $user->status_alert }}</td>
                                              </tr>
                                              <tr>
                                                <td>Email Alert</td>
                                                <td>{{ $user->status_alert }}</td>
                                              </tr>
                                              <tr>
                                                <td>SMS Alert</td>
                                                <td>{{ $user->status_alert }}</td>
                                              </tr>
                                              @if(count($user->payment) > 0)
                                              <tr>
                                                <td colspan="2"><b>Payment Details</b> </td>
                                              </tr>
                                              <tr>
                                                <td>Card Number </td>
                                                <td>{{ $user->payment->card_number }}</td>
                                              </tr>
                                              <tr>
                                                <td>Expire Date </td>
                                                <td>{{ $user->payment->expire_date }}</td>
                                              </tr>
                                              <tr>
                                                <td>CVV </td>
                                                <td>{{ $user->payment->cvv }}</td>
                                              </tr>
                                              <tr>
                                                <td>Referal Id </td>
                                                <td>{{ $user->payment->referal_id }}</td>
                                              </tr>
                                              <tr>
                                                <td>Country</td>
                                                <td>{{ $user->payment->country }}</td>
                                              </tr>
                                              @endif
                                              @if(count($user->products) > 0)
                                              <tr>
                                                <td colspan="2"><b>Favorite Products</b> </td>
                                              </tr>
                                              <tr>
                                                <td colspan="2">
                                                   @foreach($user->products as $product)
                                                       <a href="{{ route('admin-auction-products', ['id' => $product->id ]) }}">
                                                    <div class="item  col-xs-4 col-lg-4">
                                                        <div class="thumbnail">
                                                            <div class="caption">
                                                                <h5 class="group inner list-group-item-heading">{{ $product->address }}</h5>
                                                            </div>
                                                        </div>
                                                    </div>
                                                       </a>
                                                   @endforeach


                                                </td>
                                              </tr>
                                              @else
                                              <tr>
                                                <td colspan="2"><b>Favorite List Empty !</b> </td>
                                              </tr>
                                              @endif
                                            </tbody>
                                        </table>  
                                            
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                   @stop
