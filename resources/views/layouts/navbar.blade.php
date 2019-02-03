<!-- Navbar -->
<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>

    <!-- SEARCH FORM -->
    <form class="form-inline ml-3">
        <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-bell fa-2x"></i> <br>
                <span class="badge badge-warning navbar-badge">15</span>
            </a>
        </li> <br> <br>
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle user-panel" style="text-decoration: none;" data-toggle="dropdown">
                <img src="{{ auth()->user()->image_path }}" style="width:40px;" class="user-image img-circle" alt="User Image">
                <span class="hidden-xs">{{ auth()->user()->first_name }}
                    {{ auth()->user()->last_name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right text-center">
                <img src="{{ asset('uploads/moderator_images/admin.png') }}" style="width:150px;" class="img-thumbnail dropdown-item"
                    alt="User Image">
                <div class="dropdown-divider"></div>
                <span class="dropdown-item dropdown-header">{{ auth()->user()->first_name }}
                    {{ auth()->user()->last_name }}</span>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-header"><i class="fas fa-user-circle"></i> Profile</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item dropdown-header" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"><i
                        class="fas fa-power-off"></i>
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>
<!-- /.navbar -->
