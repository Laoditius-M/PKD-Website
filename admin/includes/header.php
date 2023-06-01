<nav class="user-menu">
            <a href="javascript:;" class="main-menu-access">
            <i class="icon-proton-logo"></i>
            <i class="icon-reorder"></i>
            </a>
        </nav>
        <section class="title-bar">
            <div class="logo">
                <h1><a href="dashboard.php"><img src="images/blacklogo.png" width="150px" alt="" /></a></h1>
            </div>
          
            
            <div class="header-right">
                <div class="profile_details_left">
                    <div class="header-right-left">
                        <!--notifications of menu start -->
                        <ul class="nofitications-dropdown">
                                                     <?php
$sql="SELECT * from orders  where STATUS is null";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
$totalorder=$query->rowCount();
 
  ?>      
                            <li class="dropdown head-dpdn">
 
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-bell"></i><span class="badge blue"><?php echo $totalorder;?></span></a>
                                <ul class="dropdown-menu anti-dropdown-menu agile-notification">
                                    <li>
                                        <div class="notification_header">
                                            <h3>You have <?php echo $totalorder;?> new notifications</h3>
                                        </div>
                                    </li>
                                    <?php foreach($results as $row)
{?>
                                    <li><a href="view-order-detail.php?viewid=<?php echo htmlentities ($row->ORDER_NUMBER);?>">
                                        <div class="user_img"><img src="images/images (1).png" alt=""></div>
                                        <p><?php echo $row->ORDER_NUMBER;?>:<?php echo $row->FULLNAME;?></p>
                                       <div class="notification_desc">
                                        <p></p>
                                        <p><span>(<?php echo $row->ORDER_DATE;?>)</span></p>
                                        </div>
                                      <div class="clearfix"></div>  
                                     </a></li><?php  } ?>
                                     <li>
                                        <div class="notification_bottom">
                                            <a href="new-order.php">See all notifications</a>
                                        </div> 
                                    </li>
                                </ul>
                            </li>   
                          
                            <div class="clearfix"> </div>
                        </ul>
                    </div>  
                    <div class="profile_details">       
                        <ul>
                            <li class="dropdown profile_details_drop">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <div class="profile_img">   
                                        <span class="prfil-img"><i class="fa fa-user" aria-hidden="true"></i></span> 
                                        <div class="clearfix"></div>    
                                    </div>  
                                </a>
                                <ul class="dropdown-menu drp-mnu">
                                    <li> <a href="change-password.php"><i class="fa fa-cog"></i> Settings</a> </li> 
                                    <li> <a href="admin-profile.php"><i class="fa fa-user"></i> Profile</a> </li> 
                                    <li> <a href="logout.php"><i class="fa fa-sign-out"></i> Logout</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            </div>
            <div class="clearfix"> </div>
        </section>