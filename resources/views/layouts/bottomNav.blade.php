
  <!-- App Bottom Menu -->
  <div class="appBottomMenu">
    <a href="/dashboard" class="item {{ request()->is('dashboard') ? 'active' : ''}}">
      <div class="col">
        <i class="fas fa-home fa-3x"></i>
        <strong>Beranda</strong>
      </div>
    </a>
    <a href="/presensi/histori" class="item {{ request()->is('presensi/histori') ? 'active' : ''}}"">
      <div class="col">
        <i class="fas fa-calendar-alt fa-3x"></i>
        <strong>Histori</strong>
      </div>
    </a>
    <a href="/presensi/create" class="item {{ request()->is('create') ? 'active' : ''}}"">
      <div class="col">
        <div class="action-button large">
          <i class="fas fa-camera text-white fa-3x"></i>
        </div>
      </div>
    </a>
    <a href="/presensi/izin" class="item {{ request()->is('presensi/izin') ? 'active' : ''}}"">
      <div class="col">
        <i class="fas fa-envelope fa-3x"></i>
        <strong>Pengajuan Izin</strong>
      </div>
    </a>
    <a href="/editprofile" class="item {{ request()->is('editprofile') ? 'active' : ''}}">
      <div class="col">
        <i class="fas fa-user-tie fa-3x"></i>
        <strong>Profile</strong>
      </div>
    </a>
  </div>