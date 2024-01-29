<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Cyber DefX</title>

  <link rel="stylesheet" href="../assets/css/maicons.css">

  <link rel="stylesheet" href="../assets/css/bootstrap.css">

  <link rel="stylesheet" href="../assets/vendor/owl-carousel/css/owl.carousel.css">

  <link rel="stylesheet" href="../assets/vendor/animate/animate.css">

  <link rel="stylesheet" href="../assets/css/theme.css">
</head>
<body>

  <!-- Back to top button -->
  <div class="back-to-top"></div>

  <header>
    <div class="topbar">
      <div class="container">
        <div class="row">
          <div class="col-sm-8 text-sm">
            <div class="site-info">
              <a href="#"><span class="mai-call text-primary"></span> +00 123 4455 6666</a>
              <span class="divider">|</span>
              <a href="#"><span class="mai-mail text-primary"></span> mail@example.com</a>
            </div>
          </div>
          <div class="col-sm-4 text-right text-sm">
            <div class="social-mini-button">
              <a href="#"><span class="mai-logo-facebook-f"></span></a>
              <a href="#"><span class="mai-logo-twitter"></span></a>
              <a href="#"><span class="mai-logo-dribbble"></span></a>
              <a href="#"><span class="mai-logo-instagram"></span></a>
            </div>
          </div>
        </div> <!-- .row -->
      </div> <!-- .container -->
    </div> <!-- .topbar -->

    <nav class="navbar navbar-expand-lg navbar-light shadow-sm">
      <div class="container">
        <a class="navbar-brand" href="#"><span class="text-primary">Cyber</span>DefX</a>

        <form action="#">
          <div class="input-group input-navbar">
            <div class="input-group-prepend">
              <span class="input-group-text" id="icon-addon1"><span class="mai-search"></span></span>
            </div>
            <input type="text" class="form-control" placeholder="Enter keyword.." aria-label="Username" aria-describedby="icon-addon1">
          </div>
        </form>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupport" aria-controls="navbarSupport" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupport">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.html"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html"></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('home') }}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('profile')}}"">PROFILE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.html">SUPPORT</a>
            </li>
          
            @if(Route::has('login'))
          
            @auth
            <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        JOB DASHBOARD
    </a>
    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="{{url('activebids')}}"">ACTIVE BIDS</a>
        <a class="dropdown-item" href="{{url('freelancerhiredjobs')}}">HIRED JOBS</a>
    </div>
</li>

            </li>
            <x-app-layout>
 
            </x-app-layout>

            @else
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('login')}}">Login </a>
            </li>
            <li class="nav-item">
              <a class="btn btn-primary ml-lg-3" href="{{route('register')}}">Register </a>
            </li>


            @endauth
            @endif
           
          </ul>
        </div> <!-- .navbar-collapse -->
      </div> <!-- .container -->
    </nav>
  </header>
  <div class="page-hero bg-image overlay-dark" style="background-image: url(https://freelancecounsellor.com/wp-content/uploads/2021/12/rear-view-programmer-working-all-night-long-1024x536-1.jpg);">
    <div class="hero-section">
      <div class="container text-center wow zoomIn">
        <span class="subhead">Find the best freelance jobs</span>
        <h1 class="display-4">Browse jobs posted on CyberDefX</h1>
        <a href="#" class="btn btn-primary">GET STARTED!</a>
      </div>
    </div>
  </div>

 <!-- .page-section 1-->
 < <div class="page-section pb-0">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-6 py-3 wow fadeInUp">
            <h1>CyberDefX: Your Cybersecurity Companion <br> Center</h1>
            <p class="text-grey mb-4">"CyberDefX is an advanced web application tool tailored for network architects, penetration testers, cybersecurity professionals, and more. Designed to assist in various areas including network security, data safety, forensics, and cryptography, CyberDefX is your comprehensive solution for navigating the complexities of cybersecurity."</p>
            <a href="{{ url('setupprofile') }}" class="btn btn-primary">Set up your profile & Get started</a>
          </div>
          <div class="col-lg-6 wow fadeInRight" data-wow-delay="400ms">
            <div class="img-place custom-img-1">
              <img src="https://static.vecteezy.com/system/resources/previews/004/578/793/original/man-working-with-computer-at-desk-free-vector.jpg" alt="">
            </div>
          </div>
        </div>
      </div>
    </div> <!-- .bg-light -->
  </div> 
<br>


<!-- page section 2-->
<div class="page-section bg-light">
  <div class="container">
 <div class="row mt-5">
        <div class="col-lg-4 py-2 wow zoomIn"><!-- section 2.1-->
          <div class="card-blog">
            <div class="header">
             
              <a href="{{ url('') }}" class="post-thumb">
                <img src="\assets\img\1.png" alt="">
              </a>
            </div>
            <div class="body">
            <h5 class="post-title"><a href="{{ url('viewjob') }}">Find the right work for you, with great clients, at the world’s work marketplace.</a></h5>
            
              <div class="site-info">
                <div class="avatar mr-2">
                
               
                </div>

              </div>
            </div>
          </div>
        </div>
     
        <div class="col-lg-4 py-2 wow zoomIn"><!-- section 2.2-->
          <div class="card-blog">
            <div class="header">
             
              <a href="{{ url('viewjob') }}" class="post-thumb">
                <img src="\assets\img\2.png" alt="">
              </a>
            </div>
            <div class="body">
            <h5 class="post-title"><a href="{{ url('') }}">Collabrate in challenges & Highlight to stand out among client</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                
               
                </div>

              </div>
            </div>
          </div>
        </div>
     
         <div class="col-lg-4 py-2 wow zoomIn"><!-- section 2.3-->
          <div class="card-blog">
            <div class="header">
             
              <a href="{{ url('') }}" class="post-thumb">
                <img src="\assets\img\3.png" alt="">
              </a>
            </div>
            <div class="body">
              <h5 class="post-title"><a href="{{ url('') }}">Sell your product & services-Match your projects to what clients need</a></h5>
              <div class="site-info">
                <div class="avatar mr-2">
                
               
                </div>

              </div>
            </div>
          </div>
        </div>
     
       </div>
    </div>
  </div>



























  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
           
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
         
          </ul>
        </div>
        
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">Colombo</p>
     
          <a href="#" class="footer-link">CyberDefX@temporary.net</a>

          <h5 class="mt-3">Social Media</h5>
          <div class="footer-sosmed mt-3">
            <a href="#" target="_blank"><span class="mai-logo-facebook-f"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-twitter"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-google-plus-g"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-instagram"></span></a>
            <a href="#" target="_blank"><span class="mai-logo-linkedin"></span></a>
          </div>
        </div>
      </div>

      <hr>

      <p id="copyright">Copyright &copy; 2023 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>
