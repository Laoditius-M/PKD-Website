<?php 
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['submit']))
  {
    $fname=$_POST['fname'];
    $mobno=$_POST['mobno'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    $password=md5($_POST['password']);
    $ret="select EMAIL from users where EMAIL=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into users(FULLNAME,MOBILE_NUMBER,EMAIL,PASSWORD,CLIENT_TYPE)Values(:fname,:mobno,:email,:password,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fname',$fname,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':mobno',$mobno,PDO::PARAM_INT);
$query->bindParam(':password',$password,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have signup  Scuccessfully');</script>";
echo "<script>window.location.href ='Userlogin.php'</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
echo "<script>window.location.href ='signup.php'</script>";
}
}
 else
{

echo "<script>alert('Email-id already exist. Please try again');</script>";
echo "<script>window.location.href ='signup.php'</script>";
}
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Signup</title>
    <link rel="stylesheet" href="padiStyle.css">
    <script type="text/javascript">
function checkpass()
{
if(document.signup.password.value!=document.signup.repeatpassword.value)
{
alert('Password and Repeat Password field does not match');
document.signup.repeatpassword.focus();
return false;
}
return true;
} 

function validateForm() {
  let fname = document.forms["myForm"]["fname"].value;
  let email = document.forms["myForm"]["email"].value;
  let mobno = document.forms["myForm"]["mobno"].value;
  let password = document.forms["myForm"]["password"].value;
  let confirmpass = document.forms["myForm"]["confirmPassword"].value;
  var regName = /^[a-zA-Z]+ [a-zA-Z]+$/;
  var regEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
 
  if (fname == "") {
    alert("Name must be filled out");
    return false;
  }
  if(!regName.test(fname)){
    alert('Invalid name given.');
    return false;
  }
  if (email == "") {
    alert("Email must be filled out");
    return false;
  }
  if(!regEmail.test(email)){
    alert('Invalid email given.');
    return false;
  }
  if (mobno == "") {
    alert("Mobile Number must be filled out");
    return false;
  }
  if (password == "") {
    alert("{Password field empty} must be filled out");
    return false;
  }
  if (x == "") {
    alert("Confirm Password field empty must be filled out");
    return false;
  }
}
</script>

</head>

<body>

    <div class="AdminCreateAcc-Form login-Form">
        <form name="signup" action="" method="post" onsubmit="return checkpass();" onsubmit="return validateForm()">
            <div class="login-Heading">
                <h2>User</h2>
                <h4>Create an Account</h4>
            </div>
            <div class="login-img">
                <img class="logo-img" src="images/account.png">
            </div>
            <div class="details">
                <div class="input-section">
                    <input type="text" placeholder="Username" name="fname" maxlength="32" required="true">
                </div>
                <div class="input-section">
                    <input type="text" placeholder="Email address" name="email" maxlength="32" required="true">
                </div>
                <div class="input-section">
                    <input type="text" placeholder="Mobile Number" name="mobno" required="true" maxlength="10">
                </div>
                <div class="input-section">
                    <input type="text" placeholder="Client Type (Public / Private)" name="status" required="true" maxlength="32">
                </div>

                <div class="input-section">
                    <input type="text" placeholder="Password" name="password" maxlength="32" required="true">
                </div>
                <div class="input-section">
                    <input type="text" placeholder="Confirm Password" name="confirmPassword" maxlength="32" required="true">
                </div>
                <div class="btn-section">
                    <button type="submit" class="btn" name="submit">Signup</button>
                </div>
            </div>
            <p>Already registered? <a href="UserLogin.php">login</a></p>
        </form>
    </div>
</body>

</html>