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
            <div class="table-responsive">
                <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>บริการ</h3>
                            @if (!$countData)
                            <a type="button" href="{{url('add-textServices')}}" class="btn btn-primary">เพิ่ม ข้อความ </a>
                            @else
                            @endif
                            <a type="button" href="{{url('add-imageServices')}}" class="btn btn-primary">เพิ่ม Icon </a>
                            <a type="button" href="{{url('add-serviceBack')}}" class="btn btn-primary">เพิ่ม ภาพ </a>
                           
                            <br>
                            <br>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                        <th class="sorting" style="width: 417.859px;">ข้อความ</th>
                                        <th class="sorting" style="width: 117.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                @foreach ($servicesData as $cont)
                                    <tr role="row" class="odd">
                                        <td>{{++$i}}</td>
                                        <td>{{$cont->indexText}}</td>
                                        <td>
                                            <a type="button" href="{{route('add-textServices.edit',$cont->id)}}" class="btn btn-primary">เเก้ไข</a>
                                        </td>
                                    </tr>
                                @endforeach  
                              </tbody>
                            </table>

                            <br>
                            <br>
                            <h3>Icon</h3>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                        <th class="sorting" style="width: 417.859px;">Icon</th>
                                        <th class="sorting" style="width: 417.859px;">ข้อความ H1 Box1</th>
                                        <th class="sorting" style="width: 417.859px;">ข้อความ P  Box1</th>
                                        <th class="sorting" style="width: 500.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                @foreach ($servicesIndices as $indices)
                                    <tr role="row" class="odd">
                                        <td>{{++$i}}</td>
                                        <td>{!!$indices->iconBox1Service!!}</td>
                                        <td>{{$indices->textH1NameBox1Service}}</td>
                                        <td>{{$indices->textPNameBox1Service}}</td>
                                        <td>
                                            <a type="button" href="{{route('add-services.edit',$indices->id)}}" class="btn btn-primary">เเก้ไข</a>
                                            <a type="button" href="{{url('delete-services',$indices->id)}}" class="btn btn-danger">ลบ</a>
                                        </td>
                                    </tr>
                                @endforeach  
                              </tbody>
                            </table>
                            <br>
                            <br>
                            <h3>ภาพ</h3>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" style="width: 51.859px;">ID</th>
                                        <th class="sorting" style="width: 217.859px;">ข้อความ H1 Box2</th>
                                        <th class="sorting" style="width: 517.859px;">ข้อความ P Box2</th>
                                        <th class="sorting" style="width: 217.859px;">ภาพ</th>
                                        <th class="sorting" style="width: 400.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                @foreach ($backImages as $BackImg)
                                    <tr role="row" class="odd">
                                        <td>{{++$i}}</td>
                                        <td>{{$BackImg->textH1NameBox2Service}}</td>
                                        <td>{{$BackImg->textPNameBox2Service}}</td>
                                        <td>
                                            <img src="{{ asset('assets/img/service/'."".$BackImg->backgroundImageService)}}" height="50" width="80" alt="">
                                        </td>
                                        <td>
                                            <a type="button" href="{{route('add-serviceBack.edit',$BackImg->id)}}" class="btn btn-primary">เเก้ไข</a>
                                            <a type="button" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" href="{{url('delete-serviceBack',$BackImg->id)}}" class="btn btn-danger">ลบ</a>
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
        <!--**********************************
            Footer start
        ***********************************-->
        @include('bar.footer_min')
        <!--**********************************
            Footer end
        ***********************************-->
    </div>
@endsection


