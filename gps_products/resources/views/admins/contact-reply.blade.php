@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Reply Contact')
@section('content')

    <div class="container">
        <div class="page-title">
            <h3>Send Reply</h3>

        </div><!--end page title-->

        <div class="row">

            <div class="col-sm-12">
                <div class="panel-box">
                    <div class="col-sm-8 col-sm-offset-2">
                        @include('../layouts/message')

                        <h3>
                            Message
                        </h3>
                        <h5>
                            <?= $contact->description ?>
                        </h5>
                        <span>
                            <?= $contact->created_at ?>
                        </span>

                        <br/>
                        <br/>

                        <form class="form-horizontals" method="POST" action="{{ route('admin-contact-send-email') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input type="hidden" name="id" value="<?= $contact->id?>">
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