<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['login'])) 
  {
    $email=$_POST['email'];
    $password=md5($_POST['password']);
    $sql ="SELECT ID FROM users WHERE EMAIL=:email and PASSWORD=:password";
    $query=$dbh->prepare($sql);
    $query->bindParam(':email',$email,PDO::PARAM_STR);
$query-> bindParam(':password', $password, PDO::PARAM_STR);
    $query-> execute();
    $results=$query->fetchAll(PDO::FETCH_OBJ);
    if($query->rowCount() > 0)
{
foreach ($results as $result) {
$_SESSION['padiskitchenuid']=$result->ID;
}
$_SESSION['login']=$_POST['email'];
echo "<script type='text/javascript'> document.location ='index.php'; </script>";
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
    <title>User Login</title>
    <link rel="stylesheet" href="padiStyle.css">
</head>
<script>


function validateForm() {

  let email = document.forms["myForm"]["email"].value;
  let password = document.forms["myForm"]["password"].value;
  var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 

  if (email == "") {
    alert("Email must be filled out");
    return false;
  }
  if(!regEmail.test(email)){
    alert('Invalid email given.');
    return false;
  }
 
  if (password == "") {
    alert("{Password field empty} must be filled out");
    return false;
  }

}
</script>
<body>

    <div class="login-Form">
        <form class="form-container" name="signup" action="" method="post"  onsubmit="return validateForm()">
        <div class="login-Heading">
           <h2>User</h2>
           <h4>Login</h4>
        </div>
        <div class="login-img">
           <img class="logo-img" src="images/account.png">
        </div>
        <div class="details">
            <div class="input-section">
                <input type="text" name="email" placeholder="Enter Email" required="true" maxlength="32">
            </div>
            <div class="input-section">
                <input type="text" placeholder="Password"  name="password" required="true" maxlength="32">
            </div>
            <div class="btn-section">
                <button type="submit" class="btn" name="login">Login</button>
            </div>
        </div>
        <p>Not registered? <a href="signup.php">Create an Account</a></p>
        </form>
    </div>
</body>
</html>