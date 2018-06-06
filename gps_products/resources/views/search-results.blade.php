@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | Search Results')
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
                    <form class="filter-form"  id="basicform" action="{{ route('filter-result-view') }}" method="get" role="search">
                    <h4 class="page-header">Search By Precinct{{-- Or Create a Custom Filter--}}</h4>
                     
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
                        <div class="form-group{{ $errors->has('search') ? ' has-error' : '' }}" style="clear: both">
                          <label for="search">Search By Address/ Zip Code/ Account Number/ Cause Number</label>
                          <input id="search" type="text" class="form-control" name="search" placeholder="Search By Address/ Zip Code/ Account Number/ Cause Number"  value="{{ old('search') }}">
                           @if ($errors->has('search'))
                          <span class="help-block">
                              <strong style="color:#a94442">{{ $errors->first('search') }}</strong>
                          </span>
                        @endif
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

@stop

@section('scripts')

<script type="text/javascript">

  $(document).ready(function(){

    $("#precinctAll").click(function () {

      $(".precinct").prop('checked', $(this).prop('checked'));

    });
      $('#submit-btn').click(function () {
          $('.filter-form').attr('action',"{{ route('filter-precinct-result-view') }}");
          $('.filter-form').submit();
      });
      $('#narrow-btn').click(function () {
          $('.filter-form').attr('action', "{{ route('filter-result-view') }}");
          $('.filter-form').submit();
      });
  });
</script>


@stop
