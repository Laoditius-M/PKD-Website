

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
    <!-- CSS only -->
    <link rel="stylesheet" href="padiStyle2.css">
    <link rel="stylesheet" href="padiStyle.css">
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="swiper-bundle.min.css">
    <link rel="stylesheet" href="SliderStyle.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" 
rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi"
 crossorigin="anonymous">
    <script src="homeScript.js"></script>
    <script language="javascript" type="text/javascript">
var popUpWin=0;
function popUpWindow(URLStr, left, top, width, height)
{
 if(popUpWin)
{
if(!popUpWin.closed) popUpWin.close();
}
popUpWin = open(URLStr,'popUpWin', 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=yes,resizable=no,copyhistory=yes,width='+600+',height='+600+',left='+left+', top='+top+',screenX='+left+',screenY='+top+'');
}

</script>
</head>
<body>
<?php include_once('includes/header.php');?>

    <section class="container homeIntro" id="aboutUs">
    <h4>My Orders</h4>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Order ID</th>
      <th scope="col">Order Date and Time</th>
      <th scope="col">Order Status</th>
      <th scope="col">Track Order</th>
      <th scope="col">View Details</th>
    </tr>
    <?php 
$userid= $_SESSION['padiskitchenuid'];

$sql="SELECT * from  orders 
where USER_ID=:userid";
$query = $dbh -> prepare($sql);
$query-> bindParam(':userid', $userid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>  
  </thead>
  <tbody>
  <tr>
    <td><?php echo $cnt;?></td>
<td><?php echo $row->ORDER_NUMBER;?></td>
<td><p><b>Order Date :</b> <?php echo $row->ORDER_DATE?></p></td>  
<td><?php $status=$row->STATUS;
if($status==''){
 echo "Waiting for confirmation";   
} else{
echo $status;
}

                                                    ?>  </td>   
<td><li class="list-inline-item"><i class="fa fa-motorcycle"></i> 

 <a href="javascript:void(0);" onClick="popUpWindow('trackorder.php?odid=<?php echo htmlentities($row->ORDER_NUMBER);?>');" title="Track order">Track Order</a></li></td>
<td><a href="order-detail.php?orderid=<?php echo $row->ORDER_NUMBER;?>" class="btn theme-btn-dash">View Details</a></td>       
</tr>
<?php $cnt=$cnt+1; }} else { ?>
<tr>
    <th colspan="6" style="text-align:center; color:red;">No Order placed yet</td>
</tr>
<?php } ?>
  </tbody>
</table>
    </section>
</body>

</html>