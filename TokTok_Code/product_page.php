<?php 
    require("./php/config.php");
    
    $get_remember = mysqli_query($conn, "SELECT * FROM site_user WHERE remember = 1 ");
    
    if(!empty($_SESSION["id"])) {
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
        $row = mysqli_fetch_assoc($result);
    }

    if(isset($_SESSION["item_count"])){

    }else{
        $_SESSION["item_count"] = 0;
    }
    
    
    if(isset($_POST["add_to_cart"])){
        $n = 0;
        if(!empty($_SESSION["id"])){
            if(isset($_SESSION["shopping_cart"]))
            {
                $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
                if(!in_array($_GET["id"], $item_array_id))
                {
                    $count = count($_SESSION["shopping_cart"]);
                    $item_array = array(
                        'item_id' => $_GET["id"],
                        'item_name' => $_POST["hidden_name"],
                        'item_price' => $_POST["hidden_price"],
                        //'item_color' => $_POST["hidden_color"],
                        'item_quantity' => $_POST["quantity"],
                        'item_img' => $_POST["hidden_img"]
                    );
                    $_SESSION["shopping_cart"][$count] = $item_array;
                    
                    //echo '<script>alert("Added to Shopping Cart")</script>';
                }
                else
                {
                    $i = 0;
                    $quan = 0;
                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                    {
                        if($values["item_id"] == $_GET["id"]){
                            $v = $values['item_id'];
                            $d = $_GET["id"];
                            $chk_q = $values['item_quantity'];
                            $uio = $i;
                            $quan = $_POST["quantity"] + $values['item_quantity'];
                            //echo "<script>alert('quan:$uio')</script>";
                            $item_array2 = array(
                                'item_id' => $_GET["id"],
                                'item_name' => $_POST["hidden_name"],
                                'item_price' => $_POST["hidden_price"],
                                //'item_color' => $_POST["hidden_color"],
                                'item_quantity' => $quan,
                                'item_img' => $_POST["hidden_img"]
                            );
                            $_SESSION["shopping_cart"][$i] = $item_array2;   
                            break;   
                        }else{
                            $i += 1;
                        }
                    }
                   
                    //echo '<script>alert("Added to Shopping Cart")</script>';
                    //header("Location: ");
                }
                
            }
    
            else
            {
                $item_array = array(
                    'item_id' => $_GET["id"],
                    'item_name' => $_GET["hidden_name"],
                    'item_price' => $_POST["hidden_price"],
                    'item_quantity' => $_POST["quantity"],
                    'item_img' => $_POST["hidden_img"]
                );
                $_SESSION["shopping_cart"][0] = $item_array;
                
                //echo '<script>alert("Added to Shopping Cart")</script>';
            }
            foreach($_SESSION["shopping_cart"] as $keys => $values) {
        
                $n = $n + (1 * $values["item_quantity"]);
            }
    
            $_SESSION["item_count"] = $n;

            
        }
        else{
            header("Location: logintest.php");
        }
   }







    else if(mysqli_num_rows($get_remember)>0){
        
        $use_val = mysqli_fetch_assoc($get_remember);
        $id = $use_val['User_ID'];
        if($id > 0){
            $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
            $row = mysqli_fetch_assoc($result);
        }
            
    }

    if(isset($_GET['id'])) {
        $p_id = $_GET['id'];
        $product = mysqli_query($conn, "SELECT Name, Price, b.Brand, Color, m.Movement, Product_img from product p join product_brand b on p.Brand = b.Brand_ID join product_movement m on p.Movement = m.Movement_ID WHERE p.Product_ID = $p_id ");
        $p = mysqli_fetch_assoc($product);
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
                    <p style="display: inline; font-size: 20px; margin-left: 0.1px ;" id="cart_num"><?php echo $_SESSION["item_count"];?></p>
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

    <section class="product-content">
        <div id="product-img">
           <center><img src="<?php echo $p['Product_img']?>" alt=""></center>
        </div>
        <div id="product-info">
            <div style="display: flex; width: 100%; margin-top: 70px;">
                <div style="width: 40%">
                <h3>Brand:</h3>
                <h3>Name:</h3>
                <h3>Color:</h3>
                <h3>Movement:</h3>
                <h3>Price:</h3>
                </div>
                <div style="width: 50%;">
                <p><?php echo $p['Brand']?></p>
                <p><?php echo $p['Name']?></p>
                <p><?php echo $p['Color']?></p>
                <p><?php echo $p['Movement']?></p>
                <p><?php echo number_format($p['Price'],2)?></p>
                </div>


               
            </div>
            <form action="product_page.php?id=<?php echo $_GET["id"];?>" class="log-input-group" style="width: 70%; margin-top: 20px;" method="post">
                <input id="product-number" type="number" min="1" value="1"  name="quantity">
                
                <button type="submit" name="add_to_cart" style="width: 100%;">ADD TO CART</button>
                <input type="hidden" style="visibily: hidden;" name="hidden_name" value="<?php echo $p['Name'] ?>">
                <input type="hidden" style="visibily: hidden;" name="hidden_price" value="<?php echo $p['Price']?>">
                <input type="hidden" style="visibily: hidden;" name="hidden_img" value="<?php echo $p['Product_img']?>">
                
            </form>
        
                
        </div>
    </section>

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
                pop_links.style.left = "-1000px";
                navText.innerHTML = "MENU";
                navIcon.className = "fa-solid fa-bars";
                num = 0;
            }
            
        }

    
        
    </script>
    
</body>
</html>