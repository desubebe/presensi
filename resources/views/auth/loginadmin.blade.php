
<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta17
* @link https://tabler.io
* Copyright 2018-2023 The Tabler Authors
* Copyright 2018-2023 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>Login Administrator | SKAPAL Presensi</title>
    <!-- CSS files -->
    <link href="{{ asset('tabler/dist/css/tabler.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-flags.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-payments.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/tabler-vendors.min.css?1674944402')}}" rel="stylesheet"/>
    <link href="{{ asset('tabler/dist/css/demo.min.css?1674944402')}}" rel="stylesheet"/>
    <style>
      @import url('https://rsms.me/inter/inter.css');
      :root {
      	--tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
      }
      body {
      	font-feature-settings: "cv03", "cv04", "cv11";
      }
    </style>
  </head>
  <body  class=" d-flex flex-column">
    <script src="{{ asset('tabler/dist/js/demo-theme.min.js?1674944402')}}"></script>
    <div class="page page-center">
      <div class="container container-normal py-4">
        <div class="row align-items-center g-4">
          <div class="col-lg">
            <div class="container-tight">
              <div class="text-center mb-4">
                <a href="." class="navbar-brand navbar-brand-autodark"><img src="./static/logo.svg" height="36" alt=""></a>
              </div>
              <div class="card card-md">
                <div class="card-body">
                  <h2 class="h2 text-center mb-4">Selamat Datang</h2>
                  @if (Session::get('warning'))
                  <div class="alert alert-warning">
                    <p>{{ Session::get('warning')}}</p>
                  </div>
                  @endif
                  <form action="/prosesloginadmin" method="post" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                      <label class="form-label">Nama Pengguna</label>
                      <input type="email" name="email" class="form-control" placeholder="Username" autocomplete="off" autofocus>
                    </div>
                    <div class="mb-2">
                      <label class="form-label">
                        Kata Kunci                        
                      </label>
                      <div class="input-group input-group-flat">
                        <input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off">
                        <span class="input-group-text">
                          <a href="#" class="link-secondary" title="Show password" data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M12 12m-2 0a2 2 0 1 0 4 0a2 2 0 1 0 -4 0" /><path d="M22 12c-2.667 4.667 -6 7 -10 7s-7.333 -2.333 -10 -7c2.667 -4.667 6 -7 10 -7s7.333 2.333 10 7" /></svg>
                          </a>
                        </span>
                      </div>
                    </div>
                    <div class="form-footer">
                      <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                    </div>
                  </form>
                </div>
                <div class="hr-text">Developer By : Teknik Jaringan Komputer dan Telekomunikasi </div>
                <div class="card-body">                  
                </div>
              </div>
              <div class="text-center text-muted mt-3">
                Copyright &copy; 2023 <a href="./sign-up.html" tabindex="-1">SMK Negeri 1 Palasah</a>
              </div>
            </div>
          </div>
          <div class="col-lg d-none d-lg-block">
            <img src="{{ asset('assets/img/login/login2.png') }}" height="300" class="d-block mx-auto" alt="">
          </div>
        </div>
      </div>
    </div>
    <!-- Libs JS -->
    <!-- Tabler Core -->
    <script src="{{ asset('tabler/dist/js/tabler.min.js?1674944402')}}" defer></script>
    <script src="{{ asset('tabler/dist/js/demo.min.js?1674944402')}}" defer></script>
  </body>
</html>