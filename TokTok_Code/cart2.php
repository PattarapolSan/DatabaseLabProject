<?php

    require_once("./php/config.php");



    $get_remember = mysqli_query($conn, "SELECT * FROM site_user WHERE remember = 1 ");
    if(!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
        $row = mysqli_fetch_assoc($result);
    }

    

    else if(mysqli_num_rows($get_remember)>0){
        
        $use_val = mysqli_fetch_assoc($get_remember);
        $id = $use_val['User_ID'];
        
        if($id > 0){
            $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
            $row = mysqli_fetch_assoc($result);
        }
            
    }



    if(isset($_GET["action"]))
    {
        $n = 0;
        if($_GET["action"] == "delete")
        {
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                if($values["item_id"] == $_GET["id"])
                {
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Item Removed")</script>';
                    echo '<script>window.location="cart2.php"</script>';
                }
            }    
        } 
        foreach($_SESSION["shopping_cart"] as $keys => $values) {
        
            $n = $n + (1 * $values["item_quantity"]);
        }

        $_SESSION["item_count"] = $n;
    }

    if(isset($_POST["Update_to_cart"])){
        $i = 0;
        $n = 0;
        $id = $_POST['id'];
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $id){
                //echo "<script>alert('quan:$uio')</script>";
                $item_array2 = array(
                    'item_id' => $id,
                    'item_name' => $_POST["name"],
                    'item_price' => $_POST["price"],
                   // 'item_color' => $_POST["hidden_color"],
                    'item_quantity' => $_POST['quantity'],
                    'item_img' => $_POST["img"]
                );
                $_SESSION["shopping_cart"][$i] = $item_array2;   
                break;   
            }else{
                $i += 1;
            }
        }

        foreach($_SESSION["shopping_cart"] as $keys => $values) {
        
            $n = $n + (1 * $values["item_quantity"]);
        }

        $_SESSION["item_count"] = $n;
        
        //echo '<script>alert("Added to Shopping Cart")</script>';
        //header("Location: ");
    }



?>

<!DOCTYPE html>
<html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TokTok Watch</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="stylesheet" href="CSS/cart2.css">
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
                    <p style="display: inline; font-size: 20px; margin-left: 0.1px ;" id="cart_num"><?php echo $_SESSION["item_count"];?></p>
                    <a <?php if(!isset($id)){echo 'href="logintest.php"';} else{echo 'href="user.php"';}?>><i class="fa-regular fa-user" id="nav-user"></i></a>
                    <p style="display: inline; font-size: 10px; margin-left: 5px ;"><?php if(isset($id)){echo $row["User_Name"];}; ?></p>
                </div>
            </div>
        </div>
        <div class="nav-tab" id ="bottom">
            <ul>
                <li><a href="index.php">HOME</a></li>
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

    <section id="cart-container">
        <div class="p-main">   
              
    <?php 
        $total = 0;
        $quantity = 0;
        if(!empty($_SESSION["shopping_cart"]))
        {
            
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
        ?>             
            <div class="product-con">
                        <form id="updateform" action="cart2.php" method="post" style="dislay:inline;">
                        <input type="text" value="<?php echo $values["item_id"];?>"  name="id" hidden>
                        <input type="text" value="<?php echo $values["item_name"];?>"  name="name" hidden>
                        <input type="text" value="<?php echo $values["item_price"];?>"  name="price" hidden>
                        <input type="text" value="<?php echo $values["item_img"];?>"  name="img" hidden>
                            
                        <div>
                        <a href="cart2.php?action=delete&id=<?php echo $values['item_id']; ?>"> <i class="fa-solid fa-xmark" style="color: red; margin-right: 20px; font-size: 30px; "></i></a>
                        </div>
                        <div class="product-pic">
                            <img src="<?php echo $values["item_img"];?>" alt="">
                        </div>
                         <div class="product-info">
                            <h1 class="product-name"><?php echo $values["item_name"];?></h1>
                            <p class="product-name">Price:</p>
                            <p class="product-price"><?php echo number_format($values["item_price"],2);?></p>
                         </div>
                            <div style="display: flex; height: 40%; align-items: center; width: 10%;">
                                <p style="margin-right: 4px;">QTY:</p>
                                <input type="number" value="<?php echo $values["item_quantity"];?>" name="quantity" style="width: 50px; text-align: center;"  onchange="shownum<?php echo $values['item_id'] ?>()"> 
                            </div>
                            <div class="total-price">
                            <p class="product-name">Total Price:</p>
                            <p class="product-price"><?php echo number_format($values["item_quantity"] * $values["item_price"],2);?></p>
                         </div>
                           <button name="Update_to_cart" class="up-btn"style="visibility:hidden; margin-left:20px; background-color: red; color: white; padding: 5px; border:0; cursor: pointer;" id="num<?php echo $values['item_id'] ?>">Update</button>
                         </div>
                         <div style="height:5px; width: 100%;" ></div>

                         </form>
    <?php
           
             $total = $total + ($values["item_quantity"] *$values["item_price"]);
             $quantity = $quantity + $values["item_quantity"];
            }
        }
    
    ?>

            <div class="cart-total">
                <div class="total-inner">
                
                <div style="display: flex; justify-content: space-between;">
                    <p class="p-in">Total Price</p>
                    <p class="p-in-num"><?php echo number_format($total, 2);?> &nbsp; ฿</p>
                </div>
               <div style="display: flex; justify-content: space-between;">
                    <p class="p-in">Number of Items</p>
                    <p class="p-in-num"><?php echo $_SESSION["item_count"]; ?></p>
               </div>
                   
            <p>

            </p>
            <a href=<?php if($_SESSION["item_count"] > 0){echo"checkout.php?total=$total&addr=0";} else{echo "product.php";}?>><button>Proceed to checkout</button></a>
                </div>
            
            </div>
        </div>
        </div>
       
    </section>


   
</body>
<script>
        var pop_links = document.getElementById("pop-links");
        var navText = document.getElementById("nav_text");
        var navIcon = document.getElementById("nav_icon");
        var num = 0;



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

        <?php 
        if(!empty($_SESSION["shopping_cart"]))
        {
            
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                
        ?> 
            var num<?php echo $values['item_id'] ?> = document.getElementById("num<?php echo $values['item_id'] ?>");
             function shownum<?php echo $values['item_id'] ?>() {
                num<?php echo $values['item_id'] ?>.style.visibility='visible';
             }
        <?php
           
          }
      }
          
    ?>
  

    
        
    </script>
</html>