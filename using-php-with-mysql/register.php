<?php # Script 9.3 - register.php
// This script performs an INSERT query to add a record to the users table. 
    
    $page_title = 'Register';
    include ('includes/header.html');

    // Check for form submission:
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        // Initialize an error array
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

        // if error array is empty register the user into the database
        if (empty($errors)) {
            // connect to the database (db)
            require ('../../../../connect/mysqli_connect.php');

            // Make the query:
            $q = "INSERT INTO users (first_name, last_name, email, pass, registration_date) 
                VALUES ('$fn', '$ln', '$e', SHA1('$p', NOW() ) ";

            // Run the query.
            $r = @mysqli_query ($dbc, $q);
            
            // If query has no errors 
            if ($r) {
                // Print a message:
                echo '<h1>Thank you!</h1><p> You are now registered.</p><p><br /></p>';
            } else { // If query has errors.
                // Print message:
                echo '<h1>System Error</h1><p class="error"> 
                You could not be registered due to a system error. We apologize for any inconvenience.</p>';

                // DEBUGGING MESSAGE
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' , $q . '</p>';
            }
        }
    }

?>

<h1>Register</h1>
<form action="register.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20"
        value="<?php if(isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
    
    <p><input type="submit" name="submit" value="Register" /></p>
</form>

<?php include ('includes/footer.html'); ?>