
<div class="clear-filter"> 
  <a href="modular-kitchen/products/"><i class="fa fa-times" aria-hidden="true"></i> Clear Filter</a>
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
  $size = isset($_GET['size']) ? str_replace('-',' ',$_GET['size']) : '';
  $finish = isset($_GET['finish']) ? str_replace('-',' ',$_GET['finish']) : '';
  $concept = isset($_GET['concept']) ? str_replace('-',' ',$_GET['concept']) : '';
  ?>
  <div id="cat-filter-j" class="accordion-collapse collapse" aria-labelledby="cat-filter" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    $query = "SELECT DISTINCT(category) FROM modular_kitchen WHERE product_status = '1' ORDER BY product_id ASC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                      if($row['category']!='')
                      {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>" <?php if($category == $row['category']) { echo 'checked="checked"'; } ?> > <?php echo $row['category']; ?></label>
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
    Size
    </button>
  </h2>
  <div id="colour-s" class="accordion-collapse collapse" aria-labelledby="colour" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    $query = "
                    SELECT DISTINCT(size) FROM modular_kitchen WHERE product_status = '1' ORDER BY product_id ASC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                      if($row['size']!='')
                      {
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
  <h2 class="accordion-header" id="finish">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finish-a" aria-expanded="false" aria-controls="finish">
    Finish
    </button>
  </h2>
  <div id="finish-a" class="accordion-collapse collapse" aria-labelledby="finish" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    // $query = "
                    // SELECT DISTINCT(finish) FROM modular_kitchen ORDER BY product_id ASC
                    // ";
                    // $statement = $connect->prepare($query);
                    // $statement->execute();
                    // $result = $statement->fetchAll();
                    // foreach($result as $row)
                    // {
                    //   if($row['finish']!='')
                    //   {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector finish" value="<?php //echo $row['finish']; ?>" <?php //if($finish == $row['finish']) { echo 'checked="checked"'; } ?>  > <?php //echo $row['finish']; ?></label>
                    </div>
                    <?php
                  //   }
                  // }

                    ?>
   
    </div>
  </div>
</div>

<div class="accordion-item">
  <h2 class="accordion-header" id="style">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#style-p" aria-expanded="false" aria-controls="style">
    Concept
    </button>
  </h2>
  <div id="style-p" class="accordion-collapse collapse" aria-labelledby="style" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    $query = "
                    SELECT DISTINCT(concept) FROM modular_kitchen WHERE product_status = '1' ORDER BY product_id ASC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                      if($row['concept']!='')
                      {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector concept" value="<?php echo $row['concept']; ?>" <?php if($concept == $row['concept']) { echo 'checked="checked"'; } ?> > <?php echo $row['concept']; ?></label>
                    </div>
                    <?php
                    }
                  }

                    ?>
    </div>
  </div>
</div> -->


</div>