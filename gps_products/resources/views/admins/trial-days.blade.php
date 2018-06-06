@extends('layouts.master')
@section('title', 'County Tax Sale App (CTSA) | Dashboard')
@section('content')

    <div class="container">
        <div class="page-title">
            <h3>Edit Trial Days</h3>

        </div><!--end page title-->

        <div class="row">

            <div class="col-sm-12">
                <div class="panel-box">
                    <div class="col-sm-8 col-sm-offset-2">
                        @include('../layouts/message')
                        <form class="form-horizontals" method="POST" action="{{ route('admin-update-trial-days') }}"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('location') ? ' has-error' : '' }}">
                                        <label for="days" class="control-label"> Days</label>
                                        <select name="days" id="days" class="form-control">
                                            <option value="<?= $trial_days->days ?>"><?= $trial_days->days ?></option>
                                            <option value="1">1</option>
                                            <option value="7">7</option>
                                            <option value="14">14</option>
                                            <option value="21">21</option>
                                        </select>
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

            <script type="text/javascript">
                $('#datetimepicker').datetimepicker({
                    //format: 'dd-MM-yyyy',
                    format: 'yyyy-MM-dd',
                });


                $('#datetimepickers').datetimepicker({
                    format: 'yyyy-MM-dd',
                });

                $('#datetimepickerss').datetimepicker({
                    format: 'yyyy-MM-dd',
                });
            </script>
            <script type="text/javascript"
                    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnT6ewhJpccffkJRlbAPyCQeQKJxJfLQ8&libraries=places"></script>

            <script>
                function initialize() {
                    var latlng = new google.maps.LatLng(41.389994, -73.9682003);
                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: latlng,
                        zoom: 13
                    });
                    var marker = new google.maps.Marker({
                        map: map,
                        position: latlng,
                        draggable: true,
                        anchorPoint: new google.maps.Point(0, -29)
                    });
                    var input = document.getElementById('searchInput');
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
                    var geocoder = new google.maps.Geocoder();
                    var autocomplete = new google.maps.places.Autocomplete(input);
                    autocomplete.bindTo('bounds', map);
                    var infowindow = new google.maps.InfoWindow();
                    autocomplete.addListener('place_changed', function () {
                        infowindow.close();
                        marker.setVisible(false);
                        var place = autocomplete.getPlace();
                        if (!place.geometry) {
                            window.alert("Autocomplete's returned place contains no geometry");
                            return;
                        }

                        // If the place has a geometry, then present it on a map.
                        if (place.geometry.viewport) {
                            map.fitBounds(place.geometry.viewport);
                        } else {
                            map.setCenter(place.geometry.location);
                            map.setZoom(17);
                        }

                        marker.setPosition(place.geometry.location);
                        marker.setVisible(true);

                        bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location.lng());
                        infowindow.setContent(place.formatted_address);
                        infowindow.open(map, marker);

                    });
                    // this function will work on marker move event into map
                    google.maps.event.addListener(marker, 'dragend', function () {
                        geocoder.geocode({'latLng': marker.getPosition()}, function (results, status) {
                            if (status == google.maps.GeocoderStatus.OK) {
                                if (results[0]) {
                                    bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker.getPosition().lng());
                                    infowindow.setContent(results[0].formatted_address);
                                    infowindow.open(map, marker);
                                }
                            }
                        });
                    });
                }
                function bindDataToForm(address, lat, lng) {
                    document.getElementById('location').value = address;
                    document.getElementById('lat').value = lat;
                    document.getElementById('lng').value = lng;
                }
                google.maps.event.addDomListener(window, 'load', initialize);
            </script>
            <style type="text/css">
                .input-controls {
                    margin-top: 10px;
                    border: 1px solid transparent;
                    border-radius: 2px 0 0 2px;
                    box-sizing: border-box;
                    -moz-box-sizing: border-box;
                    height: 32px;
                    outline: none;
                    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.3);
                }

                #searchInput {
                    background-color: #fff;
                    font-family: Roboto;
                    font-size: 15px;
                    font-weight: 300;
                    margin-left: 12px;
                    padding: 0 11px 0 13px;
                    text-overflow: ellipsis;
                    width: 60%;
                }

                #searchInput:focus {
                    border-color: #4d90fe;
                }
            </style>
@endsection