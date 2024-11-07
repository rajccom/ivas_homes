<?php

//fetch_data.php

include('../database.php');
//$connect = new PDO("mysql:host=localhost;dbname=ivas", "root", "");

if(isset($_POST["action"]))
{
	$limit = 12;
	$last_id = $_POST["last_id"];
	$query = "
		SELECT * FROM modular_kitchen WHERE product_status = '1'
	";
	//if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	//{
	//	$query .= "
	//	 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
	//	";
	//}
	if(isset($_POST["category"]))
	{
		$category = implode("','", $_POST["category"]);
		$query .= "
		 AND category IN('".$category."')
		";
	}
	if(isset($_POST["size"]))
	{
		$size_filter = implode("','", $_POST["size"]);
		$query .= "
		 AND size IN('".$size_filter."')
		";
	}
	if(isset($_POST["finish"]))
	{
		$finish_filter = implode("','", $_POST["finish"]);
		$query .= " 
		  AND finish_one IN('".$finish_filter."')
		";
	}
	if(isset($_POST["concept"]))
	{
		$concept_filter = implode("','", $_POST["concept"]);
		$query .= " 
		  AND concept IN('".$concept_filter."')
		";
	}
	// if(isset($_POST["colour_three"]))
	// {
	// 	$colour_three_filter = implode("','", $_POST["colour_three"]);
	// 	$query .= "
	// 	 AND colour_three IN('".$colour_three_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_four"]))
	// {
	// 	$colour_four_filter = implode("','", $_POST["colour_four"]);
	// 	$query .= "
	// 	 AND colour_four IN('".$colour_four_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_five"]))
	// {
	// 	$colour_five_filter = implode("','", $_POST["colour_five"]);
	// 	$query .= "
	// 	 AND colour_five IN('".$colour_five_filter."')
	// 	";
	// }
	// if(isset($_POST["type"]))
	// {
	// 	$type_filter = implode("','", $_POST["type"]);
	// 	$query .= "
	// 	 AND type IN('".$type_filter."')
	// 	";
	// }
	// if(isset($_POST["type_one"]))
	// {
	// 	$type_one_filter = implode("','", $_POST["type_one"]);
	// 	$query .= "
	// 	 AND type_one IN('".$type_one_filter."')
	// 	";
	// }
	// if(isset($_POST["trap_type"]))
	// {
	// 	$trap_type_filter = implode("','", $_POST["trap_type"]);
	// 	$query .= "
	// 	 AND trap_type IN('".$trap_type_filter."')
	// 	";
	// }
	// if(isset($_POST["finish"]))
	// {
	// 	$finish_filter = implode("','", $_POST["finish"]);
	// 	$query .= "
	// 	 AND finish IN('".$finish_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_one"]))
	// {
	// 	$finish_one_filter = implode("','", $_POST["finish_one"]);
	// 	$query .= "
	// 	 AND finish_one IN('".$finish_one_filter."')
	// 	";
	// }
	// if(isset($_POST["collection"]))
	// {
	// 	$collection_filter = implode("','", $_POST["collection"]);
	// 	$query .= "
	// 	 AND collection IN('".$collection_filter."')
	// 	";
	// }
	// if(isset($_POST["application_areas_five"]))
	// {
	// 	$application_areas_five_filter = implode("','", $_POST["application_areas_five"]);
	// 	$query .= "
	// 	 AND application_areas_five IN('".$application_areas_five_filter."')
	// 	";
	// }
	$query .= "
	AND product_id > $last_id limit  12
	"; 

	//echo $query;
	//die();


	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$total_row = $statement->rowCount();
	$output = '';
	if($total_row > 0)
	{
		foreach($result as $row)
		{ 
			$output .= '
			
			<div class="col-sm-4 col-lg-4 col-md-4 mb-4 px-3 view_data id-'. $row['product_id'] .'"" id="'. $row['product_id'] .'">
				<div class="pd-details geeks shadow-sm rounded">
				<div class="pd-details-image ">
				<img src="images/'. $row['path'] .''. $row['product_image'] .'"alt="'. $row['img_alt'] .'" class="img-responsive" width="700" height="700" ></div>
					<div class="pd-details-list-view">
					<h5 class="name-partially-hidden">'. $row['product_name'] .'</h5>
					<p>Category : '. $row['category'] .'
					<!--'. $row['path'] .'/
					Size : '. $row['size'] .' <br />
					Finish : '. $row['finish'] .' <br />
					Concept : '. $row['concept'] .'--> </p>
					</div>
				</div>

			</div>
			';
		}
		if ($total_row < $limit) {
            // $output .= '<div class="col-sm-12"><p class="alert alert-info">No More Products</p></div>';
        } else {
            $output .= '<input type="button" id="LoadMore" name="filter" value="Load More" class="btn btn-primary rounded-circle px-4 py-" />';
            $output .= "<div class='loader' id='" . $row['product_id'] . "' style='display: none;'></div>";
        }
    } else {
        $output = '<div class="col-sm-12"><p class="alert alert-danger">No Data Found</p></div>';
    }
    echo $output;
}


?>