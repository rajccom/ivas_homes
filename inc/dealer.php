

<div class="container my-5">
  <h2>Experience IVAS near you</h2>
  <form>

  <div class="dealer-filter">

  <div class="row featurette">

  <div class="col-md-4 mb-3">
  
<select class="form-control py-3" id="category-dropdown" onchange="addIdToDiv()">
<option value="">Select Category</option>
  <?php
//  $conn = new mysqli("localhost", "root", "", "ivas");
$conn = new mysqli("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
// $conn = new mysqli("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
$result = mysqli_query($conn,"SELECT * FROM category WHERE category_status = '1'");
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id'];?>"><?php echo $row["category_name"];?></option>
<?php
}
?>
</select>
      </div>
<div class="col-md-4 mb-3">

<select class="form-control py-3" id="state-dropdown">
<option value="">Select State</option>

</select>
  </div>

<div class="col-md-4">

<select class="form-control py-3" id="city-dropdown">
<option value="">Select City</option>

</select>
  </div>
  </div>
  <br/>

  
  
  <div class="row dealer-result">
	
  </div>	
  </div>
  </form>
  </div>

  


  <script>
    $(document).ready(function() {
        $('#category-dropdown').on('change', function() {
            var category_id = this.value;
            if(category_id == "") { // "Select Category" option is selected
                $("#state-dropdown").html('<option value="">Select Category First</option>');
                $("#city-dropdown").html('<option value="">Select State First</option>');
                $(".dealer-result").html(''); // clear the results section
            } else {
                $.ajax({
                    url: "states-by-category.php",
                    type: "POST",
                    data: {
                        category_id: category_id
                    },
                    cache: false,
                    success: function(result){
                        $("#state-dropdown").html(result);
                        $("#city-dropdown").html('<option value="">Select State First</option>');
                        $(".dealer-result").html(''); // clear the results section
                    }
                });
            }
        });     

        $('#state-dropdown').on('change', function() {
            var states_id = this.value;
            if(states_id == "") { // "Select State" option is selected
                $("#city-dropdown").html('<option value="">Select State First</option>');
                $(".dealer-result").html(''); // clear the results section
            } else {
                $.ajax({
                    url: "cities-by-state.php",
                    type: "POST",
                    data: {
                        states_id: states_id
                    },
                    cache: false,
                    success: function(result){
                        $("#city-dropdown").html(result);
                        $(".dealer-result").html(''); // clear the results section
                    }
                });
            }
        });

        $('#city-dropdown').on('change', function() {
            var cities_id = this.value;
            if(cities_id == "") { // "Select City" option is selected
                $(".dealer-result").html(''); // clear the results section
            } else {
                $.ajax({
                    url: "address-by-city.php",
                    type: "POST",
                    data: {
                        cities_id: cities_id
                    },
                    cache: false,
                    success: function(result){
                        $(".dealer-result").html(result);
                    }
                });
            }
        });
    });
</script>


<script>
function addIdToDiv() {
  var dropdown = document.getElementById("category-dropdown");
  var selectedValue = dropdown.options[dropdown.selectedIndex].value;
  var div = document.querySelector(".dealer-result");

  if (selectedValue === "1" || selectedValue === "3" || selectedValue === "5") {
    div.id = "njj";
  } else {
    div.removeAttribute("id");
  }
}
</script>
