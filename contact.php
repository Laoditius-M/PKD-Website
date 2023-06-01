<?php
include('includes/dbconnection.php');
session_start();
error_reporting(0);


 if(isset($_POST['submit']))
  {


 $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $message=$_POST['message'];

$sql="insert into queries(NAME,MOBILE_NUMBER,EMAIL,MESSAGE)values(:name,:phone,:email,:message)";
$query=$dbh->prepare($sql);
$query->bindParam(':name',$name,PDO::PARAM_STR);
$query->bindParam(':phone',$phone,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':message',$message,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
   echo "<script>alert('Your message was sent successfully!.');</script>";
echo "<script>window.location.href ='contact.php'</script>";
  }
  else
    {
         echo '<script>alert("Something Went Wrong. Please try again")</script>';
    }

  
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="padiStyle2.css">
        <link rel="stylesheet" href="padiStyle.css">
    <link rel="stylesheet" href="contactUsStyle.css" />

</head>

<body>
<?php include_once('includes/header.php');?>


    <section class="contactUs">
        <div id="pageHeading">
            <h1>CONTACT US</h1>
        </div>
        <div class="container">
        <?php
$sql="SELECT * from pages where PAGE_TYPE='contactus'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>
            <div class="content">
                <div class="headingC">
                    <h1>Talk to us</h1>
                </div>
                <div class="contentBx">                  
                    <div class="contactFormContainer">                      
                        <form action="#" method="post">
                            <div class="inputContainer">
                                <label for="">Name</label>
                                <input type="text" value="" name="name" class="input" required="true" />
                            </div>
                            <div class="inputContainer">
                                <label for="">Mobile Number</label>
                                <input type="text" value="" name="phone" class="input" required="true" maxlength="10" pattern="[0-9]+" />
                            </div>
                            <div class="inputContainer">
                                <label for="">Email</label>
                                <input type="email" value="" name="email" class="input" required="true" />
                            </div>
                            <div class="inputContainer">
                                <label for="">Message</label>
                                <textarea name="message" class="textarea input" required="true"></textarea>
                            </div>
                            <button type="submit" class="site-btn" name="submit">SEND MESSAGE</button>   
                        </form>
                    </div>
                    <div class="map">
                        <iframe
                            src="https://maps.google.com/maps?q=Florence%20Palms%20Resort,%20Mamaneng%20Marble%20hall,%200450&t=&z=15&ie=UTF8&iwloc=&output=embed"
                            width="600" height="450" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="contactDetailsS">
                    <div class="cdHeadings">
                        <p>Contact Number</p>
                        <p>Email</p>
                        <p>Address</p>
                    </div>
                    <div>
                        <p>+27<?php  echo htmlentities($row->MOBILE_NUMBER);?></p>                     
                        <p><?php  echo htmlentities($row->EMAIL);?></p>                      
                        <p><?php  echo htmlentities($row->PAGE_DESCRIPTION);?></p>
                    </div>                     
                </div>
            </div>
            <?php } ?>
        </div>
    </section>
   
  <?php include_once('includes/footer.php');?>
</body>
</html>  <?php } ?>