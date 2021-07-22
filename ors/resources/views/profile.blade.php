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
                          <a href="#" class="btn btn-success btn-sm rounded-0 editBtn" type="button"><i class="fa fa-edit"></i></a>
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

@endsection
