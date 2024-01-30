<?php
    session_start();
    include('../config/dbconn.php');

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
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

<style>

/* -------------------------------------
    GLOBAL
    A very basic CSS reset
------------------------------------- */
 

img {
    max-width: 100%;
}

body {
    -webkit-font-smoothing: antialiased;
    -webkit-text-size-adjust: none;
    width: 100% !important;
    height: 100%;
    line-height: 1.6;
}

/* Let's make sure all tables have defaults */
table td {
    vertical-align: top;
}

/* -------------------------------------
    BODY & CONTAINER
------------------------------------- */
body {
    background-color: #f6f6f6;
}

.body-wrap {
    background-color: #f6f6f6;
    width: 100%;
}

.container1 {
    display: block !important;
    max-width: 600px !important;
    margin: 0 auto !important;
    /* makes it centered */
    clear: both !important;
}

.content {
    max-width: 600px;
    margin: 0 auto;
    display: block;
    padding: 20px;
}

/* -------------------------------------
    HEADER, FOOTER, MAIN
------------------------------------- */
.main {
    background: #fff;
    border: 1px solid #e9e9e9;
    border-radius: 3px;
}

.content-wrap {
    padding: 0px 20px;
}

.content-block {
    padding: 0 0 0 10px;
}

.header {
    width: 100%;
    margin-bottom: 20px;
}

.footer1 {
    width: 100%;
    clear: both;
    color: #999; 
}
.footer1 a {
    color: #999;
}
.footer1 p, .footer1 a, .footer1 unsubscribe, .footer1 td {
    font-size: 12px;
}

/* -------------------------------------
    TYPOGRAPHY
------------------------------------- */
h1, h2, h3 {
    font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
    color: #000;
    margin: 40px 0 0;
    line-height: 1.2;
    font-weight: 400;
}

h1 {
    font-size: 32px;
    font-weight: 500;
}

h2 {
    font-size: 24px;
}

h3 {
    font-size: 18px;
}

h4 {
    font-size: 14px;
    font-weight: 600;
}

p, ul1, ol {
    margin-bottom: 10px;
    font-weight: normal;
}
p li, ul1 li, ol li {
    margin-left: 5px;
    list-style-position: inside;
}

/* -------------------------------------
    LINKS & BUTTONS
------------------------------------- */
a {
    color: #1ab394;
    text-decoration: underline;
}

.btn-primary {
    text-decoration: none;
    color: #FFF;
    background-color: #1ab394;
    border: solid #1ab394;
    border-width: 5px 10px;
    line-height: 2;
    font-weight: bold;
    text-align: center;
    cursor: pointer;
    display: inline-block;
    border-radius: 5px;
    text-transform: capitalize;
}

/* -------------------------------------
    OTHER STYLES THAT MIGHT BE USEFUL
------------------------------------- */
.last {
    margin-bottom: 0;
}

.first {
    margin-top: 0;
}

.aligncenter {
    text-align: center;
}

.alignright {
    text-align: right;
}

.alignleft {
    text-align: left;
}

.clear {
    clear: both;
}

/* -------------------------------------
    ALERTS
    Change the class depending on warning email, good email or bad email
------------------------------------- */
.alert {
    font-size: 16px;
    color: #fff;
    font-weight: 500;
    padding: 20px;
    text-align: center;
    border-radius: 3px 3px 0 0;
}
.alert a {
    color: #fff;
    text-decoration: none;
    font-weight: 500;
    font-size: 16px;
}
.alert.alert-warning {
    background: #f8ac59;
}
.alert.alert-bad {
    background: #ed5565;
}
.alert.alert-good {
    background: #1ab394;
}

/* -------------------------------------
    INVOICE
    Styles for the billing table
------------------------------------- */
.invoice {
    margin: 40px auto;
    text-align: left;
    width: 80%;
}
.invoice td {
    padding: 5px 0;
}
.invoice .invoice-items {
    width: 100%;
}
.invoice .invoice-items td {
    border-top: #eee 1px solid;
}
.invoice .invoice-items .total td {
    border-top: 2px solid #333;
    border-bottom: 2px solid #333;
    font-weight: 700;
}

