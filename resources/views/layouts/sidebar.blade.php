<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <i class="fas fa-store-alt fa-2x"></i>
      <span class="brand-text font-weight-light">Store LTE</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="text-center text-light">
          <i class="fas fa-user-tie fa-2x nav-icon"></i> <br>
          <span class="brand-text font-weight-dark">Meghlaoui</span>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt" style="color:red"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/category') }}" class="nav-link">
                  <i class="nav-icon fas fa-list-alt"></i>
                  <p>
                    Category
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/product') }}" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                  <p>
                    Products
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/sale') }}" class="nav-link">
                <i class="nav-icon fas fa-cart-plus"></i>
                  <p>
                    Sales
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/purchase') }}" class="nav-link">
                <i class="nav-icon fas fa-cart-arrow-down"></i>
                  <p>
                    Purchases
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/provider') }}" class="nav-link">
                <i class="nav-icon fas fa-truck"></i>
                  <p>
                    Provider
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/client') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                  <p>
                    Clients
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/report') }}" class="nav-link">
                    <i class="nav-icon fas fa-chart-pie"></i>
                  <p>
                    Reports
                  </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('/box') }}" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                  <p>
                    Box Money
                  </p>
                </a>
            </li>
          <li class="nav-item has-treeview menu-open">
            <a href="{{ url('/setting') }}" class="nav-link active">
              <i class="nav-icon fas fa-cogs"></i>
              <p>
                Settings
                <i class="right fa fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('/setting') }}" class="nav-link">
                  <i class="fas fa-clipboard-list nav-icon"></i>
                  <p>General</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/role') }}" class="nav-link">
                  <i class="nav-icon fas fa-users-cog"></i>
                  <p>Roles</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('/permission') }}" class="nav-link">
                  <i class="nav-icon fas fa-user-lock"></i>
                  <p>Permissions</p>
                </a>
              </li>
            </ul>
          </li>
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>