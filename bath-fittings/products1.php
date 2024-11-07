<?php
$page ='bath-fittings';
?>

<?php include '../inc/head.php'; ?>
<?php include '../database.php';?>

<title>Ivas -  Sanitaryware</title>
<meta name="description" content="" />
<link rel="canonical" href="" />

<?php include '../inc/header.php'; ?>
 
<div class="bg-body-white">

<div class="modular-kitchen-banner py-5" id="bath-fitting-list-banner">
        <div class="container">
		<div class="row align-items-center">
		<div class="col-sm-8 px-5 py-5">
          <div class="text-start">
            <h2 class="m-0 py-4">Bath Fittings</h2>
          </div>
		  
		   </div>
		  


      </div>
		  
		  
        </div>
      </div>


<div class="container py-5">

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="https://www.ivas.homes/">Home</a></li>
    <li class="breadcrumb-item"><a href="bath-fittings">Bath Fittings</a></li>
    <li class="breadcrumb-item active" aria-current="page">Products</li>
  </ol>
</nav>


         <div class="row search-filter-dd">
         <div class="col"> 
         <div class="hide-desktop"><span onclick="openFilter()"><i class="fa fa-filter" aria-hidden="true"></i> Filter</span></div>
         </div>
         <div class="col"> 
            <div class="serach-bar">
            <form method="POST" class="form-inline">
                <input type="text" id="txt_search" class="form-control" placeholder="Search Products...">
                
                </form>
            </div></div>
  </div>



        <div class="row">
			
            <div class="col-md-3 product-filter">                				
				<!--<div class="list-group">
					<h3>Price</h3>
					<input type="hidden" id="hidden_minimum_price" value="0" />
                    <input type="hidden" id="hidden_maximum_price" value="65000" />
                    <p id="price_show">1000 - 65000</p>
                    <div id="price_range"></div>
                </div>-->			

                <?php
$isMobile = false;
$userAgent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $userAgent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($userAgent, 0, 4))) {
    $isMobile = true;
}
?>

<?php if ($isMobile): ?>
  <div id="mobile">
    <div id="filterMob" class="filter-nav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeFilter()">&times;</a>
      <div class="filter-nav-content">
        <?php include 'bath-fitting_filter.php' ?>
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="hide-mobile">
    <?php include 'bath-fitting_filter.php' ?>
  </div>
<?php endif; ?>


            </div>

            <div class="col-md-9 product_data">
            <div class="loader-symbol"><div class="loader-1" style="display: none;"></div></div>
                <div class="row filter_data" id="content" >
                
                
                </div>
            </div>
        </div>

    </div>



 
</div>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">

                     
                     <button type="button" class="btn btn-secondary close-btn-pop" data-bs-dismiss="modal">&times;</button>  
                     

                <div class="modal-body p-0" id="product_detail">
                </div>  
               
           </div>  
      </div>  
 </div>

  
<?php include '../inc/footer-js.php'; ?>
<script type="text/javascript" src="./js/jquery-1.10.2.min.js"></script>

<script src="./js/swiper-bundle.min.js"></script>
<!-- <script src="../js/search.js"></script> -->
<script type="text/javascript" src="./js/bath-fittings/bath-fitting.js"></script>
<script type="text/javascript" src="./js/bath-fittings/bath-fitting_search.js"></script>

<script>
function openFilter() {
  document.getElementById("filterMob").style.width = "70%";
}

function closeFilter() {
  document.getElementById("filterMob").style.width = "0%";
}
</script>
<!-- Place this script in the head section of your HTML document -->
<script>
  // Check if the user is using a mobile device
function isMobileDevice() {
  return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
}

// Show or hide the div element based on the mobile device condition
var mobileDiv = document.getElementById("mobile");
if (isMobileDevice()) {
  mobileDiv.style.display = "block";  // Show the div element
} else {
  mobileDiv.style.display = "none";   // Hide the div element
}

  </script>

<?php include '../inc/footer.php'; ?>
