@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title">پیشنهادهای شگفت انگیز</h5>

                @include('components.admin.flash_messages')

                <button class="btn btn-secondary add-new btn-primary ms-2" tabindex="0" aria-controls="cat-table"
                    type="button"><span><i class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">
                            <a style="color: #fff; text-decoration:none;" href="{{ route('admin.specialOffers.create') }}">
                                تعریف پیشنهاد جدید

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
                            <th>توضیح کوتاه</th>
                            <th>نوع آیتم</th>
                            <th>شرح آیتم</th>
                            <th> تخفیف (%)</th>
                            <th>تاریخ انقضا</th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($specialOffers as $specialOffer)
                            <tr>
                                <td>{{ $i++ }}</td>

                                <td>
                                    <p class="limit-chars-20 ">{{ $specialOffer->description }}</p>
                                </td>

                                <td>
                                    @if ($specialOffer->type === 1)
                                        {{-- its a bid package --}}
                                        پکیج بید
                                    @elseif($specialOffer->type === 2)
                                        {{-- its a product  --}}

                                        محصول
                                    @endif
                                </td>


                                <td>{{ $specialOffer->type_desc }}</td>
                                

                                <td>{{ $specialOffer->discount_amount }}</td>
                                <td>{{ $specialOffer->expiration_date }}</td>

                                <td>
                                    @if ($specialOffer->status === 1)
                                        <p style="color:green"> فعال </p>
                                    @elseif($specialOffer->status === 0)
                                        <p style="color:red"> غیرفعال </p>
                                    @endif
                                </td>


                                <td>
                                    <div class="d-inline-block text-nowrap">
                                        <button class="btn btn-sm btn-icon" data-bs-toggle="offcanvas"
                                            data-bs-target="#edit-cat{{ $specialOffer->id }}"><i
                                                class="bx bx-edit"></i></button>

                                        <button class="btn btn-sm btn-icon delete-record"><i data-bs-toggle="modal"
                                                data-bs-target="#deletemodal{{ $specialOffer->id }}"
                                                class="bx bx-trash"></i></button>


                                        {{-- edit modal --}}
                                        <div class="offcanvas offcanvas-end" tabindex="-1"
                                            id="edit-cat{{ $specialOffer->id }}" aria-labelledby="offcanvasAddUserLabel">
                                            <div class="offcanvas-header border-bottom">
                                                <h6 id="offcanvasAddUserLabel" class="offcanvas-title">ویرایش آیتم</h6>
                                                <button type="button" class="btn-close text-reset"
                                                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body mx-0 flex-grow-0">
                                                <form method="POST" class="add-new-user pt-0" id="addNewUserForm-old"
                                                    action="{{ route('admin.specialOffers.update', ['specialOffer' => $specialOffer->id]) }}"
                                                     enctype="multipart/form-data">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label" for="modalEditUserName">
                                                            توضیحات اجمالی</label>
                                                        <input type="text" id="modalEditUserName" name="description"
                                                            value="{{ $specialOffer->description }}"
                                                            class="form-control text-start" placeholder="توضیحات کوتاه"
                                                            dir="ltr">
                                                    </div>


                                                    <div class="mb-3">
                                                        <label class="form-label" for="modalEditUserStatus">
                                                            تخفیف آیتم (%)</label>
                                                        <select id="modalEditUserStatus" name="discount"
                                                            class="form-select" aria-label="Default select example">
                                                            <option value="{{ $specialOffer->discount_amount }}" selected>
                                                                {{ $specialOffer->discount_amount }}%</option>

                                                            <option value="0">0%</option>
                                                            <option value="5">5%</option>
                                                            <option value="10">10%</option>
                                                            <option value="15">15%</option>
                                                            <option value="20">20%</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="eventStartDate">تاریخ انقضا</label>
                                                        <input type="text"
                                                            value="{{ $specialOffer->expiration_date }}"
                                                            class="form-control" id="datePicker" name="expiration_date"
                                                            placeholder="تاریخ انقضا">

                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="eventStartDate">تغییر تصویر آیتم</label>
                                                        <div class="input-group">
                                                            <label class="input-group-text" for="inputGroupFile01">آپلود</label>
                                                            <input name="banner" type="file" class="form-control" id="inputGroupFile01">
                                                          </div>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="modalEditUserStatus">
                                                            فعال / غیرفعال کردن آیتم</label>
                                                        <label class="switch">

                                                            @if ($specialOffer->status === 1)
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

                                                    <button type="submit"
                                                        class="btn btn-primary me-sm-3 me-1 data-submit">ثبت</button>
                                                    <button type="reset" class="btn btn-label-secondary"
                                                        data-bs-dismiss="offcanvas">انصراف</button>
                                                </form>

                                            </div>
                                        </div>

                                        {{-- delete modal --}}
                                        <div class="modal fade" id="deletemodal{{ $specialOffer->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">حذف بسته شگفت انگیز</h3>

                                                            <p>با حذف این بسته، تخفیف محصول متناظر به پیشفرض (0) تغییر خواهد یافت.
                                                            </p>
                                                            <p>آیا از حذف این آیتم اطمینان دارید؟</p>
                                                        </div>
                                                        <form id="addNewCCForm-old"
                                                            action="{{ route('admin.specialOffers.destroy', ['specialOffer' => $specialOffer->id]) }}"
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
                            <th>توضیح کوتاه</th>
                            <th>نوع آیتم</th>
                            <th>شرح آیتم</th>
                            <th> تخفیف (%)</th>
                            <th>تاریخ انقضا</th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>

                        </tr>
                    </tfoot>


                </table>
            </div>



        </div>
    </div>
@endsection
