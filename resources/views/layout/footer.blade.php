<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (session('success'))
<script>
    // Menampilkan SweetAlert dengan pesan sukses
    Swal.fire({
        title: 'Sukses!',
        icon: 'success',
        text: '{{ session('success') }}',
    });
</script>
@endif
@if ($errors->any())
<script>
    Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Terjadi kesalahan. Silakan periksa formulir Anda!',
        html: '<ul>' +
            @foreach ($errors->all() as $error)
                '<li>{{ $error }}</li>' +
            @endforeach
        '</ul>',
    });
</script>
@endif
