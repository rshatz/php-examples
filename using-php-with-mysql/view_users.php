<?php # Script 9.4 - veiw_users

$page_title = 'View the Current Users';
include ('includes/header.html');

echo '<h1>Registered Users</h1>';

require ('../../../../database-login/mysqli_connect.php');

// Make the query;
$query = "SELECT CONCAT(last_name, ', ', first_name) AS name, 
            DATE_FORMAT(registration_date, '%M %d, %Y') AS date_reg FROM users ORDER BY registration_date ASC";
// Run the query
$result = @mysqli_query ($dbc, $query);

// If it ran OK, display the records
if ($result) {

    // Table header
    echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
        <tr><td align="left"><b>Name</b><td align="left"><b>Date Registered</b></td></tr>';

    // Fetch and print all the records
    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
        echo '<tr><td align="left">' . $row['name'] . '</td><td align="left">' . $row['date_reg'] . '</td></tr>';
    }

    // Close the table
    echo '</table>';
    mysqli_free_result ($result);

} else { // If query was unsuccesful
    // Public message:
    echo '<p class="error">The current users could not be retrieved. We apologize for any inconvenience.</p>';
    
    // Debugging Message:
    echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $query . '</p>';
} // End of if ($result)

mysqli_close($dbc); // Close the database connection

include ('includes/footer.html');

?>