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
    <link href="{{ asset('assets/img/image-icon.png') }}" rel="icon">
    <link href="{{ asset('assets/img/image-icon.png') }}" rel="apple-touch-icon">
    <link rel="shortcut icon" href="{{ asset('assets/img/image-icon.png') }}" type="image/x-icon">
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

        .color-text {
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
            margin-left: 75%;
        }

        .top-dateText {
            margin-left: 73%;
            margin-top: -15px;
        }

        .rgiht {
            text-align: right;
        }

        .left {
            text-align: left;
        }

        .line-height {
            line-height: 70%;
        }

        .hr {
            position: relative;
            ;
            margin-top: 16%;
            border-top: 1px dotted rgb(110, 110, 110);

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
            margin-left: 58%;
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
            margin-top: -17%;
        }

        .normal {
            font-weight: normal;
        }

        .box-rgiht {
            margin-top: 10px;
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
            margin-left: 58%;
            margin-top: -20px;
        }

        .final-url {
            position: absolute;
            margin-left: 58%;
            margin-right: 2%;
            margin-top: 5px;
            width: 300px;
            height: auto;
        }

        .final-status {
            position: absolute;
            margin-left: 58%;
            margin-top: 20px;
            padding-top: -10px;
        }

        .final-status2 {
            position: absolute;
            margin-left: 58%;
            margin-top: 40px;
            padding-top: -10px;
        }

        .final-content {
            position: relative;
            margin-left: 58%;
            margin-top: -50px;
        }

        .final-date {
            position: relative;
            margin-left: 58%;
            margin-top: 5px;
        }

        .final-dateTexe {
            position: relative;
            margin-left: 58%;
            margin-top: -20px;
        }

        .image-pass {
            position: absolute;
            margin-top: -50px;
            width: 130px;
            height: 120px;
            margin-left: 84%;
            border: 1px solid rgb(114, 114, 114);
        }

        .border1 {
            position: absolute;
            margin-top: -30px;
            width: 8px;
            height: 8px;
            margin-left: 87%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border2 {
            position: absolute;
            margin-top: -30px;
            width: 8px;
            height: 8px;
            margin-left: 93%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border3 {
            position: absolute;
            margin-top: -30px;
            width: 8px;
            height: 8px;
            margin-left: 99%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border4 {
            position: absolute;
            margin-top: 5px;
            width: 8px;
            height: 8px;
            margin-left: 87%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border5 {
            position: absolute;
            margin-top: 5px;
            width: 8px;
            height: 8px;
            margin-left: 93%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border6 {
            position: absolute;
            margin-top: 5px;
            width: 8px;
            height: 8px;
            margin-left: 99%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border7 {
            position: absolute;
            margin-top: 40px;
            width: 8px;
            height: 8px;
            margin-left: 87%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border8 {
            position: absolute;
            margin-top: 40px;
            width: 8px;
            height: 8px;
            margin-left: 93%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

        .border9 {
            position: absolute;
            margin-top: 40px;
            width: 8px;
            height: 8px;
            margin-left: 99%;
            border: 1px solid rgb(0, 0, 0);
            border-radius: 50%;
            background-color: rgb(0, 0, 0);
        }

    </style>

</head>

<body>
    <h2 ALIGN="CENTER" class="color-text webHeader font-head">{{ $dataName }} </h2>
    @foreach ($data as $red)
        <p class="dateHeader thickText">วันที่ออกใบซ่อม : {{ $dateName }}</p>
    @endforeach
    <p class="nameHeader">(ร้าน)</p>
    @foreach ($data as $red)
        <p class="final-content thickText">รหัสใบซ่อม &nbsp; : &nbsp; <span
                class="normal">{{ $red->receiptCode }}</span> </p>
        <p class="branchHeader thickText"> ชื่อร้าน &nbsp; : &nbsp; <span
                class="normal">{{ $red->name }}</span> </p>
        <p class="branchHeader thickText">สาขา &nbsp; : &nbsp; <span class="normal">{{ $red->branch }}</span>
        </p>
        <p class="branchHeader thickText"> เบอร์ติดต่อ &nbsp; : &nbsp; <span
                class="normal">{{ $red->branchPhone }}</span> </p>
        <p class="branchHeader thickText">เบอร์ติดต่อ(สำรอง) &nbsp; : &nbsp; <span
                class="normal">{{ $red->branchPhoneReserve }}</span></p>
        <div class="list">
            <p class="nameUser thickText">ชื่อ-นามสกุล &nbsp; : &nbsp; <span
                    class="normal">{{ $red->username }} </span></p>
            <p class="phoneUser thickText">เบอร์ติดต่อ &nbsp; : &nbsp; <span
                    class="normal">{{ $red->phone }}</span> </p>
            <p class="phoneUser thickText">ยี่ห้อ &nbsp; : &nbsp; <span
                    class="normal">{{ $red->brandName }}</span>&nbsp; &nbsp; รุ่น &nbsp; : &nbsp;<span
                    class="normal"> {{ $red->deviceModel }}</span></span> </p>
            <p class="phoneUser thickText">หมายเลขเครื่อง(IMEI) &nbsp; : &nbsp; <span
                    class="normal">{{ $red->imei }}</span> </p>
            <p class="phoneUser thickText">รหัสปลดล็อกหน้าจอ &nbsp; : &nbsp; <span
                    class="normal">{{ $red->screenUnlock }}</span> </p>
            <p class="phoneUser thickText">กลุ่ม อาการเสีย &nbsp; : &nbsp; <span
                    class="normal">{{ $red->groupName }}</span> </p>
            <div class="box-list line-height ">
                <p class="thick top-another">อาการเสีย อื่น ๆ</p>
                <p class="top-text">{!! $red->another !!}</p>
            </div>
            <p class="phoneUser thickText">ราคาค่าซ่อม &nbsp; : &nbsp; <span class="normal">
                    {{-- @php
            $price = number_format(round($red->priceJob) )
        @endphp --}}
                    {{ $red->priceJob }}
                </span>&nbsp; บาท </p>
            <p class="phoneUser thick">เงื่อนไขเพิ่มเติม</p>
            <p class="phoneUser thickText">1. <span
                    class="normal">&nbsp;กรุณาตรวจสอบความเรียบร้อยของสินค้าเเละอุปกรณ์ที่มากับเครื่อง<br>&nbsp;&nbsp;&nbsp;ให้เรียบร้อยก่อนเเละหลังในรับบริการ</span>
            </p>
            <p class="phoneUser thickText">2. <span class="normal">&nbsp;ถ้าสินค้าที่นำมาซ่อม
                    ไม่สามาติดต่อลูกค้าเเละลูกค้าไม่ได้ติดต่อกลับมา<br>&nbsp;&nbsp;&nbsp; ภายใน 15 วัน
                    นับจากวันที่ใบนัดรับเครื่อง ถือว่าสละสิทธิ์ในสินค้าที่นำซ่อม</span></p>
        </div>
        <p class="branchHeader thick">รายการที่ใส่มาด้วย</p>
        <div class="branchHeader line-height margin-top">
            @if (!$red->checkbox1)
                <input type="checkbox">
                <label for="contactChoice1">ตัวเครื่อง</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">ตัวเครื่อง</label>
            @endif
            @if (!$red->checkbox2)
                <input type="checkbox">
                <label for="contactChoice1">เเบตเตอร์รี่</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">เเบตเตอร์รี่</label>
            @endif
            @if (!$red->checkbox3)
                <input type="checkbox">
                <label for="contactChoice1">สายซาร์จ</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">สายซาร์จ</label>
            @endif
            @if (!$red->checkbox4)
                <input type="checkbox">
                <label for="contactChoice1">เคส</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">เคส</label>
            @endif
            <br />
            @if (!$red->checkbox5)
                <input type="checkbox">
                <label for="contactChoice1">เมมโมรี่การ์ด</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">เมมโมรี่การ์ด</label>
            @endif
            @if (!$red->checkbox6)
                <input type="checkbox">
                <label for="contactChoice1">ซิมการ์ด</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">ซิมการ์ด</label>
            @endif
            @if (!$red->checkbox7)
                <input type="checkbox">
                <label for="contactChoice1">อะเด๊ปเตอร์</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">อะเด๊ปเตอร์</label>
            @endif
            @if (!$red->checkbox8)
                <input type="checkbox">
                <label for="contactChoice1">อื่น ๆ</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">อื่น ๆ</label>
            @endif
        </div>
        <div class="box-rgiht line-height">
            <p class="left thick top-another">อุปกรณ์ อื่น ๆ</p>
            <p class="top-text">{!! $red->another2 !!}</p>
        </div>
        <p class="final-date line-height thick">วันที่นัดรับเครื่อง</p>
        <p class="final-dateTexe line-height">
            @php
                $dateDa = thaidate('l j F Y', $red->pickUpDate);
            @endphp
            {{ $dateDa }}
        </p>
        <p class="final thick">เว็บไชต์ ร้านค้า</p>
        <p class="final-url">
            @php
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]";
            @endphp
            {{ $actual_link }}
        </p>
        <p class="final-status thick">สามารถตราจ</p>
        <p class="final-status2 thick"> สถานะการซ่อมได้ทาง เว็บไชต์</p>
        <p class="image-pass"></p>
        <p class="border1"></p>
        <p class="border2"></p>
        <p class="border3"></p>
        <p class="border4"></p>
        <p class="border5"></p>
        <p class="border6"></p>
        <p class="border7"></p>
        <p class="border8"></p>
        <p class="border9"></p>
    @endforeach
    {{-- ***********************************

        ///
        -********************************** --}}
    <div class="hr"></div>
    <h2 align="center" class="color-text top font-head">{{ $dataName }}</h2>
    @foreach ($data as $red)
        <p class="dateHeader thick">วันที่ออกใบซ่อม : {{ $dateName }}</p>
    @endforeach
    <p class="nameHeader">(ลูกค้า)</p>
    @foreach ($data as $red)
        <p class="final-content thickText">รหัสใบซ่อม &nbsp; : &nbsp; <span
                class="normal">{{ $red->receiptCode }}</span> </p>
        <p class="branchHeader thickText"> ชื่อร้าน &nbsp; : &nbsp; <span
                class="normal">{{ $red->name }}</span> </p>
        <p class="branchHeader thickText">สาขา &nbsp; : &nbsp; <span class="normal">{{ $red->branch }}</span>
        </p>
        <p class="branchHeader thickText"> เบอร์ติดต่อ &nbsp; : &nbsp; <span
                class="normal">{{ $red->branchPhone }}</span> </p>
        <p class="branchHeader thickText">เบอร์ติดต่อ(สำรอง) &nbsp; : &nbsp; <span
                class="normal">{{ $red->branchPhoneReserve }}</span></p>
        <div class="list">
            <p class="nameUser thickText">ชื่อ-นามสกุล &nbsp; : &nbsp; <span
                    class="normal">{{ $red->username }} </span></p>
            <p class="phoneUser thickText">เบอร์ติดต่อ &nbsp; : &nbsp; <span
                    class="normal">{{ $red->phone }}</span> </p>
            <p class="phoneUser thickText">ยี่ห้อ &nbsp; : &nbsp; <span
                    class="normal">{{ $red->brandName }}</span>&nbsp; &nbsp; รุ่น &nbsp; : &nbsp;<span
                    class="normal"> {{ $red->deviceModel }}</span></p>
            <p class="phoneUser thickText">หมายเลขเครื่อง(IMEI) &nbsp; : &nbsp; <span
                    class="normal">{{ $red->imei }}</span> </p>
            <p class="phoneUser thickText">รหัสปลดล็อกหน้าจอ &nbsp; : &nbsp; <span
                    class="normal">{{ $red->screenUnlock }}</span> </p>
            <p class="phoneUser thickText">กลุ่ม อาการเสีย &nbsp; : &nbsp; <span
                    class="normal">{{ $red->groupName }}</span> </p>
            <div class="box-list line-height ">
                <p class="thick top-another">อาการเสีย อื่น ๆ</p>
                <p class="top-text">{!! $red->another !!}</p>
            </div>
            <p class="phoneUser thickText">ราคาค่าซ่อม &nbsp; : &nbsp; <span class="normal">
                    {{-- @php
            $price = number_format(round($red->priceJob) )
        @endphp --}}
                    {{ $red->priceJob }}
                </span>&nbsp; บาท </p>
            <p class="phoneUser thick">เงื่อนไขเพิ่มเติม</p>
            <p class="phoneUser thickText">1. <span
                    class="normal">&nbsp;กรุณาตรวจสอบความเรียบร้อยของสินค้าเเละอุปกรณ์ที่มากับเครื่อง<br>&nbsp;&nbsp;&nbsp;ให้เรียบร้อยก่อนเเละหลังในรับบริการ</span>
            </p>
            <p class="phoneUser thickText">2. <span class="normal">&nbsp;ถ้าสินค้าที่นำมาซ่อม
                    ไม่สามาติดต่อลูกค้าเเละลูกค้าไม่ได้ติดต่อกลับมา<br>&nbsp;&nbsp;&nbsp; ภายใน 15 วัน
                    นับจากวันที่ใบนัดรับเครื่อง ถือว่าสละสิทธิ์ในสินค้าที่นำซ่อม</span></p>
        </div>
        <p class="branchHeader thick">รายการที่ใส่มาด้วย</p>
        <div class="branchHeader line-height margin-top">
            @if (!$red->checkbox1)
                <input type="checkbox">
                <label for="contactChoice1">ตัวเครื่อง</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">ตัวเครื่อง</label>
            @endif
            @if (!$red->checkbox2)
                <input type="checkbox">
                <label for="contactChoice1">เเบตเตอร์รี่</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">เเบตเตอร์รี่</label>
            @endif
            @if (!$red->checkbox3)
                <input type="checkbox">
                <label for="contactChoice1">สายซาร์จ</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">สายซาร์จ</label>
            @endif
            @if (!$red->checkbox4)
                <input type="checkbox">
                <label for="contactChoice1">เคส</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">เคส</label>
            @endif
            <br />
            @if (!$red->checkbox5)
                <input type="checkbox">
                <label for="contactChoice1">เมมโมรี่การ์ด</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">เมมโมรี่การ์ด</label>
            @endif
            @if (!$red->checkbox6)
                <input type="checkbox">
                <label for="contactChoice1">ซิมการ์ด</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">ซิมการ์ด</label>
            @endif
            @if (!$red->checkbox7)
                <input type="checkbox">
                <label for="contactChoice1">อะเด๊ปเตอร์</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">อะเด๊ปเตอร์</label>
            @endif
            @if (!$red->checkbox8)
                <input type="checkbox">
                <label for="contactChoice1">อื่น ๆ</label>
            @else
                <input type="checkbox" checked>
                <label for="contactChoice1">อื่น ๆ</label>
            @endif
        </div>
        <div class="box-rgiht line-height">
            <p class="left thick top-another">อุปกรณ์ อื่น ๆ</p>
            <p class="top-text">{!! $red->another2 !!}</p>
        </div>
        <p class="final-date line-height thick">วันที่นัดรับเครื่อง</p>
        <p class="final-dateTexe line-height">
            @php
                $dateDa = thaidate('l j F Y', $red->pickUpDate);
            @endphp
            {{ $dateDa }}
        </p>
        <p class="final thick">เว็บไชต์ ร้านค้า</p>
        <p class="final-url">
            @php
                $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https' : 'http') . "://$_SERVER[HTTP_HOST]";
            @endphp
            {{ $actual_link }}
        </p>
        <p class="final-status thick">สามารถตราจ</p>
        <p class="final-status2 thick"> สถานะการซ่อมได้ทาง เว็บไชต์</p>
        <p class="image-pass"></p>
        <p class="border1"></p>
        <p class="border2"></p>
        <p class="border3"></p>
        <p class="border4"></p>
        <p class="border5"></p>
        <p class="border6"></p>
        <p class="border7"></p>
        <p class="border8"></p>
        <p class="border9"></p>
    @endforeach
</body>

</html>
