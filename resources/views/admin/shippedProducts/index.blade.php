@extends('admin.app')
@section('content')
<style>
.head_rec{
    display: flex;
    width: 100%;
    justify-content: space-between;
}
.item_rec{
    display: flex;
    gap: .5rem;
}
    </style>
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title"> کالاهای خریداری شده </h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0 primary-font">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>

                @include('components.admin.flash_messages')



            </div>

            {{-- item lists --}}
            <div class="card-datatable table-responsive " style="padding: 0 3rem;">

                <table id="example" class="table table-striped border-top">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام خریدار</th>
                            <th>ایمیل خریدار</th>
                            <th>نام محصول</th>
                            <th>($) قیمت</th>
                            <th> تاریخ</th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $product->user->username }}</td>
                                <td>{{ $product->user->email }}</td>
                                <td>{{ $product->product->title }}</td>
                                <td>{{ $product->transaction->amount }}</td>
                                <td>{{ $product->created_at }}</td>
                                {{-- 1=> new and pending / 100 => sucsess full payment 300=>partially paid / 400 => failed payment --}}
                                <td>
                                    @if ($product->status === 1)
                                        <p style="color:rgb(145, 156, 0)"> در انتظار پرداخت </p>
                                    @elseif($product->status === 100)
                                        <p style="color:rgb(2, 147, 24)">پرداخت شده </p>
                                    @elseif($product->status === 200)
                                        <p style="color:rgb(2, 147, 24)">ارسال شده </p>
                                    @elseif($product->status === 300)
                                        <p style="color:red"> پرداخت بصورت نیمه تمام</p>
                                    @elseif($product->status === 400)
                                        <p style="color:rgb(170, 26, 1)"> پرداخت ناموفق</p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-block text-nowrap">

                                        <button class="btn btn-sm btn-icon delete-record">

                                            <i data-bs-toggle="modal" data-bs-target="#deletemodal{{ $product->id }}"
                                                class="fa-solid fa-eye"></i>

                                        </button>

                                        @if ($product->status === 100)
                                            <button class="btn btn-sm btn-icon delete-record">
                                                <i class="fa-solid fa-truck-fast" data-bs-toggle="modal"
                                                    data-bs-target="#editmodal{{ $product->id }}"></i>
                                            </button>
                                        @endif



                                        {{-- eidt modal --}}
                                        <div class="modal fade" id="editmodal{{ $product->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">ارسال کالا</h3>

                                                        </div>

                                                        <form class="row g-3 " method="POST"
                                                            action="{{ route('admin.shipped_products.update', ['shipped_product' => $product->id]) }}">
                                                            @csrf
                                                            @method('put')


                                                            <p style="text-align: center">شما در حال ثبت ارسال کالا به آدرس
                                                                میباشید. این عمل غیر قابل بازگشت میباشد</p>


                                                            <div class="col-12 text-center mt-4">

                                                                <button type="submit" class="btn btn-primary">

                                                                    <span id="main_label" class=""> ثبت ارسال </span>
                                                                </button>
                                                                <button type="reset" class="btn btn-label-secondary"
                                                                    data-bs-dismiss="modal" aria-label="Close">
                                                                    انصراف
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        {{-- details modal --}}
                                        <div class="modal fade" id="deletemodal{{ $product->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">فاکتور فروش</h3>

                                                            <div class="head_rec">
                                                                <div class="right">
                                                                    <div class="item_rec">
                                                                        <p> محصول</p>
                                                                        <p>{{ $product->product->title }}</p>
                                                                    </div>
                                                                    <div class="item_rec">
                                                                        <p>قیمت</p>
                                                                        <p>{{ $product->transaction->amount }}</p>
                                                                    </div>
                                                                </div>
                                                                <div class="left">
                                                                    <div class="item_rec">
                                                                        <p>وضعیت </p>
                                                                        <p>
                                                                            @if ($product->status === 1)
                                                                                <p style="color:rgb(145, 156, 0)"> در انتظار
                                                                                    پرداخت
                                                                                </p>
                                                                            @elseif($product->status === 100)
                                                                                <p style="color:rgb(2, 147, 24)">پرداخت شده
                                                                                </p>
                                                                            @elseif($product->status === 200)
                                                                                <p style="color:rgb(2, 147, 24)">ارسال شده
                                                                                </p>
                                                                            @elseif($product->status === 300)
                                                                                <p style="color:red"> پرداخت بصورت نیمه تمام
                                                                                </p>
                                                                            @elseif($product->status === 400)
                                                                                <p style="color:rgb(170, 26, 1)"> پرداخت
                                                                                    ناموفق</p>
                                                                            @endif
                                                                        </p>
                                                                    </div>
                                                                    <div>
                                                                        <p></p>
                                                                        <p>
                                                                            {{ $product->created_at }}
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="body_rec">
                                                                <div class="item_rec">
                                                                    <p> خریدار</p>
                                                                    <p>{{ $product->user->username }}</p>
                                                                </div>
                                                                <div class="item_rec">
                                                                    <p>ایمیل خریدار</p>
                                                                    <p>{{ $product->user->email }}</p>
                                                                </div>
                                                                <div class="item_rec">
                                                                    <p> استان</p>
                                                                    <p>{{ $product->state->name }}</p>
                                                                </div>
                                                                <div class="item_rec">
                                                                    <p>شهر</p>
                                                                    <p>{{ $product->city->name }}</p>
                                                                </div>
                                                                <div class="item_rec">
                                                                    <p>آدرس پستی</p>
                                                                    <p>{{ $product->address }}</p>
                                                                </div>
                                                                <div class="item_rec">
                                                                    <p>کد پستی</p>
                                                                    <p>{{ $product->postal_code }}</p>
                                                                </div>
                                                            </div>

                                                            <div class="footer_rec">
                                                                <div class="item_rec">
                                                                    <p>شماره سفارش</p>
                                                                    <p>{{ $product->transaction->order_id }}</p>
                                                                </div>
                                                                <div class="item_rec">
                                                                    <p>توضیحات سفارش</p>
                                                                    <p>{{ $product->transaction->payment_description }}</p>
                                                                </div>
                                                            </div>










                                                        </div>

                                                        <div class="col-12 text-center mt-4">

                                                            <button type="reset" class="btn btn-label-secondary btn-reset"
                                                                data-bs-dismiss="modal" aria-label="Close">
                                                                بستن
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
                            <th>توضیحات</th>
                            <th>کد</th>

                            <th>تعداد بید</th>
                            <th> تعداد قابل استفاده</th>
                            <th> تعداد استفاده شده </th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
