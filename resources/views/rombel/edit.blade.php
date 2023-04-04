<form action="/rombel/{{$rombel->kode_rom}}/update" method="POST" id="frmrombel">
    @csrf
    <div class="row">
        <div col="12">
            <div class="input-icon mb-3">
                <input type="text" readonly value="{{$rombel->kode_rom}}"  id="kode_rom" class="form-control" name="kode_rom" placeholder="Nama">
            </div>

            <div class="input-icon mb-3">
                <input type="text" value="{{$rombel->nama_rom}}"  id="nama_rom" class="form-control" name="nama_rom" placeholder="Nama">
            </div>
            <div class="input-icon mb-3">
                <input type="text" value="{{$rombel->nik}}"  id="nik" class="form-control" name="nik" placeholder="Nama">
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