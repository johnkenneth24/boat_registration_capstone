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
            @if (auth()->user()->role != 'user')
                <li class="nav-item {{ request()->routeIs('borrowers.*') ? 'nav-item-active' : '' }}">
                    <a href="{{-- route('borrowers.index') --}}" class="nav-link">
                        <i class="nav-icon fas fa-bullhorn" aria-hidden="true"></i>
                        <p>Announcements</p>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role == 'admin')
                <li class="nav-item {{ request()->routeIs('users.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('users.index') }}" class="nav-link ">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Users</p>
                    </a>
                </li>
            @endif
            @if (auth()->user()->role != 'admin')
                <li class="nav-header text-center">Boat Registration Management</li>
                <li class="nav-item {{ request()->routeIs('reg-boat.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('reg-boat.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-ship" aria-hidden="true"></i>
                        <p>Register Boat</p>
                    </a>
                </li>
                <li class="nav-item {{ request()->routeIs('borrowers.*') ? 'nav-item-active' : '' }}">
                    <a href="{{-- route('borrowers.index') --}}" class="nav-link">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>Owners Information</p>
                    </a>
                </li>
            @endif
            <hr>
            <li class="nav-item {{ request()->routeIs('profile.*') ? 'nav-item-active' : '' }}">
                <a href="{{ route('profile.show') }}" class="nav-link">
                    <i class="nav-icon fas fa-user"></i>
                    <p>
                        My profile
                    </p>
                </a>
            </li>
        </ul>
    </nav>
</div>
