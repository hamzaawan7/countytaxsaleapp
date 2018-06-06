
<?php $__env->startSection('title', 'GPS Dashboard'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <div class="page-title">
                            <h3>New Product</h3>
                            
                        </div><!--end page title-->

                        <div class="row">
                           
                            <div class="col-sm-12">
                                <div class="panel-box">
                                    <div class="col-sm-8 col-sm-offset-2">
                                    <?php echo $__env->make('../layouts/message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                        <h4>New Product</h4>
                                        <form class="form-horizontals" method="POST" action="<?php echo e(route('admin-inserted-products')); ?>" enctype="multipart/form-data">
                                        <?php echo e(csrf_field()); ?>

                                            <div class="row">
                                                <div class="col-sm-12">
                                                 <div class="form-group<?php echo e($errors->has('photo') ? ' has-error' : ''); ?>">
                                                    <label for="photo" class="control-label"> Image URL</label>
                                                    <input type="text" name="photo" id="photo" placeholder="Write Image URL" class="form-control" value="<?php echo e(old('photo')); ?>">
                                                <?php if($errors->has('photo')): ?>
                                                    <span class="help-block">
                                                        <strong><?php echo e($errors->first('photo')); ?></strong>
                                                    </span>
                                                <?php endif; ?> 
                                                </div>
                                                 <div class="form-group<?php echo e($errors->has('location') ? ' has-error' : ''); ?>">
                                                                <label for="title" class="control-label"> Address</label>
                                                                <input id="searchInput" class="input-controls" type="text" placeholder="Enter a location" value="<?php echo e(old('location')); ?>">
                                                                 <div class="map" id="map" style="width: 100%; height: 300px;"></div>
                                                                  <div class="form_area">
                                                                     <input type="hidden" name="location" id="location" value="<?php echo e(old('location')); ?>">
                                                                     <input type="hidden" name="lat" id="lat" value="<?php echo e(old('lat')); ?>">
                                                                     <input type="hidden" name="lng" id="lng" value="<?php echo e(old('lng')); ?>">
                                                                 </div>
                                                            <?php if($errors->has('location')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('location')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('title') ? ' has-error' : ''); ?>">
                                                                <label for="title" class="control-label"> Title</label>
                                                                <input type="text" name="title" id="title" placeholder="Write Title" class="form-control" value="<?php echo e(old('title')); ?>">
                                                            <?php if($errors->has('title')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('title')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('zipcode') ? ' has-error' : ''); ?>">
                                                                <label for="zipcode"  class="control-label">Zip Code</label>
                                                                <input type="text" name="zipcode" id="zipcode" placeholder="Write Zip Code" class="form-control" value="<?php echo e(old('zipcode')); ?>"> 
                                                            <?php if($errors->has('zipcode')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('zipcode')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('precinct') ? ' has-error' : ''); ?>">
                                                                <label for="precinct" class="control-label">Precinct</label>
                                                                <input type="text" name="precinct" id="precinct" placeholder="Write Precinct" class="form-control"  value="<?php echo e(old('precinct')); ?>"> 
                                                            <?php if($errors->has('precinct')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('precinct')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                           <div class="form-group<?php echo e($errors->has('sale_amount') ? ' has-error' : ''); ?>">
                                                                <label for="sale_amount" class="control-label">Total Sale</label>
                                                                <input type="text" name="sale_amount" id="sale_amount" placeholder="Write Total Sale" class="form-control"  value="<?php echo e(old('sale_amount')); ?>"> 
                                                            <?php if($errors->has('sale_amount')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('sale_amount')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('land_sf') ? ' has-error' : ''); ?>">
                                                                <label for="land_sf" class="control-label">LandSF</label>
                                                                <input type="text" name="land_sf" id="land_sf" placeholder="LandSF" class="form-control"  value="<?php echo e(old('land_sf')); ?>">
                                                                <?php if($errors->has('land_sf')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('land_sf')); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('living_sf') ? ' has-error' : ''); ?>">
                                                                <label for="living_sf" class="control-label">LivingSF</label>
                                                                <input type="text" name="living_sf" id="living_sf" placeholder="LivingSF" class="form-control"  value="<?php echo e(old('living_sf')); ?>">
                                                                <?php if($errors->has('living_sf')): ?>
                                                                    <span class="help-block">
                                                                    <strong><?php echo e($errors->first('living_sf')); ?></strong>
                                                                </span>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('amount') ? ' has-error' : ''); ?>">
                                                                <label for="amount" class="control-label">Account</label>
                                                                <input type="text" name="amount" id="amount" placeholder="Write Account" class="form-control"  value="<?php echo e(old('amount')); ?>"> 
                                                            <?php if($errors->has('amount')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('amount')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('judgment') ? ' has-error' : ''); ?>">
                                                                <label for="datetimepicker" class="control-label"> Judgment</label>
                                                              
                                                                <div class="input-group" id="datetimepicker">
                                                                <input type="text" class="form-control" name="judgment" placeholder="Write Judgment" value="<?php echo e(old('judgment')); ?>">
                                                                <span class="input-group-addon add-on"><span class="glyphicon glyphicon-calendar fa fa-calendar"></span>
                                                                </span>
                                                            </div>
                                                            <?php if($errors->has('judgment')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('judgment')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                           
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <label for="hcad" class="control-label">HCAD</label>
                                                                <input type="text" name="hcad" id="hcad" placeholder="Write Total Sale" class="form-control"  value="<?php echo e(old('hcad')); ?>"> 
                                                           
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('min_bid') ? ' has-error' : ''); ?>">
                                                                <label for="min_bid" class="control-label">Minimum Bid</label>
                                                                <input type="text" name="min_bid" id="min_bid" placeholder="Write Minimum Bid" class="form-control"  value="<?php echo e(old('min_bid')); ?>"> 
                                                            <?php if($errors->has('min_bid')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('min_bid')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('adj_value') ? ' has-error' : ''); ?>">
                                                                <label for="adj_value" class="control-label">Adjudged Value</label>
                                                                <input type="text" name="adj_value" id="adj_value" placeholder="Write Adjudged Value" class="form-control"  value="<?php echo e(old('adj_value')); ?>"> 
                                                            <?php if($errors->has('adj_value')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('adj_value')); ?></strong>
                                                                </span>
                                                            <?php endif; ?> 
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('cause') ? ' has-error' : ''); ?>">
                                                                <label for="cause" class="control-label">Cause</label>
                                                                <input type="text" name="cause" id="cause" placeholder="Write Cause" class="form-control"  value="<?php echo e(old('cause')); ?>">
                                                            <?php if($errors->has('cause')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('cause')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                           
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-sm-6">
                                                            <div class="form-group<?php echo e($errors->has('start_tax') ? ' has-error' : ''); ?>">
                                                                <label for="start_tax" class="control-label">Tax Year Start</label>
                                                                <select name="start_tax" id="start_tax" class="form-control">  
                                                                    <option value="1980">1980</option>
                                                                    <option value="1981">1981</option>
                                                                    <option value="1982">1982</option>
                                                                    <option value="1983">1983</option>
                                                                    <option value="1984">1984</option>
                                                                    <option value="1985">1985</option>
                                                                    <option value="1986">1986</option>
                                                                    <option value="1987">1987</option>
                                                                    <option value="1988">1988</option>
                                                                    <option value="1989">1989</option>
                                                                    <option value="1990">1990</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <?php if(old('start_tax') != ''): ?>
                                                                    <option value="<?php echo e(old('start_tax')); ?>" selected="selected"><?php echo e(old('start_tax')); ?></option>
                                                                    <?php endif; ?>
                                                                </select>
                                                                 <?php if($errors->has('start_tax')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('start_tax')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>  
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group <?php echo e($errors->has('end_tax') ? ' has-error' : ''); ?>">
                                                                <label for="end_tax" class="control-label">Tax Year End</label>
                                                                <select name="end_tax" id="end_tax" class="form-control">  
                                                                    <option value="1980">1980</option>
                                                                    <option value="1981">1981</option>
                                                                    <option value="1982">1982</option>
                                                                    <option value="1983">1983</option>
                                                                    <option value="1984">1984</option>
                                                                    <option value="1985">1985</option>
                                                                    <option value="1986">1986</option>
                                                                    <option value="1987">1987</option>
                                                                    <option value="1988">1988</option>
                                                                    <option value="1989">1989</option>
                                                                    <option value="1990">1990</option>
                                                                    <option value="1991">1991</option>
                                                                    <option value="1992">1992</option>
                                                                    <option value="1993">1993</option>
                                                                    <option value="1994">1994</option>
                                                                    <option value="1995">1995</option>
                                                                    <option value="1996">1996</option>
                                                                    <option value="1997">1997</option>
                                                                    <option value="1998">1998</option>
                                                                    <option value="1999">1999</option>
                                                                    <option value="2000">2000</option>
                                                                    <option value="2001">2001</option>
                                                                    <option value="2002">2002</option>
                                                                    <option value="2003">2003</option>
                                                                    <option value="2004">2004</option>
                                                                    <option value="2005">2005</option>
                                                                    <option value="2006">2006</option>
                                                                    <option value="2007">2007</option>
                                                                    <option value="2008">2008</option>
                                                                    <option value="2009">2009</option>
                                                                    <option value="2010">2010</option>
                                                                    <option value="2011">2011</option>
                                                                    <option value="2012">2012</option>
                                                                    <option value="2013">2013</option>
                                                                    <option value="2014">2014</option>
                                                                    <option value="2015">2015</option>
                                                                    <option value="2016">2016</option>
                                                                    <option value="2017">2017</option>
                                                                    <option value="2018">2018</option>
                                                                    <option value="2019">2019</option>
                                                                    <option value="2020">2020</option>
                                                                    <?php if(old('end_tax') != ''): ?>
                                                                    <option value="<?php echo e(old('end_tax')); ?>" selected="selected"><?php echo e(old('end_tax')); ?></option>
                                                                    <?php endif; ?>
                                                                </select>
                                                                 <?php if($errors->has('end_tax')): ?>
                                                                <span class="help-block">
                                                                    <strong><?php echo e($errors->first('end_tax')); ?></strong>
                                                                </span>
                                                            <?php endif; ?>  
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group<?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                                <label for="cause" class="control-label">Description</label>
                                                <textarea name="description" id="description" placeholder="Write Cause" class="form-control"></textarea>
                                            <?php if($errors->has('description')): ?>
                                                <span class="help-block">
                                                    <strong><?php echo e($errors->first('description')); ?></strong>
                                                </span>
                                            <?php endif; ?>  
                                            </div>
                                            
                                            

                                            <div class="form-group">
                                                <button class="btn btn-sm btn-lg btn-theme" type="submit">Submit </button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                   <?php $__env->stopSection(); ?>

                <?php $__env->startSection('scripts'); ?>
                 
                 <script type="text/javascript">
                  $('#datetimepicker').datetimepicker({
                    format: 'dd-MM-yyyy',
                  });

                  $('#datetimepickers').datetimepicker({
                    format: 'dd-MM-yyyy',
                  });

                  $('#datetimepickerss').datetimepicker({
                    format: 'dd-MM-yyyy',
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