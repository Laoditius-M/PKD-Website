<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
include('includes/config.php');


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

    <script src="homeScript.js"></script>
</head>

<body>

<?php include_once('includes/header.php');?>
   
    <section class="order">
        <div id="pageHeading">
            <h1>ORDER</h1>
        </div>
        <div class="container">
        <?php
$pid=$_GET['item'];
$sql="SELECT * from  menuItems where ITEM_NAME=:pid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <div class="content">
                <div class="left">
                    <div class="orderImg">
                        <img src="itemimages/<?php echo $row->ITEM_IMAGE;?>" width="500" height="500" alt="">
                    </div>
                    <div class="orderSubImgBox">
                     
                    </div>                    
                </div>
               
              <form action="" class="form-submit">
                <div class="right">
                    <h1><?php echo $row->ITEM_NAME;?></h1>
                    <div class="desc">
                        <p>Serves <?php echo $row->NUM_OF_PEOPLE;?></p>
                        <div>
                            <label>Quanitity</label>
                            <input type="number" value="1" class=" orerQnty pqty">
                        </div>                        
                    </div>
                    <h2 id="price">R<?php echo $row->Price;?></h2>
                <input type="hidden" class="pid" value="<?= $row-> ID;?>">
                <input type="hidden" class="pname" value="<?=  $row->ITEM_NAME; ?>">
                <input type="hidden" class="pprice" value="<?= $row->PRICE;?>">
                <input type="hidden" class="pimage" value="<?=  $row->ITEM_IMAGE; ?>">
                <input type="hidden" class="pcode" value="<?= $row->ID;?>">
                    <button type="submit" value="ADD TO CART" class=" orderBtn addItemBtn" min="0">ADD TO CART</button>

                    <div class="includes">
                        <p>Includes</p>
                        <p><?php echo $row->DESCRIPTION?></p>
                        
                    </div>
                </div>
            </div>
            </form>
            <?php $cnt=$cnt+1;}}?>
            
        </div>
    </section>
    <section class="foodSuggestion">
        <div class="container">
            <div class="heading">
                <h3>You may also like</h3>
            </div>
            <div class="content">
                <div class="packageOption">
                    <div class="pkgOptionImg">
                        <img src="images/pexels-cottonbro-3171736.jpg">
                    </div>
                </div>
                <div class="packageOption">
                    <div class="pkgOptionImg">
                        <img src="images/wedding 1.jpg">
                    </div>
                </div>
                <div class="packageOption">
                    <div class="pkgOptionImg">
                        <img src="images/business.jfif">
                    </div>
                </div>
                <div class="packageOption">
                    <div class="pkgOptionImg">
                        <img src="images/picnics2.jfif">
                    </div>
                </div>
            </div>
        </div>
    </section>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

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

    <?php include_once('includes/footer.php');//?>
</body>
</html>