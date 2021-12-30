<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
 $stmt = query("SELECT * FROM apartment WHERE apartment_status='Buy' ORDER BY RAND() LIMIT 1");
             $row = $stmt->fetch(PDO::FETCH_ASSOC);
             $building_name= $row['building_name'];
             $no_of_bedroom= $row['no_of_bedroom'];
             $no_of_bathroom= $row['no_of_bathroom'];
             $buy_price= $row['buy_price'];
             $area= $row['area'];
             $status= $row['apartment_status'];
 $stmt = query("SELECT * FROM apartment WHERE apartment_status='Rent' ORDER BY RAND() LIMIT 1");
             $row1 = $stmt->fetch(PDO::FETCH_ASSOC);
             $building_name1= $row1['building_name'];
             $no_of_bedroom1= $row1['no_of_bedroom'];
             $no_of_bathroom1= $row1['no_of_bathroom'];
             $buy_price1= $row1['buy_price'];
             $area1= $row1['area'];
             $status1= $row1['apartment_status'];             
               
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
                                        <a class="nav-link active" data-toggle="tab" href="#tabs_1">For Sale</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#tabs_2">For Rent</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="tabs_1">
                                        <div class="rld-main-search">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 py-1 pl-0 pr-0">
                                                    <!-- Form Bathrooms -->
                                                    <div class="col-lg-2 col-md-3 py-1 pr-30 pl-0 ">
                                                        <div class="rld-single-select">
                                                            <select class="select single-select mr-0">
                                                            <option value="0">Bathroom</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                    
                                                </select>
                                                </div>
                                            </div>
                                                    <!--/ End Form Bathrooms -->
                                                </div>
                                                <div class="col-lg-2 col-md-3 py-1 pr-30 pl-0 ">
                                                    <!-- Form Bedrooms -->
                                                    <div class="col-lg-2 col-md-3 py-1 pr-30 pl-0 ">
                                                        <div class="rld-single-select">
                                                            <select class="select single-select mr-0">
                                                             <option value="0">Bathroom</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                                <option value="4">4</option>
                                                                <option value="5">5</option>
                                                    
                                                </select>
                                                </div>
                                            </div>
                                                    <!--/ End Form Bedrooms -->
                                                </div>
                                                <div class="col-lg-2 col-md-3 py-1 pl-0 pr-0">

                                                    <div class="rld-single-select">
                                                        <select class="select single-select mr-0">
                                                        <option value="">Area Address</option>
                                                            <option value="1">Banani</option>
                                                            <option value="2">Gulshan-2</option>
                                                            <option value="3">Gulshan-1</option>
                                                            <option value="4">Dhanmondi</option>
                                                            <option value="5">Badda</option>
                                                            <option value="6">Baridhara</option>
                                                            <option value="7">Motijheel</option>
                                                            <option value="8">Wari</option>
                                                            <option value="9">Uttara</option>
                                                            <option value="10">Chittagong</option>
                                                    </select>
                                                    </div>
                                                </div>
                                                <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                    <a class="btn btn-yellow" href="#">Search Now</a> <!------ SUBMIT FORM ------->
                                                </div>
                                                <div class="explore__form-checkbox-list full-filter">
                                                    <div class="row">
                                                        <div class="col-lg-10 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                            <!-- Price Fields -->
                                                            <div class="main-search-field-2">

                                                                <!-- Area Range -->
                                                                <div class="range-slider">
                                                                    <label>Apartment Size</label>
                                                                    <div id="area-range" data-min="0" data-max="2500" data-unit="sq ft"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>

                                                                <br>
                                                                <!-- Price Range -->
                                                                <div class="range-slider">
                                                                    <label>Price Range</label>
                                                                    <div id="price-range" data-min="0" data-max="90000000" data-unit="BDT"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    
                                    <div class="tab-pane fade " id="tabs_2">
                                        <div class="rld-main-search">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-3 py-1 pl-0 pr-0">
                                                    <!-- Form Bathrooms -->
                                                    <div class="form-group bath">
                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bath" aria-hidden="true"></i> Bathrooms</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected">1</li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                                <li data-value="4" class="option">4</li>
                                                                <li data-value="5" class="option">5</li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <!--/ End Form Bathrooms -->
                                                </div>
                                                <div class="col-lg-2 col-md-3 py-1 pr-30 pl-0 ">
                                                    <!-- Form Bedrooms -->
                                                    <div class="form-group beds">
                                                        <div class="nice-select form-control wide" tabindex="0"><span class="current"><i class="fa fa-bed" aria-hidden="true"></i> Bedrooms</span>
                                                            <ul class="list">
                                                                <li data-value="1" class="option selected">1</li>
                                                                <li data-value="2" class="option">2</li>
                                                                <li data-value="3" class="option">3</li>
                                                                <li data-value="4" class="option">4</li>
                                                                <li data-value="5" class="option">5</li>
                                                                
                                                        </div>
                                                    </div>
                                                    <!--/ End Form Bedrooms -->
                                                </div>
                                                <div class="rld-single-select">
                                                    <select class="select single-select mr-0">
                                                    <option value="">Area Address</option>
                                                            <option value="1">Banani</option>
                                                            <option value="2">Gulshan-2</option>
                                                            <option value="3">Gulshan-1</option>
                                                            <option value="4">Dhanmondi</option>
                                                            <option value="5">Badda</option>
                                                            <option value="6">Baridhara</option>
                                                            <option value="7">Motijheel</option>
                                                            <option value="8">Wari</option>
                                                            <option value="9">Uttara</option>
                                                            <option value="10">Chittagong</option>
                                                    </select>
                                                </div>
                                                <div class="dropdown-filter"><span>Advanced Search</span></div>
                                                <div class="col-xl-2 col-lg-2 col-md-4 pl-0">
                                                    <a class="btn btn-yellow" href="#">Search Now</a>
                                                </div>
                                                <div class="explore__form-checkbox-list full-filter">
                                                    <div class="row">
                                                        <div class="col-lg-5 col-md-12 col-sm-12 py-1 pr-30 mr-5 sld">
                                                            <!-- Price Fields -->
                                                            <div class="main-search-field-2">

                                                                 <!-- Area Range -->
                                                                <div class="range-slider">
                                                                    <label>Apartment Size</label>
                                                                    <div id="area-range" data-min="0" data-max="2500" data-unit="sq ft"></div>
                                                                    <div class="clearfix"></div>
                                                                </div>

                                                                <br>
                                                                <!-- Price Range -->
                                                                <div class="range-slider">
                                                                    <label>Price Range</label>
                                                                    <div id="price-range" data-min="0" data-max="90000000" data-unit="BDT "></div>
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

                        <div class="agents-grid" data-aos="fade-up" data-aos-delay="150">
                            <div class="landscapes">

                                <div class="project-single">
                                    <div class="project-inner project-head">



                                        <div class="project-bottom">
                                            <h4><a href="single-property-1.html">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button alt sale"><?php echo $status?></div>
                                                <img src="images/feature-properties/fp-1.jpg" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1."><?php echo $building_name?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span>Est St, 77 - Central Park South, NYC</span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span><?php echo $no_of_bedroom?></span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span><?php echo $no_of_bathroom?></span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span><?php echo $area?></span>
                                            </li>
                                        </ul>
                                        <!-- Price -->
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a><?php echo 'BDT '.$buy_price?></a>
                                            </h3>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="agents-grid" data-aos="zoom-in">
                            <div class="landscapes">
                                <div class="project-single no-mb">
                                    <div class="project-inner project-head">
                                        <div class="project-bottom">
                                            <h4><a href="single-property-1.html">View Property</a><span class="category">Real Estate</span></h4>
                                        </div>
                                        <div class="homes">
                                            <!-- homes img -->
                                            <a href="single-property-1.html" class="homes-img">
                                                <div class="homes-tag button alt featured">Featured</div>
                                                <div class="homes-tag button sale rent"><?php echo $status1   ?></div>
                                                <img src="images/feature-properties/fp-4.jpg" alt="home-1" class="img-responsive">
                                            </a>
                                        </div>
                                        <div class="button-effect">
                                            <a href="single-property-1.html" class="btn"><i class="fa fa-link"></i></a>
                                            <a href="https://www.youtube.com/watch?v=2xHQqYRcrx4" class="btn popup-video popup-youtube"><i class="fas fa-video"></i></a>
                                            <a href="single-property-2.html" class="img-poppu btn"><i class="fa fa-photo"></i></a>
                                        </div>
                                    </div>
                                    <!-- homes content -->
                                    <div class="homes-content">
                                        <!-- homes address -->
                                        <h3><a href="single-property-1.html"><?php echo $building_name1  ?></a></h3>
                                        <p class="homes-address mb-3">
                                            <a href="single-property-1.html">
                                                <i class="fa fa-map-marker"></i><span></span>
                                            </a>
                                        </p>
                                        <!-- homes List -->
                                        <ul class="homes-list clearfix pb-3">
                                            <li class="the-icons">
                                                <i class="flaticon-bed mr-2" aria-hidden="true"></i>
                                                <span><?php echo $no_of_bedroom1   ?></span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-bathtub mr-2" aria-hidden="true"></i>
                                                <span><?php echo $no_of_bathroom1   ?></span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-square mr-2" aria-hidden="true"></i>
                                                <span><?php echo $area1   ?></span>
                                            </li>
                                            <li class="the-icons">
                                                <i class="flaticon-car mr-2" aria-hidden="true"></i>
                                                <span></span>
                                            </li>
                                        </ul>
                                        <!-- Price -->
                                        <div class="price-properties footer pt-3 pb-0">
                                            <h3 class="title mt-3">
                                                <a href="single-property-1.html"><?php echo 'BDT '.$buy_price1 ?></a>
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
                        
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION RECENTLY PROPERTIES -->

        <!-- START SECTION SERVICES -->
        <section class="services-home">
            <div class="container">
                <div class="section-title">
                    <h3>Property</h3>
                    <h2>Services</h2>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12 m-top-0 m-bottom-40" data-aos="fade-up" data-aos-delay="150">
                        <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                            <div class="media">
                                <i class="fa fa-home bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                            </div>
                            <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                                <h4 class="m-bottom-15 text-bold-700">Houses</h4>
                                <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                                <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 m-top-40 m-bottom-40" data-aos="fade-up" data-aos-delay="250">
                        <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                            <div class="media">
                                <i class="fas fa-building bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                            </div>
                            <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                                <h4 class="m-bottom-15 text-bold-700">Apartments</h4>
                                <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                                <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 m-top-40 m-bottom-40 commercial" data-aos="fade-up" data-aos-delay="350">
                        <div class="service bg-light-2 border-1 border-light box-shadow-1 box-shadow-2-hover">
                            <div class="media">
                                <i class="fas fa-warehouse bg-base text-white rounded-100 box-shadow-1 p-top-5 p-bottom-5 p-right-5 p-left-5"></i>
                            </div>
                            <div class="agent-section p-top-35 p-bottom-30 p-right-25 p-left-25">
                                <h4 class="m-bottom-15 text-bold-700">Commercial</h4>
                                <p>Nonec pede justo fringilla vel aliquet nec vulputate eget arcu in enim justo rhoncus ut imperdiet venenatis vitae justo.</p>
                                <a class="text-base text-base-dark-hover text-size-13" href="properties-full-list.html">Read More <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION SERVICES -->

        <!-- START SECTION POPULAR PLACES -->
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
                        <a href="properties-map.html" class="img-box hover-effect">
                            <img src="images/popular-places/12.jpg" class="img-responsive" alt="">
                            <!-- Badge -->
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="img-box-content visible">
                                <h4>Dhaka</h4>
                                <span>203 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-6" data-aos="fade-left">
                        <!-- Image Box -->
                        <a href="properties-map.html" class="img-box hover-effect">
                            <img src="images/popular-places/13.jpg" class="img-responsive" alt="">
                            <div class="img-box-content visible">
                                <h4>Mymensingh</h4>
                                <span>307 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-8 col-md-6" data-aos="fade-right">
                        <!-- Image Box -->
                        <a href="properties-map.html" class="img-box hover-effect no-mb">
                            <img src="images/popular-places/14.jpg" class="img-responsive" alt="">
                            <div class="img-box-content visible">
                                <h4>Sylhet</h4>
                                <span>409 Properties</span>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6" data-aos="fade-left">
                        <!-- Image Box -->
                        <a href="properties-map.html" class="img-box hover-effect no-mb x3">
                            <img src="images/popular-places/15.jpg" class="img-responsive" alt="">
                            <!-- Badge -->
                            <div class="listing-badges">
                                <span class="featured">Featured</span>
                            </div>
                            <div class="img-box-content visible">
                                <h4>Barisal</h4>
                                <span>507 Properties</span>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION POPULAR PLACES -->

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

        <!-- START SECTION TESTIMONIALS -->
        <section class="testimonials bg-gray">
            <div class="container">
                <div class="section-title">
                    <h3>Happy</h3>
                    <h2>Customers</h2>
                </div>
                <div class="owl-carousel style1">
                    <div class="test-1" data-aos="zoom-in">
                        <h3>Lisa Smith</h3>
                        <img src="images/testimonials/ts-1.jpg" alt="">
                        <h6 class="mt-2">New York</h6>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="zoom-in">
                        <h3>Jhon Morris</h3>
                        <img src="images/testimonials/ts-2.jpg" alt="">
                        <h6 class="mt-2">Los Angeles</h6>

                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="zoom-in">
                        <h3>Mary Deshaw</h3>
                        <img src="images/testimonials/ts-3.jpg" alt="">
                        <h6 class="mt-2">Chicago</h6>

                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="zoom-in">
                        <h3>Gary Steven</h3>
                        <img src="images/testimonials/ts-4.jpg" alt="">
                        <h6 class="mt-2">Philadelphia</h6>

                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="zoom-in">
                        <h3>Cristy Mayer</h3>
                        <img src="images/testimonials/ts-5.jpg" alt="">
                        <h6 class="mt-2">San Francisco</h6>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                    <div class="test-1" data-aos="zoom-in">
                        <h3>Ichiro Tasaka</h3>
                        <img src="images/testimonials/ts-6.jpg" alt="">
                        <h6 class="mt-2">Houston</h6>
                        <p>Lorem ipsum dolor sit amet, ligula magna at etiam aliquip venenatis. Vitae sit felis donec, suscipit tortor et sapien donec.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION TESTIMONIALS -->


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
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum incidunt architecto soluta laboriosam, perspiciatis, aspernatur officiis esse.</p>
                            </div>
                            <div class="contactus">
                                <ul>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                                            <p class="in-p">95 South Park Avenue, USA</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="info">
                                            <i class="fa fa-phone" aria-hidden="true"></i>
                                            <p class="in-p">+456 875 369 208</p>
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
                                        <li><a href="index.html">Home</a></li>
                                    </ul>
                                    <ul class="nav-right">
                                        <li><a href="about.html">About Us</a></li>
                                        <li class="no-mgb"><a href="contact-us.html">Contact Us</a></li>
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