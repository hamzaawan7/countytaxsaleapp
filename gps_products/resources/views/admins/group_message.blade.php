@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Group Message')
@section('content')

    <div class="container">
        <div class="page-title">
            <h3>Send Group Message</h3>

        </div><!--end page title-->

        <div class="row">

            <div class="col-sm-12">
                <div class="panel-box">
                    <div class="col-sm-8 col-sm-offset-2">
                        @include('../layouts/message')

                        <h3>
                            Message
                        </h3>

                        <br/>
                        <br/>

                        <form class="form-horizontals" method="POST" action="{{ route('admin-submit-group-message') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <label for="using" class="control-label"> Using</label>
                            <select class="form-control" name="using">
                                <option value="0">Both</option>
                                <option value="1">Email</option>
                                <option value="2">Mobile</option>
                            </select>
                            <br/>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('text') ? ' has-error' : '' }}">
                                        <label for="text" class="control-label"> Email</label>
                                        <textarea name="text" id="mytextarea" rows="15" cols="80" class="form-control">
                                        </textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-sm btn-lg btn-theme" type="submit">Submit</button>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
@stop

@section('scripts')

@endsection