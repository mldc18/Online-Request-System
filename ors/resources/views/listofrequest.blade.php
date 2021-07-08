@extends('layouts.app')

@section('content')

  <section class="page-section about-heading">
    <div class="container">
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="img/about.jpg" alt="">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Scholarships</b></span>
              </h2>
              <ul>
             <li><p><button class="butn default">Academic Scholarship Grant</button></p></li>
             <li><p><button class="butn default">Athletic Scholarship Grant</button></p></li>
              </ul>

              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Student Documents</b></span>
              </h2>
              <ul>
                <li><p><button class="butn default">Transcript of Records</button></p></li>
                <li><p><button class="butn default">Course Syllabus</button></p></li>
                <li><p><button class="butn default">Certificate of Good Moral</button></p></li>
              </ul>

              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Other Request</b></span>
              </h2>
              <ul>
                <li><p><button class="butn default">Leave of Absence</button></p></li>
                <li><p><button class="butn default">Returning Student Admission</button></p></li>
                <li><p><button class="butn default">Course Accreditation</button></p></li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection