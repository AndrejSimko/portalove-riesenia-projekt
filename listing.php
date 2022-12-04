<?php
include_once "db_connect.php";
$db = $GLOBALS['db'];

$listingItems = $db->getListing();
$categoryItems = $db->getCategory();
?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Plotlist - Plot Listing Page</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-plot-listing.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<!--

TemplateMo 564 Plot Listing

https://templatemo.com/tm-564-plot-listing

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="listing.php" class="active">Listing</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <?php
              if($_SESSION) {
                if($_SESSION['logged_in']) {
                  ?><li><a href="my_listings.php">My Listings</a></li>
                  <li><a href="logout.php">Log out</a></li>
                  <li><div class="main-white-button"><a href="listing_add.php"><i class="fa fa-plus"></i> Add Your Listing</a></div></li> 
                <?php
                  }else {
                  ?><li><a href="login.php">Log in</a></li>
                  <li><div ></div></li> 
                <?php
                  }
              }else {
                ?><li><a href="login.php">Log in</a></li>
                <li><div ></div></li> 
              <?php
              }
              ?> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <div class="top-text header-text">
            <h6>Check Out Our Listings</h6>
            <h2>Item listings of Different Categories</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="listing-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="naccs">
            <div class="grid">
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                  <?php
                    foreach ($categoryItems as $categoryItem) {
                  ?>
                    <div>
                      <div class="thumb" style="text-align: center">
                        <!-- <span class="icon"><img src="assets/images/search-icon-01.png" alt=""></span> -->
                        <?php echo $categoryItem['category']; ?>
                      </div>
                    </div>
                    <?php
                      }
                    ?> 

                    
                  </div>
                </div> 
                <div class="col-lg-9">
                  <ul class="nacc">
                  <?php
                    foreach ($categoryItems as $categoryItem) {
                  ?>
                    <li class="active">
                      <div>
                        <div class="col-lg-12">
                          <?php
                            foreach ($listingItems as $listingItem) {
                              if($categoryItem["id"] === $listingItem['category_id']){
                          ?>
                          <div class="item">
                            <div class="row">
                              <div class="col-lg-12">
                                <div class="listing-item">
                                  <div class="left-image">
                                    <img src=<?php echo $listingItem['image']; ?> alt=<?php echo $listingItem['alt_name']; ?>>
                                  </div>
                                  <div class="right-content align-self-center">
                                    <h4><?php echo $listingItem['name']; ?></h4>
                                    <h6>by: <?php echo $listingItem['email']; ?></h6>
                                    <span class="price"><div class="icon"><img src="assets/images/listing-icon-01.png" alt=""></div> $<?php echo $listingItem['price']; ?> / month included tax</span>
                                    <span class="details">Details: <em><?php echo $listingItem['details']; ?></em></span>
                                    <span class="info"><img src="assets/images/listing-icon-heading.png" alt=""> <?php echo $listingItem['detail1']; ?><br><br><img src="assets/images/listing-icon-heading.png" alt=""> <?php echo $listingItem['detail2']; ?></span>
                                  </div>
                                </div>
                                <?php
                                  }
                                }
                                ?>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <?php
                      }
                    ?> 
                  </ul>
                </div>          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="about">
            <div class="logo">
              <img src="assets/images/black-logo.png" alt="">
            </div>
            <p>Lorem ipsum dolor sit amet, consectetur adicingi elit, sed do eiusmod tempor incididunt ut et dolore magna aliqua.</p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="helpful-links">
            <h4>Helpful Links</h4>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><a href="#">Categories</a></li>
                  <li><a href="#">Reviews</a></li>
                  <li><a href="#">Listing</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Awards</a></li>
                  <li><a href="#">Useful Sites</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-us">
            <h4>Contact Us</h4>
            <p>27th Street of New Town, Digital Villa</p>
            <div class="row">
              <div class="col-lg-6">
                <a href="#">010-020-0340</a>
              </div>
              <div class="col-lg-6">
                <a href="#">090-080-0760</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sub-footer">
            <p>Copyright © 2021 Plot Listing Co., Ltd. All Rights Reserved.
            <br>
			Design: <a rel="nofollow" href="https://templatemo.com" title="CSS Templates">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/animation.js"></script>
  <script src="assets/js/imagesloaded.js"></script>
  <script src="assets/js/custom.js"></script>

</body>

</html>