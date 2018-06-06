@extends('layouts.main')
@section('title', 'GPS Product | Settings')
@section('content')

      <div id="wrapper">
    
        <!-- Sidebar -->
       @include('layouts.sidebar')
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
                    <li><a href="{{ route('dashboard') }}"><i class="fa fa-list-ul" aria-hidden="true"></i></a></li>
                    <li><a href="{{ route('search-results') }}"><i class="fa fa-filter" aria-hidden="true"></i></a></li>
                </ul>                
            </div>
            </div>
          
            
       <div class="container">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3  wow fadeInUp">
                    <form class="filter-form" action="{{ route('filter-result-view') }}" method="get" role="search">
                    <h4 class="page-header">Search By Precinct Or Create a Custom Filter</h4>
                     <div>
                        <div class="form-group checkboxs">
                          <input type="checkbox" class="check" id="checkAll"><label for="checkAll"> Select All</label>
                        </div>
                        <div class="form-group checkboxs">
                          <input type="checkbox" name="choice-animals" id="choice-animals-dogs" class="check">
                          <label for="choice-animals-dogs"> PRECINCT </label>
                          <div class="reveal-if-active">
                            <label><input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="1"> 1 </label>
                            <label><input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="2"> 2 </label>
                            <label><input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="3"> 3 </label>
                            <label><input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="4"> 4 </label>
                            <label><input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="5">
                             5 </label>
                            <label><input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="6"> 6 </label>
                            <label><input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="7"> 7 </label>
                            <label >
                              <input type="checkbox" id="which-dog" name="precinct[]" class="require-if-active precinct" data-require-pair="#choice-animals-dogs" value="8">
                               8 </label>
                            <label>
                              <input type="checkbox" id="precinctAll" name="which-dog" class="require-if-active precinct" data-require-pair="#choice-animals-dogs">
                               Select All
                            </label>
                          </div>
                        </div>
                        
                        <div class="form-group checkboxs">
                          <input type="checkbox" name="choice-animals1" id="choice-animals-cats1" class="check" >
                          <label for="which-cat"> Zip Code </label>
                          <div class="reveal-if-active">
                            <input type="text" id="which-cat" name="zipcode" class="require-if-active form-control" data-require-pair="#choice-animals-cats1" placeholder="Enter Zip-Code" value="{{ Request::get('zipcode') }}">
                           
                          </div>
                        </div>
                        
                        <div class="form-group checkboxs">
                          <input type="checkbox" name="choice-animals1" id="choice-animals-cats1"  class="check">
                          <label for="choice-animals-cats"> Adjudged Value</label>
                          <div class="reveal-if-active">
                            <div id='volume' class='slider'>
                               <output class='slider-output'>50</output>
                               <div class='slider-track'>
                                 <div class='slider-thumb'></div>
                                 <div class='slider-level'></div>
                               </div>
                               <input class='slider-input' name="adjudged_value" type='range' value='50' min='0' max='100' />
                             </div>
                          </div>
                        </div>
                        <div class="form-group checkboxs">
                          <input type="checkbox" name="choice-animals1" id="choice-animals-cats1"  class="check">
                          <label for="choice-animals-cats">Bid Amount</label>
                          <div class="reveal-if-active">
                            <div id='scrubber' class='slider'>
                         <output class='slider-output'>50</output>
                         <div class='slider-track'>
                           <div class='slider-thumb'></div>
                           <div class='slider-level'></div>
                         </div>
                         <input class='slider-input'  name="bid_amount" type='range' value='50' min='0' max='100' />
                       </div>
                          </div>
                        </div>
                        <div class="form-group checkboxs">
                          <input type="checkbox" name="choice-animals1" id="choice-animals-cats1"  class="check">
                          <label for="choice-animals-cats">Address</label>
                          <div class="reveal-if-active">
                            <input type="text" id="which-cat" name="address" class="require-if-active form-control" data-require-pair="#choice-animals-cats1" placeholder="Enter Address">
                          </div>
                        </div>
                        <div class="form-group checkboxs">
                          <input type="checkbox" name="choice-animals1" id="choice-animals-cats1"  class="check">
                          <label for="choice-animals-cats">Account Number</label>
                          <div class="reveal-if-active">
                            <input type="text" id="which-cat" name="account_number" class="require-if-active form-control" data-require-pair="#choice-animals-cats1"  placeholder="Enter Account Number">
                          </div>
                        </div>
                        <div class="form-group checkboxs">
                          <input type="checkbox" name="choice-animals1" id="choice-animals-cats1"  class="check">
                          <label for="choice-animals-cats">Cause Number </label>
                          <div class="reveal-if-active">
                            <input type="text" id="which-cat" name="cause_number" class="require-if-active form-control" data-require-pair="#choice-animals-cats1" placeholder="Enter Cause Number">
                          </div>
                        </div>
                        <!-- <div class="form-group">
                          <button class="btn btn-info"></button>
                        </div> -->
                        <div class="col-xs-12">
                     <div class="row">
                     <br><br>
                     <div class="col-xs-6 text-center">
                       <a href="#" class="filter_clear"> Clear Filters</a>
                     </div>
                     <div class="col-xs-6">
                       <div class="row">
                         <button type="submit" class="btn btn-theme btn-lg btn-block"> Update Results </button>
                       </div>
                     </div>
                     </div>

                      </div>
                
                    </form>
                </div>
            </div>
        </div>

        </div>
        </div>

@stop

