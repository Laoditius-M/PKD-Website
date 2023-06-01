<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    
    <title>Padi's Kitchen Delight | Food Packages</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Humberger Begin -->
<?php include_once('includes/header.php');?>
    <!-- Header Section End -->

    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Foods Packages</h2>
                        <div class="breadcrumb__option">
                            <a href="index.php">Home</a>
                            <span>Packages</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->

                <div class="col-lg-9 col-md-7">
                    <div class="product__discount">
                        <div class="section-title product__discount__title">
                            <h2>Food Packages</h2>
                        </div>
                        <div class="row">
                            <div class="product__discount__slider owl-carousel">
                                <?php

$sql="SELECT * from  tblfood order by rand() limit 6";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
                                <div class="col-lg-4">

                                    <div class="product__discount__item">
                                        
                                        <div class="product__discount__item__pic set-bg"
                                            data-setbg="admin/itemimages/<?php echo $row->ItemImage;?>" width="100" height="100">
                                            
                                           
                                        </div>
                                        <div class="product__discount__item__text">
                                            <span><?php echo $row->PackageName;?></span>
                                            <h5><a href="#"><?php echo $row->Category;?></a></h5>
                                            <div class="product__item__price">$<?php echo $row->Price;?> <span></span></div>
                                        </div>
                                    </div>
                                </div><?php $cnt=$cnt+1;}}?>
                            </div>
                        </div>
                    </div>
                    <div class="filter__item">
                        <div class="row">
                               <div class="col-lg-12 col-md-5">
                           <h3 style="color:blue">Products</h3>
                           <hr />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php

                                    if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        // Formula for pagination
        $no_of_records_per_page = 6;
        $offset = ($pageno-1) * $no_of_records_per_page;
       $ret = "SELECT ID FROM tblfood";
$query1 = $dbh -> prepare($ret);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$total_rows=$query1->rowCount();
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql="SELECT * from  tblfood LIMIT $offset, $no_of_records_per_page";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
    
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            
                            <div class="product__item">
                                <form method="post" action="products.php?action=add&pid=<?php echo $row->ID; ?>">
                                <div class="product__item__pic set-bg" data-setbg="admin/itemimages/<?php echo $row->ItemImage;?>">
                                  
                                </div>
                                <div class="product__item__text">
                                    <h6><a href="food-details.php?pid=<?php echo $row->ID;?>"><?php echo $row->PackageName;?></a></h6>
                                    <h5>$<?php echo $row->Price;?></h5>
                                </div>
                               <p style="padding-top: 20px"> <input type="text" class="item_quantity" name="quantity" value="1" /></p>
                    
<input type="submit" value="Add to Cart" class="btnAddAction" />
                            </div>
                            
                        </div>
</form>
                        <?php $cnt=$cnt+1;}}?>
                     
                    </div>
                 <div>
                        <ul class="pagination" >
        <li><a href="?pageno=1"><strong>First></strong></a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>"><strong style="padding-left: 10px">Prev></strong></a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>"><strong style="padding-left: 10px">Next></strong></a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>"><strong style="padding-left: 10px">Last</strong></a></li>
    </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
<?php include_once('includes/footer.php');?>
    <!-- Footer Section End -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>



</body>

</html>