<?php
// require_once "database.php";
// $conn = new mysqli("localhost:3306", "root", "", "ivas");
//  $conn = new mysqli("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
 $conn = new mysqli("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");

$categories_ids = $_POST["category_id"];
$categories_ids_array = explode(",", $categories_ids);
$in_clause = "";
foreach ($categories_ids_array as $category_id) {
    $in_clause .= "'" . mysqli_real_escape_string($conn, trim($category_id)) . "',";
}
$in_clause = rtrim($in_clause, ",");
$query = "SELECT * FROM state WHERE ";
foreach ($categories_ids_array as $category_id) {
    $query .= "FIND_IN_SET('$category_id', category_id) OR ";
}
$query = rtrim($query, " OR ");
$query .= " ORDER BY state_name ASC"; // Sorting states alphabetically
$result = mysqli_query($conn, $query);
?>

<option value="">Select State</option>
<?php
while($row = mysqli_fetch_array($result)) {
?>
<option value="<?php echo $row["id"];?>"><?php echo $row["state_name"];?></option>
<?php
}
?>
