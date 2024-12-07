@extends('layouts.main')
<!-- 
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
    </section> -->

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