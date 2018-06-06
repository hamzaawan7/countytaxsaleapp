
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Dashboard'); ?>
<?php $__env->startSection('content'); ?>

    <div id="wrapper">
    <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
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
                    <h4 class="text-center head_apps">County App</h4>
                </div>
                <div class="col-xs-3">
                    <ul class="list-inline filete_box  pull-right">
                        <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
                        <li><a href="<?php echo e(route('search-results')); ?>"><i class="fa fa-filter" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="search_boxes  wow fadeInRight">
                        <form action="<?php echo e(route('search-view')); ?>" method="get" role="search">
                            <div class="form-group">
                                <input type="text" name="search" class="form-control searches" id="usr"
                                       placeholder="&#xF002;   Search Properties By Address/ Zip Code/ Account Number/ Cause Number"
                                       value="<?php echo e(old('search')); ?>" autocomplete="off">
                            </div>
                            <div class="form-group col-sm-12" style="display: none;">
                                <input class="btn btn-primary" type="submit" value="Submit">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <input type="hidden" id="lat" value="29.7604">
            <input type="hidden" id="lng" value="-95.3698">
            <input type="hidden" id="radius" value="16093">
            <input type="hidden" id="changed" value="0">
            <div id="x"></div>
            <div class="container">
                <div class="row">
                    <div id="map-canvas-left" class="map-canvas-left"></div>

                </div>
            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>



    <style>
        #map-canvas-left {
            min-height: 610px !important;
            position: relative;
        }

        .iw_container .iw_title {
            font-size: 16px;
            font-weight: bold;
            color: #000;
        }

        .iw_content {
            /* padding: 15px 15px 15px 0; */
            color: #000;
            font-weight: bold;
            padding: 10px 0px;
        }

        .img_maps {
            width: 280px;
            height: 150px;
        }

        .pro_price {
            color: #E07A5F;
            font-size: 25px;
            font-weight: bold;
        }

        .auc_online {
            font-size: 18px;
        }

    </style>
    <div style="display: none;" id="points">[]</div>
    <?php
    // $user_ip = getenv('REMOTE_ADDR');
    // $geo = unserialize(file_get_contents("http://www.geoplugin.net/php.gp?ip=$user_ip"));
    // $lat = $geo['geoplugin_latitude'];
    // if($lat == ''){
    //   $lats = 29.7604;
    // }else{
    //   $lats = $lat;
    // }
    // $lng = $geo['geoplugin_longitude'];
    // if($lng == ''){
    //   $lngs =  -95.3698;
    // }else{
    //   $lngs = $lng;
    // }

    // echo $lngs.'<br>';
    // echo $lats;


    ?>



    <script src='https://maps.googleapis.com/maps/api/js?key=AIzaSyDnT6ewhJpccffkJRlbAPyCQeQKJxJfLQ8&libraries=places'></script>
    <script>


