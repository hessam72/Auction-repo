@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        
        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title">دسته بندی ها</h5>

                               @include('components.admin.flash_messages')

                <button class="btn btn-secondary add-new btn-primary ms-2" tabindex="0" aria-controls="cat-table"
                    type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasAddUser"><span><i
                            class="bx bx-plus me-0 me-lg-2"></i><span class="d-none d-lg-inline-block">افزودن دسته بندی
                            جدید</span></span>

                </button>

            </div>

            {{-- item lists --}}
            <div class="card-datatable table-responsive " style="padding: 0 3rem;">

                <table id="example" class="table table-striped border-top">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>عنوان</th>
                            <th>توضیحات</th>
                            <th>تاریخ ثبت</th>
                            <th>مدیریت</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $category->title }}</td>
                                <td>
                                    <p class="limit-chars-30 ">{{ $category->description }}</p>
                                </td>
                                <td>{{ $category->created_at }}</td>
                                <td>
                                    <div class="d-inline-block text-nowrap">
                                        <button class="btn btn-sm btn-icon" data-bs-toggle="offcanvas"
                                            data-bs-target="#edit-cat{{ $category->id }}"><i
                                                class="bx bx-edit"></i></button>

                                        <button class="btn btn-sm btn-icon delete-record"><i data-bs-toggle="modal"
                                                data-bs-target="#deletemodal{{ $category->id }}" class="bx bx-trash"></i></button>


                                        {{-- edit modal --}}
                                        <div class="offcanvas offcanvas-end" tabindex="-1" id="edit-cat{{ $category->id }}"
                                            aria-labelledby="offcanvasAddUserLabel">
                                            <div class="offcanvas-header border-bottom">
                                                <h6 id="offcanvasAddUserLabel" class="offcanvas-title">ویرایش دسته بندی</h6>
                                                <button type="button" class="btn-close text-reset"
                                                    data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                            </div>
                                            <div class="offcanvas-body mx-0 flex-grow-0">
                                                <form method="POST" class="add-new-user pt-0" id="addNewUserForm-old"
                                                action="{{ route('admin.categories.update', ['category' => $category->id]) }}">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="mb-3">
                                                        <label class="form-label" for="add-user-fullname">نام </label>
                                                        <input type="text" class="form-control" id="add-user-fullname"
                                                            placeholder="نام دسته بندی" value="{{ $category->title }}"
                                                            name="title" aria-label="John Doe">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label" for="add-user-fullname">توضیحات </label>
                                                        <input type="text" class="form-control" id="add-user-fullname"
                                                            placeholder="توضیحات دسته بندی"
                                                            value="{{ $category->description }}" name="description"
                                                            aria-label="John Doe">
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
                                        <div class="modal fade" id="deletemodal{{ $category->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered1 modal-simple modal-add-new-cc">
                                                <div class="modal-content p-3 p-md-5">
                                                    <div class="modal-body">
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                        <div class="text-center mb-4 mt-0 mt-md-n2">
                                                            <h3 class="secondary-font">حذف دسته بندی</h3>
                                                           
                                                            <p>با حذف دسته بندی، محصولات  و چالش های مرتبط نیز حذف خواهند شد.</p>
                                                            <p>آیا از حذف این آیتم اطمینان دارید؟</p>
                                                        </div>
                                                        <form id="addNewCCForm-old" 
                                                        action="{{ route('admin.categories.destroy', ['category' => $category->id]) }}"
                                                        method="POST"
                                                        class="row g-3" >
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
                            <th>عنوان</th>
                            <th>توضیحات</th>
                            <th>تاریخ ثبت</th>
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
                        action="{{ route('admin.categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="add-user-fullname">نام </label>
                            <input type="text" class="form-control" id="add-user-fullname"
                                placeholder="نام دسته بندی" name="title" aria-label="John Doe">
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="add-user-fullname">توضیحات </label>
                            <input type="text" class="form-control" id="add-user-fullname"
                                placeholder="توضیحات دسته بندی" name="description" aria-label="John Doe">
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
