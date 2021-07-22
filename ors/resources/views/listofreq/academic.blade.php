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
                <span class="section-heading-lower"><b>Academic Scholarship Grant</b></span>
              </h2>
              <ul>
             <li><p>Academic scholarship grant is awarded to regular students who meet the required genereal weighted average (GWA) 
                 grade point average (GPA) and has no major offense in the preceding semester. Academic new is the updated policy which 
                 governs the students with student number starting 2013 while academic residual is the old policy which governs the students 
                 with student number from 2012 and below.</p></li>
              </ul>

              <hr class="new4">

            <p><b>Student needs to present the following:</b></p>
              <ul>
                <li><p>Photocopy of last semester's GWA</p></li>
                <li><p>Registration Form</p></li>
                <li><p>2x2 ID Picture (2pcs)</p></li>
              </ul>
              
              <hr class="new4">

              <p><b>President's List</b></p>
              <ul>
                <li><p>1.00 - 1.25 with no grade in any subject below 1.50 - 100% Discount on Tuition Fees for one (1) semester</p></li>
              </ul>

              <p><b>VPAA's List</b></p>
              <ul>
                <li><p>1.26-1.50 with no grade in any subject below 2.00 - 75%Discount on Tuition Fees for one (1) semester</p></li>
              </ul>

              <p><b>Dean's List</b></p>
              <ul>
                <li><p>1.51-1.75 with no grade in any subject below 2.50 - 50% Discount on Tuition Fees for one (1) semester</p></li>
              </ul>
              <hr class="new4">
              @if(Auth::check())
                @if(auth()->user()->user_type == 'student')
                  <center> <a class="btn btn-primary mt-3" href="/academicform">Make a Request</a></center>
                @else
                  <center> <a class="btn btn-primary mt-3" href="/academicform">Edit Request</a></center>
                @endif
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
