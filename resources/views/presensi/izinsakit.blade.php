@extends('layouts.admin.tabler')
@section ('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            SKAPAL Presensi
          </div>
          <h2 class="page-title">
            Approval Ajuan Ijin/Sakit >_
          </h2>
        </div>
      </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <form action="/presensi/izinsakit" method="GET" autocomplete="off">
                    <div class="row">
                    <div class="col-6">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M16 3l0 4"></path>
                                    <path d="M8 3l0 4"></path>
                                    <path d="M4 11l16 0"></path>
                                    <path d="M8 15h2v2h-2z"></path>
                                    </svg>                            
                            </span>
                            <input type="text" value="{{ Request('dari')}}" id="dari" name="dari" class="form-control" placeholder="Pilih Tanggal Presensi Awal" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-calendar-event" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 5m0 2a2 2 0 0 1 2 -2h12a2 2 0 0 1 2 2v12a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2z"></path>
                                    <path d="M16 3l0 4"></path>
                                    <path d="M8 3l0 4"></path>
                                    <path d="M4 11l16 0"></path>
                                    <path d="M8 15h2v2h-2z"></path>
                                    </svg>                            
                            </span>
                            <input type="text" value="{{Request('sampai')}}" id="sampai" name="sampai"  class="form-control" placeholder="Pilih Tanggal Presensi Akhir" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-barcode" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7v-1a2 2 0 0 1 2 -2h2"></path>
                                        <path d="M4 17v1a2 2 0 0 0 2 2h2"></path>
                                        <path d="M16 4h2a2 2 0 0 1 2 2v1"></path>
                                        <path d="M16 20h2a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M5 11h1v2h-1z"></path>
                                        <path d="M10 11l0 2"></path>
                                        <path d="M14 11h1v2h-1z"></path>
                                        <path d="M19 11l0 2"></path>
                                     </svg>                            
                                    </span>
                            <input type="text" id="nis" name="nis" value="{{Request('nis')}}" class="form-control" placeholder="Cari Berdasarkan NIS" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="input-icon mb-3">
                            <span class="input-icon-addon">
                                    <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                        <path d="M15 19l2 2l4 -4"></path>
                                     </svg>                            
                                    </span>
                            <input type="text" id="nama" name="nama" value="{{Request('nama')}}"  class="form-control" placeholder="Cari Berdasarkan Nama Siswa" autocomplete="off">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <select name="status_approved" id="status_approved" class="form-select">
                                <option value="">Pilih Status</option>
                                <option value="0" {{ Request('status_approved') === '0' ? 'selected' : '' }}>Menunggu</option>
                                <option value="1" {{ Request('status_approved') == 1 ? 'selected' : '' }}>Disetujui</option>
                                <option value="2" {{ Request('status_approved') == 2 ? 'selected' : '' }}>Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-gorup">
                            <button class="btn btn-primary" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                    <path d="M21 21l-6 -6"></path>
                                 </svg>
                                 Cari Data
                            </button>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>NIS</th>
                            <th>Nama Siswa</th>
                            <th>Kelas</th>
                            <th>Tanggal Ajuan</th>
                            <th>Status</th>
                            <th>Keterangan</th>
                            <th>Status Approval</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($izinsakit as $d)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$d->nis}}</td>
                            <td>{{$d->nama}}</td>
                            <td>{{$d->kelas}}</td>
                            <td>{{date('d-m-Y', strtotime($d->tgl_izin))}}</td>
                            <td>{{ $d->status == "s" ? "Sakit" :"Ijin"}}</td>
                            <td>{{$d->keterangan}}</td>
                            <td>
                                @if($d->status_approved == 1)
                                <span class="badge bg-success">Disetujui</span>
                                @elseif($d->status_approved == 2)
                                <span class="badge bg-danger">Ditolak</span>
                                @else 
                                <span class="badge bg-warning">Menunggu</span>
                                @endif
                            </td>
                            <td>
                                @if($d->status_approved == 0)
                                <a href="#" class="btn btn-primary sm" id="approve" id_izinsakit="{{ $d->id}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                        <path d="M16 5l3 3"></path>
                                     </svg>
                                     Ubah
                                </a>
                                @else
                                <a href="/presensi/{{$d->id}}/batalkanizinsakit" class="btn btn-danger sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eraser" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M19 20h-10.5l-4.21 -4.3a1 1 0 0 1 0 -1.41l10 -10a1 1 0 0 1 1.41 0l5 5a1 1 0 0 1 0 1.41l-9.2 9.3"></path>
                                        <path d="M18 13.3l-6.3 -6.3"></path>
                                     </svg>
                                     Batalkan
                                </a>
                                @endif 
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $izinsakit->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-izinsakit" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Proses Approval Ijin/Sakit</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/presensi/approveizinsakit" method="POST">
                @csrf
                <input type="hidden" id="id_izinsakit_form" name="id_izinsakit_form">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <select name="status_approved" id="status_approved" class="form-select">
                                <option value="1">Disetujui</option>
                                <option value="2">Ditolak</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn btn-primary w-100" type="submit">
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-device-floppy" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M6 4h10l4 4v10a2 2 0 0 1 -2 2h-12a2 2 0 0 1 -2 -2v-12a2 2 0 0 1 2 -2"></path>
                                    <path d="M12 14m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0"></path>
                                    <path d="M14 4l0 4l-6 0l0 -4"></path>
                                 </svg>
                                 Proses
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>        
      </div>
    </div>
</div>
@endsection

@push('myscript')
<script>
    
    $(function(){
        $("#approve").click(function(e){
            e.preventDefault();
            var id_izinsakit = $(this).attr("id_izinsakit");
            $("#id_izinsakit_form").val(id_izinsakit);
            $("#modal-izinsakit").modal("show");
        });

        $("#dari, #sampai").datepicker({ 
                autoclose: true 
                ,todayHighlight: true
                ,format: 'yyyy-mm-dd'
        });

    });

</script>
    
@endpush