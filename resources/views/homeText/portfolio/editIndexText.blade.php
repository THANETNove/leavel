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
                                    <form class="form-valide" action="{{ route('add-textPortfolio.update',$cont->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h3>ผลงาน</h3>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">เเก้ไข ข้อความ  <span class="text-danger">*</span>
                                            </label>
                                          
                                            <div class="col-lg-6">
                                                <textarea  class="form-control  @error('textPortfolio') is-invalid @enderror" id="val-username" value="{{$cont->textPortfolio}}" name="textPortfolio" rows="4">{{$cont->textPortfolio}}</textarea>
                                                @error('textPortfolio')
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


