<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class JurusanController extends Controller
{
    public function index(Request $request)
    {
        $nama_jur = $request->nama_jur;
        $query = Jurusan::query();
        $query ->select ('*');
        if(!empty($nama_jur)){
            $query->where('nama_jur','like','%'.$nama_jur.'%');
        }
        $jurusan = $query->get();
        //$jurusan = DB::table('jurusan')->orderBy('nama_jur')->get();
        return view('jurusan.index', compact('jurusan'));
    }

    public function store(Request $request){
        $kode_jur = $request->kode_jur;
        $nama_jur = $request->nama_jur;

        $data = [
            'kode_jur' => $kode_jur,
            'nama_jur' => $nama_jur
        ];
        $cek = DB::table('jurusan')->where('kode_jur', $kode_jur)->count();
        if ($cek > 0) {
            return Redirect::back()->with(['warning' => 'Data dengan Kode Jurusan.' . $kode_jur . ' Sudah Ada']);
        }
        $simpan = DB::table('jurusan')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        }else{            
            return Redirect::back()->with(['success' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
       $kode_jur = $request->kode_jur;
       $jurusan = DB::table('jurusan')->get();
       $jurusan = DB::table('jurusan')->where('kode_jur',$kode_jur)->first();
       return view('jurusan.edit', compact('jurusan'));

    }

    public function update($kode_jur, Request $request)
    {
        $nama_jur = $request->nama_jur;
        $data = [
                'nama_jur'=>$nama_jur
        ];
            $update = DB::table('jurusan')->where('kode_jur', $kode_jur)->update($data);
            if($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Update']);
            }else{
                return Redirect::back()->with(['warning' => 'Data Gagal Update']);
        }

    }

    public function delete($kode_jur){
        $delete = DB::table('jurusan')->where('kode_jur', $kode_jur)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagagl Dihapus']);

        }
    }
}
