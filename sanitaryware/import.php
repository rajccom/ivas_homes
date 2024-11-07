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
            $colour = "";
            if (isset($spreadSheetAry[$i][3])) {
                $colour = mysqli_real_escape_string($conn, $spreadSheetAry[$i][3]);
            }
            $colour_one = "";
            if (isset($spreadSheetAry[$i][4])) {
                $colour_one = mysqli_real_escape_string($conn, $spreadSheetAry[$i][4]);
            }
            $colour_two = "";
            if (isset($spreadSheetAry[$i][5])) {
                $colour_two = mysqli_real_escape_string($conn, $spreadSheetAry[$i][5]);
            }
            $colour_three = "";
            if (isset($spreadSheetAry[$i][6])) {
                $colour_three = mysqli_real_escape_string($conn, $spreadSheetAry[$i][6]);
            }
            $colour_four = "";
            if (isset($spreadSheetAry[$i][7])) {
                $colour_four = mysqli_real_escape_string($conn, $spreadSheetAry[$i][7]);
            }
            $colour_five = "";
            if (isset($spreadSheetAry[$i][8])) {
                $colour_five = mysqli_real_escape_string($conn, $spreadSheetAry[$i][8]);
            }
            $packing = "";
            if (isset($spreadSheetAry[$i][9])) {
                $packing = mysqli_real_escape_string($conn, $spreadSheetAry[$i][9]);
            }
            $type = "";
            if (isset($spreadSheetAry[$i][10])) {
                $type = mysqli_real_escape_string($conn, $spreadSheetAry[$i][10]);
            }
            $type_one = "";
            if (isset($spreadSheetAry[$i][11])) {
                $type_one = mysqli_real_escape_string($conn, $spreadSheetAry[$i][11]);
            }
            $trap_type = "";
            if (isset($spreadSheetAry[$i][12])) {
                $trap_type = mysqli_real_escape_string($conn, $spreadSheetAry[$i][12]);
            }
            $features = "";
            if (isset($spreadSheetAry[$i][13])) {
                $features = mysqli_real_escape_string($conn, $spreadSheetAry[$i][13]);
            }
            $finish = "";
            if (isset($spreadSheetAry[$i][14])) {
                $finish = mysqli_real_escape_string($conn, $spreadSheetAry[$i][14]);
            }
            $finish_one = "";
            if (isset($spreadSheetAry[$i][15])) {
                $finish_one = mysqli_real_escape_string($conn, $spreadSheetAry[$i][15]);
            }
            $thickness = "";
            if (isset($spreadSheetAry[$i][16])) {
                $thickness = mysqli_real_escape_string($conn, $spreadSheetAry[$i][16]);
            }
            $dimension = "";
            if (isset($spreadSheetAry[$i][17])) {
                $dimension = mysqli_real_escape_string($conn, $spreadSheetAry[$i][17]);
            }
            $path = "";
            if (isset($spreadSheetAry[$i][18])) {
                $path = mysqli_real_escape_string($conn, $spreadSheetAry[$i][18]);
            }
            $product_image = "";
            if (isset($spreadSheetAry[$i][19])) {
                $product_image = mysqli_real_escape_string($conn, $spreadSheetAry[$i][19]);
            }
            $view = "";
            if (isset($spreadSheetAry[$i][20])) {
                $view = mysqli_real_escape_string($conn, $spreadSheetAry[$i][20]);
            }
            $product_multiple_imgs = "";
            if (isset($spreadSheetAry[$i][21])) {
                $product_multiple_imgs = mysqli_real_escape_string($conn, $spreadSheetAry[$i][21]);
            }
            $other = "";
            if (isset($spreadSheetAry[$i][22])) {
                $other = mysqli_real_escape_string($conn, $spreadSheetAry[$i][22]);
            }
            $collection = "";
            if (isset($spreadSheetAry[$i][23])) {
                $collection = mysqli_real_escape_string($conn, $spreadSheetAry[$i][23]);
            }
            $product_status = "";
            if (isset($spreadSheetAry[$i][24])) {
                $product_status = mysqli_real_escape_string($conn, $spreadSheetAry[$i][24]);
            }

            if (! empty($product_name) || ! empty($category) || ! empty($im_code) || ! empty($colour) || ! empty($colour_one) || ! empty($colour_two) || ! empty($colour_three) || ! empty($colour_four) || ! empty($colour_five) || ! empty($packing) || ! empty($type) || ! empty($type_one) || ! empty($trap_type) || ! empty($features) || ! empty($finish) || ! empty($finish_one) || ! empty($thickness) || ! empty($dimension) || ! empty($path) || ! empty($product_image) || ! empty($view) || ! empty($product_multiple_imgs) || ! empty($other) || ! empty($collection) || ! empty($product_status)) {
                $query = "insert into sanitaryware(`product_name`,`category`,`im_code`,`colour`,`colour_one`,`colour_two`,`colour_three`,`colour_four`,`colour_five`,`packing`,`type`,`type_one`,`trap_type`,`features`,`finish`,`finish_one`,`thickness`,`dimension`,`path`,`product_image`,`view`,`product_multiple_imgs`,`other`,`collection`,`product_status`) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
                $paramType = "sssssssssssssssssssssssss";
                $paramArray = array(
                    $product_name,
                    $category,
                    $im_code,
                    $colour,
                    $colour_one,
                    $colour_two,
                    $colour_three,
                    $colour_four,
                    $colour_five,
                    $packing,
                    $type,
                    $type_one,
                    $trap_type,
                    $features,
                    $finish,
                    $finish_one,
                    $thickness,
                    $dimension,
                    $path,
                    $product_image,
                    $view,
                    $product_multiple_imgs,
                    $other,
                    $collection,
                    $product_status
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