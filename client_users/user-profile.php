<?php include 'client_header.php'; ?>

<!-- Right Side Content / End -->
</div>
</div>
<!-- Header / End -->
</header>
</div>
<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- START SECTION USER PROFILE -->
<section class="user-page section-padding pt-5">
    <div class="container-fluid">
        <div class="row">

            <?php include "left_sidebar.php" ?>

            <?php
            $user_id = $_SESSION['user_id'];
            $client_id = $_SESSION['client_id'];
            $username = $_SESSION['username'];
            //$role = $_SESSION['user_role'];
            $name = $_SESSION['name'];

            $stmt = query("SELECT user_email, user_image FROM users WHERE user_id={$user_id}");
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            ?>

            <div class="col-lg-6 col-md-6 col-xs-6 widget-boxed mt-33 mt-0 offset-lg-2 offset-md-3">
                <div class="widget-boxed-header">
                    <h4>Profile Details</h4>
                </div>
                <div class="sidebar-widget author-widget2">
                    <div class="author-box clearfix">
                        <img src="<?php echo $user_image; ?>" alt="author-image" class="author__img">
                        <h4 class="author__title"><?php echo $name; ?></h4>
                    </div>
                    <ul class="author__contact">
                        <li><span class="la la-map-marker"><i class="fa fa-user"></i></span>Username: <?php echo $username; ?></li>
                        <li><span class="la la-phone"><i class="fa fa-circle" aria-hidden="true"></i></span>Client ID: <?php echo $client_id; ?></li>
                        <li><span class="la la-envelope-o"><i class="fa fa-envelope" aria-hidden="true"></i></span><a href="#"><?php echo $user_email; ?></a></li>
                    </ul>

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