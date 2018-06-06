@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Settings')
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
                  <h4 class="text-center head_apps">Settings</h4>
              </div>
              <div class="col-xs-3">
                             
              </div>
            </div>

           
          <div class="col-xs-12 wow fadeInUp">
              <div class="row">
                <div class="setting_wrapper">
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-user"></i>
                    </div>
                    <div class="setting_data">
                <p class="setting_left">Name</p>
                <p class="setting_right">{{ Auth::user()->name }}</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-mobile" aria-hidden="true"></i>
                    </div>
                    <div class="setting_data">
                <p class="setting_left">Mobile</p>
                <p class="setting_right">+{{ Auth::user()->phone_number }}</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    </div>
                    <div class="setting_data">
                <p class="setting_left">Email</p>
                <p class="setting_right">{{ Auth::user()->email }}</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <b><i class="fa fa-lock" aria-hidden="true"></i></b>
                    </div>
                    <a href="{{ route('change-password') }}">
                    <div class="setting_data">
                    <p class="setting_left"><b> Change Password </b></p>
                    <p class="setting_right"><b><i class="fa fa-angle-right" aria-hidden="true"></i></b> </p>
                    </div>
                    <div class="clearfix"></div>
                  </div></a>
                  <div class="setting_forms">
                    <div class="setting_icons">
                        <b><i class="fa fa-globe" aria-hidden="true"></i></b>
                    </div>
                    <div class="setting_data">
                        <p class="setting_left"> <b> Language </b> </p>
                        <p class="setting_right"> <b> English  <i class="fa fa-angle-right" aria-hidden="true"></i></b> </p>
                      

                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
          </div>

          <div class="col-xs-12 wow fadeInUp">
              <div class="row">
                <div class="setting_wrapper">
                  <h4 class="al_titles"> ALERTS </h4>
                  <div class="setting_forms">
                    <div class="setting_conte">
                      <div class="setting_left"> Send an alert when status changes </div>
                        <div class="setting_right">
                        <form action="{{ route('all-alerts') }}" method="POST">
                          {{ csrf_field() }}
                            <input type="hidden" name="alerts" value="status_alert">
                            <button type="submit" class="btn btn-lg btn-toggle @if(Auth::user()->status_alert == 'active') active @endif" data-toggle="submit" aria-pressed="@if(Auth::user()->status_alert == 'active') true @else false @endif" autocomplete="off">
                                <div class="handle"></div>
                            </button>
                            </form>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_conte">
                      <div class="setting_left"> Email Alerts </div>
                      <div class="setting_right">
                        <form action="{{ route('all-alerts') }}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="alerts" value="email_alert">
                          <button type="submit" class="btn btn-lg btn-toggle @if(Auth::user()->email_alert == 'active') active @endif" data-toggle="submit" aria-pressed="@if(Auth::user()->email_alert == 'active') true @else false @endif" autocomplete="off">
                              <div class="handle"></div>
                          </button>
                          </form>
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_conte">
                      <div class="setting_left">Text (SMS) messages</div>
                      <div class="setting_right">
                      
                        <form action="{{ route('all-alerts') }}" method="POST">
                          {{ csrf_field() }}
                          <input type="hidden" name="alerts" value="sms_alert">
                          <button type="submit" class="btn btn-lg btn-toggle @if(Auth::user()->sms_alert == 'active') active @endif" data-toggle="submit" aria-pressed="@if(Auth::user()->sms_alert == 'active') true @else false @endif" autocomplete="off">
                            <div class="handle"></div>
                          </button>
                        </form>
                      
                      </div>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
          </div>

          {{--<div class="col-xs-12 wow fadeInUp">
              <div class="row">
                <div class="setting_wrapper">
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-star-o" aria-hidden="true"></i>
                    </div>
                    <div class="setting_data">
                      <p class="setting_left">Rate the App!</p>
                      <p class="setting_right"> <i class="fa fa-angle-right" aria-hidden="true"></i> </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-mobile" aria-hidden="true"></i>
                    </div>
                    <div class="setting_data">
                      <p class="setting_left">Feedback</p>
                      <p class="setting_right"> <i class="fa fa-angle-right" aria-hidden="true"></i> </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
          </div>--}}

          <div class="col-xs-12 wow fadeInUp">
              <div class="row">
                <div class="setting_signouts">
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-sign-out" aria-hidden="true"></i>
                    </div>
                    <div class="setting_data">
                      <p class="setting_left"><a href="{{ route('signout') }}">Sign Out</a></p>
                      <p class="setting_right">  </p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        </div>

@stop

@section('scripts')

  <script>
    $(document).ready(function(){
  // Change Language
  $('#languageSwitcher').change(function() {
    var locale = $(this).val();

    var _token = $('input[name=_token]').val();

    $.ajax({
      url: '/language',
      type: 'POST',
      data:{locale:locale, _token:_token},
      datatype: 'json',
      success: function (data){

      },
      error: function(data){

      },
      beforeSend: function(){

      },
      complete: function (data) {
        window.location.reload(true);
      }

    });

  });

});
  </script>

@endsection

