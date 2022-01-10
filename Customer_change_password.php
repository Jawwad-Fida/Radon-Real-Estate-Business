<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
?>


<?php

if($_SESSION['username']){
    $username = $_SESSION['username'];
}

if (isset($_POST['reset_submit'])) {
    $password = validate($_POST['new-password']);
    $password_repeat = validate($_POST['confirm-new-password']);
    # $username = "rafi";


    $password_size = strlen($password);
    //$stmt = query("SELECT username,user_email,token FROM users WHERE token='{$token}'");
    //$row = $stmt->fetch(PDO::FETCH_ASSOC);

    //Checking for errors
    if (empty($password) || empty($password_repeat)) {
        redirect("change_password.php?error=emptyFields");
        exit();
    } elseif ($password_size <= 4) {
        //check if length of password is valid
        redirect("change_password.php?error=invalid_pwd_length");
        exit();
    } elseif ($password !== $password_repeat) {
        //check if password are same
        redirect("change_password.php?error=pwd_no_match");
        exit();
    }

    //------------QUERY-------------

    $passwordHash = password_hash($password, PASSWORD_DEFAULT);

    $stmt = prepare_query("UPDATE users SET user_password=? WHERE username=?");
    $stmt->bindParam(1, $passwordHash, PDO::PARAM_STR);
    $stmt->bindParam(2, $username, PDO::PARAM_STR);
    $stmt->execute();
    unset($stmt);

    redirect("Customer_change_password.php?success=reset");
}


?>


<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/change-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:33 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Find Houses - HTML5 Template</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/dashbord-mobile-menu.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/swiper.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl-carousel.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
</head>

<body class="inner-pages maxw1600 m0a dashboard-bd">
    <!-- Wrapper -->
    <div id="wrapper" class="int_main_wraapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <div class="dash-content-wrap">
            <header id="header-container" class="db-top-header">
                <!-- Header -->
                <div id="header">
                    <div class="container-fluid">

                        <?php include "main-nav-buy-rent.php" ?>

                    </div>
                </div>
                <!-- Header / End -->
            </header>
        </div>
        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-55">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-6 col-xs-6 pl-3 offset-lg-1 offset-md-3">
                        <div class="my-address">
                            <h3 class="heading pt-0">Change Password</h3>
                            <form>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group email">
                                            <label>New Password</label>
                                            <input type="password" name="new-password" class="form-control" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 ">
                                        <div class="form-group subject">
                                            <label>Confirm New Password</label>
                                            <input type="password" name="confirm-new-password" class="form-control" placeholder="Confirm New Password">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="send-btn mt-2">
                                            <button type="submit" class="btn btn-common">Send Changes</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->

        <!-- START PRELOADER -->
        <div id="preloader">
            <div id="status">
                <div class="status-mes"></div>
            </div>
        </div>
        <!-- END PRELOADER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/moment.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/swiper.min.js"></script>
        <script src="js/swiper.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/slick2.js"></script>
        <script src="js/fitvids.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/owl.carousel.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/dashbord-mobile-menu.js"></script>
        <script src="js/forms-2.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/dropzone.js"></script>

        <!-- MAIN JS -->
        <script src="js/script.js"></script>

        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>


</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>