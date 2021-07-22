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
                <span class="section-heading-lower"><b>Returning Student Admission</b></span>
              </h2>
              <ul>
             <li><p>Students whose studies in TIP were discontinued for a period of time may be considered for re-admission
                  depending on their previous academic performance and availability of slots.</p></li>
              </ul>

              <hr class="new4">

            <p><b>Documents to submit:</b></p>
              <ul>
                <li><p>Duly accomplished Application Form for Returning Student;</p></li>
                <li><p>Accounts Clearance; </p></li>
                <li><p>Latest Registration Certificate;</p></li>
                <li><p>Medical Clearance from the University Clinic;</p></li>
                <li><p>Academic evaluation based on Transcript of Records or informative copy of grades issued by the Student Records Head of the Office of the University Registrar; and</p></li>
                <li><p>Receipt of payment of Re-admission Fee.</p></li>
                
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
