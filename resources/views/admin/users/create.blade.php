 
@extends('dashboard.index')

@section('title') Admin @stop


@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

      {{--  Include Toolbar   --}}
  
      @include('dashboard.include.toolbar')


    <!-- Begin Page Content -->
    <div class="container-fluid">



         {{-- Display Error Message  --}}
         <div class="row">
            <div class="col-md-12">
        
               {{-- Display Error Message  --}}
              @include('admin.error.error')
            
            </div>
          </div>
          

        <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
                  <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                   
            <form method="POST" action="{{ route('admin.seller_create_storeadmin_seller_create_store')}}">
                @csrf
                <div class="form-group">
                    <label for="name">Seller Name *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Seller Name" required>
                  </div>

                  <div class="form-group">
                    <label for="name">Area Code *</label>
                    <input type="text" class="form-control" id="area_code" name="area_code" placeholder="Seller Area Code" required>
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="tel" pattern=".{11}" class="form-control" name="phone" id="phone" placeholder="Seller Phone Number" oninput="check(this)" required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Seller Email" >
                  </div>

                <div class="form-group">
                  <label for="password">Password *</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Seller Password" required>
                </div>

                <div class="form-group">
                    <label for="address">Address *</label>
                    <input type="text" class="form-control" id="address" name="address" placeholder="Seller Address" required>
                </div>


                <button type="submit" class="btn btn-primary">ADD SELLER</button>
              </form>

       
            </div>
        </div>
    </div>
        </div>
  
        <div class="col-md-2">

        </div>

    

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



 @stop
 