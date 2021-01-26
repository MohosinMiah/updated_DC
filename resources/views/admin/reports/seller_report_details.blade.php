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
       
          
          <div class="row">
            <div class="col-md-12">
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col"  class="mobile_colum_disbale">#</th>
                    <th scope="col"  class="mobile_colum_disbale">Seller Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Seller Code </th>
                    <th scope="col"  class="mobile_colum_disbale">Total Customer</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row"  class="mobile_colum_disbale">{{ $data['seller']->id }}</th>
                    <td  class="mobile_colum_disbale"> {{ $data['seller']->name }}</td>
                    <td>{{ $data['seller']->phone }}</td>
                    <td>{{ $data['seller']->area_code }}</td>
                    <td  class="mobile_colum_disbale">{{ $data['total_customers'] }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
<br>
<hr>

<div class="row">
  <div class="col-md-12">
    <h3 class="text-center">Number Of Customers : <strong class="text-primary">{{ $data['total_customers'] }}</strong></h3>
  </div>
</div>
  <!-- Content Row -->
  <div class="row">
    <div class="col-md-12">
      <p class="text-center"> Customers Created By : <strong class="text-primary">{{$data['seller']->name}}</strong></p>
      <hr>
      <table id="example" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Card NO</th>
                <th class="mobile_colum_disbale">Name</th>
                <th class="mobile_colum_disbale">Phone</th>
                <th class="mobile_colum_disbale">Data</th>
                <th> Action </th>
            </tr>
        </thead>
        <tbody>
           @foreach ($data['customers'] as $customer)
               
          
            <tr>
                <td>{{$customer->id}}</td>
                <td>{{$customer->card_number}}</td>
                <td class="mobile_colum_disbale">{{$customer->name}}</td>
                <td class="mobile_colum_disbale">{{$customer->phone}}</td>
                <td class="mobile_colum_disbale">{{$customer->created_at->format('d/m/Y')}}</td>
                <td>
                  <div class="action">

                  
                     
                      <a href="{{route('seller.customer_editseller_seller_edit',$customer->id)}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="customer Edit"></i></a>                    
                      <a href="{{route('seller.customer_viewseller_seller_show',$customer->id)}}" class="text-success"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Seller View"></i></a>
                      <a href="{{ route('seller.customer_destroyseller_seller_destroy',$customer->id) }}" onclick="return confirm('Are You Sure to Delete?')" class="text-warning"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Seller Delete"></i></a>
                  
                  
                    {{-- Check Admin or Not 
                    @if(Session::get('admin_is_login'))
                      <a href="{{route('seller.customer_editseller_seller_edit', }}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="customer Edit"></i></a>
                      <a href="{{route('seller.customer_viewseller_seller_show',Session::get('admin_id').'_admin') }}" class="text-success"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Seller View"></i></a>
                      <a href="{{ route('seller.customer_destroyseller_seller_destroy',Session::get('admin_id').'_admin') }}" onclick="return confirm('Are You Sure to Delete?')" class="text-warning"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Seller Delete"></i></a>
                    @endif --}}
                
                    </div>
                </td>
            </tr>
       
            @endforeach
       
        </tbody>
        <tfoot>
          <tr>
              <th>ID</th>
              <th class="mobile_colum_disbale">Name</th>
              <th>Card NO</th>
              <th class="mobile_colum_disbale">Phone</th>
              <th class="mobile_colum_disbale">Data</th>
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
 