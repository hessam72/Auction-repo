@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title"> برندگان </h5>
                <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0 primary-font">
                    <div class="col-md-4 user_role"></div>
                    <div class="col-md-4 user_plan"></div>
                    <div class="col-md-4 user_status"></div>
                </div>

                @include('components.admin.flash_messages')


            </div>

            {{-- item lists --}}
            <div class="card-datatable table-responsive " style="padding: 0 3rem;">

                <table id="example" class="table table-striped border-top">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>نام </th>
                            <th>ایمیل </th>
                            <th>محصول</th>

                            <th> قیمت</th>
                            <th>   وضعیت</th>
                            <th>تاریخ</th>
                            {{-- <th>مدیریت</th> --}}

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($winners as $winner)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $winner->user->username }}</td>
                                <td>{{ $winner->user->email }}</td>
                                <td>{{ $winner->product->title }}</td>
                                <td>${{ $winner->win_price }}</td>
                                {{-- 	1=> new - unpaid win / 2=>waiting payment / 100=>paid win / 300=>expire win 200=>converted to bid --}}
                                <td>
                                    @if ($winner->status === 1)
                                        <p style="color:rgb(119, 128, 0)"> جدید (پرداخت نشده) </p>
                                    @elseif($winner->status === 2)
                                        <p style="color:rgb(255, 208, 0)"> در انتظار پرداخت </p>
                                    @elseif($winner->status === 100)
                                        <p style="color:rgb(0, 175, 6)"> پرداخت شده </p>
                                    @elseif($winner->status === 300)
                                        <p style="color:red"> منقظی شده </p>
                                    @elseif($winner->status === 200)
                                        <p style="color:rgb(1, 137, 170)"> تبدیل شده به بید </p>
                                   
                                    @endif
                                </td>
                               <td>{{ \Morilog\Jalali\Jalalian::forge($winner->created_at) }}</td>

                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>نام </th>
                            <th>ایمیل </th>
                            <th>محصول</th>

                            <th> قیمت</th>
                            <th>   وضعیت</th>
                            <th>تاریخ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
