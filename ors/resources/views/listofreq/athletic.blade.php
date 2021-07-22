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
                <span class="section-heading-lower"><b>Athletic Scholarship Grant</b></span>
              </h2>
              <ul>
             <li><p>Athletes or varsity players may enjoy full or partial tuition and/
              or fees waiver. Grantees are recommended by the Office of Sports
              Development (OSD).</p></li>
              </ul>

              <hr class="new4">

            <p><b>Student needs to present the following:</b></p>
              <ul>
                <li><p>Photocopy of last semester's GWA</p></li>
                <li><p>Registration Form</p></li>
                <li><p>2x2 ID Picture (2pcs)</p></li>
              </ul>
              
              <hr class="new4">

              <p><b>Eligibility</b></p>
              <ul>
                <li><p>Must pass a try-out </p></li>
                <li><p>Should regularly compete in national meets;</p></li>
                <li><p>Skill level - exemplary, consistent top 3 in nationally
                  recognized competitions for individual events.</p></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
