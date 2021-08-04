<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="author" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
  <title>Online Request System</title>
  <link rel="icon" href="favicon.ico" type="image/x-icon">

  <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Raleway:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css">

  <link href="/css/business-casual.min.css" rel="stylesheet">
  <link href="/css/business-casual.css" rel="stylesheet">
  <link href="/css/home.css" rel="stylesheet">
  <link href="/css/profile.css" rel="stylesheet">
  <link href="/css/request.css" rel="stylesheet">
  <link href="/css/faqs.css" rel="stylesheet">

  <style>
    .bg-faded{
      margin-top: 100px;
    }
  </style>
</head>

<body>
  <h1 class="site-heading text-center text-white d-none d-lg-block">
    <span class="site-heading-upper text-primary mb-3">Online Request System</span>
    <span class="site-heading-lower">{{ $title ?? 'Login' }}</span>
  </h1>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark py-lg-4" id="mainNav">
    <div class="container">
      <a class="navbar-brand text-uppercase text-expanded font-weight-bold d-lg-none" href="/"><img src="{{asset('image/logo_homee.png')}}" class="site_logo" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item px-lg-4 {{ request()->is('/') ? 'active' : '' }}">
            @if(Auth::check())
              @if(auth()->user()->user_type == 'student')
                <a class="nav-link text-uppercase text-expanded" href="/">Home</a>
              @else
                <a class="nav-link text-uppercase text-expanded" href="/clerk/{{ auth()->user()->department }}">Home</a>
              @endif
            @else
              <a class="nav-link text-uppercase text-expanded" href="/">Home</a>
            @endif
          </li>
          <li class="nav-item px-lg-4 {{ request()->is('listofrequest') ? 'active' : '' }}">
            <a class="nav-link text-uppercase text-expanded" href="/listofrequest">List of Request</a>
          </li>
          <li class="nav-item px-lg-4 {{ (request()->is('faqs')) ? 'active' : '' }}">
            <a class="nav-link text-uppercase text-expanded" href="/faqs">FAQS</a>
          </li>
          

          @guest
          <li class="nav-item px-lg-4 {{ request()->is('login') ? 'active' : '' }}">
            <a class="nav-link text-uppercase text-expanded" href="/sign-in/google">{{ 'Login' }}</a>
          </li>
          @else
            @if(auth()->user()->user_type == 'student')
            <li class="nav-item px-lg-4 {{ request()->is('request') ? 'active' : '' }}">
              <a class="nav-link text-uppercase text-expanded" href="/request">Request Form</a>
            </li> 
            <li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="/profile/{{ auth()->user()->id }}/">{{ auth()->user()->name }}</a></li>
            @else
            <li class="nav-item px-lg-4"><p class="nav-link text-uppercase text-expanded">{{ auth()->user()->name }}</p></li>
          @endif
          <li class="nav-item px-lg-4"><a class="nav-link text-uppercase text-expanded" href="{{ route('logout') }}">
            {{ __('logout') }}
          </a></li>
          @endguest
        </ul>
      </div>
    </div>
  </nav>

  <main class="py-4">
    @yield('content')
    </main>

  <footer class="footer text-faded text-center py-5">
    <div class="container">
      <p class="m-0 small">Copyright &copy; ORS 2021</p>
    </div>
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
  <script>
    $('#status').change(function(){
      if($('#status').val() == 'Denied'){
        $('.requestmessage').html(`<div class="form-group">
          <label for="exampleFormControlTextarea1">Reason for rejecting request</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <button class="btn btn-sm btn-info">Save</button>`);
      }
    });

    $('#open_academic_form').on('click', function(){
      $('#additional_reqs').html('');
      $('#additional_quals').html('');
      $('#edit_academic_modal').modal('show');
    });

    $('#open_athletic_form').on('click', function(){
      $('#additional_reqs').html('');
      $('#additional_quals').html('');
      $('#edit_athletic_modal').modal('show');
    });

    $('#open_tor_form').on('click', function(){
      $('#additional_reqs').html('');
      $('#additional_quals').html('');
      $('#edit_tor_modal').modal('show');
    });

    $('#open_goodmoral_form').on('click', function(){
      $('#additional_reqs').html('');
      $('#additional_quals').html('');
      $('#edit_goodmoral_modal').modal('show');
    });

    $('#open_absence_form').on('click', function(){
      $('#additional_reqs').html('');
      $('#additional_quals').html('');
      $('#edit_absence_modal').modal('show');
    });

    $('#open_return_form').on('click', function(){
      $('#additional_reqs').html('');
      $('#additional_quals').html('');
      $('#edit_return_modal').modal('show');
    });


    function appendReq(){
      $('#additional_reqs').append(`
        <div class="req-parent input-group mb-3">
          <input type="text" class="form-control" class="mb-2" name="requirements[]">
          <div class="input-group-append">
            <button class="btn remove-req btn-outline-danger" onclick="removeReq(this)" type="button">Delete</button>
          </div>
        </div>`);
    }
    
    function appendQual(){
      $('#additional_quals').append(`
        <div class="qual-parent input-group mb-3">
          <input type="text" class="form-control" class="mb-2" name="qualifications[]">
          <div class="input-group-append">
            <button class="btn remove-qual btn-outline-danger" onclick="removeQual(this)" type="button">Delete</button>
          </div>
        </div>`);
    }

    function removeReq(el){
      $(el).closest('.req-parent').remove();
    }

    function removeQual(el){
      $(el).closest('.qual-parent').remove();
    }

    $('#edit-academic-form').submit(function(e){
      e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#edit-academic-form').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#edit_academic_modal').modal('hide');
                $('.success-edit-form').show();
                $(".success-edit-form").delay(3200).fadeOut(300);
            },error: function(){
                $('#edit_academic_modal').modal('hide');
                $('.danger-edit-form').show();
                $(".danger-edit-form").delay(3200).fadeOut(300);
            }
        });
    });

    $('#edit-athletic-form').submit(function(e){
      e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#edit-athletic-form').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#edit_athletic_modal').modal('hide');
                $('.success-edit-form').show();
                $(".success-edit-form").delay(3200).fadeOut(300);
            },error: function(){
                $('#edit_athletic_modal').modal('hide');
                $('.danger-edit-form').show();
                $(".danger-edit-form").delay(3200).fadeOut(300);
            }
        });
    });

    $('#edit-tor-form').submit(function(e){
      e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#edit-tor-form').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#edit_tor_modal').modal('hide');
                $('.success-edit-form').show();
                $(".success-edit-form").delay(3200).fadeOut(300);
            },error: function(){
                $('#edit_tor_modal').modal('hide');
                $('.danger-edit-form').show();
                $(".danger-edit-form").delay(3200).fadeOut(300);
            }
        });
    });

    $('#edit-goodmoral-form').submit(function(e){
      e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#edit-goodmoral-form').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#edit_goodmoral_modal').modal('hide');
                $('.success-edit-form').show();
                $(".success-edit-form").delay(3200).fadeOut(300);
            },error: function(){
                $('#edit_goodmoral_modal').modal('hide');
                $('.danger-edit-form').show();
                $(".danger-edit-form").delay(3200).fadeOut(300);
            }
        });
    });

    $('#edit-absence-form').submit(function(e){
      e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#edit-absence-form').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#edit_absence_modal').modal('hide');
                $('.success-edit-form').show();
                $(".success-edit-form").delay(3200).fadeOut(300);
            },error: function(){
                $('#edit_absence_modal').modal('hide');
                $('.danger-edit-form').show();
                $(".danger-edit-form").delay(3200).fadeOut(300);
            }
        });
    });

    $('#edit-return-form').submit(function(e){
      e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#edit-return-form').attr('action'),
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(data) {
                console.log(data);
                $('#edit_return_modal').modal('hide');
                $('.success-edit-form').show();
                $(".success-edit-form").delay(3200).fadeOut(300);
            },error: function(){
                $('#edit_return_modal').modal('hide');
                $('.danger-edit-form').show();
                $(".danger-edit-form").delay(3200).fadeOut(300);
            }
        });
    });
  </script>
</body>

</html>
