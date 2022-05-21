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
        

        <br />
        <br />
        <br />
        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="login-form-bg h-100">
                <div class="container h-100">
                    <div class="row justify-content-center h-100">
                        <div class="col-xl-6">
                            <div class="form-input-content">
                                <div class="card login-form mb-0">
                                    <div class="card-body pt-5">
                                        
                                            <a class="text-center" > <h4>เพิ่ม สาขา</h4></a>
                
                                        <form class="mt-5 mb-5 login-input" method="POST" action="{{ route('branch.store') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"  autocomplete="name" placeholder="ชื่อ ร้าน" required>
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="branch" type="text" class="form-control @error('branch') is-invalid @enderror" name="branch" value="{{ old('branch') }}"  autocomplete="branch" autofocus placeholder="สาขา" required>
                                                @error('branch')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="name" type="text" class="form-control @error('branchPhone') is-invalid @enderror" name="branchPhone" value="{{ old('name') }}"  autocomplete="p" placeholder="เบอร์ติดต่อ ร้าน (หลัก)" required>
                                                @error('branchPhone')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <input id="name" type="text" class="form-control @error('branchPhoneReserve') is-invalid @enderror" name="branchPhoneReserve" value="{{ old('branchPhoneReserve') }}"  autocomplete="p" placeholder="เบอร์ติดต่อ ร้าน (สำรอง)" required>
                                                @error('branchPhoneReserve')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <textarea id="particulars" type="text" class="form-control @error('otherContacts') is-invalid @enderror" name="otherContacts"  autocomplete="new-password"  placeholder="การติดต่อื่น ๆ " required rows="5"></textarea>
                                                @error('otherContacts')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                            <div class="form-group">
                                                <textarea id="particulars" type="text" class="form-control @error('particulars') is-invalid @enderror" name="particulars"  autocomplete="new-password"  placeholder="รายละเอียด ที่อยู่ร้าน" required rows="5"></textarea>
                                                @error('particulars')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
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
    <script type="text/javascript">
       CKEDITOR.replace( 'otherContacts' );
            CKEDITOR.replace( 'particulars' );
    </script>
@endsection


