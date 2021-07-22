@extends('layouts.app')

@section('content')
<style>
ul{
    text-align: justify;
    text-justify: inter-word;
  }

  hr.new4 {
  border: 1px solid burlywood;
}

</style>

  <section class="page-section about-heading">
    <div class="container">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Certificate of Good Moral</b></span>
              </h2>
              <ul>
             <li><p>This document shows any rulebook violations incurred during High School. Offenses, warnings,
                  suspensions, or serious violations are reflected in the Certificate of Good Moral Character.</p></li>
              </ul>

              <hr class="new4">

            <p><b>Student needs to present the following:</b></p>
              <ul>
                <li><p>Two (2) valid Identification Card with picture and signature.</p></li>
                <li><p>Duly accomplished Good Moral Character application form.</p></li>
                <li><p>Request letter that states the purpose of the request.</p></li>
              </ul>
              

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
