<?php include 'accounting_admin_header.php'; ?>

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
                                        <i class="fa fa-list" aria-hidden="true"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">
                                        <?php
                                        $sql = query("SELECT * FROM invoice WHERE (status='unpaid') ");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                       
                                        ?>
                                        </h6>
                                        <p class="type ml-1">Unpaid invoice </p>
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
                                        $sql = query("SELECT * FROM clients");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                      ?>
                                        </h6>
                                        <p class="type ml-1">client list</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 dar com mr-3">
                                <div class="item mb-0">
                                    <div class="icon">
                                        <i class="fas fa-comments"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">
                                        <?php
                                        $sql = query("SELECT * FROM complaint");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                      ?>
                                        </h6>
                                        <p class="type ml-1">List of complaint </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 dar booked">
                                <div class="item mb-0">
                                    <div class="icon">
                                        <i class="fas fa-heart"></i>
                                    </div>
                                    <div class="info">
                                        <h6 class="number">
                                        <?php
                                        $sql = query("SELECT * FROM orders");
                                        $count1 = count_records($sql);
                                        echo $count1;
                                      ?>
                                        </h6>
                                        <p class="type ml-1">Payment History</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


               <!-- <div class="dashborad-box">
                    <h4 class="title">Listing</h4>
                    <div class="section-body listing-table">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Listing Name</th>
                                        <th>Date</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Luxury Restaurant</td>
                                        <td>23 Jan 2020</td>
                                        <td class="rating"><span>5.0</span></td>
                                        <td class="status"><span class=" active">Active</span></td>
                                        <td class="edit"><a href="#"><i class="fa fa-pencil"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Gym in Town</td>
                                        <td>11 Feb 2020</td>
                                        <td class="rating"><span>4.5</span></td>
                                        <td class="status"><span class="active">Active</span></td>
                                        <td class="edit"><a href="#"><i class="fa fa-pencil"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>Cafe in Boston</td>
                                        <td>09 Jan 2020</td>
                                        <td class="rating"><span>5.0</span></td>
                                        <td class="status"><span class="non-active">Non-Active</span></td>
                                        <td class="edit"><a href="#"><i class="fa fa-pencil"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td class="pb-0">Car Dealer in New York</td>
                                        <td class="pb-0">24 Feb 2018</td>
                                        <td class="rating pb-0"><span>4.5</span></td>
                                        <td class="status pb-0"><span class="active">Active</span></td>
                                        <td class="edit pb-0"><a href="#"><i class="fa fa-pencil"></i></a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="dashborad-box">
                    <h4 class="title">Message</h4>
                    <div class="section-body">
                        <div class="messages">
                            <div class="message">
                                <div class="thumb">
                                    <img class="img-fluid" src="images/testimonials/ts-1.jpg" alt="">
                                </div>
                                <div class="body">
                                    <h6>Mary Smith</h6>
                                    <p class="post-time">22 Minutes ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="message">
                                <div class="thumb">
                                    <img class="img-fluid" src="images/testimonials/ts-2.jpg" alt="">
                                </div>
                                <div class="body">
                                    <h6>Karl Tyron</h6>
                                    <p class="post-time">23 Minutes ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="message">
                                <div class="thumb">
                                    <img class="img-fluid" src="images/testimonials/ts-3.jpg" alt="">
                                </div>
                                <div class="body">
                                    <h6>Lisa Willis</h6>
                                    <p class="post-time">53 Minutes ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="dashborad-box">
                    <h4 class="title">Review</h4>
                    <div class="section-body">
                        <div class="reviews">
                            <div class="review">
                                <div class="thumb">
                                    <img class="img-fluid" src="images/testimonials/ts-4.jpg" alt="">
                                </div>
                                <div class="body">
                                    <h5>Family House</h5>
                                    <h6>Mary Smith</h6>
                                    <p class="post-time">10 hours ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <ul class="starts mb-0">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review">
                                <div class="thumb">
                                    <img class="img-fluid" src="images/testimonials/ts-5.jpg" alt="">
                                </div>
                                <div class="body">
                                    <h5>Bay Apartment</h5>
                                    <h6>Karl Tyron</h6>
                                    <p class="post-time">22 hours ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <ul class="starts mb-0">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="review">
                                <div class="thumb">
                                    <img class="img-fluid" src="images/testimonials/ts-6.jpg" alt="">
                                </div>
                                <div class="body">
                                    <h5>Family House Villa</h5>
                                    <h6>Lisa Willis</h6>
                                    <p class="post-time">51 hours ago</p>
                                    <p class="content mb-0 mt-2">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore</p>
                                    <ul class="starts mb-0">
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star"></i>
                                        </li>
                                        <li><i class="fa fa-star-o"></i>
                                        </li>
                                    </ul>
                                    <div class="controller">
                                        <ul>
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="far fa-trash-alt"></i></a>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

               
            </div>
        </div>
    </div>
</section> -->
<!-- END SECTION DASHBOARD -->


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



</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
 ?>