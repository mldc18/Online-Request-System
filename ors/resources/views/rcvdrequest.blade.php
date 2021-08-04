@extends('layouts.app')

@section('content')

  <div class="modal" tabindex="-1" role="dialog" id="edit-student-request">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
          <form id="edit-student-request-form" method="POST">
            @csrf
            <div class="modal-header">
              <h5 class="modal-title">Change Status of Student Request</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <select class="form-select mb-3" name="status" id="select-status" aria-label="Default select example">
                <option value="Pending">Pending</option>
                <option value="Accepted">Accepted</option>
                <option value="Denied">Denied</option>
              </select>
              <div id="denied-textarea">

              </div>  
              <div id="request_id">

              </div>
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary">Save changes</button>
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </form>
        </div>
    </div>
  </div>
  <div class="modal" id="attachments-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Documents</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div id="attachments-body">
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="alert alert-success w-50 m-0 m-auto" style="display:none" id="success" role="alert">
    Successfully changed status of Request
  </div>
  <div class="alert alert-danger w-50 m-0 m-auto" style="display:none" id="danger" role="alert">
    There was a problem upon updating status of Request
  </div>
  <section class="page-section cta m-0">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
            <div id="notifications">
          
            </div>
            <h2 class="section-heading mb-4">
              <span class="section-heading-upper">Student Requests</span>
            </h2>
            <table id="clerkRequestTable"  style="width:100%">
              <thead>
                <tr>
                  <td>Request</td>
                  <td>Status</td>
                  <td>Request Date</td>
                  <td>Due Date</td>
                  <td>ID</td>
                  <td>Documents</td>
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
                        <a href='#' class='btn btn-info btn-sm rounded-0 editBtn mr-3' onclick='showAttachments(`<?=$row["attachments"]?>`)' type="button">Documents</a>
                    </td>
                      <td class="">
                          <a href="#" class="btn btn-success btn-sm rounded-0 editBtn" onclick="showModal('<?=$row['request_id']?>')" id="<?=$row["request_id"]?>" type="button"><i class="fa fa-edit"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>
  <script>
    $(document).ready(function() {
        $('#clerkRequestTable').dataTable({
            columnDefs: [{
                orderable: false,
                targets: 0
            }],
            order: [
                [1, 'asc']
            ],
        });

    });
</script>
<script>

  function getOverduedRequests(){
    $.ajax({
        type: 'GET',
        url: '/getOverduedRequests',
        success: function(data) {
            console.log(data);
            let requests = [];
            if(JSON.parse(data).length > 0){
              $('#notifications').html('');
            JSON.parse(data).forEach(el=>{
              requests.push(el.request_id);
            });
            $('#notifications').html(`<div class="alert alert-danger" role="alert">
              You currently have `+JSON.parse(data).length+` request/s that are about to be overdued.
              Please check these requests:
              <div id="request_ids"></div>
            </div>`);
            requests.forEach(el=>{
              $('#request_ids').append(el);
            });
            }
           
            // $('#edit-student-request').modal('hide');
            // $('#success').show();
            // $("#success").delay(3200).fadeOut(300);
            // $('#clerkRequestTable').DataTable().clear().destroy();
            // $('#clerkRequestTable').DataTable().draw();
        },

    });
  }
  getOverduedRequests();
 
  function showModal(request_id){
    $('#edit-student-request').modal('show');
    $('#request_id').html('<input type="text" id="request_id_val" name="request_id" value="'+request_id+'" hidden>');
  }

  function showAttachments(attachments){
    console.log(attachments);
    $('#attachments-modal').modal('toggle');
    // <img src="{{ asset('uploads/gwa/1626957329.jpg') }}" alt="">
    $('#attachments-body').html('');
    let keys = Object.keys(JSON.parse(attachments));
    let values = Object.values(JSON.parse(attachments));
    let titles = [];
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
      $('#attachments-body').append(`<p class="ml-4">`+title+`</p><center><img width="500px" class="mb-5" src="{{ asset('uploads/`+el+`/`+values[index]+`') }}" alt=""></center><hr>`);
    });
    console.log(typeof JSON.parse(attachments));
    console.log(keys);
    console.log(values);
    console.log(images);
  }
  $('#select-status').change(function(){
    if($('#select-status').find(":selected").text() == 'Denied'){
      $('#denied-textarea').html('');
      $('#denied-textarea').html('<p>Reason for Request Denial</p><textarea class="form-control" name="reason" id="exampleFormControlTextarea1" rows="3"></textarea>')
    }
  });
  $('#edit-student-request-form').submit(function(e){
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
        url: '/edit-request-status/'+request_id,
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
            $('#edit-student-request').modal('hide');
            $('#success').show();
            $("#success").delay(3200).fadeOut(300);
            // $('#clerkRequestTable').DataTable().clear().destroy();
            // $('#clerkRequestTable').DataTable().draw();
        },

    });
  });
</script>

@endsection
