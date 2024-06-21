<?php
include 'DBConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Prepare a select statement
    $sql = "SELECT * FROM users WHERE email = ? AND user_password = ?";
    if ($stmt = mysqli_prepare($conn, $sql)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "ss", $email, $password);
        
        // Attempt to execute the prepared statement
        mysqli_stmt_execute($stmt);
        
        // Store result
        mysqli_stmt_store_result($stmt);
        
        if (mysqli_stmt_num_rows($stmt) === 1) {
            // Credentials are correct, redirect to dashboard
            header("Location: ../dashboard.php");
        } else {
            // Invalid credentials, redirect to login page with error
            header("Location: ../index.php?error=Invalid Credentials!");
            exit();
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // SQL statement preparation failed
        echo "Oops! Something went wrong. Please try again later.";
    }
    
    // Close connection
    mysqli_close($conn);
} else {
    // Required POST parameters are missing
    header("Location: ../index.php?error=Fill out the necessary informations!");
    exit();
}
?>
