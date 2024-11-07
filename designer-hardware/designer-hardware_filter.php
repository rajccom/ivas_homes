
<div class="clear-filter"> 
  <a href="designer-hardware/products/"><i class="fa fa-times" aria-hidden="true"></i> Clear Filter</a>
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
  $colour = isset($_GET['colour']) ? str_replace('-', ' ', $_GET['colour']) : '';
  $type = isset($_GET['type']) ? str_replace('-', ' ', $_GET['type']) : '';
  $cock_type = isset($_GET['cock_type']) ? str_replace('-', ' ', $_GET['cock_type']) : '';
  // $finish = isset($_GET['finish']) ? str_replace('-', ' ', $_GET['finish']) : '';
  $finish = isset($_GET['finish']) ? explode(',', str_replace('-', ' ', $_GET['finish'])) : [];
  //$material = isset($_GET['base_material']) ? str_replace('-', ' ', $_GET['base_material']) : '';
  $material = isset($_GET['material']) ? explode(',', str_replace('-', ' ', $_GET['material'])) : [];
  ?>
  <div id="cat-filter-j" class="accordion-collapse collapse" aria-labelledby="cat-filter" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <?php
      $query = "SELECT DISTINCT(categroy) FROM designer_hardware WHERE product_status = '1' ORDER BY product_id ASC";
      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();
      foreach ($result as $row) {
        if ($row['categroy'] != '') {
          $checked = '';
          if (in_array($row['categroy'], explode(',', $category))) {
            $checked = 'checked="checked"';
          }
          ?>
          <div class="product-filter-y checkbox">
            <label><input type="checkbox" class="common_selector categroy" value="<?php echo $row['categroy']; ?>" <?php echo $checked; ?>> <?php echo $row['categroy']; ?></label>
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
    Finish
    </button>
  </h2>
  <div id="size-b" class="accordion-collapse collapse" aria-labelledby="size" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

      $query = "
      SELECT DISTINCT finishs
      FROM (
          SELECT finish as finishs FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_one FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_two FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_three FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_four FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_five FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_six FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_seven FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_eight FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_nine FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_ten FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_eleven FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_twelve FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_thirteen FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_fourteen FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_fifteen FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_sixteen FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_seventeen FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_eighteen FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_nineteen FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_twenty FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT finish_twenty_one FROM designer_hardware WHERE product_status = '1'
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
  <h2 class="accordion-header" id="size">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#size-d" aria-expanded="false" aria-controls="size-d">
    Base Material
    </button>
  </h2>
  <div id="size-d" class="accordion-collapse collapse" aria-labelledby="size" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

      $query = "
      SELECT DISTINCT base_materials
      FROM (
          SELECT base_material as base_materials FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT base_material_one FROM designer_hardware WHERE product_status = '1'
          UNION
          SELECT base_material_two FROM designer_hardware WHERE product_status = '1'
      ) AS base_materials_table
      ORDER BY base_materials ASC
      ";

      $statement = $connect->prepare($query);
      $statement->execute();
      $result = $statement->fetchAll();

      foreach ($result as $row) {
      $base_materials_value = $row['base_materials'];
      if ($base_materials_value != '') {
          $checked = '';
          if (in_array($base_materials_value, $material)) {
              $checked = 'checked="checked"';
          }
          ?>
          <div class="product-filter-y checkbox">
              <label>
                  <input type="checkbox" class="common_selector base_materials" value="<?php echo $base_materials_value; ?>" <?php echo $checked; ?>>
                  <?php echo $base_materials_value; ?>
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
  <h2 class="accordion-header" id="application">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#application-h" aria-expanded="false" aria-controls="application">
    Collection
    </button>
  </h2>
  <div id="application-h" class="accordion-collapse collapse" aria-labelledby="application" data-bs-parent="#accordionExample">
    <div class="accordion-body">
      <?php

                    // $query = "
                    // SELECT DISTINCT(collection) FROM designer_hardware WHERE product_status = '1' ORDER BY product_id ASC
                    // ";
                    // $statement = $connect->prepare($query);
                    // $statement->execute();
                    // $result = $statement->fetchAll();
                    // foreach($result as $row)
                    // {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector collection" value="<?php //echo $row['collection']; ?>" > <?php //echo $row['collection']; ?></label>
                    </div>
                    <?php    
                    //}

                    ?>
    
    </div>
  </div>
</div> -->

<!--<div class="accordion-item">
  <h2 class="accordion-header" id="finish">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finish-d" aria-expanded="false" aria-controls="finish-d">
    Finish
    </button>
  </h2>
  <div id="finish-d" class="accordion-collapse collapse" aria-labelledby="finish" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php
                    // $query = "
                    // SELECT DISTINCT(name) FROM finish ORDER BY id ASC
                    // ";
                    // $statement = $connect->prepare($query);
                    // $statement->execute();
                    // $result = $statement->fetchAll();
                    // foreach($result as $row)
                    // {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector finish" value="<?php// echo $row['id']; ?>"  > <?php //echo $row['name']; ?></label>
                    </div>
                    <?php
                    // }
                    ?>	
    </div>
  </div>
</div>


 <div class="accordion-item">
  <h2 class="accordion-header" id="Concept">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#Concept-d" aria-expanded="false" aria-controls="Concept-d">
    Concept
    </button>
  </h2>
  <div id="Concept-d" class="accordion-collapse collapse" aria-labelledby="Concept" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php
                    // $query = "
                    // SELECT DISTINCT(concept) FROM product WHERE product_status = '1' ORDER BY concept DESC
                    // ";
                    // $statement = $connect->prepare($query);
                    // $statement->execute();
                    // $result = $statement->fetchAll();
                    // foreach($result as $row)
                    // {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector concept" value="<?php //echo $row['concept']; ?>"  > <?php //echo $row['concept']; ?></label>
                    </div>
                    <?php
                   // }
                    ?>		
    </div>
  </div>
</div> -->

</div>