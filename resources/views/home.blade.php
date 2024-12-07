@extends('layouts.main')

@section('content')
<style>
    html {
        scroll-behavior: smooth;
    }
</style>
    <!-- Header Banner -->
    <div class="banner-header section-padding valign bg-img bg-fixed back-position-center" data-overlay-dark="6"
        data-background="img/slider/15.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12 caption mt-90">
                    <h5>Good Day!</h5>
                    <h1>Housing <span>360 Content</span></h1>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-6" style="padding-right: 20px;">
                    <h3>About Us</h3>
                    <p>
                        We provide a unique experience to explore buildings and landmarks in 360-degree mapping technology.
                        Our platform allows users to virtually visit and interact with various locations as if they were physically there.
                        Whether you are looking to explore university campuses, cultural landmarks, or residential areas,
                        we bring the world to you in immersive 3D environments.
                    </p>
                    <p>
                        Our mission is to make virtual exploration accessible and enjoyable for everyone,
                        offering a realistic view of architectural spaces, interior designs, and scenic locations.
                    </p>
                </div>
                <div class="col-md-6" style="padding-left: 20px;">
                    <div class="position-re o-hidden">
                        <img src="img/about.jpg" alt="About Image" style="width: 100%; height: auto;" />
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Destination 1 -->
    <section class="destination1 section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="item">
                        <div class="position-re o-hidden">
                            <img src="img/kampus-b-thumbnail.jpg" alt="" style="width: 305px; height: 203px" />
                        </div>
                        <div class="con">
                            <h5>
                                <a href="{{ route('konten', 'kampus-b-uisi') }}"><i class="ti-location-pin"></i> Kampus B
                                    UISI</a>
                            </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-8">
                                    <p>UISI</p>
                                </div>
                                <div class="col col-md-4 text-right">
                                    <div class="permalink">
                                        <a href="{{ route('konten', 'kampus-b-uisi') }}">Explore <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="item">
                        <div class="position-re o-hidden">
                            <img src="img/kammari.jpg" alt="" style="width: 305px; height: 203px" />
                        </div>
                        <div class="con">
                            <h5>
                                <a href="{{ route('konten', 'kammari') }}"><i class="ti-location-pin"></i> Kammari</a>
                            </h5>
                            <div class="line"></div>
                            <div class="row facilities">
                                <div class="col col-md-8">
                                    <p>Kammari</p>
                                </div>
                                <div class="col col-md-4 text-right">
                                    <div class="permalink">
                                        <a href="{{ route('konten', 'kammari') }}">Explore <i
                                                class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($contents as $c)
                    <div class="col-md-4">
                        <div class="item">
                            <div class="position-re o-hidden">
                                <img src="storage/{{ $c->thumbnail }}" alt="" style="width: 305px; height: 203px" />
                            </div>
                            <div class="con">
                                <h5>
                                    <a href="{{ route('konten', $c->slug) }}"><i class="ti-location-pin"></i>
                                        {{ $c->name }}</a>
                                </h5>
                                <div class="line"></div>
                                <div class="row facilities">
                                    <div class="col col-md-8">
                                        <p>{{ $c->name }}</p>
                                    </div>
                                    <div class="col col-md-4 text-right">
                                        <div class="permalink">
                                            <a href="{{ route('konten', $c->slug) }}">Explore <i
                                                    class="ti-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="team" class="team section-padding">
        <div class="container">
            <h2 class="section-title text-center">Our Team</h2>
            <div class="row justify-content-center">
                <!-- Team Member 1 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="img/team/3.png" alt="John Doe" class="img-fluid">
                        </div>
                        <div class="title-box">
                            <h3>Senopati<span>Chief Executive Officer</span></h3>
                        </div>
                        <div class="team-content">
                            <h4 class="team-title">Seno<span>Chief Executive Officer</span></h4>
                            <p class="team-text">John is the visionary leader, driving innovation and strategic planning for the company’s success.</p>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 2 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="img/team/2.png" alt="Jane Smith" class="img-fluid">
                        </div>
                        <div class="title-box">
                            <h3>Yazid<span>Chief Marketing Officer</span></h3>
                        </div>
                        <div class="team-content">
                            <h4 class="team-title">Yazid<span>Chief Marketing Officer</span></h4>
                            <p class="team-text">Jane ensures all projects are delivered on time, maintaining client satisfaction and team efficiency.</p>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="img/team/1.png" alt="Mike Lee" class="img-fluid">
                        </div>
                        <div class="title-box">
                            <h3>Haikal<span>Chief Technology Officer</span></h3>
                        </div>
                        <div class="team-content">
                            <h4 class="team-title">Haikal<span>Chief Technology Officer</span></h4>
                            <p class="team-text">Mike leads the development team, ensuring innovative solutions and a seamless user experience.</p>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Team Member 4 -->
                <div class="col-md-3 col-sm-6">
                    <div class="team-card">
                        <div class="team-img">
                            <img src="img/team/4.png" alt="Jane Smith" class="img-fluid">
                        </div>
                        <div class="title-box">
                            <h3>Ardiva<span>Chief Creative Officer</span></h3>
                        </div>
                        <div class="team-content">
                            <h4 class="team-title">Ardiva<span>Chief Creative Officer</span></h4>
                            <p class="team-text">Jane ensures all projects are delivered on time, maintaining client satisfaction and team efficiency.</p>
                            <div class="social">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Testimonials -->
    <section class="testimonials">
        <div class="background bg-img bg-fixed section-padding pb-0" data-background="img/slider/9.jpg"
            data-overlay-dark="5">
            <div class="container">
                <div class="row">
                    <!-- Call Now  -->
                    <div class="col-md-5 mb-30 mt-30">
                        <p>
                            <i class="star-rating"></i><i class="star-rating"></i><i class="star-rating"></i><i
                                class="star-rating"></i><i class="star-rating"></i>
                        </p>
                        <h5>
                            We provide 360-degree mapping of building areas, offering a detailed and interactive view of every space.
                        </h5>
                    </div>
                    <!-- Booking From -->
                    <div class="col-md-5 offset-md-2">
                        <div class="testimonials-box">
                            <div class="head-box">
                                <h6>Testimonials</h6>
                                <h4>Adventure Reviews</h4>
                            </div>
                            <div class="owl-carousel owl-theme">
                                <div class="item">
                                    <p>
                                        Wuih, aku baru aja nyoba aplikasi Adventure nih, bro! Seru
                                        banget! Jadi, aku bisa keliling Indonesia dari kamar aku
                                        aja, haha! Bener-bener berasa kayak lagi jalan-jalan di
                                        Bali, Jogja, dan mana aja deh. Pokoknya, buat yang kangen
                                        traveling, wajib coba ini!
                                    </p>
                                    <div class="info">
                                        <div class="author-img">
                                            <img src="img/team/04.png" alt="" />
                                        </div>
                                        <div class="cont">
                                            <div class="rating">
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                            </div>
                                            <h6>Muhammad Farikh Naufal Tajuddin</h6>
                                            <span>Informatic Student</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <p>
                                        Buat aku, Adventure tuh kayak jendela ke Indonesia, bro.
                                        aku bisa eksplor budaya dan tempat-tempat seru di negara
                                        sendiri tanpa perlu repot-repot packing. Virtual
                                        reality-nya keren banget, ngerasain bener-bener kayak lagi
                                        di sana. Makanya, aku suka banget sama aplikasi ini!
                                    </p>
                                    <div class="info">
                                        <div class="author-img">
                                            <img src="img/team/05.png" alt="" />
                                        </div>
                                        <div class="cont">
                                            <div class="rating">
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                            </div>
                                            <h6>Naufal Yuwan Kanugraha</h6>
                                            <span>Informatic Student</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="item">
                                    <p>
                                        Mau jujur, aku gak pernah kepikiran kalo Indonesia sekeren
                                        ini! Aplikasi Adventure bener-bener bikin mata aku kebuka
                                        tentang keindahan budaya dan alam di sini. aku sampe nggak
                                        sabar buat ngerencanain liburan nyata ke tempat-tempat
                                        yang aku temuin lewat aplikasi ini. Keren abis!
                                    </p>
                                    <div class="info">
                                        <div class="author-img">
                                            <img src="img/team/06.png" alt="" />
                                        </div>
                                        <div class="cont">
                                            <div class="rating">
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                                <i class="star active"></i>
                                            </div>
                                            <h6>Nabilatul Ulya</h6>
                                            <span>Tourism Enthusiast</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
