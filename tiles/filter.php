<div class="clear-filter"> 
  <a href="tiles/products/"><i class="fa fa-times" aria-hidden="true"></i> Clear Filter</a>
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
    $category = isset($_GET['category']) ? str_replace('-', ' ', $_GET['category']) : '';
    $app = isset($_GET['app']) ? explode(',', str_replace('-', ' ', $_GET['app'])) : [];
    $colour = isset($_GET['colour']) ? str_replace('-',' ',$_GET['colour']) : '';
    $finish = isset($_GET['finish']) ? explode(',', str_replace('-', ' ', $_GET['finish'])) : [];
    $app_area = isset($_GET['app_area']) ? explode(',', str_replace('-', ' ', $_GET['app_area'])) : [];
    //$selected_finish = isset($_GET['finish']) ? str_replace('-',' ',$_GET['finish']) : '';
    $style = isset($_GET['style']) ? str_replace('-',' ',$_GET['style']) : '';
    $size = isset($_GET['size']) ? str_replace('-',' ',$_GET['size']) : '';
    // $application = isset($_GET['app']) ? str_replace('-',' ',$_GET['app']) : '';
    //$application_areas = isset($_GET['app_area']) ? str_replace('-',' ',$_GET['app_area']) : '';
    ?>
    <div id="cat-filter-j" class="accordion-collapse " aria-labelledby="cat-filter" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <?php
        $query = "SELECT DISTINCT(category) FROM tiles WHERE product_status = '1' ORDER BY product_id ASC";
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
                <input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>" <?php echo $checked; ?> > <?php echo $row['category']; ?>
              </label>
            </div>
        <?php
          }
        }
        ?>
      </div>
    </div>
  </div>

  <!-- <div class="accordion-item">
  <h2 class="accordion-header" id="colour">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#colour-s" aria-expanded="false" aria-controls="colour">
      Colour
    </button>
  </h2>
  <div id="colour-s" class="accordion-collapse collapse" aria-labelledby="colour" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <?php
      // $query = "SELECT DISTINCT(colour) FROM tiles WHERE product_status = '1' ORDER BY product_id ASC";
      // $statement = $connect->prepare($query);
      // $statement->execute();
      // $result = $statement->fetchAll();
      // foreach ($result as $row) {
      //   if ($row['colour'] != '') {
      //     $checked = '';
      //     if ($colour == $row['colour']) {
      //       $checked = 'checked="checked"';
      //     }
      ?>
          <div class="product-filter-y checkbox">
            <label>
              <input type="checkbox" class="common_selector colour" value="<?php //echo $row['colour']; ?>" <?php //echo $checked; ?>><?php //echo $row['colour']; ?>
            </label>
          </div>
      <?php
      //   }
      // }
      ?>
    </div>
  </div>
</div> -->

<div class="accordion-item">
  <h2 class="accordion-header" id="finish">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finish-a" aria-expanded="false" aria-controls="finish">
      Finish
    </button>
  </h2>
  <div id="finish-a" class="accordion-collapse collapse" aria-labelledby="finish" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

      $query = "
      SELECT DISTINCT finishs
      FROM (
          SELECT finish as finishs FROM tiles WHERE product_status = '1'
          UNION
          SELECT finish_one FROM tiles WHERE product_status = '1'
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
  <h2 class="accordion-header" id="style">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#style-p" aria-expanded="false" aria-controls="style">
    Style
    </button>
  </h2>
  <div id="style-p" class="accordion-collapse collapse" aria-labelledby="style" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    $query = "
                    SELECT DISTINCT(style) FROM tiles WHERE product_status = '1' ORDER BY product_id ASC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                      if($row['style']!=''){
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector style" value="<?php echo $row['style']; ?>" <?php if($style == $row['style']) { echo 'checked="checked"'; } ?> > <?php echo $row['style']; ?></label>
                    </div>
                    <?php
                    }
                  }

                    ?>
    </div>
  </div>
</div>

