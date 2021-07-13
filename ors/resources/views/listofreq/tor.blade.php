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
                <span class="section-heading-lower"><b>Transcript of Records</b></span>
              </h2>
              <ul>
             <li><p>The Transcript of Records is a document you will need to present, as part of the application process at your future host
                  university from abroad. If you will be part of an exchange programme, you will also need another official transcript of 
                  records at the end of your study period, completed by the university where you attended courses.</p></li>
              </ul>

              <hr class="new4">

            <p><b>Student needs to present the following:</b></p>
              <ul>
                <li><p>Two (2) valid Identification Card with picture and signature;</p></li>
                <li><p>Two (2) pieces of 2x2 inch. ID picture (on white background; recent, not more than three months) of the requesting person;</p></li>
                <li><p>Request letter coming from the School/University that requires you to submit Transcript of Records or Diploma or the school where you are admitted;</p></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
