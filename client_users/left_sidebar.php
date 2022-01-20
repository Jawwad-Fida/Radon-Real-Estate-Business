<div class="col-lg-3 col-md-12 col-xs-12 pl-0 pr-0 user-dash">
    <div class="user-profile-box mb-0">
        <div class="sidebar-header"><img src="images/logo-blue.svg" alt="header-logo2.png"> </div>

        <?php
        $user_id = $_SESSION['user_id'];

        $stmt = query("SELECT user_image 
                       FROM users 
                       WHERE user_id={$user_id}");

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
                    <a href="client_dashboard.php">
                        <i class="fa fa-map-marker"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo2"><i class="fa fa-list" aria-hidden="true"></i> View Apartments <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo2" class="collapse" class="active">
                        <li>
                            <a href="view-Rent-apartment.php"> Owned Rented Apartments </a>
                        </li>
                        <li>
                            <a href="view-Buy-apartment.php"> Owned Buy Apartments </a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="show_invoice.php">
                        <i class="fas fa-credit-card"></i>Invoice History
                    </a>
                </li>
                <li>
                    <a href="payment_history.php">
                        <i class="fab fa-cc-mastercard"></i>Payment History
                    </a>
                </li>
                <li>
                    <a href="view_complaints.php">
                        <i class="fa fa-archive"></i>View Complaints
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>