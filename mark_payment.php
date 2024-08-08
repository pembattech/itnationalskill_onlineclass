<?php
require 'db/db_connection.php';

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = intval($_GET['id']);
    $type = $_GET['type'];
    
    echo $type;

    ?>

    <a href="admin.php">Go to admin page.</a>

    <?php

    if ($type == 'admission') {
        $query = "UPDATE `Registration` SET ispaid_admission_fee = TRUE WHERE id = $id";
        echo $query;
    // } elseif ($type == 'course') {
    } else {
        $query = "UPDATE `Registration` SET ispaid_course_fee = TRUE WHERE id = $id";
    }

    if (mysqli_query($conn, $query)) {
        echo "Payment status updated successfully.";
    } else {
        echo "Error updating payment status: " . mysqli_error($conn);
    }

    header("Location: admin.php");
    exit();
} else {
    echo "Invalid request.";
}
?>
