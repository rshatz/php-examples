<?php # Script 9.7 - password.php 

$page_title = 'Change Your Password';
include('includes/header.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // connect to the database
    require ('../../../../database-login/mysqli_connect.php');

    // initialize an error array
    $errors = array();

    // check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($link, trim($_POST['email']));
    }

    // check for the current password:
    if (empty($_POST['current_pass'])) {
        $errors[] = 'You forgot the enter your current password.';
    } else {
        $p = mysqli_real_escape_string($link, trim($_POST['current_pass']));
    }

    // check for a new password and match against the confirmed password:
    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your passwords do not match';
        } else {
            $new_pass = mysqli_real_escape_string($link, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'you forgot to enter your new password.';
    }

    // if no errors occured
    if (empty($errors)) {
        // check for valid email and password combination:
        $query = "SELECT user_id FROM users WHERE (email='$e' AND pass=SHA1('$p'))";
        $q_result = @mysqli_query($link, $query);
        $num_rows = @mysqli_num_rows($q_result);

        if ($num_rows == 1) { // if a match was made
            // get the user_id
            $row = mysqli_fetch_array($q_result, MYSQLI_NUM);

            // make the UPDATE query:
            $query = "UPDATE users SET pass=SHA1('$new_pass') WHERE user_id=$row[0]";
            $q_result = @mysqli_query($link, $q_result);

            if (mysqli_affected_rows($link) == 1) { // if a row was affected
                // public message:
                echo '<h1>Thank you!</h1>
                    <p>Your password has been unpdated</p><p><br /></p>';
            } else { // If there where errors
                
                // public message:
                echo '<h1>System Error</h1>
                <p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>';

                // DEBUGGING MESSAGE:
                echo '<p>' . mysqli_error($link) . '<br /><br />Query: ' . $query . '</p>';
            }

            mysqli_close($link); // close database connection

            // include the footer and quit the script (to not show the form)
            include('includes/footer.html');
            exit();

        } else { // no match was found
            echo '<h1>Error!</h1>
            <p class="error">The email address and password do not match those on file.</p>';
        }

    } else { // Report the errors
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';

        foreach ($errors as $message) {
            // print each error
            echo " = $message<br />\n";
        }

        echo '</p><p>Please try again.</p<p><br /></p>';
    } // end of if (empty($errors))

    // close the database connection
    mysqli_close($link);
} // end of main submit conditional
?>

<h1>Change Your Password</h1>
<form action="password.php" method="post">
	<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"  /> </p>
	<p>Current Password: <input type="password" name="current_pass" size="10" maxlength="20" value="<?php if (isset($_POST['current_pass'])) echo $_POST['pass']; ?>"  /></p>
	<p>New Password: <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
	<p>Confirm New Password: <input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  /></p>
	<p><input type="submit" name="submit" value="Change Password" /></p>
</form>
<?php include ('includes/footer.html'); ?>