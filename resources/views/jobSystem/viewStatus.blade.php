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
                                <h4>???????????????????????????????????????????????????</h4>
                                <div class="form-validation">
                                    @foreach ($flight as $cont)
                                        <h6>????????????????????????????????? : {{ $cont->receiptCode }}</h6>
                                        @if ($cont->imei !== null && $cont->statusJob >= 5   || $cont->imei !== null && $cont->statusJob >= 5 ) 
                                        <a type="button" target="_blank"
                                            href="{{ url('job-system-receipt', $cont->id) }}"
                                            class="btn btn-info search-right" >?????????????????????????????????</a>
                                        @else
                                        <a  type="button"   href="{{ url('imeiJob', $cont->id) }}" {{--  href="{{ route('job-system.edit', $cont->id) }}"  --}}onClick="javascript:return confirm('???????????????????????????????????????????????????????????????????????????????????? ?????????????????????????????? IMEI ???????????? ???????????? ????????????????????????????????????????????????????????????');"
                                            class="btn btn-info search-right" >?????????????????????????????????</a>
                                        @endif
                                        <a type="button"  target="_blank" href="{{ url('job-system-WarrantyCard', $cont->id) }}"
                                            class="btn btn-primary search-right">???????????????????????????</a>
                                        <br />
                                        <br />
                                        <div class="row left-row">
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">??????????????????????????????&nbsp;: &nbsp;{{ $cont->username }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">????????????????????????????????? &nbsp;: &nbsp;{{ $cont->phone }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">?????????????????????</h5>
                                                <div class="form-group">
                                                    <h6> &nbsp; &nbsp;????????????????????? : &nbsp; {{ $cont->brandName }}</h6>
                                                    <h6>  &nbsp; &nbsp;???????????? :   &nbsp;{{ $cont->deviceModel }}</h6>
                                                    <h6>  &nbsp; &nbsp;???????????????  : &nbsp; {{ $cont->model }}</h6>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">????????????????????? IMEI&nbsp;: &nbsp;{{ $cont->imei }}</h5>
                                                <h5 class="m-t-20">??????????????????????????? &nbsp;: &nbsp;{{ $cont->color }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20" id="deviceText">????????????????????????????????????????????????????????????</h5>
                                                <div class="form-group">
                                                    <h6> &nbsp;  &nbsp;????????????????????? : &nbsp;{{ $cont->accessoryBrand }}</h6>
                                                    <h6> &nbsp;  &nbsp; ???????????? : &nbsp;{{ $cont->accessoryDeviceModel }}</h6>
                                                    <h6> &nbsp; &nbsp; ??????????????? :  &nbsp;{{ $cont->accessoryModel }}</h6>
                                                    <h6> &nbsp; &nbsp; ???????????? :  &nbsp;{{ $cont->price }}&nbsp; ?????????</h6>
                                                    <h6> &nbsp; &nbsp; ?????????????????????????????? :  &nbsp;{{ $cont->gradeName }}</h6>
                                                    <h6> &nbsp; &nbsp; ??????????????????????????????????????? :  &nbsp;{{ $cont->nameStore }}</h6>
                                                </div>
                                            </div>
                                            
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">??????????????????????????????????????????????????? &nbsp;: &nbsp;{{ $cont->screenUnlock }}</h5>
                                                <h5 class="m-t-20">??????????????????????????????????????????????????? &nbsp; :&nbsp;{{ $cont->riskCalculator }}  &nbsp;????????? </h5>
                                                <h5 class="m-t-20">????????????????????????????????????????????????????????? &nbsp;: &nbsp;{{ $cont->groupName }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">????????????????????????????????????????????? ???????????? ??? &nbsp;: &nbsp;{{ $cont->another }}</h5>
                                                <h5 class="m-t-20">????????????????????? ???????????? ???</h5>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox1)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="??????????????????????????????">??????????????????????????????

                                                            @else
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="??????????????????????????????" checked>??????????????????????????????
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox2)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1">????????????????????????????????????

                                                            @else
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1" checked>????????????????????????????????????
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox3)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1">????????????????????????

                                                            @else
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1" checked>????????????????????????
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox4)
                                                                <input type="checkbox" class="form-check-input"
                                                                    value="1">?????????
                                                        </label>
                                                                @else
                                                                    <input type="checkbox" class="form-check-input" value="1"
                                                                        checked>?????????
                                                                @endif
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox5)
                                                                <input type="checkbox" class="form-check-input" value="1">???????????????????????????????????????
                    
                                                            @else
                                                                <input type="checkbox" class="form-check-input" value="1" checked>???????????????????????????????????????
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox6)
                                                                <input type="checkbox" class="form-check-input" value="1">????????????????????????
                    
                                                            @else
                                                                <input type="checkbox" class="form-check-input" value="1" checked>????????????????????????
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->checkbox7)
                                                                <input type="checkbox" class="form-check-input" value="1">?????????????????????????????????
                                                            @else
                                                                <input type="checkbox" class="form-check-input" value="1" checked>?????????????????????????????????
                                                            @endif
                                                        </label>
                                                    </div>
                                                    <div class="form-check form-check-inline disabled">
                                                        <label class="form-check-label">
                                                            @if (!$cont->statusJob)
                                                                <input type="checkbox" class="form-check-input" value="1">???????????? ???
                                                            @else
                                                            @endif
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">?????????????????????????????????</h5>
                                                <div class="form-group">
                                                        <h5>&nbsp; &nbsp;????????????????????????????????????&nbsp;&nbsp;: &nbsp; &nbsp;{{ $cont->calculatedSystem }} &nbsp; ?????????</h5>
                                                        <p></p>
                                                </div>
                                                <div class="form-group">
                                                    <h5>&nbsp; &nbsp; ???????????????????????? ????????????   
                                                        @if ($cont->calculatedTechnician === null || $cont->calculatedTechnician == '0')
                                                        &nbsp;&nbsp;: &nbsp; &nbsp;{{ $cont->calculatedTechnician }}  &nbsp; ?????????
                                                    @endif
                                                </h5>
                                                 </div>
                                                 <div class="form-group">
                                                    <h5>&nbsp; &nbsp; ????????????????????????????????????????????? &nbsp;&nbsp;: &nbsp; &nbsp;{{ $cont->priceJob }}  &nbsp; ?????????</h5>
                                                 </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">?????????????????? ??????????????? ???????????????????????????????????? &nbsp;: &nbsp;{{ $cont->another2 }}</h5>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">???????????????????????????????????????????????????????????????
                                                        @php 
                                                        $dateDa = thaidate('l j F Y', $cont->pickUpDate)
                                                       @endphp
                                                       &nbsp;: &nbsp;{{$dateDa}}
                                                    
                                                </h5>
                                                <div class="form-group">
                                                   
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <h5 class="m-t-20">???????????????????????????????????? &nbsp;: &nbsp;{{ $cont->statusServeName}}</h5>
                                                <h5 class="m-t-20">???????????????????????????????????? ???????????????????????? &nbsp; :&nbsp;{{ $cont->insurance}}</h5>
                                            </div>           
                                        <div class="col-lg-6">
                                            <h5 class="m-t-20">????????????????????????????????????
                                                @php 
                                                $created = thaidate('l j F Y', $cont->created_at);
                                                $updated = thaidate('l j F Y', $cont->updated_at);
                                                @endphp
                                                    &nbsp; &nbsp;{{ $created}}
                                            </h5>
                                           
                                            <h5 class="">????????????????????????????????????
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
                                    <a href="{{ url('job-Status') }}" class="btn btn-primary">????????????????????????</a>
                                    <button type="button"  data-id="{{$cont->id}}" data-branch="{{$cont->commentBranch}}" data-mend="{{$cont->commentMend}}" data-name="{{$cont->statusJob}}" class="btn btn-indigo edit"  data-bs-toggle="modal" data-bs-target="#exampleModal" >
                                        ????????????????????????????????????
                                    </button>
                                </div>
                            </div>
                @endforeach
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
     
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">????????????????????????????????????</h5>
        </div>
        @php
        @endphp
       
            <form class="form-valide" action="{{ url('statusJobEdit') }}"
                method="POST">
                @csrf
            <div class="modal-body">
                <input class="form-control" id="dataId" name="id"  style="display:none">
                <select class="form-control"id="status" name="status" aria-label="Default select example">
                    @foreach ($dataStatus as $status)
                        <option value="{{$status->id}}">{{$status->statusServeName}}</option>
                    @endforeach
                </select>
                <br/>
                <textarea class="form-control" id="commentBranch" rows="3"  name="commentBranch" placeholder="?????????????????????????????? ????????????????????????????????? /  ???????????????"></textarea>
                <br/>
                <textarea class="form-control" id="commentMend" rows="3" name="commentMend"    placeholder="?????????????????????????????? ????????????????????? /  ???????????????"></textarea>
            </div>
            <div class="modal-footer">
            <button type="button" href="javascript:void(0)" class="btn btn-secondary" data-bs-dismiss="modal">??????????????????</button>
            <button type="submit" class="btn btn-primary">??????????????????</button>
            </div>
        </form>
      </div>
    </div>
  </div>
  <script>
$(document).ready(function(){
    $('body').on('click', '.edit', function () {
        var id = $(this).data('id');
        var name = $(this).data('name');
        var commentBranch = $(this).data('branch');
        var commentMend = $(this).data('mend');
    
        $('#statusName').html(name);
        $('#status').val(name);
        $('#commentMend').val(commentMend);
        $('#commentBranch').val(commentBranch);
        $('#dataId').val(id);
    });
});
</script>

@endsection
