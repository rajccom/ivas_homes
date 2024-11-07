<?php
// $conn = new mysqli("localhost:3306", "root", "", "ivas");
$conn = new mysqli("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
// $conn = new mysqli("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
$cities_id = $_POST["cities_id"];
$result = mysqli_query($conn,"SELECT * FROM tiles_address_details where tiles_city_id = $cities_id");
if (!$result) {
  die('<div class="col-sm-12"><p class="alert alert-danger">Please Select City</p></div>');
}
$rows_count = mysqli_num_rows($result);
if ($rows_count) {
  echo '<div class="slider-container">
        <div class="slider-inner">';
  while ($row = mysqli_fetch_assoc($result)) {
      echo '
  <div class="slidedealer">
    <div class="col-sm-4 dealer-col-address mb-4" style="width: 100% !important;">
      <div class="card shadow-sm py-4 px-3">
        <div class="card-body">
          <h4 class="card-title">' . $row["title"] . '</h4>
          <p class="dealer-address">' . $row["address"] . '</p>';
          if (!empty($row["phone"])) {
            echo '
                            <i class="fa fa-phone"></i>
                            <a href="tel:' . $row["phone"] . '">
                                
                                ' . $row["phone"] . '
                            </a>';
        }
    
        if (!empty($row["direction"])) {
        echo '
                            <div class="get-direction-map"> 
                                <a href="' . $row["direction"] . '" target="_blank">
                                    <i class="fa fa-map" aria-hidden="true"></i>
                                    Get directions
                                </a>
                            </div>';
                            }
        echo '
        </div>
      </div>
    </div>
  </div>';
  }
  echo '</div>
      <!-- Add Navigation Arrows -->';
  if ($rows_count > 3) {
      echo '<div class="slider-arrow prev1"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
            <div class="slider-arrow next1"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
  }
  echo '</div>';
  // Include Swiper JavaScript and CSS files<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  echo '
<style>
  .slider-container {
    position: relative;
    width: 100%;
    overflow: hidden;
  }
  .slider-inner {
    display: flex;
    transition: transform 0.5s ease;
  }
  .dealer-result .slidedealer {
    flex: 0 0 auto;
    margin-right: 20px;
    width: 300px; /* Adjust the width as needed */
  }
  .slider-arrow {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 0px;
    height: 40px;
    text-align: center;
    cursor: pointer;
    color: inherit;
    border: none;
    padding: 0px !important;
    font-size: 34px;
    line-height: 13px;
    color: #000;
    font-weight: 700;
  }
  .prev1 {
    left: 10px;
  }
  .next1 {
    right: 10px;
  }
</style>
<script>
  const container = document.querySelector(".slider-container");
  const inner = document.querySelector(".slider-inner");
  const prevArrow = document.querySelector(".slider-arrow.prev1");
  const nextArrow = document.querySelector(".slider-arrow.next1");
  let slideIndex = 0;
  const slideWidth = document.querySelector(".slidedealer").offsetWidth;
  const slidesCount = document.querySelectorAll(".slidedealer").length;
  const visibleSlides = Math.floor(container.offsetWidth / slideWidth);
  const slidesPerClick = Math.min(visibleSlides, slidesCount);
  prevArrow.addEventListener("click", () => {
    slideIndex = Math.max(slideIndex - slidesPerClick, 0);
    inner.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
  });
  nextArrow.addEventListener("click", () => {
    slideIndex = Math.min(slideIndex + slidesPerClick, slidesCount - visibleSlides);
    inner.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
  });
</script>';
} else {
  echo '<div class="col-sm-12"><p class="alert alert-danger">Record Not Found</p></div>';
}
?>