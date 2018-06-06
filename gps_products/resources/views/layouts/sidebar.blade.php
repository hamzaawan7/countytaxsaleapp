        <nav class="navbar navbar-inverse navbar-fixed-top" id="sidebar-wrapper" role="navigation">
            <ul class="nav sidebar-nav">
                <li><a href="{{ route('dashboard') }}""><i class="fa fa-home" aria-hidden="true"></i> Home</a></li>
                <li><a href="{{ route('payment-view') }}"><i class="fa fa-credit-card" aria-hidden="true"></i> Payment</a></li>
                <li><a href="{{ route('favorites') }}"><i class="fa fa-star-o" aria-hidden="true"></i> Favorites</a></li>
                <li><a href="{{ route('subscriptions') }}"><i class="fa fa-bell" aria-hidden="true"></i> Subscription</a></li>
                <li><a href="{{ route('settings') }}"><i class="fa fa-home" aria-hidden="true"></i> Settings</a></li>
                <li><a href="#" data-toggle="modal" data-target="#contactUsModal"><i class="fa fa-mobile" aria-hidden="true"></i> Contact Us</a></li>
                <li><a href="{{ route('legal') }}"><i class="fa fa-question-circle" aria-hidden="true"></i> Legal</a></li>
                <li><a href="{{ route('signout') }}"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a></li>
            </ul>
        </nav>

        <!-- Modal -->
<div id="contactUsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body" style="padding:0px !important">
        <!-- <p>Some text in the modal.</p> -->
        <!-- <img src="{{ asset('assets/images/contact-view.jpg')}}" class="img-responsive contact_img"  alt="" > -->
        <div class="text-center">
        <h3 style="margin-top:15px">Contact Us!</h3>
        <!-- <p><b>Thanks for maching out.</b></p> -->
        <!-- <p><b>Our team will be happy to support you.</b></p> -->
        </div>
        <div class="mail_us">
           <a href="#" class="mail_uss">Mail Us</a> 
        </div>
        <div class="mail_contact">
            <form data-toggle="validator" method="POST" action="{{ route('contact-messages') }}">
            {{ csrf_field() }}
                <div class="form-group">
                    <input type="text" class="form-control" name="name" id="name" placeholder="Write Name"  data-error="The Name field is required." value="{{Auth::user()->name}}" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input type="email" class="form-control"  name="email" id="email" placeholder="Write Email" data-error="The Email field is required." value="{{Auth::user()->email}}" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <input type="text" class="form-control"  name="phone_number" id="phone_number" placeholder="Write Phone" data-error="The Phone field is required." value="{{Auth::user()->phone_number}}" required>
                    <div class="help-block with-errors"></div>
                </div>
                <div class="form-group">
                    <textarea class="form-control" name="description" id="description" rows="5" cols="50" placeholder="Write Message..." data-error="The Message field is required." required></textarea>
                    <div class="help-block with-errors"></div>
                </div>
                
                <div class="form-group  text-center">
                <button type="submit" class="btn btn-primary">Send Message</button>
                </div>
            </form>
        </div>
      </div>
      <div class="modal-footer text-center">
        <p class="text-center"><a href="#" data-dismiss="modal"><b>Cancel</b></a></p>
      </div>
    </div>

  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    .mail_us{
        color:indianred;
        text-align: center;
        font-weight:bold;
        font-size:16px;
        cursor:pointer;
        border-top:1px solid #ddd;
        padding:15px;
    }
    .mail_us a {
        color:indianred;
    }
    .mail_contact{
        width:100%;
        height:auto;
        padding:0px 30px;
        display: none;
    }

    .mail_contact .form-control {
        height: 35px !important;
    }
    .mail_contact #description{
        height: auto !important;   
    }
</style>
<script>
    $(document).ready(function(){

        $(".mail_uss").click(function(){
            $(".mail_contact").slideToggle();

        });
    });
</script>