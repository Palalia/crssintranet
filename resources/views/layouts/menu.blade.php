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
    @can('ver-blog')
    <a class="nav-link" href="/blogs">
        <i class=" fas fa-blog"></i><span>BLOGS</span>
    </a>
    @endcan
</li>
