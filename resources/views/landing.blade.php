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
            <li><a href="#" class="active">Home</a><span>=</span></li>
            <li><a href="#">Features</a><span>=</span></li>
            <li><a href="#">Coach</a><span>=</span></li>
            <li><a href="#">Pricing</a><span>=</span></li>
            <li><a href="#">Contact</a></li>
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
  <section class="container">
    <section class="about-sec">
      <section class="about-text">
        <h3>About the coach</h3>
        <p>Lorem ipsum dolor sit amet, consectetur adipi convallis morbi
  Lorem ipsum dolor sit amet adipiscing eliturna. Lorem ipsum dolor sit do
   Lorem convallis adipi dolor sirt Lorem ipsum dolor sit amet,
  consectetur adipi convallis morbi Lorem ipsum dolor sit amet adipiscing
  eliturna. Lorem ipsum dolor sit do Lorem convallis adipi dolor sirt.</p>
        <div class="social-div"> <a href="https://facebook.com/" target="_blank" title="Facebook"><img src="landing_archivos/fb.jpg" alt=""></a> <a href="https://twitter.com/" target="_blank" title="Twitter"><img src="landing_archivos/twit.jpg" alt=""></a> <a href="https://linkedin.com/" target="_blank" title="Linkedin"><img src="landing_archivos/linkedin.jpg" alt=""></a> <a href="https://instagram.com/" target="_blank" title="Instagram"><img src="landing_archivos/insta.jpg" alt=""></a> </div>
      </section>
    </section>
  </section>
  <section class="appointment-sec">
    <section class="container">
      <div class="row">
        <div class="col-md-5">
          <h3>Make an Appointment</h3>
          <p>Start Making Your Body Healthy</p>
          <form name="appointmentform" method="post" action="" data-dashlane-rid="353a927a2b133814" data-form-type="contact">
            <div class="row">
              <div class="col-md-6">
                <input name="name" type="text" placeholder="Your Name" class="form-control" required="" data-dashlane-rid="dc37bf925e79ccb7" data-kwimpalastatus="alive" data-kwimpalaid="1631075490751-0" data-form-type="name">
              <span data-dashlanecreated="true" style="border-block: initial; border-inline: initial; border-start-start-radius: initial; border-start-end-radius: initial; border-end-start-radius: initial; border-end-end-radius: initial; overflow-inline: initial; overflow-block: initial; overscroll-behavior-inline: initial; overscroll-behavior-block: initial; margin-block: initial; margin-inline: initial; scroll-margin-block: initial; scroll-margin-inline: initial; padding-block: initial; padding-inline: initial; scroll-padding-block: initial; scroll-padding-inline: initial; inset-block: initial; inset-inline: initial; block-size: initial; min-block-size: initial; max-block-size: initial; inline-size: initial; min-inline-size: initial; max-inline-size: initial; background-color: initial; background-image: url(&quot;moz-extension://930ea6b3-0bfc-d644-abf3-297f290e55b4/content/injected/logo-autofill-unknown.svg&quot;); background-position: center center; background-repeat: no-repeat; background-attachment: initial; background-clip: initial; background-origin: initial; background-size: contain; background-blend-mode: initial; border: medium none; border-radius: initial; box-decoration-break: initial; -moz-float-edge: initial; display: inline; position: absolute; float: initial; clear: initial; vertical-align: initial; overflow: initial; overflow-anchor: initial; transition: initial; animation: initial; transform: initial; rotate: initial; scale: initial; translate: initial; offset: initial; scroll-behavior: initial; scroll-snap-align: initial; scroll-snap-type: initial; overscroll-behavior: initial; isolation: initial; break-after: initial; break-before: initial; break-inside: initial; resize: initial; perspective: initial; perspective-origin: initial; backface-visibility: initial; transform-box: initial; transform-style: initial; transform-origin: initial; contain: initial; appearance: initial; -moz-orient: initial; will-change: initial; shape-image-threshold: initial; shape-margin: initial; shape-outside: initial; touch-action: initial; -webkit-line-clamp: initial; columns: initial; column-fill: initial; column-rule: initial; column-span: initial; content: initial; counter-increment: initial; counter-reset: initial; counter-set: initial; opacity: 1; box-shadow: initial; clip: initial; filter: initial; mix-blend-mode: initial; font: initial; font-synthesis: initial; -moz-osx-font-smoothing: initial; visibility: visible; writing-mode: initial; text-orientation: initial; color-adjust: initial; image-rendering: initial; image-orientation: initial; dominant-baseline: initial; text-anchor: initial; color-interpolation: initial; color-interpolation-filters: initial; fill: initial; fill-opacity: initial; fill-rule: initial; shape-rendering: initial; stroke: initial; stroke-width: initial; stroke-linecap: initial; stroke-linejoin: initial; stroke-miterlimit: initial; stroke-opacity: initial; stroke-dasharray: initial; stroke-dashoffset: initial; clip-rule: initial; marker: initial; paint-order: initial; border-collapse: initial; empty-cells: initial; caption-side: initial; border-spacing: initial; color: initial; text-transform: initial; hyphens: initial; -moz-text-size-adjust: initial; text-indent: initial; overflow-wrap: initial; word-break: initial; text-justify: initial; text-align-last: initial; text-align: initial; letter-spacing: initial; word-spacing: initial; white-space: initial; text-shadow: initial; text-emphasis: initial; text-emphasis-position: initial; tab-size: initial; line-break: initial; -webkit-text-fill-color: initial; -webkit-text-stroke: initial; ruby-align: initial; ruby-position: initial; text-combine-upright: initial; text-rendering: initial; text-underline-offset: initial; text-underline-position: initial; text-decoration-skip-ink: initial; cursor: initial; pointer-events: initial; -moz-user-input: initial; -moz-user-modify: initial; -moz-user-focus: initial; caret-color: initial; scrollbar-color: initial; list-style: initial; quotes: initial; -moz-image-region: initial; margin: initial; scroll-margin: initial; outline: initial; outline-offset: initial; padding: initial; scroll-padding: initial; top: 14.5px; right: initial; bottom: initial; left: 204px; z-index: auto; flex-flow: initial; place-content: initial; place-items: initial; flex: initial; place-self: initial; order: initial; width: 16px; min-width: 16px; max-width: initial; height: 16px; min-height: initial; max-height: initial; box-sizing: initial; object-fit: initial; object-position: initial; grid-area: initial; grid: initial; gap: initial; aspect-ratio: initial; vector-effect: initial; stop-color: initial; stop-opacity: initial; flood-color: initial; flood-opacity: initial; lighting-color: initial; mask-type: initial; clip-path: initial; mask: initial; x: initial; y: initial; cx: initial; cy: initial; rx: initial; ry: initial; r: initial; table-layout: initial; text-overflow: initial; text-decoration: initial; ime-mode: initial; scrollbar-width: initial; user-select: initial; -moz-window-dragging: initial; -moz-force-broken-image-icon: initial; -moz-box-align: initial; -moz-box-direction: initial; -moz-box-flex: initial; -moz-box-orient: initial; -moz-box-pack: initial; -moz-box-ordinal-group: initial;"></span></div>
              <div class="col-md-6">
                <input name="phone" type="tel" placeholder="Contact No." class="form-control" required="" data-dashlane-rid="f568411c3a7cf5d3" data-form-type="other">
              </div>
            </div>
            <select name="service" class="form-control" data-dashlane-rid="c287eef21642d575" data-form-type="other">
              <option value="" selected="selected">What services your are interested in?</option>
              <option value="Lorem 1">Lorem 1</option>
              <option value="Lorem 2">Lorem 2</option>
              <option value="Lorem 3">Lorem 3</option>
              <option value="Lorem 4">Lorem 4</option>
            </select>
            <textarea name="comments" class="form-control" placeholder="Write your mesage here.." rows="" cols="" data-dashlane-rid="d16721f54d4125c3" data-form-type="other"></textarea>
            <input name="submit" type="submit" value="Make An Appointment" data-dashlane-rid="0d1c8072dff8a8a2" data-form-type="action">
          </form>
        </div>
        <div class="col-md-7"><a href="" data-toggle="modal" data-src="" data-target="#myModal" title="Watch Video"><img src="landing_archivos/video.jpg" alt=""></a></div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="landing_archivos/ZeStnz5c2GI.html" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen="" frameborder="0"></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
  <section class="testimonial-sec">
    <section class="container">
      <section class="slider-sec">
        <div class="autoplay slick-initialized slick-slider">
          <div class="slick-list draggable" tabindex="0"><div class="slick-track" style="opacity: 1; width: 4995px; transform: translate3d(-1998px, 0px, 0px);"><div class="slick-slide slick-cloned" style="width: 999px;">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit,
  sed do eiusmod tempor Lorem ipsum “Lorem ipsum dolor sit amet,
  consectetur adipiscing elit, sed do eiusmod sit amet, consectetur et
  dolore magna aliqua. magna aliqua...”</p>
            <p><strong>Jackson Jakky</strong> <span>England Entrepreneur</span></p>
          </div><div class="slick-slide" style="width: 999px;">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit,
  sed do eiusmod tempor Lorem ipsum “Lorem ipsum dolor sit amet,
  consectetur adipiscing elit, sed do eiusmod sit amet, consectetur et
  dolore magna aliqua. magna aliqua...”</p>
            <p><strong>Jackson Jakky</strong> <span>England Entrepreneur</span></p>
          </div><div class="slick-slide slick-active" style="width: 999px;">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit,
  sed do eiusmod tempor Lorem ipsum “Lorem ipsum dolor sit amet,
  consectetur adipiscing elit, sed do eiusmod sit amet, consectetur et
  dolore magna aliqua. magna aliqua...”</p>
            <p><strong>Jackson Jakky</strong> <span>England Entrepreneur</span></p>
          </div><div class="slick-slide" style="width: 999px;">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit,
  sed do eiusmod tempor Lorem ipsum “Lorem ipsum dolor sit amet,
  consectetur adipiscing elit, sed do eiusmod sit amet, consectetur et
  dolore magna aliqua. magna aliqua...”</p>
            <p><strong>Jackson Jakky</strong> <span>England Entrepreneur</span></p>
          </div><div class="slick-slide slick-cloned" style="width: 999px;">
            <p>“Lorem ipsum dolor sit amet, consectetur adipiscing elit,
  sed do eiusmod tempor Lorem ipsum “Lorem ipsum dolor sit amet,
  consectetur adipiscing elit, sed do eiusmod sit amet, consectetur et
  dolore magna aliqua. magna aliqua...”</p>
            <p><strong>Jackson Jakky</strong> <span>England Entrepreneur</span></p>
          </div></div></div>


        <button type="button" class="slick-prev" tabindex="-1" style="display: inline-block;">Previous</button><button type="button" class="slick-next" tabindex="-1" style="display: inline-block;">Next</button><ul class="slick-dots" style="display: block;"><li class=""><a href="javascript:void(0)" tabindex="-1">0</a></li><li class="slick-active"><a href="javascript:void(0)" tabindex="-1">1</a></li><li class=""><a href="javascript:void(0)" tabindex="-1">2</a></li></ul></div>
      </section>
    </section>
  </section>
  <section class="package-sec">
    <section class="container">
      <h3>choose the best package</h3>
      <h6>Start Making Your Body Healthy</h6>
      <div class="row">
        <div class="col-md-4">
          <div class="package-div">
            <h4>Starter Plan <span>$ 40</span></h4>
            <a href="#" class="signup">Signup</a>
            <ul>
              <li>Unlimited Access to gym</li>
              <li>1 Classes per week</li>
              <li>One Year memberships</li>
              <li>FREE water</li>
              <li>1 Free personal trainer</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="package-div">
            <h4>Advanced Plan <span>$ 40</span></h4>
            <a href="#" class="signup">Signup</a>
            <ul>
              <li>Unlimited Access to gym</li>
              <li>1 Classes per week</li>
              <li>One Year memberships</li>
              <li>FREE water</li>
              <li>1 Free personal trainer</li>
            </ul>
          </div>
        </div>
        <div class="col-md-4">
          <div class="package-div">
            <h4>Pro Plan <span>$ 40</span></h4>
            <a href="#" class="signup">Signup</a>
            <ul>
              <li>Unlimited Access to gym</li>
              <li>1 Classes per week</li>
              <li>One Year memberships</li>
              <li>FREE water</li>
              <li>1 Free personal trainer</li>
            </ul>
          </div>
        </div>
      </div>
      <section class="contact-sec">
      	<div class="row">
          	<div class="col-md-4 m-0 p-0">
              	<div class="contact-div">
                  	<strong>Visit Us</strong> 245 Manila Street 24683<br>New York, NY
                  </div>
              </div>
              <div class="col-md-4 m-0 p-0">
              	<div class="contact-div">
                  	<strong>Call Us</strong> <a href="tel:0800 1234 5869">0800 1234 5869</a>
                  </div>
              </div>
              <div class="col-md-4 m-0 p-0">
              	<div class="contact-div border-right-none">
                  	<strong>Mail Us</strong> <a href="#">info@yoursite.com</a>
                  </div>
              </div>
          </div>
      </section>
    </section>
  </section>
  <footer>
  	<section class="container">
      	<div class="footerlinks"><a href="https://bootstraptemplates.co/demos/Gym%20Landing%20Page/index.html" class="active">Home</a> = <a href="#">Features</a> = <a href="#">Coach</a> = <a href="#">Pricing</a> = <a href="#">Contact</a> = <a href="#">Gym Features</a></div>
          <div class="copyright-sec">(C) 2020. All Rights Reserved.</div>
          <div class="social-div1"><a href="https://facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook-official" aria-hidden="true"></i></a> <a href="https://twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter-square" aria-hidden="true"></i></a>  <a href="https://linkedin.com/" target="_blank" title="Linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a> <a href="https://pinterest.com/" target="_blank" title="Pinterest"><i class="fa fa-pinterest" aria-hidden="true"></i></a> <a href="https://instagram.com/" target="_blank" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></div>
      </section>
  </footer>


</body></html>