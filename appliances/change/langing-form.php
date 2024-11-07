<div class="top-banner-form px-3 py-1 rounded">
<form class="enquiry-form" action="./mailer/common-mail.php" method="POST">

<script src='https://www.google.com/recaptcha/api.js'></script>

    <h3>Enquiry Form</h3>


   <div class="form-floating">
   <div class="row">
<div class="col-sm-6">
      <input type="text" name="sname" id="sname" class="form-control" placeholder="Name"   />
      <div id="sname-error"></div>
      </div>
      <div class="col-sm-6">
      <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone No"  />
      <div id="phone-error"></div>
      </div>
    </div>
    </div>


    <div class="form-floating">
    <div class="row">
<div class="col-sm-6">
      <input type="text" name="email" id="email" class="form-control" placeholder="Email" />
      <div id="email-error"></div>
    </div>
    <div class="col-sm-6">
      <input type="text" name="city" id="city" class="form-control" placeholder="City" />
      <div id="city-error"></div>
    </div>
    </div>
    </div>

    <div class="form-floating category-select-drop-d">
  <select name="category" id="categoryDropdown" class="form-control">
  <option value="" disabled selected>Select Category</option>
    <option value="modular-kitchen">Modular Kitchen</option>
    <option value="designer-hardware">Designer Hardware</option>
    <option value="sanitaryware">Sanitaryware</option>
    <option value="tiles">Tiles</option>
    <option value="bath-fittings">Bath Fittings</option>
    <option value="Fans">Fans</option>
    <option value="Lightings">Lightings</option>
    <option value="Appliances">Appliances</option>
  </select>
  <!-- <label for="categoryDropdown">Category</label> -->
</div>

    <div class="form-floating">
    <textarea name="message" rows="2"  class="form-control" placeholder="Message" ></textarea>
</div>
                <!-- Add the CAPTCHA challenge -->
                 
                <!-- <input type="text" class="form-control" id="user-input" name="challenge" placeholder="Enter Captcha Code" autocomplete="off"/>
                <div id="capcha-error"></div>
                <input type="hidden" class="form-control" name="actual-challenge" id="challenge" value="" />
                <p id="challenge-container"></p> -->
                <!-- Additional client-side validation messages -->
                <!-- <div class="error" id="client-validation-error"></div> -->

               
              <!-- Google Captcha -->
               <div class="col-12 form-group">
               
                  <div class="g-recaptcha" data-sitekey="6LcRyZ4pAAAAADOncJBDMrCaELeQFlOPx7ihWAo_"></div>
                  <div id="captcha-error" style="color: red;"></div>
                  
               </div> 

    <!-- <div class="checkbox mb-3">

      <label>
        <input type="checkbox" value="remember-me" >   Send me updates
      </label>
    </div> -->

    <input type="text" name="honeypot" style="display: none;">
    <div class="ld-sub">
    <button class="w-100 btn btn-lg btn-primary rounded-circle" type="submit" name="submit" value="Submit">Call Me Back</button>
    <div class="load" id="loading" style="display: none;">
    Call Me Back
    <!-- <button class="w-100 btn btn-lg btn-primary rounded-circle" disabled>Test</button> -->
    </div>
    </div>
    <!-- Container div for error message -->
  <!--<div id="error-message" style="display:none"></div>-->
  </form>
  <p>By submitting this form, you agree to the <a href="privacy-policy.php" target="_blank">privacy policy</a> & <a href="terms-and-conditions.php" target="_blank">terms and conditions</a></p>
    </div>

    <script>
  document.addEventListener("DOMContentLoaded", function () {
    // Get the current URL path
    var pathArray = window.location.pathname.split('/');
    var category = pathArray[pathArray.length - 2]; // Assumes the category is the last segment of the URL
    // Set the selected value in the dropdown
    var dropdown = document.getElementById("categoryDropdown");
    if (dropdown) {
      // Loop through options and set the selected one
      for (var i = 0; i < dropdown.options.length; i++) {
        if (dropdown.options[i].value.toLowerCase() === category) {
          dropdown.options[i].selected = true;
          break;
        }
      }
    }
  });
</script>