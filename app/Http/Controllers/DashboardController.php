<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class DashboardController extends Controller
{
    public function index()
    {
        $hariini = date("Y-m-d");
        $bulanini = date("m") * 1;
        $tahunini = date('Y');
        $nis = Auth::guard('siswa')->user()->nis;
        $presensihariini = DB::table('prsensi')->where('nis', $nis)->where('tgl_presensi',$hariini)->first();
        $historibulanini = DB::table('prsensi')
        ->where('nis', $nis)
        ->whereRaw('MONTH(tgl_presensi)="'. $bulanini.'"')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->orderBy('tgl_presensi')
        ->get();

        $rekappresensi = DB::table('prsensi')
        ->selectRaw('COUNT(nis) as jmlhadir, SUM(IF(jam_in > "07:15",1,0)) as jmlterlambat')
        ->where('nis', $nis)
        ->whereRaw('MONTH(tgl_presensi)="'. $bulanini.'"')
        ->whereRaw('YEAR(tgl_presensi)="'.$tahunini.'"')
        ->first();

        $leaderboard = DB::table('prsensi')
        ->join('siswa','prsensi.nis', '=', 'siswa.nis')
        ->where('tgl_presensi',$hariini)
        ->orderBy('jam_in')
        ->get();
        $namabulan = ["","Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember"];

        $rekapizin = DB::table('ijin')
        ->selectRaw('SUM(if(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit')
        ->where('nis', $nis)
        ->whereRaw('MONTH(tgl_izin) ="'. $bulanini.'"')
        ->whereRaw('YEAR(tgl_izin) ="'.$tahunini.'"')
        ->where('status_approved',1)
        ->first();
        return view('dashboard.dashboard', compact('presensihariini','historibulanini','namabulan','bulanini','tahunini','rekappresensi','leaderboard','rekapizin'));
    }

    public function dashboardadmin()
    {
        $hariini = date('Y-m-d');
        $rekappresensi = DB::table('prsensi')
        ->selectRaw('COUNT(nis) as jmlhadir, SUM(IF(jam_in > "07:15",1,0)) as jmlterlambat')
        ->where('tgl_presensi', $hariini)
        ->first();

        $rekapizin = DB::table('ijin')
        ->selectRaw('SUM(if(status="i",1,0)) as jmlizin, SUM(IF(status="s",1,0)) as jmlsakit')
        ->where('tgl_izin', $hariini)
        ->where('status_approved',1)
        ->first();
    
        return view('dashboard.dashboardadmin', compact('rekappresensi','rekapizin'));
    }
}
