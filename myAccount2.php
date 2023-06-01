
<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['update'])) 
  {
    $AName=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $sql="update users set FULLNAME=:name,MOBILE_NUMBER=:mobilenumber where ID=:uid";
       $query = $dbh->prepare($sql);
       $query->bindParam(':name',$AName,PDO::PARAM_STR);
       $query->bindParam(':mobilenumber',$mobno,PDO::PARAM_STR);
       $query->bindParam(':uid',$uid,PDO::PARAM_STR);
  $query->execute();
  
          echo '<script>alert("Profile has been updated")</script>';
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="padiStyle2.css">
    <link rel="stylesheet" href="padiStyle.css">
    <link rel="stylesheet" href="gallery.css">
    <link rel="stylesheet" href="swiper-bundle.min.css">
    <link rel="stylesheet" href="SliderStyle.css">

</head>
<body>
<?php include_once('includes/header.php');?>

    <div class="login-Form">
        <form class="form-container" name="profile" action="" method="post">
        <?php
$uid=$_SESSION['padiskitchenuid'];
$sql="SELECT * from  users where ID=:uid";
$query = $dbh -> prepare($sql);
$query->bindParam(':uid',$uid,PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

foreach($results as $row)
{               ?> 
        <div class="login-Heading">
           <h4>MY PROFILE</h4>
        </div>
        <div class="login-img">
           <img class="logo-img" src="images/account.png">
        </div>
        <div class="details">
        <div class="input-section">
               <p>Full name:<span>*</span></p>
               <input type="text" value="<?php  echo $row->FULLNAME;?>" name="fname" required="true">
            </div>
            <div class="input-section">
                <p>Email Address:<span>*</span></p>
                 <input type="text" value="<?php  echo $row->EMAIL;?>" name="email" required="true" >
            </div>
            <div class="input-section">
                <p>Mobile Number:<span>*</span></p>
                <input type="text" maxlength="10" pattern="[0-9]+" value="<?php  echo $row->MOBILE_NUMBER;?>" name="mobno" required="true">
            </div>
            <div class="input-section">
                <p>Reg. Date:<span>*</span></p>
                <input type="text" readonly="true" value="<?php  echo $row->REG_DATE;?>" name="">
            </div>
            <?php } ?>
            <div class="btn-section">
                <button type="submit" class="btn" name="update">Update</button>
            </div>
        </div>
        </form>
    </div>
   
</body>
</html>

