<?php 
  require("./php/config.php");
  if(isset($_GET['total'])) {
    $_SESSION['total'] = $_GET['total'];
    
  }
  $page_total =  $_SESSION['total'];
  
 
  $total = 0;
  $token =  md5(uniqid(mt_rand()));

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

  

  else if(mysqli_num_rows($get_remember)>0){
      
      $use_val = mysqli_fetch_assoc($get_remember);
      $id = $use_val['User_ID'];
      if($id > 0){
          $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_ID = $id");
          $row = mysqli_fetch_assoc($result);
      }
          
  }

  

  if(isset($_SESSION["shopping_cart"])){
    if(!empty($_SESSION["shopping_cart"]))
    {
        
    }else{
      header("Location: cart2.php");
    }
  }

  if(isset($_POST['checkout'])){

    if(!empty($_SESSION["shopping_cart"]))
    {
          $uid= $_SESSION["id"];
          $yourdate = date('Y-m-d');
          $address = $_GET['addr'];
          

        
        foreach($_SESSION["shopping_cart"] as $keys => $values)
          { 
            $total = $total + ($values["item_quantity"] *$values["item_price"]);
            $pid = $values['item_id'];
            $quanti = $values['item_quantity'];
            
            $query = "INSERT INTO `cart`(Product_ID,User_ID,Quntity,Token) VALUES($pid,$uid,$quanti,'$token')";
            mysqli_query($conn,$query);
          }
        
       // echo '<h1>' . $uid .'</h1>';
        //echo '<h1>' . $yourdate .'</h1>';
        //echo '<h1>' . $token .'</h1>';
        //echo '<h1>' . $address .'</h1>';
        $order = "INSERT INTO `shop_order`(user_id,orderdate,shipping_address,payment_method,shipping_method,order_total,warranty,Cart_token) VALUES($uid,'$yourdate',$address,1,1,$total,2,'$token')";
        mysqli_query($conn,$order);
        echo '<script>alert("Complete Transaction")</script>';
        unset($_SESSION["shopping_cart"]);
        unset($_SESSION["item_count"]);
        
        header("location: index.php");
        
    }

    else{
      echo '<script>alert("cart_empty")</script>';
      header("Location: index.php");
    }
  }

    if (isset($_GET["addr"])){
      if ($_GET["addr"] > 0) {
      $addrid = $_GET['addr'];
      $query = "SELECT * FROM `address` WHERE Address_ID = $addrid ";
      $result = $conn->query($query);

      if (!$result){
          echo "Select failed!<br/>";
          echo $conn->error;
      } else {
      $adr = $result->fetch_array();
      }
      }

      
  }

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TokTok Watch</title>
    <link rel="stylesheet" href="CSS/main.css">
    <link rel="icon" href="">
    <script src="https://kit.fontawesome.com/8633768cc1.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {
  font-family: Arial;
  font-size: 17px;
  padding: 8px;
}

* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #04AA6D;
  color: white;
  padding: 12px;
  margin: 10px 0;
  border: none;
  width: 100%;
  border-radius: 3px;
  cursor: pointer;
  font-size: 17px;
}

.btn:hover {
  background-color: #45a049;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
}
</style>
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
<section class="container" style="padding: 150px 10px;">
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="" method="post">
     
        <div class="row">
          <div class="col-50">
            <h3>Save Address</h3>

              <select name="address" onchange="update(this.value)">
              echo '<option value="0">None</option>';
              <?php
						$q ="SELECT * from `address` where AUser_ID = '$id'";
						if($result=$conn->query($q)){
							while($row=$result->fetch_array()){
								echo "<option value= $row[0] ";
						 if ($row[0] == $_GET['addr'])
						 	echo "SELECTED";
						echo "> $row[1] </option>";
							}
						}else{
							echo 'Query error: '.$mysqli->error;
						}
					?>
            </select>

            <h3>Billing Address</h3>
            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
            <input type="text" id="fname" name="name" placeholder="John M. Doe">
            <label for="email"><i class="fa fa-phone"></i> PhoneNumber</label>
            <input type="text" id="email" name="email" placeholder="john@example.com">
            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" . value="<?php echo $adr['Address'] ?>">
            <label for="city"><i class="fa fa-institution"></i> District</label>
            <input type="text" id="city" name="district" placeholder="New York" value="<?php echo $adr['District'] ?>">
            <label for="city"><i class="fa fa-institution"></i> Subdistrict</label>
            <input type="text" id="city" name="subdistrict" placeholder="New York"value="<?php echo $adr['Subdistrict'] ?>">

            <div class="row">
              <div class="col-50">
                <label for="state">Provice</label>
                <input type="text" id="state" name="state" placeholder="NY" value="<?php echo $adr['Province'] ?>" >
              </div>
              <div class="col-50">
                <label for="zip">Zip</label>
                <input type="text" id="zip" name="zip" placeholder="10001" value="<?php echo $adr['PostCode'] ?>">
              </div>
            </div>
          </div>

          <div class="col-50">
            <h3>Payment</h3>
            <label for="fname">Accepted Cards</label>
            <div class="icon-container">
              <i class="fa fa-cc-visa" style="color:navy;"></i>
              <i class="fa fa-cc-amex" style="color:blue;"></i>
              <i class="fa fa-cc-mastercard" style="color:red;"></i>
              <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>
            <label for="cname">Name on Card</label>
            <input type="text" id="cname" name="cardname" placeholder="John More Doe">
            <label for="ccnum">Credit card number</label>
            <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444">
            <label for="expmonth">Exp Month</label>
            <input type="text" id="expmonth" name="expmonth" placeholder="September">
            <div class="row">
              <div class="col-50">
                <label for="expyear">Exp Year</label>
                <input type="text" id="expyear" name="expyear" placeholder="2018">
              </div>
              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" id="cvv" name="cvv" placeholder="352">
              </div>
            </div>
          </div>
          
        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <!-- <input type="submit" value="Continue to checkout" class="btn"> -->
    </div>
  </div>


  <div class="col-25">
    <div class="container">
  <?php

      $total = $_GET["total"] ;
      $quantity = 0;
      echo "<h4>Cart <span class='price' style='color:black'><i class='fa fa-shopping-cart'></i><b></b></span></h4>";
  
      if(!empty($_SESSION["shopping_cart"])){

        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
  ?>
          <p><?php echo $values["item_name"]?><p class="product-quality">Qnt: <input value="<?php echo $values["item_quantity"]?>" name=""></a> <span class="price"><?php echo $values["item_price"];?>฿</span></p><br>

  <?php     
          
         
        }

      }
  
  ?>
      <hr>
      <p>Total <span class="price" style="color:black"><b><?php echo $page_total;?>฿</b></span></p>
      <input type="submit" value="Continue to checkout" class="btn" name="checkout">
    </div>
  </div>
  </form>
</div>

</section>
</body>
<script>
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
  function update(x) {
    
    var head = 'checkout.php?addr=';
    var link = head + x;
    console.log(link);
    window.location.href = link;
  }
</script>
</html>