@extends('admin.app')
@section('content')

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">فرم‌ها /</span> طرح‌های افقی
        </h4>


        {{-- gallery modal --}}
        <div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title secondary-font" id="modalCenterTitle">گالری محصول</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="">
                            {{-- <h6 class="text-muted mt-3">با فلش‌ها</h6> --}}
                            <div class="swiper" id="swiper-with-arrows">
                                <div class="swiper-wrapper">
                                    @foreach ($product->product_galleries as $img)
                                        <div class="swiper-slide"
                                            style="background-image: url({{ asset('storage/' . $img->image) }})">

                                        </div>
                                    @endforeach

                                </div>
                                <div class="swiper-button-next swiper-button-white custom-icon"></div>
                                <div class="swiper-button-prev swiper-button-white custom-icon"></div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                            بستن
                        </button>

                    </div>
                </div>
            </div>
        </div>





        <!-- Basic Layout & Basic with Icons -->
        <div class="row">
            <!-- Basic Layout -->

            <!-- Basic with Icons -->
            <div class="col-xxl">
                <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="mb-0">پایه با آیکن</h5>
                        <small class="text-muted float-end primary-font">گروه ورودی ادغام شده</small>
                        @if (\Session::has('success'))
                            <div style="position: absolute;
                    right: 10rem;
                    height: 4rem;"
                                class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>

                    <div class="card-body">

                        <form id="editProductForm" class="row g-3 form-repeater" method="POST"
                            enctype="multipart/form-data"
                            action="{{ route('admin.products.update', ['product' => $product->id]) }}">
                            @method('patch')
                            @csrf
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">نام
                                    محصول</label>
                                <input type="text" id="modalEditUserFirstName" name="title"
                                    value="{{ $product->title }}" class="form-control" placeholder="جان">


                                <input type="text" id="product_id" name="product_id" value="{{ $product->id }}" hidden>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">دسته
                                    بندی</label>
                                <select id="modalEditUserStatus" name="category_id" class="form-select"
                                    aria-label="Default select example">
                                    <option value="{{ $product->category->id }}" selected>
                                        {{ $product->category->title }}</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->title }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="modalEditUserName">
                                    توضیحات اجمالی</label>
                                <input type="text" id="modalEditUserName" name="short_desc"
                                    class="form-control text-start" placeholder="توضیحات کوتاه"
                                    value="{{ $product->short_desc }}" dir="ltr">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">
                                    تخفیف محصول (%)</label>
                                <select id="modalEditUserStatus" name="discount" class="form-select"
                                    aria-label="Default select example">
                                    <option value="{{ $product->discount }}" selected>
                                        {{ $product->discount }}%</option>


                                    <option value="0">0%</option>
                                    <option value="5">5%</option>
                                    <option value="10">10%</option>
                                    <option value="15">15%</option>
                                    <option value="20">20%</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditTaxID">
                                    قیمت محصول</label>
                                <input type="number" id="modalEditTaxID" name="price" value="{{ $product->price }}"
                                    class="form-control modal-edit-tax-id" placeholder="$$">
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditTaxID">
                                    موجودی محصول</label>
                                <input type="number" id="modalEditTaxID" name="inventory"
                                    value="{{ $product->product_inventory }}" class="form-control modal-edit-tax-id"
                                    placeholder="...">
                            </div>



                            {{-- show old product images --}}

                            <div style="display: flex;
                            justify-content: space-between;
                            align-items: baseline;"
                                class="col-12">
                                <p>در صورت آپلود، تصاویر جدید جایگزین تصاویر قبلی محصول خواهند شد</p>

                                @if (count($product->product_galleries) > 0)
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#modalCenter">
                                        مشاهده تصاویر فعلی محصول
                                    </button>
                                @else
                                <p>محصول فعلی فاقد تصویر میباشد</p>
                                @endif

                            </div>

                            {{-- multi image uploader --}}
                            <div class="col-12 ">

                                {{-- <span >در صورت نیاز، تصاویر جدید محصول را آپلود کنید</span> --}}
                                <div data-repeater-list="product_imgs">
                                    <div data-repeater-item>

                                        <div class="input-group">
                                            <label class="input-group-text" for="form-repeater-1-1">تصویر محصول</label>
                                            <input name="file" type="file" class="form-control"
                                                id="form-repeater-1-1">
                                        </div>


                                        <div class="mb-3 col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                            <button type="button" class="btn btn-label-danger mt-4" data-repeater-delete>
                                                <i class="bx bx-x me-1"></i>
                                                <span class="align-middle">حذف</span>
                                            </button>
                                        </div>
                                    </div>
                                    <hr>

                                </div>
                                <div class="mb-0">
                                    <button type="button" class="btn btn-primary" data-repeater-create>
                                        <i class="bx bx-plus me-1"></i>
                                        <span class="align-middle">افزودن</span>
                                    </button>
                                </div>

                            </div>



                            <div class="col-12">

                                <div class="card">
                                    <h5 class="card-header heading-color">ویرایشگر کامل
                                    </h5>
                                    <div class="card-body">
                                        <div id="update-product-form">


                                            {{-- {!! $product->description !!} --}}


                                        </div>
                                    </div>

                                </div>
                                {{-- *** --}}

                                {{-- <input type="text" id="desc_content" name="desc_content" /> --}}

                                {{-- *** --}}


                                <div class="col-12 text-center mt-4">



                                    <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                        aria-label="Close">
                                        انصراف
                                    </button>
                                    &nbsp;
                                    &nbsp;
                                    <button id="update-product" type="button" class="btn btn-primary">
                                        <span id="loading_label" class="hide"> <i class="fa fa-spinner fa-spin"></i>
                                            &nbsp; در حال پردازش </span>
                                        <span id="main_label" class=""> ثبت </span>
                                    </button>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>








    @endsection
