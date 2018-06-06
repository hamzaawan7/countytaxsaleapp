@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Change Password')
@section('content')

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
                  <h4 class="text-center head_apps">Change Password</h4>
              </div>
              <div class="col-xs-3">
                             
              </div>
            </div>

           
          <div class="col-xs-12 wow fadeInUp">
              <div class="row">
                <div class="setting_wrapper">
                @include('layouts.message')
                <form action="{{ route('user-password-update') }}" method="POST">
                  <input type="hidden" name="_token" value="{{ Session::token() }}">
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-lock"></i>
                    </div>
                    <div class="setting_data">
                      <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                      <input type="password" class="form-control" name="old_password" id="old_password" placeholder="Enter Old Password">
                      @if ($errors->has('old_password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('old_password') }}</strong>
                        </span>
                      @endif
                    </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <div class="setting_data">
                     <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                      <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password">
                      @if ($errors->has('new_password'))
                        <span class="help-block">
                          <strong>{{ $errors->first('new_password') }}</strong>
                        </span>
                      @endif
                    </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-lock" aria-hidden="true"></i>
                    </div>
                    <div class="setting_data">
                     <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                      <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Enter Confirm New Password">
                      @if ($errors->has('password_confirmation'))
                        <span class="help-block">
                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                        </span>
                      @endif
                    </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      
                    </div>
                    <div class="setting_data">
                     <p class="setting_left"></p>
                      <p class="setting_right"><button class="btn btn-success">Change Password</button></p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                 </form>



                    
                    









                 
                </div>
              </div>
          </div>

        </div>
        </div>

@stop

