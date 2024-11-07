<?php
$page ='contact-us';
?>

<?php include 'inc/head.php'; ?>
<style>
  .error {
  color: red;
}
</style>

<title>Contact Us | IVAS Homes</title>
<meta name="description" content="Contact us today to learn more about our products and services. We are here to help you with all your needs, from finding the right product to getting the right answers to your questions." />
<meta name="keywords" content="IVAS Contact Us"/>
<link rel="canonical" href="https://www.ivas.homes/contact-us/" />
<script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include 'inc/header.php'; ?>

<div class="modular-kitchen-banner py-5" id="contact-banner">
        <div class="container">
		<div class="row align-items-center">
		<div class="col-sm-8 px-5 py-3">
          <div class="text-start">
            <h1 class="m-0 py-4">Contact Us</h1>
          </div>
		   </div>
      </div>
        </div>
      </div>


      <div class="container mt-5">
     <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="https://www.ivas.homes/">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Contact Us</li>
       </ol>
     </nav>
     </div>  



	  <section class="contact-us inquiry-model my-5">
    <div class="container">
			<div class="terms-condition">
			<h2 class="mb-2">Enquiry Form</h2> 
<p>Kindly fill in the below details and our team will get in touch with you shortly.</p>
<div class="form-enquiry">

<form class="enquiry-form" action="mail.php"  method="POST">
<div class="row">
<div class="col-sm-4">
<div class="form-floating category-select-drop-d">
  <select name="category" class="form-control" id="categoryDropdown">
    <option value="" selected disabled >Select Category</option>
    <option value="modular-kitchen">Modular Kitchen</option>
    <option value="designer-hardware">Designer Hardware</option>
    <option value="sanitaryware">Sanitaryware</option>
    <option value="tiles">Tiles</option>
    <option value="bath-fittings">Bath Fittings</option>
    <option value="fans">Fans</option>
    <option value="lightings">Lightings</option>
    <option value="appliances">Appliances</option>
  </select>
   <!-- <label for="categoryDropdown">Category</label>  id="categoryDropdown" -->
</div>
</div>

		<div class="col-sm-4">
	 <div class="form-floating">
      <input type="text" name="sname" class="form-control" placeholder="Name" />
    </div>
  </div>

  
	<div class="col-sm-4">
	    <div class="form-floating">
      <input type="tel" name="phone" class="form-control" placeholder="Phone No"  />
    </div>
    </div>

    <div class="col-sm-4">
    <div class="form-floating">
      <input type="text" name="email" class="form-control" placeholder="Email" />
    </div></div>

    <div class="col-sm-4">
    <div class="form-floating">
      <input type="text" name="city" class="form-control" placeholder="City" />
      </div>
    </div>


    <div class="col-sm-4">
    <div class="form-floating">
    <textarea class="form-control mesage-box" name="message" placeholder="Message" ></textarea>
      </div>
    </div>

    <!-- <div class="col-sm-4">
    <div class="form-floating">
    Add the CAPTCHA challenge -->
    <!-- <input type="text" class="form-control" id="user-input" name="challenge" placeholder="Enter Captcha Code" autocomplete="off"/>
                <div id="capcha-error"></div>
                <input type="hidden" class="form-control" name="actual-challenge" id="challenge" value="" />
                <p id="challenge-container"></p>
                </div>
    </div>  -->

    <div class="col-sm-4">
    <div class="col-12 form-group">
                      <div class="g-recaptcha" data-sitekey="6LcRyZ4pAAAAADOncJBDMrCaELeQFlOPx7ihWAo_"></div>
                      <div id="captcha-error" style="color: red;"></div>
    </div>
    </div> 
     
    <div class="col-sm-4">
    <input type="text" name="honeypot" style="display: none;">
    <div class="ld-sub">
    <button class="w-100 btn btn-lg btn-primary rounded-circle" type="submit" name="submit" value="Submit">Submit</button>    
    <div class="load" id="loading" style="display: none;">
    Submit
    <!-- <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw loding-icon-153" ></i>   -->
  </div>
</div>

  </div> 
  </div>


  </form>

</div>
</div>
</div>
</section>


<?php include 'inc/dealer.php'; ?>




		  


<?php include 'inc/footer-js.php'; ?>
<script src="./js/validation.js"></script>
<script type="text/javascript" src="js/location.js"></script>
<?php include 'inc/footer.php'; ?>