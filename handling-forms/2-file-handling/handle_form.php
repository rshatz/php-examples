<!DOCTYPE html PUBLIC "-//W3C//DTDXHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Form Feedback</title>
    </head>
<body>

<?php

    // $first = $_REQUEST['first'];
    // $last = $_REQUEST['last'];
    // $email = $_REQUEST['email'];
    // $comments = $_REQUEST['comments'];

    if ( !empty($_POST['first']) && !empty($_POST['last']) && !empty($_POST['comments']) && !empty($_POST['email']) ) {
        echo "<p>Thank you, <b>{$_POST['first']}</b> <b>{$_POST['last']}</b> for the following comments:<br />
        <tt>{$_POST['comments']}</tt></p><p>We will reply to you at <i>{$_POST['email']}</i>.</p>\n";
    }
    else {
        echo '<p>Please go back and fill out the form again.</p>';
    }  
?>