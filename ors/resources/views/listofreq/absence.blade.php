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
<form action="/editForm" id="edit-absence-form" method="POST">
  @csrf
  <div class="modal" id="edit_absence_modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Request Details</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p class="font-weight-bold">Name</p>
              <input type="text" class="mb-2" name="name" value="{{ $request_detail->name }}" readonly>
              <p class="font-weight-bold">Requirements <button type="button" class="req-btn btn btn-sm btn-secondary mb-2 ml-1" onclick="appendReq()">Add+</button></p>
              @foreach (json_decode($request_detail->requirements) as $req)
                  <div class="req-parent input-group mb-3">
                    <input type="text" class="form-control" class="mb-2" name="requirements[]" value="{{ $req }}">
                    <div class="input-group-append">
                      <button class="btn remove-req btn-outline-danger" onclick="removeReq(this)" type="button">Delete</button>
                    </div>
                  </div>
              @endforeach
              <div id="additional_reqs">

              </div>
              <p class="font-weight-bold">Qualifications <button type="button" class="qual-btn btn btn-sm btn-secondary mb-2 ml-1" onclick="appendQual()">Add+</button></p>
              @foreach (json_decode($request_detail->qualifications) as $qual)
                  <div class="qual-parent input-group mb-3">
                    <input type="text" class="form-control" class="mb-2" name="qualifications[]" value="{{ $qual }}">
                    <div class="input-group-append">
                      <button class="btn remove-qual btn-outline-danger" onclick="removeQual(this)" type="button">Delete</button>
                    </div>
                  </div>
              @endforeach
              <div id="additional_quals">

              </div>
            </div>
            <div class="modal-footer">
              <input type="submit" class="btn btn-primary" placeholder="Save Changes">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
  </div>
</form>
  <section class="page-section about-heading">
    <div class="alert success-edit-form alert-success w-50 m-0 m-auto" style="display:none" role="alert">
      Request Details Successfully Updated!
    </div>
    <div class="alert danger-edit-form alert-danger w-50 m-0 m-auto" style="display:none" role="alert">
      There was a problem upon editing Request Details!
    </div>
    <div class="container">
      <div class="about-heading-content">
        <div class="row">
          <div class="col-xl-9 col-lg-10 mx-auto">
            <div class="bg-faded rounded p-5">
              <h2 class="section-heading mb-4">
                <span class="section-heading-lower"><b>Leave of Absence</b></span>
              </h2>
              <ul>
                <li><p>{{ $request_detail->details }}</p></li>
              </ul>

              <hr class="new4">

              <p><b>Student needs to present the following:</b></p>
              <ul>
              @for ($i = 0; $i < count(json_decode($request_detail->requirements)); $i++)
                <li><p>{{ json_decode($request_detail->requirements)[$i] }}</p></li>
              @endfor
              </ul>
              
              @if(count(json_decode($request_detail->qualifications)) !== 0)
                <hr class="new4">
                <p><b>Below are the qualifications needed by the Student</b></p>
                <ul>
                  @for ($i = 0; $i < count(json_decode($request_detail->qualifications)); $i++)
                    <li><p>{{ json_decode($request_detail->qualifications)[$i] }}</p></li>
                  @endfor
                </ul>
              @endif
              <hr class="new4">
              @if(Auth::check())
                @if(auth()->user()->user_type == 'student')
                  <center> <a class="btn btn-primary mt-3" href="/torform">Make a Request</a></center>
                @else
                <center> <a class="btn btn-primary mt-3" id="open_absence_form">Edit Request</a></center>
                @endif
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  @endsection