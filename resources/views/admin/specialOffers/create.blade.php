@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">ایجاد پیشنهاد شگفت انگیز جدید
        </h4>

        <!-- Create Deal Wizard -->
        <div id="wizard-create-deal" class="bs-stepper vertical mt-2">
            <div class="bs-stepper-header">
                <div class="step" data-target="#deal-type">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">
                            <i class="bx bx-purchase-tag"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">نوع پیشنهاد</span>
                            <span class="bs-stepper-subtitle">نوع پیشنهاد را انتخاب کنید</span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#deal-details">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">
                            <i class="bx bx-detail"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">انتخاب آیتم</span>
                            <span class="bs-stepper-subtitle">آیتم مورد نظر را انتخاب کنید</span>
                        </span>
                    </button>
                </div>
                <div class="line"></div>
                <div class="step" data-target="#deal-usage">
                    <button type="button" class="step-trigger">
                        <span class="bs-stepper-circle">
                            <i class="bx bx-rocket"></i>
                        </span>
                        <span class="bs-stepper-label">
                            <span class="bs-stepper-title">جزئیات</span>
                            <span class="bs-stepper-subtitle">جزئیات پیشنهاد را وارد کنید</span>
                        </span>
                    </button>
                </div>

            </div>
            <div class="bs-stepper-content">
                <form id="wizard-create-deal-form"   method="POST"
                action="{{ route('admin.specialOffers.store') }}" enctype="multipart/form-data">
                @csrf
                    <!-- Deal Type -->
                    <div id="deal-type" class="content">
                        <div class="row g-3">

                            <div class="col-12">
                                <div class="row">
                                    <div class="col-md mb-md-0 mb-2">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content"
                                                for="customRadioPercentage">
                                                <span class="custom-option-body">
                                                    <i class="bx bx-purchase-tag"></i>
                                                    <span class="custom-option-title my-2">پکیج بید</span>
                                                    <small class="d-block lh-2">معامله ای ایجاد کنید که در آن پیشنهاد، از
                                                        مقداری % تخفیف (برای مثال 5 درصد تخفیف) در کل استفاده می
                                                        کند.</small>
                                                </span>
                                                <input name="type" class="form-check-input" type="radio" value="1"
                                                    id="bid_package_select" checked>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md mb-md-0 mb-2">
                                        <div class="form-check custom-option custom-option-icon">
                                            <label class="form-check-label custom-option-content" for="customRadioFlat">
                                                <span class="custom-option-body">
                                                    <i class="bx bx-dollar"></i>
                                                    <span class="custom-option-title my-2"> محصولات سایت</span>
                                                    <small class="d-block lh-2">معامله ای ایجاد کنید که در آن پیشنهاد، از
                                                        تخفیف یکسان (برای مثال 50 هزار تومان تخفیف) در کل استفاده می
                                                        کند.</small>
                                                </span>
                                                <input name="type" class="form-check-input" type="radio" value="2"
                                                    id="product_select">
                                            </label>
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-label-secondary btn-prev" disabled>
                                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                    <span class="d-sm-inline-block d-none">قبلی</span>
                                </button>
                                <button type="button" id="form_wizard_select_item_btn" class="btn btn-primary btn-next">
                                    <span class="d-sm-inline-block d-none me-sm-1">بعدی</span>
                                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Deal Details -->
                    <div id="deal-details" class="content">
                        <div class="row g-3">


                            <div class="col-md-12">
                               
                                <div class="row product_selection_drop">
                                    <div class="col-12 mb-3">
                                        <label class="form-label" for="dealOfferedItem">محصول مد نظر خود را از باکس زیر انتخاب کنید</label>
                                        <select class="select2" id="select_product_dropdown" name="product_item_id"
                                            >
                                            <option disabled value="">محصول مد نظر خود را از باکس زیر انتخاب کنید
                                            </option>
                                            @foreach ($products as $product)
                                                <option value="{{$product->id}}">{{ $product->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <div class="row bidPackage_selection_drop">
                                    <div class="col-12 mb-3">
                                        <label class="form-label" for="dealOfferedItem">پکیج مد نظر خود را از باکس زیر انتخاب کنید</label>
                                        <select class="select2" id="select_bidPackage_dropdown" name="bid_item_id" >
                                            <option disabled value="">پکیج مد نظر خود را از باکس زیر انتخاب کنید
                                            </option>
                                            @foreach ($bidPakcages as $bidPackage)
                                                <option value="{{$bidPackage->id}}">پکیج {{$bidPackage->bid_amount}} تایی</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                         

                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                    <span class="d-sm-inline-block d-none">قبلی</span>
                                </button>
                                <button type="button" class="btn btn-primary btn-next">
                                    <span class="d-sm-inline-block d-none me-sm-1">بعدی</span>
                                    <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Deal Usage -->
                    <div id="deal-usage" class="content">
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="modalEditUserName">
                                    توضیحات اجمالی</label>
                                <input type="text" id="modalEditUserName" name="description"
                                  
                                    class="form-control text-start" placeholder="توضیحات کوتاه"
                                    dir="ltr">
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="modalEditUserStatus">
                                    تخفیف آیتم (%)</label>
                                <select id="modalEditUserStatus" name="discount_amount"
                                    class="form-select" aria-label="Default select example">
                                    

                                    <option value="0" selected>0%</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="15">15%</option>
                                    <option value="20">20%</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="eventStartDate">تاریخ انقضا</label>
                                <input type="text"
                                   
                                    class="form-control" id="datePicker" name="expiration_date"
                                    placeholder="تاریخ انقضا">
                            </div> 
                            
                            <div class="col-sm-6">
                                <label class="form-label" for="eventStartDate">بارگزاری تصویر</label>
                                <div class="input-group">
                                    <label class="input-group-text" for="inputGroupFile01">آپلود</label>
                                    <input name="banner" type="file" class="form-control" id="inputGroupFile01">
                                  </div>
                            </div>
                           
                            <div class="col-lg-12">
                                <label class="form-label" for="modalEditUserStatus">
                                    فعال / غیرفعال کردن آیتم</label>
                                <label class="switch">

    
                                        {{-- currently active --}}
                                        <input type="checkbox" name="status"
                                            class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on">
                                                <i class="bx bx-check"></i>
                                            </span>
                                            <span class="switch-off">
                                                <i class="bx bx-x"></i>
                                            </span>
                                        </span>
                                

                                    <span class="switch-label"></span>
                                </label>
                            </div>
                            <div class="col-12 d-flex justify-content-between">
                                <button type="button" class="btn btn-primary btn-prev">
                                    <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                    <span class="d-sm-inline-block d-none">قبلی</span>
                                </button>
                                <button type="submit" id="submit_sp_wizard_form" class="btn btn-success btn-submit btn-next">
                                    <span class="d-sm-inline-block d-none me-sm-1">ثبت</span>
                                    {{-- <i class="bx bx-chevron-right bx-sm me-sm-n2"></i> --}}
                                </button>
                            </div>
                        </div>
                    </div>
                    <!-- Review & Complete -->
                   
                </form>
            </div>
        </div>
        <!-- /Create Deal Wizard -->
    </div>
@endsection
