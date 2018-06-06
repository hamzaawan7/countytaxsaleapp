@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Excel Upload')
@section('content')

    <div class="container">
        <div class="page-title">
            <h3>Import CSV File</h3>

        </div><!--end page title-->

        <div class="row">

            <div class="col-sm-12">
                <div class="panel-box">
                    <div class="col-sm-8 col-sm-offset-2">
                        @include('../layouts/message')
						@if(session('nexmo_errors'))
							@foreach(session('nexmo_errors') as $nexmo_error)
									<div class="alert alert-danger alert-dismissible">
									  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
										{{ $nexmo_error }}
									</div>
							@endforeach		
						@endif
                        <form class="form-horizontals" method="POST" action="{{ route('import-excel') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('import_file') ? ' has-error' : '' }}">
                                <label for="cause" class="control-label">Import in csv</label>
                                <input type="file" name="import_file" id="import_file" placeholder="Write Cause" class="form-control">
                                @if ($errors->has('import_file'))
                                    <span class="help-block">
                                                        <strong>{{ $errors->first('import_file') }}</strong>
                                                    </span>
                                @endif
                            </div>





                            <!-- <input type="file" name="import_file" /> -->
                            <button class="btn btn-primary">Import File</button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
@stop
