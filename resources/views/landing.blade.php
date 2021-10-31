<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hércules</title>
<link rel="icon" type="image/png" href="https://bootstraptemplates.co/demos/Gym%20Landing%20Page/favicon.png">
<link href="css/landing/font-awesome.css" rel="stylesheet">
<link href="landing/css/style.css" rel="stylesheet">
<link href="landing/css/responsive.css" rel="stylesheet">
<link href="landing/css/css2.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">
<script>
   document.createElement('header');
   document.createElement('section');
   document.createElement('article');
   document.createElement('aside');
   document.createElement('nav');
   document.createElement('footer');
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script type="text/javascript" src="landing/js/slick.js"></script>
<script type="text/javascript" src="landing/js/scripts.js"></script>
<script src="landing/js/bookmarkscroll.js"></script>

<script>
  $(document).ready(function() {
      // Gets the video src from the data-src on each button
      var $videoSrc;
      $('.video-btn').click(function() {
          $videoSrc = $(this).data( "src" );
      });
      console.log($videoSrc);
      // when the modal is opened autoplay it
      $('#myModal').on('shown.bs.modal', function (e) {
      // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
      $("#video").attr('src',$videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0" );
      })
      // stop playing the youtube video when I close the modal
      $('#myModal').on('hide.bs.modal', function (e) {
          // a poor man's stop video
          $("#video").attr('src',$videoSrc);
      })
  });
</script>
</head>

<body id="top">
  <p id="back-to-top"><a href="#top"><span></span><img src="landing/images/arrow.png" alt="Back to Top" title="Back to Top"></a></p>
  <header>
    <nav class="navbar navigation navbar-expand-md">
      <div class="container">
        <img src="{{ asset('media/logos/Hércules Logo.png') }}" style="height: 10rem;">
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            @auth
              <li><a href="{{ route('home') }}" class="active">Inicio</a><span>=</span></li>
              <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" class="active">Salir</a><span>=</span></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
              </form>
            @endauth
            @guest
              <li><a href="{{ route('login') }}">Inicia Sesión</a><span>=</span></li>
              <li><a href="{{ route('register') }}">Regístrate</a><span>=</span></li>
            @endguest
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="banner-sec"> <img src="landing/images/banner.jpg" alt="">
    <div class="banner-text">
      <h2>Mantente <span>en forma</span> con los servicios de Hércules!</h2>
      <p>Ofrecemos las clases más completeas y dinámicas brindadas por profesores especializados en todas las áreas. Nuestros equipos son de primera calidad y tenemos protocolos adaptados para COVID-19.</p>
      <a href="{{ route('register') }}" class="getstartbtn">¿Qué esperás para conocernos?</a> </div>
  </section>

  <footer>
  	<section class="container">
          <div class="copyright-sec">(C) 2021. All Rights Reserved.</div>
      </section>
  </footer>


</body></html>