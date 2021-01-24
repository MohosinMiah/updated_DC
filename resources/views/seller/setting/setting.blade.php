@extends('dashboard.index')

@section('title') Admin @stop


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

        <div class="col-md-2">
        </div>
        <div class="col-md-8" >
                  <!-- Content Row -->
            <div class="card">
                <div class="card-body">
                   
            <form method="POST" action="{{ route('seller.seller_infoseller_settings_info')}}">
                @csrf
                <div class="form-group">
                    <label for="name"> Name *</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $data['seller']->name}}" required>
                </div>


       

                  <div class="form-group">
                    <label for="address">Address * </label>
                    <textarea name="address"  class="form-control"  id="address" cols="40" rows="5"> {{ $data['seller']->address}} </textarea>
                </div>

            


                <button type="submit" class="btn btn-warning">UPDATE INFO</button>
              </form>

       
            </div>
        </div>
    </div>
       

  
        <div class="col-md-2">

        </div>

    </div>



   {{-- Change Phone Number  ************************     --}}

   <br>

   <div class="row">

    <div class="col-md-2">
    </div>
    <div class="col-md-8" >
              <!-- Content Row -->
        <div class="card">
            <div class="card-body">
               
        <form method="POST" action="{{ route('seller.seller_change_phoneseller_change_phone')}}">
            @csrf
         
            <div class="form-group">
                <label for="phone">Phone Number *</label>
                <input type="text" pattern=".{11}" class="form-control" id="phone" name="phone" value="{{ $data['seller']->phone}}" oninput="check(this)"  required>
            </div>

            <button type="submit" class="btn btn-success">CHANGE PHONE NUMBER</button>
          </form>

   
        </div>
    </div>
</div>
   

    <div class="col-md-2">

    </div>

</div>

   <br>

   {{-- Password Setting  ************************     --}}

   <br>

   <div class="row">

    <div class="col-md-2">
    </div>
    <div class="col-md-8" >
              <!-- Content Row -->
        <div class="card">
            <div class="card-body">
               
        <form method="POST" action="{{ route('seller.seller_change_passseller_change_pass')}}">
            @csrf
            <div class="form-group">
                <label for="old_password"> Old Password *</label>
                <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password" required >
            </div>

              <div class="form-group">
                <label for="password">New Password *</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="New Password" required>
              </div>    

            <button type="submit" class="btn btn-info">UPDATE PASSWORD</button>
          </form>

   
        </div>
    </div>
</div>
   

    <div class="col-md-2">

    </div>

</div>

   <br>


    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



 @stop
 