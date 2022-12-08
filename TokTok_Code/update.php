<?php 
    require("./php/config.php");
    
    if(isset($_POST["sin-sub"])) {
        $f_name = $_POST['f_name'];
        $l_name = $_POST['l_name'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        if($password == $c_password){

            $user_check = mysqli_query($conn, "SELECT * FROM site_user WHERE User_Name = '$username'");
            $email_check = mysqli_query($conn, "SELECT * FROM site_user WHERE Email = '$email'");
            if(mysqli_num_rows($user_check) > 0 and mysqli_num_rows($email_check) > 0){
                    header("location: register.php?error=1");
                }
            else if(mysqli_num_rows($user_check) > 0) {
                header("location: register.php?error=2");
            }
            else if (mysqli_num_rows($email_check) > 0) {
                header("location: register.php?error=3");
            }

            else {
                $result = mysqli_query($conn, "INSERT INTO site_user (First_Name, Last_Name, User_Name, Email, Password,remember) 
                VALUES ('$f_name','$l_name','$username','$email','$password',0)");

                header("location: index.php");
            }
        }   
           
    }

    if(isset($_POST["change_pass_sub"])) {
        $c_password = $_POST['c_password'];
        $n_password = $_POST['n_password'];
        $cn_password = $_POST['cn_password'];
        $username = $_POST['username'];

        $q1 = mysqli_query($conn, "SELECT Password FROM site_user WHERE User_Name = '$username'");
        $user_pass_check = mysqli_fetch_assoc($q1);

        if($user_pass_check['Password'] == $c_password){
            if($n_password == $cn_password) {
                mysqli_query($conn, "UPDATE site_user set Password = $n_password WHERE User_Name = '$username'");
                header("location: logout.php");
            }

            
        }
        else {
            header("location: user.php?error=1");
        }
    }

    if(isset($_POST["change_email_sub"])) {
        $password = $_POST['password'];
        $email = $_POST['email'];
        $username = $_POST['username'];

        $email_check = mysqli_query($conn, "SELECT * FROM site_user WHERE Email = '$email'");
        $q1 = mysqli_query($conn, "SELECT Password FROM site_user WHERE User_Name = '$username'");
        $user_pass_check = mysqli_fetch_assoc($q1);


        if (mysqli_num_rows($email_check) > 0) {
            header("location: user.php?error=2");
        }

        else if(($user_pass_check['Password'] != $password) && (mysqli_num_rows($email_check) == 0)) {
            header("location: user.php?error=3");
        }

        else if(($user_pass_check['Password'] == $password) && (mysqli_num_rows($email_check) == 0)) {
            mysqli_query($conn, "UPDATE site_user set Email = '$email' WHERE User_Name = '$username'");
            header("location: user.php");
        }

    }




    if(isset($_POST["add_address_sub"])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $subdis = $_POST['subdistrict'];
        $district = $_POST['district'];
        $province = $_POST['province'];
        $postcode = $_POST['postcode'];
        $id = $_POST['username'];

        

        mysqli_query($conn, "INSERT INTO address (Address_name, Address_PhoneNum, Address, Subdistrict, District, Province, PostCode, AUser_ID) 
        VALUES ('$name','$phone','$address','$subdis','$district','$province',$postcode,$id)");

        header("location: address.php");
        
    }



    if(isset($_POST["edit_address_sub"])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $subdis = $_POST['subdistrict'];
        $district = $_POST['district'];
        $province = $_POST['province'];
        $postcode = $_POST['postcode'];
        $aid = $_POST['aid'];


        mysqli_query($conn, "UPDATE `address` set Address_name = '$name', Address_PhoneNum = '$phone', Address = '$address', Subdistrict = '$district', Province = '$province', PostCode = '$postcode' WHERE Address_ID = $aid " );
        
        header("location: address.php");
        
    }



    if(isset($_POST["delete_address_sub"])) {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $subdis = $_POST['subdistrict'];
        $district = $_POST['district'];
        $province = $_POST['province'];
        $postcode = $_POST['postcode'];
        $aid = $_POST['aid'];


        mysqli_query($conn, "DELETE FROM `address` WHERE Address_ID = $aid " );
        
        header("location: address.php");
        
    }
    

    if(isset($_POST["forgot-sub"])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $c_password = $_POST['c_password'];

        $email_check = mysqli_query($conn, "SELECT * FROM site_user WHERE Email = '$email'");

        mysqli_query($conn, "UPDATE site_user SET Password = $password WHERE Email = '$email' " );

        if (mysqli_num_rows($email_check) > 0) {
            header("location: logintest.php");
        }

        else {
            header("location: forgot.php?error=1");
        }
        
        
        
    }
?>