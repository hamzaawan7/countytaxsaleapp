@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Profile Update')
@section('content')

                    <div class="container">
                        <div class="page-title">
                            <h3>Profile Update</h3>
                        </div><!--end page title-->


                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box clearfix">

                                  @include('layouts.message')
                                  <form method="post" action="{{ route('admin-profile-update') }}" enctype="multipart/form-data">
                                 <input type="hidden" name="_token" value="{{ Session::token() }}">
                                  <div class="box-body">
                                  <div class="col-md-8 col-md-offset-2">
                                    <!-- <img src="http://localhost/laravel_inventory/public/profiles/1486348083BpwScreenshot_1.png" alt="" class="profile-user-img img-responsive img-circle"> -->
                                    <img src="data:image/jpeg;base64,{{ base64_encode( Auth::user()->photo ) }}" alt="{{ Auth::user()->name }}" class="profile-user-img img-responsive img-circle">
                                    <div class="form-group logos">
                                      <label for="logo">Update Profile Image</label>
                                      <input type="file" name="logo" id="logo" >
                                    
                                    </div>
                                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                      <label for="name">Name</label>
                                      <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="{{ Auth::user()->name }}">
                                      @if ($errors->has('name'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                      <label for="email">Email</label>
                                      <input type="email" class="form-control" name="email" id="email" placeholder="Enter Email"  value="{{ Auth::user()->email }}">
                                      @if ($errors->has('email'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                      <label for="zipcode">Zip-Code</label>
                                      <input type="text" class="form-control" name="zipcode" id="zipcode" placeholder="Enter Zipcode"  value="{{ Auth::user()->zipcode }}">
                                      @if ($errors->has('zipcode'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('zipcode') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                      <label for="country">Country</label>
                                      <input type="text" class="form-control" name="country" id="country" placeholder="Enter Country"  value="{{ Auth::user()->country }}">
                                      @if ($errors->has('country'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('country') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                      <label for="address">Address</label>
                                      <textarea class="form-control" name="address" id="address" placeholder="Enter Address"> {{ Auth::user()->address }}</textarea>
                                      @if ($errors->has('address'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                      <label for="description">Description</label>
                                      <textarea class="form-control" name="description" id="description" placeholder="Enter Description"> {{ Auth::user()->descripton }}</textarea>
                                      @if ($errors->has('description'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('description') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                  </div>
                                  </div>
                                  <div class="box-footer">
                                  <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-info btn-lg">Update Profile</button>
                                  </div>
                                  </div>
                                </form>


                                </div>
                            </div>
                        </div>

                   @stop