@extends('layouts.main')

@section('content')
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.css" />
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/pannellum@2.5.6/build/pannellum.js"></script>
    @endpush

    <!-- Tour Content -->
    <section class="tour-page section-padding" data-scroll-index="1">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-subtitle">360 Tour</div>
                    <div class="section-title mb-0">
                        Kammari
                    </div>
                    <div class="tour-page">
                        <p class="fw-bold" style="color: #2095ae">
                            <i class="ti-location-pin"></i>Jl. Samanhudi No.17, Kemuteran, Pekelingan, Kec. Gresik,
                            Kabupaten Gresik, Jawa Timur 61114
                        </p>
                    </div>
                    <div class="my-5" id="panorama" style="height: 60vh"></div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            var viewer = pannellum.viewer("panorama", {
                default: {
                    firstScene: "kammari_luar",
                    author: "Adventure",
                    sceneFadeDuration: 1000,
                },

                scenes: {
                    kammari_luar: {
                        title: "Kammari Luar",
                        hfov: 110,
                        pitch: 8,
                        yaw: -170,
                        type: "equirectangular",
                        panorama: "img/kammari/kammari (5).jpg",
                        hotSpots: [{
                            pitch: 0.6,
                            yaw: 179,
                            type: "scene",
                            text: "Kammari Dalam",
                            sceneId: "kammari_dalam",
                        }, ],
                    },
                    kammari_dalam: {
                        title: "Kammari Dalam",
                        hfov: 110,
                        pitch: 8,
                        yaw: -170,
                        type: "equirectangular",
                        panorama: "img/kammari/kammari (7).jpg",
                        hotSpots: [{
                                pitch: -1.6,
                                yaw: -63,
                                type: "scene",
                                text: "Kammari Dalam 2",
                                sceneId: "kammari_dalam_2",
                            },
                            {
                                pitch: -7,
                                yaw: 20,
                                type: "scene",
                                text: "Kammari Luar",
                                sceneId: "kammari_luar",
                            },
                        ],
                    },
                    kammari_dalam_2: {
                        title: "Kammari Dalam 2",
                        hfov: 110,
                        pitch: 8,
                        yaw: -170,
                        type: "equirectangular",
                        panorama: "img/kammari/kammari (11).jpg",
                        hotSpots: [{
                                pitch: -15,
                                yaw: 80,
                                type: "scene",
                                text: "Kammari Dalam",
                                sceneId: "kammari_dalam",
                            },
                            {
                                pitch: -5,
                                yaw: 172,
                                type: "scene",
                                text: "Kasir",
                                sceneId: "kasir",
                            },
                        ],
                    },
                    kasir: {
                        title: "Kasir",
                        hfov: 110,
                        pitch: 8,
                        yaw: -170,
                        type: "equirectangular",
                        panorama: "img/kammari/kammari (10).jpg",
                        hotSpots: [{
                                pitch: -15,
                                yaw: -104,
                                type: "scene",
                                text: "Kammari Dalam 2",
                                sceneId: "kammari_dalam_2",
                            },
                            {
                                pitch: -6,
                                yaw: 149,
                                type: "scene",
                                text: "Kammari Belakang",
                                sceneId: "kammari_belakang",
                            },
                        ],
                    },
                    kammari_belakang: {
                        title: "Kammari Belakang",
                        hfov: 110,
                        pitch: 8,
                        yaw: -170,
                        type: "equirectangular",
                        panorama: "img/kammari/kammari (16).jpg",
                        hotSpots: [{
                            pitch: -6,
                            yaw: 154,
                            type: "scene",
                            text: "Kasir",
                            sceneId: "kasir",
                        }, ],
                    },
                },
            });
            viewer.on("mousedown", function(event) {
                // coords[0] is pitch, coords[1] is yaw
                var coords = viewer.mouseEventToCoords(event);
                // Do something with the coordinates here...
                console.log(coords);
            });
        </script>
    @endpush
@endsection
