<?php

//fetch_data.php

include('../database.php');
//$connect = new PDO("mysql:host=localhost;dbname=ivas", "root", "");

if(isset($_POST["action"]))
{
	$limit = 12;
	$last_id = $_POST["last_id"];
	$query = "
		SELECT * FROM bath_fitting WHERE product_status = '1'
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
	if (isset($_POST["colours"]) && is_array($_POST["colours"]) && count($_POST["colours"]) > 0) {
		$colours_filter = implode("','", $_POST["colours"]);
		$query .= " AND (colour IN ('" . $colours_filter . "')
					OR colour_one IN ('" . $colours_filter . "')
					OR colour_two IN ('" . $colours_filter . "')
					OR colour_three IN ('" . $colours_filter . "')
					OR colour_four IN ('" . $colours_filter . "')
					OR colour_five IN ('" . $colours_filter . "')
					OR colour_six IN ('" . $colours_filter . "')
					OR colour_seven IN ('" . $colours_filter . "')
					OR colour_eight IN ('" . $colours_filter . "')
					OR colour_nine IN ('" . $colours_filter . "')
					OR colour_ten IN ('" . $colours_filter . "')
					OR colour_eleven IN ('" . $colours_filter . "')
					OR colour_twelve IN ('" . $colours_filter . "')
					OR colour_thirteen IN ('" . $colours_filter . "'))";
	}
	// if(isset($_POST["colour"]))
	// {
	// 	$colour_filter = implode("','", $_POST["colour"]);
	// 	$query .= "
	// 	 AND colour IN('".$colour_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_one"]))
	// {
	// 	$colour_one_filter = implode("','", $_POST["colour_one"]);
	// 	$query .= " 
	// 	  AND colour_one IN('".$colour_one_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_two"]))
	// {
	// 	$colour_two_filter = implode("','", $_POST["colour_two"]);
	// 	$query .= " 
	// 	  AND colour_two IN('".$colour_two_filter."')
	// 	";
	// }
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
	// if(isset($_POST["colour_six"]))
	// {
	// 	$colour_six_filter = implode("','", $_POST["colour_six"]);
	// 	$query .= "
	// 	 AND colour_six IN('".$colour_six_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_seven"]))
	// {
	// 	$colour_seven_filter = implode("','", $_POST["colour_seven"]);
	// 	$query .= "
	// 	 AND colour_seven IN('".$colour_seven_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_eight"]))
	// {
	// 	$colour_eight_filter = implode("','", $_POST["colour_eight"]);
	// 	$query .= "
	// 	 AND colour_eight IN('".$colour_eight_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_nine"]))
	// {
	// 	$colour_nine_filter = implode("','", $_POST["colour_nine"]);
	// 	$query .= "
	// 	 AND colour_nine IN('".$colour_nine_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_ten"]))
	// {
	// 	$colour_ten_filter = implode("','", $_POST["colour_ten"]);
	// 	$query .= "
	// 	 AND colour_ten IN('".$colour_ten_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_eleven"]))
	// {
	// 	$colour_eleven_filter = implode("','", $_POST["colour_eleven"]);
	// 	$query .= "
	// 	 AND colour_eleven IN('".$colour_eleven_filter."')
	// 	";
	// }
	// if(isset($_POST["colour_twelve"]))
	// {
	// 	$colour_twelve_filter = implode("','", $_POST["colour_twelve"]);
	// 	$query .= "
	// 	 AND colour_twelve IN('".$colour_twelve_filter."')
	// 	";
	// }
	if(isset($_POST["type"]))
	{
		$type_filter = implode("','", $_POST["type"]);
		$query .= "
		 AND type IN('".$type_filter."')
		";
	}
	if(isset($_POST["cock_type"]))
	{
		$cock_type_filter = implode("','", $_POST["cock_type"]);
		$query .= "
		 AND cock_type IN('".$cock_type_filter."')
		";
	}
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
	// if(isset($_POST["finish_two"]))
	// {
	// 	$finish_two_filter = implode("','", $_POST["finish_two"]);
	// 	$query .= "
	// 	 AND finish_two IN('".$finish_two_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_three"]))
	// {
	// 	$finish_three_filter = implode("','", $_POST["finish_three"]);
	// 	$query .= "
	// 	 AND finish_three IN('".$finish_three_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_four"]))
	// {
	// 	$finish_four_filter = implode("','", $_POST["finish_four"]);
	// 	$query .= "
	// 	 AND finish_four IN('".$finish_four_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_five"]))
	// {
	// 	$finish_five_filter = implode("','", $_POST["finish_five"]);
	// 	$query .= "
	// 	 AND finish_five IN('".$finish_five_filter."')
	// 	";
	// }
	if(isset($_POST["collection"]))
	{
		$collection_filter = implode("','", $_POST["collection"]);
		$query .= "
		 AND collection IN('".$collection_filter."')
		";
	}
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
				<div class="pd-details shadow-sm rounded geeks">
				<div class="pd-details-image ">
				<img src="images/'. $row['path'] .''. $row['product_image'] .'"alt="'. $row['img_alt'] .'" class="img-responsive" width="700" height="700" ></div>
					<div class="pd-details-list-view">
					<h5 class="name-partially-hidden">'. $row['product_name'] .'</h5>
					<p>Category : '. $row['category'] .'
					<!--'. $row['path'] .'/
					Size : '. $row['collection'] .' <br />
					Finish : '. $row['finish'] .' <br />
					Concept : '. $row['finish_one'] .'--> </p>
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