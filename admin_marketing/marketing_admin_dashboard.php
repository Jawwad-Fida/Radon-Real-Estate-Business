<?php include 'marketing_admin_header.php'; ?>

<div class="clearfix"></div>
<!-- Header Container / End -->

<!-- START SECTION DASHBOARD -->
<section class="user-page section-padding">
    <div class="container-fluid">
        <div class="row">

            <?php include "left_sidebar.php" ?>

            <div class="col-lg-9 col-md-12 col-xs-12 pl-0 user-dash2">
                <div class="dashborad-box stat bg-white">

                    <!-- Display success messages -->
                    <?php display_success_message(); ?>
                    
                    <h4 class="title">Manage Dashboard</h4>

                    <div class="section-body">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-xs-12 dar pro mr-3">
                                <div class="item">
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">
                                        <?php
                                        $sql = query("SELECT * FROM apartment");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                      ?>
                                        
                                    </h6>
                                        <p class="type ml-1">Total number of apartments</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-xs-12 dar rev mr-3">
                                <div class="item">
                                    <div class="icon">
                                        <i class="fas fa-building"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">
                                        <?php
                                        $sql = query("SELECT * FROM building");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                      ?>
                                        </h6>
                                        <p class="type ml-1">Total number of buildings</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 dar com mr-3">
                                <div class="item mb-0">
                                    <div class="icon">
                                        <i class="fas fa-calendar-check"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number"> 
                                            <?php
                                        $sql = query("SELECT * FROM appointment ");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                      ?>
                                      </h6>
                                        <p class="type ml-1">Pending appointments  </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 dar booked">
                                <div class="item mb-0">
                                    <div class="icon">
                                        <i class="fas fa-users"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">
                                        <?php
                                        $sql = query("SELECT * FROM customers ");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                      ?>
                                        </h6>
                                        <p class="type ml-1">Total number of customer </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END SECTION DASHBOARD -->

<a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
<!-- END FOOTER -->

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

<script>
    $(".header-user-name").on("click", function() {
        $(".header-user-menu ul").toggleClass("hu-menu-vis");
        $(this).toggleClass("hu-menu-visdec");
    });
</script>

<!-- MAIN JS -->
<script src="js/script.js"></script>

</div>
<!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:32 GMT -->

</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>