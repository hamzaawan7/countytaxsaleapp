<?php $__env->startSection('title', 'County Tax Sale App (CTSA) | Search Results'); ?>
<?php $__env->startSection('content'); ?>

      <div id="wrapper">
    
        <!-- Sidebar -->
       <?php echo $__env->make('layouts.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- /#sidebar-wrapper -->

         <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="menus_headerss">
                <div class="col-xs-2">
                <button type="button" class="hamburger is-closed" data-toggle="offcanvas">
                    <span class="hamb-top"></span>
                    <span class="hamb-middle"></span>
                    <span class="hamb-bottom"></span>
                </button>
            </div>
            <div class="col-xs-6">
                <h4 class="text-center head_apps">Filter</h4>
            </div>
            <div class="col-xs-4">
                <ul class="list-inline filete_box  pull-right">
                    <li><a href="<?php echo e(route('dashboard')); ?>"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
                    <li><a href="<?php echo e(route('search-results')); ?>"><i class="fa fa-filter" aria-hidden="true"></i></a></li>
                </ul>                
            </div>
            </div>
          
            
       <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3  wow fadeInUp">
                    <form class="filter-form"  id="basicform" action="<?php echo e(route('filter-result-view')); ?>" method="get" role="search">
                    <h4 class="page-header">Search By Precinct</h4>
                     
                        <div class="form-group checkboxs">
                          <label> PRECINCT </label>
                          <div class="reveal-if-active">
                              <div class="squaredFour"><span class="bold">1</span><input type="checkbox" id="precinct-1" name="precinct[]" class="require-if-active precinct" value="1"><label for="precinct-1"></label></div>
                              <div class="squaredFour"><span class="bold">2</span><input type="checkbox" id="precinct-2" name="precinct[]" class="require-if-active precinct" value="2"><label for="precinct-2"></label></div>
                              <div class="squaredFour"><span class="bold">3</span><input type="checkbox" id="precinct-3" name="precinct[]" class="require-if-active precinct" value="3"><label for="precinct-3"></label></div>
                              <div class="squaredFour"><span class="bold">4</span><input type="checkbox" id="precinct-4" name="precinct[]" class="require-if-active precinct" value="4"><label for="precinct-4"></label></div>
                              <div class="squaredFour"><span class="bold">5</span><input type="checkbox" id="precinct-5" name="precinct[]" class="require-if-active precinct" value="5"><label for="precinct-5"></label></div>
                              <div class="squaredFour"><span class="bold">6</span><input type="checkbox" id="precinct-6" name="precinct[]" class="require-if-active precinct" value="6"><label for="precinct-6"></label></div>
                              <div class="squaredFour"><span class="bold">7</span><input type="checkbox" id="precinct-7" name="precinct[]" class="require-if-active precinct" value="7"><label for="precinct-7"></label></div>
                              <div class="squaredFour"><span class="bold">8</span><input type="checkbox" id="precinct-8" name="precinct[]" class="require-if-active precinct" value="8"><label for="precinct-8"></label></div>
                              <div class="squaredFour"><span class="bold">All</span><input type="checkbox" id="precinctAll" class="require-if-active precinct" ><label for="precinctAll"></label></div>
                          </div>
                        </div>
                        <div class="form-group<?php echo e($errors->has('search') ? ' has-error' : ''); ?>" style="clear: both">
                          <label for="search">Search By Address/ Zip Code/ Account Number/ Cause Number</label>
                          <input id="search" type="text" class="form-control" name="search" placeholder="Search By Address/ Zip Code/ Account Number/ Cause Number"  value="<?php echo e(old('search')); ?>">
                           <?php if($errors->has('search')): ?>
                          <span class="help-block">
                              <strong style="color:#a94442"><?php echo e($errors->first('search')); ?></strong>
                          </span>
                        <?php endif; ?>
                        </div>
                       
                    <br>
                       
                    <input type="submit" id="submit-btn" class="btn btn-theme" value="Submit" />
                    <input type="button" id="narrow-btn" class="btn btn-theme" value="Narrow Search" />
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

<script type="text/javascript">

  $(document).ready(function(){

    $("#precinctAll").click(function () {

      $(".precinct").prop('checked', $(this).prop('checked'));

    });
      $('#submit-btn').click(function () {
          $('.filter-form').attr('action',"<?php echo e(route('filter-precinct-result-view')); ?>");
          $('.filter-form').submit();
      });
      $('#narrow-btn').click(function () {
          $('.filter-form').attr('action', "<?php echo e(route('filter-result-view')); ?>");
          $('.filter-form').submit();
      });
  });
</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>