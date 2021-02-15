<?php



if(!isset($_POST["tex"]))
{
	header("location:login.html");
}

else{



 $con = mysqli_connect("localhost","root","","vifaa_vya_shughuli");

 if(mysqli_connect_errno()){
  
  echo"Imeshindikana kuunganishwa kwenye kanzidata: " . mysqli_connect_error(); 
  
}



    $newpass = $_POST["tex"];
    $confirm = $_POST["pass"];


    if($newpass == $confirm)
    {
    	$query = "update ad_log set apwd ='$newpass'";
    	$run = mysqli_query($con,$query);

    	echo"<script>alert('Nen0-siri limebadilika, tafadhali ingia tena!')</script>";
    	echo"<script>window.open('login.html','_self')</script>";

    }

    else{

    	echo"<script>alert('Maneno-siri hayafanani, tafadhali jaribu tena!')</script>";
    	echo"<script>window.open('fp2.php',_self)</script>";
    }



}

?>