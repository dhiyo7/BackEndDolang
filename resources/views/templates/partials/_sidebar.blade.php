<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a style="text-decoration:none" class="nav-link" href="{{route('home')}}">
        <i class="mdi mdi-airplay menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a style="text-decoration:none" class="nav-link" href="">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Pengguna</span>
      </a>
    </li>
    <li class="nav-item @if(url('home.tour')){
    {{Request::is('pariwisata/tambah') ? 'active' : ''}}
  }@endif

  @if(url('home.tour')){
    {{Request::is('pariwisata/edit/*') ? 'active' : ''}}
  }@endif
  @if(url('home.tour')){
    {{Request::is('pariwisata/detail/*') ? 'active' : ''}}
  }@endif
  ">
      <a style="text-decoration:none" class="nav-link" href="{{route('tour')}}">
        <i class="mdi mdi-folder-multiple-image menu-icon"></i>
        <span class="menu-title">Pariwisata</span>
      </a>
    </li>
  </ul>
</nav>
