@extends('layouts.app_index')

@section('content')
    <!-- ======= Top Bar ======= -->
    <section id="topbar" class="d-flex align-items-center">
        <div class="container d-flex justify-content-center justify-content-md-between">

            <div class="contact-info d-flex align-items-center">
                @foreach ($contactTops as $contop)
                    {!! $contop->iconTop1 !!} &nbsp;{!! $contop->textTop1 !!} &nbsp;&nbsp;&nbsp; {!! $contop->iconTop2 !!} &nbsp;
                    {!! $contop->textTop2 !!}
                @endforeach
            </div>

            <div class="cta d-none d-md-flex align-items-center">
            </div>
        </div>
    </section>

    <!-- ======= Header ======= -->
    <header id="header" class="d-flex align-items-center">
        <div class="container d-flex align-items-center justify-content-between">

            <div class="logo">
                @foreach ($homeTop as $top)
                    <h1><a href="{{ url('/') }}">{{ $top->webName }}</a></h1>
                @endforeach
                <!-- Uncomment below if you prefer to use an image logo -->
                <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
            </div>

            <nav id="navbar" class="navbar">
                <ul>
                    <li><a class="nav-link scrollto active" href="#hero">หน้าเเรก</a></li>
                    <li><a class="nav-link scrollto" href="#about">เกี่ยวกับเรา</a></li>
                    <li><a class="nav-link scrollto" href="#services">บริการ</a></li>
                    <li><a class="nav-link scrollto " href="#portfolio">ผลงาน</a></li>
                    <li><a class="nav-link scrollto" href="#team">เช็คประกัน</a></li>
                    <li><a class="nav-link scrollto" href="#contact">ติดต่อเรา</a></li>
                    <li><a class="nav-link scrollto" href="{{ route('login') }}">เข้าสู่ระบบ</a></li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

        </div>
    </header><!-- End Header -->
    <!-- ======= Hero Section ======= -->
    @foreach ($homeTop as $top)
        <section id="hero" class="d-flex flex-column justify-content-center align-items-center  center center"
            style="background-image: url('{{ asset('assets/img/top/' . '' . $top->backgroundImageTop) }}');">
            <div class="container" data-aos="fade-in">
                <h1>{{ $top->textH1Name }}</h1>
                <h2>{{ $top->textPName }}</h2>
                <div class="d-flex align-items-center">
                    <i class="bx bxs-right-arrow-alt get-started-icon"></i>
                    <a href="#about" class="btn-get-started scrollto">Get Started</a>
                </div>
            </div>

        </section><!-- End Hero -->
    @endforeach
    <main id="main">

        <!-- ======= Why Us Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container">
                @foreach ($homeTop as $top)
                    <div class="row">
                        <div class="col-xl-4 col-lg-5" data-aos="fade-up">
                            <div class="content">
                                <h3>{{ $top->textH1NameOrange }}</h3>
                                <p>
                                    {{ $top->textPNameOrange }}
                                </p>
                                <div class="text-center">
                                    <a href="#" class="more-btn">Learn More <i class="bx bx-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8 col-lg-7 d-flex">
                            <div class="icon-boxes d-flex flex-column justify-content-center">
                                <div class="row">
                                    <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up"
                                        data-aos-delay="100">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            {!! $top->iconBox1 !!}
                                            <h4>{!! $top->textH1NameBox1 !!}</h4>
                                            <p>{!! $top->textPNameBox1 !!}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up"
                                        data-aos-delay="200">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            {!! $top->iconBox2 !!}
                                            <h4> {!! $top->textH1NameBox2 !!}</h4>
                                            <p>{!! $top->textPNameBox2 !!}</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 d-flex align-items-stretch" data-aos="fade-up"
                                        data-aos-delay="300">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            {!! $top->iconBox3 !!}
                                            <h4>{!! $top->textH1NameBox3 !!}</h4>
                                            <p>{!! $top->textPNameBox3 !!}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section><!-- End Why Us Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about section-bg">
            <div class="container">
                @foreach ($homeTop as $top)
                    <div class="row">
                        <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative"
                            data-aos="fade-right"
                            style="background-image: url('{{ asset('assets/img/about/' . '' . $top->backgroundImageVideo) }}');">
                            <a href="{!! $top->url !!}" class="glightbox play-btn mb-4"></a>
                        </div>

                        <div
                            class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5">
                            <h4 data-aos="fade-up">เกี่ยวกับเรา</h4>
                            <h3 data-aos="fade-up">{!! $top->textH1NameAbout !!}</h3>
                            <p data-aos="fade-up">{!! $top->textPNameAbout !!}</p>

                            <div class="icon-box" data-aos="fade-up">
                                <div class="icon">
                                    {!! $top->icon1About !!}
                                </div>
                                <h4 class="title"><a href="">{!! $top->textH3NameAbout1 !!}</a></h4>
                                <p class="description">{!! $top->textP1NameAbout1 !!}</p>
                            </div>

                            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                                <div class="icon">
                                    {!! $top->icon2About !!}
                                </div>
                                <h4 class="title"><a href=""> {!! $top->textH3NameAbout2 !!}</a></h4>
                                <p class="description"> {!! $top->textP1NameAbout2 !!}</p>
                            </div>

                            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
                                <div class="icon">
                                    {!! $top->icon3About !!}
                                </div>
                                <h4 class="title"><a href=""> {!! $top->textH3NameAbout3 !!}</a></h4>
                                <p class="description">{!! $top->textP1NameAbout3 !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </section><!-- End About Section -->

        <!-- ======= Clients Section ======= -->
        <section id="clients" class="clients">
            <div class="container" data-aos="fade-up">

                <div class="clients-slider swiper">
                    <div class="swiper-wrapper align-items-center">
                        <div class="swiper-slide"><img src="{{ asset('assets/img/about/clients/' . '' . $top->logo1) }}"
                                class="img-fluid" alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/img/about/clients/' . '' . $top->logo2) }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/img/about/clients/' . '' . $top->logo3) }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/img/about/clients/' . '' . $top->logo4) }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/img/about/clients/' . '' . $top->logo5) }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/img/about/clients/' . '' . $top->logo6) }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/img/about/clients/' . '' . $top->logo7) }}" class="img-fluid"
                                alt=""></div>
                        <div class="swiper-slide"><img
                                src="{{ asset('assets/img/about/clients/' . '' . $top->logo8) }}" class="img-fluid"
                                alt=""></div>
                    </div>
                    <div class="swiper-pagination"></div>
                </div>

            </div>
        </section><!-- End Clients Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services section-bg">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>บริการ</h2>
                    @foreach ($servicesText as $text)
                        <p>{{ $text->indexText }}</p>
                    @endforeach
                </div>
                <div class="row">
                    @foreach ($services as $serv)
                        <div class="col-lg-4 col-md-6" data-aos="fade-up">
                            <div class="icon-box">
                                <div class="icon">
                                    {!! $serv->iconBox1Service !!}
                                </div>
                                <h4 class="title"><a href=""> {!! $serv->textH1NameBox1Service !!}</a></h4>
                                <p class="description"> {!! $serv->textPNameBox1Service !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section><!-- End Services Section -->

        <!-- ======= Values Section ======= -->

        <section id="values" class="values">
            <div class="container">
                <div class="row">
                    <div class="row">
                        @foreach ($backImages as $serv)
                            <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up">
                                <div class="card"
                                    style="background-image: url('{{ asset('assets/img/service/' . '' . $serv->backgroundImageService) }}');">
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="">{!! $serv->textH1NameBox2Service !!}</a></h5>
                                        <p class="card-text">{!! $serv->textPNameBox2Service !!}</p>
                                        <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read
                                                Top</a></div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
            </div>
        </section><!-- End Values Section -->




        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">ผลงาน</h2>
                    @foreach ($portfolioText as $port)
                        <p data-aos="fade-up">{!! $port->textPortfolio !!}</p>
                    @endforeach
                </div>

                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">
                            <li data-filter="*" class="filter-active">All</li>
                            <li data-filter=".filter-app">ใบประกาศ</li>
                            <li data-filter=".filter-card">เครื่องมือ</li>
                            <li data-filter=".filter-web">ภาพผลงาน</li>
                        </ul>
                    </div>
                </div>

                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
                    @foreach ($portfolio as $image)
                        @if ($image->statusImage === '1')
                            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                                <img src="{{ asset('assets/img/portfolio/' . '' . $image->backgroundImagePortfolio) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{!! $image->textH1NamePortfolio !!}</h4>
                                    <p>{!! $image->textPNamePortfolio !!}</p>
                                    <a href="{{ asset('assets/img/portfolio/' . '' . $image->backgroundImagePortfolio) }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                        title="App 1"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        @elseif($image->statusImage === '2')
                            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                                <img src="{{ asset('assets/img/portfolio/' . '' . $image->backgroundImagePortfolio) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{!! $image->textH1NamePortfolio !!}</h4>
                                    <p>{!! $image->textPNamePortfolio !!}</p>
                                    <a href="{{ asset('assets/img/portfolio/' . '' . $image->backgroundImagePortfolio) }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                        title="Web 3"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        @else
                            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                                <img src="{{ asset('assets/img/portfolio/' . '' . $image->backgroundImagePortfolio) }}"
                                    class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4>{!! $image->textH1NamePortfolio !!}</h4>
                                    <p>{!! $image->textPNamePortfolio !!}</p>
                                    <a href="{{ asset('assets/img/portfolio/' . '' . $image->backgroundImagePortfolio) }}"
                                        data-gallery="portfolioGallery" class="portfolio-lightbox preview-link"
                                        title="Card 1"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        @endif
                    @endforeach

                </div>

            </div>
        </section><!-- End Portfolio Section -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team section-bg">
            <div class="container">
                <div class="section-title">
                    <h3>ตรวจสอบสถานะ และตรวจสอบการรับประกัน</h3>
                    <div class="search-form_index" data-aos="fade-up">
                        <form>
                            <input type="text" id="insurance" class="form-control-search " name="insurance">
                            <button type="button" id="submit" class="search-form_button"><i
                                    class="bi bi-search"></i></button>
                        </form>
                    </div>
                    <br />
                    <p data-aos="fade-up" id="dataUser"></p>
                </div>
            </div>
        </section><!-- End Team Section -->

        <!-- ======= Contact Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="section-title">
                    <h2 data-aos="fade-up">ติดต่อเรา</h2>
                    @foreach ($contactText as $contText)
                        <p data-aos="fade-up">{!! $contText->textContact !!}</p>
                    @endforeach
                </div>

                <div class="row justify-content-center">
                    @foreach ($contact as $cont)
                        <div class="col-xl-3 col-lg-4 mt-4" data-aos="fade-up">
                            <div class="info-box">
                                {!! $cont->iconContact !!}
                                <h3> {!! $cont->textH1NameContact !!}</h3>
                                <p>{!! $cont->textPNameContact !!}</p>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </section><!-- End Contact Section -->

    </main><!-- End #main -->

    <script type="text/javascript">
        $("#submit").click(function() {
            let name = document.getElementById("insurance").value;
            $.ajax({
                url: "{{ url('insurance') }}",
                method: "post",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name
                },
                success: function(data,statusData) {
                   console.log(data,statusData);
                  
                    let username = data.data[0].username;
                    let phone = data.data[0].phone;
                    let color = data.data[0].color;
                    let brand = data.data[0].brandName;
                    let deviceModel = data.data[0].deviceModel;
                    let model = data.data[0].model;
                    let status = data.data[0].statusJob;
                    let groupName = data.data[0].groupName;
                    let insurance = data.data[0].insurance;
                    let name = data.data[0].name;
                    let branch = data.data[0].branch;
                    let branchPhone = data.data[0].branchPhone;
                    let dataText;
                    let result = data.statusData.filter(statusData => statusData.id === Number(status));
                        status = result[0].statusServeName
                
                    if (insurance === null) {
                        if (status === null) {
                            dataText =
                        `ชื่อลูกค้า &nbsp; : &nbsp; ${username} &nbsp;&nbsp; เบอตร์ติด &nbsp;: ${phone} &nbsp;&nbsp;ยี่ห้อ &nbsp;:&nbsp; ${brand}  &nbsp;&nbsp; รุ่น &nbsp;:&nbsp; ${deviceModel} &nbsp;&nbsp; สี &nbsp;: &nbsp; ${color}  &nbsp;&nbsp;สถานะ &nbsp;:&nbsp;  รอการยืนยันซ่อม <br> &nbsp;&nbsp; กลุ่มงานซ่อม &nbsp;:&nbsp; ${groupName}  <br> ชื่อร้าน &nbsp;:&nbsp; ${name} &nbsp;&nbsp; สาขา&nbsp;:&nbsp; ${branch} &nbsp;&nbsp; เบอร์ติดต่อสาขา&nbsp;:&nbsp; ${branchPhone}`;
                        }else{
                            dataText =
                        `ชื่อลูกค้า &nbsp; : &nbsp; ${username} &nbsp;&nbsp; เบอตร์ติด &nbsp;: ${phone} &nbsp;&nbsp;ยี่ห้อ &nbsp;:&nbsp; ${brand}  &nbsp;&nbsp; รุ่น &nbsp;:&nbsp; ${deviceModel} &nbsp;&nbsp; สี &nbsp;: &nbsp; ${color}  &nbsp;&nbsp;สถานะ &nbsp;:&nbsp;  ${status} <br> &nbsp;&nbsp; กลุ่มงานซ่อม &nbsp;:&nbsp; ${groupName}  <br> ชื่อร้าน &nbsp;:&nbsp; ${name} &nbsp;&nbsp; สาขา&nbsp;:&nbsp; ${branch} &nbsp;&nbsp; เบอร์ติดต่อสาขา&nbsp;:&nbsp; ${branchPhone}`;
                        }
                        
                    }else{
                        if (status === null) {
                            dataText =
                        `ชื่อลูกค้า &nbsp; : &nbsp; ${username} &nbsp;&nbsp; เบอตร์ติด &nbsp;: ${phone} &nbsp;&nbsp;ยี่ห้อ &nbsp;:&nbsp; ${brand}  &nbsp;&nbsp; รุ่น &nbsp;:&nbsp; ${deviceModel} &nbsp;&nbsp; สี &nbsp;: &nbsp; ${color}  &nbsp;&nbsp;สถานะ &nbsp;:&nbsp;  รอการยืนยันซ่อม <br>&nbsp;&nbsp; กลุ่มงานซ่อม &nbsp;:&nbsp; ${groupName}  &nbsp &nbsp สิ้นสุดประกัน &nbsp;:&nbsp; ${insurance} <br> ชื่อร้าน &nbsp;:&nbsp; ${name} &nbsp;&nbsp; สาขา&nbsp;:&nbsp; ${branch} &nbsp;&nbsp; เบอร์ติดต่อสาขา&nbsp;:&nbsp; ${branchPhone}`;
                        }else{
                            dataText =
                        `ชื่อลูกค้า &nbsp; : &nbsp; ${username} &nbsp;&nbsp; เบอตร์ติด &nbsp;: ${phone} &nbsp;&nbsp;ยี่ห้อ &nbsp;:&nbsp; ${brand}  &nbsp;&nbsp; รุ่น &nbsp;:&nbsp; ${deviceModel} &nbsp;&nbsp; สี &nbsp;: &nbsp; ${color}  &nbsp;&nbsp;สถานะ &nbsp;:&nbsp;  ${status} <br>&nbsp;&nbsp; กลุ่มงานซ่อม &nbsp;:&nbsp; ${groupName}  &nbsp &nbsp สิ้นสุดประกัน &nbsp;:&nbsp; ${insurance} <br> ชื่อร้าน &nbsp;:&nbsp; ${name} &nbsp;&nbsp; สาขา&nbsp;:&nbsp; ${branch} &nbsp;&nbsp; เบอร์ติดต่อสาขา&nbsp;:&nbsp; ${branchPhone}`;
                        }
                        
                    }
                    
                   
                    $('#dataUser').html(dataText); 
                }
            });
        });
    </script>
@endsection
