<?php include 'client_header.php'; ?>

<!-- Right Side Content / End -->
</div>
</div>
<!-- Header / End -->
</header>
</div>
<div class="clearfix"></div>
<!-- Header Container / End -->

<?php

if($_SESSION['username']){
    $username = $_SESSION['username'];
}

if (isset($_POST['reset_submit'])) {
    $password = validate($_POST['new-password']);
    $password_repeat = validate($_POST['confirm-new-password']);
    //$username = "jawwad";


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

    redirect("change_password.php?success=reset");
}


?>

<!-- START SECTION USER PROFILE -->
<section class="user-page section-padding pt-55">
    <div class="container-fluid">
        <div class="row">

            <?php include "left_sidebar.php" ?>
            <div class="col-lg-7 col-md-6 col-xs-6 pl-3 offset-lg-1 offset-md-3">
                <div class="my-address">

                    <!-- Display error messages -->
                    <?php display_error_message(); ?>

                    <!-- Display success messages -->
                    <?php display_success_message(); ?>



                    <h3 class="heading pt-0">Change Password</h3>

                    <form action="" method="post">
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
                                    <button type="submit" name="reset_submit" class="btn btn-common">Send Changes</button>
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

<div class="second-footer ad mt-3">
    <div class="container">
    </div>
</div>

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


<!-- Mirrored from code-theme.com/html/findhouses/user-profile.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:32 GMT -->

</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>