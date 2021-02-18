<?php 
    include "db.php";
    $prod = [];
    if (isset($_GET['prod_id'])) {
        $pro_id = $_GET['prod_id'];
        $product_query = "SELECT * FROM products where product_id='$pro_id'";
	    $run_query = mysqli_query($con, $product_query);
        if(mysqli_num_rows($run_query) > 0) {
            $prod = mysqli_fetch_assoc($run_query);
            $brand_id = $prod['product_brand'];
            $cat_id = $prod['product_cat'];

            $queryb = mysqli_query($con, "select brand_title from brands where brand_id='$brand_id'");
            $queryc = mysqli_query($con, "select cat_title from categories where cat_id='$cat_id'");
            $brand = mysqli_fetch_assoc($queryb)['brand_title'];
            $category = mysqli_fetch_assoc($queryc)['cat_title'];
            
        }else{
            // header('location: index.php');
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
		<style>
			@media screen and (max-width:480px){
				#search{width:70%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:60px;}
			}
            
			.side-nav {
    height: 100%;
    width: 250px;
    position: fixed;
    z-index: 1;
    top: 92px;
    margin-top: -6px;
    background-color: #000;
    opacity: 0.8;
    padding-top: 35px;
    line-height: 2px;
    overflow-x: hidden;
    transition: 0.5s;
}
            
.side-nav a{
  padding:20px 10px 10px 30px;
  text-decoration:none;
  color:#5b94c5;
  display:block;
  transition:0.3s;
}

.side-nav a:hover{
  color: #337ab7;
}

.side-nav .btn-close{
  position:absolute;
  top:0;
  right:22px;
  font-size:35px;
  margin-left:50px;
}

#main{
  transition:margin-left 0.5s;
  padding-left: 0px;
  overflow:hidden;
}
.open-slide{
    margin-right: 100px;
}
 
.m-5 {
    margin: 10px !important;
}
</style>
    <title>VifaaVyaShughuli product details</title>
</head>
<body>
<div class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6 m-5">
        <div class=''>
        <div class='panel panel-info'>
            <div class='panel-heading'>
                <button class="btn btn-primary btn-sm" onclick="window.history.back()"> Rudi</button>
            <b><?= $prod['product_title']?></b></div>
            <div class='panel-body'>
                <p class="text-center">
                    <img src='product_images/<?=$prod['product_image']?>' style='width:230px; height:210px;'/>
                </p>
            </div>
            <div class='panel-heading'><b>Description: <?= $prod['product_desc']?></b></div>
            <div class='panel-heading'><b>Quantity: <?= $prod['product_quantity']?></b></div>
            <div class='panel-heading'><b>Category: <?= $category?></b></div>
            <div class='panel-heading'><b>Brand: <?= $brand?></b></div>
            <div class='panel-heading'><b>Price: Tsh.<?= $prod['product_price']?>/=</b></div>
            
        </div>
    </div>
    <div class="col-md-3"></div>	
    </div>
</div>
</body>
</html>



<?php }else{ header('location: index.php'); }?>