<!DOCTYPE html>
<html lang=en>
<!-- Mirrored from preview.webpixels.io/quick-website-ui-kit/pages/secondary/careers.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Feb 2020 12:38:03 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<!-- /Added by HTTrack -->

<head>
  <meta charset=utf-8>
  <meta name=viewport content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name=description
    content="Quick Website UI Kit is an innovative HTML template solution which combines beautiful design and flawless functionality.">
  <meta name=author content=Webpixels>
  <title>@yield('title')</title>
  <style>
    @keyframes hidePreloader {
      0% {
        width: 100%;
        height: 100%
      }

      100% {
        width: 0;
        height: 0
      }
    }

    body>div.preloader {
      position: fixed;
      background: #fff;
      width: 100%;
      height: 100%;
      z-index: 1071;
      opacity: 0;
      transition: opacity .5s ease;
      overflow: hidden;
      pointer-events: none;
      display: flex;
      align-items: center;
      justify-content: center
    }

    body:not(.loaded)>div.preloader {
      opacity: 1
    }

    body:not(.loaded) {
      overflow: hidden
    }

    body.loaded>div.preloader {
      animation: hidePreloader .5s linear .5s forwards
    }
  </style>
  <script>
    window.addEventListener("load", function() {
            setTimeout(function() {
                document.querySelector("body").classList.add("loaded")
            }, 300)
        })
  </script>
  <link rel=icon href={{ asset('img/brand/kk.png') }} type=image/png> <link rel=stylesheet
    href={{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css')}}>
  <link rel=stylesheet href={{ asset('css/quick-website.css')}} id=stylesheet>
  <link rel=stylesheet href={{ asset('libs/%40fortawesome/fontawesome-free/css/all.min.css')}}>
  @yield('style')
</head>

<body>
  <div class=preloader>
    <div class="spinner-border text-primary" role=status><span class=sr-only>Loading...</span></div>
  </div>

  @yield('content')

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
    feather.replace({
              width: "1em",
              height: "1em"
          })
  </script>

  @yield('script')
</body>
<!-- Mirrored from preview.webpixels.io/quick-website-ui-kit/pages/secondary/careers.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 24 Feb 2020 12:38:04 GMT -->

</html>