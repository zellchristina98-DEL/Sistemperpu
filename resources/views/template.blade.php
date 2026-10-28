@include('header')

<div class="wrapper-utama">
    <!-- Memanggil file menu sidebar -->
    @include('menu')

    <!-- Konten Utama di Kanan -->
    <div class="konten-kanan">
        <div class="card-tampilan">
            @yield('content')
        </div>
    </div>
</div>

@include('footer')