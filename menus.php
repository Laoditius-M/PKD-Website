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
    <title>Document</title>
    <link rel="stylesheet" href="padiStyle2.css">
    <link rel="stylesheet" href="padiStyle.css">
    <link rel="stylesheet" href="gallery.css">
    <script src="homeScript.js"></script>
</head>

<body>
<?php include_once('includes/header.php');?>
    
    <section class="menus">
        <div id="pageHeading">
            <h1>MENUS</h1>
        </div>
        <div class="container"> 
          <div class="menuList content">
          <?php 
$sql2 = "SELECT * from   menus ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>
            <div>
                <img class="image" src="admin/images/<?php echo htmlentities($row->CATEGORY_IMG);?>">
                <h3><?php echo htmlentities($row->MENU_NAME);?></h3>
                <a href="menuItems3.php?catid=<?php echo htmlentities($row->MENU_NAME)?>"><?php echo htmlentities($row->CatName);?><button class="orderBtn-2" id="menuBtn">Order Now</button></a>        
            </div>
            <?php } ?>

          </div>
        </div>
    </section>

    <?php include_once('includes/footer.php');?>
</body>

</html>