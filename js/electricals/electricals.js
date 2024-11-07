
$(document).ready(function(){

    window.onload = function() {
      filter_data(0);
  }
  
  
  $.fn.isInViewport = function() {
    var elementTop = $(this).offset().top;
    var elementBottom = elementTop + $(this).outerHeight();
  
    var viewportTop = $(window).scrollTop();
    var viewportBottom = viewportTop + $(window).height();
  
    return ( elementBottom > viewportTop ) && ( elementTop < viewportBottom - $( this ).height() );
  };
  
  
  // $(window).scroll(function() {
  //   var top_of_element = $("#LoadMore").offset().top;
  //   var bottom_of_element = $("#LoadMore").offset().top + $("#LoadMore").outerHeight();
  //   var bottom_of_screen = $(window).scrollTop() + $(window).innerHeight();
  //   var top_of_screen = $(window).scrollTop();
  
  //   if ((bottom_of_screen > top_of_element) && (top_of_screen < bottom_of_element)){
  //     console.log('hhhhhh');
  //     var lastId = $('.loader').attr('id');
  //     filter_data(lastId);
  //   }
  // });
  
  
  
  $(document).on('click', '#LoadMore', function() {
    //alert('clicked!');
    var lastId = $('.loader').attr('id');
      //console.log(lastId);
      
          filter_data(lastId);
      
  });
  
  
      
  
      function filter_data(lastId)
      {
          //$('.filter_data').html('<div id="loading" style="" ></div>');
          var action = 'fetch_data';
          //var minimum_price = $('#hidden_minimum_price').val();
          //var maximum_price = $('#hidden_maximum_price').val();
          var category = get_filter('category');
          var category_one = get_filter('category_one');
          var category_two = get_filter('category_two');
          var type_fan = get_filter('type_fan');
          var type_light = get_filter('type_light');
          var type_heater = get_filter('type_heater');
          var rating_fan = get_filter('rating_fan'); 
          var rating_heater = get_filter('rating_heater');  
          var range_to_from = get_filter('range_to_from');
          var finish_fan = get_filter('finish_fan');
          var collection = get_filter('collection');
          var shape_fan = get_filter('shape_fan');
          var body_light = get_filter('body_light');
          var body_heater = get_filter('body_heater');
          $.ajax({
              url:"./electricals/electricals_data.php",
              method:"POST",
              data:{action:action, category:category, category_one:category_one, category_two:category_two, last_id:lastId, type_fan:type_fan, type_light:type_light, type_heater:type_heater, rating_fan:rating_fan, rating_heater:rating_heater,range_to_from:range_to_from, finish_fan:finish_fan, collection:collection, shape_fan:shape_fan, body_light:body_light, body_heater:body_heater},
              beforeSend:function(){
                $('.loader').show();
                $('.loader-1').show();
            },
            
              success:function(data){
                setTimeout(function() {
                  $('.loader').remove();
                  $('.loader-1').hide();
                  $('#LoadMore').remove();
                  //$('#load-content').append(data);
                  $('.filter_data').append(data);
                 },1000);
                  
              }
          });
      }
  
      function get_filter(class_name)
      {
          var filter = [];
          // $('.'+class_name+':checked').each(function(){
          //     filter.push($(this).val());
          // });
          $('.' + class_name).change(function() {
            var val = $(this).val();
            if ($(this).is(":checked")) {
                
                $(":checkbox[value='" + val + "']").attr("checked", true);
            } else {
                $(":checkbox[value='" + val + "']").attr("checked", false);
            }
        });
        $('.' + class_name + ':checked').each(function() {
          if($.inArray($(this).val(), filter) == -1 ){
            filter.push($(this).val());
          }
       });
          // $('.'+class_name+':checked').each(function(){
          //     filter.push($(this).val());
          // });
          return filter;
      }
  
  
      $('.common_selector').click(function(){
        $('.filter_data').html('');
          filter_data(0);
      });
  
      //$('#price_range').slider({
       //   range:true,
      //    min:1000,
       //   max:65000,
       //   values:[1000, 65000],
       //   step:500,
        //  stop:function(event, ui)
       //   {
       //       $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
       //       $('#hidden_minimum_price').val(ui.values[0]);
        //      $('#hidden_maximum_price').val(ui.values[1]);
       //       filter_data();
          //}
     // });
  
  });
  
  
  //Dropdown Button
  
  
  // Get all dropdown buttons and dropdown content
  var dropdownBtns = document.querySelectorAll(".dropbtn");
  var dropdownContents = document.querySelectorAll(".dropdown-content");
  
  // When the user clicks on a button, toggle between hiding and showing the dropdown content
  dropdownBtns.forEach(function(btn) {
    var arrow = btn.querySelector(".arrow");
    btn.addEventListener("click", function() {
      var currentContent = this.nextElementSibling;
      dropdownContents.forEach(function(content) {
        if (content !== currentContent) {
          content.classList.remove("show");
        }
      });
      currentContent.classList.toggle("show");
      arrow.innerHTML = currentContent.classList.contains("show") ? "-" : "+";
    });
  });
  
  // Close the dropdown if the user clicks outside of it
  /*window.addEventListener(".dropbtn", function(event) {
    if (!event.target.matches(".dropbtn") && !event.target.matches(".arrow")) {
      dropdownContents.forEach(function(content) {
        if (content.classList.contains("show")) {
          content.classList.remove("show");
          var btn = content.previousElementSibling;
          var arrow = btn.querySelector(".arrow");
          arrow.innerHTML = "$$$";
        }
      });
    }
  });*/
  
  
  $(document).ready(function() {
     
    function fetch_post_data(product_id) {
  
  
      var inp = $('.view_data');
      var index = $(".filter_data .id-"+product_id).index();
      
      var next = inp[index + 1];
      var prev = inp[index - 1];
  
      var p_product_id = $(prev).attr("id");
      var n_product_id = $(next).attr("id");
  
      var disablePrev = !p_product_id ? 'disabled': '';
      var disableNext = !n_product_id ? 'disabled': '';
  
  
  
      var buttons = "<div align='center' class='next-preview-btn'><button type='button' name='previous' class='btn previous' id='"+p_product_id+"' "+disablePrev+" ><i class='fa fa-angle-left' aria-hidden='true'></i></button><button type='button' name='next' class='btn next' id='"+n_product_id+"' "+disableNext+"><i class='fa fa-angle-right' aria-hidden='true'></i></button></div>";
        $.ajax({
            url: "./electricals/electricals_product.php",
            method: "GET",
            data: {
                product_id: product_id,
            },
            success: function(data) {
  
              var api_data = JSON.parse(data);
              var images = api_data.product_multiple_imgs.split(',');
              console.log(images);
              var imgMarkup = '<div class="swiper mySwiper" id="swiper'+api_data.product_id+'"><div class="swiper-wrapper">';
              $.each(images, function(index, value) { 
                imgMarkup += '<div class="swiper-slide"><img src="images/' + api_data.path + value + '" alt="" class="img-responsive"></div>';
            });
            imgMarkup += '</div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div>';
            var markUp = "<div class=table-responsive id='data'><div class='row popup-content-u'><div class='col-6 pd-image-popup'>" + imgMarkup + "</div><div class='col-6 popup-details-s'><h2>" + api_data.product_name + "</h2><div class='table-scroll'><table class='table'>";
            // Category
            if (api_data.category || api_data.category_one || api_data.category_two ) {
              markUp += "<tr><td><label>Category</label></td><td>";
              if (api_data.category)
              {
              markUp += "<span>"+  api_data.category +"</span>" ;
              }
              if (api_data.category_one)
              {
              markUp += "<span>"+ api_data.category_one +"</span>";
              }
              if (api_data.category_two)
              {
              markUp += "<span>"+ api_data.category_two +"</span>";
              }
              markUp += "</td></tr>";
            }

          // Type
          if (api_data.type_fan_one || api_data.type_fan_two || api_data.type_fan_three || api_data.type_fan_four || api_data.type_fan_five || api_data.type_led_one || api_data.type_led_two || api_data.type_led_three || api_data.type_led_four || api_data.type_heat_one || api_data.type_heat_two) {
            markUp += "<tr><td><label>Type</label></td><td>";
            if (api_data.type_fan_one)
            {
            markUp += "<span>"+  api_data.type_fan_one +"</span>" ;
            }
            if (api_data.type_fan_two)
            {
            markUp += "<span>"+ api_data.type_fan_two +"</span>";
            }
            if (api_data.type_fan_three)
            {
            markUp += "<span>"+ api_data.type_fan_three +"</span>";
            }
            if (api_data.type_fan_four)
            {
            markUp += "<span>"+ api_data.type_fan_four +"</span>";
            }
            if (api_data.type_fan_five)
            {
            markUp += "<span>"+ api_data.type_fan_five +"</span>";
            }
            if (api_data.type_led_one)
            {
            markUp += "<span>"+  api_data.type_led_one +"</span>";
            }
            if (api_data.type_led_two)
            {
            markUp += "<span>"+  api_data.type_led_two +"</span>";
            }
            if (api_data.type_led_three)
            {
            markUp += "<span>"+  api_data.type_led_three +"</span>";
            }
            if (api_data.type_led_four)
            {
            markUp += "<span>"+  api_data.type_led_four +"</span>";
            }
            if (api_data.type_heat_one)
            {
            markUp += "<span>"+  api_data.type_heat_one +"</span>";
            }
            if (api_data.type_heat_two)
            {
            markUp += "<span>"+  api_data.type_heat_two +"</span>";
            }
            markUp += "</td></tr>";
          }

          // Ratings
          // if (api_data.rating_one || api_data.rating_two || api_data.rating_three) {
          //   markUp += "<tr><td><label>Star Ratings</label></td><td>";
          //   if (api_data.rating_one)
          //   {
          //   markUp += "<span>"+  api_data.rating_one +"</span>" ;
          //   }
          //   if (api_data.rating_two)
          //   {
          //   markUp += "<span>"+ api_data.rating_two +"</span>";
          //   }
          //   if (api_data.rating_three)
          //   {
          //   markUp += "<span>"+ api_data.rating_three +"</span>";
          //   }
          //   markUp += "</td></tr>";
          // }

         // LED
         if (api_data.wattage ) {
          var values = api_data.wattage.split(',') ; // Split the comma-separated values into an array
          //var values1 = api_data.input_voltage.split(',');
          markUp += "<tr><td colspan='2'><label>Technical Specifications</label></td></tr>";
          markUp += "<tr><td colspan='2'><div class='scroll-td'><div class='col-tab'><h3>Wattage</h3>"; // Start the inner table

          // Iterate through the values array and add each value to a new row in the inner table
          for (var i = 0; i < values.length; i++) {
            if (values[i] === "") {
              markUp += "<div class='table-row-w'>-</div>";
            } else {
              markUp += "<div class='table-row-w'>" + values[i] + "</div>";
            }
          }


          markUp += "</div>"; // Close the inner table and the outer table row
        }

        // // Type
        if (api_data.input_voltage) {
          var values = api_data.input_voltage.split(','); // Split the comma-separated values into an array

          markUp += "<div class='col-tab'><h3>Input Voltage</h3>"; // Start the inner table

          // Iterate through the values array and add each value to a new row in the inner table
          for (var i = 0; i < values.length; i++) {
            if (values[i] === "") {
              markUp += "<div class='table-row-w'>-</div>";
            } else {
              markUp += "<div class='table-row-w'>" + values[i] + "</div>";
            }
          }

          markUp += "</div>"; // Close the inner table and the outer table row
        }

        // // Trap
        if (api_data.power_factor) {
          var values = api_data.power_factor.split(','); // Split the comma-separated values into an array

          markUp += "<div class='col-tab'><h3>Power Factor</h3>"; // Start the inner table

          // Iterate through the values array and add each value to a new row in the inner table
          for (var i = 0; i < values.length; i++) {
            if (values[i] === "") {
              markUp += "<div class='table-row-w'>-</div>";
            } else {
              markUp += "<div class='table-row-w'>" + values[i] + "</div>";
            }
          }

          markUp += "</div>"; // Close the inner table and the outer table row
        }

        // CRI
        if (api_data.cri) {
          var values = api_data.cri.split(','); // Split the comma-separated values into an array

          markUp += "<div class='col-tab'><h3>CRI</h3>"; // Start the inner table

          // Iterate through the values array and add each value to a new row in the inner table
          for (var i = 0; i < values.length; i++) {
            if (values[i] === "") {
              markUp += "<div class='table-row-w'>-</div>";
            } else {
              markUp += "<div class='table-row-w'>" + values[i] + "</div>";
            }
          }

          markUp += "</div>"; // Close the inner table and the outer table row
        }

        // Voltage Range
        if (api_data.voltage_range) {
          var values = api_data.voltage_range.split(','); // Split the comma-separated values into an array

          markUp += "<div class='col-tab'><h3>Voltage Range</h3>"; // Start the inner table

          // Iterate through the values array and add each value to a new row in the inner table
          for (var i = 0; i < values.length; i++) {
            if (values[i] === "") {
              markUp += "<div class='table-row-w'>-</div>";
            } else {
              markUp += "<div class='table-row-w'>" + values[i] + "</div>";
            }
          }

          markUp += "</div>"; // Close the inner table and the outer table row
        }

        // Features
        if (api_data.lumens) {
          var values = api_data.lumens.split(','); // Split the comma-separated values into an array

          markUp += "<div class='col-tab'><h3>Lumens</h3>"; // Start the inner table

          // Iterate through the values array and add each value to a new row in the inner table
          for (var i = 0; i < values.length; i++) {
            if (values[i] === "") {
              markUp += "<div class='table-row-w'>-</div>";
            } else {
              markUp += "<div class='table-row-w'>" + values[i] + "</div>";
            }
          }

          markUp += "</div></div></td></tr>"; // Close the inner table and the outer table row
        }

          // Fans
          if (api_data.sweep ) {
            var values = api_data.sweep.split(',') ; // Split the comma-separated values into an array
            //var values1 = api_data.input_voltage.split(',');
            markUp += "<tr><td colspan='2'><label>Technical Specifications</label></td>";
            markUp += "<tr><td colspan='2'><div class='scroll-td' id='fan-ghh'><div class='col-tab'><h3>Sweep Size</h3>"; // Start the inner table

            // Iterate through the values array and add each value to a new row in the inner table
            for (var i = 0; i < values.length; i++) {
              if (values[i] === "") {
                markUp += "<div class='table-row-w'>-</div>";
              } else {
                markUp += "<div class='table-row-w'>" + values[i] + "</div>";
              }
            }


            markUp += "</div>"; // Close the inner table and the outer table row
          }

          // Type
          if (api_data.power_input) {
            var values = api_data.power_input.split(','); // Split the comma-separated values into an array

            markUp += "<div class='col-tab'><h3>Power Input</h3>"; // Start the inner table

            // Iterate through the values array and add each value to a new row in the inner table
            for (var i = 0; i < values.length; i++) {
              if (values[i] === "") {
                markUp += "<div class='table-row-w'>-</div>";
              } else {
                markUp += "<div class='table-row-w'>" + values[i] + "</div>";
              }
            }

            markUp += "</div>"; // Close the inner table and the outer table row
          }

          // // Trap
          if (api_data.speed) {
            var values = api_data.speed.split(','); // Split the comma-separated values into an array

            markUp += "<div class='col-tab'><h3>Speed</h3>"; // Start the inner table

            // Iterate through the values array and add each value to a new row in the inner table
            for (var i = 0; i < values.length; i++) {
              if (values[i] === "") {
                markUp += "<div class='table-row-w'>-</div>";
              } else {
                markUp += "<div class='table-row-w'>" + values[i] + "</div>";
              }
            }

            markUp += "</div>"; // Close the inner table and the outer table row
           }

          // Features
          if (api_data.air) {
            var values = api_data.air.split(','); // Split the comma-separated values into an array

            markUp += "<div class='col-tab'><h3>Air Delivery</h3>"; // Start the inner table

            // Iterate through the values array and add each value to a new row in the inner table
            for (var i = 0; i < values.length; i++) {
              if (values[i] === "") {
                markUp += "<div class='table-row-w'>-</div>";
              } else {
                markUp += "<div class='table-row-w'>" + values[i] + "</div>";
              }
            }

            markUp += "</div></div></td></tr></tr>"; // Close the inner table and the outer table row
          }

          // Water Heaters
          if (api_data.capacity) {
            var values = api_data.capacity.split(',') ; // Split the comma-separated values into an array
            //var values1 = api_data.input_voltage.split(',');
            markUp += "<tr><td colspan='2'><label>Technical Specifications</label></td>";
            markUp += "<tr><td colspan='2' class='jdud'><div class='scroll-td' id='heater-tsble-colum'><div class='col-tab'><h3>Capacity <br><span>(in litres)</span></h3>"; // Start the inner table

            // Iterate through the values array and add each value to a new row in the inner table
            for (var i = 0; i < values.length; i++) {
              if (values[i] === "") {
                markUp += "<div class='table-row-w'>-</div>";
              } else {
                markUp += "<div class='table-row-w'>" + values[i] + "</div>";
              }
            }


            markUp += "</div>"; // Close the inner table and the outer table row
          }

          // Type
          if (api_data.power_input_kw) {
            var values = api_data.power_input_kw.split(','); // Split the comma-separated values into an array

            markUp += "<div class='col-tab'><h3>Power Input <br><span>(in kW)</span></h3>"; // Start the inner table

            // Iterate through the values array and add each value to a new row in the inner table
            for (var i = 0; i < values.length; i++) {
              if (values[i] === "") {
                markUp += "<div class='table-row-w'>-</div>";
              } else {
                markUp += "<div class='table-row-w'>" + values[i] + "</div>";
              }
            }

            markUp += "</div>"; // Close the inner table and the outer table row
          }

           // Speed
          // if (api_data.speed) {
          //   var values = api_data.speed.split(','); // Split the comma-separated values into an array

          //   markUp += "<div class='col-tab'><h3>Speed</h3>"; // Start the inner table

          //   // Iterate through the values array and add each value to a new row in the inner table
          //   for (var i = 0; i < values.length; i++) {
          //     if (values[i] === "") {
          //       markUp += "<div class='table-row-w'>-</div>";
          //     } else {
          //       markUp += "<div class='table-row-w'>" + values[i] + "</div>";
          //     }
          //   }

          //   markUp += "</div>"; // Close the inner table and the outer table row
          //  }

          // Features
          if (api_data.weight) {
            var values = api_data.weight.split(','); // Split the comma-separated values into an array

            markUp += "<div class='col-tab'><h3>Weight <br><span>(in kgs)</span></h3>"; // Start the inner table
            
            // Iterate through the values array and add each value to a new row in the inner table
            for (var i = 0; i < values.length; i++) {
              if (values[i] === "") {
                markUp += "<div class='table-row-w'>-</div>";
              } else {
                markUp += "<div class='table-row-w'>" + values[i] + "</div>";
              }
            }

            markUp += "</div></div></td></tr></tr>"; // Close the inner table and the outer table row
          }

          // //Thickness
          // if (api_data.speed) {
          //   markUp += "<tr><td><label>Speed</label></td><td>" + api_data.speed + "</td></tr>";
          // }

          if (api_data.colour) {
            markUp += "<tr><td><label>Colours</label></td><td>" + api_data.colour + "</td></tr>";
          }


          // if (api_data.input_voltage) {
          //   markUp += "<tr><td><label>Input Voltage</label></td><td>" + api_data.input_voltage + "</td></tr>";
          // }

          // if (api_data.power_factor) {
          //   markUp += "<tr><td><label>Power Factor</label></td><td>" + api_data.power_factor + "</td></tr>";
          // }
          
          
          if (api_data.colour_temperature) {
            markUp += "<tr class='elec-features features-w-50'><td ><h4>Features</h4></td>";
            markUp += "<td colspan='2' class='jdud'><table class='fa-uu'><tr><td><b>Colour Temperature</b></td>";

            markUp += "<td colspan='2'>" + api_data.colour_temperature + "</td>";

            markUp += "</tr>";
          }
           
          if (api_data.life) {
            markUp += "<tr><td><b>Life</b></td>";

            markUp += "<td colspan='2'>" + api_data.life + "</td>";

            markUp += "</tr>";
          }

          // if (api_data.cri) {
          //   markUp += "<tr><td><label>CRI</label></td><td>" + api_data.cri + "</td></tr>";
          // }


          if (api_data.surge_protection) {
            markUp += "<tr><td><b>Surge Protection</b></td>";
  
            markUp += "<td class='surge_protection-td' colspan='2'>" + api_data.surge_protection + "</td>";
  
            markUp += "</tr>";
          }
  
          if (api_data.warranty) {
            markUp += "<tr><td><b>Warranty</b></td>";
            
            markUp += "<td colspan='2'>"  + api_data.warranty + "</td>";
  
            markUp += "</tr>";
          }
  
          if (api_data.cap_type) {
            markUp += "<tr><td><b>Cap Type</b></td>";
            
            markUp += "<td colspan='2'>"  + api_data.cap_type + "</td>";
  
            markUp += "</tr>";
          }
  
          //Body
          if (api_data.body_one || api_data.body_two) {
            markUp += "<tr><td ><b>Body</b></td>";
            
              markUp += "<td>"+ api_data.body_one +" </td>";
  
              markUp += "<td style='padding: 0;'>"+ api_data.body_two +"</td>";
            
            markUp += "</tr></table></td></tr>";
          }

          // if (api_data.ip) {
          //   markUp += "<tr><td><label>IP</label></td><td>" + api_data.ip + "</td></tr>";
          // }

          // if (api_data.voltage_range) {
          //   markUp += "<tr><td><label>Voltage Range</label></td><td>" + api_data.voltage_range + "</td></tr>";
          // }

          // if (api_data.cap_type) {
          //   markUp += "<tr><td><label>Cap Type</label></td><td>" + api_data.cap_type + "</td></tr>";
          // }
          
          

          // if (api_data.shape_one) {
          //   markUp += "<tr><td><label>Shape</label></td><td></td></tr>";
          // }

          //Body Heaters
          if (api_data.body_three || api_data.body_four) {
            markUp += "<tr><td><label>Body</label></td><td>";
            if (api_data.body_three) {
              markUp += "<span>"+ api_data.body_three +"</span>";
            }
            if (api_data.body_four) {
              markUp += "<span>"+ api_data.body_four +"</span>";
            }

            markUp += "</td></tr>";
            }

            if (api_data.product) {
              markUp += "<tr class='elec-features features-w-50'><td ><h4>Warranty</h4></td>";
              markUp += "<td colspan='2' class='jdud'><tr><table class='fa-uu'><tr><td><b>Product</b></td>";
  
              markUp += "<td>" + api_data.product + "</td>";
  
              markUp += "</tr>";
            }
  
            if (api_data.element) {
              markUp += "<tr><td><b>Element</b></td>";
  
              markUp += "<td>" + api_data.element + "</td>";
  
              markUp += "</tr>";
              
            }
  
            if (api_data.tank) {
              markUp += "<tr><td><b>Tank</b></td>";
              
              markUp += "<td>" + api_data.tank + "</td>";
              
              markUp += "</tr></table></tr></td></tr>";
              
            }

          // if (api_data.other) {
          //   markUp += "<tr><td><label>Other</label></td><td>" + api_data.other + "</td></tr>";
          // }

          // Finish
          if (api_data.finish_one || api_data.finish_two || api_data.finish_three) {
            markUp += "<tr><td><label>Finish</label></td><td>";
            if (api_data.finish_one) {
              markUp += "<span>"+ api_data.finish_one +"</span>";
            }
            if (api_data.finish_two) {
              markUp += "<span>"+ api_data.finish_two +"</span>";
            }
            if (api_data.finish_three) {
              markUp += "<span>"+ api_data.finish_three +"</span>";
            }
            markUp += "</td></tr>";
          }

          if (api_data.application) {
            markUp += "<tr><td><label>Application</label></td><td>" + api_data.application + "</td></tr>";
          }

          if (api_data.collection) {
            markUp += "<tr><td><label>Collection</label></td><td>" + api_data.collection + "</td></tr>";
          }

          //Shape
          if (api_data.shape_one || api_data.shape_two || api_data.shape_three) {
            markUp += "<tr><td><label>Shape</label></td><td>";
            if (api_data.shape_one) {
              markUp += "<span>"+ api_data.shape_one +"</span>";
            }
            if (api_data.shape_two) {
              markUp += "<span>"+ api_data.shape_two +"</span>";
            }
            if (api_data.shape_three) {
              markUp += "<span>"+ api_data.shape_three +"</span>";
            }
            markUp += "</td></tr>";
          }


          if (api_data.thermostat) {
            markUp += "<tr><td><label>Thermostat Type</label></td><td>" + api_data.thermostat + "</td></tr>";
          }



          // if (api_data.icon_img) {
          //   var images = api_data.icon_img.split(',');
          //   console.log(images);
            
          //   $.each(images, function(index, value) { 
          //    markUp += '<tr><td colspan="2"><img src="images/' + api_data.path + value + '" alt="" class="img-responsive"></td></tr>';
          //   });
            
          // }



          if (api_data.icon_img) {
            markUp += "<tr class='elec-features'><td colspan='2'><h4>Features</h4>" + api_data.icon_img + "</td></tr>";
          }
  
            // // Finish
            // if (api_data.finish || api_data.finish_one) {
            //   markUp += "<tr><td><label>Finish</label></td><td>";
            //   if (api_data.finish) {
            //     markUp += "<span>"+ api_data.finish +"</span>";
            //   }
            //   if (api_data.finish_one) {
            //     markUp += "<span>"+ api_data.finish_one +"</span>";
            //   }
            //   markUp += "</td></tr>";
            // }
            // //Thickness
            // if (api_data.thickness) {
            //   markUp += "<tr><td><label>Thickness</label></td><td>" + api_data.thickness + "</td></tr>";
            // }
  
            // //Dimension
            // if (api_data.dimension) {
            //   markUp += "<tr><td><label>Dimension</label></td><td>" + api_data.dimension + "</td></tr>";
            // }
  
            // // //Path
            // // if (api_data.path) {
            // //   markUp += "<tr><td><label>Path</label></td><td>" + api_data.path + "</td></tr>";
            // // }
  
            // //Other
            // if (api_data.other) {
            //   markUp += "<tr><td><label>Other</label></td><td>" + api_data.other + "</td></tr>";
            // }
  
            // //Collection
            // if (api_data.collection) {
            //   markUp += "<tr><td><label>Collection</label></td><td>" + api_data.collection + "</td></tr>";
            // }
  
            // //View
            // if (api_data.view) {
            //   markUp += "<tr><td><label>360 Degree View</label></td><td>" + api_data.view + "</td></tr>";
            // }
            markUp += "</table></div></div></div></div>" + buttons + "</div>";
            
                $('#product_detail').html(markUp);
                $('#exampleModalCenter').modal("show");
                var swiper = new Swiper("#swiper"+product_id+"", {
                  navigation: {
                    nextEl: ".swiper-button-next",
                    prevEl: ".swiper-button-prev",
                  },
                });
            }
        });
    } 
  
    $(document).on('click', '.view_data', function() {
  
        var inp = $('.view_data');
  
        //console.log(this);
        var index = inp.index(this);
  
        var next = inp[index + 1];
        var prev = inp[index - 1];
  
        //console.log($(prev).attr("id"));
        //console.log($(next).attr("id"));
  
        var product_id = $(this).attr("id");
        var p_product_id = $(prev).attr("id");
        var n_product_id = $(next).attr("id");
        fetch_post_data(product_id);
    });
  
     /*
    $(document).on('click', '.previous', function() {
        var product_id = $(this).attr("id");
  
        var inp = $('.view_data');
  
  
  
        var index = inp.index(vv);
        console.log(index);
        var next = inp[index + 1];
        var prev = inp[index - 1];
  
        console.log($(prev).attr("id"));
        console.log($(next).attr("id"));
  
        fetch_post_data(product_id);
    });
  
    $(document).on('click', '.next', function() {
        var product_id = $(this).attr("id");
        var inp = $('.view_data');
  
        var index = inp.index(this);
        console.log(index);
        var next = inp[index + 1];
        var prev = inp[index - 1];
        
        console.log($(prev).attr("id"));
        console.log($(next).attr("id"));
        fetch_post_data(product_id);
    });
  
    <tr><td><label>Finish</label></td><td>"+api_data.finish+"</td></tr><tr><td ><label>Set</label></td><td width=70%>"+api_data.concept+"</td></tr>
    */
  
    
    $(document).on('click', '.previous', function() {
      var product_id = parseInt($(this).attr("id"));
      fetch_post_data(product_id);
      
    });
  
    $(document).on('click', '.next', function() {
      var product_id = parseInt($(this).attr("id"));
      fetch_post_data(product_id);
        
    });
  
  
  });