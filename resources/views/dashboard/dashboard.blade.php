@extends('layouts.presensi')
@section('content')
<style>
  .logout {
      position: absolute;
      color: white;
      font-size: 30px;
      text-decoration: none;
      right: 8px;
  }

  .logout:hover {
      color: white;

  }

</style>

 <!-- App Capsule -->
 <div id="appCapsule">
    <div class="section bg-primary" id="user-section">
      <a href="/proseslogout" class="logout">
        <ion-icon name="exit-outline"></ion-icon>
    </a>

      <div id="user-detail">
        <div class="avatar">
            @if(!empty(Auth::guard('siswa')->user()->foto))
              @php 
              $path=Storage::url('uploads/siswa/'.Auth::guard('siswa')->user()->foto);
              @endphp 
              <img src="{{url($path)}}" alt="avatar" class="imaged w64" style="height:70px">
              @else
              <img src="assets/img/sample/avatar/avatar1.jpg" alt="avatar" class="imaged w64 rounded">
            @endif
        </div>
        <div id="user-info">
          <h2 id="user-name">{{ Auth::guard('siswa')->user()->nama}}</h2>
          <span id="user-role">{{ Auth::guard('siswa')->user()->kode_jur}}</span>
          <span id="user-role">({{ Auth::guard('siswa')->user()->kode_cabang}})</span>
        </div>
      </div>
    </div>

    <div class="section" id="menu-section">
      <div class="card">
        <div class="card-body text-center">
          <div class="list-menu">
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="/editprofile" class="green" style="font-size: 40px"><i class="fas fa-user"></i>
                </a>
              </div>
              <div class="menu-name">
                <span class="text-center">Profil</span>
              </div>
            </div>
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="/presensi/izin" class="danger" style="font-size: 40px">
                  <i class="fas fa-calendar-alt"></i>
                </a>
              </div>
              <div class="menu-name">
                <span class="text-center">Cuti</span>
              </div>
            </div>
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="/presensi/histori" class="warning" style="font-size: 40px">
                  <i class="fas fa-file-alt"></i>
                </a>
              </div>
              <div class="menu-name">
                <span class="text-center">Histori</span>
              </div>
            </div>
            <div class="item-menu text-center">
              <div class="menu-icon">
                <a href="" class="orange" style="font-size: 40px">
                  <i class="fas fa-map-marker-alt"></i>
                </a>
              </div>
              <div class="menu-name">Lokasi</div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="section mt-2" id="presence-section">
      <div class="todaypresence">
        <div class="row">
          <div class="col-6">
            <div class="card bg-success">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence">
                    @if ($presensihariini != null)
                    <i class="fas fa-clock"></i>
                    @endif
                  </div>
                  <div class="presencedetail">
                    <h4 class="presencetitle">Masuk</h4>
                    <span>{{ $presensihariini != null ? $presensihariini->jam_in : 'Belum Absen'}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card bg-danger">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence">
                    @if ($presensihariini != null && $presensihariini->jam_out != null)
                    <i class="fas fa-clock"></i>
                    @endif
                  </div>
                  <div class="presencedetail">
                    <h4 class="presencetitle">Pulang</h4>
                    <span>{{ $presensihariini != null && $presensihariini->jam_out != null ? $presensihariini->jam_out : 'Belum Absen'}}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      

      <div class="rekappresence mt-1">

        <span>Rekap Presensi Bulan {{ $namabulan[$bulanini]}} Tahun {{$tahunini}}</span>
        <div class="row">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence primary">
                    <i class="fas fa-check"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Hadir</h4>
                    <span class="rekappresencedetail">{{ $rekappresensi->jmlhadir}} Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence green">
                    <i class="fas fa-info"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Izin</h4>
                    <span class="rekappresencedetail">{{ $rekapizin->jmlizin}} Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row mt-1">
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence danger">
                    <i class="fas fa-sad-tear"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Sakit</h4>
                    <span class="rekappresencedetail">{{ $rekapizin->jmlsakit}} Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-6">
            <div class="card">
              <div class="card-body">
                <div class="presencecontent">
                  <div class="iconpresence warning">
                    <i class="fa fa-clock"></i>
                  </div>
                  <div class="presencedetail">
                    <h4 class="rekappresencetitle">Terlambat</h4>
                    <span class="rekappresencedetail">{{ $rekappresensi->jmlterlambat}} Hari</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="presencetab mt-2">
        <div class="tab-pane fade show active" id="pilled" role="tabpanel">
          <ul class="nav nav-tabs style1" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" data-toggle="tab" href="#home" role="tab">
                Kehadiran Bulan {{ $namabulan[$bulanini]}}
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" data-toggle="tab" href="#profile" role="tab">
                Kehadiran Siswa
              </a>
            </li>
          </ul>
        </div>
        <div class="tab-content mt-2" style="margin-bottom: 100px">
          <div class="tab-pane fade show active" id="home" role="tabpanel">
            <ul class="listview image-listview">
              @foreach ($historibulanini as $d)
              @php
                $path = Storage::url('public/uploads/absensi/'.$d->foto_in)
              @endphp
              <li>
                <div class="item">
                  <div class="icon-box bg-primary">
                   <img src="{{ url($path) }}" alt="" class="imaged w64">
                  </div>
                  <div class="in">
                    <div>Foto Masuk <br>Tanggal : {{ date("d-m-y",strtotime($d->tgl_presensi)) }}</div>
                    <span class="badge {{$d->jam_in <= "07:00" ? "bg-success" : "bg-danger"}}">{{ $d->jam_in}}</span>
                  </div>
                </div>
              </li>  
              @endforeach
            </ul>

            <ul class="listview image-listview">
              @foreach ($historibulanini as $d)
              @php
                $path = Storage::url('public/uploads/absensi/'.$d->foto_out)
              @endphp
              <li>
                <div class="item">
                  <div class="icon-box bg-primary">
                   <img src="{{ url($path) }}" alt="" class="imaged w64">
                  </div>
                  <div class="in">
                    <div>Foto Pulang <br>Tanggal : {{ date("d-m-y",strtotime($d->tgl_presensi)) }}</div>
                    <span class="badge badge-danger">{{$presensihariini != null && $d->jam_out != null ? $d->jam_out : 'Belum Absen'}}</span>
                  </div>
                </div>
              </li>  
              @endforeach
            </ul>


          </div>
          <div class="tab-pane fade" id="profile" role="tabpanel">
            <ul class="listview image-listview">
              @foreach ($leaderboard as $d)
              <li>
                <div class="item">
                  <img src="assets/img/sample/avatar/avatar1.jpg" alt="image" class="image" />
                  <div class="in">
                    <div>
                      <b>{{ $d->nama}}</b><br>
                       <small class="text-muted">{{$d->kelas}}</small>
                    </div>
                    <span class="text-muted">Masuk : {{$d->jam_in}}<br>Pulang : {{$d->jam_out}}</span>
                  </div>
                </div>
              </li> 
              @endforeach           
            </ul>
          </div>
        </div>
      </div>
    </div>
@endsection
