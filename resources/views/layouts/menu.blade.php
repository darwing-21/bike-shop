<li class="side-menus {{ Request::is('*') ? 'active' : '' }}">
    <a class="nav-link" href="/">
        <i class=" fas fa-building"></i><span>Dashboard</span>
    </a>
    <a class="nav-link" href="{{ route('brands.index') }}">
        <i class=" fas fa-gamepad"></i><span>Marca</span>
    </a>
</li>
