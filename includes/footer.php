<?php 

error_reporting(0);
include('includes/dbconnection.php');
if(isset($_POST['subscribe']))
  {
   
    $email=$_POST['email'];
    
    $ret="select Email from subscribers where EMAIL=:email";
    $query= $dbh -> prepare($ret);
    $query-> bindParam(':email', $email, PDO::PARAM_STR);
    $query-> execute();
    $results = $query -> fetchAll(PDO::FETCH_OBJ);
if($query -> rowCount() == 0)
{
$sql="Insert Into subscribers(EMAIL)Values(:email)";
$query = $dbh->prepare($sql);
$query->bindParam(':email',$email,PDO::PARAM_STR);

$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{

echo "<script>alert('You have subscribe  successfully');</script>";
}
else
{

echo "<script>alert('Something went wrong.Please try again');</script>";
}
}
 else
{

echo "<script>alert('Email-id already exist. Please try again');</script>";
}
}


?>
    <!-- JavaScript -->
    <script src="sliderJavacript.js"></script>
    <footer>
        <div class="container">
            <div class="content">
                <div class="footerHeading">
                    <h1>PADI'S<br> KITCHEN DELIGHT</h1>
                </div>
                <div class="info">
                    <div class="partOne contactDetails">
                        <p>Best Catering Service</p>
                        <p>Paid's@gmail.com</p>
                        <p>Mpumalanga<br>Middleburg</p>
                        <p>+27 823456745</p>
                    </div>
                    <div class="partTwo openTimes">
                        <p>weekdays 8:00 - 20:00</p>
                        <p>weekdays 8:00 - 20:00</p>
                        <p>weekdays 8:00 - 20:00</p>
                    </div>
                    <div class="partThree quickLinks">
                        <p><a href="home.html">home</a></p>
                        <p><a href="Menus.html">Menus</a></p>
                        <p><a href="gallery.html">Gallery</a></p>
                        <p><a href="contactUs.html">Contact</a></p>
                    </div>
                    <div class="partFour newsLetter">
                        <p id="newsletterHeading">newsletter</p>
                        <p>Sign up for our newsletter</p>
                        <form name="subscribe" method="post">
                            <input class="newsLetterInput" type="email" name="email" placeholder="Enter your Email..." required="">
                            <button type="submit" class="subscribeBtn" name="subscribe">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="footerBottom">
                <p>copyright &copy;Kasi Software Developers</p>
            </div>
        </div>
    </footer>