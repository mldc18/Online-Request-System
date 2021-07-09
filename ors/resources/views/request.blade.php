<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
  <title>Request Form</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <link href="{{asset('css/business-casual.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/business-casual.css')}}" rel="stylesheet">
  
</head>

<style>
  * {
    box-sizing: border-box;
  }
  
  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }
  
  .submit-req {
    background-color: rgba(47,23,15,.9);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }
  
  .submit-req:hover {
    background-color: burlywood;
  }
  
  .containeer {
    border-radius: 5px;
    background-color: #f2f2f2;
    width: 750px;

    /* padding: 60px 300px; */
  }

  form{
    /* width: 500px; */
  }
  
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }
  
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
  </style>

<body>

  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Online Request System</span>
    <span class="site-heading-lower">Request Form</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="index.html"><img src="img/logo homee.png" class="site_logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/listofrequest">List of Request</a>
          </li>
          <li class="nav-item active px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/request">Request Form</a>
          </li>
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/faqs">FAQS</a>
          </li>
          <li class="nav-item px-lg-4 {{ request()->is('login') ? 'active' : '' }}">
            <a class="nav-link text-uppercase text-expanded" href="/login">Login</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <body>
    
    <center>
      <div class="alert alert-danger w-50 mt-3 sent-success" style="display:none" role="alert">
        Please login to your Account!
      </div>
      <div class="containeer mb-5 mt-3 py-4">
        <div class="px-5">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="fname">First Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Last Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="country">Campus</label>
              </div>
              <div class="col-75">
                <select id="country" name="country">
                  <option value="australia">Quezon City</option>
                  <option value="canada">Manila</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="subject">Subject</label>
              </div>
              <div class="col-75">
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
              </div>
            </div>
            <div class="row mt-2">
              <input class="submit-req m-0 m-auto" type="button" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </center>

    
  </body>
  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; ORS 2021</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script>
    $('.submit-req').on('click', function(){
      $('.sent-success').show();
      setTimeout(function() { $('.sent-success').hide(); }, 4000);
      
    });
  </script>
</body>

</html>
