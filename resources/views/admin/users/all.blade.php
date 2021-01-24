 
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

             <table id="example" class="display">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th class="column_name">Name</th>
                      <th class="column _name">Area Code</th>
                      <th>Phone</th>
                      <th>Email </th>
                      <th> Action </th>
                  </tr>
              </thead>
              <tbody>
                 @foreach ($sellers as $seller)
                     
                
                  <tr>
                      <td>{{$seller->id}}</td>
                      <td>{{$seller->name}}</td>
                      <td>{{$seller->area_code}}</td>
                      <td>{{$seller->phone}}</td>
                      <td>{{$seller->email}}</td>
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
                    <th>Name</th>
                    <th>Area Code</th>
                    <th>Phone</th>
                    <th>Email </th>
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
 