$(document).ready (function(){
    
    $(txt_search).keyup(function()
    {
        var Search = $('#txt_search').val();
        if(Search != ""){
            $.ajax({
                url: './tiles/tiles_search.php',
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
            url: "./tiles/tiles_product.php",
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
                  imgMarkup += '<a href="' + api_data.view + '" class="rotate-image-product" target="_blank"><img src="images/360.png" alt="360" class="360-icon"></a>';
                }
                if (api_data.ambience_view && api_data.ambience_view !== '') {
                  imgMarkup += '<a href="' + api_data.ambience_view + '" target="_blank" class="ambience-po"><img src="images/ambience.png" alt="360" class="360-icon"></a>';
                }
                imgMarkup += '</div>';

            });
            imgMarkup += '</div><div class="swiper-button-next"></div><div class="swiper-button-prev"></div></div>';
            var markUp = "<div class=table-responsive id='data'><div class='row popup-content-u'><div class='col-6 pd-image-popup'>" + imgMarkup + "</div><div class='col-6 popup-details-s'><h2>" + api_data.product_name + "</h2><div class='table-scroll'><table class='table'>";

            // Category
            if (api_data.category) {
              markUp += "<tr><td><label>Category</label></td><td>" + api_data.category + "</td></tr>";
            }
            
            // Title
            if (api_data.tile_name) {
              markUp += "<tr><td><label>Title</label></td><td>" + api_data.tile_name + "</td></tr>";
            }
            
            // IM Code
            if (api_data.im_code) {
              markUp += "<tr><td><label>IM Code</label></td><td>" + api_data.im_code + "</td></tr>";
            }
            
            // Packing
            if (api_data.packing) {
              markUp += "<tr><td><label>Packing</label></td><td>" + api_data.packing + "</td></tr>";
            }
            
            // SKU Type
            if (api_data.sku_type) {
              markUp += "<tr><td><label>SKU Type</label></td><td>" + api_data.sku_type + "</td></tr>";
            }
            
            // VSKU Code
            if (api_data.vsku_code) {
              markUp += "<tr><td><label>VSKU Code</label></td><td>" + api_data.vsku_code + "</td></tr>";
            }
            
            // Base Material
            if (api_data.base_material) {
              markUp += "<tr><td><label>Base Material</label></td><td>" + api_data.base_material + "</td></tr>";
            }
            
            // Color
            if (api_data.color) {
              markUp += "<tr><td><label>Color</label></td><td>" + api_data.color + "</td></tr>";
            }
            
            // Finish
            if (api_data.finish || api_data.finish_one) {
              markUp += "<tr><td><label>Finish</label></td><td>";
              if (api_data.finish) {
                markUp += "<span>"+ api_data.finish +"</span>";
              }
              if (api_data.finish_one) {
                markUp += "<span>"+ api_data.finish_one +"</span>";
              }
              markUp += "</td></tr>";
            }
            
            // Style
            if (api_data.style) {
              markUp += "<tr><td><label>Style</label></td><td>" + api_data.style + "</td></tr>";
            }
            
            // Size
            if (api_data.size) {
              markUp += "<tr><td><label>Size</label></td><td>" + api_data.size + "</td></tr>";
            }
            
            // Application
            if (api_data.application || api_data.application_one) {
              markUp += "<tr><td><label>Application</label></td><td>";
              if (api_data.application) {
                markUp += "<span>"+ api_data.application  +"</span>";
              }
              if (api_data.application_one) {
                markUp += "<span>"+ api_data.application_one +"</span>";
              }
              if (api_data.application_two) {
                markUp += "<span>"+  api_data.application_two +"</span>";
              } 
              markUp += "</td></tr>";
            }
            
            // Application Areas
            if (api_data.application_areas || api_data.application_areas_one || api_data.application_areas_two || api_data.application_areas_three || api_data.application_areas_four || api_data.application_areas_five) {
              markUp += "<tr><td><label>Application Areas</label></td><td>";
              if (api_data.application_areas)
              {
                markUp += "<span>"+  api_data.application_areas  +"</span>";
              }
              if (api_data.application_areas_one) {
                markUp += "<span>"+  api_data.application_areas_one +"</span>";
              }
              if (api_data.application_areas_two) {
                markUp += "<span>"+ api_data.application_areas_two +"</span>";
              }
              if (api_data.application_areas_three) {
                markUp += "<span>"+  api_data.application_areas_three +"</span>";
              }
              if (api_data.application_areas_four) {
                markUp += "<span>"+  api_data.application_areas_four +"</span>";
              }
              if (api_data.application_areas_five) {
                markUp += "<span>"+  api_data.application_areas_five +"</span>";
              }
              markUp += "</td></tr>";
            }
            
            // 360 Degree View
            /*if (api_data.view) {
              markUp += "<tr><td><label>360 Degree View</label></td><td>" + api_data.view + "</td></tr>";
            }*/
            
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