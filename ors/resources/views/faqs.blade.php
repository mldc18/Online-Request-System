@extends('layouts.app')

@section('content')
    <section class="pagee-section cta">
      <div class="container">
        <img class="img-fluid rounded about-heading-img mb-3 mb-lg-0" src="{{asset('image/faqs.jpg')}}" alt="">
        <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 mx-auto">
            <div class="cta-inner text-center rounded">
              <h2 class="section-heading mb-4">
                <span class="section-heading-upper">Frequently Asked Questions</span>
              </h2>
              <table>
                <tr>
                  <th>Q:</th>
                  <td>Who are eligible to use this system? </td>
                </tr>
                <tr>
                  <th class="ans">A:</th>
                  <td class="ans">- Currently Enrolled Student <br>
                    - Transferee <br>
                    - Alumni </td>
                </tr>
              </table>

              <hr class="new4">

              <table>
                <tr>
                  <th>Q:</th>
                  <td>What are the things we can do in this system? </td>
                </tr>
                <tr>
                  <th class="ans">A:</th>
                  <td class="ans">- Documents requests <br>
                    - Scholarship Applications <br>
                    - Course Accreditations <br>
                    - Leave of Absence Applications <br>
                    - Returning Student Admissions </td>
                </tr>
              </table>

              <hr class="new4">

              <table>
                <tr>
                  <th>Q:</th>
                  <td>How can I make a request for the document I needed? </td>
                </tr>
                <tr>
                  <th class="ans">A:</th>
                  <td class="ans">- Register by clicking the "Request Today" button <br>
                    - Click the "Request Form" then fill up the necessary information <br>
                    - Choose from the list of documents for the documents you need </td>
                </tr>
              </table>
              @if(Auth::check())
               <form action="#" id="faqs-form" method="POST"> {{-- dito niyo lagay pakyu --}}
                 @csrf
                <div class="container-for-questions" style="padding-top: 50px;">
                  <div class="alert alert-success w-75 m-0 m-auto" style="display:none" id="success-email" role="alert">
                    Your concern was successfully delivered!
                  </div>
                  <div class="alert alert-danger w-75 m-0 m-auto" style="display:none" id="danger-email" role="alert">
                    There was a problem upon sending your concern
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlInput1">Subject</label>
                    <input type="text" class="form-control" name="subject-faqs" id="subject-faqs" required>
                  </div>
                  <div class="form-group">
                    <label for="exampleFormControlTextarea1">Other questions?</label>
                    <textarea class="form-control" name="content-faqs" id="content-faqs" rows="3" required></textarea>
                  </div>
                    <input class="btn btn-red w-100" type="submit" value="Submit">
                </div>
              </form>
              @endif
            </div>
          </div>
          </div>
        </div>
      </div>
    </section>


    

   
    

  <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('js/faqs.js')}}"></script>

  </body>

  <!-- Script to highlight the active date in the hours list -->
  <script>
    $('.list-hours li').eq(new Date().getDay()).addClass('today');
  </script>
  <script>
    $('#faqs-form').on('submit', function(e){
      var request_id = $('#request_id_val').val();
      e.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
          }
      });
      var formData = new FormData(this);
      $.ajax({
          type: 'POST',
          url: '/send-mail',
          data: formData,
          cache: false,
          contentType: false,
          processData: false,
          success: function(data) {
              console.log(data);
              $('#success-email').show();
              $("#success-email").delay(3200).fadeOut(300);
          },

      });
    }); 
  </script>
</html>

@endsection

