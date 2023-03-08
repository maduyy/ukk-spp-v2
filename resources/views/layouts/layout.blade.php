<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Blank Page</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/assets/modules/fontawesome/css/all.min.css')}}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{asset('asset/dist/assets/css/style.css')}}">
  <link rel="stylesheet" href="{{asset('asset/dist/assets/css/components.css')}}">
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<style>
    td, th {
        white-space: nowrap;
    }
</style>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
         <form class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
          </ul>

        </form>
        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right">
              <div class="dropdown-header">Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="
            {{asset('asset/dist/assets/img/avatar/avatar-1.png')}}" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->username }}</div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="features-profile.html" class="dropdown-item has-icon">
                <i class="far fa-user"></i> Profile
              </a>
              <a href="features-activities.html" class="dropdown-item has-icon">
                <i class="fas fa-bolt"></i> Activities
              </a>
              <a href="features-settings.html" class="dropdown-item has-icon">
                <i class="fas fa-cog"></i> Settings
              </a>
              <div class="dropdown-divider"></div>
              <a  href="/logout" class="dropdown-item has-icon text-danger">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
          </li>
        </ul>
      </nav>
      <div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Spp</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Sp</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
        {{-- //ROUTER ADMIN --}}
         @if (auth()->user()->role == 'Admin')
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin"> Admin Dashboard</a></li>
              </ul>
            </li>
            <li class="menu-header">Data Siswa</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="fas fa-table"></i><span>Data Siswa</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/kelas"> Kelas </a></li>
                <li><a class="nav-link" href="/admin/siswa"> Siswa </a></li>
              </ul>
            </li>

            <li><a class="nav-link" href="/admin/petugass"><i class="fas fa-users"></i> <span>Petugas</span></a></li>

            <li><a class="nav-link" href="/admin/spp"><i class="fas fa-file-invoice-dollar"></i> <span>Spp</span></a></li>

            <li><a class="nav-link" href="/admin/tunggakan"><i class="fas fa-money-check"></i> <span>Tunggakan</span></a></li>

            <li class="menu-header">Data Pembayaran</li>
            <li class="dropdown">
              <a href="#" class="nav-link has-dropdown"><i class="far fa-file-alt"></i> <span>Pembayaran</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/admin/pembayaran">Entri Pembayaran</a></li>
                <li><a class="nav-link" href="/admin/histori">Histori Pembayaran</a></li>
              </ul>
            </li>
        @endif
        {{-- //ROUTER PETUGAS --}}
        @if (auth()->user()->role == 'Petugas')
           <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/petugas"> Petugas Dashboard</a></li>
              </ul>
            </li>
            <li><a class="nav-link" href="/admin/petugas/tunggakan"><i class="fas fa-money-check"></i> <span>Tunggakan</span></a></li>
            <li><a class="nav-link" href="/admin/petugas/pembayaran"><i class="fas fa-money-check"></i> <span>Entri Pembayaran</span></a></li>
            <li><a class="nav-link" href="/admin/petugas/histori"><i class="fas fa-money-check"></i> <span>Histori Pembayaran</span></a></li>
        @endif
        {{-- //ROUTER SISWA --}}
        @if (auth()->user()->role == 'Siswa')
         <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="/siswas"> Siswa Dashboard</a></li>
              </ul>
            </li>
             <li><a class="nav-link" href="/admin/siswas/histori"><i class="fas fa-file-invoice-dollar"></i> <span>histori</span></a></li>
            @endif
          {{-- <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
            <a class="btn btn-danger     btn-lg btn-block btn-icon-split"  href="/logout">
               <i class="fas fa-sign-out-alt"></i> Logout
            </a>
          </div> --}}
    </aside>
      </div>
    </div>
  </div>
  @yield('content')

  <!-- General JS Scripts -->
  <script src="{{asset('asset/dist/assets/modules/jquery.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/popper.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/tooltip.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/nicescroll/jquery.nicescroll.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/modules/moment.min.js')}}"></script>
  <script src="{{asset('asset/dist/assets/js/stisla.js')}}"></script>
  <!-- Template JS File -->
  <script src="{{asset('asset/dist/assets/js/scripts.js')}}"></script>
  <script src="{{asset('asset/dist/assets/js/custom.js')}}"></script>
</body>
</html>
