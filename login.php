<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
?>

<?php
if (isset($_POST['login_submit'])) {
    $username = validate($_POST['username']);
    $user_password = validate($_POST['user_password']);

    //check for errors
    if (empty($username) || empty($user_password)) {
        redirect("login.php?error=emptyFields");
        exit();
    }

    //check if username exists in database
    $stmt = login_user_exists($username);

    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        //user exists
        //dehash the password from database (returns true or false)
        $pwdCheck = password_verify($user_password, $row['user_password']);

        //if password doesn't match (false)
        if ($pwdCheck == false) {
            //don't log in user
            redirect("login.php?error=password");
            exit();
        } else {
            //password is correct (true) - log in user
            session_start();

            //store information from database into global session variable
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['user_role'] = $row['user_role'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['name'] = $row['name'];

            //we need a session containing customer id and delivery man id (no need admin)
            $role = $row['user_role'];
            $id = $row['user_id'];

            if ($role == "customer") {
                $stmt = query("SELECT customer_id FROM customers WHERE user_id = {$id}");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['customer_id'] =  $row['customer_id'];
                redirect("Customer_Dashboard.php?success=login");
            } elseif ($role == "admin") {
                $stmt = query("SELECT admin_id,admin_type FROM admins WHERE user_id = {$id}");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['admin_id'] =  $row['admin_id'];
                $_SESSION['admin_type'] =  $row['admin_type'];
                # redirect("admin/index.php?success=login");

                if ($_SESSION['admin_type'] == "marketing") {
                    redirect("admin_marketing/marketing_admin_dashboard.php?success=login");
                } elseif ($_SESSION['admin_type'] == "finance_and_account") {
                    redirect("admin_accounting/accounting_admin_dashboard.php?success=login");
                }
            } elseif ($role == "client") {
                $stmt = query("SELECT client_id FROM clients WHERE user_id = {$id}");
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['client_id'] =  $row['client_id'];
                redirect("client_users/client_dashboard.php?success=login");
            }
        }
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="css\fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css\style_login.css">
</head>

<body>
    <div class="container">
        <div class="header">
            <!-- Display error messages -->
            <?php display_error_message(); ?>

            <!-- Display success messages -->
            <?php display_success_message(); ?>
            <h1>Login</h1>
        </div>
        <div class="main">

            <form action="" method="post">
                <span>
                    <i class="fa fa-user"></i>
                    <input type="text" placeholder="Username" name="username">
                </span><br>
                <span>
                    <i class="fa fa-lock"></i>
                    <input type="password" placeholder="password" name="user_password">
                </span><br>

                <button type="submit" name="login_submit" class="btn btn-primary">Login</button>
                <br>
                <span class="psw">Forgot <a name="forgot_submit" href="forgot.php">password?</a></span><br>
                <br>
                <span>Don't have an account? <a href="signup.php">Sign Up</a></span><br>
                <br>
                <span>Go Back to <a href="index.php">Home Page</a></span><br>
                <br>

            </form>

        </div>
    </div>
</body>

</html>

<?php
//close database connection - initialize object to null
$pdo = null;
ob_end_flush();
?>