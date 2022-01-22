<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";
include "upload-image.php";
?>

<?php

if (isset($_POST['add_submit'])) {

    $flat_num = validate($_POST['flat_num']);
    $area = validate($_POST['area']);
    $apart_status = $_POST['apart_status'];
    $type = $_POST['type'];
    $booking_status = $_POST['booking_status'];
    $buy_price = validate($_POST['buy_price']);
    $rent_price = validate($_POST['rent_price']);
    $no_of_bedroom = $_POST['no_of_bedroom'];
    $no_of_bathroom = $_POST['no_of_bathroom'];
    $Division = $_POST['Division'];
    $building_name = $_POST['building_name'];
    $building_id = $_POST['building_id'];
    $build_num = $_POST['build_num'];
    $address = $_POST['address'];

    //Test Case buildings
   


    //Checkbox values - Apartment Features
    $aDoor = $_POST['formDoor']; //array
    $chk = "";
    if (empty($aDoor)) {
        $chk = "No Features available";
    } else {
        foreach ($aDoor as $chk1) {
            $chk .= $chk1 . ",";
        }
        //print($chk);
    }

    //Check for errors
    if (empty($building_id) ||empty($building_name) || empty($flat_num) || empty($no_of_bedroom) || empty($no_of_bathroom) || empty($buy_price) || empty($rent_price) || empty($area) || empty($Division) || empty($build_num) || empty($address)) {
        redirect("add-apartment.php?error=emptyFields");
        exit();
    }

    //For Files, we need $_FILES['form_name']['property'] - FILES have 5 properties
    $apartment_image = $_FILES['apartment_image']['name'];
    $apartment_image_temp = $_FILES['apartment_image']['tmp_name'];
    $fileError = $_FILES['apartment_image']['error'];
    $fileSize = $_FILES['apartment_image']['size'];

    //Upload File
    $apartment_image_upload = upload_apartment_image($apartment_image, $apartment_image_temp, $fileError, $fileSize);
    
    if ($apartment_image_upload == NULL) {
		// if no image has been uploaded, then place a placeholder
		$apartment_image_upload = "http://placehold.it/200x200";
	}

    //------------QUERY-------------

    $stmt = prepare_query("INSERT INTO apartment(building_id,building_name,flat_no,no_of_bedroom,no_of_bathroom,image,buy_price,rent_price,area,status,type,apartment_status,features,division,build_num,address) 
    VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
    $stmt->bindParam(1, $building_id, PDO::PARAM_INT);
    $stmt->bindParam(2, $building_name, PDO::PARAM_STR);
    $stmt->bindParam(3, $flat_num, PDO::PARAM_INT);
    $stmt->bindParam(4, $no_of_bedroom, PDO::PARAM_INT);
    $stmt->bindParam(5, $no_of_bathroom, PDO::PARAM_INT);
    $stmt->bindParam(6, $apartment_image_upload, PDO::PARAM_STR);
    $stmt->bindParam(7, $buy_price, PDO::PARAM_INT);
    $stmt->bindParam(8, $rent_price, PDO::PARAM_INT);
    $stmt->bindParam(9, $area, PDO::PARAM_STR);
    $stmt->bindParam(10, $booking_status, PDO::PARAM_STR);
    $stmt->bindParam(11, $type, PDO::PARAM_STR);
    $stmt->bindParam(12, $apart_status, PDO::PARAM_STR);
    $stmt->bindParam(13, $chk, PDO::PARAM_STR);
    $stmt->bindParam(14, $Division, PDO::PARAM_STR);
    $stmt->bindParam(15, $build_num, PDO::PARAM_STR);
    $stmt->bindParam(16, $address, PDO::PARAM_STR);

    $stmt->execute();
    //$last_id = last_inserted_id();
    unset($stmt);

    #redirect("add_fooditem.php?success=product_add&cat_id={$product_category}");
    redirect("add-apartment.php?success=item_add");
}


?>

<!DOCTYPE html>
<html lang="zxx">


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:32 GMT -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="html 5 template">
    <meta name="author" content="">
    <title>Add Apartment</title>
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
        <?php include "navigation.php"; ?>

        <div class="clearfix"></div>
        <!-- Header Container / End -->

        <!-- START SECTION USER PROFILE -->
        <section class="user-page section-padding pt-5">
            <div class="container-fluid">
                <div class="row">

                    <?php include "left_sidebar.php" ?>

                    <div class="col-lg-9 col-md-12 col-xs-12 royal-add-property-area section_100 pl-0 user-dash2">

                        <!-- Display error messages -->
                        <?php display_error_message(); ?>

                        <!-- Display success messages -->
                        <?php display_success_message(); ?>

                        <div class="single-add-property">
                            <h3>Add apartment information</h3>
                            <div class="property-form-group">

                                <form action="" method="post" enctype="multipart/form-data">

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Flat No.</label>
                                                <input type="text" name="flat_num" placeholder="Enter Flat Number" id="price">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="build_num">Building No.</label>
                                                <input type="text" name="build_num" placeholder="Enter Building Number" id="">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="building_name">Building Name</label>
                                                <input type="text" name="building_name" placeholder="Enter Building Name" id="">
                                            </p>
                                        </div>
                                        <br>
                                        
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="building_id">Building ID</label>
                                                <input type="text" name="building_id" placeholder="Enter Building ID" id="">
                                            </p>
                                        </div>
                                
                                        <div class="col-lg-4 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Size</label>
                                                <input type="text" name="area" placeholder="Sqft" id="area">
                                            </p>
                                        </div>
                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="address">Address</label>
                                                <select class="form-control" name="address">
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
                                                <option value="Mirpur">Mirpur</option>                                                            <option value="Chittagong">Chittagong</option>
                                                </select>
                                            </div>
                                        </div>
                    
                                    </div>
                                    <br>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Apartment Status</label>
                                                <select class="form-control" name="apart_status">
                                                    <option value="Rent">Rent</option>
                                                    <option value="Buy">Buy</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Type</label>
                                                <select class="form-control" name="type">
                                                    <option value="House">House</option>
                                                    <option value="Commercial">Commercial</option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Booking Status</label>
                                                <select class="form-control" name="booking_status">
                                                    <option value="Booked">Booked</option>
                                                    <option value="Not Booked">Not Booked</option>
                                                </select>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb">
                                                <label for="price">Buy Price</label>
                                                <input type="text" name="buy_price" placeholder="BDT" id="price">
                                            </p>
                                        </div>
                                        <div class="col-lg-6 col-md-12">
                                            <p class="no-mb last">
                                                <label for="area">Rent Price</label>
                                                <input type="text" name="rent_price" placeholder="BDT" id="price">
                                            </p>
                                        </div>
                                    </div>
                                    <br>

                                    <div class="row">

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">No. of Bedroom</label>
                                                <select class="form-control" name="no_of_bedroom">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">No. of Bathroom</label>
                                                <select class="form-control" name="no_of_bathroom">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-12 dropdown faq-drop">
                                            <div class="form-group categories">
                                                <label for="city">Division</label>
                                                <select class="form-control" name="Division">
                                                    <option value="Dhaka">Dhaka</option>
                                                    <option value="Chittagong">Chittagong</option>
                                                    
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="product-title"> Upload Appartment Image</label>
                                            <input type="file" name="apartment_image">
                                        </div>
                                    </div>
                            </div>
                        </div>

                        <div class="single-add-property">
                            <h3>Property Features</h3>
                            <div class="property-form-group">

                                <div class="row">
                                    <div class="col-md-12">
                                        <ul class="pro-feature-add pl-0">
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-a" type="checkbox" name="formDoor[]" value="Air Conditioning">
                                                        <label for="check-a">Air Conditioning</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-b" type="checkbox" name="formDoor[]" value="Swimming Pool">
                                                        <label for="check-b">Swimming Pool</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-c" type="checkbox" name="formDoor[]" value="Central Heating">
                                                        <label for="check-c">Central Heating</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-d" type="checkbox" name="formDoor[]" value="Laundry Room">
                                                        <label for="check-d">Laundry Room</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-e" type="checkbox" name="formDoor[]" value="Gym">
                                                        <label for="check-e">Gym</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-g" type="checkbox" name="formDoor[]" value="Alarm">
                                                        <label for="check-g">Alarm</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-h" type="checkbox" name="formDoor[]" value="Window Covering">
                                                        <label for="check-h">Window Covering</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-i" type="checkbox" name="formDoor[]" value="Refrigerator">
                                                        <label for="check-i">Refrigerator</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-j" type="checkbox" name="formDoor[]" value="TV Cable & WIFI">
                                                        <label for="check-j">TV Cable & WIFI</label>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="fl-wrap filter-tags clearfix">
                                                <div class="checkboxes float-left">
                                                    <div class="filter-tags-wrap">
                                                        <input id="check-k" type="checkbox" name="formDoor[]" value="Microwave">
                                                        <label for="check-k">Microwave</label>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="add-property-button pt-5">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="prperty-submit-button">
                                                <button type="submit" name="add_submit">Submit Property</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                </form>

                            </div>
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
        <script src="js/popper.min.js"></script>
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
            $(".dropzone").dropzone({
                dictDefaultMessage: "<i class='fa fa-cloud-upload'></i> Click here or drop files to upload",
            });
        </script>
        <script>
            $(".header-user-name").on("click", function() {
                $(".header-user-menu ul").toggleClass("hu-menu-vis");
                $(this).toggleClass("hu-menu-visdec");
            });
        </script>

    </div>
    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:33 GMT -->

</html>