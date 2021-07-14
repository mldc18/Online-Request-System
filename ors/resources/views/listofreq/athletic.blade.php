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
             <li><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                 Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
                 in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, 
                 sunt in culpa qui officia deserunt mollit anim id est laborum.</p></li>
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

              <p><b>VPAA</b></p>
              <ul>
                <li><p>1.00 - 1.25 with no grade in any subject below 1.50 - 100% Discount on Tuition Fees for one (1) semester</p></li>
              </ul>

              <p><b>Dean's List</b></p>
              <ul>
                <li><p>1.00 - 1.25 with no grade in any subject below 1.50 - 100% Discount on Tuition Fees for one (1) semester</p></li>
              </ul>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection
