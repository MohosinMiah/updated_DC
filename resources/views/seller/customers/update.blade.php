 
@extends('dashboard.index')

@section('title') Add Customer @stop


@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

    <!-- Topbar -->
    {{--  Include Toolbar   --}}

    @include('dashboard.include.toolbar')


  <!-- End of Topbar -->
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

          <h2 class="text-center">Update Customer</h2>
                  <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                   
                <form method="POST" action="{{ route('seller.customer_updateseller_seller_update',$customer->id)}}">
                 @csrf
                <div class="form-group">
                    <label for="card_number">Card Number *</label>
                    <input type="text" class="form-control" id="card_number" name="card_number" value="{{ $customer->card_number }}" readonly required>
                  </div>

                  <div class="form-group">
                    <label for="name">Customer Name *</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}" required>
                  </div>

                  <div class="form-group" id="card-number-field">
                    <label for="phone">Phone * </label>
                    <input type="text" class="form-control" id="phone" name="phone"  value="{{ $customer->phone }}" required>
                </div>

                <div class="form-group">
                    <label for="gender">Gender *</label>
                    <select class="form-control" id="gender" name="gender" >
                      <option value="Male" @if($customer->gender == 'Male') selected @endif>Male</option>
                      <option value="Female" @if($customer->gender == 'Female') selected @endif>Female</option>
             
                    </select>
                  </div>

              <div class="form-group">
                <label for="address">Address *</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $customer->address }}" required>
              </div>


                <button type="submit" class="btn btn-primary">Update Customer</button>
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
 