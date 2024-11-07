<?php 

//index.php

include('database_connection.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product filter in php</title>

    <script src="js/jquery-1.10.2.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href = "css/jquery-ui.css" rel = "stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">

    <style>
.dropdown {
  position: relative;
  display: inline-block;
  margin-right: 20px;
}

.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
  position: relative;
}

.arrow {
  position: absolute;
  top: 50%;
  right: 8px;
  transform: translateY(-50%);
  display: block;
  width: 16px;
  height: 16px;
  border-top: 2px solid white;
  border-right: 2px solid white;
  transition: transform 0.2s;
}

.dropbtn:focus .arrow {
  transform: translateY(-50%) rotate(180deg);
}

.dropdown-content {
  display: none;
  position: absolute;
  z-index: 1;
  top: 100%;
  left: 0;
  min-width: 160px;
  max-height: 200px; /* set a maximum height to prevent overflow */
  overflow-y: auto; /* add scroll bar when content exceeds max-height */
}

.dropdown.show .dropdown-content {
  display: block;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown-content a:hover {
  background-color: #f1f1f1;
}

/* Remove hover effect on button */
.dropdown:focus .dropbtn {
  background-color: #3e8e41;
  outline: none;
}

}


</style>
</head>

<body>
    <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<br />
        	<h2 align="center">Search Filter</h2>
        	<br />
			<!-- <div class="col-md-2">
			<form method="POST">
			<input type="text" name="search" id="search" class="form-control product_name" autocomplete="off"/>
			</form>
			</div>
			<div class="col-md-9">
            	<br />
                <div class="row showresult">

                </div>
            </div> -->
            <div class="col-md-3">                				
				<!--<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>-->			
                <div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Category<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
                    <div style="height: 100px; overflow-y: auto; overflow-x: hidden;">
					<?php

                    $query = "SELECT DISTINCT(category) FROM product WHERE product_status = '1' ORDER BY product_id DESC";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>"  > <?php echo $row['category']; ?></label>
                    </div>
                    <?php
                    }

                    ?>
                    </div>
                    </div>
                    </div>
                </div>

				<div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Size<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
                    <?php

                    $query = "
                    SELECT DISTINCT(size) FROM product WHERE product_status = '1' ORDER BY size DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector size" value="<?php echo $row['size']; ?>" > <?php echo $row['size']; ?></label>
                    </div>
                    <?php    
                    }

                    ?>
                    </div>
                    </div>
                </div>
				
				<div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Finish<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
					<?php
                    $query = "
                    SELECT DISTINCT(finish) FROM product WHERE product_status = '1' ORDER BY finish DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector finish" value="<?php echo $row['finish']; ?>"  > <?php echo $row['finish']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
                    </div>
                    </div>
                </div>
				
				<div class="list-group">
                <div class="dropdown">
                <button class="dropbtn">Concept<span class="arrow">&#9660;</span></button>
                <div class="dropdown-content">
					<?php
                    $query = "
                    SELECT DISTINCT(concept) FROM product WHERE product_status = '1' ORDER BY concept DESC
                    ";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="list-group-item checkbox">
                        <label><input type="checkbox" class="common_selector concept" value="<?php echo $row['concept']; ?>"  > <?php echo $row['concept']; ?></label>
                    </div>
                    <?php
                    }
                    ?>	
                    </div>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
            	<br />
                <div class="row filter_data">
                
                </div>
            </div>
        </div>

    </div>
<style>
#loading
{
	text-align:center; 
	background: url('loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
$(document).ready(function(){

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        //var minimum_price = $('#hidden_minimum_price').val();
        //var maximum_price = $('#hidden_maximum_price').val();
        var category = get_filter('category');
        var size = get_filter('size');
        var finish = get_filter('finish');
		var concept = get_filter('concept');
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, category:category, size:size, finish:finish, concept:concept},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
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


</script>

<script>
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
    arrow.innerHTML = currentContent.classList.contains("show") ? "&#9650;" : "&#9660;";
  });
});

// Close the dropdown if the user clicks outside of it
window.addEventListener("click", function(event) {
  if (!event.target.matches(".dropbtn") && !event.target.matches(".arrow")) {
    dropdownContents.forEach(function(content) {
      if (content.classList.contains("show")) {
        content.classList.remove("show");
        var btn = content.previousElementSibling;
        var arrow = btn.querySelector(".arrow");
        arrow.innerHTML = "&#9660;";
      }
    });
  }
});

</script>


</body>

</html>
