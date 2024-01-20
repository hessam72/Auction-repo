@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- statistics --}}
        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="secondary-font fw-medium">جلسه</span>
                                <div class="d-flex align-items-baseline mt-2">
                                    <h4 class="mb-0 me-2">21,459</h4>
                                    <small class="text-success">(+29%)</small>
                                </div>
                                <small>مجموع کاربران</small>
                            </div>
                            <span class="badge bg-label-primary rounded p-2">
                                <i class="bx bx-user bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="secondary-font fw-medium">کاربران ویژه</span>
                                <div class="d-flex align-items-baseline mt-2">
                                    <h4 class="mb-0 me-2">4,567</h4>
                                    <small class="text-success">(+18%)</small>
                                </div>
                                <small>تحلیل هفته اخیر </small>
                            </div>
                            <span class="badge bg-label-danger rounded p-2">
                                <i class="bx bx-user-plus bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="secondary-font fw-medium">کاربران فعال</span>
                                <div class="d-flex align-items-baseline mt-2">
                                    <h4 class="mb-0 me-2">19,860</h4>
                                    <small class="text-danger">(-14%)</small>
                                </div>
                                <small>تحلیل هفته اخیر</small>
                            </div>
                            <span class="badge bg-label-success rounded p-2">
                                <i class="bx bx-group bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between">
                            <div class="content-left">
                                <span class="secondary-font fw-medium">کاربران در انتظار</span>
                                <div class="d-flex align-items-baseline mt-2">
                                    <h4 class="mb-0 me-2">237</h4>
                                    <small class="text-success">(+42%)</small>
                                </div>
                                <small>تحلیل هفته اخیر</small>
                            </div>
                            <span class="badge bg-label-warning rounded p-2">
                                <i class="bx bx-user-voice bx-sm"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Users List Table -->







        <div class="modal fade" id="createmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4 mt-0 mt-md-n2">
                            <h3 class="secondary-font">افزودن محصول جدید</h3>

                        </div>

                        <form id="createMyProductForm" class="row g-3 form-repeater" method="POST"
                            action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                            @csrf

                           
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">نام
                                    محصول</label>
                                <input type="text" id="modalEditUserFirstName" name="title" class="form-control"
                                    placeholder="نام محصول" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">دسته
                                    بندی</label>
                                <select id="modalEditUserStatus" name="category_id" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected>
                                        دسته بندی محصول را انتخاب کنید</option>
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
                                    class="form-control text-start" placeholder="توضیحات کوتاه" dir="ltr">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">
                                    تخفیف محصول (%)</label>
                                <select id="modalEditUserStatus" name="discount" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>
                                        میزان تخفیف محصول را انتخاب کنید</option>


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
                                <input type="number" id="modalEditTaxID" name="price"
                                    class="form-control modal-edit-tax-id" placeholder="قیمت به دلار">
                            </div>
                          
                           

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditTaxID">
                                    موجودی محصول</label>
                                <input type="number" id="modalEditTaxID" name="inventory"
                                    class="form-control modal-edit-tax-id" placeholder="موجودی را وارد کنید">
                            </div>


                             {{-- multi image uploader --}}
                             <div class="col-12 ">
                                <div data-repeater-list="product_imgs">
                                    <div data-repeater-item>
                                        <div class="input-group">
                                            <label class="input-group-text" for="form-repeater-1-1">تصویر محصول</label>
                                            <input name="file" type="file" class="form-control" id="form-repeater-1-1">
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

{{-- full editor --}}
                            <div class="col-12">

                                <div class="card">
                                    <h5 class="card-header heading-color">ویرایشگر کامل</h5>
                                    <div class="card-body">
                                        <div id="create-product-form">
                                            <h6>ویرایشگر متن پرقدرت Quill</h6>
                                            <p>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           

                            {{-- temprary saving place for rich text --}}
                            <input type="text" id="temp_id" name="temp_id" value="" hidden>

                            <div class="col-12 text-center mt-4">

                                <button id="create-product" type="button" class="btn btn-primary">
                                    <span id="loading_label" class="hide"> <i class="fa fa-spinner fa-spin"></i> &nbsp;
                                        در حال پردازش </span>
                                    <span id="main_label" class=""> ثبت </span>
                                </button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                                    aria-label="Close">
                                    انصراف
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title">محصولات </h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0 primary-font">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>

                @include('components.admin.flash_messages')




                <button class="btn btn-secondary add-new btn-primary ms-2" tabindex="0" aria-controls="cat-table"
                    type="button" data-bs-toggle="modal" data-bs-target="#createmodal"><span><i
                            class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">افزودن محصول
                            جدید</span></span>

                </button>

            </div>

            {{-- item lists --}}
            <div class="card-datatable table-responsive " style="padding: 0 3rem;">

                <table id="example" class="table table-striped border-top">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>توضیحات</th>
                            <th>قیمت</th>
                            <th>میزان فروش</th>
                            <th>تاریخ ثبت</th>
                            <th>مدیریت</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->title }}</td>
                                <td>
                                    <p class="limit-chars-30 ">{{ $product->short_desc }}</p>
                                </td>
                                <td>
                                    {{ $product->price }}
                                </td>
                                <td>
                                    {{ $product->sales_count }}
                                </td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <div class="d-inline-block text-nowrap">

                                        <button class="btn btn-sm btn-icon delete-record"><i data-bs-toggle="modal"
                                                data-bs-target="#deletemodal{{ $product->id }}"
                                                class="bx bx-trash"></i></button>


                                        <button class="btn btn-sm btn-icon delete-record">
                                            <a href="{{ route('edit-products', ['product' => $product->id]) }}">
                                                <i class="bx bx-edit"></i></a></button>



                                        {{-- delete modal --}}
                                        <div class="modal fade" id="deletemodal{{ $product->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">حذف محصول</h3>

                                                            <p>با حذف محصول، حراجی های مرتبط نیز حذف خواهند شد.
                                                            </p>
                                                            <p>آیا از حذف این آیتم اطمینان دارید؟</p>
                                                        </div>
                                                        <form id="addNewCCForm-old"
                                                            action="{{ route('admin.products.destroy', ['product' => $product->id]) }}"
                                                            method="POST" class="row g-3">
                                                            @method('delete')
                                                            @csrf

                                                            <div class="col-12 text-center mt-4">
                                                                <button type="submit"
                                                                    class="btn btn-warning me-sm-3 me-1">حذف</button>
                                                                <button type="reset"
                                                                    class="btn btn-label-secondary btn-reset"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    انصراف
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>نام محصول</th>
                            <th>توضیحات</th>
                            <th>قیمت</th>
                            <th>میزان فروش</th>
                            <th>تاریخ ثبت</th>
                            <th>مدیریت</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
