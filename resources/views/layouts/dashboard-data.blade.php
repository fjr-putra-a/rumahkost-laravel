<!DOCTYPE html>
<html lang=id>

<head>
  <meta http-equiv="content-type" content="text/html;charset=utf-8" />
  <meta charset=utf-8>
  <meta name=viewport content="width=device-width,initial-scale=1,shrink-to-fit=no">
  <meta name=author content=katri.id>

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

  <link rel=icon href={{ asset('img/brand/favicon1.png') }} type=image/png> <link rel=stylesheet
    href={{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.css')}}>
  <link rel=stylesheet href={{ asset('css/quick-website.css')}} id=stylesheet>
  <link rel=stylesheet href={{ asset('css/style.css')}} id=stylesheet>
  <link rel=stylesheet href={{ asset('libs/%40fortawesome/fontawesome-free/css/all.min.css')}}>
  <link rel=stylesheet href={{ asset('libs/datatables/datatables.css')}}>
  @yield('style')
</head>

<body class="bg-section-secondary">
  <div class=preloader>
    <div class="spinner-border text-primary" role=status><span class=sr-only>Loading...</span></div>
  </div>

  @include('templates.header-dashboard')

  @if(Request::is('*profile') || Request::is('*pengaturan*'))
  @yield('content')
  @else
  <div class="slice slice-sm bg-section-secondary">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12">
          <div class="row align-items-center mb-4">
            <div class="col">
              <div class="d-flex align-items-center mb-2">
                <div class="d-flex">
                  <div class="pr-3"><span class="h5 mb-0"><i data-feather="@yield('icon')"></i></span></div>
                  <div class="">
                    <h3 class="h5 mb-0">@yield('heading')</h3>
                    <p class="text-muted mb-0">@yield('deskripsi')</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-auto">
              <div class="dropdown">
                @yield('button')
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <div class="col-lg-12">
              <div class="mb-5">
                @yield('content')
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  @endif

  <script src={{ asset('libs/jquery/dist/jquery.min.js')}}> </script>
  <script src={{ asset('libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}> </script>
  <script src={{ asset('libs/svg-injector/dist/svg-injector.min.js')}}> </script>
  <script src={{ asset('libs/feather-icons/dist/feather.min.js')}}> </script>
  <script src={{ asset('libs/in-view/dist/in-view.min.js')}}> </script>
  <script src={{ asset('libs/sticky-kit/dist/sticky-kit.min.js')}}> </script>
  <script src={{ asset('libs/imagesloaded/imagesloaded.pkgd.min.js')}}> </script>
  <script src={{ asset('libs/%40fancyapps/fancybox/dist/jquery.fancybox.min.js')}}> </script>
  <script src={{ asset('js/quick-website.js')}}> </script>
  <script src={{ asset('js/script.js')}}> </script>
  <script>
    feather.replace({
              width: "1em",
              height: "1em"
          })
  </script>
  <script src={{ asset('libs/datatables/datatables.js')}}> </script>
  <script>
    $(document).ready(function() {
        $("#datatables").DataTable();
      })
  </script>
  @yield('script')
</body>

</html>