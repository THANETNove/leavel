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
                                    <form class="form-valide" action="{{ route('risk.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <h3>เพิ่ม ความเสี่ยง</h3>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ความเสี่ยง <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('riskName') is-invalid @enderror" id="val-username" name="riskName" placeholder="0.5 ">
                                                @error('riskName')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ร้านค้า หรือ สาขา<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                @if (!$storeCount)
                                                        <p class="color-text">ยังไม่สามารถเพิ่มข้อมูลได้ กรุณาเพิ่ม ร้าน หรือ สาขาก่อน ก่อน</p>
                                                            @error('brancheId	')
                                                            <p class="color-text"> {{ 'ยังไม่สามารถเพิ่มข้อมูลได้ '}}</p>
                                                            @enderror
                                                        </p>
                                                    
                                                @else
                                                    <select class="form-control" name="brancheId" aria-label="Default select example">
                                                        @foreach ($store as $gen)
                                                            <option value="{{$gen->id}}">{{$gen->name}}&amp; {{$gen->branch}}</option>
                                                        @endforeach
                                                    </select>
                                                
                                                @endif
                                                @error('brancheId')
                                                <p class="color-text"> {{ 'ร้านที่เลือก มีค่าความเสี่ยงอยู่เเล้ว'}}</p>
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
    <script>
        CKEDITOR.replace( 'modelExplain' );
    </script>
@endsection


