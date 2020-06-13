<!DOCTYPE html>
<html lang=id>

<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta charset=utf-8>
  <meta name=viewport content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name=author content=katri.id>

  <title>@yield('title')</title>

  <link rel=icon href={{ asset('img/brand/favicon1.png')}} type="image/png">
  <link rel=stylesheet href={{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css')}}>
  <link rel=stylesheet href={{ asset('css/quick-website.css')}} id=stylesheet>
  <link rel=stylesheet href={{ asset('libs/%40fortawesome/fontawesome-free/css/all.min.css')}}>
  <link rel=stylesheet href={{ asset('libs/datatables/datatables.css')}}>
  @yield('style')
</head>

<body>
  <div class="container-fluid">
    <p class="">Tanggal cetak : {{ now()->format('d/M/Y') }}</p>

    @yield('content')

  </div>


  <script src={{ asset('libs/jquery/dist/jquery.min.js')}}> </script>
  <script src={{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}> </script>
  <script src={{ asset('libs/svg-injector/dist/svg-injector.min.js')}}> </script>
  <script src={{ asset('libs/feather-icons/dist/feather.min.js')}}> </script>
  <script src={{ asset('libs/in-view/dist/in-view.min.js')}}> </script>
  <script src={{ asset('libs/sticky-kit/dist/sticky-kit.min.js')}}> </script>
  <script src={{ asset('libs/imagesloaded/imagesloaded.pkgd.min.js')}}> </script>
  <script src={{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js')}}> </script>
  <script src={{ asset('js/quick-website.js')}}> </script>
  <script>
    $(document).ready(function() {
      window.print()
    })
  </script>
  @yield('script')
</body>

</html>