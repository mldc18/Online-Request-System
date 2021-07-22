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
  
  .submit-req {
    background-color: rgba(47,23,15,.9);
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
  }
  
  .submit-req:hover {
    background-color: burlywood;
  }
  
  .containeer {
    border-radius: 5px;
    background-color: #f2f2f2;
    width: 750px;

    /* padding: 60px 300px; */
  }

  form{
    /* width: 500px; */
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
  </style>
    
    <center>
      <div class="alert alert-danger w-50 mt-3 sent-success" style="display:none" role="alert">
        Please login to your Account!
      </div>
      <div class="containeer mb-5 mt-3 py-4">
        <div class="px-5">
          <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="fname">First Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="fname" name="firstname" placeholder="Your name..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Last Name</label>
              </div>
              <div class="col-75">
                <input type="text" id="lname" name="lastname" placeholder="Your last name..">
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="country">Campus</label>
              </div>
              <div class="col-75">
                <select id="country" name="country">
                  <option value="australia">Quezon City</option>
                  <option value="canada">Manila</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="subject">Subject</label>
              </div>
              <div class="col-75">
                <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>
              </div>
            </div>
            <div class="row mt-2">
              <input class="submit-req m-0 m-auto" type="button" value="Submit">
            </div>
          </form>
        </div>
      </div>
    </center>

  <script>
    $('.submit-req').on('click', function(){
      $('.sent-success').show();
      setTimeout(function() { $('.sent-success').hide(); }, 4000);
      
    });
  </script>
  @endsection


