<?php 
    require("./php/config.php");
    if(isset($_POST["login_sub"])) {
        $user_id = $_POST['user_id'];
        $password = $_POST['password'];
        $result = mysqli_query($conn, "SELECT * FROM site_user WHERE User_Name = '$user_id' or Email = '$user_id' ");
        $row = mysqli_fetch_assoc($result);
        if(mysqli_num_rows($result) > 0){
            if($password == $row["Password"]){
                if(isset($_POST['remember'])){
                mysqli_query($conn, "UPDATE site_user set remember = 1 WHERE User_Name = '$user_id' or Email = '$user_id' ");
                }
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row["User_ID"];
                header("Location: index.php");
            }
            else{
                header("Location: logintest.php?error=1");
            }
        }
        else {
            header("Location: logintest.php?error=2");
        }
        
    }
?>