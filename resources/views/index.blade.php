<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Siswa</title>

    @include('layout.header')

</head>

<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 sidebar">
                <img src="{{ asset('assets/foto/logo.png') }}" class="sidebar-logo" alt="Sidebar Image">
                <div class="main-menu-content">
                    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                        <li class="{{ in_array(\Request::route()->getName(), ['home', 'add', 'edit']) ? 'active' : '' }} nav-item">
                            <a href="{{ route('home') }}">
                                <i class="fa fa-user"></i>
                                <span class="menu-title">Siswa</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <img src="{{ asset('assets/foto/mahasiswa.png') }}" class="sidebar-image mt-auto" alt="Sidebar Image">
            </div>
            <div class="col-md-10 pt-3">
                <div class="profile">
                    <span>Mohamad Azis Sarifudin</span>
                    <img src="{{ asset('assets/foto/profil.png') }}" alt="Profile Picture">
                </div>
                <div class="header">
                    <marquee>Kursus Web Developer STIMK BANDUNG</marquee>
                </div>

                @yield('content')
            </div>
        </div>
    </div>

    
    <img src="{{ asset('assets/foto/latar.png') }}" class="background-image" alt="Background Image">

    @include('layout.footer')

</body>

</html>