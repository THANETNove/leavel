<div class="nav-header">
    <div class="brand-logo">
        <a href="{{url('home')}}">
            <h1 class="brand-logoText">{{ Session::get('nameWbe') }}</h1>
        </a>
    </div>
</div>


<div class="header">    
    <div class="header-content clearfix">
        
        <div class="nav-control">
            <div class="hamburger">
                <span class="toggle-icon"><i class="icon-menu"></i></span>
            </div>
        </div>
        <div class="header-left">
            <div class="input-group icons">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1">
                   <p class="color-text"> {{ Session::get('message') }}</p>
                    </span>
                </div>
            </div>
        </div>
        <div class="header-right">
            <ul class="clearfix">
                <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                        <i class="mdi mdi-bell-outline"></i>
                        <span class="badge badge-pill gradient-2 set"></span>
                       
                    </a>
                    <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                        <div class="dropdown-content-heading d-flex justify-content-between">
                            <span class=""> รายการซ่อม ใหม่</span>  
                            <a href="{{url('job-system')}}" class="d-inline-block">
                                <span class="badge badge-pill gradient-2 set"></span>
                            </a>
                        </div>
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a href="{{url('job-system')}}">
                                        <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                        <div class="notification-content">
                                            <h6 class="notification-heading"> รายการซ่อม</h6>
                                            <span class="notification-text set" ></span>&nbsp;&nbsp;รายการซ่อม ใหม่
                                        </div>
                                    </a>
                                </li>
                            </ul>
                            
                        </div>
                    </div>
                </li>
                <li class="icons dropdown">
                    <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                        <span class="activity active"></span>
                        <img src="{{asset('assetstoo/images/1.png')}}" height="40" width="40" alt="">
                    </div>
                    <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                        <div class="dropdown-content-body">
                            <ul>
                                <li>
                                    <a><i class="fas fa-user-circle"></i> <span>{{Auth::user()->username}}</span></a>
                                </li>
                                <li>
                                    <a href="{{url('edit-user',Auth::user()->id)}}"><i class="far fa-id-card"></i> <span>Profile</span></a>
                                </li>
                                <hr class="my-2">
                                <li><a  href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">
                                    <i class="icon-key"></i> <span>Logout</span></a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>