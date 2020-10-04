<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
    <div>
        <p class="app-sidebar__user-name">{{ Auth::user()->name }}</p>
        <p class="app-sidebar__user-designation">Backend Developer</p>
    </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item {{ (request()->is('dashboard*')) ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Dashboard</span>
            </a>
        </li>

        <li>
            <a class="app-menu__item {{ (request()->is('blank*')) ? 'active' : '' }}" href="{{ route('blank') }}">
                <i class="app-menu__icon fa fa-file-code-o"></i>
                <span class="app-menu__label">Blank Page</span>
            </a>
        </li>

        @if(auth()->user()->hasanyrole('developer') || auth()->user()->hasAnyPermission(['master', 'user view']))
            <li class="treeview {{ (request()->is('permissions*')) ? 'is-expanded' : '' }}">
                <a class="app-menu__item" href="#" data-toggle="treeview">
                    <i class="app-menu__icon fa fa-users"></i>
                    <span class="app-menu__label">Users Management</span>
                    <i class="treeview-indicator fa fa-angle-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="#"><i class="icon fa fa-long-arrow-right"></i> Users</a></li>
                    @if(auth()->user()->hasrole('developer'))
                        <li><a class="treeview-item {{ (request()->is('permissions*')) ? 'active' : '' }}" href="{{ route('permissions.index') }}">
                            <i class="icon fa fa-long-arrow-right"></i> Permissions</a>
                        </li>
                    @endif
                    <li><a class="treeview-item" href="#"><i class="icon fa fa-long-arrow-right"></i> Roles</a></li>
                </ul>
            </li>
        @endif

        <li>
            <a class="app-menu__item {{ (request()->is('settings*')) ? 'active' : '' }}" href="{{ route('settings') }}">
                <i class="app-menu__icon fa fa-cog"></i>
                <span class="app-menu__label">Settings</span>
            </a>
        </li>
    </ul>
</aside>
