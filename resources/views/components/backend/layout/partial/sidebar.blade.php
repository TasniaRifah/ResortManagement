<div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="{{ route('backend.index')}}">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
<!-- users -->
                <a class="nav-link {{ request()->routeIs('users.*')
                    || request()->routeIs('roles.*') ? 'collapse active': 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsers" aria-expanded="false" aria-controls="collapseUsers">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    Users & Role
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->routeIs('users.*') 
                    || request()->routeIs('roles.*')   ? 'show': '' }}" id="collapseUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('users.*') ? 'active':'' }}" href="{{ route('users.index')}}">Users</a>
                        <a class="nav-link {{ request()->routeIs('roles.*') ? 'active':'' }}" href="{{ route('roles.index')}}">Roles</a>
                    </nav>
                </div>
<!-- end users -->
<!-- Categories -->
      
<!-- end Categories -->
<!-- resorts -->
                <a class="nav-link {{ request()->routeIs('resorts.*') ? 'collapse active': 'collapsed' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseresorts" aria-expanded="false" aria-controls="collapseresorts">
                    <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                    resorts
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse {{ request()->routeIs('resorts.*')  ? 'show': '' }}" id="collapseresorts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link {{ request()->routeIs('resorts.index')
                            || request()->routeIs('resorts.show')
                            || request()->routeIs('resorts.edit') ? 'active':'' }}" href="{{ route('resorts.index')}}">List</a>
                        <a class="nav-link {{ request()->routeIs('resorts.create') ? 'active':'' }}" href="{{ route('resorts.create')}}">Create</a>
                    </nav>
                </div>
<!-- end resorts -->
<!-- Sliders -->
              

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
            <div class="small">Logged in as: {{ Auth::user()->role->name?? '' }} </div>
           
        </div>
                    
                </nav>
            </div>
