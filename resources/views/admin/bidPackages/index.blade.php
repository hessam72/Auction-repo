@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
     
        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title">پکیج های قابل خرید بید</h5>

                @include('components.admin.flash_messages')

                <button class="btn btn-secondary add-new btn-primary ms-2" tabindex="0" aria-controls="cat-table"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i
                            class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">افزودن پکیج
                            جدید</span></span>

                </button>

            </div>

            {{-- item lists --}}
            <div class="card-datatable table-responsive " style="padding: 0 3rem;">

                <table id="example" class="table table-striped border-top">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>تعداد بید </th>
                            <th>قیمت</th>

                            <th>تخفیف (%)</th>

                            <th>مدیریت</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($bidPackages as $bidPackage)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $bidPackage->bid_amount }}</td>
                                <td>{{ $bidPackage->price }}</td>
                                <td>{{ $bidPackage->discount }}</td>


                                <td>
                                    <div class="d-inline-block text-nowrap">
                                        <button class="btn btn-sm btn-icon" data-bs-toggle="offcanvas"
                                            data-bs-target="#edit-cat{{ $bidPackage->id }}"><i
                                                class="bx bx-edit"></i></button>

                                        <button class="btn btn-sm btn-icon delete-record"><i data-bs-toggle="modal"
                                                data-bs-target="#deletemodal{{ $bidPackage->id }}"
                                                class="bx bx-trash"></i></button>


                                        {{-- edit modal --}}
                                        <div class="offcanvas offcanvas-end" tabindex="-1"
                                            id="edit-cat{{ $bidPackage->id }}" aria-labelledby="offcanvasAddUserLabel">
                                            <div class="offcanvas-header border-bottom">
                                                <h6 id="offcanvasAddUserLabel" class="offcanvas-title">ویرایش پکیج</h6>
                                                <button type="button" class="btn-close text-reset"
                                                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body mx-0 flex-grow-0">
                                                <form method="POST" class="add-new-user pt-0" id="addNewUserForm-old"
                                                    action="{{ route('admin.bidPackages.update', ['bidPackage' => $bidPackage->id]) }}">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label" for="add-user-fullname">قیمت </label>
                                                        <input type="number" class="form-control" id="add-user-fullname"
                                                            placeholder="قیمت پکیج را وارد کنید"
                                                            value="{{ $bidPackage->price }}" name="price"
                                                            aria-label="John Doe">
                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="add-user-fullname">تعداد بید </label>
                                                        <input type="number" class="form-control" id="add-user-fullname"
                                                            placeholder="تعداد بید موجود در پکیج"
                                                            value="{{ $bidPackage->bid_amount }}" name="bid_amount"
                                                            aria-label="John Doe">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="modalEditUserStatus">
                                                            تخفیف پکیج (%)</label>
                                                        <select id="modalEditUserStatus" name="discount"
                                                            class="form-select" aria-label="Default select example">
                                                            <option value="{{ $bidPackage->discount }}" selected>
                                                                {{ $bidPackage->discount }}%</option>

                                                            <option value="0" >0%</option>
                                                            <option value="5">5%</option>
                                                            <option value="10">10%</option>
                                                            <option value="15">15%</option>
                                                            <option value="20">20%</option>
                                                        </select>
                                                    </div>

                                                    <button type="submit"
                                                        class="btn btn-primary me-sm-3 me-1 data-submit">ثبت</button>
                                                    <button type="reset" class="btn btn-label-secondary"
                                                        data-bs-dismiss="offcanvas">انصراف</button>
                                                </form>
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
                                        </div>

                                        {{-- delete modal --}}
                                        <div class="modal fade" id="deletemodal{{ $bidPackage->id }}" tabindex="-1"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">حذف پکیج بید</h3>

                                                            </p>
                                                            <p>آیا از حذف این آیتم اطمینان دارید؟</p>
                                                        </div>
                                                        <form id="addNewCCForm-old"
                                                            action="{{ route('admin.bidPackages.destroy', ['bidPackage' => $bidPackage->id]) }}"
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
                            <th>تعداد بید </th>
                            <th>قیمت</th>

                            <th>تخفیف (%)</th>

                            <th>مدیریت</th>
                        </tr>
                    </tfoot>


                </table>
            </div>
            <!-- Offcanvas to add new user -->
            {{-- create new user --}}
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser"
                aria-labelledby="offcanvasAddUserLabel">
                <div class="offcanvas-header border-bottom">
                    <h6 id="offcanvasAddUserLabel" class="offcanvas-title">افزودن دسته بندی</h6>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body mx-0 flex-grow-0">
                    <form method="post" class="add-new-user pt-0" id="addNewUserForm-old"
                        action="{{ route('admin.bidPackages.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="add-user-fullname">قیمت </label>
                            <input type="number" class="form-control" id="add-user-fullname"
                                placeholder="قیمت پکیج را وارد کنید"  name="price"
                                aria-label="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-fullname">تعداد بید </label>
                            <input type="number" class="form-control" id="add-user-fullname"
                                placeholder="تعداد بید موجود در پکیج" 
                                name="bid_amount" aria-label="John Doe">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="modalEditUserStatus">
                                تخفیف پکیج (%)</label>
                            <select id="modalEditUserStatus" name="discount" class="form-select"
                                aria-label="Default select example">
                               

                                <option value="0" selected>0%</option>
                                <option value="5">5%</option>
                                <option value="10">10%</option>
                                <option value="15">15%</option>
                                <option value="20">20%</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary me-sm-3 me-1 data-submit">ثبت</button>
                        <button type="reset" class="btn btn-label-secondary"
                            data-bs-dismiss="offcanvas">انصراف</button>
                    </form>
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
            </div>



        </div>
    </div>
@endsection
