<?php
 session_start();
 error_reporting(0);
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
    <script src="homeScript.js" defer></script>
</head>

<body>
<?php include_once('includes/header.php');?>

    <section class="orderDetails">
        <div id="pageHeading">
            <h1>CART</h1>
        </div>
        <div class="container">
        <div class="content">
            <form class="box">
            <table cellspacing="0" cellpadding="10">

                <tr>
                    <td id="row1">Item Image</td>
                    <td id="row1">Item Name</td>
                    <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                    <td id="row1" class="price">Price</td>
                    <td id="row1">Quantity</td>
                    <td id="row1">Total</td>
                </tr>
                <?php
                require 'config.php';
                $stmt = $conn->prepare('SELECT * FROM cart');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
                <tr>
                    <td id="row2"><img class="orderDImg" src="itemimages/<?= $row['product_image'] ?>"></td>
                    <td id="row2"><div><p><?= $row['product_name'] ?></p><a href="action.php?remove=<?= $row['id'] ?>" class="itemRemoveBtn">REMOVE</a></div></td>
                    <td id="row2" class="price">R <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>"></td>   
                    <td id="row2"><input type="text" class=" itemQty" value="<?= $row['qty'] ?>" ></td>
                    <td id="row2">R <?= number_format($row['total_price'],2); ?></td>
                </tr>
                <?php $grand_total += $row['total_price']; ?>
                <?php endwhile; ?>

                <tr id="row3">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td id="row3">Subtotal</td>
                    <td id="row3">R <?= number_format($grand_total,2); ?></td>
                </tr>
            </table>
            </form>
            </div>
        </div>
    </section>
    <section class="delivery">
        <div class="container">
        <div class="deliveryBox">
            <div class="deliveryHeader">
                <h1>LOCAL DELIVERY</h1>
                <img src="images/braai.jfif">
            </div>
            <div class="deliveryDetails">
                <p>Enter your postal code to see if you are eligable
                for delivery</p>
                <input type="text" class="deliveryDetailsInput"> 
            </div>
            <div class="delvDetailsBtnBox">
            <a href="checkout.php" ><input type="submit" value="CHECK OUT" class="delcDetailsBtn" <?= ($grand_total > 1) ? '' : 'disabled'; ?>></a>
            </div>
        </div>
        </div>
    </section>
    <section id="contShopping">
        <div class="container">
        <input type="submit" value="CONTINUE SHOPPING" class="contiShopBtn">
        </div>
    </section>
    
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>

  <script type="text/javascript">
  $(document).ready(function() {

    // Change the item quantity
    $(".itemQty").on('change', function() {
      var $el = $(this).closest('tr');

      var pid = $el.find(".pid").val();
      var pprice = $el.find(".pprice").val();
      var qty = $el.find(".itemQty").val();
      location.reload(true);
      $.ajax({
        url: 'action.php',
        method: 'post',
        cache: false,
        data: {
          qty: qty,
          pid: pid,
          pprice: pprice
        },
        
        }
        console.log(qty);
        success: function(response) {
          console.log(response);
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
    <?php include_once('includes/footer.php');?>
</body> 
</html>