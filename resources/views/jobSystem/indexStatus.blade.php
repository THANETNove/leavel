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
                                        <form class="search-right" action="{{ url('job-Status') }}" method="get">
                                            @csrf
                                            <input class="form-control" name="search" placeholder="Search"
                                                aria-label="Search">
                                            <button class="btn btn-outline-success" type="submit">Search</button>
                                        </form>
                                        @foreach ($dataStatus as $staus)
                                        @if ($staus->id === 2)
                                            <form class="search-left" action="{{ url('job-Status') }}" method="get">
                                                @csrf
                                                <input class="form-control" name="search" value="2"
                                                    placeholder="Search" aria-label="Search" style="display:none">
                                                <button class="btn btn-outline-success " type="submit">{{ $staus->statusServeName }}</button>
                                            </form>
                                        @elseif ($staus->id === 3)
                                            <form class="search-left" action="{{ url('job-Status') }}" method="get">
                                                @csrf
                                                <input class="form-control" name="search" value="3"
                                                    placeholder="Search" aria-label="Search" style="display:none">
                                                <button class="btn btn-outline-success " type="submit">{{ $staus->statusServeName }}</button>
                                            </form>
                                        @elseif ($staus->id === 4)
                                            <form class="search-left" action="{{ url('job-Status') }}" method="get">
                                                @csrf
                                                <input class="form-control" name="search" value="4" placeholder="Search"
                                                    aria-label="Search" style="display:none">
                                                <button class="btn btn-outline-success " type="submit">{{ $staus->statusServeName }}</button>
                                            </form>
                                        @elseif ($staus->id === 5)
                                            <form class="search-left" action="{{ url('job-Status') }}" method="get">
                                                @csrf
                                                <input class="form-control" name="search" value="5"
                                                    placeholder="Search" aria-label="Search" style="display:none">
                                                <button class="btn btn-outline-success " type="submit">{{ $staus->statusServeName }}</button>
                                            </form>
                                        @elseif ($staus->id === 6)
                                            <form class="search-left" action="{{ url('job-Status') }}" method="get">
                                                @csrf
                                                <input class="form-control" name="search" value="6"
                                                    placeholder="Search" aria-label="Search" style="display:none">
                                                <button class="btn btn-outline-success "
                                                    type="submit">{{ $staus->statusServeName }}</button>
                                            </form>
                                        @elseif ($staus->id === 1)
                                            <form class="search-left" action="{{ url('job-Status') }}" method="get">
                                                @csrf
                                                <input class="form-control" name="search" value="1"
                                                    placeholder="Search" aria-label="Search" style="display:none">
                                                <button class="btn btn-outline-success" type="submit">{{ $staus->statusServeName }}</button>
                                            </form>
                                        @endif
                                        @endforeach
                                        <a href="{{ url('job-Status') }}" class="btn btn-indigo search-left "
                                            type="submit">ทั้งหมด</a>


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
                                                    <th class="sorting" style="width: 117.px;">สถานะ</th>
                                                    <th class="sorting" style="width: 117.px;">วันที่เเก้ไข</th>
                                                    <th class="sorting" style="width: 317.859px;">เเก้ไข/ลบ</th>
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
                                                        <td>{{ $da->brandName }}</td>
                                                        <td> {{ $da->deviceModel }}</td>
                                                        <td>{{ $da->groupName }}</td>
                                                        <td>
                                                            <br />
                                                            @if ($da->statusJob == '2')
                                                                <p class="color-textIndigo">{{ $da->statusServeName }}</p>
                                                            @elseif ($da->statusJob == "3")
                                                                <p class="color-text">{{ $da->statusServeName }}</p>
                                                            @elseif ($da->statusJob == "4")
                                                                <p class="color-textSorrel">{{ $da->statusServeName }}</p>
                                                            @elseif ($da->statusJob == "5")
                                                                <p class="color-textBlue">{{ $da->statusServeName }}</p>
                                                            @elseif ($da->statusJob == "6")
                                                                <p class="color-textGreen">{{ $da->statusServeName }}</p>
                                                            @else
                                                                <p class="color-textDed">{{ $da->statusServeName }}</p>
                                                            @endif

                                                        </td>
                                                        <td>{{ $da->updated_at }}</td>
                                                        <td>

                                                            <button type="button" data-id="{{ $da->id }}"
                                                                data-branch="{{ $da->commentBranch }}"
                                                                data-mend="{{ $da->commentMend }}"
                                                                data-name="{{ $da->statusJob }}"
                                                                class="btn btn-indigo edit" data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal">
                                                                สถานะ
                                                            </button>
                                                            <a type="button" href="{{ url('job-system-show', $da->id) }}"
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


        <!-- Button trigger modal -->


        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">สถานะการซ่อม</h5>
                        <p id="statusName" class="color-textIndigo"></p>
                    </div>
                    @php
                    @endphp

                    <form class="form-valide" action="{{ url('statusJobEdit') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <input class="form-control" id="dataId" name="id" style="display:none">
                            <select class="form-control" id="status" name="status" aria-label="Default select example">
                                @foreach ($dataStatus as $status)
                                    <option value="{{ $status->id }}">{{ $status->statusServeName }}</option>
                                @endforeach
                            </select>
                            <br />
                            <textarea class="form-control" id="commentBranch" rows="3" name="commentBranch"
                                placeholder="รายละเอียด กรณีส่งซ่อม /  อื่นๆ"></textarea>
                            <br />
                            <textarea class="form-control" id="commentMend" rows="3" name="commentMend"
                                placeholder="รายละเอียด การซ่อม /  อื่นๆ"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" href="javascript:void(0)" class="btn btn-secondary"
                                data-bs-dismiss="modal">ยกเลิก</button>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $(document).ready(function() {
                $('body').on('click', '.edit', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var commentBranch = $(this).data('branch');
                    var commentMend = $(this).data('mend');

                    $('#statusName').html(name);
                    $('#status').val(name);
                    $('#commentMend').val(commentMend);
                    $('#commentBranch').val(commentBranch);
                    $('#dataId').val(id);
                });
            });
        </script>
        <!--**********************************
                Footer start
            ***********************************-->
        @include('bar.footer_min')

        <!--**********************************
                Footer end
            ***********************************-->
    </div>
@endsection
