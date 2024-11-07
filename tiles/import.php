<!-- <img src="./import/360.jpg" alt="" title=""> -->

<?php
use Phppot\DataSource;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

require_once '../import/DataSource.php';
$db = new DataSource();
$conn = $db->getConnection();
require_once ('../import/vendor/autoload.php');

if (isset($_POST["import"])) {

    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];

    if (in_array($_FILES["file"]["type"], $allowedFileType)) {

        $targetPath = 'uploads/' . $_FILES['file']['name'];
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);

        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();

        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);

        for ($i = 0; $i <= $sheetCount; $i ++) {
            $product_name = "";
            if (isset($spreadSheetAry[$i][0])) {
                $product_name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][0]);
            }
            $category = "";
            if (isset($spreadSheetAry[$i][1])) {
                $category = mysqli_real_escape_string($conn, $spreadSheetAry[$i][1]);
            }
            $im_code = "";
            if (isset($spreadSheetAry[$i][2])) {
                $im_code = mysqli_real_escape_string($conn, $spreadSheetAry[$i][2]);
            }
            $packing = "";
            if (isset($spreadSheetAry[$i][3])) {
                $packing = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
            $sku_type = "";
            if (isset($spreadSheetAry[$i][4])) {
                $sku_type = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            $vsku_code = "";
            if (isset($spreadSheetAry[$i][5])) {
                $vsku_code = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
            $base_material = "";
            if (isset($spreadSheetAry[$i][6])) {
                $base_material = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
            $colour = "";
            if (isset($spreadSheetAry[$i][7])) {
                $colour = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }
            $finish = "";
            if (isset($spreadSheetAry[$i][8])) {
                $finish = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }
            $finish_one = "";
            if (isset($spreadSheetAry[$i][9])) {
                $finish_one = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
            }
            $style = "";
            if (isset($spreadSheetAry[$i][10])) {
                $style = mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
            }
            $size = "";
            if (isset($spreadSheetAry[$i][11])) {
                $size = mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]);
            }
            $application = "";
            if (isset($spreadSheetAry[$i][12])) {
                $application = mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]);
            }
            $application_one = "";
            if (isset($spreadSheetAry[$i][13])) {
                $application_one = mysqli_real_escape_string($conn, $spreadSheetAry[$i][13]);
            }
            $application_areas = "";
            if (isset($spreadSheetAry[$i][14])) {
                $application_areas = mysqli_real_escape_string($conn, $spreadSheetAry[$i][14]);
            }
            $application_areas_one = "";
            if (isset($spreadSheetAry[$i][15])) {
                $application_areas_one = mysqli_real_escape_string($conn, $spreadSheetAry[$i][15]);
            }
            $application_areas_two = "";
            if (isset($spreadSheetAry[$i][16])) {
                $application_areas_two = mysqli_real_escape_string($conn, $spreadSheetAry[$i][16]);
            }
            $application_areas_three = "";
            if (isset($spreadSheetAry[$i][17])) {
                $application_areas_three = mysqli_real_escape_string($conn, $spreadSheetAry[$i][17]);
            }
            $application_areas_four = "";
            if (isset($spreadSheetAry[$i][18])) {
                $application_areas_four = mysqli_real_escape_string($conn, $spreadSheetAry[$i][18]);
            }
            $application_areas_five = "";
            if (isset($spreadSheetAry[$i][19])) {
                $application_areas_five = mysqli_real_escape_string($conn, $spreadSheetAry[$i][19]);
            }
            $path = "";
            if (isset($spreadSheetAry[$i][20])) {
                $path = mysqli_real_escape_string($conn, $spreadSheetAry[$i][20]);
            }
            $product_image = "";
            if (isset($spreadSheetAry[$i][21])) {
                $product_image = mysqli_real_escape_string($conn, $spreadSheetAry[$i][21]);
            }
            $view = "";
            if (isset($spreadSheetAry[$i][22])) {
                $view = mysqli_real_escape_string($conn, $spreadSheetAry[$i][22]);
            }
            $product_multiple_imgs = "";
            if (isset($spreadSheetAry[$i][23])) {
                $product_multiple_imgs = mysqli_real_escape_string($conn, $spreadSheetAry[$i][23]);
            }
            $product_status = "";
            if (isset($spreadSheetAry[$i][24])) {
                $product_status = mysqli_real_escape_string($conn, $spreadSheetAry[$i][24]);
            }
            $tile_name = "";
            if (isset($spreadSheetAry[$i][25])) {
                $tile_name = mysqli_real_escape_string($conn, $spreadSheetAry[$i][25]);
            }
            $area_per_box = "";
            if (isset($spreadSheetAry[$i][26])) {
                $area_per_box = mysqli_real_escape_string($conn, $spreadSheetAry[$i][26]);
            }
            $weight_per_box = "";
            if (isset($spreadSheetAry[$i][27])) {
                $weight_per_box = mysqli_real_escape_string($conn, $spreadSheetAry[$i][27]);
            }
            $ambience_view = "";
            if (isset($spreadSheetAry[$i][28])) {
                $ambience_view = mysqli_real_escape_string($conn, $spreadSheetAry[$i][28]);
            }
            

            if (! empty($product_name) || ! empty($category) || ! empty($im_code) || ! empty($packing) || ! empty($sku_type) || ! empty($vsku_code) || ! empty($base_material) || ! empty($colour) || ! empty($finish) || ! empty($finish_one) || ! empty($style) || ! empty($size) || ! empty($application) || ! empty($application_one) || ! empty($application_areas) || ! empty($application_areas_one) || ! empty($application_areas_two) || ! empty($application_areas_three) || ! empty($application_areas_four) || ! empty($application_areas_five) || ! empty($path) || ! empty($product_image) || ! empty($view) || ! empty($product_multiple_imgs) || ! empty($product_status) || ! empty($tile_name) || ! empty($area_per_box) || ! empty($weight_per_box) || ! empty($ambience_view)) {
                $query = "insert into tiles(`product_name`,`category`,`im_code`,`packing`,`sku_type`,`vsku_code`,`base_material`,`colour`,`finish`,`finish_one`,`style`,`size`,`application`,`application_one`,`application_areas`,`application_areas_one`,`application_areas_two`,`application_areas_three`,`application_areas_four`,`application_areas_five`,`path`,`product_image`,`view`,`product_multiple_imgs`,`product_status`,`tile_name`, `area_per_box`, `weight_per_box`, `ambience_view`) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $paramType = "sssssssssssssssssssssssssssss";
                $paramArray = array(
                    $product_name,
                    $category,
                    $im_code,
                    $packing,
                    $sku_type,
                    $vsku_code,
                    $base_material,
                    $colour,
                    $finish,
                    $finish_one,
                    $style,
                    $size,
                    $application,
                    $application_one,
                    $application_areas,
                    $application_areas_one,
                    $application_areas_two,
                    $application_areas_three,
                    $application_areas_four,
                    $application_areas_five,
                    $path,
                    $product_image,
                    $view,
                    $product_multiple_imgs,
                    $product_status,
                    $tile_name,
                    $area_per_box,
                    $weight_per_box,
                    $ambience_view
                );
                $insertId = $db->insert($query, $paramType, $paramArray);
                // $query = "insert into tbl_info(name,description) values('" . $name . "','" . $description . "')";
                // $result = mysqli_query($conn, $query);

                if (! empty($insertId)) {
                    $type = "success";
                    $message = "Excel Data Imported into the Database";
                } else {
                    $type = "error";
                    $message = "Problem in Importing Excel Data";
                }
            }
        }
    } else {
        $type = "error";
        $message = "Invalid File Type. Upload Excel File.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
body {
	font-family: Arial;
	width: 550px;
}

.outer-container {
	background: #F0F0F0;
	border: #e0dfdf 1px solid;
	padding: 40px 20px;
	border-radius: 2px;
}

.btn-submit {
	background: #333;
	border: #1d1d1d 1px solid;
	border-radius: 2px;
	color: #f0f0f0;
	cursor: pointer;
	padding: 5px 20px;
	font-size: 0.9em;
}

.tutorial-table {
	margin-top: 40px;
	font-size: 0.8em;
	border-collapse: collapse;
	width: 100%;
}

.tutorial-table th {
	background: #f0f0f0;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

.tutorial-table td {
	background: #FFF;
	border-bottom: 1px solid #dddddd;
	padding: 8px;
	text-align: left;
}

#response {
	padding: 10px;
	margin-top: 10px;
	border-radius: 2px;
	display: none;
}

.success {
	background: #c7efd9;
	border: #bbe2cd 1px solid;
}

.error {
	background: #fbcfcf;
	border: #f3c6c7 1px solid;
}

div#response.display-block {
	display: block;
}
</style>
</head>

<body>
<h2>Import Tiles Category Excel Sheet </h2>
    <div class="outer-container">
        <form action="" method="post" name="frmExcelImport"
            id="frmExcelImport" enctype="multipart/form-data">
            <div>
                <label>Choose Excel File</label> <input type="file"
                    name="file" id="file" accept=".xls,.xlsx">
                <button type="submit" id="submit" name="import"
                    class="btn-submit">Import</button>

            </div>

        </form>

    </div>
    <div id="response"
        class="<?php if(!empty($type)) { echo $type . " display-block"; } ?>"><?php if(!empty($message)) { echo $message; } ?></div>




</body>
</html>