<ul class="navbar-nav my-lg-0">
    <!-- ============================================================== -->
    <!-- Profile -->
    <!-- ============================================================== -->
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href=""
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                src="{{ asset('assets/images/users/admin.png')  }}" alt="user" class="profile-pic"/></a>
        <div class="dropdown-menu dropdown-menu-right scale-up">
            <ul class="dropdown-user">
                <li>
                    <div class="dw-user-box">
                        <div class="u-text">
                            <h4>{{ ucfirst(Auth::user()->name) ?? "Admin" }}</h4>
                            <p class="text-muted">{{ ucfirst(Auth::user()->email) ?? "Admin" }}</p>
                    </div>
                </li>
                <li role="separator" class="divider"></li>
                <li><a href="#"><i class="fa fa-power-off"></i> Logout</a></li>
            </ul>
        </div>
    </li>
</ul>
