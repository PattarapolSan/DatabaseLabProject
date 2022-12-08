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

 

    if(isset($_POST['editid'])){
        
        $aid = $_POST['editid'];
        echo 'onLoad=showEditAddress()'; 
        $q1 = mysqli_query($conn, "SELECT * FROM `address` where Address_ID = $aid; ");
        $edit_in = mysqli_fetch_assoc($q1);
        
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
                <a href="index.php"><img src="img/Logo.PNG" alt=""></a>
            </div>
            <div class="nav-div" id="nav-right">
                <div id="menu-holder-right">
                    <a href="cart2.php"><i class="fa-solid fa-cart-shopping"></i></a>
                    <p style="display: inline; font-size: 20px; margin-left: 0.1px ;" id="cart_num"><?php echo $_SESSION["item_count"];?></p>
                    <a href="user.php"><i class="fa-regular fa-user" id="nav-user"></i></a>
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
                <li><a href="user.php" >USER</a></li>
                <li><a href="#"  id="user-big">ADDRESS</a></li>
                <li><a href="order.php">ORDER</a></li>
            </ul>
        </div>
        <div class="side-content">
        <div id="address-con">

                        <div class="address-div" onclick="showAddAddress()">
                            <div id="add-add-icon" >
                                <i class="fa-solid fa-plus"></i>
                            </div>
                            
                        </div>
        <?php
				 	$result = mysqli_query($conn, "SELECT * FROM `address` where AUser_ID = $id; ");
                     
					if(!$result){
						echo "Select failed. Error: ".$mysqli->error ;
						return false;
					}
                    while($row=$result->fetch_array()){ ?>
                    
                    <form action="address.php" method="post">

                        <a href="#" onClick="event.preventDefault(); this.parentNode.submit();" name="add_edit_show">
                                <div class="address-div">
                                        
                                        <p class="address-name"><?=$row['Address_name']?></p>
                                        <p class="address-in ">Phone: <?=$row['Address_PhoneNum']?></p> 
                                        <p class="address-in ">Address: <?=$row['Address']?></p> 
                                        <p class="address-in ">Sub-District: <?=$row['Subdistrict']?></p> 
                                        <p class="address-in ">Sub-District: <?=$row['District']?></p> 
                                        <p class="address-in ">Province: <?=$row['Province']?></p>
                                        <p class="address-in ">Postcode: <?=$row['PostCode']?></p> 
                                        <input type="text" value="<?php echo $row['Address_ID'] ?>" name="editid" style="visibility: hidden;">
                                    </div>
                                
                                                    
                            </a>
                    </form>
                        
                              
                       <?php } ?>
        </div>
        </div>








    </section>


    <div id="user-add-address">
            <div class="user-change-pass-con" style="height: 650px; width: 500px;margin-top: 100px; ">
                <div style="height: 8%; width:100%;">
                    <i class="fa-solid fa-xmark" onclick="hideAddAddress()"></i>
                </div>
                <div  style="height: 90%; width:100%;">
                <p style="text-align: center; padding-bottom: 5px; font-size: 20px; font-weight: 400;">Add Address</p>
                    <form action="update.php" id="change_pass" class="change-input-group" method="post">
                        <div class="con-contain-add">
                            <div class="con-group-add" style="width: 60%;">
                                <label id="user-label" for="" style="margin-left: 0;">Name</label>
                                <input type="text"  class="user-input" placeholder="Name" required name="name">
                            </div>
                            <div class="con-group-add" style="width: 30%;margin-right:10px;">
                                <label id="user-label" for="" style="margin-left: 0;">Phone Number</label>
                                <input type="text" id="password" class="user-input" placeholder="Phone Number" required name="phone">
                            </div>
                        </div>
                        
                      
                        <label id="user-label" for="">Address</label>
                        <input type="text"  class="user-input" placeholder="Address" required name="address">
                        <label id="user-label" for="">Sub-District</label>
                        <input type="text"  class="user-input" placeholder="Sub-District" required name="subdistrict">
                        <label id="user-label" for="">District</label>
                        <input type="text"  class="user-input" placeholder="District" required name="district">
                        <label id="user-label" for="">Province</label>
                        <input type="text"  class="user-input" placeholder="Province" required name="province">
                        <label id="user-label" for="">Postcode</label>
                        <input type="text"  class="user-input" placeholder="Postcode" required name="postcode">
                        <button id="user-button" type="submit" name="add_address_sub">Confirm</button>
                        <input type="text" value="<?php echo $id ?>" name="username" style="visibility: hidden;">
                    </form>
            
            
                </div>
            </div>
    </div>



    <div id="user-edit-address">
            <div class="user-change-pass-con" style="height: 700px; width: 500px;margin-top: 100px; ">
                <div style="height: 8%; width:100%;">
                    <i class="fa-solid fa-xmark" onclick="hideEditAddress()"></i>
                </div>
                <div  style="height: 90%; width:100%;">
                <p style="text-align: center; padding-bottom: 5px; font-size: 20px; font-weight: 400;">Edit Address</p>
                    <form action="update.php" id="change_pass" class="change-input-group" method="post">
                        <div class="con-contain-add">
                            <div class="con-group-add" style="width: 60%;">
                                <label id="user-label" for="" style="margin-left: 0;">Name</label>
                                <input type="text"  class="user-input" placeholder="Name" required name="name" value="<?php echo $edit_in['Address_name'];?>">
                            </div>
                            <div class="con-group-add" style="width: 30%;margin-right:10px;">
                                <label id="user-label" for="" style="margin-left: 0;">Phone Number</label>
                                <input type="text" id="password" class="user-input" placeholder="Phone Number" required name="phone" value="<?php echo $edit_in['Address_PhoneNum'];?>">
                            </div>
                        </div>
                    
                        <label id="user-label" for="">Address</label>
                        <input type="text"  class="user-input" placeholder="Address" required name="address" value="<?php echo $edit_in['Address'];?>">
                        <label id="user-label" for="">Sub-District</label>
                        <input type="text"  class="user-input" placeholder="Sub-District" required name="subdistrict" value="<?php echo $edit_in['Subdistrict'];?>">
                        <label id="user-label" for="">District</label>
                        <input type="text"  class="user-input" placeholder="District" required name="district" value="<?php echo $edit_in['District'];?>">
                        <label id="user-label" for="">Province</label>
                        <input type="text"  class="user-input" placeholder="Province" required name="province" value="<?php echo $edit_in['Province'];?>">
                        <label id="user-label" for="">Postcode</label>
                        <input type="text"  class="user-input" placeholder="Postcode" required name="postcode" value="<?php echo $edit_in['PostCode'];?>">
                        <button id="user-button" type="submit" name="edit_address_sub">Confirm</button>
                        <button id="user-button" type="submit" name="delete_address_sub">Delete</button>
                        <input type="text" value="<?php echo $edit_in['Address_ID'] ?>" name="aid" style="visibility: hidden;">
                    </form>
            
            
                </div>
            </div>
    </div>

    <script>
        var pop_links = document.getElementById("pop-links");
        var navText = document.getElementById("nav_text");
        var navIcon = document.getElementById("nav_icon");
        var num = 0;
        var address = document.getElementById("user-add-address");
        var e_address = document.getElementById("user-edit-address");



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

        function showAddAddress() {
            address.style.left = "0px";
        }

        function hideAddAddress() {
            address.style.left = "-3000px";
        }

        function showEditAddress() {
            e_address.style.left = "0px";
        }

        function hideEditAddress() {
            e_address.style.left = "-3000px";
        }

        <?php 
             if(isset($_POST['editid'])){
    
                echo 'onLoad=showEditAddress()'; 
    
             }
        ?>
       
    
        
    </script>
    
</body>
</html>