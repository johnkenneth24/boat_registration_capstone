<!-- Sidebar -->
<div class="sidebar">
    {{-- <div class="user-panel mt-3 pb-3 mb-3 d-flex justify-content-center"> --}}
    {{-- <div class="text-center">
            <a href="{{ route('profile.show') }}" class="d-block brand-text text-center text-dark">
                {{ Auth::user()->name }}</a>
        </div> --}}
    {{-- </div> --}}

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
                <li class="nav-item {{ request()->routeIs('reg-boat.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('reg-boat.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-ship" aria-hidden="true"></i>
                        <p>Boat Registration</p>
                    </a>
                </li>
            @endif
                <li class="nav-item {{ request()->routeIs('reged-boat.*') ? 'nav-item-active' : '' }}">
                    <a href="{{ route('reged-boat.index') }}" class="nav-link">
                        <i class="nav-icon fa fa-check" aria-hidden="true"></i>
                        <p>Registered Boat</p>
                    </a>
                </li> 
            <hr>
        </ul>
    </nav>
</div>
