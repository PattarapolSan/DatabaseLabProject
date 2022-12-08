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
                    <a href="logintest.php"><i class="fa-regular fa-user" id="nav-user"></i></a>
                </div>
            </div>
        </div>
        <div class="nav-tab" id ="bottom">
            <ul>
                <li><a href="index.html ">HOME</a></li>
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
          <li><a href="#">ABOUT</a></li>
          <li><a href="#">BLOG</a></li>
          <li><a href="#">CONTACT</a></li>
        </ul>
      </div>
    <section class="content">
        <div id="log-text-hold" style="height: 10vh;">
            <p style="margin: 20px auto 0;">Forgot Password</p>
        </div>
        <div class="log-content">
            <div class="reg-sub">
                <div class="reg-sub-inner">
                    <form id="login" class="log-input-group" action="update.php" method="post">
                        <div class="con-contain">
                            <label for="" class="reg-la">Email</label>
                            <label for="" style="<?php if(isset($_GET['error'])){echo 'color:red;';} else{echo 'color:white;';} ?>">Email not Exist!</label>
                       </div>
                        <input type="text"  class="input-field" placeholder="Email" required name="email">
                        <label for="">New Password</label>
                        <input type="password" id="password" class="input-field" placeholder="Password" required name="password">
                        <label for="">Confirmed New Password</label>
                        <input type="password" id="c_password" class="input-field" placeholder="Confirmed Password" required name="c_password" oninput="check_pass(this)">
                
                        <button type="submit" name="forgot-sub">CONFIRMED</button>
                    </form>
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
                pop_links.style.left = "-220px";
                navText.innerHTML = "MENU";
                navIcon.className = "fa-solid fa-bars";
                num = 0;
            }
            
        }

        function check_pass(input) {
            if(input.value != document.getElementById('password').value) {
                input.setCustomValidity('Password Must be Matching');
            }

            else {
                input.setCustomValidity('');
            }
        }
    </script>
    
</body>
</html>