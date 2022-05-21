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

    <br>
    <br>
    <br>
    <br>
    <br>



    <div class="login-form-bg h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100">
                <div class="col-md-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"> <h4>เข้าสู่ระบบ</h4></a>
                                <br>
                                <p class="text-primary">{{ Session::get('messageFinish') }}</p>
        
                                <form class="mt-5 mb-5 login-input"  method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input   id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus  placeholder="username">
                                        @error('username')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="btn login-form__btn submit w-100">เข้าสู่ระบบ</button>
                                </form>
                                <p class="mt-5 login-form__footer">กลับไป หน้าเเรก ? <a href="{{ url('/') }}" class="text-primary">go back</a> & <a  href="{{ url('reset') }}" class="text-primary">reset password</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
@endsection
