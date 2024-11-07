$(document).ready(function() {

  $('.enquiry-form input[name=phone]').on('input', function(e) {
    // Get the current value of the input field
    var value = $(this).val();
    
    // Remove any non-digit characters
    var newValue = value.replace(/\D/g, '');

    // Ensure the length does not exceed 10 characters
    if (newValue.length > 10) {
      newValue = newValue.slice(0, 10);
    }

    // Update the input field value
    $(this).val(newValue);
  });

  $('.enquiry-form input[name=sname], .enquiry-form input[name=email], .enquiry-form input[name=city], .enquiry-form input[name=states], .enquiry-form input[name=bname]').on('input', function(e) {
    var value = $(this).val();
    if (value.length > 35) {
      $(this).val(value.slice(0, 35));
    }
  });

  $('.enquiry-form textarea[name=message]').on('input', function(e) {
    var value = $(this).val();
    if (value.length > 150) {
      $(this).val(value.slice(0, 150));
    }
  });

  function hideLoader() {
    $('#loading').hide();
    $('.enquiry-form input[type=submit]').prop('disabled', false);
  }

  // Hide loader and disable submit button when the page is loaded or restored from the cache
  window.onpageshow = function(event) {
    if (event.persisted) {
      hideLoader();
    }
  };

  $('.enquiry-form input').on('input', function() {
    $(this).removeClass('alert-danger').css('border-color', '');
    $(this).parent().find('.error').remove();
  });

  $('.enquiry-form #categoryDropdown').change(function () {
    // Remove the error message when a valid category is selected
    $(this).removeClass('alert-danger').css('border-color', '');
    $(this).parent().find('.error').remove();
  });

  $('.enquiry-form').submit(function(e) {

    $('.error').remove();

    // Validate the form fields
    var error = false;
    var nameRegex = /^(?!\s)(?!.*\s{2})[a-zA-Z\s]+$/; // Updated regex to disallow only spaces without alphabets and not allow spaces at the start
    var phoneRegex = /^[6789][0-9]{9}$/; // Updated regex to enforce exactly 10 digits for phone number
    var emailRegex = /^[a-zA-Z0-9]+(?:[._%+-]?[a-zA-Z0-9]+)*@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;
    var name = $('.enquiry-form input[name=sname]');
    var phone = $('.enquiry-form input[name=phone]');
    var email = $('.enquiry-form input[name=email]');
    var city = $('.enquiry-form input[name=city]');
    var state = $('.enquiry-form input[name=states]');
    var bname = $('.enquiry-form input[name=bname]');
    var category = $('.enquiry-form #categoryDropdown');
    var captchaResponse = grecaptcha.getResponse(); // Get the reCAPTCHA response

    // Validate reCAPTCHA
    if (!captchaResponse) {
      $('.enquiry-form #captcha-error').html('<div class="error">Please complete the reCAPTCHA.</div>');
      error = true;
    } else {
      $('.enquiry-form #captcha-error').empty();
    }
    
    if (category.val() === null || category.val() === '') {
      category.after('<div class="error">Please select a category.</div>');
      category.css('border-color', 'red');
      error = true;
    } else {
      category.css('border-color', 'green');
    }
    if (name.val() == '') {
      name.after('<div class="error">Please enter your name.</div>');
      name.css('border-color', 'red');
      error = true;
    } else if (!nameRegex.test(name.val())) {
      name.after('<div class="error">Please enter a valid name.</div>');
      name.css('border-color', 'red');
      error = true;
    } else {
      name.css('border-color', 'green');
    }
    if (phone.val() == '') {
      phone.after('<div class="error">Please enter your phone number.</div>');
      phone.css('border-color', 'red');
      error = true;
    } else if (!phoneRegex.test(phone.val())) {
      phone.after('<div class="error">Enter a valid 10-digit number.</div>');
      phone.css('border-color', 'red');
      error = true;
    } else {
      phone.css('border-color', 'green');
    }
    if (email.val() == '') {
      email.after('<div class="error">Please enter your email address.</div>');
      email.css('border-color', 'red');
      error = true;
    } else if (!emailRegex.test(email.val())) {
      email.after('<div class="error">Please enter a valid email address.</div>');
      email.css('border-color', 'red');
      error = true;
    } else {
      email.css('border-color', 'green');
    }
    if (city.val() == '') {
      city.after('<div class="error">Please enter your city.</div>');
      city.css('border-color', 'red');
      error = true;
    } else if (!nameRegex.test(city.val())) {
      city.after('<div class="error">Please enter a valid city.</div>');
      city.css('border-color', 'red');
      error = true;
    } else {
      city.css('border-color', 'green');
    }
    if (state.val() == '') {
      state.after('<div class="error">Please enter your state.</div>');
      state.css('border-color', 'red');
      error = true;
    } else if (!nameRegex.test(state.val())) {
      state.after('<div class="error">Please enter a valid state.</div>');
      state.css('border-color', 'red');
      error = true;
    } else {
      state.css('border-color', 'green');
    }
    if (bname.val() == '') {
      bname.after('<div class="error">Please enter your business name.</div>');
      bname.css('border-color', 'red');
      error = true;
    } else if (!nameRegex.test(bname.val())) {
      bname.after('<div class="error">Please enter a valid business name.</div>');
      bname.css('border-color', 'red');
      error = true;
    } else {
      bname.css('border-color', 'green');
    }

    // If there are errors, prevent the form from submitting and show the error messages
    if (error) {
      e.preventDefault();
      $('.error').css('color', 'red');
      return false;
    } else {
      // Show loader and disable submit button
      $('#loading').show();
      $('.enquiry-form input[type=submit]').prop('disabled', true);
    }
  });
});
