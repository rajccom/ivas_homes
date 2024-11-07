<?php

//fetch_data.php

include('../database.php');
//$connect = new PDO("mysql:host=localhost;dbname=ivas", "root", "");

if(isset($_POST["action"]))
{
	$limit = 12;
	$last_id = $_POST["last_id"];
	$query = "
		SELECT * FROM designer_hardware WHERE product_status = '1'
	";
	//if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
	//{
	//	$query .= "
	//	 AND product_price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
	//	";
	//}
	if(isset($_POST["categroy"]))
	{
		$categroy = implode("','", $_POST["categroy"]);
		$query .= "
		 AND categroy IN('".$categroy."')
		";
	}
	if(isset($_POST["colour"]))
	{
		$colour_filter = implode("','", $_POST["colour"]);
		$query .= "
		 AND colour IN('".$colour_filter."')
		";
	}
	if(isset($_POST["colour_one"]))
	{
		$colour_one_filter = implode("','", $_POST["colour_one"]);
		$query .= " 
		  AND colour_one IN('".$colour_one_filter."')
		";
	}
	if(isset($_POST["colour_two"]))
	{
		$colour_two_filter = implode("','", $_POST["colour_two"]);
		$query .= " 
		  AND colour_two IN('".$colour_two_filter."')
		";
	}
	if(isset($_POST["colour_three"]))
	{
		$colour_three_filter = implode("','", $_POST["colour_three"]);
		$query .= "
		 AND colour_three IN('".$colour_three_filter."')
		";
	}
	if(isset($_POST["colour_four"]))
	{
		$colour_four_filter = implode("','", $_POST["colour_four"]);
		$query .= "
		 AND colour_four IN('".$colour_four_filter."')
		";
	}
	if(isset($_POST["colour_five"]))
	{
		$colour_five_filter = implode("','", $_POST["colour_five"]);
		$query .= "
		 AND colour_five IN('".$colour_five_filter."')
		";
	}
	if(isset($_POST["colour_six"]))
	{
		$colour_six_filter = implode("','", $_POST["colour_six"]);
		$query .= "
		 AND colour_six IN('".$colour_six_filter."')
		";
	}
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
	if (isset($_POST["finishs"]) && is_array($_POST["finishs"]) && count($_POST["finishs"]) > 0) {
		$finishs_filter = implode("','", $_POST["finishs"]);
		$query .= " AND (finish IN ('" . $finishs_filter . "')
					OR finish_one IN ('" . $finishs_filter . "')
					OR finish_two IN ('" . $finishs_filter . "')
					OR finish_three IN ('" . $finishs_filter . "')
					OR finish_four IN ('" . $finishs_filter . "')
					OR finish_five IN ('" . $finishs_filter . "')
					OR finish_six IN ('" . $finishs_filter . "')
					OR finish_seven IN ('" . $finishs_filter . "')
					OR finish_eight IN ('" . $finishs_filter . "')
					OR finish_nine IN ('" . $finishs_filter . "')
					OR finish_ten IN ('" . $finishs_filter . "')
					OR finish_eleven IN ('" . $finishs_filter . "')
					OR finish_twelve IN ('" . $finishs_filter . "')
					OR finish_thirteen IN ('" . $finishs_filter . "')
					OR finish_fourteen IN ('" . $finishs_filter . "')
					OR finish_fifteen IN ('" . $finishs_filter . "')
					OR finish_sixteen IN ('" . $finishs_filter . "')
					OR finish_seventeen IN ('" . $finishs_filter . "')
					OR finish_eighteen IN ('" . $finishs_filter . "')
					OR finish_nineteen IN ('" . $finishs_filter . "')
					OR finish_twenty IN ('" . $finishs_filter . "')
					OR finish_twenty_one IN ('" . $finishs_filter . "'))";
	}
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
	// if(isset($_POST["finish_six"]))
	// {
	// 	$finish_six_filter = implode("','", $_POST["finish_six"]);
	// 	$query .= "
	// 	 AND finish_six IN('".$finish_six_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_seven"]))
	// {
	// 	$finish_seven_filter = implode("','", $_POST["finish_five"]);
	// 	$query .= "
	// 	 AND finish_seven IN('".$finish_seven_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_eight"]))
	// {
	// 	$finish_eight_filter = implode("','", $_POST["finish_eight"]);
	// 	$query .= "
	// 	 AND finish_eight IN('".$finish_eight_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_nine"]))
	// {
	// 	$finish_nine_filter = implode("','", $_POST["finish_nine"]);
	// 	$query .= "
	// 	 AND finish_nine IN('".$finish_nine_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_ten"]))
	// {
	// 	$finish_ten_filter = implode("','", $_POST["finish_ten"]);
	// 	$query .= "
	// 	 AND finish_ten IN('".$finish_ten_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_eleven"]))
	// {
	// 	$finish_eleven_filter = implode("','", $_POST["finish_eleven"]);
	// 	$query .= "
	// 	 AND finish_eleven IN('".$finish_eleven_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_twelve"]))
	// {
	// 	$finish_twelve_filter = implode("','", $_POST["finish_twelve"]);
	// 	$query .= "
	// 	 AND finish_twelve IN('".$finish_twelve_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_thirteen"]))
	// {
	// 	$finish_thirteen_filter = implode("','", $_POST["finish_thirteen"]);
	// 	$query .= "
	// 	 AND finish_thirteen IN('".$finish_thirteen_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_fourteen"]))
	// {
	// 	$finish_fourteen_filter = implode("','", $_POST["finish_fourteen"]);
	// 	$query .= "
	// 	 AND finish_fourteen IN('".$finish_fourteen_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_fifteen"]))
	// {
	// 	$finish_fifteen_filter = implode("','", $_POST["finish_fifteen"]);
	// 	$query .= "
	// 	 AND finish_fifteen IN('".$finish_fifteen_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_sixteen"]))
	// {
	// 	$finish_sixteen_filter = implode("','", $_POST["finish_sixteen"]);
	// 	$query .= "
	// 	 AND finish_sixteen IN('".$finish_sixteen_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_seventeen"]))
	// {
	// 	$finish_seventeen_filter = implode("','", $_POST["finish_seventeen"]);
	// 	$query .= "
	// 	 AND finish_seventeen IN('".$finish_seventeen_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_eighteen"]))
	// {
	// 	$finish_eighteen_filter = implode("','", $_POST["finish_eighteen"]);
	// 	$query .= "
	// 	 AND finish_eighteen IN('".$finish_eighteen_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_nineteen"]))
	// {
	// 	$finish_nineteen_filter = implode("','", $_POST["finish_nineteen"]);
	// 	$query .= "
	// 	 AND finish_nineteen IN('".$finish_nineteen_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_twenty"]))
	// {
	// 	$finish_twenty_filter = implode("','", $_POST["finish_twenty"]);
	// 	$query .= "
	// 	 AND finish_twenty IN('".$finish_twenty_filter."')
	// 	";
	// }
	// if(isset($_POST["finish_twenty_one"]))
	// {
	// 	$finish_twenty_one_filter = implode("','", $_POST["finish_twenty_one"]);
	// 	$query .= "
	// 	 AND finish_twenty_one IN('".$finish_twenty_one_filter."')
	// 	";
	// }
	if (isset($_POST["base_materials"]) && is_array($_POST["base_materials"]) && count($_POST["base_materials"]) > 0) {
		$base_materials_filter = implode("','", $_POST["base_materials"]);
		$query .= " AND (base_material IN ('" . $base_materials_filter . "')
					OR base_material_one IN ('" . $base_materials_filter . "')
					OR base_material_two IN ('" . $base_materials_filter . "'))";
	}
	// if(isset($_POST["base_material"]))
	// {
	// 	$base_material_filter = implode("','", $_POST["base_material"]);
	// 	$query .= "
	// 	 AND base_material IN('".$base_material_filter."')
	// 	";
	// }
	// if(isset($_POST["base_material_one"]))
	// {
	// 	$base_material_one_filter = implode("','", $_POST["base_material_one"]);
	// 	$query .= "
	// 	 AND base_material_one IN('".$base_material_one_filter."')
	// 	";
	// }
	// if(isset($_POST["base_material_two"]))
	// {
	// 	$base_material_two_filter = implode("','", $_POST["base_material_two"]);
	// 	$query .= "
	// 	 AND base_material_two IN('".$base_material_two_filter."')
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
			
			<div class="col-sm-4 col-lg-4 col-md-4 mb-4 px-3 view_data  id-'. $row['product_id'] .'"" id="'. $row['product_id'] .'">
				<div class="pd-details shadow-sm rounded geeks">
				<div class="pd-details-image ">
				<img src="images/'. $row['path'] .''. $row['product_image'] .'"alt="'. $row['img_alt'] .'" class="img-responsive" ></div>
					<div class="pd-details-list-view">
					<h5 class="name-partially-hidden">'. $row['product_name'] .'</h5>
					<p>Category : '. $row['categroy'] .'
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