<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="padiStyle2.css">
    <link rel="stylesheet" href="padiStyle.css">
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="swiper-bundle.min.css">
    <link rel="stylesheet" href="SliderStyle.css">
    <script src="homeScript.js" defer></script>
</head>
<body>
<?php include_once('includes/header.php');?>

    <section class="homeIntro" id="aboutUs">
        <div id="pageHeading">
            <h1>ABOUT US</h1>
        </div>
    <div class="container">
    <?php
$sql="SELECT * from pages where PAGE_TYPE='aboutus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>       
        <div class="content">
            <div class="left">
                <img src="images/weddingBack2.jpg">
            </div>
            <div class="right">
                <h2>OUR STORY</h2>
                <p><?php  echo $row->PAGE_DESCRIPTION;?></p>
            </div><?php $cnt=$cnt+1;}} ?>
        </div>
    </div>
    </section>
    
    <section class="ourTeam">
        <div class="container">
            <div class="heading">
                <h1>OUR TEAM</h1>
            </div>
            <div class="slide-container swiper">
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                        <div class="card-content">
                            <h2 class="name">Placeholder</h2>
                        </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                    <img src="images/account.png" alt="" class="card-img">
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Placeholder</h2>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="swiper-button-next swiper-navBtn"></div>
                <div class="swiper-button-prev swiper-navBtn"></div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>
    <script type="text/javascript">
  $(document).ready(function() {


    // Load total no.of items added in the cart and display in the navbar
    load_cart_item_number();

    function load_cart_item_number() {
      $.ajax({
        url: 'action.php',
        method: 'get',
        data: {
          cartItem: "cart_item"
        },
        success: function(response) {
          $("#cart-item").html(response);
        }
      });
    }
  });
  </script>
    <!-- Swiper JS -->
    <script src="swiper-bundle.min.js"></script>
    
    <!-- JavaScript -->
    <script src="sliderJavacript.js"></script>
    <?php include_once('includes/footer.php');?>
</body>

</html>