<div class="container my-5">
  <h2>Experience IVAS near you</h2>
  <form>

  <div class="dealer-filter">

  <div class="row featurette">

  <div class="col-md-4 mb-3">
  
<select class="form-control py-3" id="state-dropdown">
<option value="">Select State</option>
  <?php
// $conn = new mysqli("localhost:3306", "root", "", "ivas");
$conn = new mysqli("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
//$conn = new mysqli("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
$result = mysqli_query($conn,"SELECT * FROM bath_fitting_state");
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row['id'];?>"><?php echo $row["state_name"];?></option>
<?php
}
?>
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
    $('#state-dropdown').on('change', function() {
      var states_id = this.value;
      if(states_id === '') {
        $('#city-dropdown').html('<option value="">Select State First</option>');
        $(".dealer-result").html('');
      } else {
        $.ajax({
          url: "./bath-fittings/cities-by-state.php",
          type: "POST",
          data: {
            states_id: states_id
          },
          cache: false,
          success: function(result){
            $("#city-dropdown").html(result);
            $(".dealer-result").html('');
          }
        });
      }
    });
    $('#city-dropdown').on('change', function() {
      var cities_id = this.value;
      if(cities_id === '') {
        $(".dealer-result").html('');
      } else {
        $.ajax({
          url: "./bath-fittings/address-by-city.php",
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