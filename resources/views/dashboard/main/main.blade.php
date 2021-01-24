 
@extends('dashboard.index')

@section('title') Discount A2z - @stop


@section('main_body')
 
 <!-- Main Content -->
 <div id="content">

      {{--  Include Toolbar   --}}
  
      @include('dashboard.include.toolbar')


    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        
                <h1 class="text-center">All Customers</h1>
        <!-- Content Row -->
            <div class="row">
                <div class="col-md-12">
    
                 <table id="example" class="display">
                  <thead>
                      <tr>
                          <th>ID</th>
                          <th>Name</th>
                          <th>Card No</th>
                          <th>Phone</th>
                          <th> Action </th>
                      </tr>
                  </thead>
                  <tbody>
                     @foreach ($customers as $customer)
                         
                    
                      <tr>
                          <td>{{$customer->id}}</td>
                          <td>{{$customer->name}}</td>
                          <td>{{$customer->card_number}}</td>
                          <td>{{$customer->phone}}</td>
                          <td>
                            <div class="action">

                                       {{-- Check Seller or Not  --}}
                             @if(Session::get('seller_is_login'))
                                <a href="{{route('seller.customer_editseller_seller_edit',$customer->id)}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="customer Edit"></i></a>
                             @endif
                             
                                <a href="{{route('seller.customer_viewseller_seller_show',$customer->id)}}" class="text-success"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Seller View"></i></a>
                                <a href="{{ route('seller.customer_destroyseller_seller_destroy',$customer->id) }}" onclick="return confirm('Are You Sure to Delete?')" class="text-warning"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Seller Delete"></i></a>
                            </div>
                          </td>
                      </tr>
                 
                      @endforeach
                 
                  </tbody>
                  <tfoot>
                    <tr>
                        <th>ID</th>
                          <th>Name</th>
                          <th>Card No</th>
                          <th>Phone</th>
                          <th> Action </th>
                    </tr>
                  </tfoot>
              </table>
                </div>
    
        </div>
        

    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



 @stop
 