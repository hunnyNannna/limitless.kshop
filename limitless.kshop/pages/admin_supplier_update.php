<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location:../index.php');
    exit();
  }
?>

<?php
    // including the database connection file
    include("../config/dbconn.php");
    if(isset($_POST['update']))
    {   
        $supp_id = mysqli_real_escape_string($dbconn, $_POST['supp_id']);
        $supp_name = mysqli_real_escape_string($dbconn, $_POST['supp_name']);
        $supp_address = mysqli_real_escape_string($dbconn, $_POST['supp_address']);
        $supp_contact = mysqli_real_escape_string($dbconn, $_POST['supp_contact']);
        $supp_email = mysqli_real_escape_string($dbconn, $_POST['supp_email']); 

        // checking empty fields
        if(empty($supp_name) || empty($supp_address) || empty($supp_contact) || empty($supp_email)) {    
                
            if(empty($supp_name)) {
                echo "<font color='red'>Supplier name field is empty!</font><br/>";
            }
            
            if(empty($supp_address)) {
                echo "<font color='red'>Address field is empty!</font><br/>";
            }

            if(empty($supp_contact)) {
                echo "<font color='red'>Contact field is empty!</font><br/>";
            }
            
            if(empty($supp_email)) {
                echo "<font color='red'>Email field is empty!</font><br/>";
            }    
        
        } 
        
        else {    

            //updating the table
            $query = "UPDATE supplier SET supp_name='$supp_name',supp_address='$supp_address',supp_contact='$supp_contact',supp_email='$supp_email' WHERE supp_id=$supp_id";
            $result = mysqli_query($dbconn,$query);
            
            if($result) {
                //redirecting to the display page. In our case, it is index.php
                echo "<script>alert('Supplier details has successfully updated.'); window.location.href='admin_panel1.php'</script>";
            }
        }
    }
?>
 
<?php
    //getting id from url
    $id=isset($_GET['supp_id']) ? $_GET['supp_id'] : die('ERROR: Record ID not found.');
    //selecting data associated with this particular id
    $result = mysqli_query($dbconn, "SELECT * FROM supplier WHERE supp_id=$id");
    
    while($res = mysqli_fetch_array($result))
    {
        $supp_name = $res['supp_name'];
        $supp_address = $res['supp_address'];
        $supp_contact = $res['supp_contact'];
        $supp_email = $res['supp_email'];
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
                        <h2>Supplier Information</h2>
                        <hr color="orange">
                        <a href='admin_panel1.php' class='btn btn-warning btn-round'>Back to product information</a>
                    
                        <br><br><br>
                    
                        <div class="col-md-12">

                            <div class="panel panel-success panel-size-custom">
                                <div class="panel-heading"><h3>Update Supplier</h3></div>
                                    <div class="panel-body">
                                        <form action="admin_supplier_update.php" method="post">
                                            <div class="form group">
                                                <input type="hidden" class="form-control" id="supp_id" name="supp_id" value=<?php echo $_GET['supp_id'];?>>
                                                <label for="supp_name">Supplier name:</label>
                                                <input type="text" class="form-control" id="supp_name" name="supp_name" value="<?php echo $supp_name;?>">
                                                <label for="supp_address">Address:</label>
                                                <input type="text" class="form-control" id="supp_address" name="supp_address" value="<?php echo $supp_address;?>">
                                                <label for="supp_contact">Contact Details:</label>
                                                <input type="text" class="form-control" id="supp_contact" name="supp_contact" value="<?php echo $supp_contact;?>">
                                                <label for="supp_email">Email:</label>
                                                <input type="text" class="form-control" id="supp_email" name="supp_email" value="<?php echo $supp_email;?>">
                                            </div>          
                                        
                                            <div class="form group">
                                                <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                                                    <i class="now-ui-icons ui-1_check"></i> Update Supplier
                                                </button>
                                            </div>
                                        </form>
                                    </div>
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