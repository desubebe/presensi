<form action="/jurusan/{{$jurusan->kode_jur}}/update" method="POST" id="editjurusan">
    @csrf
    <div class="row">
        <div col="12">
            <div class="input-icon mb-3">
                <input type="text" id="kode_jur" readonly value="{{$jurusan->kode_jur}}" class="form-control" name="kode_jur" placeholder="NIS" autofocus>
            </div>

            <div class="input-icon mb-3">
                <input type="text" value="{{$jurusan->nama_jur}}"  id="nama_jur" class="form-control" name="nama_jur" placeholder="Nama">
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