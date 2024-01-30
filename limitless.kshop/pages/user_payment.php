<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
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
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet"> 
    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
</head>

<style type="text/css">
    tr td {
        padding-top:-10px!important;
        border: 1px solid #000;
    }
      
    @media print {
        .btn-print {
            display:none !important;
        }
    }
 
    .containerfile {
        height: 30vh;
        width: 100%;
        align-items: center;
        display: flex;
        justify-content: center;
        background-color: #fcfcfc;
    }
  
    .cardfile {
        border-radius: 10px;
        box-shadow: 0 5px 10px 0 rgba(0, 0, 0, 0.3);
        width: 500px;
        height: 200px;
        background-color: #ffffff;
        padding: 20px;
    }
  
    .drop_boxfile {
        margin: 5px 0;
        padding: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        border: 3px dotted #a3a3a3;
        border-radius: 5px;
    }
   
    .dpfile {
        margin: 5px;
        font-size: 10px;
        color: #a3a3a3;
    }

    .upload {
        font-size:12px;
    }


    .link {
    min-width: 50% !important;
    }

    .w3-blue, .w3-hover-blue:hover 
    {
        color: #fff!important;
        background-color: rgba(95, 158, 160) !important;
    }

    .text 
    {
        font-family: Arial, Helvetica, sans-serif;
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
                        <a class="nav-link" href="user_option.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p style="font-size:10px;">
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo ''.$row['fullname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_products.php">
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

    <div class="wrapper"><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                    <h2>       
                        <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            $id=$row['user_id'];
                            echo $row['fullname'];
                        ?>'s Checking Out!
                    </h2>
                      
                    <hr color="orange"> 
                
                    <div class="col-md-12">
                    
                    <br>
            
                        <div class="panel panel-success panel-size-custom">
                            <div class="panel-body">  

                                <center>
        
                                    <?php
                                        $user_id = $_SESSION['id'];

                                        include('../config/dbconn.php');
                                        $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                        $row=mysqli_fetch_array($query);
                                        $fullname=$row['fullname'];
                                        $email=$row['email'];
                                        $phoneno=$row['phoneno'];
    
                                        $query = mysqli_query($dbconn,"SELECT * FROM order_details WHERE user_id='$user_id' AND order_id=''") or die (mysqli_error());
                                        $row3 = mysqli_fetch_array($query);
                                        $count = mysqli_num_rows($query);
                                        $prod_id=$row3['prod_id'];
                                        $qty= $row3['prod_qty'];

                                        $query2=mysqli_query($dbconn,"SELECT * FROM product WHERE prod_id='$prod_id'") or die (mysqli_error());
                                        $row2=mysqli_fetch_array($query2);
                                        $prod_qty=$row2['prod_qty'];
                                        $prod_sku=$row2['prod_sku'];
                                        $prod_name=$row2['prod_name'];

                                        mysqli_query($dbconn,"UPDATE product SET prod_qty = prod_qty - $qty WHERE prod_id ='$prod_id' AND prod_qty='$prod_qty'");
   
                                        $cart_table = mysqli_query($dbconn,"SELECT sum(total) FROM order_details WHERE user_id='$user_id' AND order_id=''") or die(mysqli_error());
                                        $cart_count = mysqli_num_rows($cart_table);
        
                                        while ($cart_row = mysqli_fetch_array($cart_table)) 
                                        {
                                            $total = $cart_row['sum(total)'];
                                            date_default_timezone_set('Asia/Kuala_Lumpur');
                                            $order_no="LK1000AB";
                                            $or_no = $order_no.$user_id.uniqid();
                                            $shipaddress=$_POST['shipaddress'];
                                            $city=$_POST['city'];
                                            $ship_add=$shipaddress .' '. $city;  
                                            
                                            if ($city != "Sabah" AND $city != "Sarawak") {
                                                $ship = 7;
                                            }

                                            else {
                                                $ship = 10;
                                            }

                                            $paymethod=$_POST['paymethod']; 
                                            $shipprice = $total + $ship;
                                            
                                            echo '**** Order no: '.$or_no.' | ';
                                            echo 'Total: RM '.$shipprice.' | ';
                                            echo 'Status: Pending | ';
                                            echo 'Shipping Address: '.$ship_add.' ****';

                                            $query = "INSERT INTO `orders` (user_id, fullname, email, phoneno, shipping_add, order_date, `prod_status`, totalprice, shipprice, paymethod, or_no) 
                                                            VALUES ('$user_id','$fullname','$email','$phoneno','$ship_add',NOW(),'Pending','$total','$shipprice','$paymethod','$or_no')";  
                                                            
                                            $result = mysqli_query($dbconn,$query);

                                            $query1 = "SELECT order_id FROM orders";
                                            $result1 = mysqli_query($dbconn,$query1);
                                            if($result1) {
                                                while($res1 = mysqli_fetch_array($result1)) { 
                                                    $order_id = $res1['order_id'];
                                                }
                                            }

                                            mysqli_query($dbconn,"UPDATE order_details SET order_id='$order_id' WHERE user_id='$user_id' AND order_id=''")or die(mysqli_error());
                                            mysqli_query ($dbconn,"UPDATE order_details SET total_qty =$prod_qty - $qty, total=$shipprice WHERE prod_id ='$prod_id' AND total_qty='' ");           

                                            $_SESSION['order_id'] = $order_id;
                                        }    
                                        ?>
                                    
                                        <hr color="orange"> 
                                        <br><br>
                                        <h3>Kindly complete your payment within <b>24 hours</b> and send proof to us.</h3>
                                        <a href="user_payment_link.php" target="_blank" class="w3-button w3-large w3-round w3-blue w3-border link" style="text-decoration:none;">Click here to pay</a><br><br>

                                        <?php echo "<a class='btn btn-success btn-round' href=\"user_upload_payment.php?order_id=$order_id\">&#10003; &nbsp Send payment proof </a>";?>

                                        <a href="user_receipt.php"><button type="submit" id="" name="submit" class="btn btn-success btn-round">
                                        &#10003; &nbsp Receipt</button> </a>
                                </center>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

        <br><br>

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