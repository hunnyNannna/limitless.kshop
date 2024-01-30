<?php
include('config/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

<style> 

.sidenav {
  width: 130px;
  position: fixed;
  z-index: 1;
  top: 20px;
  left: 10px;
  background: #eee;
  overflow-x: hidden;
  padding: 8px 0;
}

.sidenav a {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  font-size: 25px;
  color: #2196F3;
  display: block;
}

.sidenav a:hover {
  color: #064579;
  text-decoration:none;
}
 
@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.hero-section{
    margin-top: 46px !important;
    background-image: url("https://source.unsplash.com/L1jYYtjgIic");
    background-repeat: no-repeat;
    box-sizing: border-box;
}
.hero-section-main{
    background-color: rgba(22, 22, 22, 0.7);
    display: flex;
    justify-content: center;    
}
.hero-section-into-text{
    padding: 40px ;
    width: 90%;;
    margin-bottom: 30px;
    border:2px solid white !important;
    border-radius:30px !important;    
}
.hero-section-into-text h1{
    font-size: 60px !important;
    letter-spacing: 2px;
    font-weight: 800;
    font-family: sans-serif;    
}
.hero-section-into-text p{
    width: 40%;
    letter-spacing: 1px;
}
.section-text-header{
    margin: 80px 0px!important;
    border-left:6px solid black;
    padding-left:50px !important;   
    text-transform: uppercase;
    font-weight: 600;    
}
.product-left-side{
    width:600px;
    height: 700px;
    margin-right: 20px;
}
.product-left-side img{
    height: 100%;
    width: 100%;
    object-fit: cover
}
.product-right-side{
    width:400px;
    display: grid;
    grid-template-rows: 1fr 1fr;
    grid-row-gap: 10px;    
}
.icons{
    font-size: 16px; 
    padding: 3px;
}
.product-right-side-1{    
    width:400px;
    height:340px;
}
.product-right-side-1 img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    overflow:hidden;
}
.product-right-side-2{
    height:337px;
    width:400px;
    margin-top: 8px;
    overflow:hidden ;
}
.product-right-side-2 img{
    width: 100%;
    height: 100%;
    object-fit: cover;
    overflow:hidden ;
} 

.products{
    width: 90%;
    margin: auto;
    overflow-x: hidden;
}
.product-list{
    width:80% !important;
    margin:auto;
    overflow:hidden ;   
}
.new-arrived-products{
    display: flex !important;
    flex-wrap: wrap;
    justify-content: center;
    gap:30px;
    grid-row-gap: 60px;
    width:80%;
    margin: auto;
    overflow:hidden ;
}
.new-product {
    height: 30px;
    color:gray;
}   
     
/*medium screens - Laptops*/

@media screen and (max-width: 1024px) {
    .hero-section{
        background-image: url("https://source.unsplash.com/L1jYYtjgIic/1050x500");
        background-repeat: no-repeat;
    }
    .products{
        width: 90% !important;
    }
    .feedback{
        width:90%;
        margin: auto;    
    }
    .contact{
        width:90% !important;            
    }
}

@media screen and (min-width: 1200px) {
    .new-arrived-products{
        width:80% !important;
    }
    .feedback{
        width:70%;
        margin: auto;    
    }
    .products{
        width: 70%;
        margin: auto;
    }
    .product-list{
       display: flex;
       justify-content: space-between;
    }
    .hero-section-main{
        display: flex;
        justify-content: center;
        height: 600px;
    }
   .hero-section{
    background-image: url("https://source.unsplash.com/L1jYYtjgIic");
    background-repeat: no-repeat;
    background-size: cover;
    margin: auto;
    height: 600px;
    }
    .contact{
        width:70%;
    }
    .hero-qoute{
        font-size: 17px !important;
        
    }
} 

input[type=text] {
  width: 150px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-color: white;
  background-image: url('./assets/img/search.png');
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
  width: 90%;
}

#myImg {
    display:block;
}

#myImg:hover {opacity: 0.5;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  padding-top: 100px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}


.contact { 
        width:100%;
        margin: auto;
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap; 
        color:black;   
    }      

    .follow:hover {
        color:cadetblue;
        text-decoration:none;
    }
</style>
    
