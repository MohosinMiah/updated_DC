 
@extends('dashboard.index')

@section('title') Admin @stop


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
              @include('admin.error.error')
            
            </div>
          </div>
          

        <div class="row">

        <div class="col-md-2"></div>
        <div class="col-md-8">
                  <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                   
            <form method="POST" action="{{ route('admin.seller_updateadmin_seller_update',$seller->id)}}">
                @csrf
                <div class="form-group">
                    <label for="name">Seller Name *</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{$seller->name}}" required>
                  </div>

                  <div class="form-group">
                    <label for="name">Area Code *</label>
                    <input type="text" class="form-control" id="area_code" name="area_code" value="{{$seller->area_code}}"  required>
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone Number *</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{$seller->phone}}"  required>
                  </div>

                  <div class="form-group">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$seller->email}}"  >
                  </div>



                <div class="form-group">
                    <label for="address">Address *</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$seller->address}}"  required>
                </div>


                <button type="submit" class="btn btn-primary">UPDATE SELLER</button>
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
 