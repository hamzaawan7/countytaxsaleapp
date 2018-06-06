@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Contacts')
@section('content')

    <div class="container">
        <div class="page-title">
            <h3>Contact Message</h3>
            @include('../layouts/message')
        </div><!--end page title-->

        <div class="row">
            <div class="col-sm-12">
                <div class="panel-box">
                    @if(count($contacts) > 0)
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dataTable" id="table-2">
                                <thead>
                                <tr>
                                    <th>Sl Id.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 1; ?>
                                @foreach($contacts as $user)
                                    <tr>
                                        <td>{{ $i++ }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->description }}</td>
                                        <td>
                                            <a href="{{ route('admin-contact-reply', ['id' => $user->id ]) }}"
                                               class="btn btn-success btn-xs"> <i class="fa fa-reply"></i> </a>
                                        </td>
                                        <td>
                                            <a href="{{ route('admin-contact-del', ['id' => $user->id ]) }}"
                                               class="btn btn-danger btn-xs"> <i class="fa fa-trash"></i> </a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Sl Id.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                    @else
                        <h3>Data Not Found.</h3>
                    @endif
                </div>
            </div>
        </div>

@stop