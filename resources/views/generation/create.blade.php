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
                                    <form class="form-valide" action="{{ route('generation.store') }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        <h3>เพิ่ม รุ่นอุปกรณ์</h3>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ยี่ห้ออุปกรณ์ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" id="brandGroup" value="" class="form-control input-lg" placeholder="Enter Country Name" />
                                                <input type="text" name="brandGroup" id="brandGroup-id"  class="form-control input-lg  @error('brandGroup') is-invalid @enderror" placeholder="Enter Country Name" style="display:none">
                                                <div id="countryList">
                                                </div>
                                                @error('brandGroup')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">รุ่นอุปกรณ์ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('deviceModel') is-invalid @enderror" id="val-username" name="deviceModel" placeholder="ข้อความ ">
                                                @error('deviceModel')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">โมเดลอุปกรณ์ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('model') is-invalid @enderror" id="val-username" name="model" placeholder="ข้อความ ">
                                                @error('model')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
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

    <script type="text/javascript">


        $(document).ready(function(){

            $('#brandGroup').keyup(function(){ 
                var query = $(this).val();
                console.log(query);
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                    url:"{{ url('autocomplete') }}",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data){
                    $('#countryList').fadeIn();  
                           
                            $('#countryList').html(data);
                    }
                    });
                }
            });

            $("#countryList").on('click', 'li', function(){  
                //console.log($(this).attr("id"));
                //console.log($(this).text());
                $('#brandGroup').val($(this).text());
                $('#brandGroup-id').val($(this).attr("id"));  
                $('#countryList').fadeOut();  
            });  

            });
</script>


@endsection



