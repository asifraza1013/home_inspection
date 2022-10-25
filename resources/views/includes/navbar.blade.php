@php
    $auth = Auth::user();
    $role = $auth->roles[0]->name;
@endphp
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  d-flex  align-items-center">
            <a class="navbar-brand" href="{{ route('home') }}" data-toggle="tooltip"
                data-original-title="{{ setting('company_name') }}">
                @if (setting('company_logo'))
                    <img alt="{{ setting('company_name') }}" height="45" class="navbar-brand-img"
                        src="{{ asset(setting('company_logo')) }}">
                @else
                    {{ substr(setting('company_name'), 0, 15) }}...
                @endif
            </a>
            <div class=" ml-auto ">
                <!-- Sidenav toggler -->
                <div class="sidenav-toggler d-none d-xl-block" data-action="sidenav-unpin" data-target="#sidenav-main">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                        <i class="sidenav-toggler-line"></i>
                    </div>
                </div>
            </div>
        </div>
        @if ($role == 'super-admin')
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('home*') ? 'active' : '' }}"
                                href="{{ route('home') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        {{-- @can('update-settings')
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('settings*')) ? 'active' : '' }}" href="{{route('settings.index')}}">
                                <i class="ni ni-settings-gear-65 text-primary"></i>
                                <span class="nav-link-text">Manage Settings</span>
                            </a>
                        </li>
                    @endcan --}}

                        {{-- @canany(['view-category', 'create-category'])
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('category*')) ? 'active' : '' }}" href="#navbar-category"  data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-category">
                                <i class="fas text-primary fa-list-alt"></i>
                                <span class="nav-link-text">Manage Category</span>
                            </a>
                            <div class="collapse" id="navbar-category">
                                <ul class="nav nav-sm flex-column">
                                 @can('view-category')
                                    <li class="nav-item">
                                        <a href="{{route('category.index')}}" class="nav-link"><span class="sidenav-mini-icon">D </span><span class="sidenav-normal">All Categories</span></a>
                                    </li>
                                    @endcan
                                    @can('create-category')
                                    <li class="nav-item">
                                        <a href="{{route('category.create')}}" class="nav-link"><span class="sidenav-mini-icon">D </span><span class="sidenav-normal">Add New Category</span></a>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>

                    @endcan --}}

                        {{-- @canany(['view-post', 'create-post'])

                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('post*')) ? 'active' : '' }}" href="#navbar-post"  data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-post">
                                <i class="fas text-primary fa-tasks"></i>
                                <span class="nav-link-text">Manage Posts</span>
                            </a>
                            <div class="collapse" id="navbar-post">
                                <ul class="nav nav-sm flex-column">
                                 @can('view-post')
                                    <li class="nav-item">
                                        <a href="{{route('post.index')}}" class="nav-link"><span class="sidenav-mini-icon">D </span><span class="sidenav-normal">All Posts</span></a>
                                    </li>
                                    @endcan
                                    @can('create-post')
                                    <li class="nav-item">
                                        <a href="{{route('post.create')}}" class="nav-link"><span class="sidenav-mini-icon">D </span><span class="sidenav-normal">Add New Post</span></a>
                                    </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    @endcan --}}
                        @canany(['view-user', 'create-user'])

                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}" href="#navbar-users"
                                    data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-users">
                                    <i class="fas text-primary fa-tasks"></i>
                                    <span class="nav-link-text">Users</span>
                                </a>
                                <div class="collapse" id="navbar-users">
                                    <ul class="nav nav-sm flex-column">
                                        @can('view-user')
                                            <li class="nav-item">
                                                <a href="{{ route('users.index', ['type' => 'admin']) }}" class="nav-link"><span
                                                        class="sidenav-mini-icon">D </span><span
                                                        class="sidenav-normal">Admins</span></a>
                                            </li>
                                        @endcan
                                        @can('view-user')
                                            <li class="nav-item">
                                                <a href="{{ route('users.index', ['type' => 'clients']) }}"
                                                    class="nav-link"><span class="sidenav-mini-icon">D </span><span
                                                        class="sidenav-normal">Clients</span></a>
                                            </li>
                                        @endcan
                                        {{-- @can('create-user')
                                    <li class="nav-item">
                                        <a href="{{route('users.create')}}" class="nav-link"><span class="sidenav-mini-icon">D </span><span class="sidenav-normal">Add New User</span></a>
                                    </li>
                                    @endcan --}}
                                    </ul>
                                </div>
                            </li>
                        @endcan

                        @canany(['view-permission', 'create-permission'])
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}"
                                    href="{{ route('permissions.index') }}">
                                    <i class="fas fa-lock-open text-primary"></i>
                                    <span class="nav-link-text">Manage Permissions</span>
                                </a>
                            </li>
                        @endcan
                        @canany(['view-role', 'create-role'])
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}"
                                    href="{{ route('roles.index') }}">
                                    <i class="fas fa-lock text-primary"></i>
                                    <span class="nav-link-text">Manage Roles</span>
                                </a>
                            </li>
                        @endcan

                        {{-- @canany(['media'])
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->is('media*')) ? 'active' : '' }}" href="{{route('media.index')}}">
                                <i class="fas fa-images text-primary"></i>
                                <span class="nav-link-text">Manage Media</span>
                            </a>
                        </li>
                    @endcan --}}
                        @canany(['view-activity-log'])
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('activity-log*') ? 'active' : '' }}" href="#">
                                    <i class="fas fa-history text-primary"></i>
                                    <span class="nav-link-text">Subscribers History</span>
                                </a>
                            </li>
                        @endcan
                        @canany(['view-activity-log'])
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('activity-log*') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-bell-55 text-primary"></i>
                                    <span class="nav-link-text">Subscription Plan Settings</span>
                                </a>
                            </li>
                        @endcan
                        @canany(['view-activity-log'])
                            <li class="nav-item">
                                <a class="nav-link {{ request()->is('activity-log*') ? 'active' : '' }}" href="#">
                                    <i class="ni ni-briefcase-24 text-primary"></i>
                                    <span class="nav-link-text">Built-in Reports</span>
                                </a>
                            </li>
                        @endcan
                        <li class="nav-item">
                            <hr class="my-3">
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link active active-pro" href="{{route('components')}}">
                                <i class="ni ni-send text-primary"></i>
                                <span class="nav-link-text">Components</span>
                            </a>
                        </li> --}}
                    </ul>
                </div>
            </div>
        @endif
        @if ($role == 'user')
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user.dashboard*') ? 'active' : '' }}"
                                href="{{ route('user.dashboard') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-archive-2 text-primary"></i>
                                <span class="nav-link-text">Quick Quote</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-tag text-primary"></i>
                                <span class="nav-link-text">Inspection Request</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-time-alarm text-primary"></i>
                                <span class="nav-link-text">Inspection Schedule</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-ui-04 text-primary"></i>
                                <span class="nav-link-text">Reports History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('user.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-credit-card text-primary"></i>
                                <span class="nav-link-text">Payment History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile.edit*') ? 'active' : '' }}"
                                href="{{ route('profile.edit', $auth->id) }}">
                                <i class="ni ni-user-run text-primary"></i>
                                <span class="nav-link-text">Profile Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
        @if ($role == 'admin')
            <div class="navbar-inner">
                <!-- Collapse -->
                <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                    <!-- Nav items -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin*') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="ni ni-shop text-primary"></i>
                                <span class="nav-link-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.dashboard*') ? 'active' : '' }}"
                                href="{{ route('admin.dashboard') }}">
                                <i class="ni ni-notification-70 text-primary"></i>
                                <span class="nav-link-text">Notifications</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-archive-2 text-primary"></i>
                                <span class="nav-link-text">History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-tag text-primary"></i>
                                <span class="nav-link-text">Reports</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('users*') ? 'active' : '' }}"
                                href="{{ route('users.index', ['type' => 'inspector']) }}">
                                <i class="ni ni-circle-08 text-primary"></i>
                                <span class="nav-link-text">Clients</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.users*') ? 'active' : '' }}"
                                href="#inspections" data-toggle="collapse" role="button" aria-expanded="true"
                                aria-controls="inspections">
                                <i class="fas text-primary fa-tasks"></i>
                                <span class="nav-link-text">Inspections</span>
                            </a>
                            <div class="collapse" id="inspections">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><span class="sidenav-mini-icon">D
                                            </span><span class="sidenav-normal">Inspections Requested</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><span class="sidenav-mini-icon">D
                                            </span><span class="sidenav-normal">Inspections Scheduled</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.users*') ? 'active' : '' }}" href="#reports"
                                data-toggle="collapse" role="button" aria-expanded="true" aria-controls="reports">
                                <i class="fas text-primary fa-tasks"></i>
                                <span class="nav-link-text">Reports</span>
                            </a>
                            <div class="collapse" id="reports">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><span class="sidenav-mini-icon">D
                                            </span><span class="sidenav-normal">Report Templates</span></a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link"><span class="sidenav-mini-icon">D
                                            </span><span class="sidenav-normal">Past Reports</span></a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.dashboard*') ? 'active' : '' }}"
                                href="#">
                                <i class="ni ni-paper-diploma text-primary"></i>
                                <span class="nav-link-text">Subscription Plan</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('profile*') ? 'active' : '' }}"
                                href="{{ route('profile.edit', $auth->id) }}">
                                <i class="ni ni-user-run text-primary"></i>
                                <span class="nav-link-text">Profile Settings</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('admin.quote*') ? 'active' : '' }}"
                                href="#settings" data-toggle="collapse" role="button" aria-expanded="true"
                                aria-controls="settings">
                                <i class="ni ni-settings-gear-65 text-primary"></i>
                                <span class="nav-link-text">Settings</span>
                            </a>
                            <div class="collapse" id="settings">
                                <ul class="nav nav-sm flex-column">
                                    <li class="nav-item">
                                        <a href="{{ route('admin.quote.options') }}" class="nav-link"><span
                                                class="sidenav-mini-icon">D </span><span class="sidenav-normal">Quote
                                                Options</span></a>
                                    </li>
                                    @canany(['2-view-permission', '2-create-permission'])
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('permissions*') ? 'active' : '' }}"
                                                href="{{ route('permissions.index') }}"  class="nav-link"><span
                                                class="sidenav-mini-icon">D </span><span class="sidenav-normal">Manage Permissions</span>
                                            </a>
                                        </li>
                                    @endcan
                                    @canany(['2-view-role', '2-create-role'])
                                        <li class="nav-item">
                                            <a class="nav-link {{ request()->is('roles*') ? 'active' : '' }}"
                                                href="{{ route('roles.index') }}" class="nav-link"><span
                                                class="sidenav-mini-icon">D </span><span class="sidenav-normal">Manage Roles</span>
                                            </a>
                                        </li>
                                    @endcan
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        @endif
    </div>
</nav>
