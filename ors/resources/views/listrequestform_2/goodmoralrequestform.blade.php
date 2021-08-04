<div class="containeer mb-5 mt-3 py-4 text-left">
    <div class="px-4">
        <form action="/action_page.php">
            <div class="row">
              <div class="col-25">
                <label for="fname">2x2 ID Picture (2pcs)</label>
              </div>
              <div class="col-75">
                <label for="file"></label>
                <input type="file" name="goodmoral_id" multiple>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="lname">Good Moral Application Form</label>
              </div>
              <div class="col-75">
                <label for="file"></label>
                <input type="file" name="gmaf" multiple>
              </div>
            </div>
            <div class="row">
              <div class="col-25">
                <label for="campus">TIP</label>
              </div>
              <div class="col-75">
                <select id="campus" name="goodmoral_campus">
                  <option value="australia">Manila</option>
                  <option value="canada">Quezon City</option>
                  <option value="usa">P. Casal</option>
                </select>
              </div>
            </div>
            <div class="row">
                <div class="col-25">
                  <label for="subject">Request Letter</label>
                </div>
                <div class="col-75">
                  <label for="file"></label>
                  <input type="file" name="goodmoral_letter" multiple>
                </div>
              </div>
            </div>
            <input type="text" value="{{ auth()->user()->id }}" name="student_id" hidden>
            <hr class="new4">
            <div class="row m-0 m-auto">
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</div>