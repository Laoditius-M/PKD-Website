<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Padi's Kitchen Delight</title>
    <link rel="stylesheet" href="padiStyle2.css">
    <link rel="stylesheet" href="padiStyle.css">
    <link rel="stylesheet" href="swiper-bundle.min.css">

    <link rel="stylesheet" href="gallery.css">

    
    <link rel="stylesheet" href="SliderStyle.css">
    <script src="homeScript.js"></script>
    <script src="homeScript.js" defer></script>
</head>
<body>

<?php include_once('includes/header.php');?>
    <section class="homeMainSect">
        <div class="homeDetails">
            <p>sthembiso</p>
            <h1>FOOD CATERING</h1>
            <div class="homeMainDesc">
                <p>Lorem i quasi vitae magni, ab id eaque ipsam culpa blanditiis doloremque
                    nihil laudantium minus sed ex mollitia!
                </p>
            </div>
          <button type="submit" value="Order Now" class="Orderbtn"><a class="Orderbtn" href="menus.php">Order Now</a></button>
        </div>
    </section>
    <section class="homeIntro"> 
        <div class="container"> 
            <div class="content">
                <div class="left">
                    <img src="images/homeIntro.jpg">
                </div>
                <div class="right">
                    <div class="heading">
                        <h4>What we do</h4>
                        <h1>WE'LL MAKE SURE YOUR EVENT IS PERFECT</h1>
                    </div>
                        <p class="margin4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, iste. Incidunt, quisquam ab consequuntur
                            atque,
                            sit cupiditate aperiam.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia, iste. Incidunt, quisquam ab consequuntur
                            atque, quam tempore voluptatum cum voluptate <br>minus neque qui dolores repudiandae,
                            aliquam cumque accusantium. 
                        </p>
                </div>
            </div> 
        </div>
    </section>
    <section class="ourServices">
        <div class="container">
            <div class="heading">
                <h4>Our tasty offers</h4>
                <h1>OUR SERVICES</h1>
            </div>
            <div class="content">
                <div >
                    <img class="image" src="images/starters.jpeg">
                    <h4>STARTERS SELECTION</h4>
                    <button class="orderBtn-2"><a class="orderBtn-2" href="menus.php">Order Now</a></button>
                    
                </div>
                <div>
                    <img class="image" src="images/main.jfif">
                    <h4>MAIN COURSES</h4>
                    <button class="orderBtn-2"><a class="orderBtn-2" href="menus.php">Order Now</a></button>
                </div>
                <div>
                    <img class="image" src="images/dessert.jfif">
                    <h4>DESSERTS</h4>
                    <button class="orderBtn-2"><a class="orderBtn-2" href="menus.php">Order Now</a></button>
                </div>
            </div>
    </section>
    <section class="figures" id="sectionCounter">
        <div class="content">
            <div class="happyCustomers">
            <img src="images/account.png">
            <div>
                <p>Happy Clients</p>
                <p class="counter" data-target="100">1000</p>
            </div>
        </div>
        <div class="businessYears">
            <img src="images/account.png">
            <div>
                <p>Years in Business</p>
                <div class="plus">
                    <p class="counter" data-target="10">10</p><span>+</span>
                </div>
                
            </div>
        </div>
        </div>     
    </section>
    <section class="specialOccasion">
        <div class="container">
            <div class="heading">
                <h4>Celebrate with class</h4>
                <h1>SPECIAL OCCASIONS</h1>
            </div>
            <div class="content">
                <div class="packageOption">
                    <div class="pkgOptionImg">
                    <a  href="menus.php">
                        <img src="images/pexels-cottonbro-3171736.jpg">
                    </a>
                           
                    </div>            
                    <div class="pkgOptionHeading">
                    <a  href="menus.php"><h4>Parties</h4></a>
                    </div>
                </div>
                <div class="packageOption">
                    <div class="pkgOptionImg">
                    <a  href="menus.php">
                        <img src="images/wedding 1.jpg">
                    </a>
                    </div>
                    <div class="pkgOptionHeading">
                    <a  href="menus.php"> <h4>Weddings</h4></a>
                    </div>
                </div>
                <div class="packageOption">
                    <div class="pkgOptionImg">
                    <a  href="menus.php">
                        <img src="images/business.jfif">
                    </a>
                        
                    </div>
                    <div class="pkgOptionHeading">
                      <a   href="menus.php"><h4>Conferences</h4></a>
                    </div>
                </div>
                <div class="packageOption">
                    <div class="pkgOptionImg">
                    <a  href="menus.php">
                        <img src="images/picnics2.jfif">
                    </a>
                        
                    </div>
                    <div class="pkgOptionHeading">
                    <a  href="menus.php"><h4>Picnics</h4></a>
                    </div>
                </div>
            </div>
        </div>
    </section>
   
    <div class="slide-container swiper">
         <div class="heading">
                <h4>What our clients say about us</h4>
                <h1>TESTIMONIALS</h1>
            </div>
                <div class="slide-content">
                    <div class="card-wrapper swiper-wrapper">
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
                                    <div>
                                        <p>"<br> They offer the best catering service."</p>
                                    </div>
                            
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Sthe</h2>
                            </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
                                <div>
                                    <p>"<br> They offer the best catering service. "</p>
                                </div>
                            </div>
            
                        <div class="card-content">
                            <h2 class="name">Sam</h2>
                        </div>
                        </div>
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div>
                                    <p> "<br>They offer the best catering service. "</p>
                                </div>
                            </div>
            
                            <div class="card-content">
                                <h2 class="name">Dennis</h2>
                            </div>
                        </div>
                       
                        <div class="card swiper-slide">
                            <div class="image-content">
                                <span class="overlay"></span>
            
                                <div class="card-image">
                                <p> "<br>They offer the best catering service. "</p>
                                </div>
                            </div>
            
                            <div class="card-content">
                            <h2 class="name">Mark</h2>
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

    // Send product details in the server
    $(".addItemBtn").click(function(e) {
      e.preventDefault();
      var $form = $(this).closest(".form-submit");
      var pid = $form.find(".pid").val();
      var pname = $form.find(".pname").val();
      var pprice = $form.find(".pprice").val();
      var pimage = $form.find(".pimage").val();
      var pcode = $form.find(".pcode").val();
      var pqty = $form.find(".pqty").val();

      

      $.ajax({
        url: 'action.php',
        method: 'post',
        data: {
          pid: pid,
          pname: pname,
          pprice: pprice,
          pqty: pqty,
          pimage: pimage,
          pcode: pcode
        },
        success: function(response) {

          $("#message").html(response);
          window.scrollTo(0, 0);
          load_cart_item_number();
        }
      });
    });

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