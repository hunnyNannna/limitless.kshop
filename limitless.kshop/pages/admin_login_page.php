<?php
    session_start();
    include('../config/dbconn.php');
    
    if (isset($_SESSION['id']))
    {
        header('Location:admin_panel1.php');
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

<body class="login-page sidebar-collapse">
    
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="../index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Nurul Husna" data-placement="bottom">
                    Limitless.Kshop
                </a>

                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                </button>
            </div>
            
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com/LIMITLESSKSH0P" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com/limitless.kshop/" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="page-header" filter-color="orange">
        <div class="page-header-image" style="background-image:url(../assets/img/backg.jpg)"></div>
            <div class="container">
                <div class="col-md-4 content-center">
                    <div class="card card-login card-plain">
                        <form class="form" method="POST" action="admin_login.php">
                            <div style="font-size:25px;">
                                <b>Administrator Login</b>
                            </div>
                            
                            <br>

                            <div class="content">
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons users_circle-08"></i>
                                    </span>
                                    
                                    <input type="text" name="username" class="form-control" placeholder="Username">
                                </div>
                                
                                <div class="input-group form-group-no-border input-lg">
                                    <span class="input-group-addon">
                                        <i class="now-ui-icons ui-1_lock-circle-open"></i>
                                    </span>
                                    
                                    <input type="password" name="password" placeholder="Password" class="form-control" />
                                </div>
                            </div>
                        
                            <div class="footer">
                                <button type="submit" class="bbtn btn-primary btn-round btn-lg btn-block" name="submit">Login</button>
                            </div>
                        
                            <div class="pull-left">
                                <h6><a href="user_login_page.php" class="link">Customer Login</a></h6> 
                            </div>
                        </form>
                    
                        <br>
                    
                        <?php
                            if (isset($_SESSION['msg']))
                            {
                                echo $_SESSION['msg'];
                                unset($_SESSION['msg']);
                            }
                        ?>
                    </div>
                </div>
            </div>
            
            <footer class="footer">
                <div class="container">
                    <div class="copyright">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>,</a> Designed and Coded by Nurul Husna
                    </div>
                </div>
            </footer>
        </div>
    </div>

  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="../index/vendor/jquery/jquery.min.js"></script>
  <script src="../index/vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="../index/assets/js/isotope.min.js"></script>
  <script src="../index/assets/js/owl-carousel.js"></script>

  <script src="../index/assets/js/tabs.js"></script>
  <script src="../index/assets/js/popup.js"></script>
  <script src="../index/assets/js/custom.js"></script>

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
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>

    <!-- Le javascript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/google-code-prettify/prettify.js"></script>
    <script src="../assets/js/application.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    <script src="../assets/js/bootstrap-affix.js"></script>
    <script src="../assets/js/jquery.lightbox-0.5.js"></script>
    <script src="../assets/js/bootsshoptgl.js"></script>
    <script type="text/javascript">
        $(function() {
            $('#gallery a').lightBox();
        });
    </script>

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