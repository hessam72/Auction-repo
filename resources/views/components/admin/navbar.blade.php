<?php $user=Auth::user();  ?>
<nav class="layout-navbar navbar navbar-expand-xl align-items-center bg-navbar-theme" id="layout-navbar">
    <div class="container-fluid">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                <i class="bx bx-menu bx-sm"></i>
            </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
            <!-- Search -->
            <div class="navbar-nav align-items-center">
                <div class="nav-item navbar-search-wrapper mb-0">
                    
                    <a class="nav-item nav-link search-toggler px-0" href="javascript:void(0);">
                        <i class="bx bx-search-alt bx-sm"></i>
                        <span class="d-none d-md-inline-block text-muted">جستجو <span class="d-inline-block"
                                dir="ltr">(Ctrl+/)</span></span>
                    </a>
                </div>
            </div>
            <!-- /Search -->

            <ul class="navbar-nav flex-row align-items-center ms-auto">
                <!-- Language -->
                <li class="nav-item dropdown-language dropdown me-2 me-xl-0">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="fi fi-ir fis rounded-circle fs-3 me-1"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="fa">
                                <i class="fi fi-ir fis rounded-circle fs-4 me-1"></i>
                                <span class="align-middle">فارسی</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="javascript:void(0);" data-language="en">
                                <i class="fi fi-us fis rounded-circle fs-4 me-1"></i>
                                <span class="align-middle">انگلیسی</span>
                            </a>
                        </li>

                    </ul>
                </li>
                <!--/ Language -->

                <!-- Style Switcher -->
                <li class="nav-item me-2 me-xl-0">
                    <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                        <i class="bx bx-sm"></i>
                    </a>
                </li>
                <!--/ Style Switcher -->

                <!-- Quick links  -->
               
                <!-- Quick links -->

                <!-- Notification -->
                
                <!--/ Notification -->

                <!-- User -->
                <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                        data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <img src="{{ asset('storage/' . $user->profile_pic) }}" alt class="rounded-circle">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item" href="{{route('admin.info')}}">
                                <div class="d-flex align-items-center">
                                    <div class="flex-shrink-0 me-3">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('storage/' . $user->profile_pic) }}" alt class="rounded-circle">
                                        </div>
                                    </div>
                                    <div class="flex-grow-1">
                                        <span class="fw-semibold d-block">{{$user->username}}</span>
                                        <small>مدیر سیستم</small>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('admin.info')}}">
                                <i class="bx bx-user me-2"></i>
                                <span class="align-middle">پروفایل من</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{route('admin.edit-password')}}">
                                <i class="bx bx-cog me-2"></i>
                                <span class="align-middle">امنیت</span>
                            </a>
                        </li>
                       
                        <li>
                            <div class="dropdown-divider"></div>
                        </li>
                        
                        
                        <li>
                            <form style="display: flex;
                            align-items: center;"
                                class="dropdown-item" method="POST" action="{{ route('logout') }}">
                                @csrf
                                <i class="bx bx-power-off me-2"></i>
                                <button type="submit" class="dropdown-item">
                                    <span class="align-middle">خروج</span>
                                </button>
                            </form>

                        </li>
                    </ul>
                </li>
                <!--/ User -->
            </ul>
        </div>

        <!-- Search Small Screens -->
        <div class="navbar-search-wrapper search-input-wrapper d-none">
            <input type="text" class="form-control search-input container-fluid border-0" placeholder="جستجو ..."
                aria-label="Search...">
            <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
        </div>
    </div>
</nav>
