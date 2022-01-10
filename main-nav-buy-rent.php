                    <!-- Left Side Content -->
                    <div class="left-side">
                        <!-- Logo -->

                        <?php if (is_customer() == false) : ?>
                            <div id="logo">
                                <a href="index.php"><img src="images/logo-red.svg" alt=""></a>
                            </div>
                        <?php endif; ?>

                        <?php if (is_customer() == true) : ?>
                            <div id="logo">
                                <a href="Customer_Dashboard.php"><img src="images/logo-red.svg" alt=""></a>
                            </div>
                        <?php endif; ?>


                        <!-- Mobile Navigation -->
                        <div class="mmenu-trigger">
                            <button class="hamburger hamburger--collapse" type="button">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                        <!-- Main Navigation -->
                        <nav id="navigation" class="style-1 head-tr">
                            <ul id="responsive">

                                <?php if (is_customer() == false) : ?>
                                    <li><a href="index.php">Home</a></li>
                                <?php endif; ?>

                                <?php if (is_customer() == true) : ?>
                                    <li><a href="Customer_Dashboard.php">Home</a></li>
                                <?php endif; ?>

                                <li><a href="#">Property List</a>
                                    <ul>
                                        <li><a href="Customer_Buy_list.php">Buy List</a></li>
                                        <li><a href="Customer_Rent_list .php">Rent List</a></li>
                                    </ul>
                                </li>

                                <li><a href="about.php">About Us</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </nav>
                        <!-- Main Navigation / End -->
                    </div>

                    <?php
                    if (isset($_SESSION['customer_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $customer_id = $_SESSION['customer_id'];
                        $username = $_SESSION['username'];
                        $name = $_SESSION['name'];

                        $stmt = query("SELECT user_email, user_image FROM users WHERE user_id={$user_id}");
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $user_email = $row['user_email'];
                        $user_image = $row['user_image'];
                    } elseif(isset($_SESSION['admin_id'])) {
                        $user_id = $_SESSION['user_id'];
                        $name = $_SESSION['name'];
                    }

                    ?>


                    <?php if (is_customer() == true) : ?>
                        <div class="header-user-menu user-menu add">
                            <div class="header-user-name">
                                <span><img src="<?php echo $user_image; ?>" alt=""></span>Hi, <?php echo $username; ?>!
                            </div>
                            <ul>
                                <li><a href="Customer_user_profile.php"> Profile</a></li>
                                <li><a href="Customer_change_password.php"> Change Password</a></li>
                                <li><a href="includes/logout.php">Log Out</a></li>
                            </ul>
                        </div>
                    <?php endif; ?>

                    <div class="right-side d-none d-none d-lg-none d-xl-flex sign ml-0">
                        <!-- Header Widget -->

                        <?php if (is_logged_in() == false) : ?>
                            <div class="header-widget sign-in">
                                <a href="login.php">Login</a>
                            </div>
                        <?php endif; ?>

                        <?php if (is_admin() == true) : ?>
                            <div class="header-widget sign-in">
                                <a href="admin_marketing/marketing_admin_dashboard.php">Admin Panel</a>
                            </div>
                        <?php endif; ?>

                        <?php if (is_client() == true) : ?>
                            <div class="header-widget sign-in">
                                <a href="client_users/client_dashboard.php">Client Panel</a>
                            </div>
                        <?php endif; ?>
                        <!-- Right Side Content / End -->