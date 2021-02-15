
<?php
$r = $_GET["tn"];
if(!$_GET["tn"])
{
  header("location:login.html");
}

  include("../db.php");
   ?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>


<title>VifaaVyaShughuli</title>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>



<style type="text/css">
    
    body { 
    background: #ffffff;
    padding-top: 14px;
 
    }
    
.style1 {
	width: 585px;
	float: left;
	padding: 5px 10px;
	text-align: center;
}
.style2 {
	width: 520px;
	height: 35px;
	float: left;
	padding: 0px 0 0 365px;
	margin: 0 0 0 10px;
	_margin: 0 0 0 6px;
	line-height: 40px;
	font-size: 20px;
	color: #2b2b2b;
	font-weight: bold;
	background: url(images/bar_bg.gif) no-repeat center;
	text-align: center;
}
.style3 {
	width: 355px;
	float: left;
	padding: 0px 0 0 425px;
	text-align: left;
}
</style>


</head>
<body>
<div id="main_container">
  <!--<div id="header">
    <div id="logo"> <a href="#"><img src="images/logo.png" alt="" border="0" width="237" height="140" /></a> </div>
     end of oferte_content-->
  </div>
  <div id="main_content">
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <!-- end of menu tab -->
    <!-- end of left content -->
   
<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<div class="panel panel-primary">
					<div class="panel-heading"><strong>PAKIA VIFAA HAPA</strong></div>
					<div class="panel-body">
					
		<form method="POST" enctype="multipart/form-data">

          <p><br/></p>
						<div class="row">
							<div class="col-md-4">
								<label for="product_title">Jina la Kifaa:</label>
								<input type="text" id="product_title" name="product_title" class="form-control" required >
							</div>

							<div class="col-md-4">
								<label for="product_category">Kundi la Kifaa:</label>
								<select type="text" name="product_cat" id="product_cat" class="form-control" required >

                <option></option>
           
  <?php
	$get_cats = "select * from categories";
	$run_cats = mysqli_query($con,$get_cats);
	while($row_cats=mysqli_fetch_array($run_cats)) {
	$cat_tit = $row_cats['cat_title'];
    $cat_id = $row_cats['cat_id'];
     echo "<option value=$cat_id>$cat_tit</option>"; }    
  ?>
           
           </select>
							</div>

              <div class="col-md-4">
								<label for="product_brand">Mzalishaji wa Kifaa:</label>
								<select type="text" id="product_brand" name="product_brand" class="form-control" required >

              <option></option>

             <?php            
             $get_brands = "select * from brands";
	           $run_brands = mysqli_query($con,$get_brands);
	           while($row_brands=mysqli_fetch_array($run_brands)){
               $brand_tit = $row_brands['brand_title'];
               $brand_id = $row_brands['brand_id'];
               echo "<option value = $brand_id > $brand_tit </option>";}
            ?>
            
            </select>
							</div>
						</div>

            <p><br/></p>
            <div class="row">
							<div class="col-md-4">
								<label for="product_price">Bei ya Kifaa:</label>&nbsp;
								<input type="text" id="product_price" name="product_price"class="form-control" required >
							</div>

							<div class="col-md-4">
								<label for="product_price">Maneno ya Kutafuta Kifaa:</label>&nbsp;
								<input type="text" id="product_keywords" name="product_keywords"class="form-control" required >
							</div>

							<div class="col-md-4">
								<label for="product_image">Picha ya Kifaa:</label>
								<input type="file" id="product_image" name="product_image" class="form-control" required >
							</div>
						</div>

            <p><br/></p>
            <div class="row">
							<div class="col-md-12">
								<label for="product_desc">Maelezo kuhusu Kifaa:</label>
								<textarea id="product_desc" name="product_desc" class="form-control" required ></textarea>
							</div>
						</div>

						<p><br/></p>
						<div class="row">
							<div class="col-md-6">
								<input style="float:right;" value="PAKIA" type="submit" id="upload_button" name="upload_button"class="btn btn-success btn-md">
							</div>

							<div class="col-md-6">
								<a href="../index.php" > <input style="float:left;" value="ONDOKA" type="button" id="logout_button" name="logout_button"class="btn btn-danger btn-md"></a>
							</div>

						</div>
						
           </form>
				</div>
					
					<div class="panel-footer">VifaaVyaShughuli, &copy;<?php echo date("Y");?></div>
				</div>
			</div>
			<div class="col-md-2"></div>
		</div>

</body>
</html>


<?php

if(isset($_POST['upload_button'])){

    //getting text data
   $product_title = $_POST['product_title'];
   $product_cat = $_POST['product_cat'];
   $product_brand = $_POST['product_brand'];
   $product_price = $_POST['product_price'];
   $product_desc = $_POST['product_desc'];
   $product_keywords = $_POST['product_keywords'];
   
    //getting image data
   $product_image = $_FILES['product_image']['name'];
   $product_image_tmp = $_FILES['product_image']['tmp_name'];
   
   move_uploaded_file($product_image_tmp,"product_images/$product_image");
   
   $insert_product = "insert into products (product_cat,product_brand,product_title,product_price,product_desc,product_image,product_keywords) values ('$product_cat','$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
   
   $run_product = mysqli_query($con,$insert_product);
   
   if($run_product){
   
   echo"<script>alert('Bidhaa imepakiwa kikamilifu!')</script>";
   echo"<script>window.open('index.php?tn=$r','_self')</script>";
   }
}

?>