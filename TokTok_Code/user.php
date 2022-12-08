<?php 
    require("./php/config.php");
    if(isset($_SESSION["item_count"])){

    }else{
        $_SESSION["item_count"] = 0;
    }
    $get_remember = mysqli_query($conn, "SELECT * FROM site_user WHERE remember = 1 ");
    if(!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
        $row = mysqli_fetch_assoc($result);
    }

    

    else if(mysqli_num_rows($get_remember ) > 0){
        
        $use_val = mysqli_fetch_assoc($get_remember);
        $id = $use_val['User_ID'];
        if($id > 0){
            $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
            $row = mysqli_fetch_assoc($result);
        }
            
    }
    
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
                <a href=""><img src="img/Logo.PNG" alt=""></a>
            </div>
            <div class="nav-div" id="nav-right">
                <div id="menu-holder-right">
                    <a href="cart2.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <p style="display: inline; font-size: 20px; margin-left: 0.1px ;" id="cart_num"><?php if(isset($id)){echo $_SESSION["item_count"];}?></p>
                    <a <?php if(!isset($id)){echo 'href="logintest.php"';} else{echo 'href="user.php"';}?>><i class="fa-regular fa-user" id="nav-user"></i></a>
                    <p style="display: inline; font-size: 10px; margin-left: 5px ;"><?php if(isset($id)){echo $row["User_Name"];}; ?></p>
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
    <section  id="user-content">
        <div class="side-menu">
            <ul>
                <li><a href="#" id="user-big">USER</a></li>
                <li><a href="address.php">ADDRESS</a></li>
                <li><a href="order.php">ORDER</a></li>
            </ul>
        </div>
        <div class="side-content" id="user-content-inner">
            <label for="">Username</label>
            <p><?php echo $row['User_Name']?></p>
            <label for="">Name</label>
            <p><?php echo $row['First_Name'] .  " ". $row['Last_Name']?></p>
            <label for="">Email</label>
            <div class="user-contain-inner">
                <p> <?php echo $row['Email']?></p>
                <i class="fa-regular fa-pen-to-square" onclick="showChangeEmail()"></i>
            </div>
            
            <label for="">Password</label>
            <div class="user-contain-inner">
                <p><?php $pass=str_repeat('*', strlen($row['Password'])) ;  echo $pass;?></p>
                <i class="fa-regular fa-pen-to-square" onclick="showChangePass()"></i>
            </div>
            
            <a href="logout.php"><button id="logout-btn">LOGOUT</button></a>


        </div>

       




    </section>
    <div id="user-change-pass">
            <div class="user-change-pass-con">
                <div style="height: 10%; width:100%;">
                    <i class="fa-solid fa-xmark" onclick="hideChangePass()"></i>
                </div>
                <div  style="height: 90%; width:100%;">
                <p style="text-align: center; padding-bottom: 5px; font-size: 20px; font-weight: 400;">Change Password</p>
                    <form action="update.php" id="change_pass" class="change-input-group" method="post">
                        <div class="con-contain" style="display: flex;">
                            <label for="" id="user-label" >Current Password</label>
                            <label for="" style="<?php if(isset($_GET['error'])){if($_GET['error']==1){echo 'color: red;';}else{echo 'color: white;';}} else{echo 'color: white;';} ?>  margin-right: 25px;">Wrong Password</label>
                       </div>
                        <input type="password"  class="user-input" placeholder="Current Password" required name="c_password">
                        <label id="user-label" for="">New Password</label>
                        <input type="password" id="password" class="user-input" placeholder="New Password" required name="n_password">
                        <label id="user-label" for="">Confirm New Password</label>
                        <input type="password"  class="user-input" placeholder="Confirm New Password" required name="cn_password" oninput="check_pass(this)">
                        <button id="user-button" type="submit" name="change_pass_sub">Confirm</button>
                        <input type="text" value="<?php echo $row['User_Name'] ?>" name="username" style="visibility: hidden;">
                    </form>
            
            
                </div>
            </div>
    </div>
    

     <div id="user-change-email">
            <div class="user-change-pass-con">
                <div style="height: 10%; width:100%;">
                    <i class="fa-solid fa-xmark" onclick="hideChangeEmail()"></i>
                </div>
                <div  style="height: 90%; width:100%;">
                <p style="text-align: center; padding-bottom: 5px; font-size: 20px; font-weight: 400;">Change Email</p>
                    <form action="update.php" id="change_pass" class="change-input-group" method="post">
                        <div class="con-contain" style="display: flex;">
                            <label for="" id="user-label" >New Email</label>
                            <label for="" style="<?php if(isset($_GET['error'])){if($_GET['error']==2 or $_GET['error']==4){echo 'color: red;';}else{echo 'color: white;';}} else{echo 'color: white;';} ?> margin-right: 25px;">Email Already Registered!</label>
                       </div>
                        <input type="text"  class="user-input" placeholder="New Email" required name="email">
                        <div class="con-contain" style="display: flex;">
                            <label for="" id="user-label" >Password</label>
                            <label for="" style="<?php if(isset($_GET['error'])){if($_GET['error']==3 or $_GET['error']==4){echo 'color: red;';}else{echo 'color: white;';}} else{echo 'color: white;';} ?> margin-right: 25px;">Wrong Password!</label>
                       </div>
                        <input type="password" id="password" class="user-input" placeholder="Password" required name="password">
                        <button id="user-button" type="submit" name="change_email_sub">Confirm</button>
                        <input type="text" value="<?php echo $row['User_Name'] ?>" name="username" style="visibility: hidden;">
                    </form>
            
            
                </div>
            </div>
    </div>
    
  

    <script>
        var pop_links = document.getElementById("pop-links");
        var navText = document.getElementById("nav_text");
        var navIcon = document.getElementById("nav_icon");
        var num = 0;
        var passbox = document.getElementById("user-change-pass");
        var mailbox = document.getElementById("user-change-email");
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

        function showChangePass() {
            passbox.style.left = "0px";
        }

        function hideChangePass() {
            passbox.style.left = "-3000px";
        }

        function showChangeEmail() {
            mailbox.style.left = "0px";
        }

        function hideChangeEmail() {
            mailbox.style.left = "-3000px";
        }


        function check_pass(input) {
            if(input.value != document.getElementById('password').value) {
                input.setCustomValidity('Password Must be Matching');
            }

            else {
                input.setCustomValidity('');
            }
        }
        <?php if(isset($_GET['error'])){if($_GET['error'] == 1){echo 'onLoad=showChangePass()'; }}?>
        <?php if(isset($_GET['error'])){if($_GET['error'] == 2 or $_GET['error'] == 3 or $_GET['error']==4){echo 'onLoad=showChangeEmail()'; }}?>
    
        
    </script>
    
</body>
</html>