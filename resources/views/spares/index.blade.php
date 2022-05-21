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
                                        <a type="button" href="{{ url('create-spares') }}" class="btn btn-primary">เพิ่ม
                                            อุปกรณ์อะไหล่</a>
                                        <form class="search-right" action="{{ url('spares') }}" method="get">
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
                                                    <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                                    <th class="sorting" style="width: 117.859px;">ยี่ห้อ</th>
                                                    <th class="sorting" style="width: 117.859px;">รุ่น</th>
                                                    <th class="sorting" style="width: 117.859px;">โมเดล</th>
                                                    <th class="sorting" style="width: 117.859px;">อุปกรณ์</th>
                                                    <th class="sorting" style="width: 117.859px;">เกรด</th>
                                                    <th class="sorting" style="width: 57.859px;">ราคา</th>
                                                    <th class="sorting" style="width: 117.859px;">กลุ่ม</th>
                                                    <th class="sorting" style="width: 117.859px;">ร้านอะไหล่</th>
                                                    <th class="sorting" style="width: 117.859px;">วันที่เเก้ไข</th>
                                                    <th class="sorting" style="width: 417.859px;">เเก้ไข/ลบ</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $i = 0;
                                                @endphp
                                                @foreach ($gener as $group)
                                                    <tr role="row" class="odd">
                                                        <td>{{ ++$i }}</td>
                                                        <td>{{ $group->brandName }}</td>
                                                        <td>{{ $group->deviceModel }}</td>
                                                        <td>{{ $group->model }}</td>
                                                        <td>{{ $group->nameItem }}</td>
                                                        <td>{{ $group->gradeName }}</td>
                                                        <td>{{ $group->price }}</td>
                                                        <td>{{ $group->groupName }}</td>
                                                        <td>{{ $group->nameStore }}</td>
                                                        <td>{!! $group->updated_at !!}</td>
                                                        <td>
                                                            <a type="button" href="{{ route('spares.show', $group->id) }}"
                                                                class="btn btn-info">ดู</a>
                                                            <a type="button" href="{{ route('spares.edit', $group->id) }}"
                                                                class="btn btn-primary">เเก้ไข</a>
                                                            <a type="button"
                                                                onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');"
                                                                href="{{ url('delete-spares', $group->id) }}"
                                                                class="btn btn-danger">ลบ</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                        {!! $gener->links('pagination::bootstrap-4') !!}
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
