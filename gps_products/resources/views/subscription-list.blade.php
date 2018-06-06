@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Subscriptions')
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
                <h4 class="text-center head_apps">My Subscriptions</h4>
            </div>
            <div class="col-xs-3">
                <ul class="list-inline filete_box  pull-right">
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
                    <li><a href="{{ route('search-results') }}"><i class="fa fa-filter" aria-hidden="true"></i></a></li>
                </ul>                
            </div>
            </div>
           
            
        <div class="container">
            <div class="row">

            @include('layouts.message')
            <div class="setting_wrapper">
                  @if(!$premiums)
                    <p>Your subscription is expired / <a href="subscribe" class="btn btn-warning btn-xs"> Subscribe</a></p>
                  @else

                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-user"></i>
                    </div>
                    <div class="setting_data">
                <p class="setting_left">Subscription Type : {{ ucfirst($premiums->status) }} </p>
                <p class="setting_right"><?php 
                if($is_subscribed==1){
?>
Subscribed / <a href="unsubscribe" class="btn btn-warning btn-xs"> Unsubscribe</a></p>
<?php
}else{
  ?>
  Unsubscribed / <a href="subscribe" class="btn btn-warning btn-xs"> Subscribe</a></p>
  <?php
}


                ?>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <div class="setting_data">
                <p class="setting_left">Subscription Start Date</p>
                <p class="setting_right">{{ date('m/d/Y',strtotime($premiums->created_at)) }}</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <div class="setting_data">
                    <p class="setting_left">Subscription Expiration Date</p>
                    <p class="setting_right">{{ date('m/d/Y',strtotime($premiums->end_date)) }}</p>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="setting_forms">
                    <div class="setting_icons">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <div class="setting_data">
                    @if(ucfirst($premiums->status)=="Trial")
                    <p class="setting_left">Next Subscription Date</p>
                    @else
                    <p class="setting_left">Next Payment Date</p>
                    @endif
                    <p class="setting_right"><?php
echo date('m/d/Y',strtotime($premiums->end_date."+1 days"));
                     ?></p>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  
                  @endif

            </div>
      
            </div>
        </div>

        </div>
        </div>

@stop


