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
            require ('../../../../database-login/mysqli_connect.php');

            // Make the query:
            $query = "INSERT INTO users (first_name, last_name, email, pass, registration_date) 
                VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() ) ";

            // Run the query.
            $result = @mysqli_query ($dbc, $query);
            
            // If query has no errors 
            if ($result) {
                // Print a message:
                echo '<h1>Thank you!</h1><p> You are now registered.</p><p><br /></p>';
            } else { // If query has errors.
                // Print public message:
                echo '<h1>System Error</h1><p class="error"> 
                You could not be registered due to a system error. We apologize for any inconvenience.</p>';

                // DEBUGGING MESSAGE
                echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' , $query . '</p>';
            }

            // Close the database
            mysqli_close($dbc);

            // Include the footer and quit the script:
            include ('includes/footer.html');
            exit();
        
        } else { // Report the errors
            echo '<h1>Error!</h1><p class="error">The following error(s) occurred:<br />';
            // Print each error
            foreach ($errors as $msg) {
                echo " - $msg<br />\n";
            }
            echo '</p><p>Please try again.</p><p><br /></p>';
        } // End of if (empty($errors))
    } // End of main Submit conditional
?>

<h1>Register</h1>
<form action="register.php" method="post">
    <p>First Name: <input type="text" name="first_name" size="15" maxlength="20" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name']; ?>" /></p>
	<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name']; ?>" /></p>
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
	<p>Confirm Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Register" /></p>
</form>

<?php include ('includes/footer.html'); ?>