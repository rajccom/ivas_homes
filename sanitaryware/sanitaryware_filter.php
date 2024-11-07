
<div class="clear-filter"> 
  <a href="sanitaryware/products/"><i class="fa fa-times" aria-hidden="true"></i> Clear Filter</a>
  <!-- <button onClick="window.location.href=window.location.href">
    <i class="fa fa-times" aria-hidden="true"></i> Clear Filter
  </button> -->
</div>
<div class="accordion">
<div class="accordion-item">
  <h2 class="accordion-header" id="cat-filter">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cat-filter-j" aria-expanded="false" aria-controls="cat-filter">
    Category
    </button>
  </h2>  
  <?php
  $category = isset($_GET['category']) ? str_replace('-',' ',$_GET['category']) : '';
  // $colour = isset($_GET['colour']) ? str_replace('-',' ',$_GET['colour']) : '';
  $colour = isset($_GET['colour']) ? explode(',', str_replace('-', ' ', $_GET['colour'])) : [];
  $type = isset($_GET['type']) ? explode(',', str_replace('-', ' ', $_GET['type'])) : [];
  // $selected_type = isset($_GET['type']) ? str_replace('-',' ',$_GET['type']) : '';
  $trap = isset($_GET['trap']) ? str_replace('-',' ',$_GET['trap']) : '';
  $finish = isset($_GET['finish']) ? explode(',', str_replace('-', ' ', $_GET['finish'])) : [];
  //$selected_finish = isset($_GET['finish']) ? str_replace('-',' ',$_GET['finish']) : '';
  $selected_collection = isset($_GET['collection']) ? str_replace('-',' ',$_GET['collection']) : '';
  // $size = isset($_GET['size']) ? str_replace('-',' ',$_GET['size']) : '';
  // $application = isset($_GET['app']) ? str_replace('-',' ',$_GET['app']) : '';
  // $application_areas = isset($_GET['app_area']) ? str_replace('-',' ',$_GET['app_area']) : '';
  ?>
