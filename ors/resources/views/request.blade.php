@extends('layouts.app')

@section('content')
  <style>
      .hidden {
  display: none;
}
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<center>
  <select id="demo-select" class="w-50">
    <option value="selectForm1">Academic Scholarship</option>
    <option value="selectForm2">Athletic Scholarship</option>
  </select>
  <form action="#" method="post" id="form1" class="hidden">
        @include('listrequestform_2.academicrequestform')
  </form>
  <form action="#" method="post" id="form2" class="hidden">
        @include('listrequestform_2.athleticrequestform')
  </form>
</center>

  
<script>
    function showCorrectForm(demoSelectValue) {
  if (demoSelectValue == "selectForm1"){
    $('#form2').addClass('hidden');
    $('#form1').removeClass('hidden');
  } else if(demoSelectValue == "selectForm2"){
    $('#form1').addClass('hidden');
    $('#form2').removeClass('hidden');
  }
}
// activate pagka load ng page
$(document).ready(function(){
  let currentForm = $('#demo-select').val();
  showCorrectForm(currentForm);
});
//activate pagka palit ng select
$('#demo-select').off('change').on('change', function(){
  showCorrectForm($(this).val());
});
</script>
@endsection