<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['padiskitchenaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {


$menuname=$_POST['menuname'];
$categorypic=$_FILES["categoryimage"]["name"];
$extension = substr($categorypic,strlen($categorypic)-4,strlen($categorypic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif",".jfif");
// Validation for allowed extensions .in_array() function searches an array for a specific value.
if(in_array($extension,$allowed_extensions))
{
echo "<script>alert('Invalid format. Only jpg / jpeg/ png /gif format allowed');</script>";
}
else{
$categorypic=md5($categorypic).$extension;
move_uploaded_file($_FILES["categoryimage"]["tmp_name"],"itemimages/".$categorypic);
$sql="insert into menus(MENU_NAME,CATEGORY_IMG)values(:menuname,:categorypic)";
$query=$dbh->prepare($sql);
$query->bindParam(':menuname',$menuname,PDO::PARAM_STR);
$query->bindParam(':categorypic',$categorypic,PDO::PARAM_STR);


 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Menu has been added.")</script>';
echo "<script>window.location.href ='add-category.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
}

?>
<!DOCTYPE html>
<head>
<title>Padi's Kitchen Delight | Add Catgeory</title>
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

		
</head>
<body class="dashboard-page">

	<?php include_once('includes/sidebar.php');?>
	<section class="wrapper scrollable">
		<?php include_once('includes/header.php');?>
		<div class="main-grid">
			<div class="agile-grids">	
				<!-- input-forms -->
				<div class="grids">
					<div class="progressbar-heading grids-heading">
						<h2>Add Menu</h2>
					</div>
					<div class="panel panel-widget forms-panel">
						<div class="forms">
							<div class="form-grids widget-shadow" data-example-id="basic-forms"> 
								<div class="form-title">
									<h4>Add Menu :</h4>
								</div>
								<div class="form-body">
									<form method="post">
										
										<div class="form-group"> 
											<label for="exampleInputEmail1">Menu Name</label> 
											 <input type="text" name="menuname" id="menuname" required="true" placeholder="Menu Name" class="form-control">
										</div> 
										<div class="form-group"> 
											<label for="exampleInputEmail1">Category Image</label> 
											 <input type="file" name="categoryimage" id="categoryimage" required="true" class="form-control">
										</div>
									
									
									
										<button type="submit" class="btn btn-default w3ls-button" name="submit">Add</button> 
									</form> 
								</div>
							</div>
						</div>
					</div>
					
			
					
				</div>
				<!-- //input-forms -->
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