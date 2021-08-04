@extends('layouts.app')

@section('content')

  <section class="continer">
   
      <div class="row">
        
          <div class="cta-inner">

            <!-- Page Container -->
<div class="w3-margin-top" style="max-width:100%;">

<!-- The Grid -->
<div class="w3-row-padding">

  <!-- Left Column -->
  <div class="w3-third">
  
    <div class="w3-white w3-text-grey w3-card-4">
      <div class="w3-display-container">
        <img src="{{asset('image/jc.jpg')}}" style="width:100%" alt="Avatar">
          <center><h2>Marc Dela Cruz</h2></center>
      </div>
      <hr>
      <div class="w3-container">
        <p><i class="fa-fw w3-margin-right w3-large w3-text-teal"></i><b>Program:</b> BSCS</p>
        <p><i class="fa-fw w3-margin-right w3-large w3-text-teal"></i><b>Email:</b> ucantseeme@tip.edu.ph</p>
        <p><i class="fa-fw w3-margin-right w3-large w3-text-teal"></i><b>Student Number:</b> 1811111</p>
     <hr>

    </div>
</div>
  <!-- End Left Column -->
  <bR>
  </div>

  <!-- Right Column -->
  <div class="w3-twothird">
    <div class="modal" tabindex="-1" role="dialog" id="open-student-request">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
            
            <form id="edit-student-request-form" method="POST">
              @csrf
              <div class="modal-header">
                <h5 class="modal-title">Details about the Request</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <div id="status_of_request">
  
                </div>  
                <div id="documents-to-be-edited">
                  
                </div>
              </div>
              <div class="modal-footer">
                
              </div>
              <input type='text' value='{{ auth()->user()->id }}' name='student_id' hidden>
            </form>
          </div>
      </div>
    </div>
    <div class="w3-container w3-card w3-white w3-margin-bottom">
      <center><h2 class="w3-text-black"><i class="fa-fw w3-margin-right w3-xxlarge w3-text-teal"></i>My Requests</h2></center>
      <div class="w3-container"><center>
        <table id="studentRequestTable"  style="width:100%">
          <thead>
              <tr>
                <td>Request</td>
                <td>Status</td>
                <td>Request Date</td>
                <td>Due Date</td>
                <td>ID</td>
                <td>Action</td>
              </tr>
          </thead>
          <tbody>
              @foreach ($requests as $row)
                  <tr id="<?=$row["id"]?>">
                      <td class="text-black-50"><?=$row["request_name"]?></td>
                      <td class="text-black-50"><?=$row["request_status"]?></td>
                      <td class="text-black-50"><?=$row["request_date"]?></td>
                      <td class="text-black-50"><?=$row["due_date"]?></td>
                      <td class="text-black-50"><?=$row["request_id"]?></td>
                      <td class="">
                          <button type='button' class='btn btn-success btn-sm rounded-0 editBtn' onclick='openStudent("<?=$row["request_id"]?>", `<?=$row["attachments"]?>`)'><i class='fa fa-edit'></i></button>
                      </td>
                  </tr>
              @endforeach
          </tbody>
      </table>
        <hr>
      </div>
      </div>
    </div>

    
  <!-- End Right Column -->
  </div>
  
<!-- End Grid -->
</div>

<!-- End Page Container -->
</div>

          </div>
        
      </div>

  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
        $('#studentRequestTable').dataTable({
            columnDefs: [{
                orderable: false,
                targets: 0
            }],
            order: [
                [1, 'asc']
            ]
        });
    });
</script>
<script>
  function showImageModal(el, imageUrl, index){
    $(el).closest('#documents-to-be-edited').find('.student-doc'+index).html('');
    $(el).closest('#documents-to-be-edited').find('.student-doc'+index).append(`<center><img width="350px" class="mb-3" src=`+imageUrl+` alt=""></center>`);
  }

  function appendInputField(el, inputName, index){
    $(el).closest('#documents-to-be-edited').find('.edit-doc'+index).html('');
    $(el).closest('#documents-to-be-edited').find('.edit-doc'+index).append(`<input type="file" name="`+inputName+`">`);
  }

  function getRequestName(name){
    if(name == 'Academic Scholarship Grant'){
      return '/submitAcademicForm';
    }else if(name == 'Athletic Scholarship Grant'){
      return '/submitAthleticForm';
    }else if(name == 'Transcript of Records'){
      return '/submitTorForm';
    }else if(name == 'Good Moral Certificate'){
      return '/submitGoodMoralForm';
    }else if(name == 'Leave of Absence'){
      return '/submitLoaForm';
    }else if(name == 'Returning Student Admission'){
      return '/submitRsaForm';
    }
  }

  function openStudent(request_id, attachments){
    $('#open-student-request').modal('show');
    console.log(attachments);
    $.ajax({
        type: 'GET',
        url: '/openStudentRequest/'+request_id,
        success: function(data) {
          $('#documents-to-be-edited').html('<hr>');
          let keys = Object.keys(JSON.parse(attachments));
          let values = Object.values(JSON.parse(attachments));
          let images = "";
          keys.forEach((el,index) => {
            let title;
            if(el == 'gwa'){
              title = 'Grade Weighted Average';
            }else if(el == 'registration'){
              title = 'Student Registration';
            }else if(el == 'id'){
              title = 'Student 2X2 ID Picture';
            }
            $('#documents-to-be-edited').append(`<p>`+title+`</p><button type="button" class="btn btn-sm btn-info mr-2" onclick="showImageModal(this, '{{ asset('uploads/`+el+`/`+values[index]+`') }}', `+index+`)">File Uploaded</button><button type="button" class="btn btn-sm btn-light mr-2" onclick="appendInputField(this, '`+keys[index]+`', `+index+`)">Edit</button><div class='mt-3 edit-doc`+index+`'></div><div class='mt-3 student-doc`+index+`'></div>`);
          });
           let action = getRequestName(data.request_name);
           console.log(action);
           if(data.request_status === 'Accepted'){
            $('#edit-student-request-form').attr('action', action);
            $('#status_of_request').html('');
            $('#status_of_request').html(`
            <div class="alert alert-success" role="alert">
              Your request has been accepted! 
            </div>`);
            $('.modal-footer').html(
              "<input type='text' value='"+request_id+"' name='request_id' hidden><button type='submit' class='btn save-doc-changes btn-primary'>Save</button><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>"
            )
           }else if(data.request_status === 'Denied'){
            $('#edit-student-request-form').attr('action', action);
            $('#status_of_request').html('');
            $('#status_of_request').html(`
            <div class="alert alert-danger mb-3" role="alert">
              Your request has been denied! 
            </div>
            <p>Remarks for Request : `+data.add_info+`</p>
            `);
            $('.modal-footer').html(
              "<input type='text' value='"+request_id+"' name='request_id' hidden><button type='submit' class='btn save-doc-changes btn-primary'>Save</button><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>"
            )
           }else{
            $('#edit-student-request-form').attr('action', action);
            $('#status_of_request').html('');
            $('#status_of_request').html(`
            <div class="alert alert-secondary" role="alert">
              Your request is Pending! 
            </div>`);
            $('.modal-footer').html(
              "<input type='text' value='"+request_id+"' name='request_id' hidden><button type='submit' class='btn save-doc-changes btn-primary'>Save</button><button type='button' class='btn btn-secondary' data-dismiss='modal'>Close</button>"
            )
           }
        },

    });
  }

  $('#edit-student-request-form').submit(function(e){
    e.preventDefault();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    let formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: $('#edit-student-request-form').attr('action'),
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            console.log(data);

        },error: function(){

        }
        

    });
  });
</script>

@endsection
