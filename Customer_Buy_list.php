<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
?>


<!DOCTYPE html>
<html lang="zxx">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Properties List</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/default.css">
    <link rel="stylesheet" href="css/advance_search.css">
    <link rel="stylesheet" href="css/advance_search1.css">
</head>

<body class="inner-pages agents hp-6 full hd-white">
    <!-- Wrapper -->
    <div id="wrapper">
        <!-- START SECTION HEADINGS -->
        <!-- Header Container
        ================================================== -->
        <header id="header-container">
            <!-- Header -->
            <div id="header">
                <div class="container container-header">

                    <?php include "main-nav-buy-rent.php" ?>

                </div>
            </div>
            <!-- Header / End -->

        </header>

        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <!-- END SECTION HEADINGS -->

        <!-- START SECTION PROPERTIES LISTING -->
        <section class="properties-list full featured portfolio blog">
            <div class="container">
                <section class="headings-2 pt-0 pb-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p><a href="index.php">Home </a> &nbsp;/&nbsp; <span>Listings</span></p>
                                </div>
                                <h3>List View</h3>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Search Form -->
                <form action="Customer_Buy_list_search.php" id="test" method="post">
                    <div class="col-12 px-0 parallax-searchs">
                        <div class="banner-search-wrap">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="tabs_1">
                                    <div class="rld-main-search">
                                        <div class="row">
                                            
                                                <!-- Form Bathrooms -->
                                                
                                                    <div class="rld-single-select">


                                                        <select class="select single-select mr-0" name="bath" form="test">
                                                            <option value="null">Bathroom</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                        </select>

                                                    </div>
                                               
                                                <!--/ End Form Bathrooms -->
                                            
                                            
                                                <!-- Form Bedrooms -->
                                               
                                                    <div class="rld-single-select">
                                                        <select class="select single-select mr-0" name="bed" form="test" >
                                                            <option value="null">Bedroom</option>
                                                            <option value="1">1</option>
                                                            <option value="2">2</option>
                                                            <option value="3">3</option>
                                                            <option value="4">4</option>
                                                            <option value="5">5</option>

                                                        </select>
                                                    </div>
                                                
                                                <!--/ End Form Bedrooms -->
                                            
                                            
                                                <div class="rld-single-select">
                                                    <select class="select single-select mr-0" name="addr">
                                                        <option value="null">Location</option>
                                                        <option value="Banani">Banani</option>
                                                        <option value="Gulshan">Gulshan</option>
                                                        
                                                        <option value="Dhanmondi">Dhanmondi</option>
                                                        <option value="Badda">Badda</option>
                                                        <option value="Baridhara">Baridhara</option>
                                                        <option value="Motijheel">Motijheel</option>
                                                        <option value="Wari">Wari</option>
                                                        <option value="Uttara">Uttara</option>
                                                        <option value="Farmgate">Farmgate</option>
                                                        <option value="Mirpur">Mirpur</option>
                                                        <option value="Chittagong">Chittagong</option>
                                                    </select>
                                                </div>
                                            

                                            <div class="dropdown-filter"><span>Advanced Search</span></div>
                                            <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                <button class="btn btn-yellow" form="test" name="search" type="submit" formmethod="post">Search Now</button>
                                            </div>
                                            <div class="explore__form-checkbox-list full-filter">
                                                <div class="row">
                                                    <div class="col-lg-10 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                        <!-- Price Fields -->
                                                        <div class="main-search-field-2">
                                                            <!-- Area Range -->
                                                            <div class="slidecontainer">
                                                                <label>Area Size</label>
                                                                <input type="range" name="area" form="test" min="0" max="2500" value="0" class="slider" id="myRange" method="post">
                                                                <p><span id="demo" ></span> Sqft</p>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <br>
                                                            <!-- Price Range -->
                                                            <div class="slidecontainer1">
                                                                <label>Price Range</label>
                                                                <input type="range" name="price" form="test" min="0" max="10000000" value="0" class="slider" id="myRange1" method="post">
                                                                <p><span id="demo1" ></span> BDT</p> 
                                                                
                                                                <div class="clearfix"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <!--/ End Search Form -->
                <?php $stmt = query("SELECT * FROM apartment WHERE (apartment_status='Buy' AND status='Not Booked')");
                $row_count = count_records($stmt);
                ?>
                <section class="headings-2 pt-0">
                    <div class="pro-wrapper">
                        <div class="detail-wrapper-body">
                            <div class="listing-title-bar">
                                <div class="text-heading text-left">
                                    <p class="font-weight-bold mb-0 mt-3"><?php echo $row_count . ' Search Results' ?></p>
                                </div>
                            </div>
                        </div>
                        <div class="cod-pad single detail-wrapper mr-2 mt-0 d-flex justify-content-md-end align-items-center">
                            <div class="input-group border rounded input-group-lg w-auto mr-4">
                                <label class="input-group-text bg-transparent border-0 text-uppercase letter-spacing-093 pr-1 pl-3" for="inputGroupSelect01">
                                    <i class="fas fa-align-left fs-16 pr-2"></i>Sortby:</label>
                                <select class="form-control border-0 bg-transparent shadow-none p-0 selectpicker sortby" data-style="bg-transparent border-0 font-weight-600 btn-lg pl-0 pr-3" id="inputGroupSelect01" name="sortby">
                                    <option selected>Top Selling</option>
                                    <option value="1">Most Viewed</option>
                                    <option value="2">Price(low to high)</option>
                                    <option value="3">Price(high to low)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- php tag start-->
                <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $apart_status = 'Buy';
                    $apartment_id = $row['apartment_id'];
                    $building_name = $row['building_name'];
                    //$flat_no = $row['flat_no'];
                    $no_of_bedroom =  $row['no_of_bedroom'];
                    $no_of_bathroom =  $row['no_of_bathroom'];
                    $image =  $row['image'];
                    //$buy_price =  $row['buy_price'];
                    $Buy_price =  $row['buy_price'];
                    $area =  $row['area'];
                    $status =  $row['status'];
                    //$type =  $row['type'];
                    //$features =  $row['features'];
                    $address =  $row['address'];

                    //close php tag so that we can include some html inside the php while loop
                ?>
                    <div class="row featured portfolio-items">
                        <div class="item col-lg-4 col-md-12 col-xs-12 landscapes sale pr-0 pb-0" data-aos="fade-up">
                            <div class="project-single mb-0 bb-0">
                                <div class="project-inner project-head">
                                    <div class="project-bottom">
                                        <h4><a href="single_property.php?edit=<?php echo $apartment_id; ?>&apart_status=<?php echo $apart_status; ?>">View Property</a><span class="category">Real Estate</span></h4>
                                    </div>
                                    <div class="homes">
                                        <!-- homes img -->
                                        <a href="single-property-1.html" class="homes-img">
                                            <div class="homes-tag button alt featured">Featured</div>
                                            <div class="homes-tag button alt sale"><?php echo $apart_status ?></div>
                                            <div class="homes-price">Family Home</div>
                                            <img src="admin_marketing/<?php echo $image; ?>" alt="home-1" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- homes content -->



                        <div class="col-lg-8 col-md-12 homes-content pb-0 mb-44" data-aos="fade-up">
                            <!-- homes address -->
                            <?php if (is_logged_in() == true) : ?>
                            <h3><a href="single_property.php?edit=<?php echo $apartment_id; ?>&apart_status=<?php echo $apart_status; ?>"><?php echo $building_name ?></a></h3>
                            <?php endif; ?>
                            
                            <?php if (is_logged_in() == false) : ?>
                            <h3><a href="#"><?php echo $building_name ?></a></h3>
                            <?php endif; ?>

                            <p class="homes-address mb-3">

                                <i class="fa fa-map-marker"></i><span><?php echo $address; ?></span>

                            </p>
                            <!-- homes List -->
                            <ul class="homes-list clearfix pb-3">
                                <li class="the-icons">
                                    <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                    <span><?php echo $no_of_bedroom; ?></span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                    <span><?php echo $no_of_bathroom; ?></span>
                                </li>
                                <li class="the-icons">
                                    <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                    <span><?php echo $area; ?></span>
                                </li>
                            </ul>
                            <!-- Price -->
                            <div class="price-properties">
                                <h3 class="title mt-3">
                                    <a><?php echo 'BDT ' . $Buy_price; ?></a>
                                </h3>
                                <?php if (is_logged_in() == true) : ?>
                                <div class="compare">
                                    <h6><a href="single_property.php?edit=<?php echo $apartment_id; ?>&apart_status=<?php echo $apart_status; ?>">View Property</a></h6>
                                </div>
                                <?php endif; ?>
                                
                                <?php if (is_logged_in() == false) : ?>
                                <div class="compare">
                                    <h6><p style='color:blue;font: size 10px;'>Login to view more information regarding apartment</p></h6>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <!--PHP TAG FOR ALL Buy LIST-->
                <?php }
                ?>
            </div>



        </section>
        <!-- START FOOTER -->
        <a data-scroll href="#wrapper" class="go-up"><i class="fa fa-angle-double-up" aria-hidden="true"></i></a>
        <!-- END FOOTER -->

        <!-- ARCHIVES JS -->
        <script src="js/jquery-3.5.1.min.js"></script>
        <script src="js/rangeSlider.js"></script>
        <script src="js/tether.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/mmenu.min.js"></script>
        <script src="js/mmenu.js"></script>
        <script src="js/aos.js"></script>
        <script src="js/aos2.js"></script>
        <script src="js/smooth-scroll.min.js"></script>
        <script src="js/lightcase.js"></script>
        <script src="js/search.js"></script>
        <script src="js/light.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/popup.js"></script>
        <script src="js/searched.js"></script>
        <script src="js/ajaxchimp.min.js"></script>
        <script src="js/newsletter.js"></script>
        <script src="js/inner.js"></script>
        <script src="js/color-switcher.js"></script>
        <script src="js/advance_search.js"></script>
        <script src="js/advance_search1.js"></script>

        <script>
            $(".dropdown-filter").on('click', function() {

                $(".explore__form-checkbox-list").toggleClass("filter-block");

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