<div class="accordion-item">
  <h2 class="accordion-header" id="size">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#size-b" aria-expanded="false" aria-controls="size-d">
    Size
    </button>
  </h2>
  <div id="size-b" class="accordion-collapse collapse" aria-labelledby="size" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    $query = "
                    SELECT DISTINCT(size) FROM tiles WHERE product_status = '1' ORDER BY product_id ASC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                      if($row['size']!=''){
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector size" value="<?php echo $row['size']; ?>" <?php if($size == $row['size']) { echo 'checked="checked"'; } ?> > <?php echo $row['size']; ?></label>
                    </div>
                    <?php
                    }
                  }

                    ?>
    </div>
  </div>
</div>

<div class="accordion-item">
  <h2 class="accordion-header" id="size">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#size-d" aria-expanded="false" aria-controls="size-d">
    Application
    </button>
  </h2>
  <div id="size-d" class="accordion-collapse collapse" aria-labelledby="size" data-bs-parent="#accordionExample">
    <div class="accordion-body">
            <?php

        $query = "
        SELECT DISTINCT applications
        FROM (
            SELECT application as applications FROM tiles WHERE product_status = '1'
            UNION
            SELECT application_one FROM tiles WHERE product_status = '1'
            UNION
            SELECT application_two FROM tiles WHERE product_status = '1'
        ) AS applications_table
        ORDER BY applications ASC
        ";

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach ($result as $row) {
        $applications_value = $row['applications'];
        if ($applications_value != '') {
            $checked = '';
            if (in_array($applications_value, $app)) {
                $checked = 'checked="checked"';
            }
            ?>
            <div class="product-filter-y checkbox">
                <label>
                    <input type="checkbox" class="common_selector applications" value="<?php echo $applications_value; ?>" <?php echo $checked; ?>>
                    <?php echo $applications_value; ?>
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
  <h2 class="accordion-header" id="application">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#application-h" aria-expanded="false" aria-controls="application">
    Spaces
    </button>
  </h2>
  <div id="application-h" class="accordion-collapse collapse" aria-labelledby="application" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

        $query = "
        SELECT DISTINCT applications_areas
        FROM (
            SELECT application_areas as applications_areas FROM tiles WHERE product_status = '1'
            UNION
            SELECT application_areas_one FROM tiles WHERE product_status = '1'
            UNION
            SELECT application_areas_two FROM tiles WHERE product_status = '1'
            UNION
            SELECT application_areas_three FROM tiles WHERE product_status = '1'
            UNION
            SELECT application_areas_four FROM tiles WHERE product_status = '1'
            UNION
            SELECT application_areas_five FROM tiles WHERE product_status = '1'
        ) AS applications_areas_table
        ORDER BY applications_areas ASC
        ";

        $statement = $connect->prepare($query);
        $statement->execute();
        $result = $statement->fetchAll();

        foreach ($result as $row) {
        $applications_areas_value = $row['applications_areas'];
        if ($applications_areas_value != '') {
            $checked = '';
            if (in_array($applications_areas_value, $app_area)) {
                $checked = 'checked="checked"';
            }
            ?>
            <div class="product-filter-y checkbox">
                <label>
                    <input type="checkbox" class="common_selector applications_areas" value="<?php echo $applications_areas_value; ?>" <?php echo $checked; ?>>
                    <?php echo $applications_areas_value; ?>
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
    // Handle checkbox change events
    $('.common_selector').on('change', function() {
      filterProducts();
    });

    // Handle clear filter button click
    $('.clear-filter button').on('click', function() {
      // Uncheck all checkboxes
      $('.common_selector').prop('checked', false);
      filterProducts();
    });

    // Filter products based on selected checkboxes
    function filterProducts() {
      var category = [];

      // Get selected checkbox values
      $('.common_selector.category:checked').each(function() {
        category.push($(this).val());
      });

      // Construct the URL parameters
      var params = {};
      if (category.length > 0) {
        params.category = category.join(',');
      }

      // Construct the new URL with the parameters
      var url = window.location.href.split('?')[0]; // Get the base URL without parameters
      var newUrl = url;
      if (Object.keys(params).length > 0) {
        newUrl += '?' + $.param(params); // Add the parameters to the URL
      }

      // Redirect to the new URL
      window.location.href = newUrl;
    }
  });
</script> -->
