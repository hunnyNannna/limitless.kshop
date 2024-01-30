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

    table, th, td {
        border:1px solid lightgrey;
        border-top:1px solid lightgrey;
    }

    .btn1, .btn4 {
        border: none;
        border-radius:10%;
        background-color: red;
        color:white;
        text-decoration:none;
        padding: 5px;
        font-size:10px;
    }

    .btn1:hover, .btn4:hover {        
        border: none;
        border-radius:10%;
        background-color: rgba(255, 0, 0, 0.8);;
        color:white;
        text-decoration:none;
        padding: 5px;
        font-size:10px;
    }
</style>

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
                        
                        <a class="nav-link" href="user_option.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                    include('../config/dbconn.php');
                                    $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                    $row=mysqli_fetch_array($query);
                                    echo $row['fullname'].'';
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

    <div class="wrapper"><br><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                    <hr color="orange"> 
                
                    <div class="col-md-12">
                
                    <br>
            
                    <div class="panel panel-success panel-size-custom">
                        <div class="panel-body">

                            <?php
                                include('../config/dbconn.php');
                                      
								$user_id=$_SESSION['id']; 

                                $query = "SELECT * FROM orders WHERE user_id='$user_id' ORDER BY order_date DESC";
                                $result = mysqli_query($dbconn,$query);
                            ?>  
                                 
                            <br><br>
                                
                            <table id="" class="table table-condensed table-striped">
                                <tr>
                                    <th width="120px">Option</th>
                                    <th>Tracking number</th>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Phone Number</th>
                                    <th>Shipping Address</th>
                                    <th>Order date</th>
                                    <th>Status</th>
                                    <th>Total price (RM)</th>
                                    <th>Order number</th>
                                    <th>Product</th>
                                </tr>
                                        
                                <?php
                                
                                    if($result) {
                                        while($res = mysqli_fetch_array($result)) {  
                                                                                        
                                            echo "<tr>";
												echo "<td hidden>".$res['user_id']."</td>"; 

                                                if ($res['prod_status'] != "Order Submitted")                                               
                                                    echo "<td><a class='btn1' href=\"user_upload_payment.php?order_id=$res[order_id]\">Upload payment</a></td>";
                                                else
                                                    echo "<td></td>";     
                                                    echo "<td>".$res['track_num']."</td>";
                                                    echo "<td>".$res['fullname']."</td>";
                                                    echo "<td>".$res['email']."</td>"; 
                                                    echo "<td>".$res['phoneno']."</td>"; 
                                                    echo "<td>".$res['shipping_add']."</td>";
                                                    echo "<td>".$res['order_date']."</td>";
                                                    echo "<td>".$res['prod_status']."</td>";   
                                                    echo "<td>".$res['shipprice']."</td>"; 
                                                    echo "<td>".$res['or_no']."</td>";   
                                                $query2="SELECT product.prod_name FROM orders JOIN order_details ON orders.order_id=order_details.order_id JOIN product ON order_details.prod_id=product.prod_id WHERE orders.user_id=".$user_id." AND orders.order_id=".$res['order_id'];
                                                $result2=mysqli_query($dbconn, $query2);   
                                                if (!$result2) {
                                                    die(mysqli_error($dbconn));
                                                }
                                                echo "<td> <ol>";
                                                while($res2 = mysqli_fetch_array($result2)) {
                                                    echo "<li>" . $res2['prod_name'] . "</li>";
                                                }
                                                echo "</ol> </td>";
                                            echo "</tr>";
                                        }
                                    }       
                                ?>
                            </table>
                            
                            <br><br>

                			<a href="https://www.tracking.my/link/pos/poslaju-tracking" target="_blank"class="btn btn-warning btn-round" style="float:right">Track Order</a>
                    
                        </div>
                    </div> 
                </div>
    </div>
            </div>
        </div>
    
        <br><br><br><br><br>
        
        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="../index/index.php" target="_blank">
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