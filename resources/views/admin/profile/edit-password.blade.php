@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">تنظیمات حساب /</span> امنیت
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.profile.index') }}"><i class="bx bx-user me-1"></i> حساب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active my-1 my-md-0" href="javascript:void(0);"><i
                                class="bx bx-lock-alt me-1"></i> امنیت</a>
                    </li>

                </ul>
                <!-- Change Password -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h5 class="mb-0">تغییر رمز عبور</h5>
                    </div>
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST"
                            action="{{ route('admin.update-password', ['user' => $user->id]) }}">
                            @csrf
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label" for="currentPassword">رمز عبور کنونی</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control text-start" type="password" dir="ltr"
                                            name="currentPassword" id="currentPassword" placeholder="············" required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label" for="newPassword">رمز عبور جدید</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control text-start" type="password" dir="ltr"
                                            id="newPassword" name="password" placeholder="············" required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
                                </div>

                                <div class="mb-3 col-md-6 form-password-toggle">
                                    <label class="form-label" for="confirmPassword">تایید رمز عبور جدید</label>
                                    <div class="input-group input-group-merge">
                                        <input class="form-control text-start" type="password" dir="ltr"
                                            name="password_confirmation" id="confirmPassword" placeholder="············"
                                            required>
                                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                                    </div>
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
                                    <div 
                                        class="alert alert-success">
                                        <ul>
                                            <li>{!! \Session::get('success') !!}</li>
                                        </ul>
                                    </div>
                                @endif
                                <div class="col-12 mb-4">
                                    <p class="fw-semibold mt-2">الزامات رمز عبور:</p>
                                    <ul class="ps-3 mb-0 lh-1-85">
                                        <li class="mb-1">حداقل 8 کاراکتر - هرچه بیشتر، بهتر</li>
                                        <li class="mb-1">حداقل یک کاراکتر با حرف کوچک</li>
                                        <li>حداقل یک عدد، نماد یا کاراکتر فاصله</li>
                                    </ul>
                                </div>
                                <div class="col-12 mt-1">
                                    <button type="submit" class="btn btn-primary me-2">ذخیره تغییرات</button>
                                    <button type="reset" class="btn btn-label-secondary">انصراف</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!--/ Change Password -->



                <!-- Recent Devices -->
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">دستگاه‌های اخیر</h5>
                    </div>
                    <div class="table-responsive">
                        <table class="table border-top">
                            <thead>
                                <tr>
                                    <th class="text-truncate">مرورگر</th>
                                    <th class="text-truncate">دستگاه</th>
                                    <th class="text-truncate">مکان</th>
                                    <th class="text-truncate">فعالیت‌های اخیر</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-truncate">
                                        <i class="bx bxl-windows text-info me-3"></i>
                                        <span class="fw-semibold">کروم روی ویندوز</span>
                                    </td>
                                    <td class="text-truncate">HP Spectre 360</td>
                                    <td class="text-truncate">سوییس</td>
                                    <td class="text-truncate">10 فروردین 1401 - 20:07</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">
                                        <i class="bx bx-mobile-alt text-danger me-3"></i>
                                        <span class="fw-semibold">کروم روی آیفون</span>
                                    </td>
                                    <td class="text-truncate">iPhone 12x</td>
                                    <td class="text-truncate">استرالیا</td>
                                    <td class="text-truncate">13 فروردین 1401 - 10:10</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">
                                        <i class="bx bxl-android text-success me-3"></i>
                                        <span class="fw-semibold">کروم روی اندروید</span>
                                    </td>
                                    <td class="text-truncate">Oneplus 9 Pro</td>
                                    <td class="text-truncate">دوبی</td>
                                    <td class="text-truncate">14 فروردین 1401 - 15:27</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">
                                        <i class="bx bxl-apple me-3"></i> <span class="fw-semibold">سافاری روی
                                            آیفون</span>
                                    </td>
                                    <td class="text-truncate">Apple iMac</td>
                                    <td class="text-truncate">هندوستان</td>
                                    <td class="text-truncate">15 فروردین 1401 - 16:17</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">
                                        <i class="bx bxl-windows text-info me-3"></i>
                                        <span class="fw-semibold">کروم روی ویندوز</span>
                                    </td>
                                    <td class="text-truncate">HP Spectre 360</td>
                                    <td class="text-truncate">سوییس</td>
                                    <td class="text-truncate">20 فروردین 1401 - 21:01</td>
                                </tr>
                                <tr>
                                    <td class="text-truncate">
                                        <i class="bx bxl-android text-success me-3"></i>
                                        <span class="fw-semibold">کروم روی اندروید</span>
                                    </td>
                                    <td class="text-truncate">Oneplus 9 Pro</td>
                                    <td class="text-truncate">دوبی</td>
                                    <td class="text-truncate">21 فروردین 1401 - 12:22</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Recent Devices -->
            </div>
        </div>
    </div>
@endsection
