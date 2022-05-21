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
                                    <form class="form-valide" action="{{ route('add-contactTop.update',$cont->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h3>เเก้ไข ข้อมูล ติดต่อเรา TOP</h3>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Icon 1  <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input  class="form-control  @error('iconTop1') is-invalid @enderror" id="val-username" value="{{$cont->iconTop1}}" name="iconTop1" placeholder="<i class='fas fa-badge'></i>" rows="4">
                                                @error('iconTop1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ  <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input  class="form-control  @error('textTop1') is-invalid @enderror" id="val-username" value="{{$cont->textTop1}}" name="textTop1" placeholder="ข้อความ .." rows="4">
                                                @error('textTop1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Icon 2  <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input  class="form-control  @error('iconTop2') is-invalid @enderror" id="val-username"  value="{{$cont->iconTop2}}" name="iconTop2" placeholder="<i class='fas fa-badge'></i>" rows="4">
                                                @error('iconTop2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ  <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input  class="form-control  @error('textTop2') is-invalid @enderror" id="val-username"  value="{{$cont->textTop2}}" name="textTop2" placeholder="ข้อความ .." rows="4">
                                                @error('textTop2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>


                       
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">บันทึก</button>
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


