<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a style="text-decoration:none" class="nav-link" href="{{route('home')}}">
        <i class="mdi mdi-airplay menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item @if(url('home.tour')){
    {{Request::is('pengguna/*') ? 'active' : ''}}
  }@endif">
      <a style="text-decoration:none" class="nav-link" href="{{route('user')}}">
        <i class="mdi mdi-account menu-icon"></i>
        <span class="menu-title">Pengguna</span>
      </a>
    </li>
    <li class="nav-item @if(Request::is('pariwisata') || Request::is('pariwisata/*') || Request::is('pariwisata/tambah') || Request::is('pariwisata/edit/*')) active @endif">
      <a style="text-decoration:none" class="nav-link" href="{{route('tour')}}">
        <i class="mdi mdi-folder-multiple-image menu-icon"></i>
        <span class="menu-title">Pariwisata</span>
      </a>
    </li>
    <li class="nav-item">
      <a style="text-decoration:none" class="nav-link" href="{{route('comment')}}">
        <i class="mdi mdi-comment menu-icon"></i>
        <span class="menu-title">Komentar</span>
      </a>
    </li>
  </ul>
</nav>
