<?php

declare(strict_types=1);
session_start();
ob_start();

include "../includes/connect.php";
include "../includes/functions.php";



    if (isset($_POST['add_submit'])&& isset($_POST['issue_date']) && isset($_POST['due_date']) && isset($_GET['d_building']) 
        && isset($_GET['d_flat']) && isset($_GET['d_status'])) 
    {

        $billing_month=$_POST['billing_month'];
        $issue_date=$_POST['issue_date'];
        $building_name=$_GET['d_building'];
        $flat_no= $_GET['d_flat'];
        $flat_status= $_GET['d_status'];
        $due_date=$_POST['due_date'];
        
        
        $stmt = query("SELECT total_bill 
                       FROM invoice
                       WHERE building_name='$building_name' 
                       AND flat_no= '$flat_no'    
                       AND Status ='unpaid'");
           
        $table=$stmt->fetchAll();

        $previous_bill=0;
        $due_charge=0;
        
        if (count($table)>0) {
            $table_length=count($table);
            $i=$table_length-1;
            $due_charge=500;
            $previous_bill=$table[$i]['total_bill'];
        }
       
       
        $stmt = query("SELECT *  
                       FROM utility_bill 
                       WHERE flat_no= '$flat_no' 
                       AND building_name='$building_name' 
                       AND month='$billing_month'
                      ");
    
        $current_bill=0;
        $total_bill=0;
        $table=$stmt->fetchAll();

        if (count($table)>0) {
            $current_bill=$table[0]['water_bill']+
                          $table[0]['gas_bill']+
                          $table[0]['electricity_bill']+
                          $table[0]['additional_bill']+
                          $table[0]['service_charge'];
        }

        $total_bill=$current_bill+$previous_bill+$due_charge;

        $stmt = query("SELECT name  
                       FROM clients
                       WHERE flat_number= '$flat_no' 
                       AND building_name='$building_name'");
    
        $table=$stmt->fetchAll();

        $username="";
        
        if (count($table)>0) {
            $username=$table[0]['name'];
        }
        print_r($username);

        $stmt = query("SELECT * 
                       FROM invoice 
                       WHERE building_name='$building_name' 
                       AND flat_no='$flat_no' 
                       AND billing_month='$billing_month'");
   
        $status="unpaid";

        if ($stmt->rowCount()==0) 
        {
            $stmt = prepare_query("INSERT INTO invoice (building_name,flat_no,client_username,billing_month,issue_date,due_date,current_bill,arrear,due_charge,status,total_bill)
                               VALUES(?,?,?,?,?,?,?,?,?,?,?)");

        
                                $stmt->bindParam(1,$building_name, PDO::PARAM_STR);
                                $stmt->bindParam(2,$flat_no, PDO::PARAM_INT);
                                $stmt->bindParam(3,$username, PDO::PARAM_STR);
                                $stmt->bindParam(4,$billing_month, PDO::PARAM_STR);
                                $stmt->bindParam(5,$issue_date, PDO::PARAM_STR);
                                $stmt->bindParam(6,$due_date, PDO::PARAM_INT);
                                $stmt->bindParam(7,$current_bill, PDO::PARAM_INT);
                                $stmt->bindParam(8,$previous_bill, PDO::PARAM_INT);
                                $stmt->bindParam(9,$due_charge, PDO::PARAM_INT);
                                $stmt->bindParam(10,$status, PDO::PARAM_INT);
                                $stmt->bindParam(11,$total_bill, PDO::PARAM_STR);

                              
     
            $stmt->execute();

            unset($stmt);

            redirect("apartment_list.php?success=invoice_created"."&b_name=". $building_name);
        } 
        else 
        {
            redirect("apartment_list.php?error=invoice_exits"."&b_name=". $building_name);
        }
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

                        <!-- Display error messages -->
                        <?php display_error_message(); ?>
                        
                        <div class="dashborad-box stat bg-white">
                            <div class="dashborad-box">
                                <aside class="col-lg-4 col-md-12 car">
                                    <div class="single widget">
                                        <div class="schedule widget-boxed mt-33 mt-0">
                                            <div class="widget-boxed-header">
                                                <h4><i class="fa fa-money"></i>Create Invoice</h4>
                                            </div>
                                        </div>                                   
                                        <form method="post" action="" enctype="multipart/form-data">
                                            <div class="agent-contact-form-sidebar">
                                                <div class="row">
                                                    <div class="col-lg-6 col-md-12 book">
                                                    <label for="issue_date">Issue Date</label>
                                                        <input type="date" name="issue_date" id="issue_date"  data-lang="en" data-large-mode="true" data-min-year="2021" data-max-year="2025" data-id="datedropper-0" data-theme="my-style" class="form-control"> 
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                    <label for="Due_date">Due Date</label>
                                                         <input type="date" name="due_date" id="due_date" data-lang="en" data-large-mode="true" data-min-year="2021" data-max-year="2025" data-id="datedropper-0" data-theme="my-style" class="form-control">
                                                    </div>
                                                    <div class="col-lg-6 col-md-12">
                                                    <label for="issue_date">Billing Month</label>
                                                        <input type="month" name="billing_month" id="billing_month"  data-lang="en" data-large-mode="true" data-min-year="2021" data-max-year="2025" data-id="datedropper-0" data-theme="my-style" class="form-control"> 
                                                    </div>                          
                                                </div>
                                                <button type="submit" name="add_submit">Submit</button>                                            
                                            </div>
                                        </form>
                                    </div>
                                </aside>
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
