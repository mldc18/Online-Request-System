@extends('layouts.app')

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>FAQS</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap core CSS -->
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{asset('css/business-casual.min.css')}}" rel="stylesheet">
  <link href="{{asset('css/business-casual.css')}}" rel="stylesheet">
  <link href="{{asset('css/home.css')}}" rel="stylesheet">
  <link href="{{asset('css/faqs.css')}}" rel="stylesheet">

  </head>

  <body>

    <h1 class="site-heading text-center text-white d-none d-lg-block">
      <span class="site-heading-upper text-primary mb-3">Online Request System</span>
      <span class="site-heading-lower">FAQS</span>
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
              <a class="nav-link text-uppercase text-expanded" href="/">FAQS</a>
            </li>
            <li class="nav-item px-lg-4 {{ request()->is('login') ? 'active' : '' }}">
              <a class="nav-link text-uppercase text-expanded" href="/login">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <section class="pagee-section cta">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{asset('image/faqs.jpg')}}" alt="">
        <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Frequently Asked Questions</span>
              </h2>
              <table>
                <tr>
                  <th>Q:</th>
                  <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                </tr>
                <tr>
                  <th class="ans">A:</th>
                  <td class="ans">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                </tr>
              </table>

              <hr class="new4">

              <table>
                <tr>
                  <th>Q:</th>
                  <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                </tr>
                <tr>
                  <th class="ans">A:</th>
                  <td class="ans">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                </tr>
              </table>

              <hr class="new4">

              <table>
                <tr>
                  <th>Q:</th>
                  <td>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                </tr>
                <tr>
                  <th class="ans">A:</th>
                  <td class="ans">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. </td>
                </tr>
              </table>
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>

   
@endsection
