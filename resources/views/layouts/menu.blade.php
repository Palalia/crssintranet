<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/home">
        <i class=" fas fa-building"></i><span>INICIO</span>
    </a>
    @can('ver-usuarios')
    <a class="nav-link" href="/usuarios">
        <i class=" fas fa-users"></i><span>USUARIOS</span>
    </a>
    @endcan
    @can('ver-rol')
    <a class="nav-link" href="/roles">
        <i class=" fas fa-user-lock"></i><span>ROLES</span>
    </a>
    @endcan
    @can('ver-prospecto')
    <a class="nav-link" href="/prospectos">
    <i class="fas fa-user-plus"></i><span>Prospectos</span>
    </a>
    @endcan
    @can('ver-campus')
    <a class="nav-link" href="/campus">
    <i class="fas fa-school"></i><span>Campus</span>
    </a>
    @endcan
    @can('ver-campus')
    <a class="nav-link" href="/clientes">
        <i class=" fas fa-handshake"></i><span>Clientes</span>
    </a>
    @endcan
</li>
