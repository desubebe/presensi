@php
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
 @endphp

@foreach ($presensi as $d)
@php 
$foto_in = Storage::url('uploads/absensi/'.$d->foto_in);
$foto_out = Storage::url('uploads/absensi/'.$d->foto_out);
@endphp
<tr>
    <td>{{$loop->iteration}}</td>
    <td>{{$d->nis}}</td>
    <td>{{$d->nama}}</td>
    <td>{{$d->nama_rom}}</td>
    <td>{{$d->jam_in}}</td>
    <td>
        <img src="{{ url($foto_in)}}" class="avatar" alt="">
    </td>
    <td>{!! $d->jam_out != null ? $d->jam_out : '<span class="badge bg-danger">Belum Absen Pulang</span>'!!}</td>
    <td>
        @if ($d->jam_out != null)
        <img src="{{ url($foto_out)}}" class="avatar" alt="">
        @else
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-hourglass-high" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M6.5 7h11"></path>
            <path d="M6 20v-2a6 6 0 1 1 12 0v2a1 1 0 0 1 -1 1h-10a1 1 0 0 1 -1 -1z"></path>
            <path d="M6 4v2a6 6 0 1 0 12 0v-2a1 1 0 0 0 -1 -1h-10a1 1 0 0 0 -1 1z"></path>
         </svg>
         @endif
    </td>
    <td>
        @if($d->jam_in >= '07.15')
        @php 
         $terlambat = selisih('07:15:00',$d->jam_in);
        @endphp
        <span class="badge bg-danger">Terlambat {{$terlambat}}</span>
        @else
        <span class="badge bg-success">Tepat Waktu</span>
        @endif
    </td>
    <td>{{$d->nama_cabang}}</td>
    <td>
        <a href="#" class="btn btn-primary tampilkanpeta" id="{{$d->id}}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-current-location" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 12m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path>
                <path d="M12 12m-8 0a8 8 0 1 0 16 0a8 8 0 1 0 -16 0"></path>
                <path d="M12 2l0 2"></path>
                <path d="M12 20l0 2"></path>
                <path d="M20 12l2 0"></path>
                <path d="M2 12l2 0"></path>
             </svg>
        </a>
    </td>

</tr>
@endforeach

<script>
    $(function() {
        $(".tampilkanpeta").click(function(e){
            var id = $(this).attr("id");
            $.ajax({
                type: 'POST'
                ,url: '/tampilkanpeta'
                ,data : {
                    _token: "{{csrf_token()}}"
                    ,id: id
                }
                ,cache: false
                ,success: function(respond){
                    $("#loadmap").html(respond);
                }
            });
            $("#modal-tampilkanpeta").modal("show");
        });
    });
</script>