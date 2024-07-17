<!-- Default Nav -->
<header class="header kleon-default-nav">
    <div class="d-none d-xl-block">
        <div class="header-inner d-flex align-items-center justify-content-around justify-content-xl-between flex-wrap flex-xl-nowrap gap-3 gap-xl-5">
            <div class="header-left-part d-flex align-items-center flex-grow-1 w-100"></div>

            <div class="header-right-part d-flex align-items-center flex-shrink-0">
                <ul class="nav-elements d-flex align-items-center list-unstyled m-0 p-0">
                    <li class="nav-item nav-author">
                        <a href="#" class="nav-toggler" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/') }}admin/assets/img/user_placeholder.jpg" alt="img" width="54" class="rounded-2">
                            <div class="nav-toggler-content">
                                <h6 class="mb-0">{{ @Auth::user()->name }}</h6>
                                <div class="ff-heading fs-14 fw-normal text-gray">
                                    Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-widget dropdown-menu p-0 admin-card">
                            <div class="dropdown-wrapper">
                                <div class="card mb-0">
                                    <div class="card-header p-3 text-center">
                                        <img src="{{ asset('/') }}admin/assets/img/user_placeholder.jpg" alt="img" width="54" class="rounded-2">

                                        <div class="mt-2">
                                            <h6 class="mb-0 lh-18">{{ @Auth::user()->name }}</h6>
                                            <div class="fs-14 fw-normal text-gray">
                                                Admin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li class="active">
                                                <a href="{{ route('user.profile') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-person me-2"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{route('settings') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-gear me-2"></i> Setting & Privacy</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer p-3">
                                        <a href="{{ route('logout') }}" class="btn btn-outline-gray bg-transparent w-100 py-1 rounded-1 text-dark fs-14 fw-medium"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="small-header d-flex align-items-center justify-content-between d-xl-none">
        <div class="logo">
            <a href="#" class="d-flex align-items-center gap-3 flex-shrink-0">
                <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
            </a>
        </div>
        <div>
            <button type="button" class="kleon-header-expand-toggle"><span class="fs-24"><i class="bi bi-three-dots-vertical"></i></button>
            <button type="button" class="kleon-mobile-menu-opener"><span class="close"><i class="bi bi-arrow-left"></i></span> <span class="open"><i class="bi bi-list"></i></span></button>
        </div>
    </div>

    <div class="header-mobile-option">
        <div class="header-inner">
            <div class="d-flex align-items-center justify-content-end flex-shrink-0">
                <ul class="nav-elements d-flex align-items-center list-unstyled m-0 p-0">

                    <li class="nav-item nav-author px-3">
                        <a href="#" class="nav-toggler" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/') }}admin/assets/img/user_placeholder.jpg" alt="img" width="40" class="rounded-2">
                            <div class="nav-toggler-content">
                                <h6 class="mb-0">{{@Auth::user()->name }}</h6>
                                <div class="ff-heading fs-14 fw-normal text-gray">
                                    Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-widget dropdown-menu p-0 admin-card">
                            <div class="dropdown-wrapper">
                                <div class="card mb-0">
                                    <div class="card-header p-3 text-center">
                                        <img src="{{ asset('/') }}admin/assets/img/nav_author.jpg" alt="img" width="60" class="rounded-circle avatar">
                                        <div class="mt-2">
                                            <h6 class="mb-0 lh-18">{{ @Auth::user()->name }}</h6>
                                            <div class="fs-14 fw-normal text-gray">
                                                Admin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>
                                                <a href="{{ route('user.profile') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-person me-2"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{route('settings') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-gear me-2"></i> Setting & Privacy</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="card-footer p-3">
                                        <a href="{{ route('logout') }}" class="btn btn-outline-gray bg-transparent w-100 py-1 rounded-1 text-dark fs-14 fw-medium"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Horizontal Nav -->
<header class="header kleon-horizontal-nav shadow">
    <div class="d-none d-xl-block">
        <div class="d-flex align-items-center justify-content-around justify-content-xl-between flex-wrap flex-xl-nowrap gap-3 gap-xl-5">
            <div class="d-flex align-items-center gap-7">
                <div class="logo">
                    <a href="#" class="d-flex align-items-center gap-3 flex-shrink-0">
                        <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
                    </a>
                </div>
            </div>

            <div class="d-flex align-items-center flex-shrink-0">
                <ul class="nav-elements d-flex align-items-center list-unstyled m-0 p-0">
                    <li class="nav-item nav-color-switch d-flex align-items-center gap-3">
                        <div class="sun"><img src="{{ asset('/') }}frontend/assets/img/sun.svg" alt="img"></div>
                        <div class="switch">
                            <input type="checkbox" id="colorSwitch2" value="false" name="defaultMode">
                            <div class="shutter">
                                <span class="lbl-off"></span>
                                <span class="lbl-on"></span>
                                <div class="slider bg-primary"></div>
                            </div>
                        </div>
                        <div class="moon"><img src="{{ asset('/') }}frontend/assets/img/moon.svg" alt="img"></div>
                    </li>

                    <li class="nav-item nav-author">
                        <a href="#" class="nav-toggler" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/') }}admin/assets/img/user_placeholder.jpg" alt="img" width="40" class="rounded-2">

                            <div class="nav-toggler-content">
                                <h6 class="mb-0">{{ @Auth::user()->name }}</h6>
                                <div class="ff-heading fs-14 fw-normal text-gray">
                                    Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-widget dropdown-menu p-0 admin-card">
                            <div class="dropdown-wrapper">
                                <div class="card mb-0">
                                    <div class="card-header p-3 text-center">
                                        <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
                                        <div class="mt-2">
                                            <h6 class="mb-0 lh-18">{{ @Auth::user()->name }}</h6>
                                            <div class="fs-14 fw-normal text-gray">
                                                Admin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>
                                                <a href="{{ route('user.profile') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-person me-2"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{route('settings') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-gear me-2"></i> Setting & Privacy</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="card-footer p-3">
                                        <a href="{{ route('logout') }}" class="btn btn-outline-gray bg-transparent w-100 py-1 rounded-1 text-dark fs-14 fw-medium"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="small-header d-flex align-items-center justify-content-between d-xl-none">
        <div class="logo">
            <a href="#" class="d-flex align-items-center gap-3 flex-shrink-0">
                <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
            </a>
        </div>
        <div>
            <button type="button" class="kleon-header-expand-toggle"><span class="fs-24"><i class="bi bi-three-dots-vertical"></i></button>
            <button type="button" class="kleon-mobile-menu-opener"><span class="close"><i class="bi bi-arrow-left"></i></span> <span class="open"><i class="bi bi-list"></i></span></button>
        </div>
    </div>

    <div class="header-mobile-option">
        <div class="header-inner">
            <div class="d-flex align-items-center justify-content-end flex-shrink-0">
                <ul class="nav-elements d-flex align-items-center list-unstyled m-0 p-0">
                    <li class="nav-item nav-author px-3">
                        <a href="#" class="nav-toggler" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/') }}admin/assets/img/user_placeholder.jpg" alt="img" width="40" class="rounded-2">
                            <div class="nav-toggler-content">
                                <h6 class="mb-0">{{ @Auth::user()->name }}</h6>
                                <div class="ff-heading fs-14 fw-normal text-gray">
                                    Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-widget dropdown-menu p-0 admin-card">
                            <div class="dropdown-wrapper">
                                <div class="card mb-0">
                                    <div class="card-header p-3 text-center">

                                        <img src="{{ asset('/') }}admin/assets/img/user_placeholder.jpg" alt="img" width="60" class="rounded-2">

                                        <div class="mt-2">
                                            <h6 class="mb-0 lh-18">{{ @Auth::user()->name }}</h6>
                                            <div class="fs-14 fw-normal text-gray">
                                                Admin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>
                                                <a href="{{ route('user.profile') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-person me-2"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{route('settings') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-gear me-2"></i> Setting & Privacy</a>
                                            </li>
                                        </ul>

                                    </div>
                                    <div class="card-footer p-3">
                                        <a href="{{ route('logout') }}l" class="btn btn-outline-gray bg-transparent w-100 py-1 rounded-1 text-dark fs-14 fw-medium"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- Combo Nav -->
<header class="header kleon-combo-nav shadow">
    <div class="d-none d-xl-block">
        <div class="d-flex align-items-center justify-content-around justify-content-xl-between flex-wrap flex-xl-nowrap gap-3 gap-xl-5">

            <div class="d-flex align-items-center flex-shrink-0">
                <ul class="nav-elements d-flex align-items-center list-unstyled m-0 p-0">
                    <li class="nav-item nav-color-switch d-flex align-items-center gap-3">
                        <div class="sun"><img src="{{ asset('/') }}frontend/assets/img/sun.svg" alt="img"></div>
                        <div class="switch">
                            <input type="checkbox" id="colorSwitch3" value="false" name="defaultMode">
                            <div class="shutter">
                                <span class="lbl-off"></span>
                                <span class="lbl-on"></span>
                                <div class="slider bg-primary"></div>
                            </div>
                        </div>
                        <div class="moon"><img src="{{ asset('/') }}frontend/assets/img/moon.svg" alt="img"></div>
                    </li>


                    <li class="nav-item nav-author">
                        <a href="#" class="nav-toggler" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/') }}frontend/assets/img/nav_author.jpg" alt="img" width="54" class="rounded-2">
                            <div class="nav-toggler-content">
                                <h6 class="mb-0">{{ @Auth::user()->name }}</h6>
                                <div class="ff-heading fs-14 fw-normal text-gray">
                                    Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-widget dropdown-menu p-0 admin-card">
                            <div class="dropdown-wrapper">
                                <div class="card mb-0">
                                    <div class="card-header p-3 text-center">
                                        <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
                                        <div class="mt-2">
                                            <h6 class="mb-0 lh-18">{{ @Auth::user()->name }}</h6>
                                            <div class="fs-14 fw-normal text-gray">
                                                Admin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>
                                                <a href="{{ route('user.profile') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-person me-2"></i> Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{route('settings') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-gear me-2"></i> Setting & Privacy</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card-footer p-3">
                                        <a href="{{ route('logout') }}" class="btn btn-outline-gray bg-transparent w-100 py-1 rounded-1 text-dark fs-14 fw-medium"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="small-header d-flex align-items-center justify-content-between d-xl-none">
        <div class="logo">
            <a href="#" class="d-flex align-items-center gap-3 flex-shrink-0">
                <img src="{{ asset('admin/assets/img').'/logo.png' }}" width="100" height="100">
            </a>
        </div>
        <div>
            <button type="button" class="kleon-header-expand-toggle"><span class="fs-24"><i class="bi bi-three-dots-vertical"></i></button>
            <button type="button" class="kleon-mobile-menu-opener"><span class="close"><i class="bi bi-arrow-left"></i></span> <span class="open"><i class="bi bi-list"></i></span></button>
        </div>
    </div>

    <div class="header-mobile-option">
        <div class="header-inner">
            <div class="d-flex align-items-center justify-content-end flex-shrink-0">
                <ul class="nav-elements d-flex align-items-center list-unstyled m-0 p-0">
                    <li class="nav-item nav-author px-3">
                        <a href="#" class="nav-toggler" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="{{ asset('/') }}frontend/assets/img/user_placeholder.jpg" alt="img" width="40" class="rounded-2">

                            <div class="nav-toggler-content">
                                <h6 class="mb-0">{{ @Auth::user()->name }}</h6>
                                <div class="ff-heading fs-14 fw-normal text-gray">
                                    Admin
                                </div>
                            </div>
                        </a>
                        <div class="dropdown-widget dropdown-menu p-0 admin-card">
                            <div class="dropdown-wrapper">
                                <div class="card mb-0">
                                    <div class="card-header p-3 text-center">
                                        <img src="{{ asset('/') }}admin/assets/img/nav_author.jpg" alt="img" width="60" class="rounded-circle avatar">
                                        <div class="mt-2">
                                            <h6 class="mb-0 lh-18">{{ @Auth::user()->name }}</h6>
                                            <div class="fs-14 fw-normal text-gray">
                                                Admin
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body p-3">
                                        <ul class="list-unstyled p-0 m-0">
                                            <li>
                                                <a href="{{ route('user.profile') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-person me-2"></i> Profile</a>
                                            </li>
                                                <li>
                                                    <a href="{{route('settings') }}" class="fs-14 fw-normal text-dark d-block p-1"><i class="bi bi-gear me-2"></i> Setting & Privacy</a>
                                                </li>
                                        </ul>

                                    </div>
                                    <div class="card-footer p-3">
                                        <a href="{{ route('logout') }}" class="btn btn-outline-gray bg-transparent w-100 py-1 rounded-1 text-dark fs-14 fw-medium"><i class="bi bi-box-arrow-right"></i> Logout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</header>
