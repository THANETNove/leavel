@extends('layouts.app_min')

@section('content')
    <!--*******************
            Preloader start
        ********************-->
    <div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <!--*******************
            Preloader end
        ********************-->


    <!--**********************************
            Main wrapper start
        ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
                Nav header start
            ***********************************-->

        @include('bar.nav_bar')

        @include('bar.navBar_left')


        <!--**********************************
                Content body start
            ***********************************-->
        <div class="content-body">
            <br>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class=" container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12 container">
                                        <a type="button" href="{{ url('create-job-system') }}" class="btn btn-primary">เพิ่ม
                                            เปิดงานซ่อม</a>
                                        <form class="search-right" action="{{ url('job-system') }}" method="get">
                                            @csrf
                                            <input class="form-control" name="search" placeholder="Search"
                                                aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit">Search</button>
                                        </form>
    
                                        <br>
                                        <br>
                                        <table class="table table-hover">
                                            <thead class="">
                                                <tr role="row">
                                                    <th class="col" style="width: 50.219px;">Id</th>
                                                    <th class="sorting" style="width: 117.859px">ชื่อ</th>
                                                    <th class="sorting" style="width: 117.859.px;">เบอร์ติดต่อ</th>
                                                    <th class="sorting" style="width: 117.859.px;">ยี่ห้อ</th>
                                                    <th class="sorting" style="width: 117.859.px;">รุ่น</th>
                                                    <th class="sorting" style="width: 117.859.px;">กลุ่ม</th>
                                                    <th class="sorting" style="width: 117.px;">วันที่บันทึก</th>
                                                    <th class="sorting" style="width: 417.859px;">เเก้ไข/ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($data as $da)
                                                    <tr role="row" class="odd">
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $da->username }}</td>
                                                        <td>{{ $da->phone }}</td>
                                                        <td>{{ $da->brandName }}  </td>
                                                         <td>{{ $da->deviceModel }}</td>
                                                        <td>{{ $da->groupName }}</td>
                                                        <td>{{ $da->updated_at }}</td>
                                                        <td>
                                                            <a type="button"
                                                                onClick="javascript:return confirm('คุณต้องการยันยันการซ่อม');"
                                                                href="{{ url('statusJob', $da->id) }}"
                                                                class="btn btn-indigo">ยันยัน</a>
                                                            <a type="button" href="{{ route('job-system.show', $da->id) }}"
                                                                class="btn btn-info">ดู</a>
                                                            <a type="button" href="{{ route('job-system.edit', $da->id) }}"
                                                                class="btn btn-primary">เเก้ไข</a>
                                                            <a type="button"
                                                                onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"
                                                                href="{{ url('delete-job-system', $da->id) }}"
                                                                class="btn btn-danger">ลบ</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $data->links('pagination::bootstrap-4') !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!--**********************************
                Footer start
            ***********************************-->
        @include('bar.footer_min')

        <!--**********************************
                Footer end
            ***********************************-->
    </div>
@endsection
