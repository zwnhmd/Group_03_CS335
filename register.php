<?php
session_start();
include "db.php";
if (isset($_POST['signup_button'])) {
    $msg ="";
    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $mobile = $_POST['mobile'];
    $address1 = $_POST['address1'];
    $profile_pic_name = "";
    // $name = "/^[A-Z][a-zA-Z ]+$/";
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $number = "/^[0-9]+$/";
    
    // print_r($_FILES['profile_pic']);
    // header('location: customer_registration.php');
    
    if(empty($f_name) || empty($l_name) || empty($email) || empty($password) || empty($repassword) ||
    empty($mobile) || empty($address1)) {
        $_SESSION['message'] =  "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Tafadhali jaza taarifa zako zote!</b>
            </div>
        ";
        header('location: customer_registration.php');
    } else {
        // if(!preg_match($name,$f_name)){
        //     $_SESSION['message'] =  "
        //         <div class='alert alert-warning'>
        //             <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        //             <b>$f_name siyo jina!</b>
        //         </div>
        //     ";
        //     header('location: customer_registration.php');
        // }
    }
    
    // if(!preg_match($name,$l_name)){
    //     $_SESSION['message'] =  "
    //         <div class='alert alert-warning'>
    //             <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
    //             <b>$l_name siyo jina!</b>
    //         </div>
    //     ";
    //     header('location: customer_registration.php');
    // }
    
    if(!preg_match($emailValidation,$email)){
        $_SESSION['message'] =  "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>$email siyo jina!</b>
            </div>
        ";
        header('location: customer_registration.php');
    }
    
    if(strlen($password) < 9 ){
        $_SESSION['message'] =  "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Ingiza neno la siri lenye angalau namba/herufi 9</b>
            </div>
        ";
        header('location: customer_registration.php');
    }
    
    if(strlen($repassword) < 9 ){
        $_SESSION['message'] =  "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Neno-siri lako ni dhaifu!</b>
            </div>
        ";
        header('location: customer_registration.php');
    }
    
    if($password != $repassword){
        $_SESSION['message'] =  "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Maneno-siri uliyojaza hayalingani!</b>
            </div>
        ";
    }
    
    if(!preg_match($number,$mobile)){
        $_SESSION['message'] =  "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>$mobile siyo namba sahihi ya simu!</b>
            </div>
        ";
        header('location: customer_registration.php');
    }
    
    if(!(strlen($mobile) == 10)){
        $_SESSION['message'] =  "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Namba ya simu ni lazima iwena na tarakimu 10! </b>
            </div>
        ";
        header('location: customer_registration.php');
    }
    
    
    
    if (isset($_FILES['profile_pic'])) {
        $profile_pic = $_FILES['profile_pic'];
        $filename = $profile_pic['name'];
        $filetmpname = $profile_pic['tmp_name'];
        $filesize = $profile_pic['size'];
        $filetype = $profile_pic['type'];
        $fileerror = $profile_pic['error'];
    
        $fileext = explode('.', $filename);
        $fileactext = strtolower(end($fileext));
        $fileactname = strtolower($fileext[0]);
    
        $allowed = array('jpg','jpeg','png','gif');
    
        if (in_array($fileactext, $allowed)) {
            if ($fileerror === 0) {
    
                if ($filesize < 50000000) {
                    
                    $rand = rand(100000, 9999999);
                    $filenewname = $profile_pic_name = "profile0" . $rand . '.' . $fileactext;
                    $filedestination = 'product_images/' . $filenewname;
    
                    move_uploaded_file($filetmpname, $filedestination);
    
                }
    
                else {
                    $_SESSION['message'] =  "
                        <div class='alert alert-danger'>
                            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                            <b>Picha isizidi MB mbili (2)! </b>
                        </div>
                    ";
                    header('location: customer_registration.php');
                }
    
            }
            else {
                $_SESSION['message'] =  "
                    <div class='alert alert-danger'>
                        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                        <b>Tatizo limetokea wakati wa kuingiza picha yako, hakikisha faili yako ni picha! </b>
                    </div>
                ";
                header('location: customer_registration.php');
            }
        }
    
        else {
            $_SESSION['message'] =  "
                <div class='alert alert-danger'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Faili ulioingiza hairuhusiwi, ingiza picha tu!</b>
                </div>
            ";
            header('location: customer_registration.php');
        }
    }
    
    //existing email address in our database
    $sql = "SELECT user_id FROM user_info WHERE email = '$email' LIMIT 1" ;
    $check_query = mysqli_query($con,$sql);
    $count_email = mysqli_num_rows($check_query);
    if($count_email > 0){
        $_SESSION['message'] =  "
            <div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Barua-pepe imeshatumika, tafadhali tumia barua-pepe nyingine! </b>
            </div>
        ";
        header('location: customer_registration.php');
    } else {
        $password = md5($password);
        $sql = "INSERT INTO `user_info` 
        (`first_name`, `last_name`, `email`, 
        `password`, `mobile`, `address1`, `profile_pic`) 
        VALUES ('$f_name', '$l_name', '$email', 
        '$password', '$mobile', '$address1', '$profile_pic_name')";
        $run_query = mysqli_query($con,$sql);
        if($run_query) {
            $_SESSION['message'] =  "
                <div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Hongera, umefanikiwa kujisajili kikamilifu!</b>
                </div>
            ";
            header('location: customer_registration.php');
        }
    }
}else {
    $_SESSION['message'] =  "
        <div class='alert alert-warning'>
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Kuna tatizo!</b>
        </div>
    ";
    header('location: customer_registration.php');
}
	

?>