
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
        var categroy = get_filter('categroy');
        var colour = get_filter('colour');
        var colour_one = get_filter('colour_one');
        var colour_two = get_filter('colour_two');
        var colour_three = get_filter('colour_three');
		    var colour_four = get_filter('colour_four');
        var colour_five = get_filter('colour_five');
        var colour_six = get_filter('colour_six');
        var type = get_filter('type');
        var cock_type = get_filter('cock_type');
        var finishs = get_filter('finishs');
        // var finish_one = get_filter('finish_one');
        // var finish_two = get_filter('finish_two');
        // var finish_three = get_filter('finish_three');
        // var finish_four = get_filter('finish_four');
        // var finish_five = get_filter('finish_five');
        // var finish_six = get_filter('finish_six');
        // var finish_seven = get_filter('finish_seven');
        // var finish_eight = get_filter('finish_eight');
        // var finish_nine = get_filter('finish_nine');
        // var finish_ten = get_filter('finish_ten');
        // var finish_eleven = get_filter('finish_eleven');
        // var finish_twelve = get_filter('finish_twelve');
        // var finish_thirteen = get_filter('finish_thirteen');
        // var finish_fourteen = get_filter('finish_fourteen');
        // var finish_fifteen = get_filter('finish_fifteen');
        // var finish_sixteen = get_filter('finish_sixteen');
        // var finish_seventeen = get_filter('finish_seventeen');
        // var finish_eighteen = get_filter('finish_eighteen');
        // var finish_nineteen = get_filter('finish_nineteen');
        // var finish_twenty = get_filter('finish_twenty');
        // var finish_twenty_one = get_filter('finish_twenty_one');
        var base_materials = get_filter('base_materials');
        // var base_material_one = get_filter('base_material_one');
        // var base_material_two = get_filter('base_material_two');
        //var base_material = get_filter('base_material');
        $.ajax({
            url:"./designer-hardware/designer-hardware_data.php",
            method:"POST",
            data:{action:action, categroy:categroy, last_id:lastId, colour:colour, colour_one:colour_one, colour_two:colour_two, colour_three:colour_three, colour_four:colour_four, colour_five:colour_five, colour_six:colour_six, type:type, cock_type:cock_type, finishs:finishs, base_materials:base_materials},
            beforeSend:function(){
              $(".product-filter-y").addClass("disable");
              $('.loader').show();
              $('.loader-1').show();
          },
          
            success:function(data){
              setTimeout(function() {
                $(".product-filter-y").removeClass("disable");
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

// POP UP Function Start Here
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
          url: "./designer-hardware/designer-hardware_product.php",
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
              imgMarkup += '<div class="swiper-slide"><img src="images/' + api_data.path + value + '" alt="'+api_data.img_alt+'" class="img-responsive"></div>';
          });
          imgMarkup += '</div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div>';
          var markUp = "<div class=table-responsive id='data'><div class='row popup-content-u'><div class='col-6 pd-image-popup'>" + imgMarkup + "</div><div class='col-6 popup-details-s'><h2>" + api_data.product_name + "</h2><div class='table-scroll'><table class='table'>";
            
          if (api_data.categroy) {
            markUp += "<tr><td><label>Category</label></td><td>"+api_data.categroy+"</td></tr>";
          }

          if (api_data.im_code) {
            markUp += "<tr><td><label>IM Code</label></td><td>"+api_data.im_code+"</td></tr>";
          }

          if (api_data.colour || api_data.colour_one || api_data.colour_two || api_data.colour_three || api_data.colour_four || api_data.colour_five || api_data.colour_six) {
            markUp += "<tr><td><label>Colour</label></td><td>";

            if (api_data.colour)
            {
            markUp += "<span>"+api_data.colour +"</span>";
            }

            if (api_data.colour_one)
            {
            markUp +="<span>"+ api_data.colour_one +"</span>";
            }

            if (api_data.colour_two)
            {
            markUp += "<span>"+ api_data.colour_two +"</span>";
            }

            if (api_data.colour_three)
            {
            markUp += "<span>"+ api_data.colour_three +"</span>";
            }

            if (api_data.colour_four)
            {
            markUp += "<span>"+ api_data.colour_four +"</span>";
            }

            if (api_data.colour_five)
            {
            markUp += "<span>"+ api_data.colour_five +"</span>";
            }

            if (api_data.colour_six)
            {
            markUp += "<span>"+ api_data.colour_six +"</span>";
            }
            markUp += "</td></tr>";
          }

          if (api_data.packing) {
            markUp += "<tr><td><label>Packing</label></td><td>"+api_data.packing+"</td></tr>";
          }

          if (api_data.dimension) {
            markUp += "<tr><td><label>Dimension</label></td><td>"+api_data.dimension+"</td></tr>";
          }

          if (api_data.thickness || api_data.thickness_one || api_data.thickness_two) {
            markUp += "<tr><td><label>Thickness</label></td><td>";
            
            if (api_data.thickness)
            {
            markUp += "<span>"+ api_data.thickness +"</span>";
            }

            if (api_data.thickness_one)
            {
            markUp += "<span>"+ api_data.thickness_one +"</span>";
            }

            if (api_data.thickness_two)
            {
            markUp += "<span>"+ api_data.thickness_two +"</span>";
            }

            markUp += "</td></tr>";

          }

          if (api_data.type) {
            markUp += "<tr><td><label>Type</label></td><td>"+api_data.type+"</td></tr>";
          }

          if (api_data.cock_type) {
            markUp += "<tr><td><label>Cock Type</label></td><td>"+api_data.cock_type+"</td></tr>";
          }

          if (api_data.finish || api_data.finish_one || api_data.finish_two || api_data.finish_three || api_data.finish_four || api_data.finish_five || api_data.finish_six || api_data.finish_seven || api_data.finish_eight || api_data.finish_nine || api_data.finish_ten || api_data.finish_eleven || api_data.finish_twelve || api_data.finish_thirteen || api_data.finish_fourteen || api_data.finish_fifteen || api_data.finish_sixteen || api_data.finish_seventeen || api_data.finish_eighteen || api_data.finish_nineteen || api_data.finish_twenty || api_data.finish_twenty_one) {
            markUp += "<tr><td><label>Finish</label></td><td>";
            if (api_data.finish)
            {
            markUp += "<span>"+ api_data.finish  +"</span>";
            }
            if (api_data.finish_one)
            {
            markUp += "<span>"+ api_data.finish_one +"</span>";
            }
            if (api_data.finish_two)
            {
            markUp += "<span>"+ api_data.finish_two +"</span>";
            }
            if (api_data.finish_three)
            {
            markUp += "<span>"+ api_data.finish_three +"</span>";
            }
            if (api_data.finish_four)
            {
            markUp += "<span>"+ api_data.finish_four +"</span>" ;
            }
            if (api_data.finish_five)
            {
            markUp += "<span>"+ api_data.finish_five +"</span>" ;
            }
            if (api_data.finish_six)
            {
            markUp += "<span>"+ api_data.finish_six +"</span>";
            }
            if (api_data.finish_seven)
            {
            markUp += "<span>"+ api_data.finish_seven +"</span>";
            }
            if (api_data.finish_eight)
            {
            markUp += "<span>"+ api_data.finish_eight +"</span>";
            }
            if (api_data.finish_nine)
            {
            markUp += "<span>"+ api_data.finish_nine +"</span>";
            }
            if (api_data.finish_ten)
            {
            markUp += "<span>"+ api_data.finish_ten +"</span>";
            }
            if (api_data.finish_eleven)
            {
            markUp += "<span>"+ api_data.finish_eleven +"</span>";
            }
            if (api_data.finish_twelve)
            {
            markUp += "<span>"+ api_data.finish_twelve +"</span>";
            }
            if (api_data.finish_thirteen)
            {
            markUp += "<span>"+ api_data.finish_thirteen +"</span>";
            }
            if (api_data.finish_fourteen)
            {
            markUp += "<span>"+ api_data.finish_fourteen +"</span>";
            }
            if (api_data.finish_fifteen)
            {
            markUp += "<span>"+ api_data.finish_fifteen +"</span>";
            }
            if (api_data.finish_sixteen)
            {
            markUp += "<span>"+ api_data.finish_sixteen +"</span>";
            }
            if (api_data.finish_seventeen)
            {
            markUp += "<span>"+ api_data.finish_seventeen +"</span>";
            }
            if (api_data.finish_eighteen)
            {
            markUp += "<span>"+ api_data.finish_eighteen +"</span>";
            }
            if (api_data.finish_nineteen)
            {
            markUp += "<span>"+ api_data.finish_nineteen +"</span>";
            }
            if (api_data.finish_twenty)
            {
            markUp += "<span>"+ api_data.finish_twenty +"</span>";
            }
            if (api_data.finish_twenty_one)
            {
            markUp += "<span>"+ api_data.finish_twenty_one +"</span>";
            }

            markUp += "</td></tr>";
          }
           
          if (api_data.base_material || api_data.base_material_one || api_data.base_material_two) {
            markUp += "<tr><td><label>Base Material</label></td><td>";
            if (api_data.base_material)
            {
            markUp += "<span>"+ api_data.base_material +"</span>";
            }
            if (api_data.base_material_one)
            {
            markUp += "<span>"+ api_data.base_material_one +"</span>";
            }
            if (api_data.base_material_two)
            {
            markUp += "<span>"+ api_data.base_material_two +"</span>";
            }
            markUp += "</td></tr>";
          }

          if (api_data.capacity) {
            markUp += "<tr><td><label>Capacity</label></td><td>" + api_data.capacity + "</td></tr>";
          }

          if (api_data.collection) {
            markUp += "<tr><td><label>Collection</label></td><td>" + api_data.collection + "</td></tr>";
          }

          if (api_data.features) {
            markUp += "<tr><td><label>Features</label></td><td>" + api_data.features + "</td></tr>";
          }

          if (api_data.weight) {
            markUp += "<tr><td><label>Weight</label></td><td>" + api_data.weight + "</td></tr>";
          }

          if (api_data.view) {
            markUp += "<tr><td><label>360 Degree View</label></td><td>" + api_data.view + "</td></tr>";
          }

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