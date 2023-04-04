@extends('layouts.presensi')
@section('header')
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle">Histori Presensi</div>
    <div class="right"></div>
</div>
@endsection

@section('content')
<div class="row" style="margin-top: 70px">
    <div class="col">
        <div class="row"> 
            <div class="col-12">
                <div class="form-group">
                    <label>Bulan</label>

                    <select name="bulan" id="bulan" class="form-control">
                        <option value="">Pilih Bulan</option>
                        @for($i=1; $i<= 12; $i++) <option value="{{$i}}" {{ date("m")== $i ? 'selected' : '' }}>{{$namabulan[$i]}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-12">
                <div class="form-group">
                    <label>Tahun</label>

                    <select name="tahun" id="tahun" class="form-control">
                        <option value="">Pilih Tahun</option>
                        @php 
                        $tahunmulai=2022;
                        $tahunsekarang = date("Y");
                        @endphp
                        @for ($tahun = $tahunmulai; $tahun <= $tahunsekarang; $tahun++)<option value="{{$tahun}}" {{ date("Y")== $tahun ? 'selected' : '' }}>{{$tahun}}</option>
                        @endfor
                    </select>
                </div>
            </div>
        </div>
        <div class="row"> 
            <div class="col-12">
                <div class="form-group" id="getdata">
                    <button class="btn btn-primary btn-block">Cari</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col" id="showhistori"></div>
    </div>
</div>
@endsection

@push('myscript')
<script>
    $(function() {
        $("#getdata").click(function(e) {
            var bulan = $("#bulan").val();
            var tahun = $("#tahun").val();
            $.ajax({
                type: 'POST',
                url: '/gethistori',
                data:{
                    _token: "{{ csrf_token() }}"
                    ,bulan: bulan
                    ,tahun: tahun
                }
                ,cache: false
                ,success: function(respond){
                   $("#showhistori").html(respond);

                }
            });
        });
    });
</script>
    
@endpush