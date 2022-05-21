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
                                    <h4>Reset Password</h4>
                                </a>
                                @foreach ($user as $user)
                                <form class="mt-5 mb-5 login-input"  method="POST" action="{{ route('reset.update',$user->id) }}">
                                    @csrf
                                    @method('PUT')
                                        <div class="form-group">
                                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username}}"  autocomplete="Username" autofocus placeholder="Username" disabled>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}"  autocomplete="email" placeholder="Email" disabled>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <input  id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password"  placeholder="Password" required>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="password_confirmation" autocomplete="new-password">
                                            </div>
                                        </div>
                                    <button type="submit" class="btn login-form__btn submit w-100">บันทึก</button>
                                </form>
                                @endforeach
                                <p class="mt-5 login-form__footer">กลับไป หน้าเเรก ? <a href="{{ url('/') }}" class="text-primary">go back</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    
@endsection
