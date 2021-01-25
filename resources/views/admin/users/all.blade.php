 
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
            <div class="col-md-12">
              <h1 class="text-center">All Sellers</h1>

             <table id="example" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th class="mobile_colum_disbale">Name</th>
                      <th class="mobile_colum_disbale _name">Area Code</th>
                      <th>Phone</th>
                      <th class="mobile_colum_disbale">Email </th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach ($sellers as $seller)
                     
                
                  <tr>
                      <td>{{$seller->id}}</td>
                      <td class="mobile_colum_disbale">{{$seller->name}}</td>
                      <td class="mobile_colum_disbale">{{$seller->area_code}}</td>
                      <td>{{$seller->phone}}</td>
                      <td class="mobile_colum_disbale">{{$seller->email}}</td>
                      <td>
                          <div class="action">
                            <a href="{{route('admin.seller_editadmin_seller_edit',$seller->id)}}"><i class="fas fa-edit" data-toggle="tooltip" data-placement="top" title="Seller Edit"></i></a>
                            <a href="{{route('admin.seller_viewadmin_seller_show',$seller->id)}}" class="text-success"><i class="fas fa-eye" data-toggle="tooltip" data-placement="top" title="Seller View"></i></a>
                            <a href="{{ route('admin.seller_destroyadmin_seller_destroy',$seller->id) }}" onclick="return confirm('Are You Sure to Delete?')" class="text-warning"><i class="fas fa-trash-alt" data-toggle="tooltip" data-placement="top" title="Seller Delete"></i></a>
                        </div>
                      </td>
                  </tr>
             
                  @endforeach
             
              </tbody>
              <tfoot>
                <tr>
                    <th>ID</th>
                    <th class="mobile_colum_disbale">Name</th>
                    <th class="mobile_colum_disbale">Area Code</th>
                    <th>Phone</th>
                    <th class="mobile_colum_disbale">Email </th>
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
 