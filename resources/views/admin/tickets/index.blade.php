@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="app-chat card overflow-hidden">
            <div class="row g-0">
                <!-- Sidebar Left -->
                <div class="col app-chat-sidebar-left app-sidebar overflow-hidden" id="app-chat-sidebar-left">
                    <div
                        class="chat-sidebar-left-user sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                        <div class="avatar avatar-xl avatar-online">
                            <img src="../../assets/img/avatars/1.png"   onerror="this.src='/storage/images/user_profiles/blank.png'" alt="آواتار" class="rounded-circle">
                        </div>
                        <h5 class="mt-2 mb-0">جان اسنو</h5>
                        <small>مدیر</small>
                        <i class="bx bx-x bx-sm cursor-pointer close-sidebar" data-bs-toggle="sidebar" data-overlay
                            data-target="#app-chat-sidebar-left"></i>
                    </div>
                    <div class="sidebar-body px-4 pb-4">
                        <div class="my-4">
                            <p class="text-muted text-uppercase">درباره</p>
                            <textarea id="chat-sidebar-left-user-about" class="form-control chat-sidebar-left-user-about mt-3" rows="4"
                                maxlength="120">
لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه</textarea>
                        </div>
                        <div class="my-4">
                            <p class="text-muted text-uppercase">وضعیت</p>
                            <div class="d-grid gap-1">
                                <div class="form-check form-check-success">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="active"
                                        id="user-active" checked>
                                    <label class="form-check-label" for="user-active">فعال</label>
                                </div>
                                <div class="form-check form-check-danger">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="busy"
                                        id="user-busy">
                                    <label class="form-check-label" for="user-busy">مشغول</label>
                                </div>
                                <div class="form-check form-check-warning">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="away"
                                        id="user-away">
                                    <label class="form-check-label" for="user-away">دور</label>
                                </div>
                                <div class="form-check form-check-secondary">
                                    <input name="chat-user-status" class="form-check-input" type="radio" value="offline"
                                        id="user-offline">
                                    <label class="form-check-label" for="user-offline">آفلاین</label>
                                </div>
                            </div>
                        </div>
                        <div class="my-4">
                            <p class="text-muted text-uppercase">تنظیمات</p>
                            <ul class="list-unstyled d-grid gap-3 me-3">
                                <li class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bx bx-message-square-detail me-1"></i>
                                        <span class="align-middle">اعتبارسنجی دو مرحله‌ای</span>
                                    </div>
                                    <label class="switch switch-primary me-4">
                                        <input type="checkbox" class="switch-input" checked>
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </li>
                                <li class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <i class="bx bx-bell me-1"></i>
                                        <span class="align-middle">اعلان</span>
                                    </div>
                                    <label class="switch switch-primary me-4">
                                        <input type="checkbox" class="switch-input">
                                        <span class="switch-toggle-slider">
                                            <span class="switch-on"></span>
                                            <span class="switch-off"></span>
                                        </span>
                                    </label>
                                </li>
                                <li>
                                    <i class="bx bx-user me-1"></i>
                                    <span class="align-middle">دعوت دوستان</span>
                                </li>
                                <li>
                                    <i class="bx bx-trash me-1"></i>
                                    <span class="align-middle">حذف حساب</span>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex mt-4">
                            <button class="btn btn-primary" data-bs-toggle="sidebar" data-overlay
                                data-target="#app-chat-sidebar-left">
                                خروج
                            </button>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Left-->

                <!-- Chat & Contacts -->
                <div class="col app-chat-contacts app-sidebar flex-grow-0 overflow-hidden border-end"
                    id="app-chat-contacts">
                    <div class="sidebar-header py-3 px-4 border-bottom">
                        <div class="d-flex align-items-center">
                            {{-- <div class="flex-shrink-0 avatar avatar-online me-3" data-bs-toggle="sidebar"
                                data-overlay="app-overlay-ex" data-target="#app-chat-sidebar-left">
                                <img class="user-avatar rounded-circle cursor-pointer" src="../../assets/img/avatars/1.png"
                                    alt="آواتار">
                            </div> --}}
                            <div class="flex-grow-1 input-group input-group-merge rounded-pill">
                                <span class="input-group-text" id="basic-addon-search31"><i
                                        class="bx bx-search fs-4"></i></span>
                                <input type="text" class="form-control chat-search-input" placeholder="جستجو در مخاطبین..."
                                    aria-label="Search..." aria-describedby="basic-addon-search31">
                            </div>
                        </div>
                        <i class="bx bx-x cursor-pointer position-absolute top-0 end-0 mt-2 me-1 fs-4 d-lg-none d-block"
                            data-overlay data-bs-toggle="sidebar" data-target="#app-chat-contacts"></i>
                    </div>
                    <div class="sidebar-body">
                        <!-- Chats -->
                        <ul class="list-unstyled chat-contact-list" id="chat-list">
                            <li class="chat-contact-list-item chat-contact-list-item-title">
                                <h5 class="text-primary mb-0 secondary-font">تیکت های جدید</h5>
                            </li>
                            <li class="chat-contact-list-item chat-list-item-0 d-none">
                                <h6 class="text-muted mb-0">گفتگویی پیدا نشد</h6>
                            </li>
                            @foreach ($new_tickets as $ticket)
                                @if ($current_ticket->id == $ticket->id)
                                    <li class="chat-contact-list-item active">
                                    @else
                                    <li class="chat-contact-list-item">
                                @endif

                                <a href="?id={{ $ticket->id }}" class="d-flex align-items-center">
                                    {{-- avatar-online --}}
                                    <div class="flex-shrink-0 avatar ">
                                        <img src="/storage/{{ $ticket->user->profile_pic }}" alt="آواتار"
                                        onerror="this.src='/storage/images/user_profiles/blank.png'"   
                                        class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate m-0">{{ $ticket->user->username }}</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">
                                            {{ $ticket->subject }}
                                        </p>
                                    </div>
                                    {{-- <small class="text-muted mb-auto">{{$ticket->updated_at->diffForHumans()}}</small> --}}
                                    <small class="text-muted mb-auto">
                                        {{ \Morilog\Jalali\Jalalian::forge($ticket->updated_at)->ago() }}</small>
                                </a>
                                </li>
                            @endforeach
                            {{-- active --}}

                        </ul>
                        <!-- Contacts -->
                        <ul class="list-unstyled chat-contact-list mb-0" id="contact-list">
                            <li class="chat-contact-list-item chat-contact-list-item-title">
                                <h5 class="text-primary mb-0 secondary-font">پاسخ داده شده</h5>
                            </li>
                            <li class="chat-contact-list-item contact-list-item-0 d-none">
                                <h6 class="text-muted mb-0">مخاطبی پیدا نشد</h6>
                            </li>
                            @foreach ($old_tickets as $ticket)
                                @if ($current_ticket->id == $ticket->id)
                                    <li class="chat-contact-list-item active">
                                    @else
                                    <li class="chat-contact-list-item">
                                @endif

                                <a href="?id={{ $ticket->id }}" class="d-flex align-items-center">
                                    {{-- avatar-online --}}
                                    <div class="flex-shrink-0 avatar ">
                                        <img src="/storage/{{ $ticket->user->profile_pic }}" alt="آواتار"
                                        onerror="this.src='/storage/images/user_profiles/blank.png'"
                                         class="rounded-circle">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="chat-contact-name text-truncate m-0">{{ $ticket->user->username }}</h6>
                                        <p class="chat-contact-status text-truncate mb-0 text-muted">
                                            {{ $ticket->subject }}
                                        </p>
                                    </div>
                                    {{-- <small class="text-muted mb-auto">{{$ticket->updated_at->diffForHumans()}}</small> --}}
                                    <small class="text-muted mb-auto">
                                        {{ \Morilog\Jalali\Jalalian::forge($ticket->updated_at)->ago() }}</small>
                                </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                <!-- /Chat contacts -->

                <!-- Chat History -->
                <div class="col app-chat-history bg-body">
                    <div class="chat-history-wrapper">
                        <div class="chat-history-header border-bottom">
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="d-flex overflow-hidden align-items-center">
                                    <i class="bx bx-menu bx-sm cursor-pointer d-lg-none d-block me-2"
                                        data-bs-toggle="sidebar" data-overlay data-target="#app-chat-contacts"></i>
                                    <div class="flex-shrink-0 avatar">
                                        <img src="/storage/{{ $current_ticket->user->profile_pic }}" alt="آواتار"
                                            class="rounded-circle" data-bs-toggle="sidebar" data-overlay
                                            onerror="this.src='/storage/images/user_profiles/blank.png'" 
                                            data-target="#app-chat-sidebar-right">
                                    </div>
                                    <div class="chat-contact-info flex-grow-1 ms-3">
                                        <h6 class="m-0">{{ $current_ticket->user->username }}</h6>
                                        <small class="user-status text-muted">{{ $current_ticket->user->email }}</small>
                                    </div>
                                </div>
                                {{-- <div class="d-flex align-items-center">
                                    <i class="bx bx-phone-call cursor-pointer d-sm-block d-none me-3 fs-4"></i>
                                    <i class="bx bx-video cursor-pointer d-sm-block d-none me-3 fs-4"></i>
                                    <i class="bx bx-search cursor-pointer d-sm-block d-none me-3 fs-4"></i>
                                    <div class="dropdown d-flex align-self-center">
                                        <button class="btn p-0" type="button" id="chat-header-actions"
                                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded fs-4"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end"
                                            aria-labelledby="chat-header-actions">
                                            <a class="dropdown-item" href="javascript:void(0);">نمایش مخاطب</a>
                                            <a class="dropdown-item" href="javascript:void(0);">بیصدا کردن اعلان‌ها</a>
                                            <a class="dropdown-item" href="javascript:void(0);">مسدود کردن مخاطب</a>
                                            <a class="dropdown-item" href="javascript:void(0);">پاکسازی گفتگو</a>
                                            <a class="dropdown-item" href="javascript:void(0);">گزارش</a>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                        <div class="chat-history-body bg-body">
                            <ul class="list-unstyled chat-history mb-0">
                                {{-- first show original msg --}}

                                <li class="user_msg chat-message chat-message-right">
                                    <div class="d-flex overflow-hidden">
                                        <div class="chat-message-wrapper flex-grow-1">
                                            <div class="chat-message-text">
                                                <p class="mb-0">{{ $current_ticket->content }}</p>
                                                @if ($current_ticket->attachment != null)
                                                    <p style="background-color: #eee;
                                                text-align: center;
                                                padding: .3rem;
                                                color: #555;
                                                font-weight: bold;
                                                cursor: pointer;
                                                border-radius: 10px;"
                                                        class="mb-0 ticket_download_btn">Download File

                                                    </p>
                                                    <input id="ticket_download_file" type="text"
                                                        style="display: none;"
                                                        value="{{ $current_ticket->attachment }}" />
                                                @endif
                                            </div>
                                            <div class="text-end text-muted mt-1">
                                                <i class="bx bx-check-double text-success"></i>
                                                <small>
                                                    {{ \Morilog\Jalali\Jalalian::forge($current_ticket->created_at)->format('%A, %d %B %y') }}</small>
                                            </div>
                                        </div>
                                        <div class="user-avatar flex-shrink-0 ms-3">
                                            <div class="avatar avatar-sm">
                                                <img src="/storage/{{ $current_ticket->user->profile_pic }}"
                                                    alt="آواتار" class="rounded-circle"   onerror="this.src='/storage/images/user_profiles/blank.png'">
                                            </div>
                                        </div>
                                    </div>
                                </li>



                                @foreach ($current_ticket->children as $ticket)
                                    @if ($ticket->status == 1)
                                        {{-- ticket is pending for response from admin and thus is from user --}}
                                        <li class="user_msg chat-message chat-message-right">
                                            <div class="d-flex overflow-hidden">
                                                <div class="chat-message-wrapper flex-grow-1">
                                                    <div class="chat-message-text">
                                                        <p class="mb-0">{{ $ticket->content }}</p>
                                                        @if ($ticket->attachment != null)
                                                            <p style="background-color: #eee;
                                                text-align: center;
                                                padding: .3rem;
                                                color: #555;
                                                font-weight: bold;
                                                cursor: pointer;
                                                border-radius: 10px;"
                                                                class="mb-0 ticket_download_btn">Download File


                                                            </p>
                                                            <input id="ticket_download_file" type="text"
                                                                style="display: none;"
                                                                value="{{ $ticket->attachment }}" />
                                                        @endif
                                                    </div>
                                                    <div class="text-end text-muted mt-1">
                                                        <i class="bx bx-check-double text-success"></i>
                                                        <small>
                                                            {{ \Morilog\Jalali\Jalalian::forge($ticket->created_at)->format('%A, %d %B %y') }}</small>
                                                    </div>
                                                </div>
                                                <div class="user-avatar flex-shrink-0 ms-3">
                                                    <div class="avatar avatar-sm">
                                                        <img src="/storage/{{ $ticket->user->profile_pic }}"
                                                        onerror="this.src='/storage/images/user_profiles/blank.png'"
                                                           alt="آواتار" class="rounded-circle">
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @elseif($ticket->status == 100)
                                        {{-- // msg is ftom admin --}}

                                        <li class="admin_msg chat-message ">
                                            <div class="d-flex overflow-hidden">
                                                <div class="user-avatar flex-shrink-0 me-3">
                                                    <div class="avatar avatar-sm">
                                                        <img src="/storage/{{ $ticket->user->profile_pic }}"
                                                            class="rounded-circle">
                                                    </div>
                                                </div>
                                                <div class="chat-message-wrapper flex-grow-1">
                                                    <div class="chat-message-text">
                                                        <p class="mb-0">{{ $ticket->content }}</p>
                                                        @if ($ticket->attachment != null)
                                                            <p style="background-color: #eee;
                                                text-align: center;
                                                padding: .3rem;
                                                color: #555;
                                                font-weight: bold;
                                                cursor: pointer;
                                                border-radius: 10px;"
                                                                class="mb-0 ticket_download_btn">Download File
                                                                
                                                            </p>
                                                            <input id="ticket_download_file" type="text"
                                                                style="display: none;"
                                                                value="{{ $ticket->attachment }}" />
                                                        @endif

                                                    </div>

                                                    <div class="text-muted mt-1">
                                                        <small>
                                                            {{ \Morilog\Jalali\Jalalian::forge($ticket->created_at)->format('%A, %d %B %y') }}</small>

                                                    </div>
                                                </div>
                                            </div>
                                        </li>
                                    @endif
                                @endforeach





                            </ul>
                        </div>

                        <!-- Chat message form -->
                        <div class="chat-history-footer shadow-sm">
                            <form method="POST"  action="{{ route('admin.tickets.store') }}" enctype="multipart/form-data"
                            class="form-send-message d-flex justify-content-between align-items-center">
                                @csrf
                                <input type="text" style="display: none;" value="{{$current_ticket->subject}}" name="subject" />
                                <input type="text" style="display: none;" value="{{$current_ticket->id}}" name="reply_to_id" />
                                <input type="text" name="content" class="form-control message-input border-0 me-3 shadow-none"
                                    placeholder="پاسخ خود را بنویسید" required>
                                <div class="message-actions d-flex align-items-center">
                                    {{-- <i class="speech-to-text bx bx-microphone bx-sm cursor-pointer"></i> --}}
                                    <label for="attach-doc" class="form-label mb-0">
                                        <i class="bx bx-paperclip bx-sm cursor-pointer mx-3"></i>
                                        <input name="attachment" type="file" id="attach-doc" hidden>
                                    </label>
                                    <button type="submit" class="btn btn-primary d-flex send-msg-btn">
                                        <i class="bx bx-paper-plane me-md-1 me-0"></i>
                                        <span class="align-middle d-md-inline-block d-none">ارسال</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @include('components.admin.flash_messages')

                <!-- /Chat History -->

                <!-- Sidebar Right -->
                <div class="col app-chat-sidebar-right app-sidebar overflow-hidden" id="app-chat-sidebar-right">
                    <div
                        class="sidebar-header d-flex flex-column justify-content-center align-items-center flex-wrap px-4 pt-5">
                        <div class="avatar avatar-xl avatar-online">
                            <img src="../../assets/img/avatars/2.png"   onerror="this.src='/storage/images/user_profiles/blank.png'"
                             alt="آواتار" class="rounded-circle">
                        </div>
                        <h6 class="mt-2 mb-0">دیوید بکهام</h6>
                        <span>توسعه دهنده NextJS</span>
                        <i class="bx bx-x bx-sm cursor-pointer close-sidebar d-block" data-bs-toggle="sidebar"
                            data-overlay data-target="#app-chat-sidebar-right"></i>
                    </div>
                    <div class="sidebar-body px-4 pb-4">
                        <div class="my-4">
                            <p class="text-muted text-uppercase">درباره</p>
                            <p class="mb-0 mt-3">
                                لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                                چاپگرها و متون بلکه روزنامه و
                            </p>
                        </div>
                        <div class="my-4">
                            <p class="text-muted text-uppercase">اطلاعات شخصی</p>
                            <ul class="list-unstyled d-grid gap-2 mt-3">
                                <li class="d-flex align-items-center">
                                    <i class="bx bx-envelope"></i>
                                    <span class="align-middle ms-2">لورم ایپسوم متن ساختگی</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bx bx-phone-call"></i>
                                    <span class="align-middle ms-2">+1(123) 456 - 7890</span>
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="bx bx-time-five"></i>
                                    <span class="align-middle ms-2">شنبه الی پنجشنبه - 10صبح الی 8 شب</span>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-4">
                            <p class="text-muted text-uppercase">گزینه‌ها</p>
                            <ul class="list-unstyled d-grid gap-2 mt-3">
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="bx bx-tag"></i>
                                    <span class="align-middle ms-2">افزودن برچسب</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="bx bx-star"></i>
                                    <span class="align-middle ms-2">درون‌ریزی مخاطب</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="bx bx-image"></i>
                                    <span class="align-middle ms-2">به اشتراک گذاری رسانه</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="bx bx-trash"></i>
                                    <span class="align-middle ms-2">حذف مخاطب</span>
                                </li>
                                <li class="cursor-pointer d-flex align-items-center">
                                    <i class="bx bx-block"></i>
                                    <span class="align-middle ms-2">مسدود کردن مخاطب</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /Sidebar Right -->

                <div class="app-overlay"></div>
            </div>
        </div>
    </div>
@endsection
