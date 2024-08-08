<?php
require 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $billing_email = $_POST['billing_email'];
    $payment_statement = $_FILES['payment_statement'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($payment_statement["name"]);
    if (move_uploaded_file($payment_statement["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($payment_statement["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Insert payment details into the database or update the status
    // Assuming you have an `email` field in your `registrations` table to link the payment
    $query = "UPDATE registrations SET ispaid_admission_fee = TRUE WHERE email = '$billing_email'";
    
    if (mysqli_query($conn, $query)) {
        echo "Payment recorded successfully.";
    } else {
        echo "Error recording payment: " . mysqli_error($conn);
    }

    // Redirect or display success message
    header("Location: success.html");
    exit();
}
?>
