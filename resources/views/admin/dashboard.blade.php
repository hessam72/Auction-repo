@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

           {{--  for reading from js --}}
           <input id="chart_value_monthly_income" style="display: none;" type="text" 
           readonly value="{{$past_year_monthly_income}}" /> 
           <input id="chart_value_monthly_singups" style="display: none;" type="text" 
           readonly value="{{$past_year_monthly_singups}}" />
        <input id="chart_value_monthly_auctions" style="display: none;" type="text" 
        readonly value="{{$past_year_monthly_auctions}}" />

<input id="chart_value_monthly_products" style="display: none;" type="text" 
        readonly value="{{$past_year_monthly_products}}" />

<input id="chart_value_monthly_products_sales" style="display: none;" type="text" 
        readonly value="{{$past_year_monthly_packages_salses}}" />

<input id="chart_value_monthly_packages_sales" style="display: none;" type="text" 
        readonly value="{{$past_year_monthly_products_salses}}" />

        <div class="row">
            <!-- Website Analytics-->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">آمار کل</h5>
                        {{-- <div class="dropdown primary-font">
                            <button class="btn p-0" type="button" id="analyticsOptions" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="analyticsOptions">
                                <a class="dropdown-item" href="javascript:void(0);">انتخاب همه</a>
                                <a class="dropdown-item" href="javascript:void(0);">تازه سازی</a>
                                <a class="dropdown-item" href="javascript:void(0);">اشتراک گذاری</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body pb-2">
                        <div class="d-flex justify-content-around align-items-center flex-wrap mb-4">
                            <div class="user-analytics text-center me-2">
                                <i class="bx bx-user me-1"></i>
                                <span>کاربران</span>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="chart-report" data-color="success" data-series="35"></div>
                                    <h3 class="mb-0">{{$total_users}}</h3>
                                </div>
                            </div>
                            <div class="sessions-analytics text-center me-2">
                                <i class="bx bx-pie-chart-alt me-1"></i>
                                <span>حراجی ها</span>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="chart-report" data-color="warning" data-series="76"></div>
                                    <h3 class="mb-0">{{$all_auctions}}</h3>
                                </div>
                            </div>
                            <div class="bounce-rate-analytics text-center">
                                <i class="bx bx-trending-up me-1"></i>
                                <span>محصولات</span>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="chart-report" data-color="danger" data-series="65"></div>
                                    <h3 class="mb-0">{{$all_products}}</h3>
                                </div>
                            </div>
                        </div>
                        {{--  for reading from js --}}
                        <input id="chart_value_monthly_income" style="display: none;" type="text" 
                        readonly value="{{$past_year_monthly_income}}" /> 
                        <input id="chart_value_monthly_singups" style="display: none;" type="text" 
                        readonly value="{{$past_year_monthly_singups}}" />

 





                        <div id="analyticsBarChart"></div>
                    </div>
                </div>
            </div> 
             <div class="col-lg-6 col-md-12 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">درآمد کل</h5>
                        {{-- <div class="dropdown primary-font">
                            <button class="btn p-0" type="button" id="analyticsOptions" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="analyticsOptions">
                                <a class="dropdown-item" href="javascript:void(0);">انتخاب همه</a>
                                <a class="dropdown-item" href="javascript:void(0);">تازه سازی</a>
                                <a class="dropdown-item" href="javascript:void(0);">اشتراک گذاری</a>
                            </div>
                        </div> --}}
                    </div>
                    <div class="card-body pb-2">
                        <div class="d-flex justify-content-around align-items-center flex-wrap mb-4">
                            <div class="user-analytics text-center me-2">
                                <i class="bx bx-user me-1"></i>
                                <span>فروش بید</span>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="chart-report" data-color="success" data-series="35"></div>
                                    <h3 class="mb-0">{{$packages_total_sales}} دلار</h3>
                                </div>
                            </div>
                            <div class="sessions-analytics text-center me-2">
                                <i class="bx bx-pie-chart-alt me-1"></i>
                                <span>فروش محصول</span>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="chart-report" data-color="warning" data-series="76"></div>
                                    <h3 class="mb-0">{{$products_total_sales}} دلار</h3>
                                </div>
                            </div>
                            <div class="bounce-rate-analytics text-center">
                                <i class="bx bx-trending-up me-1"></i>
                                <span>درآمد کل</span>
                                <div class="d-flex align-items-center mt-2">
                                    <div class="chart-report" data-color="danger" data-series="65"></div>
                                    <h3 class="mb-0">{{$total_income}} دلار</h3>
                                </div>
                            </div>
                        </div>
                     

 





                        <div id="analyticsBarChart_2"></div>
                    </div>
                </div>
            </div>

            <!-- Referral, conversion, impression & income charts -->
            <div class="col-lg-6 col-md-12">
                <div class="row">
                    <!-- Referral Chart-->
                    <div class="col-sm-6 col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <h2 class="mb-1">32,690</h2>
                                <span class="text-muted">ارجاع 40%</span>
                                <div id="referralLineChart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Conversion Chart-->
                    <div class="col-sm-6 col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header d-flex justify-content-between pb-3">
                                <div class="conversion-title">
                                    <h5 class="card-title mb-1">درآمد کل</h5>
                                    {{-- <p class="mb-0 text-muted primary-font">
                                        60%
                                        <i class="bx bx-chevron-up text-success"></i>
                                    </p> --}}
                                </div>
                                <h2 class="mb-0 primary-font"> {{$total_income}} دلار</h2>
                            </div>
                            <div class="card-body">
                                <div id="conversionBarchart"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Impression Radial Chart-->
                    <div class="col-sm-6 col-12 mb-4">
                        <div class="card h-100">
                            <div class="card-body text-center">
                                <div id="impressionDonutChart" class="mt-2"></div>
                            </div>
                        </div>
                    </div>
                    <!-- Growth Chart-->
                    <div class="col-sm-6 col-12">
                        <div class="row">
                            <div class="col-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial bg-label-primary rounded-circle"><i
                                                            class="bx bx-user fs-4"></i></span>
                                                </div>
                                                <div class="card-info">
                                                    <h5 class="card-title mb-0 me-2 primary-font">38,566</h5>
                                                    <small class="text-muted">تبدیل</small>
                                                </div>
                                            </div>
                                            <div id="conversationChart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mb-4">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-between">
                                            <div class="d-flex align-items-center gap-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial bg-label-warning rounded-circle"><i
                                                            class="bx bx-dollar fs-4"></i></span>
                                                </div>
                                                <div class="card-info">
                                                    <h5 class="card-title mb-0 me-2 primary-font">53,659</h5>
                                                    <small class="text-muted">درآمد</small>
                                                </div>
                                            </div>
                                            <div id="incomeChart"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Referral, conversion, impression & income charts -->

            <!-- Activity -->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-4">
                <div class="card h-100">
                    <div class="card-header">
                        <h5 class="card-title mb-0">فعالیت</h5>
                    </div>
                    <div class="card-body">
                        <ul class="p-0 m-0">
                            <li class="d-flex align-items-center mb-4 pb-2">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-primary"><i
                                            class="bx bx-cube"></i></span>
                                </div>
                                <div class="d-flex flex-column w-100">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>بید فروخته شده</span>
                                        <span class="text-muted">دلار {{$packages_total_sales}}</span>
                                    </div>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-primary" style="width: 100%" role="progressbar"
                                            aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4 pb-2">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-success"><i
                                            class="bx bx-dollar"></i></span>
                                </div>
                                <div class="d-flex flex-column w-100">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>محصول فروخته شده</span>
                                        <span class="text-muted">دلار {{$products_total_sales}}</span>
                                    </div>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-success" style="width: 100%" role="progressbar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-4 pb-2">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-warning"><i
                                            class="bx bx-trending-up"></i></span>
                                </div>
                                <div class="d-flex flex-column w-100">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>درآمد کل</span>
                                        <span class="text-muted">دلار {{$total_income}}</span>
                                    </div>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-warning" style="width: 100%" role="progressbar"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </li>
                            <li class="d-flex align-items-center mb-2">
                                <div class="avatar avatar-sm flex-shrink-0 me-3">
                                    <span class="avatar-initial rounded-circle bg-label-danger"><i
                                            class="bx bx-check"></i></span>
                                </div>
                                <div class="d-flex flex-column w-100">
                                    <div class="d-flex justify-content-between mb-2">
                                        <span>حراجی های برگزار شده</span>
                                        <span class="text-muted">{{$all_auctions}}</span>
                                    </div>
                                    <div class="progress" style="height: 6px">
                                        <div class="progress-bar bg-danger" style="width: 100%" role="progressbar"
                                            aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!--/ Activity -->

            <!-- Profit Report & Registration -->
            <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header">
                                <h5 class="card-title mb-2">گزارش سود</h5>
                            </div>
                            <div class="card-body d-flex align-items-end justify-content-between">
                                <div class="d-flex justify-content-between align-items-center gap-3 w-100 mb-1">
                                    <div class="d-flex align-content-center">
                                        <div class="chart-report mt-n1" data-color="danger" data-series="25"></div>
                                        <div class="chart-info">
                                            <h5 class="mb-1 lh-inherit">{{$last_month_income}} دلار</h5>
                                            <small class="text-muted">این ماه</small>
                                        </div>
                                    </div>
                                    <div class="d-flex align-content-center">
                                        <div class="chart-report mt-n1" data-color="info" data-series="50"></div>
                                        <div class="chart-info">
                                            <h5 class="mb-1 lh-inherit">{{$total_income}} دلار</h5>
                                            <small class="text-muted">کل</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-12 mb-4">
                        <div class="card h-100">
                            <div class="card-header pb-2">
                                <h5 class="card-title mb-0">ثبت نام جدید یک ماه اخیر</h5>
                            </div>
                            <div class="card-body pb-2">
                                <div class="d-flex justify-content-between align-items-end gap-3">
                                    <div class="mb-3">
                                        <div class="d-flex align-content-center align-items-center">
                                            <h5 class="mb-0">  {{$new_singups}} نفر</h5>
                                            <i class="bx bx-chevron-up text-success"></i>
                                        </div>
                                        {{-- <small class="text-success">12.8%</small> --}}
                                    </div>
                                    <div id="registrationsBarChart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Profit Report & Registration -->

            <!-- Sales -->
            {{-- <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-4">
                <div class="card h-100">
                    <div class="card-header d-flex align-items-start justify-content-between">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2 mb-1">فروش‌ها</h5>
                            <small class="card-subtitle text-muted">محاسبه شده در 7 روز اخیر</small>
                        </div>
                        <div class="dropdown primary-font">
                            <button class="btn p-0" type="button" id="salesReport" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="bx bx-dots-vertical-rounded"></i>
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="salesReport">
                                <a class="dropdown-item" href="javascript:void(0);">انتخاب همه</a>
                                <a class="dropdown-item" href="javascript:void(0);">تازه سازی</a>
                                <a class="dropdown-item" href="javascript:void(0);">اشتراک گذاری</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="salesChart" class="mt-2"></div>
                        <ul class="p-0 m-0">
                            <li class="d-flex mb-3">
                                <span class="text-primary me-2 pt-1"><i class="bx bx-up-arrow-alt bx-sm"></i></span>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">بیشترین فروش</h6>
                                        <small class="text-muted mt-1 mt-sm-0 mb-1 mb-sm-0">شنبه</small>
                                    </div>
                                    <div class="item-progress">28.6k</div>
                                </div>
                            </li>
                            <li class="d-flex">
                                <span class="text-secondary me-2 pt-1"><i class="bx bx-down-arrow-alt bx-sm"></i></span>
                                <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                    <div class="me-2">
                                        <h6 class="mb-0">کمترین فروش</h6>
                                        <small class="text-muted mt-1 mt-sm-0 mb-1 mb-sm-0">پنجشنبه</small>
                                    </div>
                                    <div class="item-progress">7.9k</div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div> --}}
            <!--/ Sales -->

            <!-- Growth Chart-->
            {{-- <div class="col-md-6 col-lg-6 col-xl-6 col-xxl-3 mb-4">
                <div class="card h-100">
                    <div class="card-body text-center">
                        <div class="dropdown mb-3 mt-2">
                            <button class="btn btn-sm btn-outline-secondary dropdown-toggle" type="button"
                                id="dropdownMenuButtonSec" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                1401
                            </button>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButtonSec">
                                <a class="dropdown-item" href="javascript:void(0);">1399</a>
                                <a class="dropdown-item" href="javascript:void(0);">1400</a>
                                <a class="dropdown-item" href="javascript:void(0);">1401</a>
                            </div>
                        </div>
                        <div id="growthRadialChart"></div>
                        <h6 class="mb-0">62% رشد در سال 1401</h6>
                    </div>
                </div>
            </div> --}}
            <!-- Growth Chart-->

          

          
        </div>
    </div>

@endsection