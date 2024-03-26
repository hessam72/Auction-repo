<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">

            <span data-i18n="AdminPanel" class="app-brand-text demo menu-text fw-bold ms-2">پنل مدیریت</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->





        <!-- Apps & Pages -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">لیست منوها</span></li>

        <li id="dashboard_menu" class="menu-item add-margin-btn">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                {{-- <i class="menu-icon tf-icons bx bx-home-circle"></i> --}}
                <i class="fa-solid menu-icon fa-house-flag"></i>
                <div data-i18n="Dashboards">داشبورد</div>
            </a>
        </li>
        <li id="auctions_menu"  class="menu-item add-margin-btn">
            <a href="{{ route('admin.auctions.index') }}" class="menu-link">
                {{-- <i class="menu-icon tf-icons bx bx-home-circle"></i> --}}
                <i class="menu-icon fa-brands fa-shopify"></i>
                <div>حراجی ها</div>
            </a>
        </li>



        <li id="categories_menu"  class="menu-item add-margin-btn">
            <a href="{{ route('admin.categories.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-layer-group"></i>
                <div data-i18n="Categories">دسته بندی ها</div>
            </a>

        </li>

        <li id="rewards_menu"  class="menu-item add-margin-btn">
            <a href="{{ route('admin.rewards.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-gifts"></i>
                <div data-i18n="Rewards">جایزه ها</div>
            </a>

        </li>
        <li  id="challenges_menu" class="menu-item add-margin-btn">
            <a href="{{ route('admin.challenges.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-puzzle-piece"></i>
                <div data-i18n="Challenges">چالش ها</div>
            </a>

        </li>
        <li id="products_menu"  class="menu-item add-margin-btn">
            <a href="{{ route('admin.products.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-weight-hanging"></i>
                <div data-i18n="Products">محصولات</div>
            </a>

        </li>

        <li  id="bidPackages_menu" class="menu-item add-margin-btn">
            <a href="{{ route('admin.bidPackages.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-circle-dollar-to-slot"></i>
                <div data-i18n="BidPackages">پکیج های بید</div>
            </a>

        </li>
        <li  id="specialOffers_menu" class="menu-item add-margin-btn">
            <a href="{{ route('admin.specialOffers.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-hand-holding-dollar"></i>
                <div>پیشنهاد شگفت انگیز</div>
            </a>

        </li>
        <li  id="redeemCodes_menu" class="menu-item add-margin-btn">
            <a href="{{ route('admin.redeemCodes.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-money-check-dollar"></i>
                <div>کدهای جایزه</div>
            </a>

        </li>
        <li  id="tickets_menu" class="menu-item add-margin-btn">
            <a href="{{ route('admin.tickets.index') }}" class="menu-link ">
                <i class="fa-solid menu-icon fa-headset"></i>
                <div>پشتیبانی</div>
            </a>

        </li>

        {{-- <li class="menu-item add-margin-btn">
            <a href="" class="menu-link ">
                <ion-icon class="menu-icon tf-icons" name="locate-outline"></ion-icon>
                <div >استان ها</div>
            </a>
          
        </li> --}}



        <li id="geo_menu" class="menu-item add-margin-btn">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="fa-solid menu-icon fa-map-location-dot"></i>
                <div data-i18n="States&Cities">شهر و استان</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('admin.states.index') }}" class="menu-link">
                        <div data-i18n="ManageStates">مدیریت استان</div>
                    </a>
                </li>

                <li class="menu-item">
                    <a href="{{ route('admin.cities.index') }}" class="menu-link">
                        <div data-i18n="ManageCities">مدیریت شهر</div>
                    </a>
                </li>

            </ul>
        </li>















        <!-- Misc -->

    </ul>
</aside>
