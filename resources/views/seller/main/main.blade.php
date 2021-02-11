<!DOCTYPE html>
<html lang="en">
<head>
  <title>DISCOUNT A2Z - @yield('title')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon -->
    <link rel="icon" href="http://seller.discounta2z.com/images/dashboard.png" type="image/gif" sizes="16x16">
  {{-- Style Files *************************    --}}

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="{{ URL::asset('/css/global.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('/css/admin/login.css') }}">


</head>
<body>

  {{-- Header Section  --}}

<div class="container-fluid">
  <div class="row top-header">


  <div class="col-md-1"></div>

  <div class="col-md-10">
   
      <div class="logo">
        <a href="/"> <img src="{{url('/images/discounta2z-logo.png')}}" alt="Discount Logo"> </a>
        <span class="title_heading" >Here There Every Where</span>
      </div>
    
  </div>
  <div class="col-md-1"></div>

</div>

</div>

  
{{-- Main Body  --}}

@yield('main_body')

<br>

<div class="container">
{{-- Display Error Message  --}}
<div class="row">
  <div class="col-md-1"></div>
  <div class="col-md-10 rules_regulation">

    <h3> Rules and Regulation:  <h3>
     
      <ul class="list-group list-group-flush">
        <li class="list-group-item">DISCOUNT A2Z does't share data with third-party.</li>
        <li class="list-group-item">Data security is our prime concern.</li>
      </ul>
   
  </div>
  <div class="col-md-1"></div>
</div>

</div>

{{-- Footer Section  --}}

<div class="container-fluid footer">
  <div class="row">
    <div class="col-sm-12 col-md-12">

      <p><strong>&copy;<a href="https://www.discounta2z.com/" target="__blank" class="copy_right_link"> DISCOUNT A2Z </a>, All Rights Reserved</strong></p>
    </div>

  </div>
</div>


  {{-- Javascript  Files *************************    --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  {{-- Javascript  For Tool Tip *************************    --}}
<script>
    $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
</script>



</body>
</html>
