<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM tbluser WHERE Email=:email and Password=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['ocmsuid']=$result->ID;
}
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location ='images/dashboard.php'; </script>";
} else{
echo "<script>alert('Invalid Details');</script>";
}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="padiStyle.css">
</head>
<body>

    <div class="login-Form">
        <form class="form-container" name="signup" action="" method="post">
        <div class="login-Heading">
           <h2>Admin</h2>
           <h4>Login</h4>
        </div>
        <div class="login-img">
           <img class="logo-img" src="images/account.png">
        </div>
        <div class="details">
            <div class="input-section">
                <input type="email" name="email" placeholder="Enter Email" required="true" maxlength="32">
            </div>
            <div class="input-section">
                <input type="text" placeholder="Password"  name="password" required="true" maxlength="32">
            </div>
            <div class="btn-section">
                <button type="submit" class="btn" name="login">Login</button>
            </div>
        </div>
        <p>Note registered? <a href="signup.php">Create an Account</a></p>
        </form>
    </div>
</body>
</html>