var canvalHeight=$("html").innerHeight()-95;
setTimeout(function(){
$("#map-canvas-left").attr('style',"position: relative; overflow: hidden;min-height:"+canvalHeight+"px !important");
 }, 1);

        // markersData variable
        // var markersDataLeft = [

        //       <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        //          {
        //             lat: "<?php echo e($product->lat); ?>",
        //             lng: "<?php echo e($product->lng); ?>",
        //             name: "<?php echo e($product->address); ?>",
        //             address1:"<img src='<?php echo e($product->image_url); ?>' class='img_maps'>",
        //             address2: "<p><span class='pro_price'><?php echo e($product->min_bid); ?></span> <a href='<?php echo e(route('subscriptions')); ?>'>Starting Bid</a></p>",
        //             postalCode: "<p class='auc_online'> Status: <?php echo e($product->status); ?> </p><p class='text-center'><a href='<?php echo e(route('products', ['id' => $product->id ])); ?>' class='btn btn-info'>Details</a></p>",
        //          },
        //       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        // ];
        var x = document.getElementById("x");

        function getLocation() {
            if (navigator.geolocation) {
              console.log(navigator.geolocation);
               console.log(navigator.geolocation.getCurrentPosition(showPosition));
                // if(typeof navigator.geolocation.getCurrentPosition(showPosition)=="undefined")
                // {
                //   $.getJSON('https://ipinfo.io/geo', function(response) {
                //       var loc = response.loc.split(',');
                //       $('#lat').val(loc[0]);
                //       $('#lng').val(loc[1]);
                //   });
                // }
                // navigator.geolocation.getCurrentPosition(showPosition);

            } else {
                x.innerHTML = "Geolocation is not supported by this browser.";
            }
        }
        function showPosition(position) {
            // x.innerHTML = "Latitude: " + position.coords.latitude + "Longitude: " + position.coords.longitude;
            $('#lat').val(position.coords.latitude);
            $('#lng').val(position.coords.longitude);


        }

        $(document).ready(function () {
            getLocation();
            google.maps.event.addDomListener(window, 'load', function () {
                initialize()
            });

        });

        markersDataLeft = $('#points').html();


        function initialize(setMap) {

            var mapOptions;
            var lats = $('#lat').val();
            var lngs = $('#lng').val();


            markersDataLeft = $('#points').html();

            mapLeft = new google.maps.Map(document.getElementById('map-canvas-left'), {
                zoom:12,
                center: new google.maps.LatLng(lats, lngs),
                gestureHandling: "greedy"
            });

            infoWindowLeft = new google.maps.InfoWindow();

            google.maps.event.addListener(mapLeft, 'click', function () {

                infoWindowLeft.close();

            });

            $.ajax({
                url: "property-near-me",
                method: "GET",
                data: {lat: $('#lat').val(), lng: $('#lng').val(), radius: $('#radius').val()}
            }).done(function (data) {
                // data = $.parseJSON(data);
                $('#points').text(data);
                $('#changed').val(0);
                displayMarkers(setMap);
                // markersDataLeft = data;
                console.log("called");
            });


        }


        function displayMarkers(setMap) {

            var markersData;
            var map;
            markersDataLeft = $('#points').text();
            markersData = $.parseJSON(markersDataLeft);
            // console.log(markersData);
            map = mapLeft;
          

            // console.log(markersDataLeft);


            var bounds = new google.maps.LatLngBounds();
            if (markersData != "[]") {
                for (var i = 0; i < markersData.length; i++) {

                    var latlng = new google.maps.LatLng(markersData[i].lat, markersData[i].lng);
                    var name = markersData[i].name;
                    var pointStatus = markersData[i].status;
                    var address1 = markersData[i].address1;
                    var address2 = markersData[i].address2;
                    var postalCode = markersData[i].postalCode;
                    var url = markersData[i].status;

                    createMarker(latlng, name, address1, address2, postalCode, url,pointStatus);

                    //bounds.extend(latlng);
                }
            }
            map = mapLeft;
            var lats = $('#lat').val();
            var lngs = $('#lng').val();
            var latlng = new google.maps.LatLng(lats, lngs);
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                title: "Me",
                icon: "<?php echo e(asset('asset/images/me.png')); ?>"
            });

            /*var circle = new google.maps.Circle({
                map: map,
                radius: parseInt($('#radius').val()),    // 10 miles in metres
                fillColor: '#AA0000',
                geodesic: true,
                draggable: true,
                clickable: true,
                editable: true,
                visible: true,
            });
            circle.bindTo('center', marker, 'position');

            google.maps.event.addListener(circle, 'radius_changed', function () {
                // console.log("radius_changed"+circle.getRadius());
                $('#radius').val(circle.getRadius());
                initialize();
            });
            google.maps.event.addListener(circle, 'center_changed', function () {
                $('#lat').val(circle.getCenter().lat());
                $('#lng').val(circle.getCenter().lng());
                console.log("center_changed" + circle.getCenter());
                $('#changed').val(1);

                // marker.position = new google.maps.LatLng(circle.getCenter()); // new position
                // marker.setMap(map);


            });*/


            //map.fitBounds(bounds);
        }

        window.setInterval(function () {
            if ($('#changed').val() == "1")
                initialize();
        }, 3000);

        // This function creates
        function createMarker(latlng, name, address1, address2, postalCode, url,pointStatus) {

            var map;
            var infoWindow;

            map = mapLeft;
            infoWindow = infoWindowLeft;
            console.log('<?php echo e(asset('assets/pin/red-circle.png')); ?>');

        var icons = {
          active: {
            icon: '<?php echo e(asset('assets/pin/red-circle.png')); ?>'
          },
          cancelled: {
            icon: '<?php echo e(asset('assets/pin/wht-circle.png')); ?>'
          }
         
        };
       //console.log(icons[pointStatus]['icon']);

            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                title: name,
                icon:icons[pointStatus]['icon']


            });

            /*if(url == "active"){
                marker.setIcon('<?php echo e(asset('asset/images/active.png')); ?>');
            }*/

            google.maps.event.addListener(marker, 'click', function () {

                var iwContent = '<div class="iw_container">' +
                    '<div class="iw_title">' + address1 + '</div>' +
                    '<div class="iw_content">' + name + '</div><div class="iw_right">' +
                    address2 + '' +
                    postalCode + '</div></div></div>';

                infoWindow.setContent(iwContent);

                infoWindow.open(map, marker);
            });
        }

    </script>


<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>