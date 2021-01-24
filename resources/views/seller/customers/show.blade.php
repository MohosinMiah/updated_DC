 
@extends('dashboard.index')

@section('title') View Customer @stop


@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

    <!-- Topbar -->
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
                   
            <form method="POST">
                @csrf
                <div class="form-group">
                    <label for="card_number">Card Number *</label>
                    <input type="text" class="form-control" id="card_number" value="{{ $customer->card_number }}" name="card_number" readonly >
                  </div>

                  <div class="form-group">
                    <label for="name">Customer Name *</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $customer->name }}"  readonly>
                  </div>

                  <div class="form-group" id="card-number-field">
                    <label for="phone">Phone * </label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $customer->phone }}" readonly>
                </div>

               <div class="form-group">
                <label for="gender">Gender *</label>
                <select class="form-control" id="gender" name="gender" readonly>
                  <option value="Male" @if($customer->gender == 'Male') selected @endif>Male</option>
                  <option value="Female" @if($customer->gender == 'Female') selected @endif>Female</option>
         
                </select>
              </div>

              <div class="form-group">
                <label for="address">Address *</label>
                <input type="text" class="form-control" id="address" name="address"  value="{{ $customer->address }}" readonly>
              </div>

                <a class="btn btn-primary" href="{{ route('seller.customer_allseller_seller_all') }}">Back To List</a>
            
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
 