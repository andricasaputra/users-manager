<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

@include('layouts/header')

@yield('styles')

<body id="body">

  @include('layouts/sidebar')

  <div class="main-content">

    @include('layouts/topbar')

    @yield('content')

  </div>

   @include('layouts/footer')

   @yield('scripts')
   
</body>

</html>