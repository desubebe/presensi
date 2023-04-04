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
            Data Jurusan >_
          </h2>
        </div>
      </div>
    </div>
</div>

<div class="page-body">
    <div class="container-xl">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
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
                            </div>
                        </div>
                        <div>
                            <div class="col-12">
                                <a href="#" class="btn btn-primary" id="btnTambahjurusan">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-user-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path>
                                        <path d="M16 19h6"></path>
                                        <path d="M19 16v6"></path>
                                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4"></path>
                                     </svg>
                                    Tambah Data
                                </a>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-12">
                                <form action="/jurusan" method="GET">
                                    <div class="row">
                                        <div class="col-10">
                                            <div class="form-group">
                                                <input type="tex" name="nama_jur" class="form-control" placeholder="Cari Nama Jurusan" value="{{Request('nama_jur')}}">
                                            </div>
                                        </div>                                        
                                            <div class="col-2">
                                                <button type="submit" class="btn btn-primary">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0"></path>
                                                        <path d="M21 21l-6 -6"></path>
                                                     </svg>Cari
                                                </button>
                                            </div>        
                                        </div>
                                    </div>        
                                </form>
                            </div>
                        </div>
                        <div class="row mt-2">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Jurusan</th>
                                            <th>Nama Jurusan</th>
                                            <th>Opsi</th>                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($jurusan as $d)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$d->kode_jur}}</td>
                                            <td>{{$d->nama_jur}}</td>
                                            <td>
                                                <div class="btn-group">
                                                <a href="#" class="edit btn btn-info btn-sm" kode_jur="{{$d->kode_jur}}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                        <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                        <path d="M16 5l3 3"></path>
                                                     </svg>
                                                </a>
                                                <form action="/jurusan/{{$d->kode_jur}}/delete" method="POST" style="margin-left:5px">
                                                @csrf 
                                                <a class="btn btn-danger btn-sm delete-confirm">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                     </svg>
                                                </a>
                                                </form>
                                            </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="modal-inputjurusan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Tambah Data Jurusan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="/jurusan/store" method="POST" id="frmjurusan">
                @csrf
                <div class="row">
                    <div col="12">
                        <div class="input-icon mb-3">
                            <input type="text" value="" id="kode_jur" class="form-control" name="kode_jur" placeholder="Kode Jurusan" autofocus>
                        </div>

                        <div class="input-icon mb-3">
                            <input type="text" value=""  id="nama_jur" class="form-control" name="nama_jur" placeholder="Nama Jurusan">
                        </div>                      
                    </div>       
                </div>
                <div class="row mt-2">
                    <div class="col-12">
                        <div class="form-group">
                            <button class="btn btn-primary w-100">Simpan</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

{{--modal-edit--}}

<div class="modal modal-blur fade" id="modal-editjurusan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Data Jurusan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" id="loadeditform">
        </div>        
      </div>
    </div>
</div>

@endsection

@push('myscript')
    <script>
        $(function() {
            $("#btnTambahjurusan").click(function() {
                $("#modal-inputjurusan").modal("show")
            });

            $(".edit").click(function() {
                var kode_jur = $(this).attr('kode_jur');
                $.ajax({
                    type: 'POST'
                    ,url: '/jurusan/edit'
                    ,cache: false
                    ,data: {
                        _token: "{{ csrf_token(); }}"
                        ,kode_jur: kode_jur
                    }
                    ,success: function(respond){
                        $("#loadeditform").html(respond);
                    }
                });
                $("#modal-editjurusan").modal("show")
            });

            $(".delete-confirm").click(function(e) {
                var form = $(this).closest('form');
                e.preventDefault();
                Swal.fire({
                    title: 'Apakah Anda Yakin Data Ini Mau Dihapus ?',
                    text: "Jika Ya, Maka Data Akan Terhapus Permanen",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Hapus Saja'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                        Swal.fire(
                        'Deleted!',
                        'Data Berhasil Dihapus.',
                        'success'
                        )
                    }
                })
            });



            $("#frmjurusan").submit(function(){
            var nis = $("#nis").val();
            var nama = $("#nama").val();
            var kelas = $("#kelas").val();
            var no_hp = $("#no_hp").val();
            var password = $("#password").val();
            var kode_jur = $("frmKaryawan").find("#kode_jur").val();
            var kode_rom = $("#kode_rom").val();
            var foto = $("#foto").val();

            if(nis == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'NIS Belum Di Isi'
                    ,icon: 'warning'
                    });
                return false;
            }else if(nama == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Nama Belum Di Isi'
                    ,icon: 'warning'
                    });                return false;
            }else if (kelas == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Kelas Belum Di pili'
                    ,icon: 'warning'
                    });               
                 return false;
            }else if (no_hp == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Nomor HP Belum Di pili'
                    ,icon: 'warning'
                    });               
                 return false;
            }else if (password == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Password Belum Di Isi'
                    ,icon: 'warning'
                    });               
                 return false;
            }else if (kode_jur == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Jurusan Belum Di pili'
                    ,icon: 'warning'
                    });               
                 return false;
            }else if (kode_rom == ''){
                Swal.fire({
                    title: 'Maaf !'
                    ,text: 'Rombel Belum Di pili'
                    ,icon: 'warning'
                    });               
                 return false;
            }
        });

        });
    </script>
@endpush
