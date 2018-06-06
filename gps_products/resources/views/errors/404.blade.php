@extends('layouts.main')
@section('title', 'County Tax Sale App (CTSA) | 404 Errors')
@section('content')

<style>
  .error-warpper{
    width:100%;
    height:100%;
    vertical-align: center;
  }
  .error-warpper h2{
    font-size:80px;
    padding-top:200px;
    text-shadow:2px 5px 3px gray;
  }
  .error-warpper h2 span{
   color:indianred;
    font-size:80px;
  }
</style>

      <div id="wrapper"><!-- Page Content -->
        <div class="error-warpper text-center">
          <h2>404 <span>Error</span></h2>
          <p>Go To <a href="{{ route('dashboard') }}" style="color:indianred"> Home Page <span class="glyphicon glyphicon-hand-right"></span></a></p>
        </div>
        
      </div>

@stop

