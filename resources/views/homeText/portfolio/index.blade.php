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
            <div class="table-responsive">
                <div class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3>ผลงาน</h3>
                            @if (!$countData)
                            <a type="button" href="{{url('add-textPortfolio')}}" class="btn btn-primary">เพิ่ม ข้อความ </a>
                            @else
                            @endif
                            <a type="button" href="{{url('add-imagePortfolio')}}" class="btn btn-primary">เพิ่ม ภาพ </a>
                           
                            <br>
                            <br>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                        <th class="sorting" style="width: 417.859px;">ข้อความ</th>
                                        <th class="sorting" style="width: 117.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                @foreach ($portfolioData as $cont)
                                    <tr role="row" class="odd">
                                        <td>{{++$i}}</td>
                                        <td>{{$cont->textPortfolio}}</td>
                                        <td>
                                            <a type="button" href="{{route('add-textPortfolio.edit',$cont->id)}}" class="btn btn-primary">เเก้ไข</a>
                                        </td>
                                    </tr>
                                @endforeach  
                              </tbody>
                            </table>

                            <br>
                            <br>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                        <th class="sorting" style="width: 417.859px;">ข้อความ H1</th>
                                        <th class="sorting" style="width: 417.859px;">ข้อความ P </th>
                                        <th class="sorting" style="width: 417.859px;">หมวดหมู่ภาพ </th>
                                        <th class="sorting" style="width: 417.859px;">ภาพ</th>
                                        <th class="sorting" style="width: 500.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                 @foreach ($portfolioIndices as $cont)
                                 <tr role="row" class="odd">
                                    <td>{{++$i}}</td>
                                    <td>{{$cont->textH1NamePortfolio}}</td>
                                    <td>{{$cont->textPNamePortfolio}}</td>
                                    <td>{{$cont->statusImage}}</td>
                                    <td>
                                        <img src="{{ asset('assets/img/portfolio/'."".$cont->backgroundImagePortfolio)}}" height="50" width="80" alt="">
                                    </td>
                                    <td>
                                        <a type="button" href="{{route('add-portfolio.edit',$cont->id)}}" class="btn btn-primary">เเก้ไข</a>
                                        <a  onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" type="button" href="{{url('delete-portfolio',$cont->id)}}" class="btn btn-danger">ลบ</a>
                                    </td>
                                </tr>

                                 @endforeach  
                              </tbody>
                            </table>
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


