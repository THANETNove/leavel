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
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <h4 class="card-title">แบรนด์</h4>
                                    <div id="myPlot" style="width:100%;max-width:700px"></div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <h4 class="card-title">กลุ่มงานซ่อม</h4>
                                    <div id="myPlot2" style="width:100%;max-width:1000px"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

     {{--        <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">กลุ่มงานซ่อม</h4>
                                <canvas id="myChart" style="width:90%;max-width:1000px"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body2">
                                <div class="table-responsive">
                                    <h4 class="">รายการ การซ่อมวันนี้</h4>
                                    <table class="table table-hover">
                                        <thead class="">
                                            <tr role="row">
                                                <th class="col" style="width: 50.219px;">Id</th>
                                                <th class="sorting" style="width: 117.859px">ชื่อ</th>
                                                <th class="sorting" style="width: 117.859.px;">เบอร์ติดต่อ</th>
                                                <th class="sorting" style="width: 117.859.px;">ยี่ห้อ</th>
                                                <th class="sorting" style="width: 117.859.px;">รุ่น</th>
                                                <th class="sorting" style="width: 117.859.px;">กลุ่ม</th>
                                                <th class="sorting" style="width: 117.859.px;">ราคาประเมิน</th>
                                                <th class="sorting" style="width: 117.859px;">สถานะ</th>
                                                <th class="sorting" style="width: 117.px;">วันที่บันทึก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @foreach ($data as $da)
                                                <tr role="row" class="odd">
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $da->username }}</td>
                                                    <td>{{ $da->phone }}</td>
                                                    <td>{{ $da->brandName }} </td>
                                                    <td>{{ $da->deviceModel }}</td>
                                                    <td>{{ $da->groupName }}</td>
                                                    <td style="width: 117.859.px;">{{ $da->priceJob }}</td>
                                                    <td>
                                                        @if ($da->statusJob == '2')
                                                            <p class="color-textIndigo">{{ $da->statusServeName }}</p>
                                                        @elseif ($da->statusJob == "3")
                                                            <p class="color-text">{{ $da->statusServeName }}</p>
                                                        @elseif ($da->statusJob == "4")
                                                            <p class="color-textSorrel">{{ $da->statusServeName }}</p>
                                                        @elseif ($da->statusJob == "5")
                                                            <p class="color-textBlue">{{ $da->statusServeName }}</p>
                                                        @elseif ($da->statusJob == "6")
                                                            <p class="color-textGreen">{{ $da->statusServeName }}</p>
                                                        @else
                                                            <p class="color-textDed">{{ $da->statusServeName }}</p>
                                                        @endif

                                                    </td>
                                                    <td>{{ $da->updated_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body2">
                                <h4 class="">สรุป รายงานการซ่อม</h4>
                                <div class="box-left">
                                    <div class="textBox-left">
                                        <h5>จำนวน</h5>
                                        <p>
                                            @if ($count != 0)
                                                {{$count}}
                                            @endif
                                            <hr>
                                        </p>
                                    </div>
                                    <div class="textBox-left">
                                        <h5>ต้นทุน</h5>
                                        <p>
                                            @php
                                                $cost =  number_format($cost);
                                             @endphp
                                            @if ($cost != 0)
                                                {{$cost}}&nbsp; บาท
                                            @endif
                                            <hr>
                                        </p>
                                    </div>
                                    <div class="textBox-left">
                                        <h5>กำไร</h5>
                                        <p> 
                                            @php
                                                $profit =  number_format($profit);
                                             @endphp
                                            @if ($profit != 0)
                                            {{$profit}}&nbsp; บาท
                                            @endif
                                           
                                            <hr>
                                        </p>
                                    </div>
                                    <div class="textBox-left">
                                        <h5>ยอด</h5>
                                        <p>
                                            @php
                                             $estimate =  number_format($estimate);
                                            @endphp
                                            @if ($estimate != 0)
                                                {{$estimate}}&nbsp; บาท
                                            @endif
                                            <hr>
                                        </p>
                                    </div>
                                 </div>
                                <div class="form-selected">
                                    <form class="row g-3 " action="{{ url('dateHome') }}" method="POST">
                                        @csrf
                                        <div class="col-auto">
                                            <label for="staticEmail2" class="m-t-20">เริ่มต้น
                                                -</label>
                                            <input type="text" class="form-control datepicker" value="{{ $dateStart}}" name="dateStart" id="dateStart"
                                                placeholder="2022-02-12" required>
                                        </div>
                                        <div class="col-auto">
                                            <label for="staticEmail2" class="m-t-20">ถึง ปี/เดือน/วัน</label>
                                            <input type="text" class="form-control datepicker" value="{{$dateEnd}}" name="dateEnd" id="dateEnd"
                                                placeholder="2022-02-12" required>
                                        </div>
                                        <div class="col-auto">
                                            <label class="m-t-20">แบรนด์{{$ban}}</label>
                                            <div class="form-group">
                                                <select class="form-control m-t-20" id="brand" name="brand"
                                                    aria-label="Default select example">
                                                        <option value="null" >All</option>
                                                        @foreach ($dataBrands as $bar)
                                                            @if ($ban === $bar->brandName)
                                                                <option value="{{$brand}}" selected>{{$ban}}</option>
                                                            @else
                                                                <option value="{{ $bar->id }}">{{ $bar->brandName }}</option>
                                                            @endif
                                                        @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <label class="m-t-20">อุปกรณ์รุ่น</label>
                                            <div class="form-group">
                                                <select class="form-control m-t-20"  id="version" name="version"
                                                    aria-label="Default select example">
                                                    <option value="null">All</option>
                                                    @foreach ($generations as $gen)
                                                    @if ($banModel === $gen->deviceModel)
                                                        <option value="{{$version}}" selected>{{$banModel}}</option>
                                                    @else
                                                        <option value="{{ $gen->id }}">{{ $gen->deviceModel }}</option>
                                                    @endif
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-auto col-md-1 button-top">
                                            <button type="submit" class="btn btn-primary button-width">Go</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="table-responsive">
                                    <table class="table  table-hover">
                                        <thead class="">
                                            <tr>
                                                <th class="col" style="width: 50.219px;">Id</th>
                                                <th class="sorting" style="width: 117.859px">ยี่ห้อ</th>
                                                <th class="sorting" style="width: 117.859px">รุ่น</th>
                                                <th class="sorting" style="width: 117.859px">โมเดล</th>
                                                <th class="sorting" style="width: 117.859px">อุปกรณ์</th>
                                                <th class="sorting" style="width: 117.859px">ต้นทุน</th>
                                                <th class="sorting" style="width: 117.859px">ประเมิน</th>
                                                <th class="sorting" style="width: 117.859px">กำไร</th>
                                                <th class="sorting" style="width: 117.859px">สถานะ</th>
                                                <th class="sorting" style="width: 117.859px">วันที่บันทึก</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $i = 0;
                                            @endphp
                                            @inject('countSparesId', 'App\Http\Controllers\HomeController')
                                            @foreach ($groups as $grou)
                                                <tr role="row" class="odd">
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $grou->brandName }} </td>
                                                    <td>{{ $grou->deviceModel }}</td>
                                                    <td>{{ $grou->model }}</td>
                                                    <td>{{ $grou->nameItem}}</td>
                                                    <td>{{ $grou->priceModel }}&nbsp; บาท</td>
                                                    <td>{{ $grou->priceJob }}&nbsp; บาท</td>
                                                    <td>{{ $grou->priceSum}}&nbsp; บาท</td>
                                                    <td>
                                                        <br/>
                                                        @if ($grou->statusJob == '2')
                                                            <p class="color-textIndigo">{{ $grou->statusServeName }}</p>
                                                        @elseif ($grou->statusJob == "3")
                                                            <p class="color-text">{{ $grou->statusServeName }}</p>
                                                        @elseif ($grou->statusJob == "4")
                                                            <p class="color-textSorrel">{{ $grou->statusServeName }}</p>
                                                        @elseif ($grou->statusJob == "5")
                                                            <p class="color-textBlue">{{ $grou->statusServeName }}</p>
                                                        @elseif ($grou->statusJob == "6")
                                                            <p class="color-textGreen">{{ $grou->statusServeName }}</p>
                                                        @else
                                                            <p class="color-textDed">{{ $grou->statusServeName }}</p>
                                                        @endif
                                                    </td>
                                                    <td>{{ $grou->created_at}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
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
        $(document).ready(function() {

            /*  กราฟ 1 กลุ่มอุปกรณ์ */
            $.ajax({
                url: "{{ url('repair-groups') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {

                    var xArray = [];
                    var yArray = [];
                    for (let index = 0; index < data.data.length; index++) {
                        xArray.push(data.data[index].brandName);
                        yArray.push(data.data[index].sum);
                    }
                    var data = [{
                        labels: xArray,
                        values: yArray,
                        hole: .10,
                        type: "pie"
                    }];
                    Plotly.newPlot("myPlot", data);
                }
            });
            /* กราฟ 2  งาน */
            $.ajax({
                url: "{{ url('repair-work') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function(data) {
                    var xArray2 = [];
                    var yArray2 = [];
                    for (let index = 0; index < data.data.length; index++) {
                        xArray2.push(data.data[index].groupName);
                        yArray2.push(data.data[index].sum);
                    }

                    var data2 = [{
                        labels: xArray2,
                        values: yArray2,
                        hole: .10,
                        type: "pie"
                    }];

                    Plotly.newPlot("myPlot2", data2);


                    /*  var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
                     var yValues = [55, 49, 44, 24, 15]; */
                    var barColors = ["red", "green", "blue", "orange", "brown", "#00FF00", "#00FFFF",
                        "#FF00FF", "#C0C0C0", "#202020",
                        "#FF6600", "#FFCC33", "#FFCC99", "#FFCCCC", "#CCCC66", "#9900FF", "#660",
                        "#CC0033", "#CC3333", "#202020",
                        "#99FFCC", "#99CC66", "#CC6633", "#996", "#6699FF", "#066", "#660000",
                        "#033", "#633", "#000033",
                        "#6600FF", "#6633FF", "#6699FF", "#CC0099", "#6666CC", "#CC0033", "#0000FF",
                        "#FF6666", "#FF6633", "#FFCC00",
                        "#99CC00", "#990000", "#333", "#366", "#003", "#CC0033", "#0066FF",
                        "#9933FF", "#9966FF", "#9999FF",
                        "#FF0033", "#FFFFCC", "#FF0099", "#FF66FF", "#FFFFCC", "#FF0066", "#CCCCFF",
                        "#99CC33", "#CC99CC", "#00CC99"
                    ];

                    new Chart("myChart", {
                        type: "bar",
                        data: {
                            labels: xArray2,
                            datasets: [{
                                backgroundColor: barColors,
                                data: yArray2
                            }]
                        },
                        options: {
                            legend: {
                                display: false
                            },
                            /*     title: {
                                    display: true,
                                    text: "World Wine Production 2018"
                                } */
                        }
                    });
                }
            });
        });
    </script>

    <script>
        $(document).ready(function() {
            $(function() {
                $(".datepicker").datepicker({
                    monthNames: ["มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน",
                        "กรกฎาคม",
                        "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
                    ],
                    dateFormat: "yy-mm-dd"

                });
            });

            /* getData(); */
            $("#brand").change(function() {
                getData();
            });

            function getData() {
                brandId = document.getElementById("brand").value;
                $.ajax({
                    url: "{{ url('get-generations') }}",
                    method: "post",
                    data: {
                        id: brandId,
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function(data) {

                        console.log('data',data);
                        var name = `<option  value="null">All</option>`;
                        for (let index = 0; index < data.length; index++) {
                            name +=
                                `<option value="${data[index].id}">${data[index].deviceModel}</option>`;
                        }
                        $('#version').html(name);
                    }
                });
            }
        });
    </script>


@endsection
