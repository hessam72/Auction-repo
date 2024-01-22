@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">ایجاد حراجی جدید
        </h4>

        <!-- Create Deal Wizard -->

        @include('components.admin.flash_messages')
        <div class="container-xxl flex-grow-1 container-p-y">
            {{-- <h4 class="py-3 breadcrumb-wrapper mb-4">
                <span class="text-muted fw-light">تعریف حراجی جدید
               
            </h4> --}}
            <!-- Default -->
            <div class="row">
                <div class="col-12">
                    {{-- <h5 class="secondary-font"></h5> --}}
                </div>

                <!-- Default Wizard -->
                <div class="col-12 mb-4">
                    <small class="text-light fw-semibold lh-2"></small>
                    <div class="bs-stepper wizard-numbered mt-2">
                        <div class="bs-stepper-header">
                            <div class="step" data-target="#account-details">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle">1</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">انتخاب محصول </span>
                                        <span class="bs-stepper-subtitle">محصول حراجی را انتخاب کنید</span>
                                    </span>
                                </button>
                            </div>
                            <div class="line"></div>
                            <div class="step" data-target="#personal-info">
                                <button type="button" class="step-trigger">
                                    <span class="bs-stepper-circle">2</span>
                                    <span class="bs-stepper-label">
                                        <span class="bs-stepper-title">اطلاعات حراجی</span>
                                        <span class="bs-stepper-subtitle">لطفا اطلاعات درخواستی را وارد کنید</span>
                                    </span>
                                </button>
                            </div>

                        </div>
                        <div class="bs-stepper-content">
                            <form method="POST" action="{{ route('admin.auctions.store') }}">
                                @csrf
                                <!-- Account Details -->
                                <div id="account-details" class="content">
                                    <div class="content-header mb-3">
                                        <h6 class="mb-1">انتخاب محصول</h6>
                                        <small>انتخاب محصول حراجی</small>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="username">محصول مورد نظر خود را از لیست زیر
                                                انتخاب کنید</label>

                                            <select class="select2 form-control" id="choose_product_dropdown"
                                                name="product_id">
                                                <option disabled value="">محصول مد نظر خود را از باکس زیر انتخاب کنید
                                                </option>
                                                @foreach ($products as $product)
                                                    <option value="{{ $product->id }}">
                                                       نام:     {{ $product->title }} &nbsp; | &nbsp; دسته بندی: {{$product->category->title}}</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" id="username" class="form-control text-start"
                            
                            placeholder="johndoe" dir="ltr"> --}}



                                        </div>


                                        <div class="col-12 d-flex justify-content-between">
                                            <button type="button" class="btn btn-label-secondary btn-prev" disabled>
                                                <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="d-sm-inline-block d-none">قبلی</span>
                                            </button>
                                            <button type="button" class="btn btn-primary btn-next">
                                                <span class="d-sm-inline-block d-none">بعدی</span>
                                                <i class="bx bx-chevron-right bx-sm me-sm-n2"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <!-- Personal Info -->
                                <div id="personal-info" class="content">
                                    <div class="content-header mb-3">
                                        <h6 class="mb-1">اطلاعات حراجی</h6>
                                        <small>سایر اطلاعات را وارد کنید.</small>
                                    </div>
                                    <div class="row g-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="first-name">No Jumper Limit</label>
                                            <input name="no_jumper_limit" type="number" id="first-name"
                                                class="form-control"
                                                placeholder="قیمتی که پس از آن کاربر جدید اجازه ورود به حراجی را ندارد"
                                                required>

                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="last-name">حداقل قیمت حراجی</label>
                                            <input type="number" name="min_price" id="last-name" class="form-control"
                                                placeholder="حداثل قیمتی که امکان پایان حراجی وجود دارد" required>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="country">تاریخ و ساعت شروع حراجی</label>
                                            <input type="text" class="form-control" id="datePickerTime" name="start_time"
                                                placeholder="تاریخ شروع حراجی" required>
                                        </div>

                                        <div class="col-12 d-flex justify-content-between">
                                            <button type="button" class="btn btn-primary btn-prev">
                                                <i class="bx bx-chevron-left bx-sm ms-sm-n2"></i>
                                                <span class="d-sm-inline-block d-none">قبلی</span>
                                            </button>

                                            <button type="submit" class="btn btn-success btn-submit">ثبت</button>
                                        </div>
                                    </div>
                                </div>
                                <div id="social-links" class="content">


                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <!-- /Default Wizard -->


            </div>

        </div>
        <!-- /Create Deal Wizard -->


    </div>
@endsection
