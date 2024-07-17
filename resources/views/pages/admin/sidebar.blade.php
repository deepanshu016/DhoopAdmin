        <!-- Vertical Nav -->
        <div class="kleon-vertical-nav">
            <!-- Logo  -->
            <div class="logo d-flex align-items-center justify-content-between">
                <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center gap-3 flex-shrink-0">
                    <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
                </a>
                <button type="button" class="kleon-vertical-nav-toggle"><i class="bi bi-list"></i></button>
            </div>

            <div class="kleon-navmenu">
                <h6 class="hidden-header text-gray text-uppercase ls-1 ms-4 mb-4">Main Menu</h6>
                <ul class="main-menu">
                    <li class="menu-section-title text-gray ff-heading fs-16 fw-bold text-uppercase mt-4 mb-2"><span>Home</span></li>

                    <li class="menu-item {{ (Request::segment(2) == 'dashboard') ? 'active' : ''}}"><a href="{{ route('admin.dashboard') }}"> <span class="nav-icon flex-shrink-0"><i class="bi bi-speedometer fs-18"></i></span> <span class="nav-text">Dashboard</span></a></li>
                    <li class="menu-item menu-item-has-children {{ (Request::segment(2) == 'cuisines') ? 'active' : ''}}">
                        <a href="#"> <span class="nav-icon flex-shrink-0"><i class="bi bi-people fs-18"></i></span> <span class="nav-text">Stock</span></a>
                        <ul class="sub-menu">
                                <li class="menu-item {{ (Request::segment(2) == 'stock' && Request::segment(3) == 'create') ? 'active' : ''}}"><a href="{{ route('stock.create') }}"> Add New</a></li>
                                <li class="menu-item {{ (Request::segment(2) == 'stock' && Request::segment(3) == 'list') ? 'active' : ''}}"><a href="{{ route('stock.list') }}"> List</a></li>
                        </ul>
                        <span class='submenu-opener'><i class='bi bi-chevron-right'></i></span>
                    </li>
                </ul>
            </div>
        </div>

