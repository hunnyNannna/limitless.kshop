<?php
include("../config/dbconn.php");
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
    header('location: user_login_page.php');
    exit();
  }
?>

<?php
    // including the database connection file
    include("../config/dbconn.php");
    if(isset($_POST['update']))
    {   
        $user_id = mysqli_real_escape_string($dbconn, $_POST['user_id']);
        $pic = mysqli_real_escape_string($dbconn, $_POST['profile_pic']);
        $fname = mysqli_real_escape_string($dbconn, $_POST['fullname']);
        $email = mysqli_real_escape_string($dbconn, $_POST['email']); 
        $address = mysqli_real_escape_string($dbconn, $_POST['address']); 
        $phoneno = mysqli_real_escape_string($dbconn, $_POST['phoneno']); 
        $uname = mysqli_real_escape_string($dbconn, $_POST['username']); 
        $pword = mysqli_real_escape_string($dbconn, $_POST['password']); 

        //updating the table
        $query = "UPDATE users SET profile_pic='$pic',fullname='$fname',email='$email',address='$address',phoneno='$phoneno',username='$uname',password='$pword' WHERE user_id=$user_id";
        $result = mysqli_query($dbconn,$query);
            
        if($result) {
            //redirecting to the display page. In our case, it is index.php
                echo "<script>alert('Profile has successfully updated.'); window.location.href='user_index.php'</script>";
        }
    }
?>

<?php
    //getting id from url
    $user_id=$_SESSION['id'];
    //selecting data associated with this particular id
    $result = mysqli_query($dbconn, "SELECT * FROM users WHERE user_id=$user_id");

    while($res = mysqli_fetch_array($result))
    {
        $user_id = $res['user_id'];
        $pic = $res['profile_pic'];
        $fname = $res['fullname'];
        $email = $res['email'];
        $address = $res['address'];
        $phoneno = $res['phoneno'];
        $uname = $res['username'];
        $pword = $res['password'];
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
.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: red;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
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
                        <h2>Account Information</h2>
                        <a href='user_index.php' class='btn btn-warning btn-round'>Back to index</a>
                        <hr color="orange">
                        
                        <div class="col-md-12">
                            <div class="panel panel-success panel-size-custom"> 
                                    <div class="panel-body">
                                        <form action="user_profile.php" method="post">
                                            <div class="form group">

                                                <input type="text" hidden class="form-control" id="user_id" name="user_id" value="<?php echo $user_id;?>"><br>

                                                <label for="profile_pic">Profile Picture:</label><br><br>
                                                <?php echo "<img height='100px' src='../assets/img/".$row['profile_pic']."'>";?><br><br>
                                                <input type="file" class="form-control" id="profile_pic" name="profile_pic" value="<?php echo $pic;?>"><br>

                                                <label for="fullname">Full Name:</label>
                                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo $fname;?>"><br>

                                                <label for="email">Email:</label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $email;?>"><br>
                                                
                                                <label for="address">Address:</label>
                                                <input type="text" class="form-control" id="address" name="address" value="<?php echo $address;?>"><br>

                                                <label for="phoneno">Phone Number:</label>
                                                <input type="text" class="form-control" id="phoneno" name="phoneno" value="<?php echo $phoneno;?>"><br>

                                                <label for="username">Username:</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $uname;?>"><br>

                                                <label for="password">Password: </label>
                                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $pword;?>">
                                            </div>
                        
                                            <br>
                        
                                            <div class="form group">
                                                <button type="submit" class="btn btn-success btn-round" id="submit" name="update">
                                                    <i class="now-ui-icons ui-1_check"></i> Update User Profile
                                                </button>
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