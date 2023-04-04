@extends('layouts.presensi')

@section('header')
<div class="appHeader bg-primary text-light">
    <div class="left">
        <a href="javascript:;" class="headerButton goBack">
            <i class="fas fa-arrow-left fa-2x"></i>
        </a>
    </div>
    <div class="pageTitle">Edit Profil</div>
    <div class="right"></div>
</div>
@endsection

@section('content')
<div class="row" style="margin-top:4rem">
    </div class="col">
        @php 
            $messagesuccess = Session::get('success');
            $messageerror = Session::get('error');
        @endphp
        @if(Session::get('success'))
        <div class="alert alert-success">
            {{ $messagesuccess}}
        </div>
        @endif
        @if(Session::get('error'))
        <div class="alert alert-danger">
            {{ $messageerror}}
        </div>
        @endif
    </div>
</div>
</div>

<form action="/presensi/{{ $siswa->nis }}/updateprofile" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="col">
        
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control"  readonly value="{{$siswa->nama}}" name="nama" placeholder="Nama Lengkap" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control"  readonly value="{{$siswa->kelas}}" name="kelas" placeholder="Kelas" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <input type="text" class="form-control" value="{{$siswa->no_hp}}" name="no_hp" placeholder="No. HP" autocomplete="off">
            </div>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <small class="text-muted">Password biarkan kosong jika tidak diubah!</small>
                <input type="password" class="form-control" name="password" placeholder="Password" autocomplete="off">
            </div>
        </div>
        <div class="custom-file-upload" id="fileUpload1">
            <input type="file" name="foto" id="fileuploadInput" accept=".png, .jpg, .jpeg">
            <label for="fileuploadInput">
                <span>
                    <strong>
                        <ion-icon name="cloud-upload-outline" role="img" class="md hydrated" aria-label="cloud upload outline"></ion-icon>
                        <i>Tap Untuk Upload Foto</i>
                    </strong>
                </span>
            </label>
        </div>
        <div class="form-group boxed">
            <div class="input-wrapper">
                <button type="submit" class="btn btn-primary btn-block">
                    <ion-icon name="refresh-outline"></ion-icon>
                    Update
                </button>
            </div>
        </div>
    </div>
</form>
@endsection