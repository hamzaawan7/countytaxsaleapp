@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Change Password')
@section('content')

                    <div class="container">
                        <div class="page-title">
                            <h3>Password Change</h3>
                        </div><!--end page title-->


                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box clearfix">

                                    @include('layouts.message')
                                  <form method="post" action="{{ route('admin-password-update') }}">
                                 <input type="hidden" name="_token" value="{{ Session::token() }}">
                                  <div class="box-body">
                                  <div class="col-md-8 col-md-offset-2">
                                    <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                                      <label for="old_password">Old Password</label>
                                      <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
                                      @if ($errors->has('old_password'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('old_password') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                                      <label for="new_password">New Password</label>
                                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                                      @if ($errors->has('new_password'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('new_password') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                                      <label for="password_confirmation">Confirm New Password</label>
                                      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm New Password">
                                      @if ($errors->has('password_confirmation'))
                                        <span class="help-block">
                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                      @endif
                                    </div>
                                  </div>
                                  </div>
                                  <div class="box-footer">
                                  <div class="col-md-8 col-md-offset-2">
                                    <button type="submit" class="btn btn-info">Change Password</button>
                                  </div>
                                  </div>
                                </form>


                                </div>
                            </div>
                        </div>

                   @stop