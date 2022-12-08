<?php 
    require_once("./php/config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokTok Watch</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="img/Logo copy.PNG">
    <script src="https://kit.fontawesome.com/8633768cc1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
</head>
<body>
    <section class="nav-main">
        <div class="nav-tab" id="top">
            <div class="nav-div" id="nav-left">
                <div id="menu-holder-left" onclick="showMenu()">
                    <i class="fa-solid fa-bars" id="nav_icon" ></i>
                    <p id="nav_text">MENU</p>
                </div>
            </div>
            <div class="nav-div" id="middle-box">
                <a href="index.php"><img src="img/Logo.PNG" alt=""></a>
            </div>
            <div class="nav-div" id="nav-right">
                <div id="menu-holder-right">
                    <a href="#"><i class="fa-solid fa-cart-shopping"></i></a>
                    <a href=""><i class="fa-regular fa-user" id="nav-user"></i></a>
                </div>
            </div>
        </div>
        <div class="nav-tab" id ="bottom">
            <ul>
                <li><a href="index.php ">HOME</a></li>
                <li><a href="product.php">PRODUCT</a></li>
                <li><a href="#">ABOUT</a></li>
                <li><a href="#">BLOG</a></li>
                <li><a href="#">CONTACT</a></li>
              </ul>
        </div>

        
    </section>
    <div class="pop-links" id="pop-links">
        <ul>
          <li><a href="index.php">HOME</a></li>
          <li><a href="product.php">PRODUCT</a></li>
          <li ><a class="sub-product" href="product.php?bid=1">Seiko</a></li>
          <li><a class="sub-product" href="product.php?bid=2">Omega</a></li>
          <li><a class="sub-product" href="product.php?bid=3">Swatch</a></li>
          <li><a class="sub-product" href="product.php?bid=4">Grand Seiko</a></li>
          <li><a class="sub-product" href="product.php?bid=5">Rolex</a></li>
          <li><a class="sub-product" href="product.php?bid=6">Cartier</a></li>
          <li><a class="sub-product" href="product.php?bid=7">Audemars Piguet</a></li>
          <li><a class="sub-product" href="product.php?bid=8">Patek Philippe</a></li>
          <li><a class="sub-product" href="product.php?bid=9">Vacheron Constantin</a></li>
          <li><a class="sub-product" href="product.php?bid=10">TUDOR</a></li>
          <li><a class="sub-product" href="product.php?bid=11">Jaegar Lecoultre</a></li>
          <li><a href="#">BLOG</a></li>
          <li><a href="#">CONTACT</a></li>
        </ul>
      </div>
    <section class="content">
        <div id="log-text-hold">
            <p>M Y - T O K T O K</p>
        </div>
        <div class="log-content">
            <div class="log-sub">
                <div class="log-sub-inner">
                    <p>I HAVE AN ACCOUNT</p>
                    <form action="login_check.php" id="login" class="log-input-group" method="post">
                        <label for="">User ID or Email</label>
                        <input type="text" class="input-field" placeholder="User Id or Email" required name="user_id">
                        <label for="">Password</label>
                        <input type="password" id="pwf" class="input-field" placeholder="Enter Password " required name="password">
                        <label for="" id="log-error" style="<?php if(isset($_GET['error'])){echo 'color: red;';} else{echo 'color: white;';} ?>" value=""><?php if(isset($_GET['error'])){if($_GET['error'] == 1){echo 'Wrong Password!';} else {echo 'No User_ID or Email found!';}} else {echo 'No User_ID or Email found!';} ?></label>
                        <a href="forgot.php">Forgot Your Password?</a>
                        <div class="log-check"> <input type="checkbox" id="pw-check" class="check-box" onclick="passwordtype()"><span>Show Password</span></div>
                        <div class="log-check"><input type="checkbox" class="check-box" name="remember"><span>Remember Me</span> </div>
                        <button type="submit" name="login_sub">Log in</button>
                    </form>
                </div>
            </div>
            <div style="width: 1px; background-color: black; height: 80%"></div>
            <div class="log-sub">
                <div class="log-sub-inner">
                    <p>I DON'T HAVE AN ACCOUNT</p>
                    <p style="font-size: 20px; padding-top: 30px;">Create an account to purcase products on our website and benefits from our exclusive contents.</p>
                    <a href="register.php"><button type="submit" id="log-sin-btn">SIGN UP</button></a>
                </div>
                
            </div>
        </div>
        
        
        

    </section>

    <script>
        var pop_links = document.getElementById("pop-links");
        var navText = document.getElementById("nav_text");
        var navIcon = document.getElementById("nav_icon");
        var num = 0;
        var pw = document.getElementById("pwf");
        var cb = document.getElementById("pw-check");
        var err =document.getElementById("log-error");

        function showMenu() {
            if (num == 0){
                pop_links.style.left = "0";
                navText.innerHTML = "CLOSE";
                navIcon.className = "fa-solid fa-xmark";
                num = 1;
            }
            else {
                pop_links.style.left = "-1000px";
                navText.innerHTML = "MENU";
                navIcon.className = "fa-solid fa-bars";
                num = 0;
            }
            
        }

        function passwordtype() {
                if (cb.checked == true) {
                    pw.type = "text";
                }
                else {
                    pw.type = "password";
                }
            }

        function showErr() {
            err.style.visibility = "visible";
        }

        function hideErr() {
            err.style.visibility = "hidden";
        }
            

    </script>
    
</body>
</html>