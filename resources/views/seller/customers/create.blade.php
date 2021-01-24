 
@extends('dashboard.index')

@section('title') Add Customer @stop


@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

     {{--  Include Toolbar   --}}
  
     @include('dashboard.include.toolbar')


    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">



         {{-- Display Error Message  --}}
         <div class="row">
            <div class="col-md-12">
        
               {{-- Display Error Message  --}}
              @include('seller.error.error')
            
            </div>
          </div>
          

        <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">

          <h2 class="text-center">Add New Customer</h2>
                  <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                   
            <form method="POST" action="{{ route('seller.customer_create_storeseller_seller_create_store')}}">
                @csrf
                <div class="form-group">
                    <label for="card_number">Card Number (<small><b>8 Digits</b></small>)*</label>

                    <input type="text" pattern=".{8}" class="form-control" id="card_number" name="card_number" placeholder="Card Number" oninput="check(this)" required>
                  </div>

                  <div class="form-group">
                    <label for="name">Customer Name *</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name" required>
                  </div>

                  <div class="form-group" id="card-number-field">
                    <label for="phone">Phone * </label>
                    <input type="tel" pattern=".{11}" class="form-control" id="phone" name="phone" placeholder="Phone Number" oninput="check(this)" required>
                </div>

               <div class="form-group">
                <label for="gender">Gender *</label>
                <select class="form-control" id="gender" name="gender">
                  <option value="Male" selected>Male</option>
                  <option value="Female">Female</option>
         
                </select>
              </div>

              <div class="form-group">
                <label for="address">Address *</label>
                <input type="text" class="form-control" id="address" name="address" placeholder="Customer Address" required>
              </div>


                <button type="submit" class="btn btn-primary">ADD Customer</button>
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
 