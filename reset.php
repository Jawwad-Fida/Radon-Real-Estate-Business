<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
?>
<?php
//prevent user from coming to reset page if there is no email or token in url
if (!isset($_GET['email']) && !isset($_GET['token'])) {
    redirect("index.php");
} else {
    if (isset($_POST['reset_submit'])) {
        //we have to make sure that the information we are receiving from the email belongs to the right user
        $email = $_GET['email']; //from url
        $token = $_GET['token']; //from url
        $stmt = query("SELECT username,user_email,token FROM users WHERE token='{$token}'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        //check if the token and email from url match the correct user in database
        if (($_GET['token'] !== $row['token']) && ($_GET['email'] !== $row['user_email'])) {
            redirect("index.php");
        }

        $password = validate($_POST['password']);
        $password_repeat = validate($_POST['password_repeat']);
        $password_size = strlen($password);

        //CHECKING FOR ERRORS
        if (empty($password) || empty($password_repeat)) {
            redirect("reset.php?error=emptyFields");
            exit();
        } elseif ($password_size <= 4) {
            //check if length of password is valid
            redirect("reset.php?error=invalid_pwd_length");
            exit();
        } elseif ($password !== $password_repeat) {
            //check if password are same
            redirect("reset.php?error=pwd_no_match");
            exit();
        }

        //updating password and token columns
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $token_update = "Token used";  //once we are done using the token, we don't want it anymore

        $stmt = prepare_query("UPDATE users SET user_password=?,token=? WHERE user_email=?");
        $stmt->bindParam(1, $passwordHash, PDO::PARAM_STR);
        $stmt->bindParam(2, $token_update, PDO::PARAM_STR);
        $stmt->bindParam(3, $email, PDO::PARAM_STR);
        $stmt->execute();
        unset($stmt);

        redirect("login.php?success=reset");
    }
}

?>



<!DOCTYPE html>
<html>

<head>
    <title>Reset Password</title>
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
            <h2>Password Recovery</h2>
        </div>
        <div class="main">

            <form action="" method="post">
                <span>
                    <i class="fa fa-user"></i>
                    <input type="password" placeholder="Enter New Password" name="password">
                </span><br>
                <span>
                    <i class="fa fa-user"></i>
                    <input type="password" placeholder="Repeat New Password" name="password_repeat">
                </span><br>

                <button type="submit" name="reset_submit" class="btn btn-primary">Reset Password</button>
                <br>
                <span> <a  href="#"></a></span><br>
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