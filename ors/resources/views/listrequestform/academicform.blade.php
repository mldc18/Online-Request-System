<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
  <title>Request Form</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

  <link href="{{asset('css/business-casual.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/business-casual.css')}}" rel="stylesheet">
  <link href="{{asset('css/home.css')}}" rel="stylesheet">
  
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
  
  input[type=submit] {
    background-color: red;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }
  
  input[type=submit]:hover {
    background-color: #2c2c2c;
  }
  
  .containeer {
    border-radius: 5px;
    background-color: #dcdcdc;
    padding: 20px;
    width: 750px;
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

  hr.new4 {
  border: 1px solid red;
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
          <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/faqs">FAQS</a>
          </li>
          {{-- <li class="nav-item px-lg-4">
            <a class="nav-link text-uppercase text-expanded" href="/login">Login</a>
          </li> --}}
        </ul>
      </div>
    </div>
  </nav>

  <body>
      <center>
        <div class="containeer mb-5 mt-3 py-4 text-left">
            <div class="px-4">
                <form action="/action_page.php">
                    <div class="row">
                      <div class="col-25">
                        <label for="fname">Photocopy of last semester's GWA</label>
                      </div>
                      <div class="col-75">
                        <label for="file"></label>
                        <input type="file" id="file" name="file" multiple>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="lname">Registration Form</label>
                      </div>
                      <div class="col-75">
                        <label for="file"></label>
                        <input type="file" id="file" name="file" multiple>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="country">TIP</label>
                      </div>
                      <div class="col-75">
                        <select id="country" name="country">
                          <option value="australia">Manila</option>
                          <option value="canada">Quezon City</option>
                          <option value="usa">P. Casal</option>
                        </select>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-25">
                        <label for="subject">2x2 ID Picture (2pcs)</label>
                      </div>
                      <div class="col-75">
                        <label for="file"></label>
                        <input type="file" id="file" name="file" multiple>
                      </div>
                    </div>
            
                    <hr class="new4">
                    
                    <div class="row">
                      <input type="submit" value="Submit">
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
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
