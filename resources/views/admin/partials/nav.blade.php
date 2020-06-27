<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

    <li class="nav-item">
      <a href="{{ route('dashboard') }}" class="nav-link {{ request()->is('admin') ? 'active' : '' }}">
        <i class="nav-icon fas fa-home"></i>
        <p>
          Inicio
        </p>
      </a>
    </li>

    <li class="nav-item has-treeview ">
      <a href="#" class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }}">
        <i class="nav-icon fas fa-map-marker-alt"></i>
        <p>
          Lugares
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" data-toggle="modal" data-target="#exampleModal" class="nav-link {{ request()->is('admin/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map-marked-alt"></i>
            <p>
              Agregar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.posts.index')}}" class="nav-link {{ request()->is('admin/posts') ? 'active' : '' }}">
            <i class="nav-icon fas fa-map"></i>
            <p>
              Ver
            </p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview ">
      <a href="#" class="nav-link {{ request()->is('admin/categorys') ? 'active' : '' }}">
        <i class="nav-icon fas fa-boxes"></i>
        <p>
          Categorias
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" data-toggle="modal" data-target="#prueba" class="nav-link {{ request()->is('admin/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box"></i>
            <p>
              Agregar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.categorys.index')}}" class="nav-link {{ request()->is('admin/categorys') ? 'active' : '' }}">
            <i class="nav-icon fas fa-box-open"></i>
            <p>
              Ver
            </p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview ">
      <a href="#" class="nav-link {{ request()->is('admin/tags') ? 'active' : '' }}">
        <i class="nav-icon fas fa-table-tennis"></i>
        <p>
          Actividades
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" data-toggle="modal" data-target="#prueba2" class="nav-link {{ request()->is('admin/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-baseball-ball"></i>
            <p>
              Agregar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.tags.index')}}" class="nav-link {{ request()->is('admin/tags') ? 'active' : '' }}">
            <i class="nav-icon fas fa-passport"></i>
            <p>
              Ver
            </p>
          </a>
        </li>
      </ul>
    </li>

    <li class="nav-item has-treeview ">
      <a href="#" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
        <i class="nav-icon fas fa-user-friends"></i>
        <p>
          Usuarios
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="#" data-toggle="modal" data-target="#prueba3" class="nav-link {{ request()->is('admin/create') ? 'active' : '' }}">
            <i class="nav-icon fas fa-user"></i>
            <p>
              Agregar
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('admin.users.index')}}" class="nav-link {{ request()->is('admin/users') ? 'active' : '' }}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              Ver
            </p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>