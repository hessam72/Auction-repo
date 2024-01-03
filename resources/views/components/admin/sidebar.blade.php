<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
           
            <span class="app-brand-text demo menu-text fw-bold ms-2">پنل مدیریت</span>
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

        <li class="menu-item add-margin-btn">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboards">داشبورد</div>
            </a>
        </li>



        <li class="menu-item add-margin-btn">
            <a href="{{route('admin.categories.index')}}" class="menu-link ">
                <ion-icon class="menu-icon tf-icons" name="server-outline"></ion-icon>
                <div >دسته بندی ها</div>
            </a>
          
        </li>

        {{-- <li class="menu-item add-margin-btn">
            <a href="" class="menu-link ">
                <ion-icon class="menu-icon tf-icons" name="locate-outline"></ion-icon>
                <div >استان ها</div>
            </a>
          
        </li> --}}



        <li class="menu-item add-margin-btn">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <ion-icon class="menu-icon tf-icons" name="compass-outline"></ion-icon>
                <div >شهر و استان</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('admin.states.index')}}" class="menu-link">
                        <div >مدیریت استان</div>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="{{route('admin.cities.index')}}" class="menu-link">
                        <div >مدیریت شهر</div>
                    </a>
                </li>
               
            </ul>
        </li>



        <li class="menu-item add-margin-btn">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <ion-icon class="menu-icon tf-icons" name="gift-outline"></ion-icon>
                <div >جوایز</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="app-user-list.html" class="menu-link">
                        <div >ایجاد</div>
                    </a>
                </li>
                
                <li class="menu-item">
                    <a href="app-user-list.html" class="menu-link">
                        <div >مدیریت</div>
                    </a>
                </li>
               
            </ul>
        </li>

        




      

      
       
       
        <!-- Misc -->
       
    </ul>
</aside>
