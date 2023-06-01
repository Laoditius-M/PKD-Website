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
    <script src="homeScript.js"></script>
</head>
<body>
<?php include_once('includes/header.php');?>

    <section class="Gallery" id="gallery">
        <div id="pageHeading">
            <h1>GALLERY</h1>
        </div>
        <div class="container">
            <div class="content">
                <div class="imgContainer">
                    <img class="image-resize" src="images/pexels-vidal-balielo-jr-4007053.jpg">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/weddingBack2.jpg">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/pexels-vidal-balielo-jr-4007053.jpg">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/pexels-vidal-balielo-jr-4007053.jpg">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/dessert.jfif">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/business.jfif">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/chakalaka.jfif">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/custom.jfif">
                </div>
                <div class="imgContainer">
                    <img class="image-resize" src="images/pexels-vidal-balielo-jr-4007053.jpg">
                </div>
               
                
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
        </div>      
</body>

</html>