@section('scripts')
<style>
  .reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  font-size: 16px;
  -webkit-transform: scale(0.8);
          transform: scale(0.8);
  -webkit-transition: 0.5s;
  transition: 0.5s;
}
.reveal-if-active label {
  margin: 0 0 3px 0;
}
.reveal-if-active input[type=text] {
  width: 100%;
}
input[type="radio"]:checked ~ .reveal-if-active, input[type="checkbox"]:checked ~ .reveal-if-active {
  opacity: 1;
  max-height: 100px;
  padding: 10px 20px;
  -webkit-transform: scale(1);
          transform: scale(1);
  overflow: visible;
}

  
  </style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
 <script>

 $(document).ready(function(){

  $("#checkAll").click(function () {
      $(".check").prop('checked', $(this).prop('checked'));
  });


  $("#precinctAll").click(function () {
      $(".precinct").prop('checked', $(this).prop('checked'));
  });



 var FormStuff = {
  
  init: function() {
    this.applyConditionalRequired();
    this.bindUIActions();
  },
  
  bindUIActions: function() {
    $(".checkboxs input[type='checkbox']").on("change", this.applyConditionalRequired);
  },
  
  applyConditionalRequired: function() {
    
    $(".require-if-active").each(function() {
      var el = $(this);
      if ($(el.data("require-pair")).is(":checked")) {
        el.prop("required", false);
      } else {
        el.prop("required", false);
      }
    });
    
  }
  
};

FormStuff.init();

});


</script>
@endsection



@section('scripts')

  <style>
  /*custom font*/
@import url(https://fonts.googleapis.com/css?family=Montserrat);


/*form styles*/
#basicform {
}
#basicform fieldset {
    position: relative;
}
#basicform fieldset:not(:first-of-type) {
    display: none;
}

#basicform .action-button {
    width: 100px;
    background: #27AE60;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 1px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px;
}
#basicform .action-button:hover, #basicform .action-button:focus {
    box-shadow: 0 0 0 2px white, 0 0 0 3px #27AE60;
}
/*headings*/
.fs-title {
    font-size: 15px;
    text-transform: uppercase;
    color: #2C3E50;
    margin-bottom: 10px;
}
.fs-subtitle {
    font-weight: normal;
    font-size: 13px;
    color: #666;
    margin-bottom: 20px;
}
/*progressbar*/
#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    counter-reset: step;
}
#progressbar li {
    list-style-type: none;
    color: white;
    text-transform: uppercase;
    font-size: 9px;
    width: 33.33%;
    float: left;
    position: relative;
}
#progressbar li:before {
    content: counter(step);
    counter-increment: step;
    width: 20px;
    line-height: 20px;
    display: block;
    font-size: 10px;
    color: #333;
    background: white;
    border-radius: 3px;
    margin: 0 auto 5px auto;
}
/*progressbar connectors*/
#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: white;
    position: absolute;
    left: -50%;
    top: 9px;
    z-index: -1; 
}
#progressbar li:first-child:after {
    content: none; 
}
#progressbar li.active:before,  #progressbar li.active:after{
    background: #27AE60;
    color: white;
}

.help-inline-error{
    display:block;
    color:red;
    width:100%;
    text-align: left;
}




 .reveal-if-active {
  opacity: 0;
  max-height: 0;
  overflow: hidden;
  font-size: 16px;
  -webkit-transform: scale(0.8);
          transform: scale(0.8);
  -webkit-transition: 0.5s;
  transition: 0.5s;
}
.reveal-if-active label {
  margin: 0 0 3px 0;
}
.reveal-if-active input[type=text] {
  width: 100%;
}
input[type="radio"]:checked ~ .reveal-if-active, input[type="checkbox"]:checked ~ .reveal-if-active {
  opacity: 1;
  max-height: 100px;
  padding: 10px 20px;
  -webkit-transform: scale(1);
          transform: scale(1);
  overflow: visible;
}
  
  </style>

<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/jquery.validate.js') }}"></script>
<script type="text/javascript">


 $(document).ready(function(){

  $("#precinctAll").click(function () {
      $(".precinct").prop('checked', $(this).prop('checked'));
  });

   var FormStuff = {
  
  init: function() {
    this.applyConditionalRequired();
    this.bindUIActions();
  },
  
  bindUIActions: function() {
    $(".checkboxs input[type='checkbox']").on("change", this.applyConditionalRequired);
  },
  
  applyConditionalRequired: function() {
    
    $(".require-if-active").each(function() {
      var el = $(this);
      if ($(el.data("require-pair")).is(":checked")) {
        el.prop("required", false);
      } else {
        el.prop("required", false);
      }
    });
    
  }
  
};

FormStuff.init();

  });
  
  jQuery().ready(function() {

    // validate form on keyup and submit
    var v = jQuery("#basicform").validate({
      rules: {
        uname: {
          required: true,
          minlength: 2,
          maxlength: 16
        },
        category: {
          required: true,
        },
        email: {
          required: true,
          minlength: 6,
          email: true,
          maxlength: 100,
        },
        password: {
          required: true,
          minlength: 6,
          maxlength: 50,
        }

      },
      errorElement: "span",
      errorClass: "help-inline-error",
    });

    $(".open1").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf2").show("slow");
      }
    });

    $(".open2").click(function() {
      if (v.form()) {
        $(".frm").hide("fast");
        $("#sf3").show("slow");
      }
    });
    
    $(".open3").click(function() {
      if (v.form()) {
        $("#loader").show();
         setTimeout(function(){
           $("#basicform").html('<h2>Thanks for your time.</h2>');
         }, 1000);
        return false;
      }
    });
    
    $(".back2").click(function() {
      $(".frm").hide("fast");
      $("#sf1").show("slow");
    });

    $(".back3").click(function() {
      $(".frm").hide("fast");
      $("#sf2").show("slow");
    });

  });
</script>

@stop
