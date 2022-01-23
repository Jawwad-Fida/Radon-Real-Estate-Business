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
    <title>RADON - Real Estate Business</title>
    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <!-- GOOGLE FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i%7CMontserrat:600,800" rel="stylesheet">
    <!-- FONT AWESOME -->
    <link rel="stylesheet" href="font/flaticon.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/fontawesome-5-all.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- ARCHIVES CSS -->
    <link rel="stylesheet" href="css/search-form.css">
    <link rel="stylesheet" href="css/search.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/aos2.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/lightcase.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" id="color" href="css/colors/darkblue.css">
    <link rel="stylesheet" href="css/advance_search.css">
    <link rel="stylesheet" href="css/advance_search1.css">
</head>

<body class="homepage-23 the-search">
    <!-- Wrapper -->
    <div id="wrapper">


        <!-- =========================================================================== -->
        <?php include "top-nav.php"; ?>


        <div class="clearfix"></div>
        <!-- Header Container / End -->
        <!-- =========================================================================== -->



        <!-- STAR HEADER SEARCH -->
        <section id="home" class="parallax-searchs section welcome-area overlay">
            <div class="hero-main">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="banner-inner" data-aos="zoom-in">
                                <h1 class="title text-center">Find Your Dream Home</h1>
                                <h5 class="sub-title text-center">We Have Over Million Properties For You</h5>
                            </div>
                        </div>


                        <!-- Search Form -->
                        <div class="col-12">
                            <div class="banner-search-wrap" data-aos="zoom-in">
                                <ul class="nav nav-tabs rld-banner-tab">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#tabs_1" name="sale">For Sale</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs_2">For Rent</a>
                                    </li>
                                </ul>
                                <form action="Customer_Buy_list_search.php" method="post" id="index1">
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="tabs_1">
                                            <div class="rld-main-search">
                                                <div class="row">                   
                                                <!-- Form Bathrooms -->                                                       
                                                    <div class="rld-single-select">
                                                        <select class="select single-select mr-0" name="bath" form="index1">
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
                                                        <select class="select single-select mr-0" name="bed" form="index1">
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
                                                        <select class="select single-select mr-0" name="addr" id="index1">
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
                                                        <button class="btn btn-yellow" form="index1" name="search" type="submit" formmethod="post">Search Now</button>
                                                    </div>
                                                    <div class="explore__form-checkbox-list full-filter">
                                                        <div class="row">
                                                        <div class="col-lg-10 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                        <!-- Price Fields -->
                                                        <div class="main-search-field-2">
                                                            <!-- Area Range -->
                                                            <div class="slidecontainer">
                                                                <label>Area Size</label>
                                                                <input type="range" name="area" form="index1" min="0" max="2500" value="0" class="slider" id="myRange" method="post">
                                                                <p><span id="demo" ></span> Sqft</p>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <br>
                                                            <!-- Price Range -->
                                                            <div class="slidecontainer1">
                                                                <label>Price Range</label>
                                                                <input type="range" name="price" form="index1" min="0" max="10000000" value="0" class="slider" id="myRange1" method="post">
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
                                </form>

                                <div class="tab-pane fade " id="tabs_2">
                                    <form action="Customer_Rent_list_search.php" method="post" id="index2">
                                        <div class="rld-main-search">
                                            <div class="row">
                                                
                                                    <!-- Form Bathrooms -->
                                                    
                                                        <div class="rld-single-select">
                                                            <select class="select single-select mr-0" name="bath" form="index2">
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
                                                            <select class="select single-select mr-0" name="bed" form="index2">
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
                                                    <select class="select single-select mr-0" name="addr" form="index2">
                                                        <option value="null">Location</option>
                                                        <option value="Banani">Banani</option>
                                                        <option value="Gulshan">Gulshan</option> 
                                                        <option value="Dhanmondi">Dhanmondi</option>
                                                        <option value="Badda">Badda</option>
                                                        <option value="6">Baridhara</option>
                                                        <option value="Motijheel">Motijheel</option>
                                                        <option value="Wari">Wari</option>
                                                        <option value="Uttara">Uttara</option>
                                                        <option value="Chittagong">Chittagong</option>
                                                    </select>

                                                </div>
                                                <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                    <button class="btn btn-yellow" form="index2" name="search" type="submit" formmethod="post">Search Now</button>
                                                </div>
                                                <div class="explore__form-checkbox-list full-filter">
                                                    <div class="row">
                                                    <div class="col-lg-10 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                        <!-- Price Fields -->
                                                        <div class="main-search-field-2">
                                                            <!-- Area Range -->
                                                            <div class="slidecontainer">
                                                                <label>Area Size</label>
                                                                <input type="range" name="area" form="index2" min="0" max="2500" value="0" class="slider" id="myRange2" method="post">
                                                                <p><span id="demo2" ></span> Sqft</p>
                                                                <div class="clearfix"></div>
                                                            </div>
                                                            <br>
                                                            <!-- Price Range -->
                                                            <div class="slidecontainer1">
                                                                <label>Price Range</label>
                                                                <input type="range" name="price" form="index2" min="0" max="95000" value="0" class="slider" id="myRange3" method="post">
                                                                <p><span id="demo3" ></span> BDT</p> 
                                                                
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
                    <!--/ End Search Form -->



                </div>
            </div>
    </div>
    </section>
    <!-- END HEADER SEARCH -->

    <!-- START SECTION RECENTLY PROPERTIES -->




    <section class="recently portfolio bg-white-2">
        <div class="container">
            <div class="section-title ml-3">
                <h3>Recent</h3>
                <h2>Properties</h2>
            </div>
            <div class="portfolio col-xl-12 px-0">
                <div class="slick-lancers">

                    <?php

                    $stmt = query("SELECT * FROM apartment WHERE apartment_status='Buy' ORDER BY apartment_id DESC LIMIT 3");
                    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $apartment_id = $row['apartment_id'];
                    $building_name = $row['building_name'];
                    $no_of_bedroom = $row['no_of_bedroom'];
                    $no_of_bathroom = $row['no_of_bathroom'];
                    $buy_price = $row['buy_price'];
                    $area = $row['area'];
                    $image = $row['image'];
                    $status = $row['apartment_status'];
                    $address =  $row['address'];

                    ?>


                    <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                        <div class="landscapes">

                            <div class="project-single">
                                <div class="project-inner project-head">

                                    <div class="project-bottom">
                                        <h4><a href="#">View Property</a><span class="category">Real Estate</span></h4>
                                    </div>
                                    <div class="homes">
                                        <!-- homes img -->
                                        <a href="#" class="homes-img">
                                            <div class="homes-tag button alt featured">Featured</div>
                                            <div class="homes-tag button alt sale"><?php echo $status; ?></div>
                                            <img src="admin_marketing/<?php echo $image; ?>" alt="home-1" class="img-responsive">
                                        </a>
                                    </div>
                                </div>
                                <!-- homes content -->
                                <div class="homes-content">
                                    <!-- homes address -->
                                    <h3><a href="#"><?php echo $building_name ;?></a></h3>
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
                                    <div class="price-properties footer pt-3 pb-0">
                                        <h3 class="title mt-3">
                                            <a><?php echo 'BDT ' . $buy_price; ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>

                    <?php
                    $stmt1 = query("SELECT * FROM apartment WHERE apartment_status='Rent' ORDER BY apartment_id DESC LIMIT 3");
                    while($row1 = $stmt1->fetch(PDO::FETCH_ASSOC)){
                    $building_name1 = $row1['building_name'];
                    $apartment_id1 = $row1['apartment_id'];
                    $no_of_bedroom1 = $row1['no_of_bedroom'];
                    $no_of_bathroom1 = $row1['no_of_bathroom'];
                    $buy_price1 = $row1['buy_price'];
                    $area1 = $row1['area'];
                    $image1 = $row1['image'];
                    $status1 = $row1['apartment_status'];
                    $address1 =  $row1['address'];

                    ?>


                    <div class="agents-grid" data-aos="zoom-in">
                        <div class="landscapes">
                            <div class="project-single no-mb">
                                <div class="project-inner project-head">
                                    <div class="project-bottom">
                                        <h4><a href="#">View Property</a><span class="category">Real Estate</span></h4>
                                    </div>
                                    <div class="homes">
                                        <!-- homes img -->
                                        <a href="#" class="homes-img">
                                            <div class="homes-tag button alt featured">Featured</div>
                                            <div class="homes-tag button sale rent"><?php echo $status1;   ?></div>
                                            <img src="admin_marketing/<?php echo $image1; ?>" alt="home-1" class="img-responsive">
                                        </a>
                                    </div>

                                </div>
                                <!-- homes content -->
                                <div class="homes-content">
                                    <!-- homes address -->
                                    <h3><a href="#"><?php echo $building_name1;  ?></a></h3>
                                    <p class="homes-address mb-3">

                                        <i class="fa fa-map-marker"></i><span></span>

                                    </p>
                                    <!-- homes List -->
                                    <ul class="homes-list clearfix pb-3">
                                        <li class="the-icons">
                                            <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                            <span><?php echo $no_of_bedroom1 ;  ?></span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                            <span><?php echo $no_of_bathroom1;   ?></span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                            <span><?php echo $area1;   ?></span>
                                        </li>
                                        <li class="the-icons">
                                            <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                            <span></span>
                                        </li>
                                    </ul>
                                    <!-- Price -->
                                    <div class="price-properties footer pt-3 pb-0">
                                        <h3 class="title mt-3">
                                            <a href="single-property-1.html"><?php echo 'BDT ' . $buy_price1 ;?></a>
                                        </h3>
                                        <div class="compare">
                                            <a href="#" title="Compare">
                                                <i class="flaticon-compare"></i>
                                            </a>
                                            <a href="#" title="Share">
                                                <i class="flaticon-share"></i>
                                            </a>
                                            <a href="#" title="Favorites">
                                                <i class="flaticon-heart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php } ?>








                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION RECENTLY PROPERTIES -->

    <!-- START SECTION SERVICES -->
    <?php
    $a=array("Banani","Gulshan-1","Gulshan-2","Dhanmondi","Badda","Baridhara","Motijheel","Wari","Uttara","Farmgate","Mirpur");
    $random_keys=array_rand($a,4);
    
    $area1 = $a[$random_keys[0]];
    $area2 = $a[$random_keys[1]];
    $area3 = $a[$random_keys[2]];
    $area4 = $a[$random_keys[3]];

    $area1_query = query("SELECT * FROM apartment WHERE address = '$area1'");
    $area2_query = query("SELECT * FROM apartment WHERE address = '$area2'");
    $area3_query = query("SELECT * FROM apartment WHERE address = '$area3'");
    $area4_query = query("SELECT * FROM apartment WHERE address = '$area4'");
   
    $row_count1 = count_records($area1_query);
    $row_count2 = count_records($area2_query);
    $row_count3 = count_records($area3_query);
    $row_count4 = count_records($area4_query);

    ?>

    
    <section class="popular-places">
        <div class="container">
            <div class="section-title">
                <h3>Most Popular</h3>
                <h2>Places</h2>
            </div>
            

            <div class="row">
                <div class="col-md-12">
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-right">
                    <!-- Image Box -->
                    <a  class="img-box hover-effect">
                    <form action="Customer_Buy_list_search.php" id="test8" method="post">
                        <img src="images/popular-places/12.jpg" class="img-responsive" alt="">
                        <!-- Badge -->
                        <div class="listing-badges">
                            <span class="featured">Featured</span>
                        </div>
                        <div class="img-box-content visible">
                            <h4> <?php echo $area1; ?> </h4>
                            <span><?php echo $row_count1; ?> Properties</span>
                        </div>
                    </form>
                    </a>
                </div>
                <div class="col-lg-8 col-md-6" data-aos="fade-left">
                    <!-- Image Box -->
                    <a  class="img-box hover-effect">
                        <img src="images/popular-places/13.jpg" class="img-responsive" alt="">
                        <div class="img-box-content visible">
                            <h4><?php echo $area2; ?></h4>
                            <span><?php echo $row_count2; ?> Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-8 col-md-6" data-aos="fade-right">
                    <!-- Image Box -->
                    <a class="img-box hover-effect no-mb">
                        <img src="images/popular-places/14.jpg" class="img-responsive" alt="">
                        <div class="img-box-content visible">
                            <h4><?php echo $area3; ?></h4>
                            <span><?php echo $row_count3; ?> Properties</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-left">
                    <!-- Image Box -->
                    <a  class="img-box hover-effect no-mb x3">
                        <img src="images/popular-places/15.jpg" class="img-responsive" alt="">
                        <!-- Badge -->
                        <div class="listing-badges">
                            <span class="featured">Featured</span>
                        </div>
                        <div class="img-box-content visible">
                            <h4><?php echo $area4; ?></h4>
                            <span><?php echo $row_count4; ?> Properties</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>
    
    <!-- END SECTION SERVICES -->

    
    <!-- START SECTION AGENTS -->
    <section class="team bg-white-2">
        <div class="container">
            <div class="section-title col-md-5">
                <h3>Meet Our</h3>
                <h2>Agents</h2>
            </div>
            <div class="row team-all">
                <div class="col-lg-3 col-md-6 team-pro" data-aos="fade-up" data-aos-delay="150">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/Jawwad.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro" data-aos="fade-up" data-aos-delay="250">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/Mimo.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro pb-none" data-aos="fade-up" data-aos-delay="350">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/Aysha.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro" data-aos="fade-up" data-aos-delay="450">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/Pranto.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro pb-none" data-aos="fade-up" data-aos-delay="350">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/Tarin.jpg" alt="" />
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 team-pro pb-none" data-aos="fade-up" data-aos-delay="350">
                    <div class="team-wrap">
                        <div class="team-img">
                            <img src="images/team/Rafi.jpg" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END SECTION AGENTS -->


    <!-- START FOOTER -->
    <footer class="first-footer">
        <div class="top-footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="netabout">
                            <a href="index-2.html" class="logo">
                                <img src="images/logo-footer.svg" alt="netcom">
                            </a>
                           
                        </div>
                        <div class="contactus">
                            <ul>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-map-marker" aria-hidden="true"></i>
                                        <p class="in-p">11no Road Banani, Bangladesh</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-phone" aria-hidden="true"></i>
                                        <p class="in-p">+88017 333 44444</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="info">
                                        <i class="fa fa-envelope" aria-hidden="true"></i>
                                        <p class="in-p ti">support@findhouses.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="navigation">
                            <h3>Navigation</h3>
                            <div class="nav-footer">
                                <ul>
                                    <li><a href="index.php">Home</a></li>
                                </ul>
                                <ul class="nav-right">
                                    <li><a href="about.php">About Us</a></li>
                                    <li class="no-mgb"><a href="">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

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
    <script src="js/rangeSlider.js"></script>
    <script src="js/tether.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/moment.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/mmenu.min.js"></script>
    <script src="js/mmenu.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/aos2.js"></script>
    <script src="js/search.js"></script>
    <script src="js/slick.min.js"></script>
    <script src="js/slick3.js"></script>
    <script src="js/fitvids.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/isotope.pkgd.min.js"></script>
    <script src="js/smooth-scroll.min.js"></script>
    <script src="js/lightcase.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/ajaxchimp.min.js"></script>
    <script src="js/newsletter.js"></script>
    <script src="js/jquery.form.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/forms-2.js"></script>
    <script src="js/searched.js"></script>
    <script src="js/range.js"></script>
    <script src="js/color-switcher.js"></script>
    <script src="js/advance_search.js"></script>
    <script src="js/advance_search1.js"></script>
    <script src="js/advance_search2.js"></script>
    <script src="js/advance_search3.js"></script>
    <script>
        $(window).on('scroll load', function() {
            $("#header.cloned #logo img").attr("src", $('#header #logo img').attr('data-sticky-logo'));
        });
    </script>

    <!-- Slider Revolution scripts -->
    <script src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script src="revolution/js/jquery.themepunch.revolution.min.js"></script>

    <script>
        $(".dropdown-filter").on('click', function() {

            $(".explore__form-checkbox-list").toggleClass("filter-block");

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