<?php  
//require_once('../database.php');

if(isset($_GET["product_id"]))  
{
     $output = '';  
     //$connect = mysqli_connect("localhost", "root", "", "ivas"); 
     $connect = mysqli_connect("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes"); 
    // $connect = mysqli_connect("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
     $query = "SELECT * FROM bath_fitting WHERE product_id = '".$_GET["product_id"]."'";  
     $result = mysqli_query($connect, $query); 
     $row = mysqli_fetch_object($result);

     echo json_encode($row);
     die(); 
      
}
 ?>