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
                                        <a type="button" href="{{ url('create-group') }}" class="btn btn-primary">เพิ่ม
                                            หมวดหมู่งานซ่อม</a>

                                        <br>
                                        <br>
                                        <table class="table table-hover">
                                            <thead class="">
                                                <tr role="row">
                                                    <th class="sorting_asc" style="width: 40.219px;">Id</th>
                                                    <th class="sorting" style="width: 117.859px;">กลุ่มงานซ่อม</th>
                                                    <th class="sorting" style="width: 67.859px;">ผลกำไร</th>
                                                    <th class="sorting" style="width: 77.859px;">จำนวนอะไหล่</th>
                                                    <th class="sorting" style="width: 117.859px;">จำนวนงาน</th>
                                                    <th class="sorting" style="width: 117.859px;">วันที่เเก้ไข</th>
                                                    <th class="sorting" style="width: 117.859px;">เเก้ไข/ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @inject('countSparesId', 'App\Http\Controllers\RepairWorkGroupController')
                                                @foreach ($groups as $group)
                                                    <tr role="row" class="odd">
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $group->groupName }}</td>
                                                        <td>{{ $group->profit }}</td>
                                                        <td>
                                                            {{ $countSparesId->countSpares($group->id) }}
                                                        </td>
                                                        <td>
                                                            {{ $countSparesId->countJob_systems($group->id) }}
                                                        </td>
                                                        <td>{{ $group->updated_at }}</td>
                                                        <td>
                                                            <a type="button"
                                                                href="{{ route('repair-group.edit', $group->id) }}"
                                                                class="btn btn-primary">เเก้ไข</a>
                                                            <a type="button"
                                                                onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"
                                                                href="{{ url('delete-group', $group->id) }}"
                                                                class="btn btn-danger">ลบ</a>
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
