<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";


$username = $_SESSION['username'];
$name = $_SESSION['name'];

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
    <title>View Property</title>
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

                        <!-- Display success messages -->
                        <?php display_success_message(); ?>

                        <div class="dashborad-box stat bg-white">

                            <div class="dashborad-box">
                                <h4 class="title">Invoice List</h4>
                                <div class="section-body listing-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Invoice ID</th>
                                                    <th>Action</th>  
                                                    <th>Building Name</th>
                                                    <th>Flat_no</th>
                                                    <th>Billing Month</th>
                                                    <th>Issue Date</th>
                                                    <th>Due Date</th>
                                                    <th>Water Bill</th>
                                                    <th>Electricity Bill</th>
                                                    <th>Gas Bill</th>
                                                    <th>Additional Bill</th>
                                                    <th>Service charge </th>
                                                    <th>Arrearl</th>
                                                    <th>Due Charge </th>
                                                    <th>Total Bill</th>
                                                    <th>Status</th> 
                                                        
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                //JOIN query
                                                $stmt = query("SELECT * 
                                                               FROM invoice
                                                               WHERE  client_username ='$name' ");
                                                
                                                $table= $stmt->fetchall();

                                                for($i=0 ; $i<count($table) ; $i++)
                                                {
                                                    $row = $table[$i];                                       
                                                ?>


                                                    <tr>
                                                        <td>
                                                            <input type="button" class="btn btn-link" value="<?php echo $row['invoice_no']?>" 
                                                                    onclick="show_invoice('<?php echo $row['invoice_no']?>');">
                                                        </td>
                                                        <td>
                                                    
                                                            <a href="../example_hosted.php?amount=<?php echo $row['total_bill']; ?>&invoice_id=<?php echo $row['invoice_no']; ?>&invoice_date=<?php echo $row['issue_date']; ?>" onclick="javascript: return confirm('Do want to proceed to payment?');"><i class="fas fa-credit-card"></i></a>                    
                                                        </td>

                                                        <td><?php echo $row['building_name']?></td>
                                                        <td><?php echo $row['flat_no']?></td>
                                                        <td><?php echo $row['billing_month']?></td>
                                                        <td><?php echo $row['issue_date']?></td>
                                                        <td><?php echo $row['due_date']?></td>
                                            
                                                    <?php 
                                                        $b_month=$row['billing_month'];
                                                        $flat_no= $row['flat_no'];
                                                        $building_name= $row['building_name'];

                                                        $stmt1 = query("SELECT * 
                                                                        FROM utility_bill
                                                                        WHERE building_name='$building_name' 
                                                                        AND flat_no='$flat_no' 
                                                                        AND month='$b_month' 

                                                                      ");

                                                        $table1=$stmt1->fetchAll();

                                                        for($j=0;$j<count($table1);$j++)
                                                        {
                                                            $row1=$table1[$j];
                                                            
                                                    ?>
                                                            <td><?php echo $row1['water_bill']?></td>
                                                            <td><?php echo $row1['electricity_bill']?></td>
                                                            <td><?php echo $row1['gas_bill']?></td>
                                                            <td><?php echo $row1['additional_bill']?></td>
                                                            <td><?php echo $row1['service_charge']?></td>
                                                    <?php

                                                        }                     
                                                    ?>
                                                        <td><?php echo $row['arrear']?></td>
                                                        <td><?php echo $row['due_charge']?></td>
                                                        <td><?php echo $row['total_bill']?></td>
                                                        <td><?php echo $row['status']?></td>
                                                        
                                                </tr>

                                                <?php

                                                } 
                                                                    
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- END SECTION USER PROFILE -->


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

          
            function show_invoice(invoice_no)
                {
                     
                    location.assign("invoice_page.php?i_no="+invoice_no);
                    
                }
               
        </script>

    </div>


    <!-- Wrapper / End -->
</body>


<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:33 GMT -->

</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>
