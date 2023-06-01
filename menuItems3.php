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
    <title>Menu Items</title>
    <link rel="stylesheet" href="menuItemsPageCSS.css">
    <link rel="stylesheet" href="padiStyle2.css">
    <link rel="stylesheet" href="padiStyle.css">
    <link rel="stylesheet" href="gallery.css">
    <script src="homeScript.js"></script>
</head>

<body>
    <header class="navBar" id="navBar2">
        <div class="logo">
            <a href="home.html#home"><img class="logoImg" src="images/logo.png" /></a>
        </div>
        <nav>
            <ul class="navMenu">
                <li><a href="home.html">Home</a></li>
                <li><a href="aboutUs.html">About</a></li>
                <li><a href="menus.html">Menus</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contactUs.html">Contact</a></li>
                <li class="singInBtn"><a href="startupPage.html">Sign In</a></li>
                <li><a href=""><img src="images/cart1.png" class="navCart"></a></li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".navMenu");

        hamburger.addEventListener("click", mobliemmenu);

        function mobliemmenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        }

        window.addEventListener("scroll", function () {
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        });
    </script>
    <section class="menuItems">
        <div id="pageHeading">
            <h1>MENU ITEMS</h1>
        </div>
        <div class="container">
            <div class="content">
                <div class="itemsList">
                    <div class="itemsHeading">
                        <h3>Our Menu's</h3>
                    </div>
                    <div class="menuNames"  >
<?php
                    
$sql2 = "SELECT * from   menus ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
?>       
                <a href="order.php?catid=<?php echo htmlentities($row->MENU_NAME)?>"><?php echo htmlentities($row->MENU_NAME);?></a>
                <?php } ?>  

                    </div>
                </div>
                <div class="itemsBox">
                <?php $pid=$_GET['catid'];?>
                    <div class="itemsHeading">
                        <h3><?php echo $pid;?></h3>
                    </div>
                    <div class="items">
                    <?php
$sql="SELECT * from  menuItems where MENU_TYPE=:pid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':pid', $pid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                    
                        <div>
                            <img class="image" src="itemimages/<?php echo $row->ITEM_IMAGE;?>" width="600" height="800">
                            <h4><?php echo $row->ITEM_NAME;?></h4>
                            <a href="order.php?item=<?php echo $row->ITEM_NAME; ?> " class="orderBtn-3">Order</a>
                        </div>

                        <?php $cnt=$cnt+1;}}?>
                    </div>
                </div>
            </div>
        </div>
    </section>
     <?php include_once('includes/footer.php');//?>
</body>
</html>

