@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Edit User')
@section('content')

                    <div class="container">
                        <?php
                        $primium = App\Premium_user::where('user_id', $user->id)->orderBy('id','DESC')->first();
                        $is_manually=0;
                        $end_date="";
                        if($primium){
                            if($primium->is_manually==1){
                                 $is_manually=1;
                                $end_date1=$primium->end_date;
                                $pieces=explode(" ",  $end_date1);
                                $end_date=$pieces[0];
                                // $pieces1=explode("-", $pieces[0]);
                                // $end_date=$pieces1[2]."-".$pieces1[1]."-".$pieces1[0];
                            }
                        }
                        
                        ?>

                        <div class="page-title">
                            <h3>Edit User</h3>
                              
                        </div><!--end page title-->

                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box">
                                    <div class="col-sm-8 col-sm-offset-2">
                                    @include('../layouts/message')
                                        <h4>Edit User</h4>
                                        <form class="form-horizontals" method="POST" action="{{ route('user-update-profile') }}" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                                <label for="name" class="control-label">Name</label>
                                                                <input type="text" name="name" id="name" placeholder="Write Name" class="form-control"  value="{{old('name',$user->name)}}">
                                                            @if ($errors->has('name'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('name') }}</strong>
                                                                </span>
                                                            @endif 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                           <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                                                <label for="email" class="control-label">Email</label>
                                                                <input type="email" name="email" id="email" placeholder="Write Email" class="form-control"  value="{{old('email',$user->email)}}">
                                                            @if ($errors->has('email'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('email') }}</strong>
                                                                </span>
                                                            @endif 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group{{ $errors->has('zipcode') ? ' has-error' : '' }}">
                                                                <label for="zipcode" class="control-label">Zip code</label>
                                                                <input type="text" name="zipcode" id="zipcode" placeholder="Write Zip-code" class="form-control"  value="{{old('zipcode',$user->zipcode)}}">
                                                                @if ($errors->has('zipcode'))
                                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('zipcode') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group{{ $errors->has('country') ? ' has-error' : '' }}">
                                                                <label for="country" class="control-label">Country </label>
                                                                <input type="country" name="country" id="country" placeholder="Write Country Name" class="form-control"  value="{{old('country',$user->country)}}">
                                                                @if ($errors->has('email'))
                                                                    <span class="help-block">
                                                                    <strong>{{ $errors->first('country') }}</strong>
                                                                </span>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('address') ? ' has-error' : '' }}">
                                                <label for="cause" class="control-label">Address</label>
                                                <textarea name="address" id="address" placeholder="Write Address" class="form-control">{{old('address',$user->address)}}</textarea>
                                            @if ($errors->has('address'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif  
                                            </div>
                                            <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                                <label for="cause" class="control-label">Description</label>
                                                <textarea name="description" id="description" placeholder="Write Description" class="form-control">{{old('description',$user->descripton)}}</textarea>
                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('description') }}</strong>
                                                </span>
                                            @endif
                                            </div>
                                             <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group{{ $errors->has('number') ? ' has-error' : '' }}">
                                                                <label for="number" class="control-label">Phone Number</label>
                                                                <input type="number" name="number" id="number" class="form-control" value="{{old('number',$user->phone_number)}}">
                                                                 @if ($errors->has('number'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('number') }}</strong>
                                                                </span>
                                                            @endif  
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                                                                <label for="status" class="control-label">Status</label>
                                                                <select name="status" id="status" class="form-control">  
                                                                    <option value="active" @if($user->status == 'active') selected @endif>Active</option>
                                                                    <option value="inactive" @if($user->status == 'inactive') selected @endif>Inactive</option>
                                                                    <option value="block" @if($user->status == 'block') selected @endif>Block</option>
                                                                    <option value="remove" @if($user->status == 'remove') selected @endif>Remove</option>
                                                                </select>
                                                                 @if ($errors->has('status'))
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('status') }}</strong>
                                                                </span>
                                                            @endif  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                              <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <input type="checkbox" name="manually_subdcribe" id="manually_subdcribe" onchange="change_manually_subcription()"  > &nbsp;&nbsp;  Manually Subscribe
                                                              <div style="display: none"  id="div_manually_subdcribe_date" class="form-group{{ $errors->has('manually_subdcribe_date') ? ' has-error' : '' }}">
                                                                <label for="manually_subdcribe_date" class="control-label">End Date</label>
                                                                <input type="date" name="manually_subdcribe_date" id="manually_subdcribe_date" value="<?php echo $end_date; ?>"  class="form-control" >
                                                                 @if ($errors->has('manually_subdcribe_date'))
                                                        <?php $is_manually=1; ?>
                                                                <span class="help-block">
                                                                    <strong>{{ $errors->first('manually_subdcribe_date') }}</strong>
                                                                </span>
                                                            @endif  
                                                            </div>
                                                            <br>
                                                            <br>
                                                            <br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="id" value="{{ $user->id }}">

                                            <div class="form-group">
                                                <button class="btn btn-sm btn-lg btn-theme" type="submit">Submit </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" id="pre_is_manually" value="<?php echo $is_manually; ?>" >
                   @stop
                   <script type="text/javascript">
                       function change_manually_subcription(){
                          if($("#manually_subdcribe").is(':checked')){
                         $("#div_manually_subdcribe_date").show();
                          }else{
                            $("#div_manually_subdcribe_date").hide();
                          }
                       }
                         function precheck(){
                         var pre_is_manually=$("#pre_is_manually").val();
                       if(pre_is_manually==1){
                        $("#manually_subdcribe").prop('checked',true);
                        change_manually_subcription();
                       }
                       }
                  

                      setTimeout(function(){ precheck() }, 1000);
                     
                       
                      
                   </script>
