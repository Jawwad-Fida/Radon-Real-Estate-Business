<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";

$building_name="";
$flat_no="";
$client_username="";

if (isset($_GET['d_building']) && isset($_GET['d_flat']) && isset($_GET['d_username'])) 
    $building_name=$_GET['d_building'];
    $flat_no=$_GET['d_flat'];
    $client_username=$_GET['d_username'];

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
                                <h4 class="title">Invoice Bill List</h4>
                                <div class="section-body listing-table">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Invoice No</th>
                                                    <th>Building Name</th> 
                                                    <th>Flat No</th>
                                                    <th>Client Username</th>  
                                                    <th>Billing Month</th>  
                                                    <th>Issue Date</th>  
                                                    <th>Due Date</th>  
                                                    <th>Current Bill</th>  
                                                    <th>Arrear</th>                                                 
                                                    <th>Due Charge</th>
                                                    <th>Status</th>
                                                    <th>Total Bill</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php
                                                //JOIN query
                                                $stmt = query("SELECT * 
                                                              FROM invoice 
                                                              WHERE flat_no='$flat_no' and building_name='$building_name'");
                                                
                                                


                                                #$stmt = query("SELECT * FROM building WHERE building_name != 'Test Case 1' AND building_name != 'Test Case 2'
                                                #AND building_name != 'Test Case 3' AND building_name != 'Test Case 4' AND building_name != 'Test Case 5' 
                                                #AND building_name != 'Test Case 6' AND building_name != 'Test Case 7' AND building_name != 'Test Case 8'");       

                                                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                                    $invoice_no= $row['invoice_no'];
                                                    $building_name=$row['building_name'];                                          
                                                    $flat_no = $row['flat_no'];
                                                    $client_username= $row['client_username'];
                                                    $billing_month=$row['billing_month'];
                                                    $issue_date=$row['issue_date'];
                                                    $due_date=$row['due_date'];
                                                    $current_bill=$row['current_bill'];
                                                    $arrear=$row['arrear'];                                      
                                                    $due_charge = $row['due_charge'];
                                                    $status= $row['status'];
                                                    $total_bill= $row['total_bill'];                                                 

                                                    //close php tag so that we can include some html inside the php while loop
                                                ?>


                                                    <tr>
                                                        <td><?php echo $invoice_no; ?></td>
                                                        <td><?php echo $building_name; ?></td> 
                                                        <td><?php echo $flat_no; ?></td> 
                                                        <td><?php echo $client_username; ?></td> 
                                                        <td><?php echo $billing_month; ?></td> 
                                                        <td><?php echo $issue_date; ?></td> 
                                                        <td><?php echo $due_date; ?></td> 
                                                        <td><?php echo $current_bill; ?></td> 
                                                        <td><?php echo $arrear; ?></td> 
                                                        <td><?php echo $due_charge; ?></td>
                                                        <td><?php echo $status; ?></td>
                                                        <td><?php echo $total_bill; ?></td>

                                                        <td class="edit"><a  onclick="deletefn('<?php echo $row['building_name'] ?>','<?php echo $row['flat_no'] ?>','<?php echo $row['invoice_no'] ?>');" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-trash font-14"></i></a></td>     
                                                    </tr>

                                                <?php } ?>

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

          
            function deletefn(del_b,del_f,del_id)
                {
                     var choice=confirm("Do you want to delete this?");
                     if(choice)
                     {
                          location.assign("delete_invoice_bill.php?d_b="+del_b+ "&d_f="+del_f+ "&d_id="+del_id);
                     }
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

<!-- Mirrored from code-theme.com/html/findhouses/add-property.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Dec 2021 10:32:33 GMT -->

</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>
