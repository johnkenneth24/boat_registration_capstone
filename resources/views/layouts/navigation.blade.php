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
            <li class="nav-item">
                <a href="#"
                    class="nav-link pb-2 {{ request()->routeIs(['owner-info.*']) ? 'nav-item-active' : '' }}">
                    <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                    <p>Owner Information
                        <i class="right fas fa-angle-right"></i>
                    </p>
                </a>
                @role('user')
                    <ul class="nav nav-treeview">
                        <li
                            class="nav-item {{ request()->routeIs(['owner-info.index']) ? 'nav-tree-view-active' : '' }} pl-3 pr-0 ">
                            <a href="{{ route('owner-info.index') }}" class="nav-link">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                <p>My information</p>
                            </a>
                        </li>
                    </ul>
                @endrole
                @unlessrole('user')
                    <ul class="nav-treeview">
                        <li
                            class="nav-item pl-3 pr-0 {{ request()->routeIs('owner-info.registered-owners') ? 'nav-tree-view-active' : '' }}">
                            <a href="{{ route('owner-info.registered-owners') }}" class="nav-link">
                                <i class="fa fa-check-circle" aria-hidden="true"></i>
                                <p>Registered Owners</p>
                            </a>
                        </li>
                    </ul>
                @endunlessrole
            </li>
            <li class="nav-item">
                <a href="#"
                    class="nav-link pb-2 {{ request()->routeIs(['reg-boat.*', 'walk-in.*']) ? 'nav-item-active' : '' }}">
                    <i class="nav-icon fa fa-file-alt" aria-hidden="true"></i>
                    <p>Boat Registration<i class="right fas fa-angle-right"></i></p>
                </a>
                <ul class="nav-treeview">
                    <li
                        class="nav-item pl-3 pr-0 {{ request()->routeIs('reg-boat.index') ? 'nav-tree-view-active' : '' }}">
                        <a href="{{ route('reg-boat.index') }}" class="nav-link">
                            <i class="fa fa-ship" aria-hidden="true"></i>
                            <p>Register Boat</p>
                        </a>
                    </li>
                    @unlessrole('user')
                        <li
                            class="nav-item pl-3 pr-0 {{ request()->routeIs('reg-boat.pending') ? 'nav-tree-view-active' : '' }}">
                            <a href="{{ route('reg-boat.pending') }}" class="nav-link">
                                <i class="fa fa-sync-alt" aria-hidden="true"></i>
                                <p>Pending Registration</p>
                            </a>
                        </li>
                        @role('staff')
                            <li class="nav-item pl-3 pr-0 {{ request()->routeIs('walk-in.*') ? 'nav-tree-view-active' : '' }}">
                                <a href="{{ route('walk-in.index') }}" class="nav-link">
                                    <i class="fa fa-anchor" aria-hidden="true"></i>
                                    <p>Walk In Registration</p>
                                </a>
                            </li>
                        @endrole
                        <li
                            class="nav-item pl-3 pr-0 {{ request()->routeIs('reg-boat.archived') ? 'nav-tree-view-active' : '' }}">
                            <a href="{{ route('reg-boat.archived') }}" class="nav-link">
                                <i class="fa fa-trash" aria-hidden="true"></i>
                                <p>Archived Registration</p>
                            </a>
                        </li>
                    @endunlessrole
                </ul>
            </li>

        </ul>
    </nav>
</div>
