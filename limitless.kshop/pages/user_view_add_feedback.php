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
                    <h2><b>|</b> Feedback</h2>
                    <hr color="orange">
                    <a href='admin_panel1.php' class='btn btn-warning btn-round'>Back to homepage</a>
                
                    <br>
                
                    <div class="col-md-12">
                        <?php
                            // including the database connection file
                            include("../config/dbconn.php");

                            if(isset($_POST['submit'])) {

                                error_reporting (E_ALL ^ E_NOTICE);
                                $feedback_desc=$_POST['feedback_desc'];

                                move_uploaded_file($_FILES["pic1"]["tmp_name"],"../uploads/" . $_FILES["pic1"]["name"]);         
                                $pic1=$_FILES["pic1"]["name"];
                                move_uploaded_file($_FILES["pic2"]["tmp_name"],"../uploads/" . $_FILES["pic2"]["name"]);         
                                $pic2=$_FILES["pic2"]["name"];
                                move_uploaded_file($_FILES["pic3"]["tmp_name"],"../uploads/" . $_FILES["pic3"]["name"]);         
                                $pic3=$_FILES["pic3"]["name"];  
                                
                                $query = "INSERT INTO feedback (feedback_desc, pic1, pic2, pic3) 
                                                   VALUES ('$feedback_desc','$pic1','$pic2','$pic3')";  

                                $result = mysqli_query($dbconn,$query);

                                if($result) {
                                    echo "<script>alert('Feedback is successfully added.'); window.location='user_index.php';</script>";
                                }
                            }
                        ?>
                        
                        <div class="panel panel-success panel-size-custom">
                            <br><br>

                                <div class="panel-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form group">
                                                
                                                <label for="prod_pic1">Picture 1 :</label>

                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="pic1" name="pic1">  
                                                </div>

                                                <label for="pic2">Picture 2:</label>

                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="pic2" name="pic2">  
                                                </div>

                                                <label for="pic3">Picture 3:</label>

                                                <div class="input-group">
                                                    <input type="file" class="form-control" id="pic3" name="pic3">  
                                                </div>

                                            <label for="feedback_desc">Feedback:</label><br>
                                            <textarea id="feeback_desc" name="feedback_desc" placeholder="Write something.." style="width:100%;height:100px"></textarea>
                                        </div>
                                        
                                        <br>

                                        <div class="form group">
                                            <button type="submit" class="btn btn-warning btn-round" id="submit" name="submit">
                                                <i class="now-ui-icons ui-1_check"></i> Add Feedback
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