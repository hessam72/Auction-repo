@extends('admin.app')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">

        <div class="card">
            <div style="display: flex;
            justify-content: space-between;" class="card-header border-bottom">
                <h5 class="card-title"> اعلان ها </h5>
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
                            <th>عنوان </th>
                            <th>محتوا </th>
                            <th>تاریخ</th>

                          

                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        @foreach ($notifications as $notify)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $notify->title }}</td>
                                <td>{{ $notify->description }}</td>
                                <td>{{ \Morilog\Jalali\Jalalian::forge($notify->created_at) }}</td>
                               
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>عنوان </th>
                            <th>محتوا </th>
                            <th>تاریخ</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
