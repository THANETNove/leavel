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
                                    <form class="form-valide" action="{{ route('spares.update',$cont->id) }}" method="POST" novalidate="novalidate" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <h3>เเก้ไข อุปกรณ์อะไหล่</h3>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ยี่ห้อ  รุ่น เเละ โมเดล อุปกรณ์<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                @if (!$generCount)
                                                        <p class="color-text">ยังไม่สามารถเพิ่มข้อมูลได้ กรุณาเพิ่ม เกรด อะไหล่อุปกรณ์ ก่อน</p>
                                                            @error('modelId')
                                                            <p class="color-text"> {{ 'ยังไม่สามารถเพิ่มข้อมูลได้ '}}</p>
                                                            @enderror
                                                        </p>
                                                    
                                                @else
                                                <input type="text" id="modelId-spares" class="form-control input-lg" value="{{$cont->brandName}} {{$cont->deviceModel}} {{$cont->model}} " placeholder="ยี่ห้อ  รุ่น เเละ โมเดล อุปกรณ์" />
                                                <input type="text" name="modelId" id="modelId"  class="form-control input-lg" value="{{$cont->modelId}}"  style="display:none">
                                                <div id="countryList">
                                                </div>
                                                    @error('modelId')
                                                        <span  >
                                                            <p  class="text-danger" >{{ $message }}</p>
                                                        </span>
                                                    @enderror 
                                                @endif
                                                
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">กลุ่มอุปกรณ์ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                @if (!$repairCount)
                                                <p class="color-text">ยังไม่สามารถเพิ่มข้อมูลได้ กรุณาเพิ่ม กลุ่มอุปกรณ์ ก่อน
                                                    @error('gradeId')
                                                    <p class="color-text"> {{ 'ยังไม่สามารถเพิ่มข้อมูลได้ '}}</p>
                                                    @enderror
                                                </p>
                                                @else
                                                    <select class="form-control" name="groupItem" aria-label="Default select example">
                                                        @foreach ($repair as $gar)
                                                            @if ($cont->groupItem == $gar->id)
                                                                <option value="{{$gar->id}}" selected>{{$gar->groupName}}</option>
                                                            @else
                                                                <option value="{{$gar->id}}">{{$gar->groupName}}</option>
                                                            @endif
                                                            
                                                        @endforeach
                                                    </select>
                                                    
                                                @endif
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ชื่ออุปกรณ์ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('nameItem') is-invalid @enderror" id="val-username" value="{{$cont->nameItem}}" name="nameItem" placeholder="ข้อความ ">
                                                @error('nameItem')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">รายคา อะไหล่ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control @error('price') is-invalid @enderror" id="val-username"   value="{{$cont->price}}" name="price" placeholder="100">
                                                @error('price')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">ประกันอะไหล่ /วัน <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control @error('guaranteeDate') is-invalid @enderror" id="val-username" value="{{$cont->guaranteeDate}}" name="guaranteeDate" min="1" placeholder="150">
                                                @error('guaranteeDate')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                 @enderror 
                                                 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">เกรด อะไหล่ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                @if (!$gradeCount)
                                                    <p class="color-text">ยังไม่สามารถเพิ่มข้อมูลได้ กรุณาเพิ่ม เกรด อะไหล่อุปกรณ์ ก่อน
                                                        @error('gradeId')
                                                        <p class="color-text"> {{ 'ยังไม่สามารถเพิ่มข้อมูลได้ '}}</p>
                                                        @enderror
                                                    </p>
                                                @else
                                                    <select class="form-control" name="gradeId"  aria-label="Default select example">
                                                        @foreach ($grade as $gar)
                                                            @if ($cont->gradeId == $gar->id)
                                                                <option value="{{$gar->id}}" selected>{{$gar->gradeName}}</option>
                                                            @else
                                                                <option value="{{$gar->id}}">{{$gar->gradeName}}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                @endif
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-control" for="val-username">ที่มา อะไหล่ (ร้านค้า)<span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                @if (!$mobilCount)
                                                <p class="color-text">ยังไม่สามารถเพิ่มข้อมูลได้ กรุณาเพิ่ม เกรด อะไหล่อุปกรณ์ ก่อน   
                                                    @error('storeId')
                                                    <p class="color-text"> {{ 'ยังไม่สามารถเพิ่มข้อมูลได้ '}}</p>
                                                    @enderror
                                                </p>
                                              
                                            @else
                                                <select class="form-control" name="storeId" aria-label="Default select example">
                                                    @foreach ($mobil as $mob)
                                                   
                                                        @if($cont->storeId == $mob->id)
                                                            <option value="{{$mob->id}}" selected>{{$mob->nameStore}}</option>
                                                        @else
                                                            <option value="{{$mob->id}}">{{$mob->nameStore}}</option>
                                                        @endif
                                                        
                                                    @endforeach
                                                </select>
                                            @endif
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-username">อุปกรณ์ที่รองรับ <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <textarea  class="form-control " value="{!!$cont->modelExplain!!}"  name="modelExplain" rows="3">{!!$cont->modelExplain!!}</textarea>
                                                @error('modelExplain')
                                                    <p class="text-danger">{{ $message }}</p>
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
    <script type="text/javascript">
        CKEDITOR.replace( 'modelExplain' );
        
        $(document).ready(function(){

            $('#modelId-spares').keyup(function(){ 
                var query = $(this).val();
                console.log(query);
                if(query != '')
                {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                    url:"{{ url('autocomplete-spares') }}",
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
                $('#modelId-spares').val($(this).text());
                $('#modelId').val($(this).attr("id"));  
                $('#countryList').fadeOut();  
            });  

            });
        </script>
@endsection


