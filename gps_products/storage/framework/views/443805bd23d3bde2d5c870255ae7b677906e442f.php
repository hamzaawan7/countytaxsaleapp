
<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Edit Property'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <div class="page-title">
                            <h3>Edit Property</h3>
                            
                        </div><!--end page title-->

                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box">
                                    <div class="col-sm-8 col-sm-offset-2">
                                    <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <h4>Edit Property</h4>
                                                <img src="<?php echo e($product->image_url); ?>" alt="<?php echo e($product->address); ?>" class="profile-user-img img-responsive img-circle">


                                                <br>
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                              <tr>
                                                <th>Name</th>
                                                <th>Details</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <td>Address</td>
                                                <td><?php echo e($product->address); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Lat</td>
                                                <td><?php echo e($product->lat); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Lang</td>
                                                <td><?php echo e($product->lng); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Zip Code</td>
                                                <td><?php echo e($product->zipcode); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Precinct</td>
                                                <td><?php echo e($product->precinct); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Sale</td>
                                                <td><?php echo e($product->sale); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Account</td>
                                                <td><?php echo e($product->account); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Cause</td>
                                                <td><?php echo e($product->cause); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Judgment</td>
                                                <td><?php echo e($product->judgment); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Tax Year</td>
                                                <td><?php echo e($product->tax_years); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Minimum Bid</td>
                                                <td><?php echo e($product->min_bid); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Adjudged Value</td>
                                                <td><?php echo e($product->adjudged_value); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Type</td>
                                                <td><?php echo e($product->type); ?></td>
                                              </tr>
                                               
                                              <tr>
                                                <td>Description</td>
                                                <td><?php echo e($product->description); ?></td>
                                              </tr>
                                               
                                              <tr>
                                                <td>Auction Start</td>
                                                <td><?php echo e($product->auction_start); ?></td>
                                              </tr>
                                              <tr>
                                                <td>Auction End</td>
                                                <td><?php echo e($product->auction_end); ?></td>
                                              </tr>
                                               
                                             
                                            </tbody>
                                        </table>  
                                    </div>
                                    <div class="col-sm-8 col-sm-offset-2">
                                        <?php if(count($product->auctions) >0): ?>
                                        <div class="page-header">
                                            <h3><small class="pull-right"><?php echo e(count($product->auctions)); ?> bids</small> Auction Bids </h3>
                                        </div> 
                                        <div class="comments-list">
                                        <?php $__currentLoopData = $product->auctions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $auction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="media">
                                               <p class="pull-right"><small><?php echo e($auction->created_at->diffForHumans()); ?></small></p>
                                                <a class="media-left" href="<?php echo e(route('admin-user-view', ['id' => $auction->user_id ])); ?>" target="_blank">
                                                  <img src="http://lorempixel.com/40/40/people/1/">
                                                </a>
                                                <div class="media-body">
                                                  <h3 class="media-heading user_name">$<?php echo e($auction->price); ?></h3>
                                                  <p><i class="fa fa-envelope" aria-hidden="true"></i> <?php echo e($auction->user->email); ?> <i class="fa fa-phone" aria-hidden="true"></i> <?php echo e($auction->user->phone_number); ?></p>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </div>
                                        <?php endif; ?>
                                        </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                   <?php $__env->stopSection(); ?>

                <?php $__env->startSection('scripts'); ?>
                 
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
                <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDnT6ewhJpccffkJRlbAPyCQeQKJxJfLQ8&libraries=places"></script>

                <script>
                       function initialize() {
   var latlng = new google.maps.LatLng(41.389994,-73.9682003);
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
    autocomplete.addListener('place_changed', function() {
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
    
        bindDataToForm(place.formatted_address,place.geometry.location.lat(),place.geometry.location.lng());
        infowindow.setContent(place.formatted_address);
        infowindow.open(map, marker);
       
    });
    // this function will work on marker move event into map 
    google.maps.event.addListener(marker, 'dragend', function() {
        geocoder.geocode({'latLng': marker.getPosition()}, function(results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
          if (results[0]) {        
              bindDataToForm(results[0].formatted_address,marker.getPosition().lat(),marker.getPosition().lng());
              infowindow.setContent(results[0].formatted_address);
              infowindow.open(map, marker);
          }
        }
        });
    });
}
function bindDataToForm(address,lat,lng){
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
        <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>