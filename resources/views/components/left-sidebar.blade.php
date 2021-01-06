<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Left Sidebar - style you can find in sidebar.scss  -->
<!-- ============================================================== -->
<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- User profile -->
        <div class="user-profile">
            <!-- User profile image -->
            <div class="profile-img"><img src="{{ asset('assets/images/users/profile.png')  }}" alt="user"/>
                <!-- this is blinking heartbit-->
                <div class="notify setpos"><span class="heartbit"></span> <span class="point"></span></div>
            </div>
            <!-- User profile text-->
            <div class="profile-text">
                <h5>Suhendri Manja</h5>
                <a href="pages-login.html" class="" data-toggle="tooltip" title="Logout"><i
                        class="mdi mdi-power"></i></a>
                <div class="dropdown-menu animated flipInY">
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-user"></i> My Profile</a>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-wallet"></i> My Balance</a>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-email"></i> Inbox</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="#" class="dropdown-item"><i class="ti-settings"></i> Account Setting</a>
                    <!-- text-->
                    <div class="dropdown-divider"></div>
                    <!-- text-->
                    <a href="login.html" class="dropdown-item"><i class="fa fa-power-off"></i> Logout</a>
                    <!-- text-->
                </div>
            </div>
        </div>
        <!-- End User profile text-->
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-devider"></li>
                <li class="nav-small-cap">PERSONAL</li>
                <li><a class="" href="{{route('dashboard')}}" aria-expanded="false"><i
                            class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                </li>
                <li><a class="" href="{{route('products.home')}}" aria-expanded="false"><i
                            class="mdi mdi-food-apple"></i><span class="hide-menu">Products </span></a>
                </li>
                <li><a class="" href="{{route('orderings.home')}}" aria-expanded="false"><i
                            class="mdi mdi-cart"></i><span class="hide-menu">Orders </span></a>
                </li>
                <li><a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i
                            class="mdi mdi-folder-multiple"></i><span class="hide-menu">Master Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{route('customers.home')}}">Customers</a></li>
                        <li><a href="{{ route('items.home')  }}">Items</a></li>
                        <li><a href="{{ route('brands.home')  }}">Brands</a></li>
                        <li><a href="{{ route('categories.home')  }}">Categories</a></li>
                        <li><a href="{{ route('shipping-providers.home')  }}">Shipping Providers</a></li>
                        <li><a href="{{ route('customer-labels.home')  }}">Customer Labels</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<!-- ============================================================== -->
<!-- End Left Sidebar - style you can find in sidebar.scss  -->
