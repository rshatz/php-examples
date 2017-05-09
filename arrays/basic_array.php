<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Calendar</title>
    </head>
<body>

<form action="basic_array.php" method="post">

<?php # Sript 2.6 - basic_array.php
    
    $months = array (1 => 'January', 'February', 'March', 
        'April', 'May', 'June', 'July', 'August', 'September', 
        'October', 'November', 'December');
    $days = range (1, 31);
    $years = range(2011, 2021);

    // month pull down
    echo '<select name="month">';
    foreach ($months as $key => $value) {
        echo "<option value=$key> $value</option>\n";
    }
    echo '</select>';

    // day pulldown
    echo '<select name="day">';
    foreach ($days as $key => $value) {
        echo "<option value=$key> $value</option>\n";
    }
    echo '</select>';

    // year pulldown
    echo '<select name="year">';
    foreach ($years as $key => $value) {
        echo "<option value=$key> $value</option>\n";
    }
    echo '</select>';
?>

</body>
</html>