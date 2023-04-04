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
    font-size: 10px;
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
<body class="A4 landscape">
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
                REKAP PRESENSI SISWA<BR>
                SMKN 1 PALASAH KABUPATEN MAJALENGKA <br>
                PERIODE : {{strtoupper($namabulan[$bulan])}} {{$tahun}}
            </span><br>
            <span>Jalan Raya Jatiwangi - Palimanan KM 05 Desa/Kec. Palasah Kabupaten Majalengka </span>
        <hr>
          </td>
    </tr>
</table>
   <table class="tabelpresensi">
   <tr>
    <th rowspan="2">NIS</th>
    <th rowspan="2">Nama Siswa</th>
    <th colspan="31">Tanggal</th>
    <th rowspan="2">TH</th>
    <th rowspan="2">TT</th>
   </tr>
   <tr>
    <?php 
    for($i=1; $i<= 31; $i++){
    ?>
        <th>{{$i}}</th>

    <?php     
    }
    ?>
   </tr>
   @foreach ($rekap as $d)
   <tr>
    <td>{{$d->nis}}</td>
    <td>{{$d->nama}}</td>

    <?php
    $totalhadir = 0; 
    $totalterlambat = 0;
    for($i=1; $i<= 31; $i++){
        $tgl = "tgl_".$i;
        if(empty($d->$tgl)){
            $hadir = ['',''];
            $totalhadir += 0;
        }else{
            $hadir = explode("-" ,$d->$tgl);
            $totalhadir += 1;
            if($hadir[0] > "07:00:00"){
                $totalterlambat += 1;
            }
        }
    ?>
        <td>
           <span style="color: {{ $hadir[0] > "07:15:00" ? "red" :""}}">{{$hadir[0]}}</span><br>
           <span style="color: {{ $hadir[0] < "15:00:00" ? "red" :""}}">{{$hadir[1]}}</span><br>
        </td>
    <?php     
    }
    ?>
    <td>{{$totalhadir}}</td>
    <td>{{$totalterlambat}}</td>
   </tr>
   @endforeach

</table>
  

<table width="100%" style="margin-top: 100px">
  <tr>
    <td></td>
    <td style="text-align: center">Kab. Majalengka, {{date('d-m-Y')}}</td>
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
      <b>NIP.</b>
      </td>
  </tr>
</table>
</section>
</body>
</html>