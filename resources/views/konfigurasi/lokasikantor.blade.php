@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            SKAPAL Presensi
          </div>
          <h2 class="page-title">
            Pengaturan Lokasi Presensi >_
          </h2>
        </div>
      </div>
    </div>
  </div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div clas="col-6">
                <div class="card">
                    <div class="card-body">
                        @if(Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                        @endif

                        @if(Session::get('warning'))
                        <div class="alert alert-warning">
                            {{Session::get('warning')}}
                        </div>
                        @endif
                        <form action="/konfigurasi/updatelokasikantor"  method="POST">
                            @csrf
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 18.5l-3 -1.5l-6 3v-13l6 -3l6 3l6 -3v7.5"></path>
                                                    <path d="M9 4v13"></path>
                                                    <path d="M15 7v5.5"></path>
                                                    <path d="M21.121 20.121a3 3 0 1 0 -4.242 0c.418 .419 1.125 1.045 2.121 1.879c1.051 -.89 1.759 -1.516 2.121 -1.879z"></path>
                                                    <path d="M19 18v.01"></path>
                                                 </svg>                       
                                                </span>
                                                <input type="text" id="lokasi_kantor" name="lokasi_kantor" value="{{ $lok_kantor->lokasi_kantor}}" class="form-control" placeholder="Pilih Lokasi Kantor" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="input-icon mb-3">
                                                <span class="input-icon-addon">
                                                <!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-radar-2" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                                    <path d="M15.51 15.56a5 5 0 1 0 -3.51 1.44"></path>
                                                    <path d="M18.832 17.86a9 9 0 1 0 -6.832 3.14"></path>
                                                    <path d="M12 12v9"></path>
                                                 </svg>                    
                                                </span>
                                                <input type="text" id="radius" name="radius" value="{{ $lok_kantor->radius}}" class="form-control" placeholder="Radius Kantor">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <button class="btn btn-success w-100">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-map-pin-share" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                                    <path d="M12.02 21.485a1.996 1.996 0 0 1 -1.433 -.585l-4.244 -4.243a8 8 0 1 1 13.403 -3.651"></path>
                                                    <path d="M16 22l5 -5"></path>
                                                    <path d="M21 21.5v-4.5h-4.5"></path>
                                                 </svg>
                                                 Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form> 
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
