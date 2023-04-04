@extends('layouts.presensi')
@section('header')
 
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle">SKAPAL Presensi</div>
    <div class="right"></div>
</div>

<style>
    .webcam-capture,
    .webcam-capture video{
        display: inline-block;
        width: 100% !important;
        margin: auto;
        height: auto !important;
        border-radius: 15px; 
    }

    #map {
         height: 200px;
     }
</style>
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>


@endsection

@section('content')

<div class="row" style="margin-top: 70px">
    <div class="col">
        <input type="hidden" id="lokasi">
        <div class="webcam-capture"></div>
    </div>
</div>
<div class="row">
    <div class="col">
        @if ($cek > 0)
            <button id="takeabsen" class="btn btn-danger btn-block">
                <i class="fas fa-regular fa-camera"></i>
                Absen Pulang
            </button>
       @else
        <button id="takeabsen" class="btn btn-primary btn-block">
            <i class="fas fa-regular fa-camera"></i>
            Absen Masuk
        </button>
        @endif
                
    </div>
</div>

<div class="row mt-2">
    <div class="col">
        <div id="map"></div>
    </div>
</div>
<audio id="notifikasi_in">
    <source src="{{ asset('assets/sound/notifikasi_in.mp3')}}" type="audio/mpeg">
</audio>
<audio id="notifikasi_out">
    <source src="{{ asset('assets/sound/notifikasi_out.mp3')}}" type="audio/mpeg">
</audio>
<audio id="radius">
    <source src="{{ asset('assets/sound/radius.mp3')}}" type="audio/mpeg">
</audio>
@endsection

@push('myscript')
    <script>
        var notifikasi_in = document.getElementById('notifikasi_in')
        var notifikasi_out = document.getElementById('notifikasi_out')
        var radius = document.getElementById('radius')
        Webcam.set({
            height: 480
            , width: 640
            , image_format: 'jpeg'
            ,jpeg_quality: 80
        });

        Webcam.attach('.webcam-capture');

        var lokasi = document.getElementById('lokasi');
        if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(successCallback, errorCallback);
        }

        function successCallback(position){
            lokasi.value = position.coords.latitude +","+ position.coords.longitude;
            var map = L.map('map').setView([position.coords.latitude, position.coords.longitude], 18);
            var lokasi_kantor = "{{ $lok_kantor->lokasi}}";
            var lok = lokasi_kantor.split(",");
            var lat_kantor = lok[0];
            var long_kantor = lok[1];
            var radius = {{$lok_kantor->radius}};


            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
                maxZoom: 20,
                subdomains:['mt0','mt1','mt2','mt3']
            }).addTo(map);
            var marker = L.marker([position.coords.latitude, position.coords.longitude]).addTo(map);
            var circle = L.circle([lat_kantor,long_kantor], { 
                color: 'red',
                fillColor: '#f03',
                fillOpacity: 0.5,
                radius: radius
            }).addTo(map);
        }
        function errorCallback(){
        }

        $("#takeabsen").click(function(e) {
           Webcam.snap(function(uri){
            image = uri;
           });
           var lokasi = $("#lokasi").val();
           $.ajax({
            type: 'POST',
            url:'/presensi/store',
            data:{
                _token:"{{ csrf_token ()}}",
                image:image,
                lokasi:lokasi
            }
            , cache: false
            ,success: function(respond){
                var status = respond.split("|");
                if(status[0] == "success"){
                    if(status[2] == "in"){
                        notifikasi_in.play();
                    }else{
                        notifikasi_out.play();
                    }
                    Swal.fire({
                    title: 'Berhasil !',
                    text: status[1],
                    icon: 'success',
                    })
                    setTimeout("location.href='/dashboard'",5000);
                }else{
                    if(status[2] == "radius"){
                        radius.play();
                    }
                    Swal.fire({
                    title: 'Gagal!',
                    text: status[1],
                    icon: 'error',
                    confirmButtonText: 'Ok'
                    })                    
                }
            }
           });
        });



    </script>
@endpush