<aside class="main-sidebar sidebar-dark-primary elevation-4">
  @if(Auth::user())
    <!-- Brand Logo -->
    <a href="{{ route('inicio') }}" class="brand-link">
      <img src="{{ asset('logo.png') }}" alt="logo" class="brand-image  elevation-8" style="opacity: 1"><span class="brand-text font-weight-light">&&</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('fotos/'.Auth::user()->foto) }}" class="img-circle elevation-4" alt="{{ Auth::user()->foto }}">
        </div>
        <div class="info">
          <a href="{{ route('perfil.edit') }}" class="d-block">{{ Auth::user()->nombre1 }} {{ Auth::user()->apellido_paterno }} {{ Auth::user()->apellido_materno }}</a>
        </div>
  @endif
      </div>
      @if(Auth::user())
        @if(Auth::user()->perfil_actualizado)
          <!-- Sidebar Menu -->
          <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="true">

              @can('empresas.index')    
                <li class="nav-item has-treeview ">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i><p>Administración<i class="right fas fa-angle-left"></i></p>
                  </a>
              
                        @can('users.index')
                        <li class="nav-item">
                          <a href="{{ route('users.index') }}" class="nav-link ">
                            <i class="far fa-address-card nav-icon"></i><p>Personal</p>
                          </a>
                        </li>
                        @endcan 

                        @can('permissions.index')
                        <li class="nav-item">
                          <a href="{{ route('permissions.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i><p>Permisos</p>
                          </a>
                        </li>
                        @endcan 

                        @can('roles.index')
                        <li class="nav-item">
                          <a href="{{ route('roles.index') }}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i><p>Roles</p>
                          </a>
                        </li>
                        @endcan 
                      </li>
                    </ul>
                </li>
              @endcan -->
              
            

             

              
             

           
              <i class="fad fa-album-collection"></i>
      


    

            </ul>
          </nav>
          <!-- /.sidebar-menu -->
        @endif
      @endif
    </div>
    <!-- /.sidebar -->
   
</aside>