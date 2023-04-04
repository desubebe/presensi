<?php

namespace App\Http\Controllers;

use Egulias\EmailValidator\Warning\Warning;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
   public function proseslogin(Request $request)
   {
      if(Auth::guard('siswa')->attempt(['nis' => $request->nis, 'password' => $request->password])){
       return redirect('/dashboard');
      }else{
        return redirect('/')->with(['warning' => 'Username / Password Salah']);
      }
    }

    public function proseslogout()
    {
        if (Auth::guard('siswa')->check()){
            auth::guard('siswa')->logout();
            return redirect('/');
        }
    }

    public function proseslogoutadmin()
    {
        if (Auth::guard('user')->check()){
            auth::guard('user')->logout();
            return redirect('/panel');
        }
    }

    public function prosesloginadmin(Request $request)
    {
       if(Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password])){
        return redirect('/panel/dashboardadmin');
       }else{
         return redirect('/panel')->with(['warning' => 'Username / Password Salah']);
       }
     }
}

