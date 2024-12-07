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
                        {{ $content->name }}
                    </div>
                    <div class="tour-page">
                        <p class="fw-bold" style="color: #2095ae">
                            <i class="ti-location-pin">{{ $content->address }}</i>
                        </p>
                    </div>
                    <div class="my-5" id="panorama" style="height: 60vh"></div>
                </div>
            </div>
        </div>
    </section>

    @push('scripts')
        <script>
            fetch(`{{ route('get_content', $content->slug) }}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    pannellum.viewer("panorama", data)
                });

            // var viewer = pannellum.viewer("panorama", {
            //     default: {
            //         firstScene: "luar_kampus",
            //         author: "Adventure",
            //         sceneFadeDuration: 1000,
            //     },

            //     scenes: {
            //         luar_kampus: {
            //             title: "Luar Kampus",
            //             hfov: 360,
            //             pitch: 11,
            //             yaw: -10,
            //             type: "equirectangular",
            //             panorama: "img/Luar Pintu Kiri.jpg",
            //             hotSpots: [{
            //                     pitch: -2.1,
            //                     yaw: 132.9,
            //                     type: "info",
            //                     text: "Parkiran",
            //                 },
            //                 {
            //                     pitch: 1,
            //                     yaw: -10,
            //                     type: "scene",
            //                     text: "Pintu Masuk Kiri",
            //                     sceneId: "depan_admisi",
            //                 },
            //             ],
            //         },
            //         depan_admisi: {
            //             title: "Depan Admisi",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Depan Admisi.jpg",
            //             hotSpots: [{
            //                     pitch: -2.5,
            //                     yaw: 34,
            //                     type: "info",
            //                     text: "Ruang Administrasi",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: -109,
            //                     type: "scene",
            //                     text: "Auditorium",
            //                     sceneId: "auditorium",
            //                 },
            //                 {
            //                     pitch: -6,
            //                     yaw: 83,
            //                     type: "scene",
            //                     text: "Depan Perpustakaan",
            //                     sceneId: "depan_perpus",
            //                 },
            //                 {
            //                     pitch: 0.7,
            //                     yaw: -36,
            //                     type: "scene",
            //                     text: "Tangga Lantai 2",
            //                     sceneId: "tangga_lantai_2",
            //                 },
            //             ],
            //         },
            //         depan_perpus: {
            //             title: "Depan Perpustakaan",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Depan Perpus.jpg",
            //             hotSpots: [{
            //                     pitch: -9,
            //                     yaw: 168,
            //                     type: "scene",
            //                     text: "Luar Gedung",
            //                     sceneId: "luar_kampus",
            //                 },
            //                 {
            //                     pitch: -6,
            //                     yaw: 0.2,
            //                     type: "scene",
            //                     text: "Perpustakaan",
            //                     sceneId: "perpustakaan",
            //                 },
            //                 {
            //                     pitch: -3,
            //                     yaw: -100,
            //                     type: "scene",
            //                     text: "Depan Ruang Administrasi",
            //                     sceneId: "depan_admisi",
            //                 },
            //             ],
            //         },
            //         perpustakaan: {
            //             title: "Perpustakaan",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Perpus.jpg",
            //             hotSpots: [{
            //                 pitch: -16,
            //                 yaw: 167,
            //                 type: "scene",
            //                 text: "Keluar Perpustakaan",
            //                 sceneId: "depan_perpus",
            //             }, ],
            //         },
            //         auditorium: {
            //             title: "Auditorium",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Audit.jpg",
            //             hotSpots: [{
            //                     pitch: -3,
            //                     yaw: 81,
            //                     type: "scene",
            //                     text: "Tangga Lantai 2",
            //                     sceneId: "tangga_lantai_2",
            //                 },
            //                 {
            //                     pitch: -2,
            //                     yaw: -133,
            //                     type: "scene",
            //                     text: "Depan Admisi",
            //                     sceneId: "depan_admisi",
            //                 },
            //             ],
            //         },
            //         tangga_lantai_2: {
            //             title: "Tangga Lantai 2",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Depan Tangga Lantai 2.jpg",
            //             hotSpots: [{
            //                     pitch: -14,
            //                     yaw: 92,
            //                     type: "scene",
            //                     text: "Depan SSC",
            //                     sceneId: "depan_ssc",
            //                 },
            //                 {
            //                     pitch: -3,
            //                     yaw: 175,
            //                     type: "scene",
            //                     text: "Lantai 2",
            //                     sceneId: "cm_201",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: -5.8,
            //                     type: "scene",
            //                     text: "Depan Admisi",
            //                     sceneId: "depan_admisi",
            //                 },
            //             ],
            //         },
            //         depan_ssc: {
            //             title: "Depan SSC",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/SSC.jpg",
            //             hotSpots: [{
            //                     pitch: -5,
            //                     yaw: 153,
            //                     type: "info",
            //                     text: "Pantry",
            //                 },
            //                 {
            //                     pitch: -3,
            //                     yaw: -153,
            //                     type: "info",
            //                     text: "Toilet Wanita",
            //                 },
            //                 {
            //                     pitch: -3,
            //                     yaw: -56,
            //                     type: "info",
            //                     text: "Toilet Laki-Laki",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: 54,
            //                     type: "info",
            //                     text: "SSC",
            //                 },
            //                 {
            //                     pitch: -9,
            //                     yaw: 73,
            //                     type: "scene",
            //                     text: "Tangga Lantai 2",
            //                     sceneId: "tangga_lantai_2",
            //                 },
            //             ],
            //         },
            //         cm_201: {
            //             title: "CM 201",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/CM201.jpg",
            //             hotSpots: [{
            //                     pitch: -9,
            //                     yaw: -57,
            //                     type: "info",
            //                     text: "CM 201",
            //                 },
            //                 {
            //                     pitch: 1,
            //                     yaw: 27,
            //                     type: "info",
            //                     text: "CM 204",
            //                 },
            //                 {
            //                     pitch: -8,
            //                     yaw: 78,
            //                     type: "scene",
            //                     text: "Tangga Lantai 3",
            //                     sceneId: "tangga_lantai_3",
            //                 },
            //                 {
            //                     pitch: -49,
            //                     yaw: 152,
            //                     type: "scene",
            //                     text: "Tangga Lantai 2",
            //                     sceneId: "tangga_lantai_2",
            //                 },
            //                 {
            //                     pitch: -6,
            //                     yaw: -97,
            //                     type: "scene",
            //                     text: "CM 202",
            //                     sceneId: "cm_202",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: -1,
            //                     type: "scene",
            //                     text: "CM 205",
            //                     sceneId: "cm_205",
            //                 },
            //             ],
            //         },
            //         cm_205: {
            //             title: "CM 205",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/CM204-205.jpg",
            //             hotSpots: [{
            //                     pitch: -1,
            //                     yaw: 33,
            //                     type: "info",
            //                     text: "CM 205",
            //                 },
            //                 {
            //                     pitch: -3,
            //                     yaw: 167,
            //                     type: "scene",
            //                     text: "CM 201",
            //                     sceneId: "cm_201",
            //                 },
            //                 {
            //                     pitch: -2,
            //                     yaw: -133,
            //                     type: "info",
            //                     text: "CM 206",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: -105,
            //                     type: "scene",
            //                     text: "CM 207",
            //                     sceneId: "cm_207",
            //                 },
            //             ],
            //         },
            //         cm_207: {
            //             title: "CM 207",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/CM207.jpg",
            //             hotSpots: [{
            //                     pitch: -1,
            //                     yaw: -7,
            //                     type: "info",
            //                     text: "CM 207",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: -98,
            //                     type: "scene",
            //                     text: "CM 205",
            //                     sceneId: "cm_205",
            //                 },
            //                 {
            //                     pitch: -5,
            //                     yaw: 79,
            //                     type: "scene",
            //                     text: "CM 208",
            //                     sceneId: "cm_208",
            //                 },
            //             ],
            //         },
            //         cm_208: {
            //             title: "CM 208",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/CM208.jpg",
            //             hotSpots: [{
            //                     pitch: -6,
            //                     yaw: 88,
            //                     type: "scene",
            //                     text: "CM 207",
            //                     sceneId: "cm_207",
            //                 },
            //                 {
            //                     pitch: -2,
            //                     yaw: 125,
            //                     type: "info",
            //                     text: "CM 208",
            //                 },
            //                 {
            //                     pitch: -1,
            //                     yaw: 178,
            //                     type: "scene",
            //                     text: "CM 203",
            //                     sceneId: "cm_203",
            //                 },
            //             ],
            //         },
            //         cm_203: {
            //             title: "CM 203",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/CM203.jpg",
            //             hotSpots: [{
            //                     pitch: -6,
            //                     yaw: 88,
            //                     type: "scene",
            //                     text: "CM 202",
            //                     sceneId: "cm_202",
            //                 },
            //                 {
            //                     pitch: -2,
            //                     yaw: -3,
            //                     type: "scene",
            //                     text: "CM 208",
            //                     sceneId: "cm_208",
            //                 },
            //                 {
            //                     pitch: -2,
            //                     yaw: 46,
            //                     type: "text",
            //                     text: "CM 203",
            //                 },
            //             ],
            //         },
            //         cm_202: {
            //             title: "CM 202",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/CM202.jpg",
            //             hotSpots: [{
            //                     pitch: -6,
            //                     yaw: 88,
            //                     type: "scene",
            //                     text: "CM 203",
            //                     sceneId: "cm_203",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: -99,
            //                     type: "scene",
            //                     text: "CM 201",
            //                     sceneId: "cm_201",
            //                 },
            //                 {
            //                     pitch: -3,
            //                     yaw: 174,
            //                     type: "info",
            //                     text: "CM 202",
            //                 },
            //             ],
            //         },
            //         tangga_lantai_3: {
            //             title: "Tangga Lantai 3",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Toilet Lantai 2.jpg",
            //             hotSpots: [{
            //                     pitch: -9,
            //                     yaw: -93,
            //                     type: "scene",
            //                     text: "CM 201",
            //                     sceneId: "cm_201",
            //                 },
            //                 {
            //                     pitch: -0.57,
            //                     yaw: -130,
            //                     type: "scene",
            //                     text: "Lantai 3",
            //                     sceneId: "lantai_3",
            //                 },
            //                 {
            //                     pitch: -1,
            //                     yaw: 8,
            //                     type: "info",
            //                     text: "Toilet Laki Laki",
            //                 },
            //                 {
            //                     pitch: -2,
            //                     yaw: 56,
            //                     type: "info",
            //                     text: "Toilet Perempuan",
            //                 },
            //             ],
            //         },
            //         lantai_3: {
            //             title: "Lantai 3",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Lantai 3.jpg",
            //             hotSpots: [{
            //                     pitch: -15,
            //                     yaw: -89,
            //                     type: "scene",
            //                     text: "Toilet Lantai 3",
            //                     sceneId: "toilet_lantai_3",
            //                 },
            //                 {
            //                     pitch: -10,
            //                     yaw: 174,
            //                     type: "scene",
            //                     text: "Lab CM 301",
            //                     sceneId: "cm_301",
            //                 },
            //                 {
            //                     pitch: -30,
            //                     yaw: -16.8,
            //                     type: "scene",
            //                     text: "Tangga Lantai 3",
            //                     sceneId: "tangga_lantai_3",
            //                 },
            //             ],
            //         },
            //         toilet_lantai_3: {
            //             title: "Toilet Lantai 3",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Toilet Lantai 3.jpg",
            //             hotSpots: [{
            //                     pitch: -6,
            //                     yaw: 122,
            //                     type: "info",
            //                     text: "Toilet Laki Laki",
            //                 },
            //                 {
            //                     pitch: -2,
            //                     yaw: 169,
            //                     type: "info",
            //                     text: "Toilet Perempuan",
            //                 },
            //                 {
            //                     pitch: -6,
            //                     yaw: -72,
            //                     type: "info",
            //                     text: "Musholla",
            //                 },
            //                 {
            //                     pitch: -12,
            //                     yaw: 80,
            //                     type: "scene",
            //                     text: "Lantai 3",
            //                     sceneId: "lantai_3",
            //                 },
            //             ],
            //         },
            //         cm_301: {
            //             title: "Lab CM 301",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/CM301.jpg",
            //             hotSpots: [{
            //                     pitch: -9,
            //                     yaw: 153,
            //                     type: "scene",
            //                     text: "Lantai 3",
            //                     sceneId: "lantai_3",
            //                 },
            //                 {
            //                     pitch: -3,
            //                     yaw: 93,
            //                     type: "info",
            //                     text: "CM 301",
            //                 },
            //                 {
            //                     pitch: -5,
            //                     yaw: -19,
            //                     type: "scene",
            //                     text: "CM 302",
            //                     sceneId: "cm_302",
            //                 },
            //             ],
            //         },
            //         cm_302: {
            //             title: "Lab CM 302",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Lab Virtual.jpg",
            //             hotSpots: [{
            //                     pitch: -5,
            //                     yaw: 66,
            //                     type: "scene",
            //                     text: "CM 301",
            //                     sceneId: "cm_301",
            //                 },
            //                 {
            //                     pitch: -4,
            //                     yaw: -40,
            //                     type: "scene",
            //                     text: "CM 302 Dalam",
            //                     sceneId: "cm_302_dalam",
            //                 },
            //             ],
            //         },
            //         cm_302_dalam: {
            //             title: "Lab CM 302 Dalam",
            //             hfov: 110,
            //             pitch: -3,
            //             yaw: 117,
            //             type: "equirectangular",
            //             panorama: "img/Lab Virtual Dalam.jpg",
            //             hotSpots: [{
            //                 pitch: -7,
            //                 yaw: -74,
            //                 type: "scene",
            //                 text: "Lab CM 302",
            //                 sceneId: "cm_302",
            //             }, ],
            //         },
            //     },
            // });
        </script>
    @endpush
@endsection
