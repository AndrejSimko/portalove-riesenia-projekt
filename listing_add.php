<?php
include_once "db_connect.php";
$db = $GLOBALS['db'];

$categoryItems = $db->getCategory();
$imageItems = $db->getImage();
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

    <title>Plotlist - Add Your Listing</title>

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
              <li><a href="listing.php">Listing</a></li>
              <li><a href="contact.php">Contact Us</a></li>
              <?php
              if($_SESSION) {
                if($_SESSION['logged_in']) {
                  ?><li><a href="my_listings.php">My Listings</a></li>
                  <li><a href="logout.php">Log out</a></li>
                  <li><div class="main-white-button"><a href="#"><i class="fa fa-plus"></i> Add Your Listing</a></div></li> 
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
            <h2>Add your listing</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="addlisting-page">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-lg-6" style="margin-left: 25%">
                <form id="contact" action="listing_add_fun.php" method="post" class="addlisting-form" style="margin: 10% 0% 10% 0%">
                  <div class="row">
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="title" id="title" placeholder="Title" class="form-control" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="price" id="price" placeholder="Price" class="form-control" required="">
                      </fieldset>
                    </div>
                      <div class="col-lg-12">
                      <fieldset>
                        <input type="text" name="details" id="description" placeholder="Description" class="form-control" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="detail1" id="detail" placeholder="Detail" class="form-control" required="">
                      </fieldset>
                    </div>
                    <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="detail2" id="detail" placeholder="Detail" class="form-control" required="">
                      </fieldset>
                    </div>
                    <!-- <div class="col-lg-6">
                      <fieldset>
                        <input type="text" name="image_id" id="id" placeholder="Image Id" class="form-control" required="">
                      </fieldset>
                    </div> -->
                    <div class="col-lg-12">
                    <ul>
                    <?php
                        foreach ($categoryItems as $categoryItem) {
                    ?>
                            <li><input type="checkbox" class="checkoption" name="category_id" value="<?php echo $categoryItem['id']; ?>"><span><?php echo $categoryItem['category']; ?></span></li>
                        <?php
                        }
                        ?>
                    </ul>
                    <ul>
                    <?php
                        foreach ($imageItems as $imageItem) {
                    ?>
                            <li style="margin: 10px"><input type="checkbox" class="checkoption-2" name="image_id" style="margin:10px" value="<?php echo $imageItem['id']; ?>"><img src=<?php echo $imageItem['path']; ?> alt=<?php echo $imageItem['alt_name']; ?> style="width:150px"></li>
                        <?php
                        }
                        ?>
                    </ul>
                    </div>
                    <div class="col-lg-12">
                      <fieldset>
                        <button type="submit" id="form-submit" class="main-button" style="margin-top: 15px">Submit</button>
                      </fieldset>
                    </div>
                  </div>
                </form>
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
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
   <script type="text/javascript">
   $(document).ready(function(){

      $('.checkoption').click(function() {
         $('.checkoption').not(this).prop('checked', false);
      });

   });
   $(document).ready(function(){

      $('.checkoption-2').click(function() {
        $('.checkoption-2').not(this).prop('checked', false);
      });

    });
   </script>

</body>

</html>
