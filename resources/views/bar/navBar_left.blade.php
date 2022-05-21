<div class="nk-sidebar">           
    <div class="nk-nav-scroll">
        <ul class="metismenu" id="menu">
            <li class="nav-label">Category Menu</li>
            <li>
                <a href="{{url('home')}}" aria-expanded="false">
                    <i class="fas fa-home"></i><span class="nav-text">Home</span>
                </a>
            </li>
            <li>
                <a href="{{url('job-system')}}" aria-expanded="false">
                    <i class="fas fa-file-import"></i><span class="nav-text">นำงานซ่อมเข้าระบบ</span>
                </a>
            </li>
            <li>
                <a href="{{url('job-Status')}}" aria-expanded="false">
                    <i class="fas fa-align-justify"></i><span class="nav-text">สถานะ</span>
                </a>
            </li>
            <li>
                <a href="{{url('spares')}}" aria-expanded="false">
                    <i class="fas fa-cogs"></i><span class="nav-text">ระบบราคาอะไหล่ ที่มา</span>
                </a>
            </li>
            <li>
                <a href="{{url('repair-group')}}" aria-expanded="false">
                    <i class="fas fa-tools"></i><span class="nav-text">กลุ่มงานซ่อม</span>
                </a>
                
            </li>
            <li>
                <a href="{{url('system')}}" aria-expanded="false">
                    <i class="fab fa-apple"></i><span class="nav-text">ระบบปฏิบัติการ</span>
                </a>
                
            </li>
            <li>
                <a href="{{url('brand')}}" aria-expanded="false">
                    <i class="fas fa-mobile-alt"></i><span class="nav-text">ยี่ห้ออุปกรณ์</span>
                </a>
                
            </li>
            <li>
                <a href="{{url('generation')}}" aria-expanded="false">
                    <i class="fad fa-mobile"></i><span class="nav-text">รุ่นอุปกรณ์</span>
                </a>
                
            </li>
            <li>
                <a href="{{url('grade')}}" aria-expanded="false">
                    <i class="fab fa-gg"></i><span class="nav-text">เกรดอุปกรณ์</span>
                </a>
                
            </li>
          
            <li>
                <a href="{{url('sta-serve')}}" aria-expanded="false">
                    <i class="fas fa-plus-octagon"></i><span class="nav-text">สถานะ การซ่อม</span>
                </a>
            </li>
            
            <li>
                <a href="{{url('store-mobile')}}" aria-expanded="false">
                    <i class="fas fa-store"></i><span class="nav-text">ร้านอะไหล่</span>
                </a>
            </li>

            @if(Auth::user()->status === '0' )
               
                <li>
                    <a href="{{url('risk')}}" aria-expanded="false">
                        <i class="fas fa-strikethrough"></i><span class="nav-text">ความเสี่ยง</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('branch')}}" aria-expanded="false">
                        <i class="fas fa-badge"></i><span class="nav-text">สาขา</span>
                    </a>
                </li>
                <li>
                    <a href="{{url('admin')}}" aria-expanded="false">
                        <i class="fas fa-users"></i><span class="nav-text">พนักงาน</span>
                    </a>
                </li>
                <li class="">
                    <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                        <i class="fas fa-kaaba"></i><span class="nav-text">หน้าเเรก</span>
                    </a>
                    <ul aria-expanded="false" class="collapse" style="height: 0px;">
                        <li  id="add-home"><a href="{{url('add-home')}}">หน้าเเรก</a></li>
                        <li><a href="{{url('add-about')}}">เกี่ยวกับเรา</a></li>
                        <li><a href="{{url('add-services')}}">บริการ</a></li>
                        <li><a href="{{url('add-portfolio')}}">ผลงาน</a></li>
                        <li><a href="{{url('add-contact')}}">ติดต่อเรา</a></li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</div>