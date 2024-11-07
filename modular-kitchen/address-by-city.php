<?php
//  $conn = new mysqli("localhost:3306", "root", "", "ivas");
 $conn = new mysqli("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
// $conn = new mysqli("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
$cities_id = isset($_POST["cities_id"]) ? addslashes($_POST["cities_id"]) : "";
$result = mysqli_query($conn,"SELECT * FROM modular_kitchen_address_details where modular_kitchen_city_id = $cities_id");
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
  <div class="row dealer-col-address mb-4">
  <div class="col-sm-4">
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

        echo '
        </div></div></div>

        <div class="col-sm-8">';

        if (!empty($row["direction"])) {
          echo '
                              <div class="get-direction-map shadow-sm addrs-map"> 
                                  ' . $row["direction"] . '
                                      
                              </div>';
                              }
                              echo '
                              </div>

      </div>
    </div>
';
  }
  echo '</div>
      <!-- Add Navigation Arrows -->';
  if ($rows_count > 1) {
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
    overflow: hidden; padding: 0;
  }
  .slider-inner {
    display: flex;
    transition: transform 0.5s ease;
  }
  .dealer-result .slidedealer {
    flex: 0 0 auto;
    margin: 0px;      padding: 1% 2%;
    width: 100%; /* Adjust the width as needed */
  }
  .get-direction-map iframe {
    width: 100%;
    height: 282px; line-height:0;
}
.addrs-map {
  padding: 0;
  line-height: 0;
  border-radius: 0.375rem;
  overflow: hidden;
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
    left: 0px;
  }
  .next1 {
    right: 10px;
  }
  .dealer-col-address .col-sm-8{ *padding-right:0;}

  @media screen and (max-width: 768px) {
  .addrs-map { padding: 0; margin-top: 20px;}
  .dealer-col-address .col-sm-8{ padding-right:1rem;}
  .slider-arrow { top: 23%;}
  .dealer-result .slidedealer {padding: 1% 8%;}
  .prev1 { left: 10px;}
  .next1 { right: 20px;}
}
</style>
<script>
  const container = document.querySelector(".slider-container");
  const inner = document.querySelector(".slider-inner");
  const prevArrow = document.querySelector(".slider-arrow.prev1");
  const nextArrow = document.querySelector(".slider-arrow.next1");
  let slideIndex = 0;
  let startX = 0;
  let endX = 0;
  const slideWidth = document.querySelector(".slidedealer").offsetWidth;
  const slidesCount = document.querySelectorAll(".slidedealer").length;
  const visibleSlides = Math.floor(container.offsetWidth / slideWidth);
  const slidesPerClick = Math.min(visibleSlides, slidesCount);
  
  // Function to handle touch start
  function handleTouchStart(event) {
    startX = event.touches[0].clientX;
  }

  // Function to handle touch move
  function handleTouchMove(event) {
    if (!startX) return;
    endX = event.touches[0].clientX;
  }

  // Function to handle touch end
  function handleTouchEnd() {
    if (endX - startX > 50) {
      // Swipe right
      slideIndex = Math.max(slideIndex - slidesPerClick, 0);
    } else if (startX - endX > 50) {
      // Swipe left
      slideIndex = Math.min(slideIndex + slidesPerClick, slidesCount - visibleSlides);
    }
    inner.style.transform = `translateX(-${slideIndex * slideWidth}px)`;
    startX = 0;
    endX = 0;
  }
  
  // Attach touch event listeners
  inner.addEventListener("touchstart", handleTouchStart);
  inner.addEventListener("touchmove", handleTouchMove);
  inner.addEventListener("touchend", handleTouchEnd);
  
  // Click event listeners remain unchanged
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
