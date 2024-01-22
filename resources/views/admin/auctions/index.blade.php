@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- statistics --}}

        <!-- Users List Table -->






        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title">Redeem Codes </h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0 primary-font">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>

                @include('components.admin.flash_messages')



                <button class="btn btn-secondary add-new btn-primary ms-2" tabindex="0" aria-controls="cat-table"
                    type="button" data-bs-toggle="modal" data-bs-target="#createmodal"><span><i
                            class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">
                            <a style="color: #fff; text-decoration:none;" href="{{ route('admin.auctions.create') }}">
                                تعریف حراجی جدید
                            </a>
                        </span></span>
                </button>
            </div>
            {{-- item lists --}}
            <div class="card-datatable table-responsive " style="padding: 0 3rem;">

                <table id="example" class="table table-striped border-top">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>محصول</th>
                            <th>توضیحات محصول</th>
                            <th>دسته بندی</th>
                            <th>تاریخ شروع</th>
                            <th>No Jumper Limit</th>
                            <th>حداقل قیمت</th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($auctions as $auction)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $auction->product->title }}</td>
                                <td>
                                    <p class="limit-chars-20 ">{{ $auction->product->short_desc }}</p>
                                </td>
                                <td>
                                    {{ $auction->product->category->title }}</p>
                                </td>
                                <td>
                                    {{ $auction->start_time }}</p>
                                </td>
                                <td>
                                    {{ $auction->no_jumper_limit }}</p>
                                </td>
                                <td>
                                    {{ $auction->min_price }}</p>
                                </td>
                                <td>
                                    @if ($auction->status === 1)
                                        <p style="color:green"> فعال </p>
                                    @elseif($auction->status === 0)
                                        <p style="color:red"> غیرفعال </p>
                                    @elseif($auction->status === 3)
                                        <p style="color:rgb(76, 102, 253)"> پایان یافته </p>
                                    @elseif($auction->status === 100)
                                        <p style="color:rgb(138, 194, 8)"> در حال برگزاری </p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-block text-nowrap">

                                        <button class="btn btn-sm btn-icon delete-record"><i data-bs-toggle="modal"
                                                data-bs-target="#deletemodal{{ $auction->id }}"
                                                class="bx bx-trash"></i></button>


                                        <button class="btn btn-sm btn-icon delete-record">

                                            <i data-bs-toggle="modal" data-bs-target="#editmodal{{ $auction->id }}"
                                                class="bx bx-edit"></i></button>




                                        {{-- eidt modal --}}
                                        <div class="modal fade" id="editmodal{{ $auction->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">ویرایش حراجی </h3>

                                                        </div>

                                                        <form class="row g-3 " method="POST"
                                                            action="{{ route('admin.auctions.update', ['auction' => $auction->id]) }}">
                                                            @csrf
                                                            @method('put')


                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="first-name">No Jumper Limit</label>
                                                                <input name="no_jumper_limit" type="number" id="first-name"
                                                                    class="form-control" value="{{$auction->no_jumper_limit}}"
                                                                    placeholder="قیمتی که پس از آن کاربر جدید اجازه ورود به حراجی را ندارد"
                                                                    required>
                                                            </div>



                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="last-name">حداقل قیمت حراجی</label>
                                                                <input type="number" value="{{$auction->min_price}}" name="min_price" id="last-name" class="form-control"
                                                                    placeholder="حداثل قیمتی که امکان پایان حراجی وجود دارد" required>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                            
                                                                <label class="form-label" for="country">تاریخ و ساعت شروع حراجی</label>
                                                                <input type="text" value="{{$auction->start_time}}" class="form-control" id="datePickerTime" name="start_time"
                                                                    placeholder="تاریخ شروع حراجی" required>
                                                            
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                            
                                                            </div>


                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserStatus">
                                                                    فعال / غیرفعال کردن حراجی</label>
                                                                <label class="switch">

                                                                    @if ($auction->status === 1)
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
                                                                    @else
                                                                        {{-- currently deactive  --}}
                                                                        <input type="checkbox" name="status"
                                                                            class="switch-input">
                                                                        <span class="switch-toggle-slider">
                                                                            <span class="switch-off">
                                                                                <i class="bx bx-x "></i>
                                                                            </span>
                                                                            <span class="switch-on">
                                                                                <i class="bx bx-check"></i>
                                                                            </span>
                                                                        </span>
                                                                    @endif




                                                                    <span class="switch-label"></span>
                                                                </label>
                                                            </div>




                                                            <div class="col-12 text-center mt-4">

                                                                <button type="submit" class="btn btn-primary">

                                                                    <span id="main_label" class=""> ثبت </span>
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


                                        {{-- delete modal --}}
                                        <div class="modal fade" id="deletemodal{{ $auction->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">حذف کد</h3>

                                                            {{-- <p>با حذف چالش، حراجی های مرتبط نیز حذف خواهند شد. --}}
                                                            </p>
                                                            <p>آیا از حذف این آیتم اطمینان دارید؟</p>
                                                        </div>
                                                        <form id="addNewCCForm-old"
                                                            action="{{ route('admin.auctions.destroy', ['auction' => $auction->id]) }}"
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
                            <th>محصول</th>
                            <th>توضیحات محصول</th>
                            <th>دسته بندی</th>
                            <th>تاریخ شروع</th>
                            <th>No Jumper Limit</th>
                            <th>حداقل قیمت</th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
