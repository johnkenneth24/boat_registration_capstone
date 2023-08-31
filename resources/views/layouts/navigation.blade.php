<!-- Sidebar -->
<div class="sidebar">
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item  {{ request()->routeIs('home') ? 'nav-item-active' : '' }}">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            @unlessrole('user')
                <li class="nav-item {{ request()->routeIs('announcement.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('announcement.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn" aria-hidden="true"></i>
                        <p>Announcements</p>
                    </a>
                </li>
            @endunlessrole
            @role('admin')
                <li class="nav-item {{ request()->routeIs('users.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            @endrole
            <li class="nav-item {{ request()->routeIs('reg-boat.*') ? 'nav-item-active' : '' }}">
                <a href="{{ route('reg-boat.index') }}" class="nav-link">
                    <i class="nav-icon fa fa-ship" aria-hidden="true"></i>
                    <p>Boat Registration</p>
                </a>
            </li>
            <li class="nav-item {{-- request()->routeIs('applist.*')?'nav-item-active':'' --}}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                    <p>Owner Information
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item pl-3 pr-0 ">
                        <a href="#" class="nav-link">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            <p>Registered Owners</p>
                        </a>
                    </li>
                    <li class="nav-item pl-3 pr-0 ">
                        <a href="#" class="nav-link">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <p>Pending Registration</p>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ request()->routeIs(['reged-boat.*']) ? 'nav-item-active' : '' }}">
                <a href="#" class="nav-link">
                    <i class="nav-icon fa fa-file-alt" aria-hidden="true"></i>
                    <p>Boat Information<i class="right fas fa-angle-right"></i></p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item pl-3 pr-0  {{ request()->routeIs('reged-boat.*') ? 'nav-item-active' : '' }}">
                        <a href="{{ route('reged-boat.index') }}" class="nav-link">
                            <i class="fa fa-check-circle" aria-hidden="true"></i>
                            <p>Registered Boat</p>
                        </a>
                    </li>
                    <li class="nav-item pl-3 pr-0 ">
                        <a href="#" class="nav-link">
                            <i class="fa fa-times-circle" aria-hidden="true"></i>
                            <p>Pending Registration</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
