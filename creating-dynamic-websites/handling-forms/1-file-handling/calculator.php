<!--<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Trip Cost Calculator</title>
    </head>
<body>

</body>
</html>-->

<?php # This script demonstrates how one page can be used to both display and handle a form

    $page_title = 'Trip Cost Calculator';
    include('../includes/header.html');

    if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {

        if (isset($_POST['distance'], $_POST['gallon_price'], $_POST['efficiency'])
            && is_numeric($_POST['distance']) && is_numeric($_POST['gallon_price']) && is_numeric($_POST['efficiency'])) {
                $gallons = $_POST['distance'] / $_POST['efficiency'];
                $dollars = $gallons * $_POST['gallon_price'];
                $hours = $_POST['distance'] / 65; // 65 = the miles per hour. 

                echo '<h1>Total Estimated Cost</h1>
                    <p>The total cost of driving ' . $_POST['distance'] . ' miles, average ' . $_POST['efficiency'] 
                    . ' miles per gallon, and paying an average of $' . $_POST['gallon_price'] . ' per gallon, is $' 
                    . number_format($dollars, 2) . '. If you drive at an average of 65 miles per hour, the trip will
                    take approximately ' . number_format($hours, 2) . ' hours.</p>';
        }
        else {
            echo '<h1>Error!</h1>
                <p class = "error">Please enter a valid distance, price per gallon, and fuel efficiency.</p>';
        }
    }
?>
    
    <h1>Trip Cost Calculator</h1>
        <form action="calculator.php" method="post">
            <p>Distance (in miles): <input type="text" name="distance" /></p>
            <p>Average Price Per Gallon: <span class="input">
                <input type="radio" name="gallon_price" value="3.00" /> 3.00
                <input type="radio" name="gallon_price" value="3.50" /> 3.50
                <input type="radio" name="gallon_price" value="4.00" /> 4.00
            </span></p>
            
            <p>Fuel Efficiency: <select name="efficiency">
                <option value="10">Terrible</option>
                <option value="20">Decent</option>
                <option value="30">Very Good</option>
                <option value="40">Excellent</option>
            </select></p>
            <p><input type="submit" name="submit" value="Calculate" /></p>
        </form>

<?php
    include ('../includes/footer.html');
?>