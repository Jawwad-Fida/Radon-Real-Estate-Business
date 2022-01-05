<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
        <div class="sidebar-header"><img src="images/logo-blue.svg" alt="header-logo2.png"> </div>

        <?php
        $user_id = $_SESSION['user_id'];

        $stmt = query("SELECT user_image FROM users WHERE user_id={$user_id}");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_image = $row['user_image'];

        ?>

        <div class="header clearfix">
            <img src="<?php echo $user_image; ?>" alt="avatar" class="img-fluid profile-img">
        </div>
        <div class="active-user">
            <h2><?php echo $_SESSION['name']; ?></h2>
        </div>
        <div class="detail clearfix">
            <ul class="mb-0">
                <li>
                    <a href="marketing_admin_dashboard.php">
                        <i class="fa fa-map-marker"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-list" aria-hidden="true"></i> Add Properties <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo1" class="collapse" class="active">
                        <li>
                            <a href="add-property.php"><i class="fa fa-plus"></i> Add Property </a>
                        </li>
                        <li>
                            <a href="add-apartment.php"><i class="fa fa-plus"></i> Add Apartment </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-list" aria-hidden="true"></i> View Properties <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo2" class="collapse" class="active">
                        <li>
                            <a href="view-property.php"> View Property </a>
                        </li>
                        <li>
                            <a href="view-Rent-apartment.php"> View Apartment For Rent </a>
                        </li>
                        <li>
                            <a href="view-Buy-apartment.php"> View Apartment For Buy </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-user-circle" aria-hidden="true"></i> Customer-Client<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo4" class="collapse" class="active">
                        <li>
                            <a href="view_customers.php">
                                <i></i>Customer List
                            </a>
                        </li>
                        <li>
                            <a href="view_clients.php">
                                <i></i>Client List
                            </a>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="#">
                        <i class="fas fa-credit-card"></i>Payments
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>