<div id="cat-filter-j" class="accordion-collapse collapse" aria-labelledby="cat-filter" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <?php
      $query = "SELECT DISTINCT(category) FROM sanitaryware WHERE product_status = '1' ORDER BY product_id ASC";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach ($result as $row) {
        if ($row['category'] != '') {
          $checked = '';
          if (in_array($row['category'], explode(',', $category))) {
            $checked = 'checked="checked"';
          }
          ?>
          <div class="product-filter-y checkbox">
            <label>
              <input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>" <?php echo $checked; ?>>
              <?php echo $row['category']; ?>
            </label>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</div>

<div class="accordion-item">
  <h2 class="accordion-header" id="colour">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#colour-s" aria-expanded="false" aria-controls="colour">
    Colour
    </button>
  </h2>
  <div id="colour-s" class="accordion-collapse collapse" aria-labelledby="colour" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

      $query = "
      SELECT DISTINCT colours
      FROM (
          SELECT colour as colours FROM sanitaryware WHERE product_status = '1'
          UNION
          SELECT colour_one FROM sanitaryware WHERE product_status = '1'
          UNION
          SELECT colour_two FROM sanitaryware WHERE product_status = '1'
          UNION
          SELECT colour_three FROM sanitaryware WHERE product_status = '1'
          UNION
          SELECT colour_four FROM sanitaryware WHERE product_status = '1'
          UNION
          SELECT colour_five FROM sanitaryware WHERE product_status = '1'
      ) AS colours_table
      ORDER BY colours ASC
      ";

      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();

      foreach ($result as $row) {
      $colours_value = $row['colours'];
      if ($colours_value != '') {
          $checked = '';
          if (in_array($colours_value, $colour)) {
              $checked = 'checked="checked"';
          }
          ?>
          <div class="product-filter-y checkbox">
              <label>
                  <input type="checkbox" class="common_selector colours" value="<?php echo $colours_value; ?>" <?php echo $checked; ?>>
                  <?php echo $colours_value; ?>
              </label>
          </div>
          <?php
      }
      }

      ?>
    
    </div>
  </div>
</div>

<div class="accordion-item">
  <h2 class="accordion-header" id="type">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#type-t" aria-expanded="false" aria-controls="type">
      Type
    </button>
  </h2>
  <div id="type-t" class="accordion-collapse collapse" aria-labelledby="type" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

      $query = "
      SELECT DISTINCT types
      FROM (
          SELECT type as types FROM sanitaryware WHERE product_status = '1'
          UNION
          SELECT type_one FROM sanitaryware WHERE product_status = '1'
      ) AS types_table
      ORDER BY types ASC
      ";

      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();

      foreach ($result as $row) {
      $types_value = $row['types'];
      if ($types_value != '') {
          $checked = '';
          if (in_array($types_value, $type)) {
              $checked = 'checked="checked"';
          }
          ?>
          <div class="product-filter-y checkbox">
              <label>
                  <input type="checkbox" class="common_selector types" value="<?php echo $types_value; ?>" <?php echo $checked; ?>>
                  <?php echo $types_value; ?>
              </label>
          </div>
          <?php
      }
      }

      ?>
      
    </div>
  </div>
</div>





<div class="accordion-item">
  <h2 class="accordion-header" id="finish">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finish-f" aria-expanded="false" aria-controls="finish">
      Finish
    </button>
  </h2>
  <div id="finish-f" class="accordion-collapse collapse" aria-labelledby="finish" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

        $query = "
        SELECT DISTINCT finishs
        FROM (
            SELECT finish as finishs FROM sanitaryware WHERE product_status = '1'
            UNION
            SELECT finish_one FROM sanitaryware WHERE product_status = '1'
        ) AS finishs_table
        ORDER BY finishs ASC
        ";

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach ($result as $row) {
        $finishs_value = $row['finishs'];
        if ($finishs_value != '') {
            $checked = '';
            if (in_array($finishs_value, $finish)) {
                $checked = 'checked="checked"';
            }
            ?>
            <div class="product-filter-y checkbox">
                <label>
                    <input type="checkbox" class="common_selector finishs" value="<?php echo $finishs_value; ?>" <?php echo $checked; ?>>
                    <?php echo $finishs_value; ?>
                </label>
            </div>
            <?php
        }
        }

        ?>
     
    
    </div>
  </div>
</div>


<div class="accordion-item">
  <h2 class="accordion-header" id="collection">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collection-c" aria-expanded="false" aria-controls="collection">
      Collection
    </button>
  </h2>
  <div id="collection-c" class="accordion-collapse collapse" aria-labelledby="collection" data-bs-parent="#accordionExample">
    <div class="accordion-body">

      <?php
      $query = "
        SELECT DISTINCT collection
        FROM sanitaryware
        WHERE product_status = '1'
        ORDER BY product_id ASC
      ";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();

      // Display checkboxes for collections
      foreach ($result as $row) {
        $collection = $row['collection'];
        if (!empty($collection)) {
          $checked = ($collection == $selected_collection) ? 'checked="checked"' : '';
          ?>
          <div class="product-filter-y checkbox">
            <label>
              <input type="checkbox" class="common_selector collection" value="<?php echo $collection; ?>" <?php echo $checked; ?>>
              <?php echo $collection; ?>
            </label>
          </div>
          <?php
        }
      }
      ?>
    </div>
  </div>
</div>



</div>


<!-- <script>
  $(document).ready(function() {
    // Function to update the URL and perform filtering
    function filterProducts() {
      var category = [];
      var colour = [];
      var type = [];
      var trapType = [];
      var finish = [];
      var collection = [];

      // Get selected checkbox values
      $('.common_selector.category:checked').each(function() {
        category.push($(this).val());
      });
      $('.common_selector.colour:checked').each(function() {
        colour.push($(this).val());
      });
      $('.common_selector.type:checked').each(function() {
        type.push($(this).val());
      });
      $('.common_selector.trap_type:checked').each(function() {
        trapType.push($(this).val());
      });
      $('.common_selector.finish:checked').each(function() {
        finish.push($(this).val());
      });
      $('.common_selector.collection:checked').each(function() {
        collection.push($(this).val());
      });
// Build the URL parameters
      var params = [];
      if (category.length > 0) {
        params.push('category=' + category.join('-'));
      }
      if (colour.length > 0) {
        params.push('colour=' + colour.join('-'));
      }
      if (type.length > 0) {
        params.push('type=' + type.join('-'));
      }
      if (trapType.length > 0) {
        params.push('trap=' + trapType.join('-'));
      }
      if (finish.length > 0) {
        params.push('finish=' + finish.join('-'));
      }
      if (collection.length > 0) {
        params.push('collection=' + collection.join('-'));
      }

      // Build the new URL with updated parameters
      var url = window.location.href.split('?')[0];
      if (params.length > 0) {
        url += '?' + params.join('&');
      }

      // Update the URL
      history.pushState(null, null, url);

      // Perform filtering
      filter_data();
    }

    // Function to perform AJAX filtering
    function filter_data() {
      var category = getFilterValues('category');
      var colour = getFilterValues('colour');
      var type = getFilterValues('type');
      var trap = getFilterValues('trap');
      var finish = getFilterValues('finish');
      var collection = getFilterValues('collection');

      // Send AJAX request to filter the products
      $.ajax({
        url: 'fetch_data.php',
        method: 'POST',
        data: {
          category: category,
          colour: colour,
          type: type,
          trap: trap,
          finish: finish,
          collection: collection
        },
        success: function(data) {
          // Update the product list
          $('#product-filter').html(data);
        }
      });
    }

    // Helper function to get selected checkbox values
    function getFilterValues(className) {
      var values = [];
      $('.' + className + ':checked').each(function() {
        values.push($(this).val());
      });
      return values;
    }

    // Event listener for category filter checkboxes
    $(document).on('change', '.common_selector.category', function() {
      filter_data();
    });

    // Event listener for other filter checkboxes
    $(document).on('change', '.common_selector', function() {
      filter_data();
    });

    // Event listener for clear filter button
    $(document).on('click', '.clear-filter button', function() {
      $('input[type=checkbox]').prop('checked', false);
      filter_data();
    });
});

</script> -->

