<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    
    <title>{{ Session::get('nameWbe') }}</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <style>
      
        @media print {
            @page {
                size: A4;
                margin: 2.5cm;
            }
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew Bold.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew Italic.ttf') }}") format('truetype');
        }
        @font-face {
            font-family: 'THSarabunNew';
            font-style: italic;
            font-weight: bold;
            src: url("{{ public_path('fonts/THSarabunNew BoldItalic.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
            font-size: 18px;
            margin-top: -30px;
        }
        .color-text{
            color: #ff5821;
        }
        .top {
            margin-top: -10px;
        }
        .top-button {
           margin-bottom: -50px;
        }
        .top-text {
            text-align: left;
            margin-top: -15px;
            text-align: left;
        }
        .top-textOthe {
            text-align: left;
            margin-top: -50px;
            text-align: left;
        }
        .top-another {
            margin-top: 0px;
        }
        .top-date {
            margin-top: 5px;
            margin-left:  75%;
        }
        .top-dateText {
            margin-left:  73%;
            margin-top: -15px;
        }
        .rgiht {
            text-align: right;
        }
        .left {
            text-align: left;
        }
        .line-height {
            line-height:70%;
        }
        .nameHeader {
            text-align: right;
            margin-top: -50px;
        }
        .dateHeader {
            position: absolute;
            margin-top: -40px;

        }
        .webHeader {
            margin-top: -10px;
        }
        .branchHeader {
            text-align: right;
            margin-top: -20px;
        }
        .nameUser {
            margin-top: -30px;
        }
        .phoneUser {
            margin-top: -20px;
        }
        .thick {
            font-weight: bold;
            font-size: 20px;
        }
        .thickText {
            font-weight: bold;
        }
        .list {
            position: absolute;
            margin-top: -15%;
        }
        .normal {
            font-weight: normal;
        }
        .box-rgiht{
            margin-top:10px;
            text-align: right;
            width: 300px;
            border: 1px solid rgb(114, 114, 114);
            padding: 5px;
            height: auto;
            margin-left: 58%;
        }

        .box-list {
            margin-top: -16px;
            width: 300px;
            border: 1px solid rgb(114, 114, 114);
            padding: 10px 10px -20px 10px;
            height: auto;
            margin-bottom: 15px;
        }
        .final {
            position: absolute;
            margin-left: 65%;
            margin-top: -20px;
        }
        .final-url {
            position: absolute;
            margin-left: 69%;
            margin-right: 2%;
            margin-top: 5px;
            width: 300px;
            height: auto;
        }
        .final-content {
            position: relative;
            margin-left: 65%;
            margin-top: -20px;
        }
        .final-other {
            position: relative;
            margin-left: 69%;
            margin-top: -50px;
        }


    
    </style>

</head>

<body>
    <h2 ALIGN="CENTER" class="color-text webHeader font-head">{{ $dataName }} </h2>
    @foreach ($data as $red)
    <p class="dateHeader thickText">วันที่ออกใบประกัน : {{$dateName}}</p> 
    @endforeach
    <p class="nameHeader">(ใบรับประกัน)</p>
    @foreach ($data as $red)
    <p class="final-content thickText">รหัสใบใบประกัน  &nbsp; : &nbsp; <span class="normal">{{$red->receiptCode}}</span> </p>
    <p class="final-content thickText"> ชื่อร้าน &nbsp; : &nbsp; <span class="normal">{{$red->name}}</span></p>
    <p class="final-content thickText">    สาขา  &nbsp; : &nbsp; <span class="normal">{{$red->branch}}</span></p>
    <p class="final-content thickText"> เบอร์ติดต่อ &nbsp; : &nbsp; <span class="normal">{{$red->branchPhone}}</span> <br />เบอร์ติดต่อ(สำรอง)  &nbsp; : &nbsp; <span class="normal">{{$red->branchPhoneReserve}}</span></p>
    <div class="list">
        <p class="nameUser thickText">ชื่อ-นามสกุล  &nbsp; : &nbsp; <span class="normal">{{$red->username}} </span></p>
        <p class="phoneUser thickText">เบอร์ติดต่อ  &nbsp; : &nbsp; <span class="normal">{{$red->phone}}</span> </p>
        <p class="phoneUser thickText">ยี่ห้อ  &nbsp; : &nbsp; <span class="normal">{{$red->brandName}}</span>&nbsp; &nbsp; รุ่น  &nbsp; : &nbsp;<span class="normal"> {{$red->deviceModel}}</span></span> </p>
        <p class="phoneUser thickText">โมเดล  &nbsp; : &nbsp; <span class="normal">{{$red->model}}</span></p>
        <p class="phoneUser thickText">อะไหล่  &nbsp; : &nbsp; <span class="normal">{{$red->groupName}} &nbsp; : &nbsp;{{$red->nameItem}}</span> </p>
        <p class="phoneUser thickText">IMEI  &nbsp; : &nbsp; <span class="normal">{{$red->imei}}</span> </p>
        <p class="phoneUser thickText">ประกันอะไหล่ / วัน  &nbsp; : &nbsp; <span class="normal">{{$red->guaranteeDate}}&nbsp; วัน</span> </p>
        <p class="phoneUser thickText">สินสุดประกัน  &nbsp; : &nbsp; <span class="normal">{{$red->insurance}}</span> </p>
        <p class="phoneUser thick">เงื่อนไขเพิ่มเติม</p>
        <p class="phoneUser thickText">1. <span class="normal">&nbsp;กรณีโทศัพท์มือถือมีปัญหาหลังจากการการใช้บริการ สามารถนำมาตรวจสอบได้ ในระยะเวลาประกัน</span></p>
        <p class="phoneUser thickText">2. <span class="normal">&nbsp;กรณีนำโทรศัพท์ซ่อมที่อื่น เเล้วมีการปลี่ยน อะไหล่ใบรับประกันจะหมดอายุลงทันที </span></p>
        <p class="phoneUser thickText">3. <span class="normal">&nbsp;ถ้า วอยด์ประกันสินค้า ชำรุดหรือมีรอยดัดแปลงแก้ไข ถือว่าประกันหมด</span></p>
        <p class="phoneUser thickText">4. <span class="normal">&nbsp;อะไหล่ที่ทางร้านเปลี่ยนให้ลูกค้าไม่สามารถถอดออกได้</span></p>
    </div>
    <p class="final-content thick">การติดต่ออื่น ๆ</p>
    <div class="line-height margin-top">
        <div class="final-other">
            <p>{!!$red->otherContacts!!}</p>
        </div>
    </div>
        <p class="final thick">เว็บไชต์ ร้านค้า</p>
       
        <p class="final-url">
           @php
           $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]";
        @endphp         
        {{$actual_link}}   
        </p>
    @endforeach
    <div class="hr"></div>

</body>

</html>
