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
                            <h3 class="secondary-font">افزودن چالش جدید</h3>

                        </div>

                        <form id="createMyProductForm" class="row g-3 " method="POST"
                            action="{{ route('admin.challenges.store') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserFirstName">تعریف
                                    چالش</label>
                                <input type="text" id="modalEditUserFirstName" name="description" class="form-control"
                                    placeholder="تعریف چالش" required>
                            </div>

                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">دسته
                                    بندی</label>
                                <select id="modalEditUserStatus" name="category_id" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected>
                                        دسته بندی چالش را انتخاب کنید</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">
                                            {{ $category->title }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">جایزه چالش
                                </label>
                                <select id="modalEditUserStatus" name="reward_id" class="form-select"
                                    aria-label="Default select example" required>
                                    <option selected>
                                        جایزه چالش را انتخاب کنید</option>
                                    @foreach ($rewards as $reward)
                                        <option value="{{ $reward->id }}">
                                            {{ $reward->name }}</option>
                                    @endforeach


                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserName">
                                    تعداد مورد نیاز بردن</label>
                                <input type="number" id="modalEditUserName" name="number_to_win"
                                    class="form-control text-start" placeholder="تعداد مورد نیاز برنده شدن" dir="ltr">
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">
                                    نوع چالش را انتخاب کنید</label>
                                <select id="modalEditUserStatus" name="type" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>
                                        نوع چالش را انتخاب کنید</option>


                                    <option value="1">بید گذاری</option>
                                    <option value="2">برده شدن در حراجی</option>

                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class="form-label" for="modalEditUserStatus">
                                    زمان چالش</label>
                                <select id="modalEditUserStatus" name="day_type" class="form-select"
                                    aria-label="Default select example">
                                    <option selected>
                                        نوع زمان چالش را انتخاب کنید
                                    </option>


                                    <option value="1">روزانه</option>
                                    <option value="2">هفتگی</option>
                                    <option value="3">ماهیانه</option>

                                </select>
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
                <h5 class="card-title">چالش ها </h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0 primary-font">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>

                @include('components.admin.flash_messages')

                

                <button class="btn btn-secondary add-new btn-primary ms-2" tabindex="0" aria-controls="cat-table"
                    type="button" data-bs-toggle="modal" data-bs-target="#createmodal"><span><i
                            class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">افزودن چالش
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
                            <th>جایزه</th>
                            <th>نوع چالش</th>
                            <th>زمان انجام چالش</th>
                            <th>تعداد مورد نیاز</th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($challenges as $challenge)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>
                                    <p class="limit-chars-30 ">{{ $challenge->description }}</p>
                                </td>
                                <td>
                                    {{ $challenge->reward->name }}</p>
                                </td>
                                <td>
                                    @if ($challenge->type === 1)
                                        بید گذاری
                                    @elseif($challenge->type === 2)
                                        بردن حراجی
                                    @endif
                                </td>
                                <td>
                                    @if ($challenge->type === 1)
                                        روزانه
                                    @elseif($challenge->type === 2)
                                        هفتگی
                                    @elseif($challenge->type === 3)
                                        ماهیانه
                                    @endif


                                </td>
                                <td>{{ $challenge->number_to_win }}</td>
                                <td>
                                    @if ($challenge->status === 1)
                                        فعال
                                    @elseif($challenge->status === 0)
                                        غیرفعال
                                    @endif
                                </td>
                                <td>
                                    <div class="d-inline-block text-nowrap">

                                        <button class="btn btn-sm btn-icon delete-record"><i data-bs-toggle="modal"
                                                data-bs-target="#deletemodal{{ $challenge->id }}"
                                                class="bx bx-trash"></i></button>


                                        <button class="btn btn-sm btn-icon delete-record">

                                            <i data-bs-toggle="modal" data-bs-target="#editmodal{{ $challenge->id }}"
                                                class="bx bx-edit"></i></button>




                                        {{-- eidt modal --}}
                                        <div class="modal fade" id="editmodal{{ $challenge->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-lg modal-simple modal-edit-user">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">ویرایش چالش</h3>

                                                        </div>

                                                        <form class="row g-3 " method="POST"
                                                            action="{{ route('admin.challenges.update', ['challenge' => $challenge->id]) }}">
                                                            @csrf
                                                            @method('put')


                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label"
                                                                    for="modalEditUserFirstName">تعریف
                                                                    چالش</label>
                                                                <input type="text" id="modalEditUserFirstName"
                                                                    name="description" class="form-control"
                                                                    placeholder="تعریف چالش"
                                                                    value="{{ $challenge->description }}" required>
                                                            </div>

                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserStatus">دسته
                                                                    بندی</label>
                                                                <select id="modalEditUserStatus" name="category_id"
                                                                    class="form-select"
                                                                    aria-label="Default select example" required>
                                                                    <option value="{{ $challenge->category->id }}"
                                                                        selected>
                                                                        {{ $challenge->category->title }}</option>
                                                                    @foreach ($categories as $category)
                                                                        <option value="{{ $category->id }}">
                                                                            {{ $category->title }}</option>
                                                                    @endforeach


                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserStatus">جایزه
                                                                    چالش
                                                                </label>
                                                                <select id="modalEditUserStatus" name="reward_id"
                                                                    class="form-select"
                                                                    aria-label="Default select example" required>
                                                                    <option value="{{ $challenge->reward->id }}" selected>
                                                                        {{ $challenge->reward->name }}</option>
                                                                    @foreach ($rewards as $reward)
                                                                        <option value="{{ $reward->id }}">
                                                                            {{ $reward->name }}</option>
                                                                    @endforeach


                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserName">
                                                                    تعداد مورد نیاز بردن</label>
                                                                <input type="number" id="modalEditUserName"
                                                                    name="number_to_win" class="form-control text-start"
                                                                    placeholder="تعداد مورد نیاز برنده شدن"
                                                                    value="{{ $challenge->number_to_win }}"
                                                                    dir="ltr">
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserStatus">
                                                                    نوع چالش را انتخاب کنید</label>
                                                                <select id="modalEditUserStatus" name="type"
                                                                    class="form-select"
                                                                    aria-label="Default select example">

                                                                    @if ($challenge->type === 1)
                                                                        <option value="1" selected>بید گذاری</option>
                                                                        <option value="2">برده شدن در حراجی</option>
                                                                    @elseif($challenge->type === 2)
                                                                        <option value="1">بید گذاری</option>
                                                                        <option value="2" selected>برده شدن در حراجی
                                                                        </option>
                                                                    @endif

                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserStatus">
                                                                    زمان چالش</label>
                                                                <select id="modalEditUserStatus" name="day_type"
                                                                    class="form-select"
                                                                    aria-label="Default select example">

                                                                    @if ($challenge->type === 1)
                                                                        <option value="1" selected>روزانه</option>
                                                                        <option value="2">هفتگی</option>
                                                                        <option value="3">ماهیانه</option>
                                                                    @elseif($challenge->type === 2)
                                                                        <option value="1">روزانه</option>
                                                                        <option value="2" selected>هفتگی</option>
                                                                        <option value="3">ماهیانه</option>
                                                                    @elseif($challenge->type === 3)
                                                                        <option value="1">روزانه</option>
                                                                        <option value="2">هفتگی</option>
                                                                        <option value="3" selected>ماهیانه</option>
                                                                    @endif



                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6">
                                                                <label class="form-label" for="modalEditUserStatus">
                                                                    فعال / غیرفعال کردن چالش</label>
                                                                <label class="switch">

                                                                    @if ($challenge->status === 1)
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
                                        <div class="modal fade" id="deletemodal{{ $challenge->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">حذف چالش</h3>

                                                            {{-- <p>با حذف چالش، حراجی های مرتبط نیز حذف خواهند شد. --}}
                                                            </p>
                                                            <p>آیا از حذف این آیتم اطمینان دارید؟</p>
                                                        </div>
                                                        <form id="addNewCCForm-old"
                                                            action="{{ route('admin.challenges.destroy', ['challenge' => $challenge->id]) }}"
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
                            <th>جایزه</th>
                            <th>نوع چالش</th>
                            <th>زمان انجام چالش</th>
                            <th>تعداد مورد نیاز</th>
                            <th>وضعیت</th>
                            <th>مدیریت</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

@endsection
