<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta name="copyright" content="MACode ID, https://macodeid.com/">

  <title>Cyber DefX</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
              <a class="nav-link" href="{{url('home')}}">HOME</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('employerprofile')}}">PROFILE</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{url('')}}">SUPPORT</a>
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

  </div>


 
  <div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h1 class="mb-0">Profile</h1>
            
        </div>
        <div class="card-body">
            
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="{{ asset('storage/' . $employer->profile_pic) }}" alt="Profile Picture" class="img-fluid rounded-circle">
                    </div>
                    <div class="col-md-8">
                        <h1>{{ $employer->name }}</h1>
                        <br>
                        <p class="mb-1"><strong>Company Name:</strong> {{ $employer->company_name }}</p>
                    <p class="mb-1"><strong>Country:</strong> {{ $employer->country }}</p>
                    <p class="mb-1"><strong>Years in Industry:</strong> {{ $employer->years_in_industry }}</p>
                    <p class="mb-1"><strong>About:</strong> {{ $employer->about }}</p>
                    <p class="mb-1"><strong>Number of Freelancers Collaborated:</strong> {{ $employer->freelancers_collaborated }}</p>
                    
                 
                </div>
           
        </div>
    </div>
</div>
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h1 class="mb-0">Ratings and Review</h1>
            
        </div>
        <div class="card-body">
       
 @foreach ($reviewsemployer as $reviewemployer)
        <div class="card mb-3">
     
            <div class="card-body">
            <h5 class="card-title">{{ $reviewemployer->freelancer_name }}:{{ $reviewemployer->comment }}</h5>  
            <h5 class="card-title">Rating: {{ $reviewemployer->rating }}/10</h5>
            
            </div>
        </div>
    @endforeach
</div>
</div>
</div>
<br>
<br>
</div>

  


    

  <footer class="page-footer">
    <div class="container">
      <div class="row px-md-3">
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Company</h5>
          <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Career</a></li>
            <li><a href="#">Editorial Team</a></li>
            <li><a href="#">Protection</a></li>
          </ul>
        </div>
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>More</h5>
          <ul class="footer-menu">
            <li><a href="#">Terms & Condition</a></li>
            <li><a href="#">Privacy</a></li>
            <li><a href="#">Advertise</a></li>
         
          </ul>
        </div>
        
        <div class="col-sm-6 col-lg-3 py-3">
          <h5>Contact</h5>
          <p class="footer-link mt-2">351 Willow Street Franklin, MA 02038</p>
          <a href="#" class="footer-link">701-573-7582</a>
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

      <p id="copyright">Copyright &copy; 2020 <a href="https://macodeid.com/" target="_blank">MACode ID</a>. All right reserved</p>
    </div>
  </footer>

<script src="../assets/js/jquery-3.5.1.min.js"></script>

<script src="../assets/js/bootstrap.bundle.min.js"></script>

<script src="../assets/vendor/owl-carousel/js/owl.carousel.min.js"></script>

<script src="../assets/vendor/wow/wow.min.js"></script>

<script src="../assets/js/theme.js"></script>
  
</body>
</html>