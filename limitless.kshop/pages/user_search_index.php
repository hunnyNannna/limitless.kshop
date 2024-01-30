<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }
?>
<?php
include('../config/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/logo.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Limitless.Kshop</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
</head>

<style>
	.container{
		width:600px;
		margin-top:150px;
	}

	.button {
		float:right;
		background-color:black;
		color:white;
		padding: 10px 5px;
		border-width: 1px;
		border-radius: 50px !important;
		padding: 11px 23px
	}

	.button:hover, .search:hover {
		opacity:0.8;
		color:white;
	}

	.search {
		background-color:black;
		color:white;
		border-radius: 5px !important;
	}
</style>
<body>
 
	<div class="container">
		<div class="col-md-6 well">  

			<h4 align="center">Search Product:</h4><br>

			<form class="form-inline" method="POST" action="user_search_index.php">
				<div class="input-group col-md-12">
					<center>
						<input type="text" class="form-control" placeholder="Search here..." name="keyword" required="required" value="<?php echo isset($_POST['keyword']) ? $_POST['keyword'] : '' ?>"/>
								
						<button class="search" name="search"><i class="fa fa-search"></i></button>
					</center>		
				</div>
			</form>
				
			<?php
				if(ISSET($_POST['search']))
				{
					$keyword = $_POST['keyword'];
			?>
					<div>
						<h4>Result</h4>
						<hr style="border-top:2px dotted #ccc;"/>
								
						<?php
							include('../config/dbconn.php');    
							$query = mysqli_query($dbconn, "SELECT * FROM `product` WHERE `prod_name` LIKE '%$keyword%' ORDER BY `prod_name`") or die(mysqli_error());
							while($fetch = mysqli_fetch_array($query))
							{
						?>
				
								<div style="word-wrap:break-word;">
									<a href="user_product_details.php?prod_id=<?php echo $fetch['prod_id']?>"><h5><?php echo $fetch['prod_name']?></h5></a>
								</div>

								<hr style="border-bottom:1px solid #ccc;"/>
						<?php
							}
						?>
					</div>
			
						<?php
				}
						?>	
		</div> 				
		
		<a style="text-decoration:none;" class="button" href="../pages/user_products.php"><i class="now-ui-icons gestures_tap-01"></i>Back to product page</a>	
	</div>
<script src="../js/jquery-3.2.1.min.js"></script>
<script src="../js/bootstrap.js"></script>
</body>
</html>