/* -------------------------------------
    RESPONSIVE AND MOBILE FRIENDLY STYLES
------------------------------------- */
@media only screen and (max-width: 640px) {
    h1, h2, h3, h4 {
        font-weight: 600 !important;
        margin: 20px 0 5px !important;
    }

    h1 {
        font-size: 22px !important;
    }

    h2 {
        font-size: 18px !important;
    }

    h3 {
        font-size: 16px !important;
    }

    .container1 {
        width: 100% !important;
    }
 

    .invoice {
        width: 100% !important;
    }
}
</style>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg  fixed-top" data-background-color="black">
        <div class="container">
            <div class="navbar-translate">
                <a href="user_index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Nurul Husna" data-placement="bottom" target="" style=" text-decoration:none;">
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
                        <a class="nav-link" href="user_option.php" onclick="scrollToDownload()" style="text-decoration:none;">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p style="font-size:10px;">
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo ''.$row['fullname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_products.php" style="text-decoration:none;">
                            <i class="now-ui-icons files_paper"></i>
                            <p style="font-size:10px;">Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()" style="text-decoration:none;">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p style="font-size:10px;">Cart</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()" style="text-decoration:none;">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p style="font-size:10px;">Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->

    <br><br><br>

    <table class="body-wrap">
        <tbody>
            <tr>

                <td></td>

                <td class="container1" width="600">
                    <div class="content">
                        <table class="main" width="100%" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr>
                                    <td class="content-wrap aligncenter">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tbody>
                                                <tr>
                                                    <td class="content-block">
                                                        <h2>Thanks for purchasing with Limitless.Kshop</h2>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="content-block">
                                                        <table class="invoice">
                                                            <tbody>
                                                                <tr>

                                                                <?php
                                                                        // retrieve user and order information from the database
                                                                        $user_id = $_SESSION['id'];
                                                                        $order_id = $_SESSION['order_id'];
                                                                        include('../config/dbconn.php');
                                                                        $order_query = mysqli_query($dbconn, "SELECT * FROM `orders` WHERE user_id='$user_id' and order_id='$order_id'");
                                                                        $order_row = mysqli_fetch_array($order_query);
                                                                        $cust_fullname = $order_row['fullname'];
                                                                        $email = $order_row['email'];
                                                                        $phoneno = $order_row['phoneno'];
                                                                        $address = $order_row['shipping_add'];
                                                                        $total = $order_row['shipprice'];
                                                                        $order_date = $order_row['order_date'];
                                                                        $order_no = $order_row['or_no']; 

                                                                        // retrieve order details from the database
                                                                        $order_details_query = mysqli_query($dbconn, "SELECT * FROM `order_details` WHERE user_id='$user_id' and order_id='$order_id'");

                                                                        // display the order information and the product names in a table
                                                                        echo "<td>" . $cust_fullname . "<br>";
                                                                        while ($order_details_row = mysqli_fetch_array($order_details_query)) {
                                                                            $prod_id = $order_details_row['prod_id'];
                                                                            $prod_query = mysqli_query($dbconn, "SELECT * FROM `product` WHERE prod_id='$prod_id'");
                                                                            $prod_row = mysqli_fetch_array($prod_query);
                                                                            $prod_name = $prod_row['prod_name'];
                                                                            echo $prod_name . "<br>";
                                                                        }
                                                                        echo "<br>" . $order_no . "<br>" . $order_date . "</td>";
                                                                    ?>
                                                                </tr>

                                                                <tr>
                                                                    <td>
                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                                            <tr class="total">
                                                                                <td class="alignright" width="80%">Total</td>
                                                                                <td class="alignright">RM <?php echo $total;?></td>
                                                                            </tr>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                            
                                                <tr>
                                                    <td class="content-block">
                                                        <h3>Delivery process time, minimum of three(3) days and maximum of five(5) working days.</h3><br>
                                                        Limitless.Kshop <br><br>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </td>
                
                <td></td>
            </tr>
        </tbody>
    </table>

    <center>
        <button type="button" class="btn btn-warning btn-round" onclick = "window.print()"><span class="now-ui-icons ui-1_check"></span> Print</button> 
        <a href="user_index.php"><button type="button" class="btn btn-success btn-round"><span class="now-ui-icons ui-1_check"></span> Back to Homepage</button></a>
    </center>

    <br><br>                    

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
</body>
</html>