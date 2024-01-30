<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:admin_login_page.php');
        exit();
    }
?>

<?php
    // including the database connection file
    include("../config/dbconn.php");
    if(isset($_POST['update']))
    {   
        $id = mysqli_real_escape_string($dbconn, $_POST['prod_id']);
        $prod_name = mysqli_real_escape_string($dbconn, $_POST['prod_name']);
        $prod_desc = mysqli_real_escape_string($dbconn, $_POST['prod_desc']);
        $prod_qty = mysqli_real_escape_string($dbconn, $_POST['prod_qty']);
        $prod_cost = mysqli_real_escape_string($dbconn, $_POST['prod_cost']); 
        $prod_price = mysqli_real_escape_string($dbconn, $_POST['prod_price']); 
        $category = mysqli_real_escape_string($dbconn, $_POST['category']); 
        $supplier = mysqli_real_escape_string($dbconn, $_POST['supplier']);
        $prod_sku = mysqli_real_escape_string($dbconn, $_POST['prod_sku']);

        // checking empty fields
        if(empty($prod_name) || empty($prod_desc) || empty($prod_cost) || empty($prod_price) || empty($supplier) || empty($category) || empty($prod_sku)) {    
                
            if(empty($prod_name)) {
                echo "<font color='red'>Product name field is empty!</font><br/>";
            }
            
            if(empty($prod_desc)) {
                echo "<font color='red'>Product description field is empty!</font><br/>";
            }

            if(empty($prod_cost)) {
                echo "<font color='red'>Product cost field is empty!</font><br/>";
            }
            
            if(empty($prod_price)) {
                echo "<font color='red'>Product price field is empty!</font><br/>";
            }    

            if(empty($supplier)) {
                echo "<font color='red'>Supplier field is empty!</font><br/>";
            }  

            if(empty($category)) {
                echo "<font color='red'>Category field is empty!</font><br/>";
            }  

            if(empty($prod_sku)) {
                echo "<font color='red'>Serial number field is empty!</font><br/>";
            } 
        } 
        
        else {    

            //updating the table
            $query = "UPDATE product SET prod_name='$prod_name',prod_desc='$prod_desc',prod_cost='$prod_cost',prod_price='$prod_price',
                    supplier='$supplier',category='$category',prod_sku='$prod_sku' WHERE prod_id=$id";
            $result = mysqli_query($dbconn,$query);
            
            if($result) {
                //redirecting to the display page. In our case, it is index.php
            header("Location: admin_panel1.php");
            }
        }
    }
?>

<?php
    //getting id from url
    $id=isset($_GET['prod_id']) ? $_GET['prod_id'] : die('ERROR: Record ID not found.');

    //selecting data associated with this particular id
    $result = mysqli_query($dbconn, "SELECT * FROM product WHERE prod_id=$id");
    
    while($res = mysqli_fetch_array($result))
    {
        $prod_name = $res['prod_name'];
        $prod_desc = $res['prod_desc'];
        $prod_qty = $res['prod_qty'];
        $prod_cost = $res['prod_cost'];
        $prod_price = $res['prod_price'];
        $category = $res['category'];
        $supplier = $res['supplier'];
        $prod_sku = $res['prod_sku'];
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
        <div class="main">
            <div class="section section-basic">
                <div class="container"> 
                    <br><br>
                    
                    <h2>Purchased Product Information</h2>
                    <hr color="orange">
                    <a href='admin_panel1.php' class='btn btn-warning btn-round'>Back to Index</a>
                
                    <br><br><br>
                
                    <div class="col-md-12">

                        <div class="panel panel-success panel-size-custom">
                            <div class="panel-heading"><h3>Update Product</h3></div>
                                <div class="panel-body">
                                    <form action="admin_product_update.php" method="post">
                                        <div class="form group">
                                            <input type="hidden" class="form-control" id="prod_id" name="prod_id" value=<?php echo $_GET['prod_id'];?>>
                                            <label for="prod_sku">Serial number:</label>
                                            <input type="text" class="form-control" id="prod_sku" name="prod_sku" value="<?php echo $prod_sku;?>" required>
                                            <label for="prod_name">Product Name:</label>
                                            <input type="text" class="form-control" id="prod_name" name="prod_name" value="<?php echo $prod_name;?>" required>
                                            <label for="prod_desc">Product Description:</label>
                                            <input type="text" class="form-control" id="prod_desc" name="prod_desc" value="<?php echo $prod_desc;?>" required>
                                            <label for="prod_cost">Product Cost (RM):</label>
                                            <input type="text" class="form-control" id="prod_cost" name="prod_cost" value="<?php echo $prod_cost;?>" required>
                                            <label for="prod_price">Product Price (RM):</label>
                                            <input type="text" class="form-control" id="prod_price" name="prod_price" value="<?php echo $prod_price;?>" required>
            
                                            <div class="form-group">
                                                <label for="supp_name">Supplier:</label>
                                                
                                                <div class="input-group">
                                                    <select class="form-control" id="supplier" name="supplier" required>
                                                        <?php
                                                            include('../config/dbconn.php');
                                                            $query=mysqli_query($dbconn,"SELECT supp_name FROM supplier ORDER BY supp_name ASC")or die(mysqli_error());
                                                            
                                                            while($row=mysqli_fetch_array($query)) {
                                                        ?>

                                                                <option value="<?php echo $row['supp_name'];?>"><?php echo $row['supp_name'];?></option>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </select>
                                                </div>

                                                <label for="category">Category:</label>

                                                <div class="input-group">
                                                    <select class="form-control" id="category" name="category" required>
                                                        <?php
                                                            include('../config/dbconn.php');
                                                            $query=mysqli_query($dbconn,"SELECT DISTINCT category FROM product ORDER BY category ASC")or die(mysqli_error());
                                                            while($row=mysqli_fetch_array($query)) {
                                                        ?>
                                                                <option value="<?php echo $row['category'];?>"><?php echo $row['category'];?></option>
                                                        <?php 
                                                            }
                                                        ?>
                                                    </select>
                                                </div>

                                                <label for="prod_qty">Available Quantity: &nbsp &nbsp </label>
                                                <input type="text" class="form-control" id="prod_qty" name="prod_qty" value="<?php echo $prod_qty;?> Pcs." required>
                                            </div>
                                        </div>     
    
                                        <br>

                                        <div class="form group">
                                            <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                                                <i class="now-ui-icons ui-1_check"></i> Update Product
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