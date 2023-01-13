<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}">Admin Panel</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.dashboard') }}"></a>
        </div>

        <ul class="sidebar-menu">

            <li class= "{{ Request::is('admin/dashboard') ? 'active' : '' }}" ><a class="nav-link" href="{{ route('admin.dashboard') }}"><i class="fas fa-hand-point-right"></i> <span>Dashboard</span></a></li>
            <li class= "{{ Request::is('admin/settings') ? 'active' : '' }}" ><a class="nav-link" href="{{ route('admin.settings') }}"><i class="fas fa-hand-point-right"></i> <span>Settings</span></a></li>

            <li class="nav-item dropdown {{ Request::is('admin/top-ad')||Request::is('admin/home-ad')||Request::is('admin/sidebar-ad*') ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Advertisement</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/top-ad') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.top-ad') }}"><i class="fas fa-angle-right"></i>Top advertisement</a></li>
                    <li class="{{ Request::is('admin/home-ad') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.home-ad') }}"><i class="fas fa-angle-right"></i>Home advertisement</a></li>
                    <li class="{{ Request::is('admin/sidebar-ad*') ? 'active' : '' }}"><a class="nav-link" href="{{ route('admin.sidebar-ad') }}"><i class="fas fa-angle-right"></i>Sidebar advertisement</a></li>
                </ul>
            </li>

            <li class="nav-item dropdown {{ Request::is('admin/categories*') ||Request::is('admin/sub-categories*')||Request::is('admin/posts*')  ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>News</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/categories*') ? 'active' : ''}} "><a class="nav-link" href="{{ route('admin.categories') }}"><i class="fas fa-hand-point-right"></i> <span>Categories</span></a></li>
                    <li class="{{ Request::is('admin/sub-categories*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.sub-categories') }}"><i class="fas fa-hand-point-right"></i> <span>Sub Categories</span></a></li>
                    <li class="{{ Request::is('admin/posts*') ? 'active' : ''}}"><a class="nav-link" href="{{ route('posts.index') }}"><i class="fas fa-angle-right"></i>Posts</a></li>
                </ul>
            </li>


            <li class="nav-item dropdown {{ Request::is('admin/subscribers*')  ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Subscribers</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/subscribers') ? 'active' : ''}} "><a class="nav-link" href="{{ route('admin.subscriber') }}"><i class="fas fa-hand-point-right"></i> <span>All subscribers</span></a></li>
                    <li class="{{ Request::is('admin/subscribers/mail') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.subscriber.mail') }}"><i class="fas fa-hand-point-right"></i> <span>Send mail</span></a></li>
                </ul>
            </li>


            <li class="nav-item dropdown {{ Request::is('admin/pages*')   ? 'active' : '' }}">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Pages</span></a>
                <ul class="dropdown-menu">
                    <li class="{{ Request::is('admin/pages/about') ? 'active' : ''}} "><a class="nav-link" href="{{ route('admin.about') }}"><i class="fas fa-hand-point-right"></i> <span>Abouts</span></a></li>
                    <li class="{{ Request::is('admin/pages/faq') ? 'active' : ''}} "><a class="nav-link" href="{{ route('admin.page.faq') }}"><i class="fas fa-hand-point-right"></i> <span>FAQ</span></a></li>
                    <li class="{{ Request::is('admin/pages/terms') ? 'active' : ''}} "><a class="nav-link" href="{{ route('admin.terms') }}"><i class="fas fa-hand-point-right"></i> <span>Terms & Conditions</span></a></li>
                    <li class="{{ Request::is('admin/pages/privacy') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.privacy') }}"><i class="fas fa-angle-right"></i>Privacy & Policies</a></li>
                    <li class="{{ Request::is('admin/pages/disclaimer') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.disclaimer') }}"><i class="fas fa-angle-right"></i>Disclaimers</a></li>
                    <li class="{{ Request::is('admin/pages/login') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.page.login') }}"><i class="fas fa-angle-right"></i>Login page</a></li>
                    <li class="{{ Request::is('admin/pages/contact') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.contact') }}"><i class="fas fa-angle-right"></i>Contact page</a></li>
                </ul>
            </li>

            <li class="{{ Request::is('admin/faq') ? 'active' : ''}}"><a class="nav-link" href="{{ route('admin.faq') }}"><i class="fas fa-hand-point-right"></i> <span>FAQ</span></a></li>




            {{-- <li class="nav-item dropdown active">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-hand-point-right"></i><span>Dropdown Items</span></a>
                <ul class="dropdown-menu">
                    <li class="active"><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 1</a></li>
                    <li class=""><a class="nav-link" href=""><i class="fas fa-angle-right"></i> Item 2</a></li>
                </ul>
            </li> --}}

            {{-- <li class=""><a class="nav-link" href="setting.html"><i class="fas fa-hand-point-right"></i> <span>Setting</span></a></li>

            <li class=""><a class="nav-link" href="form.html"><i class="fas fa-hand-point-right"></i> <span>Form</span></a></li>

            <li class=""><a class="nav-link" href="table.html"><i class="fas fa-hand-point-right"></i> <span>Table</span></a></li>

            <li class=""><a class="nav-link" href="invoice.html"><i class="fas fa-hand-point-right"></i> <span>Invoice</span></a></li> --}}

        </ul>
    </aside>
</div>