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

    <div class="wrapper"><br><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                    <h2>       
                        <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            $cid=$row['user_id'];
                            echo $row['fullname'];
                        ?>'s Shopping Cart
                    </h2>

                    <a class="btn btn-main btn-round" href="user_index.php"><i class="now-ui-icons shopping_basket"></i> &nbsp Shop more items</a>
                    
                    <hr color="orange"> 
                
                    <div class="col-md-12">
                
                    <br>
            
                
                    <div class="panel panel-success panel-size-custom">
                        <div class="panel-body">
                            <?php 
                                $user_id = $_SESSION['id'];

                                $query3=mysqli_query($dbconn,"SELECT * FROM order_details WHERE user_id='$user_id' AND order_id=''") or die (mysql_error());
                                $count2=mysqli_num_rows($query3);                 


                                if (isset($_POST['submit'])) {

                                    $order_id=$_GET['order_id'];
                                    $prod_qty = $_POST['prod_qty'];
                                    $total = $_POST['prod_qty']*$_POST['total'];

                                    date_default_timezone_set('Asia/Manila');
                                    $date = date("Y-m-d H:i:s");      

                                    mysqli_query($dbconn,"UPDATE order_details SET prod_qty='$prod_qty',total='$total' WHERE order_details_id='$order_id'") or die(mysqli_error());
                            ?>

                                    <script type="text/javascript">
                                        alert("Quantity Updated");
                                        window.location= "user_cart.php";
                                    </script>
                            
                            <?php
                                }
                            ?>

                            <form method="post">

                                <h5>[ <small><?php echo $count2;?> </small>] types of item.</h5>  

                                <table class="table table-bordered table-condensed">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Description</th>
                                            <th width="100">Quantity</th>
                                            <th width="100">Price(Php)</th>
                                            <th width="100">Total(Php)</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php 
                                            $user_id = $_SESSION['id'];
                                            $order_id=$_GET['order_id'];

                                            $query=mysqli_query($dbconn,"SELECT * FROM order_details WHERE order_details_id='$order_id'") or die (mysqli_error());
                                            $row=mysqli_fetch_array($query);
                                            $count=mysqli_num_rows($query);
                                            $prod_id=$row['prod_id'];
                                            $query2=mysqli_query($dbconn,"SELECT * FROM product WHERE prod_id='$prod_id'") or die (mysqli_error());
                                            $row2=mysqli_fetch_array($query2);
                                            $prod_qty=$row2['prod_qty'];

                                        ?>
                                        
                                        <tr>
                                            <td> <img width="150" height="100" src="../uploads/<?php echo $row2['prod_pic1'];?>" alt=""/></td>
                                            <td><b><?php echo $row2['prod_name'];?></b><br><br><?php $string=$row2['prod_desc'];?></td>
                                            
                                            <td>
                                                <div class="input-append">
                                                    <?php
                                                        echo "<select class='btn btn-warning btn-round dropdown-toggle' size='1' name='prod_qty' id='prod_qty'>";
                                                        $i=1; $prod_qty=$prod_qty;
                                                        while ($i <= $prod_qty ) {
                                                            echo "<option value=".$i.">".$i."</option>";
                                                            $i++;
                                                        }
                                                        
                                                        echo "</select>";
                                                    ?>
                                                </div>
                                            </td>
                                            
                                            <td><?php  echo $row2['prod_price']; ?></td>
                                            <td><?php echo $row['total']; ?></td>
                                            
                                            <input type="hidden" name="total" value="<?php echo $row2['prod_price'];?>">
                                            
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <div class="floatright">
                                    <a href="user_cart.php" class="btn btn-cancel btn-round"><i class="icon-arrow-left"></i> Cancel </a>
                                    <button type="submit" name="submit" class="btn btn-main btn-round">Update</button> 
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