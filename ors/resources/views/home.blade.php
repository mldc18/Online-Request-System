@extends('layouts.app')

@section('content')

  <section class="page-section clearfix">
    <div class="container">
      <div class="intro">
        <img class="intro-img img-fluid mb-3 mb-lg-0 rounded" src="{{asset('image/intro.jpg')}}" alt="">
        <div class="intro-text left-0 text-center bg-faded p-5 rounded">
          <h2 class="section-heading mb-4">
            <span class="section-heading-lower"><b>Hassle Free!</b></span>
          </h2>
          <p class="mb-3">Submit your documents & requirements at the comfort of your own home</p>
          <div class="intro-button mx-auto">
            <a class="btn btn-primary btn-xl" href="/listofrequest">Request Today!</a>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
