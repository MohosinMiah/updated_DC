 
@extends('dashboard.index')

@section('title') All Customer @stop


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
              <a class="btn btn-success" href="{{ route('seller.customer_createseller_seller_create') }}">Add New</a>

              <h1 class="text-center">All Customers</h1>

             <table id="example" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Card NO</th>
                      <th class="mobile_colum_disbale">Name</th>
                      <th class="mobile_colum_disbale">Phone</th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach ($customers as $customer)
                     
                
                  <tr>
                      <td>{{$customer->id}}</td>
                      <td>{{$customer->card_number}}</td>
                      <td class="mobile_colum_disbale">{{$customer->name}}</td>
                      <td class="mobile_colum_disbale">{{$customer->phone}}</td>
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
 