<?php
    include("../config/dbconn.php");
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location: admin_login_page.php');
    exit();
  }
?>

<?php
    // including the database connection file
    include("../config/dbconn.php");
    if(isset($_POST['update']))
    {   
        $id = mysqli_real_escape_string($dbconn, $_POST['order_id']);
        $track_num = mysqli_real_escape_string($dbconn, $_POST['track_num']);
        $fullname = mysqli_real_escape_string($dbconn, $_POST['fullname']);
        $email = mysqli_real_escape_string($dbconn, $_POST['email']); 
        $phoneno = mysqli_real_escape_string($dbconn, $_POST['phoneno']); 
        $shipping_add = mysqli_real_escape_string($dbconn, $_POST['shipping_add']); 
        $order_date = mysqli_real_escape_string($dbconn, $_POST['order_date']);
        $prod_status = mysqli_real_escape_string($dbconn, $_POST['prod_status']); 
        $shipprice = mysqli_real_escape_string($dbconn, $_POST['shipprice']); 
        $paymethod = mysqli_real_escape_string($dbconn, $_POST['paymethod']); 
        $or_no = mysqli_real_escape_string($dbconn, $_POST['or_no']); 
        
        // checking empty fields
        if(empty($track_num) || empty($prod_status)) {    
                
            if(empty($track_num)) {
                echo "<font color='red'>Tracking number field is empty!</font><br/>";
            }

            if(empty($prod_status)) {
                echo "<font color='red'>Product status field is empty!</font><br/>";
            }   
        } 
        
        else {    
            //updating the table
            $query = "UPDATE orders SET track_num='$track_num',fullname='$fullname',email='$email',phoneno='$phoneno',shipping_add='$shipping_add',order_date='$order_date',prod_status='$prod_status',shipprice='$shipprice',paymethod='$paymethod',or_no='$or_no' WHERE order_id=$id";
            $result = mysqli_query($dbconn,$query);
            
            if($result){
                //redirecting to the display page. In our case, it is index.php
                echo "<script>alert('Status order has successfully updated.'); window.location.href='admin_panel1.php'</script>";
            }
        }
    }
?>

<?php
    //getting id from url
    $id=isset($_GET['order_id']) ? $_GET['order_id'] : die('ERROR: Record ID not found.');
    //selecting data associated with this particular id
    $result = mysqli_query($dbconn, "SELECT * FROM orders WHERE order_id=$id");

    while($res = mysqli_fetch_array($result))
    {
        $track_num = $res['track_num'];
        $fullname = $res['fullname'];
        $email = $res['email'];
        $phoneno = $res['phoneno'];
        $shipping_add = $res['shipping_add'];
        $order_date = $res['order_date'];
        $prod_status = $res['prod_status'];
        $shipprice = $res['shipprice'];
        $paymethod = $res['paymethod'];
        $or_no = $res['or_no'];
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
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/now-ui-kit.css" rel="stylesheet"> 
    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
</head>

<body class="index-page sidebar-collapse">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" data-background-color="black">
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
                        <a class="nav-link" href="admin_panel1.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                    include('../config/dbconn.php');
                                    $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE admin_id='".$_SESSION['id']."'");
                                    $row=mysqli_fetch_array($query);
                                    echo 'Admin '.$row['fullname'].'';
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
                        <a class="nav-link" href="admin_orders.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p style="font-size:10px;">Orders</p>
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

        <br><br>
            <div class="main">
                <div class="section section-basic">
                    <div class="container">
                        <h2>Orders Information</h2>
                        <a href='admin_panel1.php' class='btn btn-warning btn-round'>Back to dashboard</a>
                        <hr color="orange">
                        
                        <div class="col-md-12">
                            <div class="panel panel-success panel-size-custom">
                                    <div class="panel-body">
                                        <form action="admin_status_update.php" method="post">
                                            <div class="form group">

                                                <input type="hidden" class="form-control" id="order_id" name="order_id" value=<?php echo $_GET['order_id'];?>><br>

                                                <label for="track_num">Tracking Number:</label>
                                                <input type="text" class="form-control" id="track_num" name="track_num" value="<?php echo $track_num;?>"><br>

                                                <label for="fullname">Customer:</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fullname;?>"><br>

                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>"><br>

                                                <label for="phoneno">Phone Number: </label>
                                                <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?php echo $phoneno;?>"><br>
                                                
                                                <label for="shipping_add">Shipping Address: </label>
                                                <input type="text" class="form-control" id="shipping_add" name="shipping_add" value="<?php echo $shipping_add;?>"><br>
                                                
                                                <label for="order_date">Order Date: </label>
                                                <input type="text" class="form-control" id="order_date" name="order_date" value="<?php echo $order_date;?>"><br>
                                                
                                                <label for="prod_status">Status: </label>
                                                <input type="text" class="form-control" id="prod_status" name="prod_status" value="<?php echo $prod_status;?>"><br>

                                                <label for="shipprice">Total Price: </label>
                                                <input type="text" class="form-control" id="shipprice" name="shipprice" value="<?php echo $shipprice;?>"><br>
                                                
                                                <label for="paymethod">Payment Method: </label>
                                                <input type="text" class="form-control" id="paymethod" name="paymethod" value="<?php echo $paymethod;?>"><br>
                                                
                                                <label for="or_no">Order Number: </label>
                                                <input type="text" class="form-control" id="or_no" name="or_no" value="<?php echo $or_no;?>"><br>

                                            </div>
                        
                                            <br>
                        
                                            <div class="form group">
                                                <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                                                    <i class="now-ui-icons ui-1_check"></i> Update Order
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="footer" data-background-color="black">
                        <div class="container">
                            <nav>
                                <ul>
                                    <li>
                                        <a href="../index/index.php" target="">
                                            Limitless.Kshop
                                        </a>
                                    </li>
                                </ul>
                            </nav>

                            <div class="copyright" style="float:right;">
                                &copy;
                                <script>
                                    document.write(new Date().getFullYear())
                                </script>, Designed and Coded by Nurul Husna
                            </div>
                        </div>
                    </footer>
                </div>
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
</html>