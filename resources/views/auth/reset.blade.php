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
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5">
                                <a class="text-center" href="#"> 
                                    <h4>ยื่นยัน E-mail</h4>
                                    <br>
                                    <p class="text-primary">{{ Session::get('messageReset') }}</p>
                                </a>
        
                                <form class="mt-5 mb-5 login-input"  method="get" action="{{ url('reset-pass') }}">
                                    @csrf
                                    <div class="form-group">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"  autocomplete="email" placeholder="Email" required>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                    </div>
                                   
                                    <button class="btn login-form__btn submit w-100">ยื่นยัน</button>
                                </form>
                                <p class="mt-5 login-form__footer">กลับไป หน้าเเรก ? <a href="{{ url('/') }}" class="text-primary">go back</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
@endsection
