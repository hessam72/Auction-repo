@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="py-3 breadcrumb-wrapper mb-4">
            <span class="text-muted fw-light">تنظیمات حساب /</span> حساب
        </h4>

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-3">
                    <li class="nav-item">
                        <a class="nav-link active my-1 my-md-0" href="javascript:void(0);"><i class="bx bx-user me-1"></i>
                            حساب</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.edit-password')}}"><i class="bx bx-lock-alt me-1"></i>
                            امنیت</a>
                    </li>
                    
                </ul>
                <div class="card mb-4">
                    <h5 class="card-header heading-color">جزئیات پروفایل</h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../../admin/img/avatars/1.png" alt="user-avatar" class="d-block rounded"
                                height="100" width="100" id="uploadedAvatar">
                            <div class="button-wrapper">
                                <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                    <span class="d-none d-sm-block">ارسال تصویر جدید</span>
                                    <i class="bx bx-upload d-block d-sm-none"></i>
                                    <input type="file" id="upload" class="account-file-input" hidden
                                        accept="image/png, image/jpeg">
                                </label>
                               

                                <p class="mb-0">فایل‌های JPG، GIF یا PNG مجاز هستند. حداکثر اندازه فایل 800KB.</p>
                            </div>
                        </div>
                    </div>
                    <hr class="my-0">
                    <div class="card-body">
                        <form id="formAccountSettings" method="POST" onsubmit="return false">
                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label for="firstName" class="form-label">نام</label>
                                    <input class="form-control" type="text" id="firstName" name="firstName"
                                        value="جان" autofocus>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="lastName" class="form-label">نام خانوادگی</label>
                                    <input class="form-control" type="text" name="lastName" id="lastName"
                                        value="اسنو">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="email" class="form-label">ایمیل</label>
                                    <input class="form-control text-start" type="text" id="email" name="email"
                                        value="john.doe@example.com" placeholder="john.doe@example.com" dir="ltr">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="organization" class="form-label">سازمان</label>
                                    <input type="text" class="form-control" id="organization" name="organization"
                                        value="مایکروسافت">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="phoneNumber">شماره تلفن</label>
                                    <div class="input-group input-group-merge">
                                        <input type="text" id="phoneNumber" name="phoneNumber"
                                            class="form-control text-start" placeholder="202 555 0111" dir="ltr">
                                        <span class="input-group-text">IR (+98)</span>
                                    </div>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="address" class="form-label">آدرس</label>
                                    <input type="text" class="form-control" id="address" name="address"
                                        placeholder="آدرس">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="state" class="form-label">استان</label>
                                    <input class="form-control" type="text" id="state" name="state"
                                        placeholder="آذربایجان شرقی">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="zipCode" class="form-label">کد پستی</label>
                                    <input type="text" class="form-control text-start" id="zipCode" name="zipCode"
                                        placeholder="231465" maxlength="6" dir="ltr">
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="country">کشور</label>
                                    <select id="country" class="select2 form-select">
                                        <option value="">انتخاب</option>
                                        <option value="Australia">استرالیا</option>
                                        <option value="Bangladesh">بنگلادش</option>
                                        <option value="Belarus">بلاروس</option>
                                        <option value="Brazil">برزیل</option>
                                        <option value="Canada">کانادا</option>
                                        <option value="China">چین</option>
                                        <option value="France">فرانسه</option>
                                        <option value="Germany">آلمان</option>
                                        <option value="India">هندوستان</option>
                                        <option value="Indonesia">اندونزی</option>
                                        <option value="Israel">اسرائیل</option>
                                        <option value="Italy">ایتالیا</option>
                                        <option value="Japan">ژاپن</option>
                                        <option value="Korea">کره جنوبی</option>
                                        <option value="Mexico">مکزیک</option>
                                        <option value="Philippines">فیلیپین</option>
                                        <option value="Russia">روسیه</option>
                                        <option value="South Africa">آفریقای جنوبی</option>
                                        <option value="Thailand">تایلند</option>
                                        <option value="Turkey">ترکیه</option>
                                        <option value="Ukraine">اوکراین</option>
                                        <option value="United Arab Emirates">امارات</option>
                                        <option value="United Kingdom">انگلستان</option>
                                        <option value="United States">ایالات متحده</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="language" class="form-label">زبان</label>
                                    <select id="language" class="select2 form-select">
                                        <option value="">انتخاب زبان</option>
                                        <option value="en">انگلیسی</option>
                                        <option value="fr">فرانسوی</option>
                                        <option value="de">آلمانی</option>
                                        <option value="pt">پرتغالی</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="timeZones" class="form-label">ناحیه زمانی</label>
                                    <select id="timeZones" class="select2 form-select">
                                        <option value="">انتخاب ناحیه زمانی</option>
                                        <option value="-12">(GMT-12:00) خط زمانی بین المللی غربی</option>
                                        <option value="-11">(GMT-11:00) جزیره میدوی</option>
                                        <option value="-10">(GMT-10:00) هاوایی</option>
                                        <option value="-9">(GMT-09:00) آلاسکا</option>
                                        <option value="-8">(GMT-08:00) آمریکا و کانادا</option>
                                        <option value="-8">(GMT-08:00) کالیفرنیا</option>
                                        <option value="-7">(GMT-07:00) آریزونا</option>
                                        <option value="-7">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</option>
                                        <option value="-7">(GMT-07:00) اقیانوسیه</option>
                                        <option value="-6">لورم ایپسوم متن ساختگی با تولید</option>
                                        <option value="-6">(GMT-06:00) استرالیا</option>
                                        <option value="-6">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از</option>
                                        <option value="-6">لورم ایپسوم متن ساختگی با</option>
                                        <option value="-5">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم</option>
                                        <option value="-5">(GMT-05:00) اروپا</option>
                                        <option value="-5">(GMT-05:00) خاورمیانه</option>
                                        <option value="-4">لورم ایپسوم متن ساختگی با تولید سادگی</option>
                                        <option value="-4">لورم ایپسوم متن ساختگی با تولید</option>
                                    </select>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label for="currency" class="form-label">واحد پول</label>
                                    <select id="currency" class="select2 form-select">
                                        <option value="">انتخاب واحد پول</option>
                                        <option value="usd">دلار</option>
                                        <option value="euro">یورو</option>
                                        <option value="pound">پوند</option>
                                        <option value="bitcoin">بیت کوین</option>
                                    </select>
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
