<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Limitless.Kshop</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport'>
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet"> 
    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
</head>

<style>
    img {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: auto;
        max-height:400px;
    }
    
    .btn.btn-main {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: black;
        cursor: pointer;
        color:white;
    }

    .btn-cancel {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: red;
        cursor: pointer;
        color:white;
    }

    .btn-main:hover {
        background-color: grey;
        color: white;
    }

    .floatright {
        float:right;    
    }
</style>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  fixed-top" data-background-color="black">
        <div class="container">
            <div class="navbar-translate">
                <a href="user_index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Nurul Husna" data-placement="bottom" target="">
                    Limitless.Kshop
                </a>
                
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="user_profile.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p style="font-size:10px;">
                                <?php
                                    include('../config/dbconn.php');
                                    $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE admin_id='".$_SESSION['id']."'");
                                    $row=mysqli_fetch_array($query);
                                    echo ''.$row['fullname'].'';
                                ?>
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admin_panel1.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p style="font-size:10px;">Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p style="font-size:10px;">Cart</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p style="font-size:10px;">Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="wrapper">
        <br>

        <div class="main">
            <div class="section section-basic">

                <div class="section" id="carousel">
                    <div class="container">
                        <h2>Product Details</h2>
                        <a class="btn btn-main btn-round" href="admin_panel1.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to product</a>
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
                                                </ol>
                                                
                                                <div class="carousel-inner" role="listbox">
                                                    <div class="carousel-item active">
                                                        <?php if($res['prod_pic1'] != ""): ?>
                                                        <img class="d-block" src="../uploads/<?php echo $res['prod_pic1']; ?>" alt="First slide">
                                                        <?php else: ?>
                                                        <img src="../uploads/default.png">
                                                        <?php endif; ?>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5><?php echo $res['prod_name']; ?></h5>
                                                        </div>
                                                    </div>

                                                    <div class="carousel-item">
                                                        <?php if($res['prod_pic2'] != ""): ?>
                                                        <img class="d-block" src="../uploads/<?php echo $res['prod_pic2']; ?>" alt="Second slide">
                                                        <?php else: ?>
                                                        <img src="../uploads/default.png">
                                                        <?php endif; ?>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5><?php echo $res['prod_name']; ?></h5>
                                                        </div>
                                                    </div>

                                                    <div class="carousel-item">
                                                        <?php if($res['prod_pic3'] != ""): ?>
                                                        <img class="d-block" src="../uploads/<?php echo $res['prod_pic3']; ?>" alt="Third slide">
                                                        <?php else: ?>
                                                        <img src="../uploads/default.png">
                                                        <?php endif; ?>
                                                        <div class="carousel-caption d-none d-md-block">
                                                            <h5><?php echo $res['prod_name']; ?></h5>
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                                    <i class="now-ui-icons arrows-1_minimal-left"></i>
                                                </a>
                                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                                    <i class="now-ui-icons arrows-1_minimal-right"></i>
                                                </a>
                                            </div>
                                </div>
                            </div>
                        </div>

                        <h5><br><br>

                            <ul><b>Serial number: 
                                <span style="color:green;"><?php echo $res['prod_sku']; ?></span></b>
                            </ul>

                            <ul><b>Product name: </b> 
                                <?php echo $res['prod_name']; ?>
                            </ul>

                            <ul><b>Description: </b>
                                <p  style="font-size:15px;"><?php echo $res['prod_desc']; ?></p>
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
                                    if ($prod_qty<=10){
                                ?>
                                        <b>Items in stock: </b><span style="color:red;"><?php echo $res['prod_qty'];?> :Reorder!</span>   
                                <?php
                                    } 
                                    
                                    else {
                                ?>
                                        <b>Items in stock: </b><?php echo $res['prod_qty'];?>
                            </ul>
        
                            <ul>
                                <?php echo "<a href=\"admin_product_update.php?prod_id=$res[prod_id]\">Edit Product Details</a>"; }?>
                            </ul>
                            
                            <?php 
                                        }
                            ?>      
                        </h5>
                    </div>
                </div>

                <br>
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
        </div>
    </div>
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
</script>

   <!---  inserted  -->
    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
        $(function () {
            $("#example1").DataTable({
            });
        });
    </script>
    <!--  inserted  -->

</html>