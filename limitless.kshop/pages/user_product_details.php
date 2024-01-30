<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }

    include('../config/dbconn.php');
    $prod_id=$_GET['prod_id'];
    $query = "SELECT * FROM product WHERE prod_id='$prod_id'";
    $result = mysqli_query($dbconn,$query);
    while($res = mysqli_fetch_array($result)) {

        $prod_id=$res['prod_id'];
        $prod_price=$res['prod_price'];
        $user_id = $_SESSION['id'];


        if (isset($_POST['submit'])) {

            $prod_id = $prod_id;
            $prod_price = $prod_price;
            $prod_qty = $_POST['prod_qty'];                                       
            $total = $prod_price * $_POST['prod_qty'];         
            $user_id = $user_id;
            $date=date("Y-m-d");

            if(empty($prod_qty)) {    
            
                if(empty($prod_qty)) {
                    
                    echo "<br><center><h4><font color='red'><b>Error!</b> Enter Product Quantity.</font></h4></center>";
                
                }

            } 
            
            else {

                mysqli_query($dbconn,"INSERT INTO order_details (prod_id,prod_qty,total,user_id) 
                            VALUES ('$prod_id','$prod_qty','$total','$user_id')") or die(mysql_error());
?>
                                         
<script type="text/javascript">

    alert("Product added to cart!");
    window.location = "user_cart.php";

</script>
   
<?php 
            }
        }
    } 
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Limitless.Kshop</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" /> 

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
</head>

<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.js" type="text/javascript"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf-8" language="javascript" src="js/DT_bootstrap.js"></script>

<style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: auto;
        max-height:400px;
    }

    .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: black;
        cursor: pointer;
        color:white;
    }

    /* Style the active class (and buttons on mouse-over) */
    .btn.active, .btn:hover {
        background-color: black;
        color: red;
    }

    .btn:hover {
        background-color: grey;
        color: white;
    }

    .btn:hover:after {
        background-color: black;
        color: white;
    }

    .btn-atc {
        background-color: black;
        color: #FFFFFF;
    }
</style>

