<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Sorting Arrays</title>
    </head>
<body>

<table border = "0" cellspacing = "3" cellpadding = "3" align = "center">
    <tr>
        <td><h2>Rating</h2></td>
        <td><h2>Title</h2></td>
    </tr>

<?php # Script 2.8 - sorting.php

    $movies = array('Casablanca' => 10, 
        'To Kill a Mockingbird' => 10,
        'The English Patient' => 2,
        'Stranger than Fiction' => 9,
        'Story of the Weeping Camel' => 5,
        'Donnie Darko' => 7
    );

    echo '<tr><td colspan = "2"><b>In their original order:</b></td></tr>';
    foreach ($movies as $title => $rating) {
        echo "<tr><td>$rating</td><td>$title</td></tr>";
    }

    ksort($movies);
    echo '<tr><td colspan = "2"><b>Sorted by title:</b></td></tr>';
    foreach ($movies as $title => $rating) {
        echo "<tr><td>$rating</td><td>$title</td></tr>\n";
    }

    arsort($movies);
    echo '<tr><td colspan = "2"><b>Sorted by rating:</b></td></tr>';
    foreach ($movies as $title => $rating) {
        echo "<tr><td>$rating</td><td>$title</td></tr>\n";
    }
?>

</body>
</html>