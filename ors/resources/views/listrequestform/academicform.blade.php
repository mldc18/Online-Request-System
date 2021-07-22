@extends('layouts.app')

@section('content')

<style>
  * {
    box-sizing: border-box;
  }
  
  input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    resize: vertical;
  }
  
  label {
    padding: 12px 12px 12px 0;
    display: inline-block;
  }
  
  input[type=submit] {
    background-color: red;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }
  
  input[type=submit]:hover {
    background-color: #2c2c2c;
  }
  
  .containeer {
    border-radius: 5px;
    background-color: #dcdcdc;
    padding: 20px;
    width: 750px;
  }
  
  .col-25 {
    float: left;
    width: 25%;
    margin-top: 6px;
  }
  
  .col-75 {
    float: left;
    width: 75%;
    margin-top: 6px;
  }
  
  /* Clear floats after the columns */
  .row:after {
    content: "";
    display: table;
    clear: both;
  }
  
  /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
  @media screen and (max-width: 600px) {
    .col-25, .col-75, input[type=submit] {
      width: 100%;
      margin-top: 0;
    }
  }
  hr.new4 {
  border: 1px solid red;
}
  </style>

<center>
    <div class="containeer mb-5 mt-3 py-4 text-left">
        <div class="px-4">
            <form action="/submitAcademicForm" enctype="multipart/form-data" id="academic-form" method="POST">
                @csrf
                <div class="row">
                    <div class="col-25">
                    <label for="fname">Photocopy of last semester's GWA</label>
                    </div>
                    <div class="col-75">
                    <label for="file"></label>
                    <input type="file" name="gwa" multiple>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                    <label for="lname">Registration Form</label>
                    </div>
                    <div class="col-75">
                    <label for="file"></label>
                    <input type="file" name="registration" multiple>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                    <label for="campus">TIP</label>
                    </div>
                    <div class="col-75">
                    <select id="campus" name="campus">
                        <option value="Manila">Manila</option>
                        <option value="Quezon City">Quezon City</option>
                        <option value="P. Casal">P. Casal</option>
                    </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                    <label for="subject">2x2 ID Picture (2pcs)</label>
                    </div>
                    <div class="col-75">
                    <label for="file"></label>
                    <input type="file" name="id" multiple>
                    </div>
                </div>
                <input type="text" value="{{ auth()->user()->id }}" name="student_id" hidden>
                <hr class="new4"> 
                
                <div class="row">
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </div>
</center>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha384-/LjQZzcpTzaYn7qWqRIWYC5l8FWEZ2bIHIz0D73Uzba4pShEcdLdZyZkI4Kv676E" crossorigin="anonymous"></script>
<script>
    $('#academic-form').submit(function(e) {
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        var formData = new FormData(this);
        $.ajax({
            type: 'POST',
            url: $('#academic-form').attr('action'),
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
