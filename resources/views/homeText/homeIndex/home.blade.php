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
                                    <form class="form-valide" action="{{ url('create-home') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <h3>หน้าเเรก</h3>
                                        <p>H1  คือ ข้อความตัวใหญ่</p>
                                        <p>P  คือ ข้อความตัวเล็ก</p>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ชื่อเว็บ<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('webName') is-invalid @enderror" id="val-username" name="webName" placeholder="ชื่อเว็บไชต์">
                                                @error('webName')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ภาพพื้นหลัง  1920*808 <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupFile01">Upload</label>
                                                    <input type="file" class="form-control @error('backgroundImageTop') is-invalid @enderror" name="backgroundImageTop" id="inputGroupFile01">
                                                    @error('backgroundImageTop')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                     @enderror  
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ H1 <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control  @error('textH1Name') is-invalid @enderror" id="val-username" name="textH1Name" placeholder="ข้อความ H1..">
                                                @error('textH1Name')
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
                                                <input type="text" class="form-control @error('textPName') is-invalid @enderror" id="val-username" name="textPName" placeholder="ข้อความ P..">
                                                @error('textPName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ H1 box สีส้ม <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textH1NameOrange') is-invalid @enderror" id="val-username" name="textH1NameOrange" placeholder="ข้อความ H1 box ..">
                                                @error('textH1NameOrange')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ P box สีส้ม<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textPNameOrange') is-invalid @enderror" id="val-username" name="textPNameOrange" placeholder="ข้อความ P box..">
                                                @error('textPNameOrange')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Icon box 1  <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('iconBox1') is-invalid @enderror" id="val-username" name="iconBox1" placeholder="<i class='fas fa-kaaba'></i>">
                                                @error('iconBox1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ H1  box 1   สีขาว<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control  @error('textH1NameBox1') is-invalid @enderror" id="val-username" name="textH1NameBox1" placeholder="ข้อความ H1  box 1..">
                                                @error('textH1NameBox1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ P box 1   สีขาว<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textPNameBox1') is-invalid @enderror" id="val-username" name="textPNameBox1" placeholder="ข้อความ P box 1..">
                                                @error('textPNameBox1')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Icon box 2   สีขาว<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('iconBox2') is-invalid @enderror" id="val-username" name="iconBox2" placeholder="<i class='fas fa-kaaba'></i>">
                                                @error('iconBox2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ H1  box 2   สีขาว <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textH1NameBox2') is-invalid @enderror" id="val-username" name="textH1NameBox2" placeholder="ข้อความ H1  box 2..">
                                                @error('textH1NameBox2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username"> ข้อความ P box 2   สีขาว <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textPNameBox2') is-invalid @enderror" id="val-username" name="textPNameBox2" placeholder="ข้อความ P box 2..">
                                                @error('textPNameBox2')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">Icon box 3   สีขาว<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control  @error('iconBox3') is-invalid @enderror" id="val-username" name="iconBox3" placeholder="<i class='fas fa-kaaba'></i>">
                                                @error('iconBox3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ H1  box 3   สีขาว <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control  @error('textH1NameBox3') is-invalid @enderror" id="val-username" name="textH1NameBox3" placeholder="ข้อความ H1  box 3..">
                                                @error('textH1NameBox3')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ P box 3   สีขาว <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('textPNameBox3') is-invalid @enderror" id="val-username" name="textPNameBox3" placeholder="ข้อความ P box 3..">
                                                @error('textPNameBox3')
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


