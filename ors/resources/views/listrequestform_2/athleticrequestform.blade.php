<div class="containeer mb-5 mt-3 py-4 text-left">
    <div class="px-4">
        <form action="/action_page.php">
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
                <input type="file" name="reg" multiple>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="country">TIP</label>
              </div>
              <div class="col-75">
                <select id="country" name="campus">
                  <option value="australia">Manila</option>
                  <option value="canada">Quezon City</option>
                  <option value="usa">P. Casal</option>
                </select>
              </div>
              <input type="text" value="{{ auth()->user()->id }}" name="student_id" hidden>
            </div>
            </div>
            <hr class="new4">
            <div class="row m-0 m-auto">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>