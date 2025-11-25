 <div class="col-md-2 sidebar">
     <img src="{{ asset('assets/foto/logo.png') }}" class="sidebar-logo" alt="Sidebar Image">
     <div class="main-menu-content">
         <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
             <li class="{{ in_array(\Request::route()->getName(), ['home', 'add', 'edit']) ? 'active' : '' }} nav-item">
                 <a href="{{ route('admin.home') }}">
                     <i class="fa fa-user"></i>
                     <span class="menu-title">Mahasiswa</span>
                 </a>
             </li>

             <li class="{{ in_array(\Request::route()->getName(), ['jurusan']) ? 'active' : '' }} nav-item">
                 <a href="{{ route('admin.jurusan') }}">
                     <i class="fa fa-book"></i>
                     <span class="menu-title">Jurusan</span>
                 </a>
             </li>
             <li class="{{ in_array(\Request::route()->getName(), ['kelas']) ? 'active' : '' }} nav-item">
                 <a href="{{ route('admin.kelas') }}">
                     <i class="fa fa-chalkboard"></i>
                     <span class="menu-title">Kelas</span>
                 </a>
             </li>
         </ul>
     </div>
     <img src="{{ asset('assets/foto/mahasiswa.png') }}" class="sidebar-image mt-auto" alt="Sidebar Image">
 </div>
