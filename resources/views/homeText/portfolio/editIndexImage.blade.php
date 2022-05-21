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
                                    <form class="form-valide" action="{{ route('add-portfolio.update',$cont->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h3>ผลงาน</h3>
                                        <p>เเก้ไข ภาพ</p>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ภาพพื้นหลัง  800*600<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="backgroundImageService">Upload</label>
                                                    <input type="file" class="form-control @error('backgroundImagePortfolio') is-invalid @enderror" name="backgroundImagePortfolio" id="inputGroupFile01">
                                                    @error('backgroundImagePortfolio')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                     @enderror  
                                                </div>
                                                <p class="">ภาพปัจจุบัน:: {{ $cont->backgroundImagePortfolio}}</p>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ H1 <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textH1NamePortfolio') is-invalid @enderror" id="val-username" value="{{ $cont->textH1NamePortfolio}}" name="textH1NamePortfolio" placeholder="ข้อความ H1..">
                                                @error('textH1NamePortfolio')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ P <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textPNamePortfolio') is-invalid @enderror" id="val-username"  value="{{ $cont->textPNamePortfolio}}" name="textPNamePortfolio" placeholder="ข้อความ P..">
                                                @error('textPNamePortfolio')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">หมวดหมู่ภาพ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" name="statusImage" aria-label="Default select example">
                                                    <option value="1">ใบประกาศ</option>
                                                    <option value="2">เครื่องมือ</option>
                                                    <option value="3">ภาพผลงาน</option>
                                                  </select>
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


