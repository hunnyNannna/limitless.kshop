<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location: admin_login_page.php');
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
                    <h2>Purchased Product Information</h2>
                    <hr color="orange">
                    <a href='admin_panel1.php' class='btn btn-warning btn-round'>Back to product information</a>
                
                    <br>
                
                    <div class="col-md-12">
                        <?php
                            // including the database connection file
                            include("../config/dbconn.php");

                            if(isset($_POST['submit'])) {

                                error_reporting (E_ALL ^ E_NOTICE);
                                $prod_name=$_POST['prod_name'];
                                $prod_desc=$_POST['prod_desc'];
                                $prod_qty=$_POST['prod_qty'];
                                $prod_cost=$_POST['prod_cost'];
                                $prod_price=$_POST['prod_price'];
                                $category=$_POST['category'];
                                $supplier=$_POST['supplier'];
                                $prod_sku=$_POST['prod_sku']; 
                                $supp_id=$_POST['supp_id']; 

                                move_uploaded_file($_FILES["prod_pic1"]["tmp_name"],"../uploads/" . $_FILES["prod_pic1"]["name"]);         
                                $prod_pic1=$_FILES["prod_pic1"]["name"];
                                move_uploaded_file($_FILES["prod_pic2"]["tmp_name"],"../uploads/" . $_FILES["prod_pic2"]["name"]);         
                                $prod_pic2=$_FILES["prod_pic2"]["name"];
                                move_uploaded_file($_FILES["prod_pic3"]["tmp_name"],"../uploads/" . $_FILES["prod_pic3"]["name"]);         
                                $prod_pic3=$_FILES["prod_pic3"]["name"];
                                move_uploaded_file($_FILES["prod_pic4"]["tmp_name"],"../uploads/" . $_FILES["prod_pic4"]["name"]);         
                                $prod_pic4=$_FILES["prod_pic4"]["name"];
                                move_uploaded_file($_FILES["prod_pic5"]["tmp_name"],"../uploads/" . $_FILES["prod_pic5"]["name"]);         
                                $prod_pic5=$_FILES["prod_pic5"]["name"];
                                move_uploaded_file($_FILES["prod_pic6"]["tmp_name"],"../uploads/" . $_FILES["prod_pic6"]["name"]);         
                                $prod_pic6=$_FILES["prod_pic6"]["name"];
                                

                                // checking empty fields
                                if(empty($prod_name) || empty($prod_desc) || empty($prod_qty) || empty($prod_price) || empty($category) || empty($prod_sku) )                                
                                {    
                                        
                                    if(empty($prod_name)) {
                                        echo "<font color='red'>Product name field is empty!</font><br/>";
                                    }
                                    
                                    if(empty($prod_desc)) {
                                        echo "<font color='red'>Product description field is empty!</font><br/>";
                                    }

                                    if(empty($prod_qty)) {
                                        echo "<font color='red'>Quantity field is empty!</font><br/>";
                                    }   

                                    if(empty($prod_price)) {
                                        echo "<font color='red'>Product price field is empty!</font><br/>";
                                    }   

                                    if(empty($category)) {
                                        echo "<font color='red'>Category field is empty!</font><br/>";
                                    }  

                                    if(empty($prod_sku)) {
                                        echo "<font color='red'>Serial field is empty!</font><br/>";
                                    }
                                } 
                                
                                else 
                                {    

                                    $query = "INSERT INTO product (prod_name, prod_desc, prod_qty, prod_cost, prod_price, category, supplier, prod_sku, prod_pic1, prod_pic2, prod_pic3, prod_pic4, prod_pic5, prod_pic6,supp_id) 
                                                           VALUES ('$prod_name','$prod_desc','$prod_qty','$prod_cost','$prod_price','$category','$supplier','$prod_sku','$prod_pic1','$prod_pic2','$prod_pic3','$prod_pic4','$prod_pic5','$prod_pic6','$supp_id')";  

                                    $result = mysqli_query($dbconn,$query);
                                        
                                    if($result) {
                                        
                                        $prod_name = $_POST['prod_name'];
                                        $prod_qty = $_POST['prod_qty'];
                                        
                                        date_default_timezone_set('Asia/Kuala_Lumpur');

                                        $date = date("Y-m-d H:i:s");
                                        $id=$_SESSION['id'];
                                        
                                        $query=mysqli_query($dbconn,"SELECT prod_name FROM product WHERE prod_id='$prod_name'")or die(mysqli_error());
                                    
                                        $row=mysqli_fetch_array($query);
                                        $product=$row['prod_name'];
                                        $remarks="added a new product $prod_qty of $prod_name";  
                                        
                                        mysqli_query($dbconn,"INSERT INTO logs (user_id,action,date) VALUES ('$id','$remarks','$date')")or die(mysqli_error($dbconn));

                                        //redirecting to the display page.
                                        header("Location: admin_panel1.php");
                                    }
                                }
                            }
                        ?>
                        
                        <div class="panel panel-success panel-size-custom">
                            <br><br>

                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form group">
                                            <label for="prod_name">Product Name:</label>
                                            <input type="text" class="form-control" id="prod_name" name="prod_name" placeholder="Product Name"/>
                                            <label for="prod_desc">Product Description:</label>
                                            <input type="text" class="form-control" id="prod_desc" name="prod_desc" placeholder="Product Description"/>
                                            <label for="prod_cost">Product Cost (RM):</label>
                                            <input type="text" class="form-control" id="prod_cost" name="prod_cost" placeholder="Value e.g. 123.4"/>
                                            <label for="prod_price">Product Price (RM):</label>
                                            <input type="text" class="form-control" id="prod_price" name="prod_price" placeholder="Value e.g. 123.4"/>
                                            <label for="prod_qty">Quantity:</label>
                                            <input type="text" class="form-control" id="prod_qty" name="prod_qty" placeholder="Value e.g. 123"/>
                                            <label for="supp_id">Supplier ID:</label>
                                            <input type="text" class="form-control" id="supp_id" name="supp_id" placeholder="Supplier id"/>

                                            <div class="form-group">
                                                <label for="supplier">Supplier:</label>
                                                
                                                <div class="input-group">
                                                    <select class="form-control" id="supplier" name="supplier" required>
                                                        <?php
                                                            include('../config/dbconn.php');
                                                            $query=mysqli_query($dbconn,"SELECT supp_name FROM supplier ORDER BY supp_name ASC")or die(mysqli_error());
                                                            
                                                            while($row=mysqli_fetch_array($query))
                                                            {
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
                                                
                                                <label for="prod_pic1">Picture 1 (Front View):</label>

                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="prod_pic1" name="prod_pic1">  
                                                </div>

                                                <label for="prod_pic2">Picture 2 (Side View):</label>

                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="prod_pic2" name="prod_pic2">  
                                                </div>

                                                <label for="prod_pic3">Picture 3 (Specifications):</label>

                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="prod_pic3" name="prod_pic3">  
                                                </div>
                                                        
                                                <label for="prod_pic4">Picture 4:</label>
                        
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="prod_pic4" name="prod_pic4">  
                                                </div>

                                                <label for="prod_pic5">Picture 5:</label>
                                                
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="prod_pic5" name="prod_pic5">  
                                                </div>

                                                <label for="prod_pic6">Picture 6:</label>
                                                
                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="prod_pic6" name="prod_pic6">  
                                                </div>       
                                            </div>

                                            <label for="prod_serial">Serial number:</label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" id="prod_sku" name="prod_sku" placeholder="Value e.g. 1234"/>
                                            </div>
                                        </div>
                                        
                                        <br>

                                        <div class="form group">
                                            <button type="submit" class="btn btn-warning btn-round" id="submit" name="submit">
                                                <i class="now-ui-icons ui-1_check"></i> Add Product
                                            </button> 
                                        </div>
                                    </form>
                                </div>

                                <br>
                                 
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
</body>
</html>