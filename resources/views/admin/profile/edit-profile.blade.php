@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">تنظیمات حساب /</span> اطلاعات کاربری
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active my-1 my-md-0" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                            حساب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.edit-password') }}"><i class="bx bx-lock-alt me-1"></i>
                            امنیت</a>
                    </li>

                </ul>
                <div class="card mb-4">
                    <h5 class="card-header heading-color">جزئیات پروفایل</h5>
                    {{-- {!! $user->bio !!} --}}
                    
                    
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="{{ asset('storage/' . $user->profile_pic) }}" alt="user-avatar"
                                class="d-block rounded" height="100" width="100" id="uploadedAvatar">

                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (\Session::has('success'))
                            <div class="alert alert-success">
                                <ul>
                                    <li>{!! \Session::get('success') !!}</li>
                                </ul>
                            </div>
                        @endif
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST"
                            action="{{ route('admin.profile.update', ['profile' => $user->id]) }}"
                            enctype="multipart/form-data">
                            @method('patch')
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="username" class="form-label">نام کاربری</label>
                                    <input class="form-control" type="text" id="firstName" name="username"
                                        value="{{ $user->username }}" autofocus required>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">ایمیل</label>
                                    <input class="form-control text-start" type="text" id="email" name="email"
                                        value="{{ $user->email }}" placeholder="john.doe@example.com" dir="ltr"
                                        required>
                                </div>
                                <div class="mb-3 col-md-8">

                                    <div style="display: flex;
                                margin-top: 1rem;
                                
                                gap: 2rem;"
                                        class="button-wrapper">
                                        <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                            <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                            <i class="bx bx-upload d-block d-sm-none"></i>
                                            <input name="pic" type="file" id="upload" class="account-file-input"
                                                hidden accept="image/png, image/jpeg">
                                        </label>

                                        <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 800KB.</p>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-2">
                                <button type="submit" class="btn btn-primary me-2">ذخیره تغییرات</button>
                                <button type="reset" class="btn btn-label-secondary">انصراف</button>
                            </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>

            </div>
        </div>
    </div>
@endsection
