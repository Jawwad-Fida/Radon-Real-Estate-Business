<?php
include "functions.php";

session_start();
session_unset(); //end the session - remove the session variables
session_destroy(); //destroy them
redirect("../login.php?success=logout");
