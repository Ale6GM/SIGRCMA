<ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
    @can('dashboard')
    <li class="nav-item">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-home') }}"></use>
            </svg>
            {{ __('Dashboard') }}
        </a>
    </li>
    @endcan

    @can('admin.clientes.index')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('roles*') ? 'active' : ''}}" href="{{ route('admin.clientes.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-group') }}"></use>
                </svg>
                {{ __('Clientes') }}
            </a>
        </li>
    @endcan

    @can('admin.establecimientos.index')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('roles*') ? 'active' : ''}}" href="{{ route('admin.establecimientos.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-building') }}"></use>
                </svg>
                {{ __('Establecimientos') }}
            </a>
        </li>
    @endcan

    @can('admin.tecnicos.index')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('roles*') ? 'active' : ''}}" href="{{ route('admin.tecnicos.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-user') }}"></use>
                </svg>
                {{ __('Técnicos') }}
            </a>
        </li>
    @endcan

    @can('admin.reportes.index')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('roles*') ? 'active' : ''}}" href="{{ route('admin.reportes.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-bookmark') }}"></use>
                </svg>
                {{ __('Reportes') }}
            </a>
        </li>
    @endcan
    
    @can('admin.estadisticas.index')
        <li class="nav-item">
            <a class="nav-link {{ request()->is('roles*') ? 'active' : ''}}" href="{{ route('admin.estadisticas.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('icons/coreui.svg#cil-bar-chart') }}"></use>
                </svg>
                {{ __('Estadisticas') }}
            </a>
        </li>
    @endcan

    

    <li class="nav-group" aria-expanded="false">
        <a class="nav-link nav-group-toggle" href="#">
            <svg class="nav-icon">
                <use xlink:href="{{ asset('icons/coreui.svg#cil-speedometer') }}"></use>
            </svg>
            Administración
        </a>
        <ul class="nav-group-items" style="height: 0px;">
            @can('admin.usuarios.index')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('users*') ? 'active' : ''}}" href="{{ route('admin.usuarios.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-user-plus') }}"></use>
                        </svg>
                        {{ __('Usuarios') }}
                    </a>
                </li>
            @endcan
            @can('permissions.index')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('permissions*') ? 'active' : ''}}" href="{{ route('permissions.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-list') }}"></use>
                        </svg>
                        {{ __('Permisos') }}
                    </a>
                </li>
            @endcan

            @can('roles.index')
                <li class="nav-item">
                    <a class="nav-link {{ request()->is('roles*') ? 'active' : ''}}" href="{{ route('roles.index') }}">
                        <svg class="nav-icon">
                            <use xlink:href="{{ asset('icons/coreui.svg#cil-check-circle') }}"></use>
                        </svg>
                        {{ __('Roles') }}
                    </a>
                </li>
            @endcan
        </ul>
    </li>
</ul>