<header class="navBar">
        <div class="logo">
            <a href="index.php"><img class="logoImg" src="images/logo.png" /></a>
        </div>
        <nav>
            <ul class="navMenu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About</a></li>
                <li><a href="menus.php">Menus</a></li>
                <li><a href="gallery.html">Gallery</a></li>
                <li><a href="contact.php">Contact</a></li>
            
                <?php if (strlen($_SESSION['ocmsuid']==0)) {?>
                <li class="singInBtn"><a href="startupPage.html">Sign Up</a></li>
            <?php } ?>
            <?php if (strlen($_SESSION['ocmsuid']!=0)) {?>
                <li class="singInBtn"><a href="startupPage.html"> My Account</a></li>
            <?php } ?>
                </div>
                <li >
                  <a href="cart.php"><img src="images/cart1.png" class="navCart"><span id="cart-item" ></span></a>
                </li>
            </ul>
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </nav>
    </header>
    <script>
        const hamburger = document.querySelector(".hamburger");
        const navMenu = document.querySelector(".navMenu");

        hamburger.addEventListener("click", mobliemmenu);

        function mobliemmenu() {
            hamburger.classList.toggle("active");
            navMenu.classList.toggle("active");
        }

        window.addEventListener("load", function () {
            var header = document.querySelector("header");
            header.classList.add("sticky");
        });

    </script>