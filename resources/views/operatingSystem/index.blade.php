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
                            <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <a type="button" href="{{ url('create-system') }}" class="btn btn-primary">เพิ่ม
                                            ระบบปฏิบัติการ</a>

                                        <br>
                                        <br>
                                        <table class="table table-hover">
                                            <thead class="">
                                                <tr role="row">
                                                    <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                                    <th class="sorting" style="width: 317.859px;">ระบบปฏิบัติการ</th>
                                                    <th class="sorting" style="width: 117.859px;">วันที่เเก้ไข</th>
                                                    <th class="sorting" style="width: 117.859px;">เเก้ไข/ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($systems as $sys)
                                                    <tr role="row" class="odd">
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $sys->systemName }}</td>
                                                        <td>{{ $sys->updated_at }}</td>
                                                        <td>
                                                            <a type="button" href="{{ route('system.edit', $sys->id) }}"
                                                                class="btn btn-primary">เเก้ไข</a>
                                                            @if (Auth::user()->status === '0')
                                                                <a type="button"
                                                                    onClick="javascript:return confirm('รายการที่เกี่ยวกับ ระบบปฏิบัติการ {{ $sys->systemName }} ทั้งหมด จะถูกลบ คุณต้องการลบข้อมูลใช่หรือไม่');"
                                                                    href="{{ url('delete-system', $sys->id) }}"
                                                                    class="btn btn-danger">ลบ</a>
                                                            @else
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
