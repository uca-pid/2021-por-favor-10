<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Hércules</title>
<link rel="icon" type="image/png" href="https://bootstraptemplates.co/demos/Gym%20Landing%20Page/favicon.png">
<link href="css/landing/font-awesome.css" rel="stylesheet">
{{-- <link href="landing_archivos/bootstrap.css" rel="stylesheet"> --}}
<link href="landing/css/style.css" rel="stylesheet">
<link href="landing/css/responsive.css" rel="stylesheet">
<link href="landing/css/css2.css" rel="stylesheet">

<!-- Styles -->
<!-- CSS only -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="{{ asset('css/app.css') }}">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
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
// document ready  
});
</script>
</head>
<body id="top">
  <p id="back-to-top"><a href="#top"><span></span><img src="landing/images/arrow.png" alt="Back to Top" title="Back to Top"></a></p>
  <header>
    <nav class="navbar navigation navbar-expand-md">
      <div class="container">
        <div class="logo-sec"><a href="#" class="navbar-brand" title="MaxGymm">Max<span>Gymm</span></a></div>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse"> <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span> </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li><a href="{{ route('landing') }}" class="active">Home</a><span>=</span></li>
            <li><a href="{{ route('login') }}">Inicia Sesión</a><span>=</span></li>
            <li><a href="{{ route('register') }}">Regístrate</a><span>=</span></li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
  <section class="banner-sec"> <img src="landing/images/banner.jpg" alt="">
    <div class="banner-text">
      <h2>Get <span>Fit</span> Yourself, Always Wanted!</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipi scing elit, sed do
  ipsum dolor sit amet adipiscing eliturna. Lorem convallis morbi.</p>
      <a href="#" class="getstartbtn">Get Started</a> </div>
  </section>
  <section class="start-sec">
    <section class="container">
      <h3>Start today for tomorrows health &amp; fitness</h3>
      <h6>Lorem ipsum dolor sit amet, consectetur adipi scing elit, sed do
   ipsum dolor sit amet adipiscing eliturna. Lorem convallis morbi Lorem
  ipsum dolor sit amet adipiscing eliturna.</h6>
      <div class="row">
        <div class="col-md-6">
          <div class="image-div">
            <div class="row">
              <div class="col-md-8">
                <h4>Health and Wellness</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipi scing
  elit, sed do Lorem convallis morbi Lorem ipsum dolor sit amet adipiscing
   eliturna.</p>
              </div>
              <div class="col-md-4 textcenter"><img src="landing/images/image1.jpg" alt=""></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="image-div">
            <div class="row">
              <div class="col-md-8">
                <h4>Physical &amp; Mental Fitness</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipi scing
  elit, sed do Lorem convallis morbi Lorem ipsum dolor sit amet adipiscing
   eliturna.</p>
              </div>
              <div class="col-md-4 textcenter"><img src="landing/images/image2.jpg" alt=""></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="image-div">
            <div class="row">
              <div class="col-md-4 web-show"><img src="landing/images/image3.jpg" alt=""></div>
              <div class="col-md-8">
                <h4>Health and Wellness</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipi scing
  elit, sed do Lorem convallis morbi Lorem ipsum dolor sit amet adipiscing
   eliturna.</p>
              </div>
              <div class="col-md-4 disp-none"><img src="landing_archivos/image3.jpg" alt=""></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="image-div">
            <div class="row">
              <div class="col-md-4 web-show"><img src="landing/images/image4.jpg" alt=""></div>
              <div class="col-md-8">
                <h4>Health and Wellness</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipi scing
  elit, sed do Lorem convallis morbi Lorem ipsum dolor sit amet adipiscing
   eliturna.</p>
              </div>
               <div class="col-md-4 disp-none"><img src="landing/images/image4.jpg" alt=""></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
  <section class="black-sec">
    <section class="container-fluid">
      <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-5">
          <div class="black-sec-text">
            <h3>The best place for</h3>
            <h4>all workouts</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipi scing elit,
  sed do. Lorem convallis morbi Lorem ipsum dolor sit amet adipiscing
  eliturna. Lorem ipsum dolor sit consectetur scing, sed do.</p>
          </div>
        </div>
        <div class="col-md-6"><img src="landing/images/image5.jpg" alt=""></div>
      </div>
    </section>
  </section>
  <section class="team-sec">
    <section class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="team-div"> <img src="landing/images/team1.jpg" alt="">
            <div class="team-text">
              <h4>Quality Equipment</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipi convallis
  morbi Lorem ipsum dolor sit amet adipiscing eliturna. Lorem ipsum dolor
  sit do Lorem convallis adipi dolor sirt.</p>
            </div>
            <div class="arrow-div"><a href="#"><img src="landing_archivos/arrow.jpg" alt=""></a></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="team-div"> <img src="landing/images/team2.jpg" alt="">
            <div class="team-text">
              <h4>Healthy Nutrition</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipi convallis
  morbi Lorem ipsum dolor sit amet adipiscing eliturna. Lorem ipsum dolor
  sit do Lorem convallis adipi dolor sirt.</p>
            </div>
            <div class="arrow-div"><a href="#"><img src="landing_archivos/arrow.jpg" alt=""></a></div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="team-div"> <img src="landing/images/team3.jpg" alt="">
            <div class="team-text">
              <h4>High Profile Trainers</h4>
              <p>Lorem ipsum dolor sit amet, consectetur adipi convallis
  morbi Lorem ipsum dolor sit amet adipiscing eliturna. Lorem ipsum dolor
  sit do Lorem convallis adipi dolor sirt.</p>
            </div>
            <div class="arrow-div"><a href="#"><img src="landing_archivos/arrow.jpg" alt=""></a></div>
          </div>
        </div>
      </div>
    </section>
  </section>

  <footer>
  	<section class="container">
          <div class="copyright-sec">(C) 2021. All Rights Reserved.</div>
      </section>
  </footer>


</body></html>