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
                                    <form class="form-valide" action="#" method="post" novalidate="novalidate">
                                        <h3>ผลงาน</h3>
                                        <p>H1  คือ ข้อความตัวใหญ่</p>
                                        <p>P  คือ ข้อความตัวเล็ก</p>
                                          <div class="form-group row">
                                              <label class="col-lg-4 col-form-label" for="val-username">ข้อความ H1 ตรงกลาง   <span class="text-danger">*</span>
                                              </label>
                                              <div class="col-lg-6">
                                                  <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ข้อความ P ตรงกลาง   <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-username" name="val-username" placeholder="Enter a username..">
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


