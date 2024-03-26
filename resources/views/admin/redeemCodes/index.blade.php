@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        {{-- statistics --}}

        <!-- Users List Table -->







        <div class="modal fade" id="createmodal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4 mt-0 mt-md-n2">
                            <h3 class="secondary-font">افزودن کد جدید</h3>

                        </div>

                        <form id="createMyProductForm" class="row g-3 " method="POST"
                            action="{{ route('admin.redeemCodes.store') }}">
                            @csrf


                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">تعریف
                                    Redeem Code</label>
                                <input type="text" id="modalEditUserFirstName" name="description" class="form-control"
                                    placeholder="توضیحات کد" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">کد
                                    Redeem Code</label>
                                <input type="text" id="modalEditUserFirstName" name="code" class="form-control"
                                    placeholder="کد دلخواه خود را وارد کنید" required>
                            </div>


                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserName">
                                    تعداد بید </label>
                                <input type="number" id="modalEditUserName" name="value" class="form-control text-start"
                                    placeholder="تعداد بید موجود در کد را وارد کنید" dir="ltr">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserName">
                                    تعداد قابل استفاده </label>
                                <input type="number" id="modalEditUserName" name="use_limit_count"
                                    class="form-control text-start"
                                    placeholder="تعداد دفعات قابل استفاده از کد را وارد کنید" dir="ltr">
                            </div>


                            <div class="col-12 text-center mt-4">

                                <button type="submit" class="btn btn-primary">

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
                <h5 class="card-title">Redeem Codes </h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0 primary-font">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>

                @include('components.admin.flash_messages')



                <button class="btn btn-secondary add-new btn-primary ms-2" tabindex="0" aria-controls="cat-table"
                    type="button" data-bs-toggle="modal" data-bs-target="#createmodal"><span><i
                            class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">افزودن کد
                            جدید</span></span>

                </button>

            </div>

            {{-- item lists --}}
            <div class="card-datatable table-responsive " style="padding: 0 3rem;">

                <table id="example" class="table table-striped border-top">
                    <thead>
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
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($redeemCodes as $redeemCode)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $redeemCode->description }}</td>
                                <td>
                                    {{ $redeemCode->code }}</p>
                                </td>
                                <td>
                                    {{ $redeemCode->value }}</p>
                                </td>
                                <td>
                                    {{ $redeemCode->use_limit_count }}</p>
                                </td>
                                <td>
                                    {{ $redeemCode->used_count }}</p>
                                </td>
                                <td>
                                    @if ($redeemCode->status === 1)
                                        <p style="color:green"> فعال </p>
                                    @elseif($redeemCode->status === 0)
                                        <p style="color:red"> غیرفعال </p>
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-block text-nowrap">

                                        <button class="btn btn-sm btn-icon delete-record"><i data-bs-toggle="modal"
                                                data-bs-target="#deletemodal{{ $redeemCode->id }}"
                                                class="bx bx-trash"></i></button>


                                        <button class="btn btn-sm btn-icon delete-record">

                                            <i data-bs-toggle="modal" data-bs-target="#editmodal{{ $redeemCode->id }}"
                                                class="bx bx-edit"></i></button>




                                        {{-- eidt modal --}}
                                        <div class="modal fade" id="editmodal{{ $redeemCode->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">ویرایش Redeem Code </h3>

                                                        </div>

                                                        <form class="row g-3 " method="POST"
                                                            action="{{ route('admin.redeemCodes.update', ['redeemCode' => $redeemCode->id]) }}">
                                                            @csrf
                                                            @method('put')


                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label"
                                                                    for="modalEditUserFirstName">تعریف
                                                                    Redeem Code</label>
                                                                <input type="text" id="modalEditUserFirstName"
                                                                    name="description" class="form-control"
                                                                    placeholder="توضیحات کد" 
                                                                    value="{{$redeemCode->description}}">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserFirstName">کد
                                                                    Redeem Code</label>
                                                                <input type="text" id="modalEditUserFirstName"
                                                                    name="code" class="form-control"
                                                                    placeholder="کد دلخواه خود را وارد کنید"
                                                                    value="{{$redeemCode->code}}"
                                                                    required>
                                                            </div>


                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserName">
                                                                    تعداد بید </label>
                                                                <input type="number" id="modalEditUserName"
                                                                    name="value" class="form-control text-start"
                                                                    placeholder="تعداد بید موجود در کد را وارد کنید"
                                                                    value="{{$redeemCode->value}}"
                                                                    dir="ltr" required>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserName">
                                                                    تعداد قابل استفاده </label>
                                                                <input type="number" id="modalEditUserName"
                                                                    name="use_limit_count" class="form-control text-start"
                                                                    value="{{$redeemCode->use_limit_count}}"
                                                                    placeholder="تعداد دفعات قابل استفاده از کد را وارد کنید"
                                                                    dir="ltr">
                                                            </div>


                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserStatus">
                                                                    فعال / غیرفعال کردن کد</label>
                                                                <label class="switch">

                                                                    @if ($redeemCode->status === 1)
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
                                        <div class="modal fade" id="deletemodal{{ $redeemCode->id }}" tabindex="-1"
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
                                                            action="{{ route('admin.redeemCodes.destroy', ['redeemCode' => $redeemCode->id]) }}"
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
