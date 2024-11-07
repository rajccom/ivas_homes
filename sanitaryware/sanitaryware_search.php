<?php
//fetch2.php
//  $connect = mysqli_connect("localhost", "root", "", "ivas");
 $connect = mysqli_connect("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
//$connect = mysqli_connect("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
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
     SELECT * FROM sanitaryware
     WHERE product_name LIKE '%".$Search."%'
     OR category LIKE '%".$Search."%'
     OR im_code LIKE '%".$Search."%'
     OR colour LIKE '%".$Search."%'
     OR colour_one LIKE '%".$Search."%'
     OR colour_two LIKE '%".$Search."%'
     OR colour_three LIKE '%".$Search."%'
     OR colour_four LIKE '%".$Search."%'
     OR colour_five LIKE '%".$Search."%'
     OR packing LIKE '%".$Search."%'
     OR type LIKE '%".$Search."%'
     OR type_one LIKE '%".$Search."%'
     OR trap_type LIKE '%".$Search."%'
     OR features LIKE '%".$Search."%'
     OR finish LIKE '%".$Search."%'
     OR finish_one LIKE '%".$Search."%'
     OR thickness LIKE '%".$Search."%'
     OR dimension LIKE '%".$Search."%'
     OR other LIKE '%".$Search."%' 
     OR collection LIKE '%".$Search."%'
    ";
     $result=mysqli_query($connect, $sql);
     if(mysqli_num_rows($result)){
        while($row=mysqli_fetch_assoc($result)){
          echo '
          
          <div class="col-sm-4 col-lg-4 col-md-4 mb-4 px-3 view_data id-'. $row['product_id'] .'"" id="'. $row['product_id'] .'">
				<div class="pd-details shadow-sm rounded">
				<img src="images/'. $row['path'] .''. $row['product_image'] .'"alt="" class="img-responsive" width="700" height="700" >
					<div class="pd-details-list-view">
					<h5 class="name-partially-hidden">'. $row['product_name'] .'</h5>
					<p>Category : '. $row['category'] .'
					<!--'. $row['path'] .'/
					Size : '. $row['other'] .' <br />
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

