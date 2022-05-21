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
                                <h4>เพิ่มรายการซ่อม</h4>
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ route('job-system.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-lg-6" style="display:none">
                                                <label class="m-t-20">id</label>
                                                <div class="form-group">
                                                    <input type="text" id="adminId" value="">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">ชื่อลูกค้า</label>
                                                <div class="form-group">
                                                    <input type="text" name="username"
                                                        class="form-control @error('username') is-invalid @enderror"
                                                        placeholder="Username" required>
                                                    @error('username')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror 
                                                </div>

                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">เบอร์ติดต่อ</label>
                                                <div class="form-group">
                                                    <input type="text" name="phone"
                                                        class="form-control @error('phone') is-invalid @enderror"
                                                        placeholder="090-xxx-xxxx" required>
                                                    @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">อุปกรณ์รุ่น</label>
                                                <div class="form-group">
                                                    <input type="text" id="version" value=""
                                                        class="form-control input-lg @error('version') is-invalid @enderror"
                                                        placeholder="Enter Country Name" required />
                                                    @error('version')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <input type="text" name="version" id="version-id"
                                                        class="form-control input-lg  " placeholder="Enter Country Name"
                                                        style="display:none">
                                                    <div id="countryList">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">หมายเลข IMEI *#06#(เรียกดู MIEI)</label>
                                                <div class="form-group">
                                                    <input type="text" name="IMEI" class="form-control" placeholder="IMEI"
                                                        >
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">สี</label>
                                                <div class="form-group">
                                                    <input type="text" name="color"
                                                        class="form-control @error('color') is-invalid @enderror"
                                                        placeholder="สี" required>
                                                    @error('color')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">รหัสปลดล้อกหน้าจอ</label>
                                                <div class="form-group">
                                                    <input type="text" name="screenUnlock" class="form-control"
                                                        placeholder="xxxxx" >
                                                </div>
                                            </div>
                                            @if (!$countRepair)
                                            <p class="color-text">ยังไม่สามารถเพิ่มข้อมูลได้ กรุณาเพิ่ม กลุ่มอุปกรณ์
                                                ก่อน
                                                @error('notifiedWaste')
                                                <p class="color-text"> {{ 'ยังไม่สามารถเพิ่มข้อมูลได้ ' }}</p>
                                            @enderror
                                            </p>
                                        @else
                                            <div class="col-lg-6">
                                                <label class="m-t-20">กลุ่มอาการเเจ้งเสีย</label>
                                                <div class="form-group">
                                                    <select class="form-control" id="notifiedWaste"
                                                        name="notifiedWaste" aria-label="Default select example">
                                                        @foreach ($repair as $gar)
                                                            <option value="{{ $gar->id }}">
                                                                {{ $gar->groupName }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        @endif
                                            <div class="col-lg-6">
                                                <label class="m-t-20" id="deviceText">ยี่ห้อ รุ่น เเละ โมเดล
                                                    อะไหล่</label>
                                                <div class="form-group">
                                                    <input type="text" id="device" value=""
                                                        class="form-control input-lg  @error('device') is-invalid @enderror"
                                                        placeholder="Enter Country Name" required/>
                                                    @error('device')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    <input type="text" name="device" id="device-id"
                                                        class="form-control input-lg " placeholder="Enter Country Name"
                                                        style="display:none">
                                                    <div id="country">
                                                    </div>
                                                </div>
                                            </div>
                                            @if (Auth::user()->status === '0')
                                                <div class="col-lg-6">
                                                    <label class="m-t-20">สาขา</label>
                                                    <div class="form-group">
                                                        <select class="form-control" id="riskName"
                                                            aria-label="Default select example">
                                                            @foreach ($branch as $bra)
                                                                <option value="{{ $bra->id }}">{{ $bra->name }}
                                                                    &nbsp; {{ $bra->branch }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                            @else

                                            @endif
                                            <div class="col-lg-6" style="display:none">
                                                <label class="m-t-20"></label>
                                                <div class="form-group">
                                                    <input type="text" name="riskid" id="risk-id"
                                                        value="{{ Auth::user()->status }}" class="form-control"
                                                        placeholder="" required>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <label class="m-t-20">คำนวนความเสี่ยง บาท</label>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        value="" id="flexRadioDefault1" checked>
                                                    <label class="form-check-label" for="flexRadioDefault1">
                                                        เลือกความเสี่ยง
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="flexRadioDefault"
                                                        id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        ไม่เลือกความเสี่ยง
                                                    </label>
                                                </div>
                                                <br />
                                                <div class="form-group">
                                                    <input type="text" name="riskCalculator" id="riskCalculator" value=""
                                                        class="form-control" placeholder="" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">อื่น ๆ</label>
                                                <div class="form-group">
                                                    <textarea class="form-control" name="another"
                                                        id="exampleFormControlTextarea1" rows="5"></textarea>
                                                        @error('another')
                                                            <p class="text-danger">{{ $message }}</p>
                                                         @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">ประเมินราคา บาท</label>
                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadio"
                                                            id="flexRadio1" checked>
                                                        <label class="form-check-label" for="flexRadio">
                                                            คำนวนจากระบบ
                                                            <input type="text" name="calculatedSystem" id="calculatedSystem"
                                                                class="form-control" placeholder="" readonly>
                                                        </label>

                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="flexRadio"
                                                            id="flexRadio2">
                                                        <label class="form-check-label" for="flexRadio">
                                                            คำนวนจาก ซ่าง
                                                            <input type="number" name="calculatedTechnician"
                                                                class="form-control @error('calculatedTechnician') is-invalid @enderror" placeholder="" >
                                                                @error('calculatedTechnician')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </label>

                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">วันที่นัดมารับเครื่อง</label>
                                                <div class="form-group">
                                                    <div class="row form-material">
                                                        <input type="text"
                                                            class="form-control @error('pickUpDate') is-invalid @enderror"
                                                            name="pickUpDate" placeholder="2017-06-04" id="datepicker"
                                                            data-dtp="dtp_EUwZU" required>
                                                        @error('pickUpDate')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <label class="m-t-20">รายการที่ใส่มาด้วย</label>
                                                <div class="form-group">
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox1" value="1">ตัวเครื่อง</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox2" value="1">เเบตเตอร์รี่</label>
                                                        </div>
                                                        <div class="form-check form-check-inline disabled">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox3" value="1">สายซาร์จ</label>
                                                        </div>
                                                        <div class="form-check form-check-inline disabled">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox4" value="1">เคส</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox5" value="1">เมมโมรี่การ์ด</label>

                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox6" value="1">ซิมการ์ด</label>
                                                        </div>
                                                        <div class="form-check form-check-inline disabled">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox7" value="1">อะเด๊ปเตอร์</label>
                                                        </div>
                                                        <div class="form-check form-check-inline disabled">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input"
                                                                    name="checkbox8" value="1">อื่น ๆ</label>
                                                        </div>
                                                    </div>
                                                    <textarea class="form-control" name="another2"
                                                        id="exampleFormControlTextarea1" rows="5"></textarea>
                                                        @error('another2')
                                                            <p class="text-danger">{{ $message }}</p>
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
        @include('bar.footer_min')
    </div>

    <script>
        $( function() {
          $( "#datepicker" ).datepicker({
            monthNames: [ "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม","มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม" ],
            dateFormat: "yy-mm-dd"
            
          });
        } );
        </script>

    <script type="text/javascript">
         var pri = "";
         var priRisk = "";
         var riskName = "";
         var profitSum = ""; // ราคาค่าจ่าง
         var riskSum = ""; // ความเสียง
        $(document).ready(function() {

            //  --- รุ่น มือถือ
            $('#version').keyup(function() {
                var query = $(this).val();
                console.log(query);
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ url('autocomplete-jobSystem') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#countryList').fadeIn();

                            $('#countryList').html(data);
                        }
                    });
                }
            });

            $("#countryList").on('click', 'li', function() {
                //console.log($(this).attr("id"));
                //console.log($(this).text());
                $('#version').val($(this).text());
                $('#version-id').val($(this).attr("id"));
                $('#countryList').fadeOut();
            });
            //----อะไหล่ มือถือ----/
            $('#device').keyup(function() {
                var query = $(this).val();
                console.log(query);
                if (query != '') {
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ url('/autocomplete-mobileDevice') }}",
                        method: "POST",
                        data: {
                            query: query,
                            _token: _token
                        },
                        success: function(data) {
                            $('#country').fadeIn();

                            $('#country').html(data);
                        }
                    });
                }
            });

            $("#country").on('click', 'li', function() {
                var _token = $('input[name="_token"]').val();

                
                $.ajax({
                    url: "{{ url('/price') }}",
                    method: "post",
                    data: {
                        id: $(this).attr("id"),
                        _token: _token
                    },
                    success: function(data) {
     
                       pri = Number(data.data[0].price.replaceAll(",", ""));// ราค่าอะไหล่ คำนวนกำไร
                       profit = Number(data.data[0].profit);// กำไร
                       if (data[0][0]) {
                           
                             priRisk = Number(data[0][0].price.replaceAll(",", "")); //ราค่า ความเสียง 
                            riskSum = priRisk * riskName;
                            $('#riskCalculator').val(riskSum.toFixed(0)); // ความเสี่ง */  
                       }
                         profitSum = pri * profit;
                        $('#calculatedSystem').val(profitSum.toFixed(0)); // ค่าจ้าง 
                       
                      // console.log('replaceAll',pri);
                    }
                });

                $('#device').val($(this).text());
                $('#device-id').val($(this).attr("id"));
                $('#country').fadeOut();
            });

            var riskid = document.getElementById("risk-id").value;
            if (riskid === '0') {
                let valId = document.getElementById("riskName").value;
                $('#risk-id').val(valId);
                getBranch(valId, priRisk);

                $("#riskName").change(function() {
                    valId = document.getElementById("riskName").value;
                    $('#risk-id').val(valId);
                    getBranch(valId, priRisk);
                });
            } else {

                getBranch(riskid, priRisk);
            }

        });

        $("#flexRadioDefault1").click(function() {
            if (riskSum != 0) {
                $('#riskCalculator').val(riskSum.toFixed(0));
            } else {
                $('#riskCalculator').val(riskSum.toFixed(0));
            }
        });

        $("#flexRadioDefault2").click(function() {
            if (riskSum != 0) {
                $('#riskCalculator').val("");
            } else {
                $('#riskCalculator').val("");
            }
        });


        function getBranch(valId, pri) {
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('/get-branche') }}",
                method: "post",
                data: {
                    id: valId,
                    _token: _token
                },
                success: function(data) {
                    riskName = Number(data.data[0].riskName.replaceAll(",", ""));
                    riskSum = priRisk * riskName;
                    if (riskSum === 0) {
                        $('#riskCalculator').val(" ");
                    } else {
                        $('#riskCalculator').val(riskSum.toFixed(0));
                    }
                   // console.log( 'str_replace-2',str_replace(',', $pri));
                }
            });

        }
    </script>

@endsection
