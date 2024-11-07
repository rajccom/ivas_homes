$(document).ready (function(){
    
    $(txt_search).keyup(function()
    {
        var Search = $('#txt_search').val();
        if(Search != ""){
            $.ajax({
                url: './bath-fittings/bath-fitting_search.php',
                method: 'POST',
                data: {search:Search},
                success: function(data){
                    $('#content').html(data);
                }
            })

        }
        // else
        // {
        //      $('#content').html(data);
        // }

    //   $(document).on('click',  'a', function(){
    //     $('#txt_search').val($(this).val());

    //   })
      
    });

});

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
            url: "./bath-fittings/bath-fitting_product.php",
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
                imgMarkup += '<div class="swiper-slide">';
                imgMarkup += '<img src="images/' + api_data.path + value + '" alt="'+api_data.img_alt+'" class="img-responsive">';
                if (api_data.view && api_data.view !== '') {
                  imgMarkup += '<a href="' + api_data.view + '" target="_blank"><img src="images/360.png" alt="360" class="360-icon"></a>';
                }
                if (api_data.ambience_view && api_data.ambience_view !== '') {
                  imgMarkup += '<a href="' + api_data.ambience_view + '" target="_blank"><img src="images/ambience.png" alt="360" class="360-icon"></a>';
                }
                imgMarkup += '</div>';
            });
            imgMarkup += '</div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div>';
            var markUp = "<div class=table-responsive id='data'><div class='row popup-content-u'><div class='col-6 pd-image-popup'>" + imgMarkup + "</div><div class='col-6 popup-details-s'><h2>" + api_data.product_name + "</h2><div class='table-scroll'><table class='table'>";

             // Category
             if (api_data.category) {
              markUp += "<tr><td><label>Category</label></td><td >"+api_data.category+"</td></tr>";
            }

            // IM Code
            if (api_data.im_code) {
              markUp += "<tr><td><label>IM Code</label></td><td>"+api_data.im_code+"</td></tr>";
            }

            // Colour
         if (api_data.colour || api_data.colour_one || api_data.colour_two || api_data.colour_three || api_data.colour_four || api_data.colour_five) {
          markUp += "<tr><td><label>Colour</label></td><td>";
          if (api_data.colour)
          {
          markUp += "<span>"+ api_data.colour  +"</span>";
          }
          if (api_data.colour_one)
          {
          markUp += "<span>"+ api_data.colour_one +"</span>";
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
          if (api_data.colour_seven)
          {
          markUp += "<span>"+ api_data.colour_seven +"</span>";
          }
          if (api_data.colour_eight)
          {
          markUp += "<span>"+ api_data.colour_eight +"</span>";
          }
          if (api_data.colour_nine)
          {
          markUp += "<span>"+ api_data.colour_nine +"</span>";
          }
          if (api_data.colour_ten)
          {
          markUp += "<span>"+ api_data.colour_ten +"</span>";
          }
          if (api_data.colour_eleven)
          {
          markUp += "<span>"+ api_data.colour_eleven +"</span>";
          }
          if (api_data.colour_twelve)
          {
          markUp += "<span>"+ api_data.colour_twelve +"</span>";
          }
          if (api_data.colour_thirteen)
          {
          markUp += "<span>"+ api_data.colour_thirteen +"</span>";
          }
          markUp += "</td></tr>";
        }
        if (api_data.packing) {
          markUp += "<tr><td><label>Packing</label></td><td>"+api_data.packing+"</td></tr>";
        }

        if (api_data.dimension) {
          markUp += "<tr><td><label>Dimension</label></td><td>"+api_data.dimension+"</td></tr>";
        }
        
        if (api_data.type) {
          markUp += "<tr><td><label>Type</label></td><td>"+api_data.type+"</td></tr>";
        }

        if (api_data.cock_type) {
          markUp += "<tr><td><label>Cock Type</label></td><td>"+api_data.cock_type+"</td></tr>";
        }

        if (api_data.finish || api_data.finish_one || api_data.finish_two || api_data.finish_three || api_data.finish_four || api_data.finish_five) {
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
        markUp += "<span>"+ api_data.finish_four +"</span>";
        }
        if (api_data.finish_five)
        {
        markUp += "<span>"+ api_data.finish_five  +"</span>";
        }
        markUp += "</td></tr>";
      }

          if (api_data.collection) {
            markUp += "<tr><td><label>Collection</label></td><td>" + api_data.collection + "</td></tr>";
          }

          if (api_data.features) {
            markUp += "<tr><td><label>Features</label></td><td>" + api_data.features + "</td></tr>";
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