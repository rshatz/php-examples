<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Multidimensional</title>
    </head>
<body>

</body>

    <p>Some North American States, Provinces, and Territories:</p>

<?php # Script 2.7 - multidimensional.php

    /*
        The multidimensional array is created by using other arrays for its values. 
        Two 'foreach' loops, one nested inside of the other, can access every array element.
    */

    $mexico = array('YU' => 'Yucatan',
        'BC' => 'Baja California',
        'OA' => 'Oaxaca'
    );
    $usa = array('MD' => 'Maryland',
        'IL' => 'Illinois',
        'PA' => 'Pennsylvania',
        'IA' => 'Iowa'
    );
    $canada = array ('QC' => 'Quebec',
        'AB' => 'Alberta',
        'NT' => 'Northwest Territories',
        'YT' => 'Yukon'
    );
    // combine all of the arrays inot one:
    $north_america = array('Mexico' => $mexico,
        'United States' => $usa,
        'Canada' => $canada
    );

    // begin the primary 'foreach' loop:
    foreach ($north_america as $country => $list) {
        echo "<h2>$country</h2><ul>";
        // this loop will run through each sub-array
        foreach($list as $abbreviation => $fullname) {
            echo "<li>$abbreviation - $fullname</li>";
        }
        echo '</ul>'; // complete outer foreach loop: 
    }
?>

</body>
</html>