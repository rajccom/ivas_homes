<?php
// require_once "database.php";
// $conn = new mysqli("localhost:3306", "root", "", "ivas");
$conn = new mysqli("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
 //$conn = new mysqli("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");

$states_id = $_POST["states_id"];
$result = mysqli_query($conn, "SELECT * FROM city WHERE state_id = $states_id ORDER BY city_name ASC");
?>
<option value="">Select City</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["city_name"];?></option>
<?php
}
?>