<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['padiskitchenaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!DOCTYPE html>
<head>
<title>Padi's Kitchen Delight | Dashboard</title>

<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.css">
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<!-- font CSS -->
<link href='//fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/jquery.cookie.js"></script>
<script src="js/screenfull.js"></script>
		<script>
		$(function () {
			$('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

			if (!screenfull.enabled) {
				return false;
			}

			

			$('#toggle').click(function () {
				screenfull.toggle($('#container')[0]);
			});	
		});
		</script>
<!-- charts -->
<script src="js/raphael-min.js"></script>
<script src="js/morris.js"></script>
<link rel="stylesheet" href="css/morris.css">
<!-- //charts -->
<!--skycons-icons-->
<script src="js/skycons.js"></script>
<!--//skycons-icons-->
</head>
<body class="dashboard-page">
	<script>
	        var theme = $.cookie('protonTheme') || 'default';
	        $('body').removeClass (function (index, css) {
	            return (css.match (/\btheme-\S+/g) || []).join(' ');
	        });
	        if (theme !== 'default') $('body').addClass(theme);
        </script>
 <?php include_once('includes/sidebar.php');?>
	<section class="wrapper scrollable">
		<?php include_once('includes/header.php');?>
		<div class="main-grid">
			
			
					<div class="grid-info">
						<div class="col-md-3 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql1 ="SELECT * from   subscribers";
$query1 = $dbh -> prepare($sql1);
$query1->execute();
$results1=$query1->fetchAll(PDO::FETCH_OBJ);
$totsubusers=$query1->rowCount();
?>
								<div class="comments-icon">
									
									<h4>Total Subscribers</h4>
								</div>
								<div class="comments-info black-info">
									<h3><?php echo htmlentities($totsubusers);?></h3>
									<a href="subscriber.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-3 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql2 ="SELECT * from   users";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$results2=$query2->fetchAll(PDO::FETCH_OBJ);
$totregusers=$query2->rowCount();
?>
								<div class="comments-icon black-info">
								
									<h4>Total Reg Users</h4>
								</div>
								<div class="comments-info">
									<h3><?php echo htmlentities($totregusers);?></h3>
									<a href="reg-users.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-4 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql3 ="SELECT * from   queries where IS_READ='1'";
$query3 = $dbh -> prepare($sql3);
$query3->execute();
$results3=$query3->fetchAll(PDO::FETCH_OBJ);
$totreadenq=$query3->rowCount();
?>
								<div class="comments-icon">
								
								<h4>Total Reads Enquiries</h4>
								</div>
								<div class="comments-info black-info">
									<h3><?php echo htmlentities($totreadenq);?></h3>
									<a href="read-enquiry.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>

					
						<div class="clearfix"> </div>
					</div>
			
	
					<div class="grid-info">
						<div class="col-md-4 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql4 ="SELECT * from   queries where IS_READ is null";
$query4 = $dbh -> prepare($sql4);
$query4->execute();
$results4=$query4->fetchAll(PDO::FETCH_OBJ);
$totunreadenq=$query4->rowCount();
?>
								<div class="comments-icon">
									<h4>Total Unreads Enquiries</h4>
								</div>
								<div class="comments-info black-info">
									<h3><?php echo htmlentities($totunreadenq);?></h3>
									<a href="unread-enquiry.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-4 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql5 ="SELECT * from   orders where STATUS is null";
$query5 = $dbh -> prepare($sql5);
$query5->execute();
$results5=$query5->fetchAll(PDO::FETCH_OBJ);
$totneworder=$query5->rowCount();
?>
								<div class="comments-icon black-info">
								<h4>Total New Orders</h4>
								</div>
								<div class="comments-info">
									<h3><?php echo htmlentities($totneworder);?></h3>
									<a href="new-order.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-4 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql6 ="SELECT * from   orders where STATUS='Confirmed'";
$query6 = $dbh -> prepare($sql6);
$query6->execute();
$results6=$query6->fetchAll(PDO::FETCH_OBJ);
$totconorder=$query6->rowCount();
?>
								<div class="comments-icon">
									<h4>Total Confirmed Orders</h4>
								</div>
								<div class="comments-info black-info">
									<h3><?php echo htmlentities($totconorder);?></h3>
									<a href="confirmed-order.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>

					
						<div class="clearfix"> </div>
					</div>
<div class="grid-info">
						<div class="col-md-4 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql7 ="SELECT * from  orders where STATUS='Delivered'";
$query7 = $dbh -> prepare($sql7);
$query7->execute();
$results7=$query7->fetchAll(PDO::FETCH_OBJ);
$totdelorder=$query7->rowCount();
?>
								<div class="comments-icon">
									<h4>Total Delivered Orders</h4>
								</div>
								<div class="comments-info black-info">
									<h3><?php echo htmlentities($totdelorder);?></h3>
									<a href="delivered-order.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-4 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql8 ="SELECT * from   orders where STATUS='Cancelled'";
$query8 = $dbh -> prepare($sql8);
$query8->execute();
$results8=$query8->fetchAll(PDO::FETCH_OBJ);
$totcanorder=$query8->rowCount();
?>
								<div class="comments-icon">
									<h4>Total Cancelled Orders</h4>
								</div>
								<div class="comments-info black-info">
									<h3><?php echo htmlentities($totcanorder);?></h3>
									<a href="cancelled-order.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>
						<div class="col-md-4 top-comment-grid">
							<div class="comments secondary-color">
								<?php 
						$sql9 ="SELECT * from   orders";
$query9 = $dbh -> prepare($sql9);
$query9->execute();
$results9=$query9->fetchAll(PDO::FETCH_OBJ);
$totallorder=$query9->rowCount();
?>
								<div class="comments-icon">
									<h4>All Orders</h4>
								</div>
								<div class="comments-info black-info">
									<h3><?php echo htmlentities($totallorder);?></h3>
									<a href="all-order.php">View</a>
								</div>
								<div class="clearfix"> </div>
							</div>
						</div>

					
						<div class="clearfix"> </div>
					</div>
		
		</div>

		<!-- footer -->
		 <?php include_once('includes/footer.php');?>
		<!-- //footer -->
	</section>
	<script src="js/bootstrap.js"></script>
	<script src="js/proton.js"></script>
</body>
</html>
<?php }  ?>