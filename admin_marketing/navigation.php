<?php

if($_SESSION['admin_type'] != 'marketing'){
    session_unset();
    session_destroy();
    redirect("../login.php?error=not_login");
}

?>


<div class="dash-content-wrap">
    <header id="header-container" class="db-top-header">
        <!-- Header -->
        <div id="header">
            <div class="container-fluid">
                <!-- Left Side Content -->
                <div class="left-side">
                    <!-- Logo -->
                    <div id="logo">
                        <a href="index-2.html"><img src="images/logo.svg" alt=""></a>
                    </div>
                    <!-- Mobile Navigation -->
                    <div class="mmenu-trigger">
                        <button class="hamburger hamburger--collapse" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>

                    <!-- Main Navigation -->
                    <nav id="navigation" class="style-1">
                        <ul id="responsive">
                            <li><a href="../index.php">Home</a>
                            </li>                                                
                            <li><a href="view_appointment.php">Appointment</a></li>                         
                        </ul>
                    </nav>
                    <div class="clearfix"></div>
                    <!-- Main Navigation / End -->
                </div>
                <!-- Left Side Content / End -->
                <?php
                $user_id = $_SESSION['user_id'];
    
                $stmt = query("SELECT user_image FROM users WHERE user_id={$user_id}");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $user_image = $row['user_image'];

                ?>

                <div class="header-user-menu user-menu">
                    <div class="header-user-name">
                        <span><img src="<?php echo $user_image; ?>" alt=""></span>Hi, <?php echo $_SESSION['username']; ?>!
                    </div>
                    <ul>
                        <li><a href="user-profile.php"> Edit profile</a></li>
                        
                        <li><a href="change_password.php"> Change Password</a></li>
                        <li><a href="../includes/logout.php">Log Out</a></li>
                    </ul>
                </div>
                <!-- Right Side Content / End -->
            </div>
        </div>
        <!-- Header / End -->
    </header>
</div>