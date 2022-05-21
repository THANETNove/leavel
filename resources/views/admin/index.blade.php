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


        <br />
        <br />
        <br />
        <!--**********************************
                Content body start
            ***********************************-->
        <div class="content-body">

            <!--**********************************-->
            <a href="{{ url('add-admin') }}">
                <div class="col-lg-3 col-sm-6">
                    <div class="card gradient-3">
                        <div class="card-body">
                            <div class="d-inline-block">
                                <h2 class="text-white">{{ $countUser }}</h2>
                                <p class="text-white mb-0">เพิ่ม Admin</p>
                            </div>
                            <a class="float-right display-5 opacity-5" href="{{ url('add-admin') }}"><i
                                    class="fas fa-user-plus"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </a>

            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover">
                                            <thead class="">
                                                <tr role="row">
                                                    <th class="sorting_asc" style="width: 130.219px;">Id</th>
                                                    <th class="sorting" style="width: 217.859px;">Usersname</th>
                                                    <th class="sorting" style="width: 217.859px;">E-mail</th>
                                                    <th class="sorting" style="width: 217.859px;">สาขา</th>
                                                    <th class="sorting" style="width: 117.859px;">วันที่บันทึก</th>
                                                    <th class="sorting" style="width: 117.859px;">วันที่เเก้ไข</th>
                                                    <th class="sorting" style="width: 217.859px;">ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($user as $rec)
                                                    <tr role="row" class="odd">
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $rec->username }}</td>
                                                        <td>{{ $rec->email }}</td>
                                                        <td>
                                                            @if (!$rec->branch)
                                                                <p class="color-text">Admin หลัก</p>
                                                            @else
                                                                {{ $rec->branch }}
                                                            @endif

                                                        </td>
                                                        <td>{{ $rec->created_at }}</td>
                                                        <td>{{ $rec->updated_at }}</td>
                                                        <td>
                                                            @if ($rec->status === '0')
                                                                <p class="color-text">ไม่สามารถ ลบหรือเเก้ไขได้</p>
                                                            @else
                                                                <a type="button" href="{{ url('edit-user', $rec->id) }}"
                                                                    class="btn btn-primary">เเก้ไข</a>
                                                                <a type="button"
                                                                    onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"
                                                                    href="{{ url('delete-user', $rec->id) }}"
                                                                    class="btn btn-danger">ลบ</a>
                                                            @endif

                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
