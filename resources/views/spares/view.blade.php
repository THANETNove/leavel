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

            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-validation">
                                    @foreach($flight as $cont)
                                    <form class="form-valide" action="{{ route('spares.update',$cont->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h3>รายละเอียด อุปกรณ์อะไหล่</h3>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" for="val-username">ยี่ห้อ  รุ่น เเละ โมเดล อุปกรณ์<span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p>ยี่ห้อ : {{$cont->brandName}} , รุ่น : {{$cont->deviceModel}}  ,โมเดล : {{$cont->model}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" for="val-username">กลุ่มอุปกรณ์ <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p>{{$cont->groupName}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" for="val-username">ชื่ออุปกรณ์ <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p>{{$cont->nameItem}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" for="val-username">รายคา อะไหล่ <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p>{{$cont->price  }}  บาท</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" for="val-username">เกรด อะไหล่ <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p>{{$cont->gradeName}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" for="val-username">อุปกรณ์ที่รองรับ <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p>{!!$cont->modelExplain!!} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-control" for="val-username">ร้านค้า <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p>{{$cont->nameStore}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-control" for="val-username">เบอร์ติดต่อ ร้านค้า <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                               
                                            <p>{{$cont->phone}} </p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <p class="col-lg-4 col-form-label" for="val-username">รายละเอียด ร้านค้า <span class="text-danger">*</span>
                                            </p>
                                            <div class="col-lg-6">
                                                <p >{!! $cont->explain !!}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <a href="{{ url('spares') }}" class="btn btn-primary">ย้อนกลับ</a>
                                            </div>
                                        </div>
                                    </form>
                                    @endforeach
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


