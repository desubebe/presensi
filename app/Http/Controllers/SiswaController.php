<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index(Request $request)
    {
        $query = Siswa::query();
        $query -> select('siswa.*', 'nama_jur','nama_rom','nama_cabang');
        $query ->join('jurusan','siswa.kode_jur', '=','jurusan.kode_jur');
        $query ->join('rombel','siswa.kode_rom','=','rombel.kode_rom');
        $query->join('cabang','siswa.kode_cabang','=','cabang.kode_cabang');
        $query->orderBy('nama');
        if(!empty($request->nama)){
            $query->where('nama', 'like', '%' . $request->nama.'%');
        }

        if(!empty($request->kode_jur)){
            $query->where('jurusan.kode_jur',$request->kode_jur);
        }

        if(!empty($request->kode_rom)){
            $query->where('rombel.kode_rom',$request->kode_rom);
        }
        if(!empty($request->kode_cabang)){
            $query->where('cabang.nama_cabang',$request->nama_cabang);
        }
        $siswa = $query->paginate(10);  
        
        $jurusan = DB::table('jurusan')->get();
        $rombel = DB::table('rombel')->get();
        $cabang = DB::table('cabang')->orderBy('nama_cabang')->get();
        return view ('siswa.index', compact('siswa','jurusan','rombel','cabang'));
    }

    public function store(Request $request)
    {
        $nis = $request->nis;
        $nama = $request->nama;
        $kelas = $request->kelas;
        $no_hp = $request->no_hp;
        $kode_jur = $request->kode_jur;
        $kode_rom = $request->kode_rom;
        $password = Hash::make('12345');
        $kode_cabang = $request->kode_cabang;

        if($request->hasFile('foto')){
            $foto = $nis.".".$request->file('foto')->getClientOriginalExtension();
        }else{
            $foto = null;
        }

        try{
            $data = [
                'nis'=>$nis,
                'nama'=>$nama,
                'kelas'=>$kelas,
                'no_hp'=>$no_hp,
                'password' =>$password,
                'kode_jur'=>$kode_jur,
                'kode_rom'=>$kode_rom,
                'foto' =>$foto,
                'kode_cabang' =>$kode_cabang              
            ];
            $simpan = DB::table('siswa')->insert($data);
            if($simpan) {
                if($request->hasFile('foto')){
                    $folderPath = "public/uploads/siswa/";
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
            }

        }catch(\Exception $e){
            if ($e->getCode() == 23000) {
                $message = "NIS  " . $nis . " Sudah Ada";
            return Redirect::back()->with(['warning' => 'Data Gagal Disimpan'. $message]);
            }
        }
    }

    public function edit(Request $request)
    {
       $nis = $request->nis;
       $jurusan = DB::table('jurusan')->get();
       $cabang = DB::table('cabang')->orderBy('nama_cabang')->get();
       $rombel = DB::table('rombel')->get();
       $siswa = DB::table('siswa')->where('nis',$nis)->first();
       return view('siswa.edit', compact('jurusan','rombel','siswa','cabang'));

    }

    public function update($nis, Request $request)
    {
        $nis = $request->nis;
        $nama = $request->nama;
        $kelas = $request->kelas;
        $no_hp = $request->no_hp;
        $kode_jur = $request->kode_jur;
        $kode_rom = $request->kode_rom;
        $kode_cabang = $request->kode_cabang;
        $password = Hash::make('12345');
        $old_foto = $request->foto;
        if($request->hasFile('foto')){
            $foto = $nis.".".$request->file('foto')->getClientOriginalExtension();
        }else{
            $foto = $old_foto;
        }

        try{
            $data = [
                'nama'=>$nama,
                'kelas'=>$kelas,
                'no_hp'=>$no_hp,
                'password' =>$password,
                'kode_jur'=>$kode_jur,
                'kode_rom'=>$kode_rom,
                'foto' =>$foto,
                'kode_cabang' =>$kode_cabang              
            ];
            $update = DB::table('siswa')->where('nis', $nis)->update($data);
            if($update) {
                if($request->hasFile('foto')){
                    $folderPath = "public/uploads/siswa/";
                    $folderPathOld = "public/uploads/siswa/".$old_foto;
                    Storage::delete($folderPathOld);
                    $request->file('foto')->storeAs($folderPath, $foto);
                }
                return Redirect::back()->with(['success' => 'Data Berhasil Update']);
            }

        }catch(\Exception $e){
            
            return Redirect::back()->with(['warning' => 'Data Gagal Update']);
        }

    }

    public function delete($nis){
        $delete = DB::table('siswa')->where('nis', $nis)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagagl Dihapus']);

        }
    }
}
