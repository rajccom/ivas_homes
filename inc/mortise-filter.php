<div class="accordion" id="accordionPanelsStayOpenExample">

<div class="accordion-item">
  <h2 class="accordion-header" id="cat-filter">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#cat-filter-j" aria-expanded="false" aria-controls="cat-filter">
    Category
    </button>
  </h2>
  <div id="cat-filter-j" class="accordion-collapse collapse" aria-labelledby="cat-filter" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    $query = "SELECT DISTINCT(category) FROM product WHERE product_status = '1' ORDER BY product_id ASC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>"  > <?php echo $row['category']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
    </div>
  </div>
</div>


<div class="accordion-item">
  <h2 class="accordion-header" id="size">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#size-d" aria-expanded="false" aria-controls="size-d">
    Material
    </button>
  </h2>
  <div id="size-d" class="accordion-collapse collapse" aria-labelledby="size" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php

                    $query = "
                    SELECT DISTINCT(size) FROM product WHERE product_status = '1' ORDER BY size ASC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector size" value="<?php echo $row['size']; ?>" > <?php echo $row['size']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
    <?php

                    $query1 = "
                    SELECT DISTINCT(size_dup) FROM product WHERE product_status = '1' ORDER BY size_dup ASC
                    ";
                    $statement = $connect->prepare($query1);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector size_dup" value="<?php echo $row['size_dup']; ?>" > <?php echo $row['size_dup']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>                
    </div>
  </div>
</div>


<div class="accordion-item">
  <h2 class="accordion-header" id="finish">
    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finish-d" aria-expanded="false" aria-controls="finish-d">
    Finish
    </button>
  </h2>
  <div id="finish-d" class="accordion-collapse collapse" aria-labelledby="finish" data-bs-parent="#accordionExample">
    <div class="accordion-body">
    <?php
                    $query = "
                    SELECT DISTINCT(name) FROM finish ORDER BY id ASC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="product-filter-y checkbox">
                        <label><input type="checkbox" class="common_selector finish" value="<?php echo $row['id']; ?>"  > <?php echo $row['name']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
    </div>
  </div>
</div>


<!-- <div class="accordion-item">
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
                        <label><input type="checkbox" class="common_selector concept" value="<?php //echo $row['concept']; ?>"  > <?php echo $row['concept']; ?></label>
                    </div>
                    <?php
                   // }
                    ?>		
    </div>
  </div>
</div> -->

</div>