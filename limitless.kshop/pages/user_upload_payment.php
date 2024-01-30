<?php
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
        $prod_status = mysqli_real_escape_string($dbconn, $_POST['prod_status']);
        $proof = mysqli_real_escape_string($dbconn, $_POST['proof']);
        
        // checking empty fields
        if(empty($proof)) {    
                
            if(empty($proof)) {
                echo "<font color='red'>Proof of payment field is empty!</font><br/>";
            }
        } 
        
        else {    
            //updating the table
            $query = "UPDATE orders SET prod_status='Order Submitted', proof='$proof' WHERE order_id=$id";
            $result = mysqli_query($dbconn,$query);
            
            if($result){
                //redirecting to the display page. In our case, it is index.php
                echo "<script>alert('Your payment proof has successfully uploaded.'); window.location.href='user_receipt.php'</script>";
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
        $prod_status = $res['prod_status'];
        $proof = $res['proof'];
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

.drop-container {
  position: relative;
  display: flex;
  gap: 10px;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  height: 200px;
  padding: 20px;
  border-radius: 10px;
  border: 2px dashed #555;
  color: #444;
  cursor: pointer;
  transition: background .2s ease-in-out, border .2s ease-in-out;
}

.drop-container:hover {
  background: #eee;
  border-color: #111;
}

.drop-container:hover .drop-title {
  color: #222;
}

.drop-title {
  color: #444;
  font-size: 20px;
  font-weight: bold;
  text-align: center;
  transition: color .2s ease-in-out;
}

input[type=file] {
  width: 350px;
  max-width: 100%;
  color: #444;
  padding: 5px;
  background: #fff;
  border-radius: 10px;
  border: 1px solid #555;
}

input[type=file]::file-selector-button {
  margin-right: 20px;
  border: none;
  background: #084cdf;
  padding: 10px 20px;
  border-radius: 10px;
  color: #fff;
  cursor: pointer;
  transition: background .2s ease-in-out;
}

input[type=file]::file-selector-button:hover {
  background: #0d45a5;
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

    <div class="wrapper">

        <br><br>
            <div class="main">
                <div class="section section-basic">
                    <div class="container">
                        <a href='user_index.php' class='btn btn-warning btn-round'>Back to homepage</a>
                        <hr color="orange">
                        
                        <div class="col-md-12">
                            <div class="panel panel-success panel-size-custom">
                                    <div class="panel-body">
                                        <form action="user_upload_payment.php" method="post">
                                            <div class="form group">
                                                <br>
                                                <input type="hidden" class="form-control" id="prod_status" name="prod_status">
                                                <input type="hidden" class="form-control" id="order_id" name="order_id" value=<?php echo $_GET['order_id'];?>>

                                                <label for="images" class="drop-container">
                                                <span class="drop-title">Kindly upload your payment here</span>
                                                or
                                                <input type="file" name="proof" value="<?php echo $proof;?>" required>
                                                </label>
                                                
                                            </div>
                        
                                            <br>
                        
                                            <center><div class="form group">
                                                <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                                                    Upload Payment
                                                </button>
                                            </div></center>
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