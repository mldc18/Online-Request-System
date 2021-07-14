@extends('layouts.app')

@section('content')

<section class="page-section about-heading">
   
   <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{asset('image/listofreq.jpg')}}" alt="">

   <div class="about-heading-content">
     <div class="row">
       <div class="col-xl-9 col-lg-10 mx-auto">
         <div class="bg-faded rounded p-5">


           <div class="w3-row-padding w3-center w3-margin-top">
             <div class="w3-third">
               <div class="w3-card w3-container" style="min-height:460px">
               <h3><b>SCHOLARSHIPS</b></h3><br>
               <i class="fa fa-university w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
               <p><a href="/academic" class="butn default">Academic Scholarship Grant</a></p>
               <p><a href="/athletic" class="butn default">Athletic Scholarship Grant</a></p>
               </div>
             </div>
       
             <div class="w3-third">
               <div class="w3-card w3-container" style="min-height:460px">
               <h3><b>STUDENT DOCUMENTS</b></h3><br>
               <i class="fa fa-newspaper-o w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
               <p><a href="/tor" class="butn default">Transcript of Records</a></p>
               <p><a href="#" class="butn default">Course Syllabus</a></p>
               <p><a href="#" class="butn default">Certificate of Good Moral</a></p>
               </div>
             </div>
       
             <div class="w3-third">
               <div class="w3-card w3-container" style="min-height:460px">
               <h3><b>OTHER REQUEST</b></h3><br>
               <i class="fa fa-pencil w3-margin-bottom w3-text-theme" style="font-size:120px"></i>
               <p><a href="/absence" class="butn default">Leave of Absence</a></p>
               <p><a href="#" class="butn default">Returning Student Admission</a></p>
               <p><a href="#" class="butn default">Course Accreditation</a></p>
               </div>
             </div>
             </div>
         </div>
       </div>
     </div>
   </div>

</section>

@endsection