@extends('layouts.app')

@section('content')

  <section class="page-section about-heading">
    <div class="container">
<<<<<<< HEAD
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{asset('image/list-of-request.jpg')}}" alt="">
=======
      <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{asset('image/listofreq.jpg')}}" alt="">
>>>>>>> 5b2f0e2d5083c2bebb03d44c2c0121339507f313
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Scholarships</b></span>
              </h2>
              <ul>
             <li><p><a href="/academic" class="butn default">Academic Scholarship Grant</a></p></li>
             <li><p><a href="/athletic" class="butn default">Athletic Scholarship Grant</a></p></li>
            
              </ul>

              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Student Documents</b></span>
              </h2>
              <ul>
                <li><p><a href="/tor" class="butn default">Transcript of Records</a></p></li>
                <li><p><a href="#" class="butn default">Course Syllabus</a></p></li>
                <li><p><a href="#" class="butn default">Certificate of Good Moral</a></p></li>
              </ul>

              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Other Request</b></span>
              </h2>
              <ul>
                <li><p><a href="/absence" class="butn default">Leave of Absence</a></p></li>
                <li><p><a href="#" class="butn default">Returning Student Admission</a></p></li>
                <li><p><a href="#" class="butn default">Course Accreditation</a></p></li>
              </ul>
              
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection