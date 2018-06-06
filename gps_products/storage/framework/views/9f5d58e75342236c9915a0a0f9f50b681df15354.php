
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
                        <li><a href="<?php echo e(route('search-results')); ?>"><i class="fa fa-filter" aria-hidden="true"></i></a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="container">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3  wow fadeInUp">
                        <h4 class="page-header">Search By Precinct Or Create a Custom Filter</h4>
                        <div class="col-xs-12" style="display: none;">
                            <?php if(count($products) >0): ?>
                                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    Precinct: <?php echo e($product->precinct); ?>,
                                    Search: <?php echo e($product->zipcode); ?>.<br>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endif; ?>
                        </div>
                        <form class="filter-form" id="basicform" action="<?php echo e(route('custom-filter-view')); ?>" method="get"
                              role="search">

                            <div class="form-group checkboxs">
                                <label for="choice-animals-dogs"> PRECINCT </label>
                                <div class="reveal-if-active">
                                    <div class="squaredFour"><span class="bold">1</span><input type="checkbox"
                                                                                               id="precinct-1"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="1"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(1,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-1"></label></div>
                                    <div class="squaredFour"><span class="bold">2</span><input type="checkbox"
                                                                                               id="precinct-2"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="2"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(2,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-2"></label></div>
                                    <div class="squaredFour"><span class="bold">3</span><input type="checkbox"
                                                                                               id="precinct-3"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="3"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(3,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-3"></label></div>
                                    <div class="squaredFour"><span class="bold">4</span><input type="checkbox"
                                                                                               id="precinct-4"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="4"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(4,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-4"></label></div>
                                    <div class="squaredFour"><span class="bold">5</span><input type="checkbox"
                                                                                               id="precinct-5"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="5"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(5,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-5"></label></div>
                                    <div class="squaredFour"><span class="bold">6</span><input type="checkbox"
                                                                                               id="precinct-6"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="6"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(6,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-6"></label></div>
                                    <div class="squaredFour"><span class="bold">7</span><input type="checkbox"
                                                                                               id="precinct-7"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="7"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(7,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-7"></label></div>
                                    <div class="squaredFour"><span class="bold">8</span><input type="checkbox"
                                                                                               id="precinct-8"
                                                                                               name="precinct[]"
                                                                                               class="require-if-active precinct"
                                                                                               value="8"
                                                                                               <?php if(isset($precincts)): ?> <?php if(in_array(8,$precincts)): ?> checked <?php endif; ?> <?php endif; ?>><label
                                                for="precinct-8"></label></div>
                                    <div class="squaredFour"><span class="bold">All</span><input type="checkbox"
                                                                                                 id="precinctAll"
                                                                                                 class="require-if-active precinct"><label
                                                for="precinctAll"></label></div>
                                </div>
                            </div>
                            <div class="form-group<?php echo e($errors->has('search') ? ' has-error' : ''); ?>" style="clear: both">
                                <label for="search">Search By Address/ Zip Code/ Account Number/ Cause Number</label>
                                <input id="search" type="text" class="form-control" name="search"
                                       placeholder="Search By Address/ Zip Code/ Account Number/ Cause Number"
                                       value="<?php echo e(old('search',$_GET['search'])); ?>">
                                <?php if($errors->has('search')): ?>
                                    <span class="help-block">
                              <strong style="color:#a94442"><?php echo e($errors->first('search')); ?></strong>
                          </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label for="bid_amount">Adjudged Value</label>
                                <div id='volume' class='slider'>
                                    <output class='slider-output'>$50,000</output>
                                    <!-- <output class='min'>1000</output>
                                    <output class='max'>2000000</output> -->
                                    <div class='slider-track'>
                                        <div class='slider-thumb'></div>
                                        <div class='slider-level'></div>
                                    </div>
                                    <span style="float: left;width: 30%;    margin-top: 5px;">$1,000</span>
                                    <input class='slider-input' name="adjudged_value" type='range' value='50000'
                                           min='1000' max='100000'/>
                                    <span style="text-align: right;margin-top: -19px;;">>$100,000</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="bid_amount">Bid Amount</label>
                                <div id='scrubber' class='slider'>
                                    <output class='slider-output'>$50,000</output>
                                    <div class='slider-track'>
                                        <div class='slider-thumb'></div>
                                        <div class='slider-level'></div>
                                    </div>
                                    <span style="float: left;width: 30%;    margin-top: 5px;">$1,000</span>
                                    <input class='slider-input' name="bid_amount" type='range' value='50000' min='1000'
                                           max='100000'/>
                                    <span style="text-align: right;margin-top: -19px;;">>$100,000</span>
                                </div>
                            </div>


                            <div class="col-xs-12">
                                <div class="row">
                                    <br><br>
                                    <div class="col-xs-6 text-center">
                                        <a href="<?php echo e(route('search-results')); ?>" class="filter_clear"> Clear Filters</a>
                                    </div>
                                    <div class="col-xs-6">
                                        <div class="row">
                                            <button type="submit" class="btn btn-theme btn-lg btn-block"> Update
                                                Results
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <br> <br> <br>
                            </div>

                            <!--  <button type="submit" class="btn btn-theme btn-lg btn-block ">Custom Filter</button><br> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>

    <script type="text/javascript">

        $(document).ready(function () {
            $("#precinctAll").click(function () {

                $(".precinct").prop('checked', $(this).prop('checked'));


            });

        });

    </script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.main', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>