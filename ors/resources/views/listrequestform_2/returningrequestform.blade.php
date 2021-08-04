<div class="containeer mb-5 mt-3 py-4 text-left">
    <div class="px-4">
        <form action="/submitAcademicForm" enctype="multipart/form-data" id="academic-form" method="POST">
            <div class="row">
              <div class="col-25">
                <label for="fname">Returning Form</label>
              </div>
              <div class="col-75">
                <label for="file"></label>
                <input type="file" name="returning_form" multiple>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Latest Registration Certificate</label>
              </div>
              <div class="col-75">
                <label for="file"></label>
                <input type="file" name="returning_reg" multiple>
              </div>
            </div>
            <div class="row">
                <div class="col-25">
                  <label for="lname">Accounts Clearance</label>
                </div>
                <div class="col-75">
                  <label for="file"></label>
                  <input type="file" name="returning_acc" multiple>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Medical Clearance</label>
                </div>
                <div class="col-75">
                  <label for="file"></label>
                  <input type="file" name="returning_med" multiple>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Academic Evaluation Form or TOR</label>
                </div>
                <div class="col-75">
                  <label for="file"></label>
                  <input type="file" name="returning_acad" multiple>
                </div>
              </div>
              <div class="row">
                <div class="col-25">
                  <label for="lname">Receipt of payment of Re-admission Fee</label>
                </div>
                <div class="col-75">
                  <label for="file"></label>
                  <input type="file" name="returning_rcpt" multiple>
                </div>
              </div>
            <div class="row">
              <div class="col-25">
                <label for="campus">TIP</label>
              </div>
              <div class="col-75">
                <select id="campus" name="returning_campus">
                  <option value="australia">Manila</option>
                  <option value="canada">Quezon City</option>
                  <option value="usa">P. Casal</option>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="subject">2x2 ID Picture (2pcs)</label>
              </div>
              <div class="col-75">
                <label for="file"></label>
                <input type="file" name="returning_id" multiple>
              </div>
            </div>
    
            <hr class="new4">
            
            <div class="row">
              <center>
                <input type="submit" value="Submit">
              </center>
              
            </div>
        </form>
    </div>
</div>

