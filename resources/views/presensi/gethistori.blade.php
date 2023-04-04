@if($histori->isEmpty())
<diV class="alert alert-outline-warning">
    <p>Data Tidak Ada</p>
</diV>
@endif

@foreach ($histori as $d)
    <ul class="listview image-listview">
        <li>
            <div class="item">
                @php 
                $path = Storage::url('uploads/absensi/'.$d->foto_in)
                @endphp
                <img src="{{ url($path)}}" alt="image" class="image" />
                <div class="in">
                  <div>
                    Tanggal Absen : {{ date("d-m-y", strtotime($d->tgl_presensi))}}
                     {{--<small class="text-muted">{{$d->kelas}}</small>--}}
                  </div>
                  <div>
                    Masuk : <span class="badge {{$d->jam_in <= "07:00" ? "bg-success" : "bg-danger"}}">{{ $d->jam_in}}</span>
                  </div>
                    <div>
                    Pulang :<span class="badge {{$d->jam_out > "15:00" ? "bg-primary" : "bg-danger"}}">{{ $d->jam_out}}</span>
                    </diV>
                </div>
              </div>
        </li>
    </ul>
@endforeach