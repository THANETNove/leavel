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
                                <h4>รายละเอียดการซ่อม</h4>
                                <div class="form-validation">
                                    @foreach ($flight as $cont)
                                        <h6>&nbsp; &nbsp;รหัสการซ่อม : {{ $cont->receiptCode }}</h6>
                                        @if ($cont->imei !== null && $cont->statusJob >= 5 || $cont->imei !== null && $cont->statusJob >= 5) 
                                        <a type="button" target="_blank"
                                            href="{{ url('job-system-receipt', $cont->id) }}"
                                            class="btn btn-info search-right" >ใบรับประกัน</a>
                                        @else
                                        <a  type="button"   href="{{ route('job-system.edit', $cont->id) }}"  onClick="javascript:return confirm('ยังไม่สามารถพิมพ์ใบประกันได้ กรุณาเพิ่ม IMEI ก่อน หรือ ยังทำการซ่อมไม่เสร็จ');"
                                            class="btn btn-info search-right" >ใบรับประกัน</a>
                                        @endif
                                        <a type="button"  target="_blank" href="{{ url('job-system-WarrantyCard', $cont->id) }}"
                                            class="btn btn-primary search-right">ใบรับซ่อม</a>
                                        <br />
                                        <br />
                                        <div class="row left-row">
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">ชื่อลูกค้า&nbsp;: &nbsp;{{ $cont->username }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">เบอร์ติดต่อ &nbsp;: &nbsp;{{ $cont->phone }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">อุปกรณ์</h5>
                                                <div class="form-group">
                                                    <h6> &nbsp; &nbsp;เเบรนด์ : &nbsp; {{ $cont->brandName }}</h6>
                                                    <h6>  &nbsp; &nbsp;รุ่น :   &nbsp;{{ $cont->deviceModel }}</h6>
                                                    <h6>  &nbsp; &nbsp;โมเดล  : &nbsp; {{ $cont->model }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">หมายเลข IMEI&nbsp;: &nbsp;{{ $cont->imei }}</h5>
                                                <h5 class="m-t-20">สีอุปกรณ์ &nbsp;: &nbsp;{{ $cont->color }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20" id="deviceText">อุปกรณ์ที่ใช้เปลี่ยน</h5>
                                                <div class="form-group">
                                                    <h6> &nbsp;  &nbsp;เเบรนด์ : &nbsp;{{ $cont->accessoryBrand }}</h6>
                                                    <h6> &nbsp;  &nbsp; รุ่น : &nbsp;{{ $cont->accessoryDeviceModel }}</h6>
                                                    <h6> &nbsp; &nbsp; โมเดล :  &nbsp;{{ $cont->accessoryModel }}</h6>
                                                    <h6> &nbsp; &nbsp; ราคา :  &nbsp;{{ $cont->price }}&nbsp; บาท</h6>
                                                    <h6> &nbsp; &nbsp; เกรดอะไหล่ :  &nbsp;{{ $cont->gradeName }}</h6>
                                                    <h6> &nbsp; &nbsp; จากร้านอะไหล่ :  &nbsp;{{ $cont->nameStore }}</h6>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">รหัสปลดล้อกหน้าจอ &nbsp;: &nbsp;{{ $cont->screenUnlock }}</h5>
                                                <h5 class="m-t-20">ความเสี่ยงการซ่อม &nbsp; :&nbsp;{{ $cont->riskCalculator }}  &nbsp;บาท </h5>
                                                <h5 class="m-t-20">กลุ่มอาการเเจ้งเสีย &nbsp;: &nbsp;{{ $cont->groupName }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">อาการของอุปกรณ์ อื่น ๆ &nbsp;: &nbsp;{{ $cont->another }}</h5>
                                                <h5 class="m-t-20">อุปกรณ์ อื่น ๆ</h5>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox1)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="ตัวเครื่อง">ตัวเครื่อง

                                                            @else
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="ตัวเครื่อง" checked>ตัวเครื่อง
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox2)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1">เเบตเตอร์รี่

                                                            @else
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1" checked>เเบตเตอร์รี่
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox3)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1">สายซาร์จ

                                                            @else
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1" checked>สายซาร์จ
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox4)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1">เคส
                                                        </label>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input" value="1"
                                                                        checked>เคส
                                                                @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox5)
                                                                <input type="checkbox" class="form-check-input" value="1">เมมโมรี่การ์ด
                    
                                                            @else
                                                                <input type="checkbox" class="form-check-input" value="1" checked>เมมโมรี่การ์ด
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox6)
                                                                <input type="checkbox" class="form-check-input" value="1">ซิมการ์ด
                    
                                                            @else
                                                                <input type="checkbox" class="form-check-input" value="1" checked>ซิมการ์ด
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox7)
                                                                <input type="checkbox" class="form-check-input" value="1">อะเด๊ปเตอร์
                                                            @else
                                                                <input type="checkbox" class="form-check-input" value="1" checked>อะเด๊ปเตอร์
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->statusJob)
                                                                <input type="checkbox" class="form-check-input" value="1">อื่น ๆ
                                                            @else
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">ประเมินราคา</h5>
                                                <div class="form-group">
                                                        <h5>&nbsp; &nbsp;คำนวนจากระบบ&nbsp;&nbsp;: &nbsp; &nbsp;{{ $cont->calculatedSystem }} &nbsp; บาท</h5>
                                                        <p></p>
                                                </div>
                                                <div class="form-group">
                                                    <h5>&nbsp; &nbsp; คำนวนจาก ซ่าง   
                                                        @if ($cont->calculatedTechnician === null || $cont->calculatedTechnician == '0')
                                                        &nbsp;&nbsp;: &nbsp; &nbsp;{{ $cont->calculatedTechnician }}  &nbsp; บาท
                                                    @endif
                                                </h5>
                                                 </div>
                                                 <div class="form-group">
                                                    <h5>&nbsp; &nbsp; ราคาค่าซ่อมจริง &nbsp;&nbsp;: &nbsp; &nbsp;{{ $cont->priceJob }}  &nbsp; บาท</h5>
                                                 </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">รายการ อื่นๆ ที่ใส่มาด้วย &nbsp;: &nbsp;{{ $cont->another2 }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">วันที่นัดมารับเครื่อง
                                                        @php 
                                                        $dateDa = thaidate('l j F Y', $cont->pickUpDate)
                                                       @endphp
                                                       &nbsp;: &nbsp;{{$dateDa}}
                                                    
                                                </h5>
                                                <div class="form-group">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">สถานะการซ่อม &nbsp;: &nbsp;{{ $cont->statusServeName}}</h5>
                                                <h5 class="m-t-20">วันที่สินสุด ใบประกัน &nbsp; :&nbsp;{{ $cont->insurance}}</h5>
                                            </div>           
                                        <div class="col-lg-6">
                                            <h5 class="m-t-20">วันที่บันทึก
                                                @php 
                                                $created = thaidate('l j F Y', $cont->created_at);
                                                $updated = thaidate('l j F Y', $cont->updated_at);
                                                @endphp
                                                    &nbsp; &nbsp;{{ $created}}
                                            </h5>
                                           
                                            <h5 class="">วันที่เเก้ไข
                                                @php 
                                                $created = thaidate('l j F Y', $cont->created_at);
                                                $updated = thaidate('l j F Y', $cont->updated_at);
                                                @endphp
                                                &nbsp;: &nbsp;{{ $updated}}
                                            </h5>
                                           
                                        </div>
                                    </div>
                                        <div class="form-group row">
                                            <div class="col-lg-7 ml-auto">
                                                <br>
                                                <a href="{{ url('job-system') }}" class="btn btn-primary">ย้อนกลับ</a>
                                                <a type="button" onClick="javascript:return confirm('คุณต้องการยันยันการซ่อม');" href="{{url('statusJob',$cont->id)}}" class="btn btn-indigo">ยันยันการซ่อม</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                             </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('bar.footer_min')
        </div>
    <script>
        $('.datepicker').datepicker({
            format: 'mm/dd/yyyy',
            startDate: '-3d'
        });
    </script>
@endsection
