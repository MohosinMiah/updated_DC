
    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>

        <!-- Topbar Search -->
       
        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
          

          

       

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"> @if(Session::get('admin_name')) {{ Session::get('admin_name') }} @endif @if(Session::get('seller_name')) {{ Session::get('seller_name') }} @endif </span>
                    {{--  <img class="img-profile rounded-circle"
                        src="img/undraw_profile.svg">  --}}
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                    aria-labelledby="userDropdown">

                    {{--  For Admin **************  --}}
                    @if(Session::get('admin_name')) 

                    <a class="dropdown-item" href="{{ route('admin.admin_settingsadmin_settings') }}">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>

                    @endif

                    {{--  For Seller **************  --}}
                    @if(Session::get('seller_name')) 

                    <a class="dropdown-item" href="{{ route('seller.seller_settingsseller_settings') }}">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                    </a>

                    @endif
                    

                    <div class="dropdown-divider"></div>

                    {{--  For Admin **************  --}}

                    @if(Session::get('admin_name')) 

                    <a class="dropdown-item" href="{{ route('admin.admin_logoutadmin_logout') }}">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>

                    @endif

                    {{--  For Seller  *****************  --}}

                    @if(Session::get('seller_name')) 

                    <a class="dropdown-item" href="{{ route('seller.seller_logoutseller_logout') }}">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>

                    @endif
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->