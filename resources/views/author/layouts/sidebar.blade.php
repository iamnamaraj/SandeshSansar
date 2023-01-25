<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('author.dashboard') }}">Author Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('author.dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

             <li class= "{{ Request::is('author/dashboard') ? 'active' : '' }}" ><a class="nav-link" href="{{ route('author.dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>

            {{-- <li class="nav-item dropdown {{ Request::is('admin/top-ad')||Request::is('admin/home-ad')||Request::is('admin/sidebar-ad*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisement</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-ad') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.top-ad') }}"><i class="fas fa-angle-right"></i>Top advertisement</a></li>
                    <li class="{{ Request::is('admin/home-ad') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.home-ad') }}"><i class="fas fa-angle-right"></i>Home advertisement</a></li>
                    <li class="{{ Request::is('admin/sidebar-ad*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.sidebar-ad') }}"><i class="fas fa-angle-right"></i>Sidebar advertisement</a></li>
                </ul>
            </li> --}}






            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

        </ul>
    </aside>
</div>