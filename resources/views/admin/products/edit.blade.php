@extends('admin.app')
@section('content')
 
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="py-3 breadcrumb-wrapper mb-4">
      <span class="text-muted fw-light">فرم‌ها /</span> طرح‌های افقی
    </h4>

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
           
                <form id="editProductForm" class="row g-3" method="POST"
                    action="{{ route('admin.products.update', ['product' => $product->id]) }}">
                    @method('patch')
                    @csrf
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserFirstName">نام
                            محصول</label>
                        <input type="text" id="modalEditUserFirstName"
                            name="title" value="{{ $product->title }}"
                            class="form-control" placeholder="جان">


                            <input type="text" id="product_id"
                            name="product_id" value="{{ $product->id }}" hidden>
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserStatus">دسته
                            بندی</label>
                        <select id="modalEditUserStatus" name="category_id"
                            class="form-select"
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
                        <input type="text" id="modalEditUserName"
                            name="short_desc" class="form-control text-start"
                            placeholder="توضیحات کوتاه"
                            value="{{ $product->short_desc }}" dir="ltr">
                    </div>
                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditUserStatus">
                            تخفیف محصول (%)</label>
                        <select id="modalEditUserStatus" name="discount"
                            class="form-select"
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
                        <input type="number" id="modalEditTaxID" name="price"
                            value="{{ $product->price }}"
                            class="form-control modal-edit-tax-id"
                            placeholder="$$">
                    </div>

                    <div class="col-12 col-md-6">
                        <label class="form-label" for="modalEditTaxID">
                            موجودی محصول</label>
                        <input type="number" id="modalEditTaxID"
                            name="inventory" value="{{ $product->product_inventory }}"
                            class="form-control modal-edit-tax-id"
                            placeholder="...">
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
                            
                           

                            <button type="reset" class="btn btn-label-secondary"
                                data-bs-dismiss="modal" aria-label="Close">
                                انصراف
                            </button>
                            &nbsp;
                            &nbsp;
                             <button id="update-product" type="button" class="btn btn-primary">
                               <span id="loading_label" class="hide"> <i class="fa fa-spinner fa-spin"></i> &nbsp;  در حال پردازش </span>
                              <span id="main_label" class="">  ثبت </span>
                            </button>
                        </div>
                </form>
          </div>
        </div>
      </div>
    </div>



           




@endsection
