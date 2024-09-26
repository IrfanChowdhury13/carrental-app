<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link text-center">
        <span class="brand-text font-weight-light">{{ config('app.name') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="info">
                <h2 class="text-white d-block text-center">Hello Admin</h2>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link {{ Route::is('admin.dashboard')? 'active' : '' }}">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.customers.index') }}" class="nav-link {{ Route::is('admin.customers.index')? 'active' : '' }}">
                        <i class="nav-icon fas fa-regular fa-user"></i>
                        <p>Customers</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link {{ Route::is('admin.cars.index')? 'active' : '' }}">
                        <i class="nav-icon fas fa-solid fa-car"></i>
                        <p>Cars</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.rentals.index') }}" class="nav-link {{ Route::is('admin.rentals.index')? 'active' : '' }}">

                        <i class="nav-icon fas fa-solid fa-caret-right"></i>
                        <p>Rentals</p>

                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
