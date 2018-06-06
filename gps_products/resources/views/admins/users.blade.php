@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Users')
@section('content')

    <div class="container">
        @include('layouts.message')
        <form action="{{ route('admin-selected-group') }}" method="post">
            {{ csrf_field() }}
            <div class="page-title">
                <h3>
                    User <button type="submit" class="btn btn-primary">Send Email / Message</button>
                </h3>
            </div><!--end page title-->

            <div class="row">
                <div class="col-sm-12">
                    <div class="panel-box">
                        @if(count($users) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered dataTable" id="table-2">
                                    <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" id="select-all"/>
                                        </th>
                                        <th>Sl Id.</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Account Type</th>
                                        <th>Last4</th>
                                        <th>Subscribe/Unsubscribe</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 0; ?>
                                    @foreach($users as $user)
                                        <?php $i++; ?>
                                        <tr>
                                            <td>
                                                <input type="checkbox" value="{{$user->id}}" name="users[]" id="select-one-{{ $i }}">
                                            </td>
                                            <td>{{ $i }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>{{ $user->phone_number }}</td>
                                            <td>
                                                <?php $user_type = App\Premium_user::where('user_id', $user->id)->orderBy('id', 'DESC')->first(); ?>
                                                @if(count($user_type) >0)
                                                    <?php
                                                    $end_date = $user_type->end_date;
                                                    if ($end_date > date('Y-m-d')) {
                                                        $status = ucfirst($user_type->status);
                                                    } else {

                                                        $status = "EXPIRED";
                                                    }


                                                    ?>
                                                    <button class="btn btn-success btn-xs">{{ $status }}</button>


                                                @endif
                                            </td>
                                            <td>
                                                <?php
                                                $userhascard = 0;
                                                $user_card = App\Payment::where('user_id', $user->id)->orderBy('id')->first(); ?>
                                                @if(count($user_card) >0)
                                                    <?php  $userhascard = 1; ?>
                                                    {{ ucfirst( $user_card->card_number ) }}
                                                @endif

                                            </td>
                                            <td>
                                                <?php
                                                if($userhascard == 1){
                                                ?>

                                                @if($user->is_subscribed == '1' )
                                                    <label>Subscribed / </label>
                                                    <button class="btn btn-success btn-xs btn-unsubscribe"
                                                            data-id="<?php echo $user->id; ?>">Unsubscribe
                                                    </button>
                                                @elseif($user->is_subscribed == '0')
                                                    <button class="btn btn-success btn-xs btn-subscribe"
                                                            data-id="<?php echo $user->id; ?>">Subscribe
                                                    </button>
                                                    <label> / Unsubscribed</label>
                                                @endif
                                                <?php }else {
                                                    echo "No card";
                                                } ?>
                                            </td>
                                            <td>
                                                @if($user->status == 'active')
                                                    <button class="btn btn-success btn-xs">Active</button>
                                                @elseif($user->status == 'inactive')
                                                    <button class="btn btn-warning btn-xs">In-Active</button>
                                                @elseif($user->status == 'block')
                                                    <button class="btn btn-danger btn-xs">Block</button>
                                                @else
                                                    <button class="btn btn-danger btn-xs">Remove</button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('admin-user-view', ['id' => $user->id ]) }}"
                                                   class="btn btn-info btn-xs"> <i class="fa fa-eye"></i> </a>
                                                <a href="{{ route('admin-user-edit', ['id' => $user->id ]) }}"
                                                   class="btn btn-danger btn-xs"> <i class="fa fa-edit"></i> </a>
                                                <a href="{{ route('admin-user-delete', ['id' => $user->id ]) }}"
                                                   class="btn btn-success btn-xs"> <i class="fa fa-trash"></i> </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    <input id="size-users" value="{{$i}}" type="hidden"/>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Sl Id.</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                        <th>Account Type</th>
                                        <th>Last4</th>
                                        <th>Subscribe/Unsubscribe</th>
                                        <th>Status</th>
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
        </form>
        @stop


        @section('scripts')
            <script type="text/javascript">
                $('#select-all').click(function () {
                    var size = $("#size-users").val();
                    for (var i = 1; i <= size; i++) {
                        $('#select-one-' + i).not(this).prop('checked', this.checked);
                    }
                });
                $('.btn-unsubscribe').click(function () {
                    var id = $(this).attr('data-id');
                    if (confirm("You are sure want to Unsubscribe?")) {
                        $.ajax({
                            url: "unsubsctibe_user/" + id, dataType: 'json', success: function (result) {

                                if (result.status == 1) {

                                    location.reload();
                                }
                                else
                                    alert("Something went wrong");

                            }
                        });


                    }

                });
                $('.btn-subscribe').click(function () {
                    var id = $(this).attr('data-id');
                    if (confirm("You are sure want to Subscribe?")) {
                        $.ajax({
                            url: "subsctibe_user/" + id, dataType: 'json', success: function (result) {

                                if (result.status == 1) {

                                    location.reload();
                                }
                                else {
                                    alert("Something went wrong");
                                }
                            }
                        });
                    }
                })
            </script>
@endsection