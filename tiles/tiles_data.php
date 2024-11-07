<?php

//fetch_data.php

include('../database.php');
//$connect = new PDO("mysql:host=localhost;dbname=ivas", "root", "");

if(isset($_POST["action"]))
{

	$limit = 12;
	$last_id = $_POST["last_id"];
	$query = "
		SELECT * FROM tiles WHERE product_status = '1' 
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
	if(isset($_POST["colour"]))
	{
		$colour_filter = implode("','", $_POST["colour"]);
		$query .= "
		 AND colour IN('".$colour_filter."')
		";
	}
	if (isset($_POST["finishs"]) && is_array($_POST["finishs"]) && count($_POST["finishs"]) > 0) {
		$finishs_filter = implode("','", $_POST["finishs"]);
		$query .= " AND (finish IN ('" . $finishs_filter . "')
					OR finish_one IN ('" . $finishs_filter . "'))";
	}
	// if(isset($_POST["finish"]))
	// {
	// 	$finish_filter = implode("','", $_POST["finish"]);
	// 	$query .= " 
	// 	  AND finish IN('".$finish_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_one"]))
	// {
	// 	$finish_one_filter = implode("','", $_POST["finish_one"]);
	// 	$query .= " 
	// 	  AND finish_one IN('".$finish_one_filter."')
	// 	";
	// }
	if(isset($_POST["style"]))
	{
		$style_filter = implode("','", $_POST["style"]);
		$query .= "
		 AND style IN('".$style_filter."')
		";
	}
	if(isset($_POST["size"]))
	{
		$size_filter = implode("','", $_POST["size"]);
		$query .= "
		 AND size IN('".$size_filter."')
		";
	}
	
	if (isset($_POST["applications"]) && is_array($_POST["applications"]) && count($_POST["applications"]) > 0) {
		$applications_filter = implode("','", $_POST["applications"]);
		$query .= " AND (application IN ('" . $applications_filter . "')
					OR application_one IN ('" . $applications_filter . "')
					OR application_two IN ('" . $applications_filter . "'))";
	}
	if (isset($_POST["applications_areas"]) && is_array($_POST["applications_areas"]) && count($_POST["applications_areas"]) > 0)  {
		$applications_areas_filter = implode("','", $_POST["applications_areas"]);
		$query .= " AND (application_areas IN ('" . $applications_areas_filter . "')
					OR application_areas_one IN ('" . $applications_areas_filter . "')
					OR application_areas_two IN ('" . $applications_areas_filter . "')
					OR application_areas_three IN ('" . $applications_areas_filter . "')
					OR application_areas_four IN ('" . $applications_areas_filter . "')
					OR application_areas_five IN ('" . $applications_areas_filter . "'))";
	}
	if(isset($_POST["application_areas"]))
	{
		$application_areas_filter = implode("','", $_POST["application_areas"]);
		$query .= "
		 AND application_areas IN('".$application_areas_filter."')
		";
	}
	if(isset($_POST["application_areas_one"]))
	{
		$application_areas_one_filter = implode("','", $_POST["application_areas_one"]);
		$query .= "
		 AND application_areas_one IN('".$application_areas_one_filter."')
		";
	}
	if(isset($_POST["application_areas_two"]))
	{
		$application_areas_two_filter = implode("','", $_POST["application_areas_two"]);
		$query .= "
		 AND application_areas_two IN('".$application_areas_two_filter."')
		";
	}
	if(isset($_POST["application_areas_three"]))
	{
		$application_areas_three_filter = implode("','", $_POST["application_areas_three"]);
		$query .= "
		 AND application_areas_three IN('".$application_areas_three_filter."')
		";
	}
	if(isset($_POST["application_areas_four"]))
	{
		$application_areas_four_filter = implode("','", $_POST["application_areas_four"]);
		$query .= "
		 AND application_areas_four IN('".$application_areas_four_filter."')
		";
	}
	if(isset($_POST["application_areas_five"]))
	{
		$application_areas_five_filter = implode("','", $_POST["application_areas_five"]);
		$query .= "
		 AND application_areas_five IN('".$application_areas_five_filter."')
		";
	}

	$query .= " AND product_id > $last_id LIMIT 12";

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
					<h5  class="name-partially-hidden">'. $row['product_name'] .'</h5>
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

		if ($total_row < $limit) {
            // $output .= '<div class="col-sm-12"><p class="alert alert-info">No More Products</p></div>';
        } else {
            $output .= '<input type="button" id="LoadMore" name="filter" value="Load More" class="btn btn-primary rounded-circle px-4 py-" />';
            $output .= "<div class='loader-symbol'><div class='loader' id='" . $row['product_id'] . "' style='display: none;'></div></div>";
        }
    } else {
        $output = '<div class="col-sm-12"><p class="alert alert-danger">No Data Found</p></div>';
    }
    echo $output;
}

?>