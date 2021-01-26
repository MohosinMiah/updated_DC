@extends('dashboard.index')

@section('title') General Report @stop


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
              @include('admin.error.error')
            
            </div>
          </div>
          

  <!-- Content Row -->
  <div class="row">
    <div class="col-md-12">
      <h1 class="text-center"> Seller Reports</h1>
      
     <table id="example" class="display">
      <thead>
          <tr>
              <th class="mobile_colum_disbale">ID</th>
              <th class="mobile_colum_disbale">Name</th>
              <th >Customers</th>
              <th >Phone</th>
              <th> Action </th>
          </tr>
      </thead>
      <tbody>
         @foreach ($sellers as $seller)
        <?php 
        $customers_by_seller = DB::table('customers')->where('seller_id',$seller->id)->count();
        
        ?>
        
          <tr>
              <td class="mobile_colum_disbale">{{$seller->id}}</td>
              <td class="mobile_colum_disbale">{{$seller->name}}</td>
              <td>{{$customers_by_seller}}</td>
              <td>{{$seller->phone}}</td>
              <td>
                  <div class="action">
                    <a href="{{route('admin.seller_report_detailsadmin_seller_report_details',$seller->id)}}" class="text-success"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Report Details"></i></a>
                </div>
              </td>
          </tr>
     
          @endforeach
     
      </tbody>
      <tfoot>
        <tr>
            <th class="mobile_colum_disbale">ID</th>
            <th class="mobile_colum_disbale">Name</th>
            <th >Customers</th>
            <th >Phone</th>
            <th> Action </th>
      </tr>
      </tfoot>
  </table>
    </div>

</div>

    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



 @stop
 