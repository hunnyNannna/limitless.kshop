<?php
    session_start();
    include('../config/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Limitless.Kshop</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" /> 

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
</head>

<style>

    .btn {
        border: none;
        outline: none;
        padding: 10px 16px;
        background-color: black;
        cursor: pointer;
        color:white;
    }

    /* Style the active class (and buttons on mouse-over) */
    .btn.active, .btn:hover {
        background-color: black;
        color: red;
    }

    .btn:hover {
        background-color: grey;
        color: white;
    }
</style>

<body class="index-page sidebar-collapse">
    <div class="wrapper"><br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                    <h2>All Boy Group List</h2>
                    <a class="btn btn-primary btn-round" href="user_products.php"><i class="now-ui-icons arrows-1_minimal-left"></i> &nbsp Back to product</a>
                    <hr color="orange"> 
                        
                    <br>
                    <div class="col-md-12">
                    
                        <br>
            
                        <div class="panel panel-success panel-size-custom">
                            <div class="panel-body">

                                <?php
                                    include('../config/dbconn.php');

                                    $action = isset($_GET['action']) ? $_GET['action'] : "";
                                    if($action=='deleted') 
                                    {
                                        echo "<div class='alert alert-success'>Record was deleted.</div>";
                                    }
                                    
                                    $query = "SELECT * FROM product WHERE category='Boygroup Album' limit 0,3";
                                    $result = mysqli_query($dbconn,$query);
                                ?>  
                                    
                                <br>
                                <br>
                                
                                <table id="" class="table table-condensed table-striped">
                                    <tr>
                                        <th width='100px' height='85px'></th>
                                        <th>Serial</th>
                                        <th>Product Name</th>
                                        <th>Description</th>
                                        <th>Price (RM)</th>
                                        <th>Stock</th>
                                        <th>Category</th>
                                        <th>Option</th>
                                    </tr>
                                    
                                    <?php
                                        if($result) 
                                        {
                                            while($res = mysqli_fetch_array($result)) 
                                            {     
                                                echo "<tr>";
                                                echo "<td><img src='../uploads/" .$res['prod_pic1']."'></td>";
                                                echo "<td>".$res['prod_sku']."</td>";
                                                echo "<td style='text-align:left;'>".$res['prod_name']."</td>";
                                                echo "<td style='text-align:left;'>".$res['prod_desc']."</td>";  
                                                echo "<td>".$res['prod_price']."</td>"; 
                                                echo "<td>".$res['prod_qty']."</td>";
                                                echo "<td>".$res['category']."</td>";
                                                echo "<td><a href=\"user_product_details.php?prod_id=$res[prod_id]\">View</a></td>";
                                                echo "</tr>"; 
                                            }
                                        }
                                    ?>
                                </table>
                    
                                <br><br><br>
                                <center>
                                        <div id="myDIV">
                                            <button class="btn active" onclick="location.href='prod_boy1.php'">1</button>
                                            <button class="btn" onclick="location.href='prod_boy2.php'">2</button> 
                                            <button class="btn" onclick="location.href='prod_boy3.php'">3</button> 
                                            <button class="btn" onclick="location.href='prod_boy4.php'">4</button> 
                                        </div> 
                                </center>    
                            </div>
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
                    </script>, Designed and Coded Nurul Husna.
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

    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
        btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
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