<body class="index-page sidebar-collapse"> 
    <div class="wrapper">
        <div class="main"> 

            <div class="section" id="carousel">
                <div class="container">
                    <h2>Product Details</h2>
                    <a class="btn btn-primary btn-round" href="../products.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to product</a>
                    <hr color="orange">
                    
                    <div class="col-md-12">
                        <div class="row justify-content-center">
                            <div class="col-8">
                    
                                <?php

                                    include('../config/dbconn.php');
                                    $prod_id=$_GET['prod_id'];
                                    $query = "SELECT * FROM product WHERE prod_id='$prod_id'";
                                    $result = mysqli_query($dbconn,$query);
                                    while($res = mysqli_fetch_array($result)) {  
                                        
                                ?>   
                
                                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                            <ol class="carousel-indicators">
                                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="1" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="2" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="3" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="4" class="active"></li>
                                                <li data-target="#carouselExampleIndicators" data-slide-to="5" class="active"></li>
                                            </ol>
                    
                                            <div class="carousel-inner" role="listbox">
                                                <div class="carousel-item active">
                                                    <?php if($res['prod_pic1'] != ""): ?>
                                                    <img class="d-block" src="../uploads/<?php echo $res['prod_pic1']; ?>" alt="First slide">
                                                    <?php else: ?>
                                                    <img src="../uploads/default.jpeg">
                                                    <?php endif; ?>
                                                </div>
                        
                                                <div class="carousel-item">
                                                    <?php if($res['prod_pic2'] != ""): ?>
                                                    <img class="d-block" src="../uploads/<?php echo $res['prod_pic2']; ?>" alt="Second slide">
                                                    <?php else: ?>
                                                    <img src="../uploads/default.jpeg">
                                                    <?php endif; ?>
                                                </div>

                                                <div class="carousel-item">
                                                    <?php if($res['prod_pic3'] != ""): ?>
                                                    <img class="d-block" src="../uploads/<?php echo $res['prod_pic3']; ?>" alt="Third slide">
                                                    <?php else: ?>
                                                    <img src="../uploads/default.jpeg">
                                                    <?php endif; ?>
                                                </div>
                                            
                                                <div class="carousel-item">
                                                    <?php if($res['prod_pic4'] != ""): ?>
                                                    <img class="d-block" src="../uploads/<?php echo $res['prod_pic4']; ?>" alt="Fourth slide">
                                                    <?php else: ?>
                                                    <img src="../uploads/default.jpeg">
                                                    <?php endif; ?>
                                                </div>

                                                <div class="carousel-item">
                                                    <?php if($res['prod_pic5'] != ""): ?>
                                                    <img class="d-block" src="../uploads/<?php echo $res['prod_pic5']; ?>" alt="Fifth slide">
                                                    <?php else: ?>
                                                    <img src="../uploads/default.jpeg">
                                                    <?php endif; ?>
                                                </div>

                                                <div class="carousel-item">
                                                    <?php if($res['prod_pic6'] != ""): ?>
                                                    <img class="d-block" src="../uploads/<?php echo $res['prod_pic6']; ?>" alt="Fifth slide">
                                                    <?php else: ?>
                                                    <img src="../uploads/default.jpeg">
                                                    <?php endif; ?>
                                                </div>
                                            </div>

                                            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" data-background-color="black">
                                                <i class="now-ui-icons arrows-1_minimal-left"></i>
                                            </a>

                                            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next" data-background-color="black">
                                                <i class="now-ui-icons arrows-1_minimal-right"></i>
                                            </a>
                                        </div>
                            </div>
                        </div>
                    </div>

                    <h4>
                        
                        <br><br>
                    
                        <ul><b>Serial number: 
                            <span style="color:green;"><?php echo $res['prod_sku']; ?></span></b>
                        </ul>
                    
                        <ul><b>Product name: </b> 
                            <?php echo $res['prod_name']; ?>
                        </ul>   
                    
                        <ul><b>Description: </b>
                            <p style="font-size:15px;"><?php echo $res['prod_desc']; ?></p>
                        </ul>
                    
                        <ul><b>Type: </b>
                            <?php echo $res['category']; ?>
                        </ul>
                    
                        <ul><b>Price: </b>
                            <?php echo 'RM '.$res['prod_price'].''; ?>
                        </ul>
                    
                        <ul>
                            <?php  $prod_qty=$res['prod_qty'];?> 
                        
                            <?php

                                if ($prod_qty<=0) {
                            
                            ?>
                                    <span style="color:red;">Product Sold Out!</span>    
                                    <p id="time"></p>

                            <?php
                                }
                                
                                else {
                            
                            ?>
                            
                                    <b>Items in stock: </b><?php echo $res['prod_qty'];?>
                        </ul>
                            
                        <?php 
                                }
                        ?>
                    
                        <?php 
                                    }
                        ?> 

                    </h4>


                    <!-- Button trigger modal -->
                    <button class="btn btn-atc btn-round pull-right" data-toggle="modal" data-target="#myModal">
                        <i class="now-ui-icons shopping_cart-simple"></i> Add To Cart
                    </button>

                    <!-- Modal Core -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form group">
                                        <div class="modal-header">
                                           
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                            <h4 class="modal-title" id="myModalLabel">Enter Quantity:</h4>

                                        </div>
                        
                                        <div class="modal-body">

                                            <div class="input-append">
                                                <?php
                                                    echo "<select class='btn btn-atc btn-round dropdown-toggle' size='1' name='prod_qty' id='prod_qty'>";
                                                    $i=1; $prod_qty=$prod_qty;
                                                    while ($i <= $prod_qty ) {
                                                        echo "<option value=".$i.">".$i."</option>";
                                                        $i++;
                                                    }
                                                    echo "</select>";
                                                ?>
                                            </div>
                                        </div>
                  
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-atc btn-round" data-dismiss="modal">Close</button>
                                                <a><button type="submit" name="submit" class="btn btn-atc btn-round">Order</button></a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>   
                </div>
            </div>

        <br>

        </div>
    </div>

    <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="../index.php" target="_blank">
                                Limitless.Kshop
                            </a>
                        </li>
                    </ul>
                </nav>
            
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Nurul Husna.
                </div>
            </div>
        </footer>
</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }

    setTimeout(timeout,2000);

    function timeout() {
        document.getElementById("time").innerHTML;

        if (confirm("Product is sold out! Choose another product.","Ok","Cancel")) {
            window.location="user_index.php";
        } 
        
        else {
            window.location="#";
        }
    }
</script>

<html>