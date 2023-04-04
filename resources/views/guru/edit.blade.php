<form action="/guru/{{$guru->nik}}/update" method="POST" id="editguru">
    @csrf
    <div class="row">
        <div col="12">
            <div class="input-icon mb-3">
                <label>NIK</label>
                <input type="number" id="nik" readonly value="{{$guru->nik}}" class="form-control" name="nik" placeholder="NIK" autofocus>
            </div>
            <div class="input-icon mb-3">
                <label>Nama Lengkap</label>
                <input type="text" value="{{$guru->nama}}"  id="nama" class="form-control" name="nama" placeholder="Nama">
            </div> 
            <div class="input-icon mb-3">
                <label>NO HP/WA</label>
                <input type="number" value="{{$guru->no_hp}}"  id="no_hp" class="form-control" name="no_hp" placeholder="Nama">
            </div>    
            <div class="input-icon mb-3">
                <label>Tugas Tambahan</label>
                <input type="text" value="{{$guru->jabatan}}"  id="jabatan" class="form-control" name="jabatan" placeholder="Nama">
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