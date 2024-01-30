<?php
    error_reporting(E_NOTICE);
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) 
    {
        header('location:admin_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Limitless.Kshop</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/now-ui-kit.css" rel="stylesheet"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 
</head>

<style>
    .btnpage {
        border: none;
        border-radius:10%;
        outline: none;
        padding: 10px 16px;
        background-color: black;
        cursor: pointer;
        color:white;
    }

    /* Style the active class (and buttons on mouse-over) */
    .btnpage.active, .btnpage:hover {
        background-color: black;
        color: red;
        border: none;
    }

    .btnpage:hover {
        background-color: grey;
        color: white;
        border: none;
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

    .btn2, .btn3 {
        border: none;
        border-radius:10%;
        background-color: blue;
        color:white;
        text-decoration:none;
        padding: 5px;
        font-size:10px;
    }

    .btn2:hover, .btn3:hover {        
        border: none;
        border-radius:10%;
        background-color: rgba(0, 0, 255, 0.8);;
        color:white;
        text-decoration:none;
        padding: 5px;
        font-size:10px;
    }

    .tblall, th, td {
        border: 1px solid lightgrey;
        border-collapse: collapse;
    }
</style>

<body class="profile-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" data-background-color="black" color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="admin_index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Nurul Husna" data-placement="bottom" target="">
                    Admin Limitless.Kshop
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
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="admin_orders.php">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Orders</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p>Logout</p>
                        </a>
                    </li> 
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="page-header page-header-small" filter-color="orange">
        <div class="page-header-image" data-parallax="true" style="background-image: url('../index/assets/images/bg.jpg');"></div>
            <div class="container">
                <div class="content-center">
                
                    <br><br> <br>
                        
                    <div class="photo-container">
                        <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE admin_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            if($row['profile_pic'] != "")
                                echo '<img src="../assets/img/'.$row['profile_pic'].'">';
                            else
                                echo '<img src="../assets/img/default-avatar.png">';
                        ?>
                    </div>
                        
                    <h2 class="title">
                        <?php
                            include('../config/dbconn.php');
                            $query=mysqli_query($dbconn,"SELECT * FROM `admin` WHERE admin_id='".$_SESSION['id']."'");
                            $row=mysqli_fetch_array($query);
                            echo ''.$row['fullname'].'';
                        ?>
                    </h2>
                        
                    <div class="button-container" style="margin-top:30px;">
                        <a href="" class="btn btn-primary btn-round btn-lg">Follow me on</a>
                        <a href="https://twitter.com/LIMITLESSKSH0P" target="_blank" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Twitter">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.instagram.com/limitless.kshop/" target="_blank" class="btn btn-default btn-round btn-lg btn-icon" rel="tooltip" title="Follow me on Instagram">
                            <i class="fa fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>  
        
        <div class="section">
            <div class="container">
                <div class="row">

                    <div class="col-md-6 ml-auto mr-auto">  
                        
                        <div class="nav-align-center">
                            <ul class="nav nav-pills nav-pills-primary" role="tablist"> 

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#admin_log" role="tablist">
                                        <i class="now-ui-icons loader_refresh"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#products" role="tablist">
                                        <i class="now-ui-icons shopping_tag-content"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#suppliers" role="tablist">
                                        <i class="now-ui-icons shopping_delivery-fast"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#user_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#admin_accounts" role="tablist">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>


                    <!-- Tab panes -->
                    <!-- START PRODUCT INFORMATION -->
                    <div class="tab-content gallery">
                        <div class="tab-pane active" id="products" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections"> 
                                    
                                    <div class="row">
                                        <div align="center">
                                            <h3>Product Information</h3>
                                        </div>
                                    </div> 
                                    
                                    <?php
                                        include('../config/dbconn.php');

                                        $action = isset($_GET['action']) ? $_GET['action'] : "";
                                        if($action=='deleted')
                                        {
                                            echo "<div class='alert alert-success'>Record was deleted.</div>";
                                        }
                                        $query = "SELECT * FROM product ORDER BY prod_name ASC limit 15,5";
                                        $result = mysqli_query($dbconn,$query);
                                    ?>   

                                    <table id="" class="table table-condensed table-striped tblall">
                                        <tr>
                                            <th class="tblall" width="100px"></th>
                                            <th>Serial</th>
                                            <th>Product Name</th>
                                            <th>Description</th>
                                            <th>Cost (RM)</th>
                                            <th>Price (RM)</th>
                                            <th>Quantity</th>
                                            <th>Category</th>
                                            <th>Supplier</th>
                                            <th>Option</th>
                                        </tr>
                                            
                                        <?php
                                            if($result)
                                            {
                                                while($res = mysqli_fetch_array($result)) 
                                                {     
                                                    echo "<tr>";
                                                        echo "<td><img height='75px' src='../uploads/" .$res['prod_pic1']."'></td>";
                                                        echo "<td>".$res['prod_sku']."</td>";
                                                        echo "<td>".$res['prod_name']."</td>";
                                                        echo "<td>".$res['prod_desc']."</td>";
                                                        echo "<td>".$res['prod_cost']."</td>";  
                                                        echo "<td>".$res['prod_price']."</td>"; 

                                                        $prod_qty=$res['prod_qty'];
                                                    
                                                        if ($prod_qty<=10)
                                                        {
                                        ?>
                                                            <td><span style="color:red;"><?php echo $res['prod_qty'];?> : Reorder!</span></td>  
                                        <?php
                                                        }
                                                        
                                                        else
                                                        {
                                        ?>
                                                            <td><?php echo $res['prod_qty'];?></td>
                                        <?php           } 

                                                        echo "<td>".$res['category']."</td>";
                                                        echo "<td>".$res['supplier']."</td>";
                                                        echo "<td width='10%'>  
                                                                <p> <a class='btn1' href=\"admin_product_add_qty.php?prod_id=$res[prod_id]\">Add</a>
                                                                    <a class='btn2' href=\"admin_product_update.php?prod_id=$res[prod_id]\">Edit</a> 
                                                                </p>
                                                                <p> <a class='btn3' href=\"admin_product_delete.php?prod_id=$res[prod_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a>
                                                                    <a class='btn4' href=\"admin_product_details.php?prod_id=$res[prod_id]\">View</a>
                                                                </p></td>";
                                                    echo "</tr>"; 
                                                }
                                            } 
                                        ?>
                                    </table>

                                    <br><br>
                                    
                                    <a class="btn btn-success btn-round" href="admin_product_add.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Product</a>
                                 
                                </div>
                                <center>
                                    <div id="myDIV">
                                        <button class="btnpage" onclick="location.href='admin_panel1.php'">1</button>
                                        <button class="btnpage" onclick="location.href='admin_panel2.php'">2</button> 
                                        <button class="btnpage" onclick="location.href='admin_panel3.php'">3</button> 
                                        <button class="btnpage active" onclick="location.href='admin_panel4.php'">4</button> 
                                        <button class="btnpage" onclick="location.href='admin_panel5.php'">5</button> 
                                        <button class="btnpage" onclick="location.href='admin_panel6.php'">6</button> 
                                        <button class="btnpage" onclick="location.href='admin_panel7.php'">7</button> 
                                    </div> 
                                </center> 
                            </div>
                        </div> 
                        <!-- END PRODUCT INFORMATION -->

                            
                        <!-- START SUPPLIER INFORMATION -->
                        <div class="tab-pane" id="suppliers" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                     
                                    <div class="row">
                                        <div align="center">
                                            <h3>Supplier Information</h3>
                                        </div>
                                    </div> 

                                    <?php
                                        include('../config/dbconn.php');

                                        $action = isset($_GET['action']) ? $_GET['action'] : "";
                                        if($action=='deleted')
                                        {
                                            echo "<div class='alert alert-success'>Record was deleted.</div>";
                                        }
                                        
                                        $query = "SELECT * FROM supplier ORDER BY supp_name ASC";
                                        $result = mysqli_query($dbconn,$query);
                                    ?>  
                                                                 
                                    <br><br>

                                    <table id="" class="table table-condensed table-striped tblall">
                                        <tr>
                                            <th>Supplier Name</th>
                                            <th>Address</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Option</th>
                                        </tr>

                                        <?php
                                            if($result)
                                            {
                                                while($res = mysqli_fetch_array($result)) 
                                                {     
                                                    echo "<tr>";
                                                        echo "<td height='35px'>".$res['supp_name']."</td>";
                                                        echo "<td height='35px'>".$res['supp_address']."</td>";
                                                        echo "<td height='35px'>".$res['supp_contact']."</td>";
                                                        echo "<td height='35px'>".$res['supp_email']."</td>";  
                                                        echo "<td width='10%'>
                                                                <a class='btn1' href=\"admin_supplier_update.php?supp_id=$res[supp_id]\">Edit</a>
                                                                <a class='btn2' href=\"admin_supplier_delete.php?supp_id=$res[supp_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                                    echo "</tr>"; 
                                                }
                                            } 
                                        ?>
                                    </table>
                                
                                    <br><br>
                                    <a class="btn btn-success btn-round" href="admin_supplier_add.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Supplier</a>
                                </div>
                            </div>
                        </div>
                        <!-- END SUPPLIER INFORMATION -->


                        <!-- START ADMIN LOGS INFORMATION -->
                        <div class="tab-pane" id="admin_log" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                        
                                    <div class="row">
                                        <div align="center">
                                            <h3>Admin Logs Information</h3>
                                        </div>
                                    </div>
                                    
                                    <?php
                                        include('../config/dbconn.php');
                                    ?>
                                      
                                    <br><br>
                                    
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>--------------------Start of Log--------------------</th>
                                            </tr>
                                        </thead>
                                            
                                        <?php
                                            $query=mysqli_query($dbconn,"SELECT * FROM logs NATURAL JOIN admin ORDER BY date DESC")or die(mysqli_error());
                                            while($row=mysqli_fetch_array($query))
                                            { 
                                        ?>
                                                <tr>
                                                    <td><?php echo $row['fullname']." ".$row['action']." last ".$row['date'];?></td>
                                                </tr>               
                                        <?php
                                            }
                                        ?>          
                                        <tfoot>
                                            <tr>
                                                <th>--------------------End of Log--------------------</th>
                                            </tr>           
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END ADMIN LOGS INFORMATION -->


                        <!-- START CUSTOMER INFORMATION -->
                        <div class="tab-pane" id="user_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>User Information</h3>
                                        </div>
                                    </div>

                                    <br>                
                                    
                                    <?php
                                        include('../config/dbconn.php');

                                        $action = isset($_GET['action']) ? $_GET['action'] : "";
                                        if($action=='deleted')
                                        {
                                            echo "<div class='alert alert-success'>Record was deleted.</div>";
                                        }
                                        $query = "SELECT * FROM users ORDER BY fullname ASC";
                                        $result = mysqli_query($dbconn,$query);
                                    ?>  
                                  

                                    <table class="table table-condensed table-striped">
                                        <tr>
                                            <th width="50px">Profile Picture</th>
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Address</th>
                                            <th>Phone Number</th>
                                            <th>Username</th>
                                            <th>Password</th>
                                        </tr>

                                        <?php
                                            if($result)
                                            {
                                                while($res = mysqli_fetch_array($result)) 
                                                {                                                     
                                                    echo "<tr>"; 
                                                
                                                        if($res['profile_pic'] != "")
                                                            echo "<td><img src='../assets/img/".$res['profile_pic']."'></td>";
                                                        else
                                                            echo '<td><img src="../assets/img/default-avatar.png"></td>';

                                                        echo "<td>".$res['fullname']."</td>";
                                                        echo "<td>".$res['email']."</td>";
                                                        echo "<td>".$res['address']."</td>";  
                                                        echo "<td>".$res['phoneno']."</td>"; 
                                                        echo "<td>".$res['username']."</td>";
                                                        echo "<td>".$res['password']."</td>";
                                                     echo "</tr>"; 
                                                }
                                            } 
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- END OF CUSTOMER INFORMATION -->


                        <!-- ADMIN INFORMATION -->
                        <div class="tab-pane" id="admin_accounts" role="tabpanel">
                            <div class="col-md-12 ml-auto mr-auto">
                                <div class="row collections">
                                    <br>
                                    <div class="row">
                                        <div align="center">
                                            <h3>Admin Information</h3>
                                        </div>
                                    </div>
                                    <br>                
                                    
                                    <?php
                                        include('../config/dbconn.php');

                                        $action = isset($_GET['action']) ? $_GET['action'] : "";
                                        if($action=='deleted')
                                        {
                                            echo "<div class='alert alert-success'>Record was deleted.</div>";
                                        }
                                        
                                        $query = "SELECT * FROM admin ORDER BY fullname ASC";
                                        $result = mysqli_query($dbconn,$query);
                                    ?>  
                                 
                                    <br><br>
                                
                                    <table class="table table-condensed table-striped">
                                        <tr>
                                            <th>Profile Picture</th>
                                            <th>Full Name</th>
                                            <th>Email</th>
                                            <th>Username</th>
                                            <th>Option</th>
                                        </tr>
                                        
                                        <?php
                                            if($result)
                                            {
                                                while($res = mysqli_fetch_array($result)) 
                                                {     
                                                    echo "<tr>";
                                                        echo "<td><img height='70px' src='../assets/img/".$res['profile_pic']."'></td>";
                                                        echo "<td>".$res['fullname']."</td>";
                                                        echo "<td>".$res['email']."</td>";
                                                        echo "<td>".$res['username']."</td>";  
                                                        //echo "<td>".$res['password']."</td>"; 
                                                        echo "<td>
                                                            <a class='btn2' href=\"admin_account_update.php?admin_id=$res[admin_id]\">Edit</a>
                                                            <a class='btn1' href=\"admin_delete_account.php?admin_id=$res[admin_id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                                                    echo "</tr>"; 
                                                }
                                            } 
                                        ?>
                                    </table>

                                    <br><br>
                                
                                    <a class="btn btn-success btn-round" href="admin_signup.php"><i class="now-ui-icons ui-1_simple-add"></i> Add Admin Account</a>
                                </div>
                            </div>
                        </div>
                        <!-- END OF ADMIN INFORMATION -->
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