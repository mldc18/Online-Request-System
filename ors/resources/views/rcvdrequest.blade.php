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

  <section class="page-section cta m-0">
    <div class="container">
      <div class="row">
        <div class="col-xl-9 mx-auto">
          <div class="cta-inner text-center rounded">
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
                  <td>Attachments</td>
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
                        <a href="#" class="btn btn-info btn-sm rounded-0 editBtn" type="button">Attachments</a>
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
            ]
        });
    });
</script>
<script>
  // $('#clerkEditRequest').on('click', function(){
  //   $('#edit-student-request').modal('show');
  // });
  function showModal(request_id){
    $('#edit-student-request').modal('show');
    $('#request_id').html('<input type="text" id="request_id_val" name="request_id" value="'+request_id+'" hidden>');
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
            console.log(data);
        },

    });
  });
</script>

@endsection
