<?php
//  $conn = new mysqli("localhost", "root", "", "ivas");
$conn = new mysqli("localhost", "ivas_homes", "a4qhe6aaw6of", "ivas_homes");
// $conn = new mysqli("localhost", "ivas_homes_uat", "6rl9d3zxwuqb", "ivas_homes_uat");
$cities_id = $_POST["cities_id"];
$result = mysqli_query($conn, "SELECT * FROM address_details WHERE city_id = $cities_id");
if (!$result) {
  die('<div class="col-sm-12"><p class="alert alert-danger">Please Select City</p></div>');
}
$rows_count = mysqli_num_rows($result);
$iframes_count = 0; // Initialize the count of non-empty i_frames

// Count the number of rows with non-empty i_frames
while ($row = mysqli_fetch_assoc($result)) {
    if (!empty($row["i_frame"])) {
        $iframes_count++;
    }
}

// Reset the result set pointer
mysqli_data_seek($result, 0);

if ($rows_count) {
    echo '<div class="slider-container">
            <div class="slider-inner">';
            
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
                <div class="slidedealer">
                    <div class="col-sm-4 dealer-col-address mb-4" style="width: 100% !important;">
                        <div class="card shadow-sm py-4 px-3">
                            <div class="card-body">
                                <div class="home-af">
                                    <h4 class="card-title">' . $row["title"] . '</h4>
                                    <p class="dealer-address">' . $row["address"] . '</p> 
                                </div>';
                                    
        // Check if phone number is not empty before displaying the link
        if (!empty($row["phone"])) {
            echo '
                                <i class="fa fa-phone"></i>
                                <a href="tel:' . $row["phone"] . '">
                                    ' . $row["phone"] . '
                                </a>';
        }

        if (!empty($row["i_frame"])) {
            echo '
                                <div class="get-direction-map home-map"> 
                                    '. $row["i_frame"] .'
                                </div>';
        }
        echo '
                            </div>
                        </div>
                    </div>
                </div>';
    }

    echo '</div>';

    // Add Navigation Arrows based on conditions
    if ($iframes_count > 0) {
        // If at least one i_frame is present, show arrows if there are more than 1 row
        if ($rows_count > 1) {
            echo '<div class="slider-arrow prev1"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                  <div class="slider-arrow next1"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
        }
    } else {
        // If no i_frame is present, show arrows if there are more than 3 rows
        if ($rows_count > 3) {
            echo '<div class="slider-arrow prev1"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
                  <div class="slider-arrow next1"><i class="fa fa-angle-right" aria-hidden="true"></i></div>';
        }
    }

    echo '</div>';

  // Include Swiper JavaScript and CSS files<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  echo '
<style>
  .slider-container {
    position: relative;
    width: 100%;
    overflow: hidden;padding: 0;
  }
  .slider-inner {
    display: flex;
    transition: transform 0.5s ease; padding:1%;
  }
  .dealer-result .slidedealer {
    flex: 0 0 auto;
    margin-right: 15px;
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
    right: 20px;
  }

#njj .slidedealer { width:100%; padding:1% 2%; margin-right: 0px;  padding-top: 5px;}
#njj .card.shadow-sm.py-4.px-3 { padding: 0 !important;box-shadow: none !important;}
#njj .card-body {  padding: 0;display: flex;}
#njj .home-af {
  padding-top: 1.5rem !important;
  padding-bottom: 1.5rem !important;
  min-height: 282px;
  padding-right: 2.5rem !important;
  padding-left: 2.5rem !important;
  box-shadow: 0 0.0625rem 0.375rem 0 rgba(0,0,0,.2)!important; border-radius:0.375rem; flex: 0 0 auto;
  width: 33.33333333%; margin-right: 1rem;}

  #njj .get-direction-map{    padding: 0;
    line-height: 0;
    border-radius: 0.375rem;box-shadow: 0 0.0625rem 0.375rem 0 rgba(0,0,0,.2)!important;
    overflow: hidden;    width: 66.66666667%;}

  #njj .get-direction-map iframe {
    width: 100%;
    height: 282px;
    line-height: 0;
}

.get-direction-map.home-map {
  display: none;
}

#njj .get-direction-map.home-map{display: block;}


@media (max-width: 768px) {
  #njj .card-body {  display: block; width: 100%;}
#njj .home-af {width:100%; margin-right: 0rem; margin-bottom:20px;height: auto;    min-height: auto;}
#njj .get-direction-map{ width: 100%;}


.addrs-map { padding: 0; margin-top: 20px;}
.dealer-col-address .col-sm-8{ padding-right:1rem;}
#njj .slider-arrow { top: 23%;}
#njj .slidedealer{padding: 1% 8%; }
.prev1 { left: 0px;}
.next1 { right: 10px;}
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
