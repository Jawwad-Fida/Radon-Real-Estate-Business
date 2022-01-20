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
                    <a href="accounting_admin_dashboard.php">
                        <i class="fa fa-map-marker"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo1"><i class="fa fa-list" aria-hidden="true"></i> Add Utility Bill <i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo1" class="collapse" class="active">
                        <li>
                            <a href="property_list.php"><i class="fa fa-plus"></i>Property List </a>
                        </li>                      
                    </ul>
                </li>

                <li>
                    <a href="building_invoice_list.php">
                        <i class="fa fa-list"></i> Invoice Bill List <i class="fa fa-fw "></i>
                    </a>
                </li>
                
                <li>
                    <a href="javascript:;" data-toggle="collapse" data-target="#demo4"><i class="fa fa-user-circle" aria-hidden="true"></i> Owner-Client<i class="fa fa-fw fa-caret-down"></i></a>
                    <ul id="demo4" class="collapse" class="active">
                        <li>
                            <a href="owner_building_list.php">
                                <i class="fa fa-address-card-o" ></i>Owner Client List
                            </a>
                            <a href="rent_building_list.php">
                                <i class="fa fa-address-card" ></i>Rent Client List
                            </a>
                        </li>

                    </ul>
                </li>


                <li>
                    <a href="payment_history.php">
            
                        <i class="far fa-credit-card"></i>Payments
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>