@extends('layouts.presensi')
@section('header')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-beta/css/materialize.min.css">
<style>
    .datepicker-modal{
    max-height: 430px !important;
    }

    .datepicker-date-display{
        background-color: #0f3a7e !important;
    }
</style>
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <ion-icon name="chevron-back-outline"></ion-icon>
        </a>
    </div>
    <div class="pageTitle">Pengajuan Izin/Sakit</div>
    <div class="right"></div>
</div>
@endsection

@section('content')
<div class="row" style="margin-top:70px">
    <div class="col">
        <form method="POST" action="/presensi/storeizin" id="frmIzin">
            @csrf
                    <div class="form-group">
                        <label>Pilih Tanggal</label>
                        <input type="text" id="tgl_izin" name="tgl_izin" class="form-cotrol datepicker" placeholder="Tanggal">
                    </div>
                    <div class="form-group">
                        <label>Pilih Status</label>
                        <select name="status" id="status" class="form-control">
                            <option value="s">Sakit</option>
                            <option value="i">Izin</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Isikan Keterangan</label>
                        <textarea name="keterangan" id="keterangan" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary w-100">Kirim</button>
                    </div>
        </form>
    </div>

</div>
@endsection

@push('myscript')
<script>
    var currYear = (new Date()).getFullYear();
        $(document).ready(function() {
        $(".datepicker").datepicker({
            format: "yyyy-mm-dd"    
        });

        $("#tgl_izin").change(function(e) {
            var tgl_izin = $(this).val();
            $.ajax({
                type: 'POST'
                , url: '/presensi/cekpengajuanizin'
                , data: {
                    _token: "{{ csrf_token() }}"
                    , tgl_izin: tgl_izin
                }
                , cache: false
                , success: function(respond) {
                    if (respond == 1) {
                        Swal.fire({
                            title: 'Oops !'
                            , text: 'Anda Sudah Melakukan Input Pengjuan Izin Pada Tanggal Tersebut !'
                            , icon: 'warning'
                        }).then((result) => {
                            $("#tgl_izin").val("");
                        });
                    }
                }
            });
        });

        $("#frmIzin").submit(function(){
            var tgl_izin = $("#tgl_izin").val();
            var status = $("#status").val();
            var keterangan = $("#keterangan").val();
            if(tgl_izin == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Tanggal Belum Di Pilih'
                    ,icon: 'warning'
                    });
                return false;
            }else if(status == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Status Belum Di Pilih'
                    ,icon: 'warning'
                    });                return false;
            }else if (keterangan == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Keterangan Belum Di isi'
                    ,icon: 'warning'
                    });               
                 return false;
            }
        });
        });
</script>
@endpush