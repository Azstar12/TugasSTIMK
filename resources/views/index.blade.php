<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Mahasiswa</title>
    

    @include('layout.header')

</head>

<body>

    <div class="container-fluid">
        <div class="row">
           @include('layout.sidebar')
            <div class="col-md-10 pt-3">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <div class="profile">
            <span>Mohamad Azis Sarifudin</span>
            <img src="{{ asset('assets/foto/profil.png') }}" alt="Profile Picture">
        </div>
        <a href="/logout" class="btn btn-outline-danger btn-sm"
           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <form id="logout-form" action="/logout" method="POST" class="d-none">
            @csrf
        </form>
    </div>

    <div class="header">
        <marquee>Belajar Membuat Website Pemula</marquee>
    </div>

    @yield('content')
</div>
        </div>
    </div>


    <img src="{{ asset('assets/foto/latar.png') }}" class="background-image" alt="Background Image">

    @include('layout.footer')

</body>

</html>
