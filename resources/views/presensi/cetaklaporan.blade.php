<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>A4</title>

  <!-- Normalize or reset CSS with your favorite library -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.min.css">

  <!-- Load paper.css for happy printing -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">

  <!-- Set page size here: A5, A4 or A3 -->
  <!-- Set also "landscape" if you need -->
  <style>
  @page { 
    size: A4
  }

  #title{
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
    font-weight: bold;
  }

  .tabelsiswa{
    margin-top: 50px; 
  }
  .tabelsiswa tr td {
    padding: 5px;
  }

  .tabelpresensi{
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    
  }
  .tabelpresensi tr th {
    border: 1px solid;
    padding: 8px;
    background-color: #bbb9b9c2;
  }
  .tabelpresensi tr td {
    border: 1px solid;
    padding: 5px;
    font-size: 12px;
  }
  .foto{
    width: 40x;
    height: 30px;
  }
    
</style>
</head>

<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A4">
<?php 
  function selisih($jam_masuk, $jam_keluar)
        {
            list($h, $m, $s) = explode(":", $jam_masuk);
            $dtAwal = mktime($h, $m, $s, "1", "1", "1");
            list($h, $m, $s) = explode(":", $jam_keluar);
            $dtAkhir = mktime($h, $m, $s, "1", "1", "1");
            $dtSelisih = $dtAkhir - $dtAwal;
            $totalmenit = $dtSelisih / 60;
            $jam = explode(".", $totalmenit / 60);
            $sisamenit = ($totalmenit / 60) - $jam[0];
            $sisamenit2 = $sisamenit * 60;
            $jml_jam = $jam[0];
            return $jml_jam . ":" . round($sisamenit2);
        }  
?>
  <!-- Each sheet element should have the class "sheet" -->
  <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
  <section class="sheet padding-10mm">

   <table style="width: 100%">
    <tr>
        <td width style="30px">
            <img src="{{asset('assets/img/logopresensi.png')}}" width="70" height="70" alt="">
        </td>
        <td>
            <span id="title">
                LAPORAN PRESENSI SISWA<BR>
                SMKN 1 PALASAH KABUPATEN MAJALENGKA <br>
                PERIODE : {{strtoupper($namabulan[$bulan])}} {{$tahun}}
            </span><br>
            <span>Jalan Raya Jatiwangi - Palimanan KM 05 Desa/Kec. Palasah Kabupaten Majalengka </span>
        <hr>
          </td>
    </tr>
   </table>
   <table class="tabelsiswa">
    <tr>
        <td rowspan="6"> 
          @php
          $path = Storage::url('uploads/siswa/'.$siswa->foto);         
           @endphp
          @if($siswa->foto != null) 
          <img src="{{url($path)}}"  alt="" width="200" height="150">
          @else
          <img src="{{asset('assets/img/nophoto.jpg')}}" alt="" class="foto">
          @endif
        </td>
    </tr>
    <tr>
        <td>NIS</td>
        <td>:</td>
        <td>{{$siswa->nis}}</td>
    </tr>
    <tr>
        <td>Nama</td>
        <td>:</td>
        <td>{{$siswa->nama}}</td>
    </tr>
    <tr>
        <td>Jurusan</td>
        <td>:</td>
        <td>{{$siswa->nama_rom}}</td>
    </tr>
    <tr>
      <td>No HP</td>
      <td>:</td>
      <td>{{$siswa->no_hp}}</td>
  </tr>
   </table>
<table class="tabelpresensi">
  <tr>
    <th>No.</th>
    <th>Tanggal</th>
    <th>Jam Masuk</th>
    <th>Foto Masuk</th>
    <th>Jam Pulang</th>
    <th>Foto Pulang</th>
    <th>Keterangan</th>
    <th>Jml Jam Masuk</th>
  </tr>
  @foreach ($presensi as $d)
  @php 
    $path_in = Storage::url('uploads/absensi/'.$d->foto_in);
    $path_out = Storage::url('uploads/absensi/'.$d->foto_out);
    $terlambat = selisih('07:15:00',$d->jam_in);
  @endphp
  <tr>
    <td>{{$loop->iteration}}</td>
    <td>{{ date('d-m-y',strtotime($d->tgl_presensi))}}</td>
    <td>{{ $d->jam_in}}</td>
    <td><img src="{{url($path_in)}}" alt="" class="foto"></td>
    <td>{{ $d->jam_out != null ? $d->jam_out : "Belum Absen"}}</td>
    <td>
      @if ($d->jam_out != null)
      <img src="{{url($path_out)}}" alt="" class="foto">
      @else
      <img src="{{asset('assets/img/nophoto.jpg')}}" alt="" class="foto">
      @endif
    </td>
    <td>
      @if($d->jam_in > '07:15:00')
      Terlambat {{$terlambat}}
      @else
      Tepat Waktu
      @endif
    </td>
    <td>
      @if ($d->jam_out != null)
      <?php  
       $jmljamkerja = selisih($d->jam_in,$d->jam_out);      
      ?>
      @else
      @php
      $jmljamkerja = 0;
      @endphp       
      @endif
      {{$jmljamkerja}}
    </td>
  </tr>
  @endforeach
</table>
<table width="100%" style="margin-top: 100px">
  <tr>
    <td colspan="2" style="text-align: right">Kab. Majalengka, {{date('d-m-Y')}}</td>
  </tr>
  <tr>
    <td style="text-align: center; vertical-align:bottom" height="100px">
      <b>Mengetahui</b><br>
      Kepala Sekolah,
   </td>
   <td style="text-align: center; vertical-align:bottom" height="100px">
    <b>Wakasek Kesiswaan</b><br>  
 </td>
  </tr>
  <tr>
    <td style="text-align: center; vertical-align:bottom" height="100px">
      <u>H. Adang Ardali, S.Pd., MT.</u><br>
      <b>NIP. 196903301994021001 </b>
    </td>
    <td style="text-align: center; vertical-align:bottom">
      <u>Sirep Dodi, S.Pd</u><br>
      <b>NIP. 197001011998021003</b>
      </td>
  </tr>
</table>
</section>
</body>
</html>