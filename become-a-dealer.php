<?php
$page ='contact-us';
?>

<?php include 'inc/head.php'; ?>

<title>Become a Dealer | IVAS Homes</title>
<meta name="description" content="Become a dealer of India's most promising brand of modular kitchens, sanitaryware, tiles, and bath fittings. Enjoy sustainable margins, excellent support, and the opportunity to grow your business with us." />
<meta name="keywords" content="IVAS Dealership"/>
<link rel="canonical" href="https://www.ivas.homes/become-a-dealer/" />
<script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php include 'inc/header.php'; ?>

<div class="modular-kitchen-banner py-5" id="contact-banner">
        <div class="container">
		<div class="row align-items-center">
		<div class="col-sm-8 px-5 py-3">
          <div class="text-start">
            <h1 class="m-0 py-4">Become an IVAS Dealer</h1>
          </div>
		   </div>
      </div>
        </div>
      </div>


      <div class="container mt-5">
     
     <nav aria-label="breadcrumb">
       <ol class="breadcrumb">
         <li class="breadcrumb-item"><a href="https://www.ivas.homes/">Home</a></li>
         <li class="breadcrumb-item active" aria-current="page">Become an IVAS Dealer</li>
       </ol>
     </nav>
     </div>


	  <section class="contact-us inquiry-model my-5">
    <div class="container">
			<div class="terms-condition">
			<h2 class="mb-2">Apply for Dealership</h2>
<p>Gain access to an extensive product range, and comprehensive support by becoming an IVAS dealer. <br>Fill out the form below and our team will get in touch with you.</p>
<div class="form-enquiry">

<form class="enquiry-form" action="dealer-mail.php"  method="POST">
<div class="row">

<div class="col-sm-4">
    <div class="form-floating category-select-drop-d">
    <select name="category" class="form-control" id="categoryDropdown">
    <option value="" disabled selected>Select Category</option>
    <option value="Modular Kitchen">Modular Kitchen</option>
    <option value="Designer Hardware">Designer Hardware</option>
    <option value="Sanitaryware">Sanitaryware</option>
    <option value="Tiles">Tiles</option>
    <option value="Bath Fittings">Bath Fittings</option>
    <option value="fans">Fans</option>
    <option value="lightings">Lightings</option>
    <option value="appliances">Appliances</option>
  </select>
      </div>
    </div>

<div class="col-sm-4">
	 <div class="form-floating">
      <input type="text" name="states" class="form-control" placeholder="State" />
      <div id="state-error"></div>
    </div>
  </div>


  <div class="col-sm-4">
	 <div class="form-floating">
      <input type="text" name="city" class="form-control" placeholder="City" />
      <div id="city-error"></div>
    </div>
  </div>



		<div class="col-sm-4">
	 <div class="form-floating">
      <input type="text" name="sname" class="form-control" placeholder="Name" />
      <div id="sname-error"></div>
    </div>
  </div>



    <div class="col-sm-4">
    <div class="form-floating">
      <input type="text" name="bname" class="form-control" placeholder="Business Name" />
      <div id="bname-error"></div>
    </div></div>


  <div class="col-sm-4">
	 <div class="form-floating">
      <input type="text" name="email" class="form-control" placeholder="Email Id" />
      <div id="email-error"></div>
    </div>
  </div>

  
	<div class="col-sm-4">
	    <div class="form-floating">
      <input type="tel" name="phone" class="form-control" placeholder="Phone No" />
      <div id="phone-error"></div>
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
    </div> --> 

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
    <!-- <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw loding-icon-153" ></i>  -->
    Submit
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
<script type="text/javascript" src="js/location.js"></script>
<script src="./js/validation.js"></script>
<?php include 'inc/footer.php'; ?>