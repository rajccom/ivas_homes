<div class="top-banner-form px-3 py-1 rounded">
		<form id="enquiry-form" action="./mailer/sanitaryware-mail.php"  method="POST">
    <h3>Enquiry Form</h3>

	 <div class="form-floating">
      <input type="text" name="sname" id="sname" class="form-control" placeholder="Name" />
      <div id="sname-error"></div>
    </div>
	
	    <div class="form-floating">
      <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone No"  minlength="10" maxlength="10" />
      <div id="phone-error"></div>
    </div>

    <div class="form-floating">
      <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
      <div id="email-error"></div>
    </div>
    <div class="form-floating">
      <input type="text" name="city" id="city" class="form-control" placeholder="City" />
      <div id="city-error"></div>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me" >   Send me updates
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary rounded-circle" type="submit" name="submit" value="Submit">Call Me Back</button>
    
      <!-- Container div for error message -->
  <!--<div id="error-message" style="display:none"></div>-->
  
  </form>
  
  <p>By submitting this form, you agree to the <a href="/privacy-policy/" target="_blank">privacy policy</a> & <a href="/terms-and-conditions/" target="_blank">terms and conditions</a></p>
		</div>