<?php
include('config/dbconn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="./assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="./assets/img/logo.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Limitless.Kshop</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    
    <!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    
    <!--     inserted     -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
    <link href="assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    
    <link href="assets/style.css" rel="stylesheet"/>
    <!--     inserted     -->

</head>

<body class="index-page sidebar-collapse w3-content" style="max-width:1200px">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top" >
        <div class="container">
            <div class="navbar-translate">
                <a href="../website/limitless.kshop web/page/home.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Nurul Husna, Inc." data-placement="bottom" target="">
                    Limitless.kshop
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="./assets/img/logo.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="pages/user_login_page.php" class="nav-link" href="javascript:void(0)" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>Login</p>
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="search_index.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Search</p>
                        </a>
                    </li>
					
                    <li class="nav-item">
                        <a class="nav-link" href="products.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Products</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Cart</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#Contact">
                            <i class="now-ui-icons tech_mobile"></i>
                            <p>Contact</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
 

    <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:250px" id="mySidebar">
        <div class="w3-container w3-display-container w3-padding-16">
        
            <br><br><br>
    
            <h5><b>Limitless.Kshop</b></h5>
        </div>

        <br>

        <div class="w3-large w3-text-grey" style="font-weight:bold;">
        <a onclick="myAccFunc()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn" style="text-decoration:none;">Non-Official Merch <i class="fa fa-caret-down"></i></a>
                <div id="demoAcc" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="./pages/prod_nonOfficial.php" class="w3-bar-item w3-button" style="text-decoration:none;">Keychain</a> 
                    <a href="./pages/prod_nonOfficial.php" class="w3-bar-item w3-button" style="text-decoration:none;">Photocard Binder</a>
                    <a href="./pages/prod_nonOfficial.php" class="w3-bar-item w3-button" style="text-decoration:none;">Unofficial Photocard</a>
                </div>
            <a href="./pages/prod_lightstick.php" class="w3-bar-item w3-button" style="text-decoration:none;">Lightstick</a>
            <a onclick="myAccFunc1()" href="javascript:void(0)" class="w3-button w3-block w3-white w3-left-align" id="myBtn1" style="text-decoration:none;">Albums <i class="fa fa-caret-down"></i></a>
                <div id="demoAcc1" class="w3-bar-block w3-hide w3-padding-large w3-medium">
                    <a href="./pages/prod_solo1.php" class="w3-bar-item w3-button" style="text-decoration:none;">Solo</a> 
                    <a href="./pages/prod_boy1.php" class="w3-bar-item w3-button" style="text-decoration:none;">Boy Group</a>
                    <a href="./pages/prod_girl1.php" class="w3-bar-item w3-button" style="text-decoration:none;">Girl Group</a>
                </div>
            <a href="./pages/prod_sweatshirt.php" class="w3-bar-item w3-button" style="text-decoration:none;">Sweatshirts</a>
            <a href="./pages/prod_cap.php" class="w3-bar-item w3-button" style="text-decoration:none;">Cap</a>
            <a href="./pages/prod_plushie.php" class="w3-bar-item w3-button" style="text-decoration:none;">Plushie</a>
            <a href="./pages/prod_seasongreeting.php" class="w3-bar-item w3-button" style="text-decoration:none;">Season Greetings</a><br><br>
        </div>
    </nav> 

    <br><br>
    
    <section>
        <div class="products" id="gallery" style="margin-right:50px;">
            <div class="w3-container ">
                <h2 class="section-text-header">Find out what options <br> you have</h2>
            </div>

            <div class="w3-row product-list"  >
                <div class="w3-col m9 l6 product-left-side w3-animate-left">
                    <p style="position: absolute;padding: 18px;">Ligthstick</p>
                    <a href="./pages/prod_lightstick.php"><img id="myImg" src="./uploads/lightstick2-2.jpg"></a>
                </div>
                
                <div class="w3-col m9 l5 product-right-side w3-animate-left" >
                    <div class="product-right-side-1">
                        <p style="position: absolute;padding: 30px;">Fashion's Styles</p>
                        <a href="./pages/prod_sweatshirt.php"><img id="myImg" src="./uploads/sweatshirt2-1-4.jfif" style="width:300px; height:auto;"></a>
                    </div>
                
                    <div class="product-right-side-2 w3-animate-left">
                        <p style="position: absolute; padding: 50px;">Music's Styles</p><br><br>
                        <a href="./pages/prod_solo1.php"><img id="myImg" src="./uploads/solo2-1.png" style="width:300px; height:auto"></a>
                    </div>
                </div> 
            </div>        
            
            <div class="w3-container ">
                <h2 class="section-text-header">Get our newly arrived <br> products</h2>
            </div>

            <div class="tab-pane  active" id="">
                <ul class="thumbnails">
                
                <?php
                    $query = "SELECT * FROM product ORDER BY prod_name ASC";
                    $result = mysqli_query($dbconn,$query);
                    while($res = mysqli_fetch_array($result)) 
                    {  
                        $prod_id=$res['prod_id']; 
                ?>   
                        <div class="row-sm-3">
                            <div class="thumbnail">
                                <?php if($res['prod_pic1'] != ""): ?>
                                <img src="uploads/<?php echo $res['prod_pic1']; ?>" width="auto" height="200px">
                                <?php else: ?>
                                <img src="uploads/default.png" width="auto" height="200px">
                                <?php endif; ?>
                                <div class="caption">
                                    <h5><b><?php echo $res['prod_name'];?></b></h5>
                                    <h6><a class="btn btn-success btn-round" title="Click for more details!" href="pages/product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">RM <?php echo $res['prod_price']; ?></medium></h6>
                                </div>

                            </div>
                            <hr color="orange">
                        </div>
            <?php   } ?> 
                </ul>
            </div>

            <div class="new-arrived-products" id="new-arrivals">
                <div class="new-product " style="margin-right:0px;">
                    <div class="new-arrived-image"></div>
                </div>

                <!-- CONTACT -->
                <br><br><hr>
                <div class="container" id="Contact">
                    <div class="contact">
                        <div>
                            <h3 style="font-weight: 800;" >GET IN TOUCH</h3> 
                            <h4 style="font-weight: 600;">Your styles at low cost</h4>
                            <p>We care about our customers<br>you can contact us for any feedback</p>
                            <p>Delivery only on Monday-Friday</p>
                            <p>Have a question? Check our <a href="https://www.subkshop.com/pages/faq" class="follow"><u>FAQ</u></a></p>
                            <h4 style="font-weight: 600;">Follow Us </h4>
            
                            <a class="follow" href="https://twitter.com/LIMITLESSKSH0P" target="_blank">
                                    <i class="fa fa-twitter fa-2x"></i> Twitter
                            </a> 
                            
                            <br><br>
                    
                            <a class="follow" href="https://www.instagram.com/limitless.kshop/" target="_blank">
                                    <i class="fa fa-instagram fa-2x"></i> Instagram
                            </a>
                        </div>

                        <div>
                            <h3 style="font-weight: 600;">ABOUT</h3>
                            <a href="aboutus.php" class="follow">About Us</a><br>
                            <a href="privacypolicy.php" class="follow">Privacy Policy</a><br>
                            <a href="returnpolicy.php" class="follow">Return Policy</a><br>
                            <a href="https://www.subkshop.com/pages/faq" class="follow">FAQ</a><br>
                            
                            <br>
                    
                            <div>
                            <h4 style="font-weight: 600;">CONTACT INFO</h4>
                            <p> <i class="fa fa-phone " style="margin-right: 8px;font-size: 20px;"></i> 019-4929109 - Mira</p>
                            <p><i class="fa fa-phone" style="margin-right: 8px;font-size: 20px;"></i>013-5015371 - Nooraini</p>
                            <label><i class="fa fa-envelope " style=" margin-right: 5px;font-size: 20px;"></i></label>
                            <input placeholder="Email" class="w3-margin-top" type="email"/>
                    
                            <br><br>

                            <button style="margin-left: 30px;">Subscribe</button>
                        </div>        
                    </div>
                </div>
            
                <br><br>

                <div class="copyright" style="float:right;">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Nurul Husna
                </div>
            </div>
        </div>
    </section>
<br>

<!--   Core JS Files   -->
<script src="./assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="./assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="./assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="./assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="./assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
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

    // Click on the "Jeans" link on page load to open the accordion for demo purposes
document.getElementById("myBtn1").click();

// Accordion 
function myAccFunc1() {
  var x = document.getElementById("demoAcc1");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

document.getElementById("myBtn").click();

// Accordion 
function myAccFunc() {
  var x = document.getElementById("demoAcc");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else {
    x.className = x.className.replace(" w3-show", "");
  }
}

// Open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}
 
function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}
</script>

</body>
</html>