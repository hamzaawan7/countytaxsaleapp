<?php $__env->startSection('title', 'GPS Dashboard'); ?>
<?php $__env->startSection('content'); ?>

                    <div class="container">
                        <?php echo $__env->make('layouts.message', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                        <div class="page-title">
                            <h3>Users Payment</h3>
                           
                        </div><!--end page title-->

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="panel-box">
                                     <?php if(count($subsciption) > 0): ?>
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                  <tr>
                    
                    <th>Email</th> 
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Refund</th>
                    <th>Get Refund </th>
                  </tr>
                </thead>
                <tbody>
                    <?php
                  for ($i=0; $i <count($subsciption) ; $i++) { 
                    if($subsciption[$i]->email!=""){
                      ?>
                       <tr>
                  
                    <td><?php echo $subsciption[$i]->email; ?></td> 
                        <td><?php echo $subsciption[$i]->status; ?></td>
                    <td><?php 
             if($subsciption[$i]->price==null){
                echo $price=0;
             }else{
                  echo $price=$subsciption[$i]->price/100; 
             }
                  ?></td>
                    <td><?php echo $refund_amount=$subsciption[$i]->refund_amount/100; ?></td>
                
                    
                
                    <td>
<?php
$refund_a=$price-$refund_amount;
if($refund_a>0){
    ?><input type="number" style="width: 100px;" id="refund_amount_<?php echo $subsciption[$i]->id ?>" value="<?php echo $refund_a;  ?>" min="0.1" max="<?php echo $refund_a;  ?>" >&nbsp;&nbsp;<button class="btn btn-warning btn-xs" onclick="get_refund(<?php echo $subsciption[$i]->id ?>)" >Refund</button>

    <?php
}
 ?>
                         </td>
                  </tr>
                      <?php  
                    }
                   ?>
                
                <?php
                  }

                     ?>
                </tbody>
                   <tfoot>
                  <tr>
               
                  <th>Email</th> 
                    <th>Type</th>
                    <th>Amount</th>
                    <th>Refund</th>
                   
                    <th>Action</th>
                  </tr>
                </tfoot>
            </div>
            <?php else: ?>
            <h3>Data Not Found.</h3>
            <?php endif; ?>
                                </div>
                            </div>
                        </div>

                   <?php $__env->stopSection(); ?>}

            <?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
  function get_refund(id){
     var refund_amount=$("#refund_amount_"+id).val();
      if(confirm("You are sure want to refund?")){
      $.ajax({url: "refund_amount/"+id+"?amount="+refund_amount,dataType:'json', success: function(result){
     
        if(result.status==1){
             location.reload();
    
        }
       

    }});


    }
  }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>