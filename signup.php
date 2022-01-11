<?php

declare(strict_types=1);
session_start();
ob_start();

include "includes/connect.php";
include "includes/functions.php";
?>


<?php

if (isset($_POST['register_submit'])) {
    $name = validate($_POST['name']);
    $age = validate($_POST['age']);
    $nationality = validate($_POST['Nationality']);
    $dob = $_POST['birth_date'];
    $nationality = validate($_POST['Nationality']);
    $occupation = validate($_POST['occupation']);
    $gender = $_POST['gender'];
    $perma_address = validate($_POST['perma_address']);
    $present_address = validate($_POST['present_address']);
    $Division = $_POST['Division'];
    $phone_no = validate($_POST['phone_no']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $password_repeat = validate($_POST['password_repeat']);
    $username = validate($_POST['username']);

    $username_size = strlen($username);
    $password_size = strlen($password);
    $phone_no_size = strlen($phone_no);

    //Checking for errors
    if (empty($username) || empty($password) || empty($email) || empty($password_repeat) || empty($name) || empty($phone_no) || empty($present_address) || empty($occupation) || empty($age)) {
        redirect("signup.php?error=emptyFields");
        exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //check if email is valid
        redirect("signup.php?error=invalid_email");
        exit();
    } elseif (!preg_match("/^[a-zA-Z]*$/", $username)) {
        //check if input characters are valid
        redirect("signup.php?error=invalid_username");
        exit();
    } elseif ($username_size <= 3) {
        //check if length of username is valid
        redirect("signup.php?error=invalid_name_length");
        exit();
    } elseif ($password_size <= 4) {
        //check if length of password is valid
        redirect("signup.php?error=invalid_pwd_length");
        exit();
    } elseif ($phone_no_size > 11) {
        //check if length of phone number is valid
        redirect("signup.php?error=invalid_phone_length");
        exit();
    } elseif ($password !== $password_repeat) {
        //check if password are same
        redirect("signup.php?error=pwd_no_match");
        exit();
    }

    //CHECKING FOR DUPLICATE USERS AND EMAILS 

    if (username_exists($username) == 'true') {
        redirect("signup.php?error=user_exists");
        exit();
    }

    if (email_exists($email) == 'true') {
        redirect("signup.php?error=email_exists");
        exit();
    }

    //------------QUERY-------------


    $role = 'customer';
    $passwordHash = password_hash($password, PASSWORD_DEFAULT);
    $identity_num = generateKey(); //unique identification string generated each time

    $stmt = prepare_query("INSERT INTO users(user_role,name,username,user_email,user_password,date_of_birth,identity_num) VALUES(?,?,?,?,?,?,?)");
    //Bind parameters to the placeholders(?)
    $stmt->bindParam(1, $role, PDO::PARAM_STR);
    $stmt->bindParam(2, $name, PDO::PARAM_STR);
    $stmt->bindParam(3, $username, PDO::PARAM_STR);
    $stmt->bindParam(4, $email, PDO::PARAM_STR);
    $stmt->bindParam(5, $passwordHash, PDO::PARAM_STR);
    $stmt->bindParam(6, $dob, PDO::PARAM_STR);
    $stmt->bindParam(7, $identity_num, PDO::PARAM_STR);
    $stmt->execute();
    unset($stmt);

    if ($role == "customer") {
        $stmt = query("SELECT user_id FROM users WHERE identity_num = '{$identity_num}'");
        $row = $stmt->fetch(PDO::FETCH_ASSOC); //fetching the data
        $user_id =  $row["user_id"]; # user_id here is the Foreign Key of customers table

        $stmt2 = prepare_query("INSERT INTO customers(username,user_id,mobile_number,email,identity_num,occupation,present_address,permanent_address,gender,nationality,division,age) VALUES(?,?,?,?,?,?,?,?,?,?,?,?)");
        $stmt2->bindParam(1, $username, PDO::PARAM_STR);
        $stmt2->bindParam(2, $user_id, PDO::PARAM_INT);
        $stmt2->bindParam(3, $phone_no, PDO::PARAM_STR);
        $stmt2->bindParam(4, $email, PDO::PARAM_STR);
        $stmt2->bindParam(5, $identity_num, PDO::PARAM_STR);
        $stmt2->bindParam(6, $occupation, PDO::PARAM_STR);
        $stmt2->bindParam(7, $present_address, PDO::PARAM_STR);
        $stmt2->bindParam(8, $perma_address, PDO::PARAM_STR);
        $stmt2->bindParam(9, $gender, PDO::PARAM_STR);
        $stmt2->bindParam(10, $nationality, PDO::PARAM_STR);
        $stmt2->bindParam(11, $Division, PDO::PARAM_STR);
        $stmt2->bindParam(12, $age, PDO::PARAM_INT);
        $stmt2->execute();
        unset($stmt2);
    }
    redirect("login.php?success=register");
}

?>


<!DOCTYPE html>
<html>

<head>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css\fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css\style_signup.css">

    <div class="container">
        
        <div class="signup-form">    

            <form action="" method="post" class="register-form" id="register-form">
                <h2>Registration Form</h2>

                <!-- Display error messages -->
                <?php display_error_message(); ?>

                <div class="form-group">
                    <label for="address">Full Name :</label>
                    <input type="text" name="name" id="name" placeholder="Enter your name" required />
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="age">Age :</label>
                        <input type="text" name="age" placeholder="EX: 45" id="Age" required />
                    </div>
                    <div class="form-group">
                        <label for="Nationality">Nationality :</label>
                        <input type="text" name="Nationality" placeholder="Ex: Bangladeshi" id="Nationality" required />
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="birth_date">Date of Birth:</label>
                        <input type="date" id="birth_date" name="birth_date" value="1968-01-01" min="1900-01-01" max="2010-12-31" required />

                    </div>
                    <div class="form-group">
                        <label for="age">Occupation :</label>
                        <input type="text" name="occupation" placeholder="Ex:Employer" id="occopation" required />
                    </div>


                </div>

                <div class="form-radio">
                    <label for="gender" class="radio-label">Gender :</label>
                    <div class="form-radio-item">
                        <input type="radio" name="gender" value="male" id="male" checked required>
                        <label for="male">Male</label>
                        <span class="check"></span>
                    </div>
                    <div class="form-radio-item">
                        <input type="radio" name="gender" value="female" id="female">
                        <label for="female">Female</label>
                        <span class="check"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="address">Permanent Address :</label>
                    <input type="text" name="perma_address" id="address" required />
                </div>

                <div class="form-group">
                    <label for="address">Present Address :</label>
                    <input type="text" name="present_address" id="address" required />
                </div>


                <div class="form-group">
                    <label for="city">Division :</label>
                    <div class="form-select">
                        <select name="Division" id="Division" required />
                            <option value=""></option>
                            <option value="Dhaka">Dhaka</option>
                            <option value="Chittagong">Chittagong</option>
                            <option value="Barisal">Barishal</option>
                            <option value="Khulna">Khulna</option>
                            <option value="Sylhet">Sylhet</option>
                            <option value="Rajshahi">Rajshahi</option>
                            <option value="Rangpur">Rangpur</option>
                            <option value="Mymensingh">Mymensingh</option>
                        </select>
                        <span class="select-icon"><i class="zmdi zmdi-chevron-down"></i></span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="phone_no">Phone Number :</label>
                    <input type="Number" name="phone_no" placeholder="01*********(11 digit)" id="phone_no" required />
                </div>
                <div class="form-group">
                    <label for="email">Email ID :</label>
                    <input type="email" name="email" placeholder="Ex: johnson99@gamil.com" id="email" required />
                </div>
                <div class="form-group">
                    <label for="username">Username :</label>
                    <input type="username" name="username" placeholder="Ex: johnson" id="username" required />
                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input type="password" name="password" placeholder="Enter password (atleast 5 characters)" id="password" required />
                </div>
                <div class="form-group">
                    <label for="password">Repeat Password :</label>
                    <input type="password" name="password_repeat" placeholder="Re-Enter password" id="password" required />
                </div>
                <div class="form-submit">
                    <!--  <input type="submit" value="Reset All" class="submit" name="reset" id="reset" /> -->
                    <input type="submit" value="Submit Form" class="submit" name="register_submit" id="submit" />
                </div>

                <div class="form-group">
                    <span>Go Back to <a href="login.php">Login Page</a></span>
                </div>
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