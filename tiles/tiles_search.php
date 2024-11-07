<?php
//fetch2.php
// $connect = mysqli_connect("localhost", "root", "", "ivas");
$connect = mysqli_connect("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
// $connect = mysqli_connect("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
// if(isset($_POST["query"]))
// {
//     $search = mysqli_real_escape_string($connect, $_POST["query"]);
//     $query = "
//   SELECT * FROM designer_hardware
//   WHERE category LIKE '%".$search."%'
//   OR size LIKE '%".$search."%'
//   OR finish LIKE '%".$search."%'
//   OR concept LIKE '%".$search."%'
//  ";
//       //else
//       //{
//       //    $query = "
//       //  SELECT * FROM product_type ORDER BY id
//      // ";
//      //}
//       $result = mysqli_query($connect, $query);
//       while($row = mysqli_fetch_array($result))
//       {
//         echo '
//         <a href = "#"><h3>'.$row["category"].'</h3>
//         <p>'.$row["size"].'</p>
//         <p class="text-muted">'.$row["finish"].'</p>
//         <p class="text-muted">'.$row["concept"].'</p>
//         </a>
//         ';
//       }
// }
// //else
// //{
// //    echo 'Data Not Found';
// //}

if($_SERVER['REQUEST_METHOD']=='POST')
{
     $Search = $_POST['search'];
     $sql = "
     SELECT * FROM tiles 
WHERE product_status = '1' 
AND (product_name LIKE '%".$Search."%'
     OR category LIKE '%".$Search."%'
     OR im_code LIKE '%".$Search."%'
     OR sku_type LIKE '%".$Search."%'
     OR vsku_code LIKE '%".$Search."%'
     OR base_material LIKE '%".$Search."%'
     OR colour LIKE '%".$Search."%'
     OR finish LIKE '%".$Search."%'
     OR finish_one LIKE '%".$Search."%'
     OR size LIKE '%".$Search."%'
     OR style LIKE '%".$Search."%'
     OR application LIKE '%".$Search."%'
     OR application_one LIKE '%".$Search."%'
     OR application_areas LIKE '%".$Search."%'
     OR application_areas_one LIKE '%".$Search."%'
     OR application_areas_two LIKE '%".$Search."%'
     OR application_areas_three LIKE '%".$Search."%'
     OR application_areas_four LIKE '%".$Search."%'
     OR application_areas_five LIKE '%".$Search."%')
    ";
     $result=mysqli_query($connect, $sql);
     if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
          echo '
          
          <div class="col-sm-4 col-lg-4 col-md-4 mb-4 px-3 view_data id-'. $row['product_id'] .'"" id="'. $row['product_id'] .'">
				<div class="pd-details shadow-sm rounded">
				<img src="images/'. $row['path'] .''. $row['product_image'] .'"alt="" class="img-responsive" >
					<div class="pd-details-list-view">
					<h5 class="name-partially-hidden">'. $row['product_name'] .'</h5>
					<p>Category : '. $row['category'] .'
					<!--'. $row['path'] .'/
					Size : '. $row['size'] .' <br />
					Finish : '. $row['finish'] .' <br />
					Concept : '. $row['finish_one'] .'--> </p>
					</div>
				</div>

			</div>
			';
        }
        
     }
     else
     {
         echo '<div class="col-sm-12"><p class="alert alert-danger">Product Not Found</p></div>';
     }
}
?>

