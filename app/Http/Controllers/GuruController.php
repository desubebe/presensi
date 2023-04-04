<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Ramsey\Uuid\Guid\GuidBuilder;

class GuruController extends Controller
{
    public function index(Request $request)    
    {
        $nama = $request->nama;
        $query = Guru::query();
        $query ->select('*');
        if(!empty($nama)){
            $query->where('nama','like','%'.$nama.'%');
        }
        $guru=$query->get();
        $guru = $query->paginate(10);  

        
        return view('guru.index', compact('guru'));
    }

    public function store(Request $request){
        $nik = $request->nik;
        $nama = $request->nama;
        $no_hp = $request->no_hp;
        $jabatan = $request->jabatan;

        $data = [
            'nik' => $nik,
            'nama' => $nama,
            'no_hp' => $no_hp,
            'jabatan' =>$jabatan
        ];

        $simpan = DB::table('guru')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        }else{            
            return Redirect::back()->with(['success' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
       $nik = $request->nik;
       $guru = DB::table('guru')->get();
       $guru = DB::table('guru')->where('nik',$nik)->first();
       return view('guru.edit', compact('guru'));

    }

    
    public function update($nik, Request $request)
    {
        $nama = $request->nama;
        $no_hp = $request->no_hp;
        $jabatan = $request->jabatan;
        $data = [
                'nama'=>$nama,
                'no_hp' =>$no_hp,
                'jabatan' =>$jabatan
        ];
            $update = DB::table('guru')->where('nik', $nik)->update($data);
            if($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Update']);
            }else{
                return Redirect::back()->with(['warning' => 'Data Gagal Update']);
        }

    }

    public function delete($nik){
        $delete = DB::table('guru')->where('nik', $nik)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagagl Dihapus']);

        }
    }
}
