@include('header')
@include('menu')

<main id="main" class="main">
    @yield('content')
</main>

@if (request()->getPathInfo() != '/')
    @include('footer')
@endif