<form action="/siswa/{{$siswa->nis}}/update" method="POST" id="frmsiswa" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div col="12">
            <div class="input-icon mb-3">
                <input type="text" id="nis" readonly value="{{$siswa->nis}}" class="form-control" name="nis" placeholder="NIS" autofocus>
            </div>

            <div class="input-icon mb-3">
                <input type="text" value="{{$siswa->nama}}"  id="nama" class="form-control" name="nama" placeholder="Nama">
            </div>

           
                <div class="form-floating mb-3">
                    <select class="form-select" id="kelas" name="kelas" aria-label="Floating label select example">
                      <option selected="">Pilih Tingkat</option>
                      @foreach($rombel as $d)
                      <option {{ $siswa->kode_rom == $d->kode_rom ? 'selected' : ''}} value="{{ $d->kode_rom}}">{{$d->kode_rom}}</option>
                     @endforeach  
                    </select>
                    <label for="floatingSelect">Rombel</label>
                  </div>
           

                  <div class="form-floating mb-3">
                    <select class="form-select" id="kode_jur" name="kode_jur" aria-label="Floating label select example">
                        <option value="">Pilih Jurusan</option>
                        @foreach($jurusan as $d)
                            <option {{ $siswa->kode_jur == $d->kode_jur ? 'selected' : ''}} value="{{ $d->kode_jur}}">{{$d->nama_jur}}</option>
                        @endforeach                                
                    </select>
                    <label for="floatingSelect">Jurusan</label>
                  </div>

                  <div class="form-floating mb-3">
                    <select class="form-select" id="kode_rom" name="kode_rom" aria-label="Floating label select example">
                      <option value="">Pilih Kelas</option>
                            @foreach($rombel as $d)
                            <option {{ $siswa->kode_rom == $d->kode_rom ? 'selected' : ''}} value="{{ $d->kode_rom}}">{{$d->nama_rom}}</option>
                             @endforeach
                    </select>
                    <label for="floatingSelect">Kelas</label>
                  </div>

                  <div class="input-icon mb-3">
                    <input type="text" value="{{$siswa->no_hp}}" id="no_hp" class="form-control" name="no_hp" placeholder="NO WA">
                </div>
                <div class="input-icon mb-3">
                    <input type="file" id="foto" class="form-control" name="foto">
                    <input type="hidden" name="old_foto" value="{{$siswa->foto}}">
                </div>

                <div class="form-floating mb-3">
                    <select class="form-select" id="kode_cabang" name="kode_cabang" aria-label="Floating label select example">
                      <option value="">Pilih Lokasi Absen</option>
                            @foreach($cabang as $d)
                            <option {{ $siswa->kode_cabang == $d->kode_cabang ? 'selected' : ''}} value="{{ $d->kode_cabang}}">{{$d->nama_cabang}}</option>
                             @endforeach
                    </select>
                    <label for="floatingSelect">Lokasi Absen</label>
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