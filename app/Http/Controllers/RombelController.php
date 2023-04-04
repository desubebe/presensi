<?php

namespace App\Http\Controllers;

use App\Models\Rombel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class RombelController extends Controller
{
    public function index(Request $request)
    {
        $query = Rombel::query();
        $query ->select('rombel.*','nama');
        $query->join('guru','rombel.nik', '=' ,'guru.nik');
        $query->orderBy('nama_rom');

        if(!empty($request->nama_rom)){
            $query->where('nama_rom','like','%'.$request->nama_rom.'%');
        }
        if(!empty($request->nama)){
            $query->where('guru.nik',$request->nik);
        }  

        $rombel = $query->paginate(10); 
        $guru = DB::table('guru')->get();
        return view('rombel.index', compact('rombel','guru'));
    }


    public function store(Request $request){
        $kode_rom = $request->kode_rom;
        $nama_rom = $request->nama_rom;
        $nik = $request->nik;

        $data = [
            'kode_rom' => $kode_rom,
            'nama_rom' => $nama_rom,
            'nik' =>$nik
        ];

        $simpan = DB::table('rombel')->insert($data);
        if($simpan){
            return Redirect::back()->with(['success' => 'Data Berhasil Disimpan']);
        }else{            
            return Redirect::back()->with(['success' => 'Data Gagal Disimpan']);
        }
    }

    public function edit(Request $request)
    {
       $kode_rom = $request->kode_rom;
       $rombel = DB::table('rombel')->get();
       $rombel = DB::table('rombel')->where('kode_rom',$kode_rom)->first();
       return view('rombel.edit', compact('rombel'));

    }

    public function update($kode_rom, Request $request)
    {
        $nama_rom = $request->nama_rom;
        $nik = $request->nik;
        $data = [
                'nama_rom'=>$nama_rom,
                'nik' => $nik
        ];
            $update = DB::table('rombel')->where('kode_rom', $kode_rom)->update($data);
            if($update) {
                return Redirect::back()->with(['success' => 'Data Berhasil Update']);
            }else{
                return Redirect::back()->with(['warning' => 'Data Gagal Update']);
        }

    }

    public function delete($kode_rom){
        $delete = DB::table('rombel')->where('kode_rom', $kode_rom)->delete();
        if($delete){
            return Redirect::back()->with(['success' => 'Data Berhasil Dihapus']);
        }else{
            return Redirect::back()->with(['warning' => 'Data Gagagl Dihapus']);

        }
    }
}
