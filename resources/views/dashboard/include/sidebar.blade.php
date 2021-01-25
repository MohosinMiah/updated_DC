        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            {{--  Admin Name   --}}
            @if(Session::get('admin_is_login'))
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin.dashboardadmin_dashboard') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <div class="dashboard_icon"><img src="{{ URL::asset('/images/dashboard.png') }}" alt=""></div>
                </div>

                <div class="sidebar-brand-text mx-3"> {{  Session::get('admin_name') }}</div>

            </a>
            @endif

        <!-- Sidebar - Brand -->
    
        {{--  Seller Name   --}}
        @if(Session::get('seller_is_login'))

        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('seller.dashboardseller_dashboard') }}">
            <div class="sidebar-brand-icon rotate-n-15">
                
                <div class="dashboard_icon"><img src="{{ URL::asset('/images/dashboard.png') }}" alt=""></div>
            </div>        

            <div class="sidebar-brand-text mx-3"> {{  Session::get('seller_name') }}</div>
          
        </a>

        @endif


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            {{-- <li class="nav-item active">

                @if(Session::get('admin_is_login'))

                <a class="nav-link" href="{{ route('admin.dashboardadmin_dashboard') }}">
            
                @endif

                @if(Session::get('seller_is_login'))

                <a class="nav-link" href="{{ route('seller.dashboardseller_dashboard') }}">
            
                @endif

                    <i class="fas fa-fw fa-tachometer-alt"></i>

                @if(Session::get('admin_is_login'))
                <span>{{  Session::get('admin_phone') }}</span>
                @endif

                @if(Session::get('seller_is_login'))
                <span>{{  Session::get('seller_phone') }}</span>
                @endif
                
                </a>
            </li> --}}

          

           {{--  Access For Admin   --}}

        @if (Session::get('admin_is_login'))
              

           <!-- Nav Item - Seller Settings  Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSellers"
                    aria-expanded="true" aria-controls="collapseSellers">
                    <i class="fa fa-user" aria-hidden="true"></i>
                      <span>Seller </span>
                </a>
                <div id="collapseSellers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('admin.seller_createadmin_seller_create') }}">Add New</a>
                        <a class="collapse-item" href="{{ route('admin.seller_alladmin_seller_all') }}">All Seller</a>
                    </div>
                </div>
            </li>

        @endif

            <!-- Nav Item - Admin Settings  Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCustomers"
                    aria-expanded="true" aria-controls="collapseCustomers">
                    <i class="fa fa-user" aria-hidden="true"></i>
                         <span>Customer </span>
                </a>
                <div id="collapseCustomers" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                                
                        <a class="collapse-item" href="{{ route('seller.customer_createseller_seller_create') }}">Add New</a>
                        

                        <a class="collapse-item" href="{{ route('seller.customer_allseller_seller_all') }}">All Customer</a>
                    </div>
                </div>
            </li>
            
            {{--  Admin Setting   --}}

            @if(Session::get('admin_is_login')) 

            {{-- General Setting  --}}
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseReports"
                    aria-expanded="true" aria-controls="collapseReports">
                    <i class="fa fa-user" aria-hidden="true"></i>
                         <span>Reports </span>
                </a>
                <div id="collapseReports" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">

                        <a class="collapse-item" href="{{ route('admin.reportadmin_report_general') }}">General</a>
                        

                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.admin_settingsadmin_settings') }}">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                        <span>Settings</span></a>
            </li>

            @endif

            {{--  Seller Setting   --}}

            @if(Session::get('seller_is_login')) 

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('seller.seller_settingsseller_settings') }}">
                    <i class="fa fa-cog" aria-hidden="true"></i>
                     <span>Settings</span></a>
            </li>

            @endif

           
        </ul>
        <!-- End of Sidebar -->