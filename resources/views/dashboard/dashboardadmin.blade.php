@extends('layouts.admin.tabler')
@section('content')
<div class="page-header d-print-none">
    <div class="container-xl">
      <div class="row g-2 align-items-center">
        <div class="col">
          <!-- Page pre-title -->
          <div class="page-pretitle">
            Dashboard
          </div>
          <h2 class="page-title">
           Aplikasi Absensi Online SMK Negeri 1 Palasah Kab. Majalengka
          </h2>
        </div>
      </div>
    </div>
</div>
<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-success text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-camera-check" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11 20h-6a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v4"></path>
                                <path d="M9 13a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"></path>
                                <path d="M15 19l2 2l4 -4"></path>
                             </svg>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                            {{ $rekappresensi->jmlhadir}}
                        </div>
                        <div class="text-muted">
                         Siswa Hadir
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-primary text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-triangle-filled" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M11.99 1.968c1.023 0 1.97 .521 2.512 1.359l.103 .172l7.1 12.25l.062 .126a3 3 0 0 1 -2.568 4.117l-.199 .008h-14l-.049 -.003l-.112 .002a3 3 0 0 1 -2.268 -1.226l-.109 -.16a3 3 0 0 1 -.32 -2.545l.072 -.194l.06 -.125l7.092 -12.233a3 3 0 0 1 2.625 -1.548zm.02 12.032l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm-.01 -6a1 1 0 0 0 -.993 .883l-.007 .117v2l.007 .117a1 1 0 0 0 1.986 0l.007 -.117v-2l-.007 -.117a1 1 0 0 0 -.993 -.883z" stroke-width="0" fill="currentColor"></path>
                             </svg>                
                            </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                          {{ $rekappresensi->jmlterlambat}} 
                        </div>
                        <div class="text-muted">
                         Siswa Terlambat
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-warning text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-credit-card-off" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M3 3l18 18"></path>
                                <path d="M9 5h9a3 3 0 0 1 3 3v8a3 3 0 0 1 -.128 .87"></path>
                                <path d="M18.87 18.872a3 3 0 0 1 -.87 .128h-12a3 3 0 0 1 -3 -3v-8c0 -1.352 .894 -2.495 2.124 -2.87"></path>
                                <path d="M3 11l8 0"></path>
                                <path d="M15 11l6 0"></path>
                                <path d="M7 15l.01 0"></path>
                                <path d="M11 15l2 0"></path>
                             </svg>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                            {{ $rekapizin->jmlizin != null ? $rekapizin->jmlizin : 0}} 
                        </div>
                        <div class="text-muted">
                         Siswa Izin
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6 col-xl-3">
                <div class="card card-sm">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-auto">
                        <span class="bg-danger text-white avatar"><!-- Download SVG icon from http://tabler-icons.io/i/currency-dollar -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-report-medical" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                                <path d="M9 3m0 2a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v0a2 2 0 0 1 -2 2h-2a2 2 0 0 1 -2 -2z"></path>
                                <path d="M10 14l4 0"></path>
                                <path d="M12 12l0 4"></path>
                             </svg>
                        </span>
                      </div>
                      <div class="col">
                        <div class="font-weight-medium">
                            {{ $rekapizin->jmlsakit != null ? $rekapizin->jmlsakit : 0}} 
                        </div>
                        <div class="text-muted">
                         Siswa Sakit
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              
        </div>
    </div>   
</div>   
@endsection

