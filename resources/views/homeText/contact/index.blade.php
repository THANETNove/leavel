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
                            <h3>ติดต่อเรา</h3>
                            @if (!$contactTops)
                            <a type="button" href="{{url('add-contactTop')}}" class="btn btn-primary">เพิ่ม การติด TOP </a>
                            @else
                            @endif
                            @if (!$countData)
                            <a type="button" href="{{url('add-textContact')}}" class="btn btn-primary">เพิ่ม ข้อความ </a>
                            @else
                            @endif
                            <a type="button" href="{{url('add-indexContact')}}" class="btn btn-primary">เพิ่ม ที่อยู่ </a>
                            <a type="button" href="{{url('add-contactUrl')}}" class="btn btn-primary">เพิ่ม Icon </a>
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
                                @foreach ($contactData as $cont)
                                    <tr role="row" class="odd">
                                        <td>{{++$i}}</td>
                                        <td>{{$cont->textContact}}</td>
                                        <td>
                                            <a type="button" href="{{route('add-textContact.edit',$cont->id)}}" class="btn btn-primary">เเก้ไข</a>
                                        </td>
                                    </tr>
                                @endforeach  
                              </tbody>
                            </table>

                            <br>
                            <br>
                            <h4>ข้อมูลติดต่อ top</h4>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                        <th class="sorting" style="width: 217.859px;">icon 1</th>
                                        <th class="sorting" style="width: 427.859px;">ข้อความ</th>
                                        <th class="sorting" style="width: 217.859px;">icon 2</th>
                                        <th class="sorting" style="width: 427.859px;">ข้อความ </th>
                                        <th class="sorting" style="width: 400.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                 @foreach ($contactTopsDate as $TopsDate)
                                 <tr role="row" class="odd">
                                    <td>{{++$i}}</td>
                                    <td>{!!$TopsDate->iconTop1!!}</td>
                                    <td>{{$TopsDate->textTop1}}</td>
                                    <td>{!!$TopsDate->iconTop2!!}</td>
                                    <td>{!!$TopsDate->textTop2!!}</td>
                                    <td>
                                        <a type="button" href="{{route('add-contactTop.edit',$TopsDate->id)}}" class="btn btn-primary">เเก้ไข</a>
                                        <a type="button" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" href="{{url('delete-contactTop',$TopsDate->id)}}" class="btn btn-danger">ลบ</a>
                                    </td>
                                </tr>
                                 @endforeach  
                                
                              </tbody>
                            </table>
                            <br>
                            <br>
                            <h4> ข้อมูลติดต่อ footer</h4>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                        <th class="sorting" style="width: 217.859px;">icon</th>
                                        <th class="sorting" style="width: 527.859px;">ข้อความ H1</th>
                                        <th class="sorting" style="width: 527.859px;">ข้อความ P </th>
                                        <th class="sorting" style="width: 400.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                 @foreach ($contactIndices as $cont)
                                 <tr role="row" class="odd">
                                    <td>{{++$i}}</td>
                                    <td>{!!$cont->iconContact!!}</td>
                                    <td>{{$cont->textH1NameContact}}</td>
                                    <td>{!!$cont->textPNameContact!!}</td>
                                    <td>
                                        <a type="button" href="{{route('add-contact.edit',$cont->id)}}" class="btn btn-primary">เเก้ไข</a>
                                        <a type="button" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" href="{{url('delete-contact',$cont->id)}}" class="btn btn-danger">ลบ</a>
                                    </td>
                                </tr>
                                 @endforeach  
                                
                              </tbody>
                            </table>
                            <br>
                            <br>
                            <h4>Icon footer</h4>
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" style="width: 50.219px;">Id</th>
                                        <th class="sorting" style="width: 217.859px;">icon</th>
                                        <th class="sorting" style="width: 517.859px;">Url</th>
                                        <th class="sorting" style="width: 250.859px;">เเก้ไข/ลบ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @php
                                 $i = 0;
                                @endphp
                                 @foreach ($contactUrl as $url)
                                 <tr role="row" class="odd">
                                    <td>{{++$i}}</td>
                                    <td>{!!$url->iconContact!!}</td>
                                    <td>{{$url->contactUrl}}</td>
                                    <td>
                                        <a type="button" href="{{route('add-contactUrl.edit',$url->id)}}" class="btn btn-primary">เเก้ไข</a>
                                        <a type="button" onClick="javascript:return confirm('คุณต้องการลบข้อมูลใช่หรือไม่');" href="{{url('delete-icon',$url->id)}}" class="btn btn-danger">ลบ</a>
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


