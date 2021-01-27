@extends('admin.main.main')

@section('title', 'Seller Login')


@section('main_body')

    {{-- Main  Section  --}}

<div class="container">

   {{-- Display Error Message  --}}
 <div class="row">
  <div class="col-md-12">
       <br>
     {{-- Display Error Message  --}}
    @include('seller.error.error')
  
  </div>
</div>


  <div class="row ">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <form class="form-horizontal border_class" method="POST" action="{{ route('seller.loginseller_login_post' ) }}">
          @csrf
          <div class="form-group">
              <label for="phone">Phone Number &nbsp; </label> 
                
               <input type="tel" pattern=".{11}" class="form-control" name="phone" id="phone" placeholder="Your Phone Number" oninput="check(this)" required>
            </div>
  
            <div class="form-group">
              <label for="password">Password &nbsp;  </label> 
                
               <input type="password" class="form-control" name="password" id="password" placeholder="Password"  required>
            </div>
     
            <button type="submit" class="btn btn-success">Login</button>
            <div class="forgotten_password"><a href="{{ route('seller.forgottenseller_forgotten_password') }}">Forgotten Password</a></div>
          </form>
    
    </div>

    <div class="col-md-1"></div>


  </div>

  </div>

  @stop
