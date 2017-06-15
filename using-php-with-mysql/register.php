<?php # Script 9.3 - register.php

    $page_title = 'Register';
    include ('includes/header.html');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $errors = array();

        // Check for a first name:
        if (empty($_POST['first_name'])) {
            $errors[] = 'Please enter your first name.';
        } else {
            $fn = trim($_POST['first_name']);
        }

        // Check for a last name:
        if (empty($_POST['last_name'])) {
            $errors[] = 'Please enter your last name.';
        } else {
            $ln = trim($_POST['last_name']);
        }

        // Check for an email address:
        if (empty($_POST['email'])) {
            $errors[] = 'Please enter your email.';
        } else {
            $e = trim($_POST['email']);
        }

        // Check for a password and match against the confirmed password:
        if (!empty($_POST['pass1'])) {
            if ($_POST['pass1'] != $_POST['pass2']) {
                $errors[] = 'Passwords do not match.';
            } else {
                $p = trim($_POST['pass1']);
            }
        } else {
            $errors[] = 'Please enter a password';
        }
    }

?>

<h1>Register</h1>
<form action="register.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20"
        value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
</form>