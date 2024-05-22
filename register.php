<?php
include 'DBConnection.php';

if (isset($_POST['email']) && isset($_POST['password']) && isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    // Prepare a select statement
    $query = "SELECT * FROM users WHERE email = ?";
    if ($stmt = mysqli_prepare($conn, $query)) {
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "s", $email);
        
        // Attempt to execute the prepared statement
        mysqli_stmt_execute($stmt);
        
        // Store result
        mysqli_stmt_store_result($stmt);
        
        // Fetch result to check if email already exists
        mysqli_stmt_fetch($stmt);
        
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Email already exists
            header("Location: index.php?error=Account email already exists!");
            exit();
        } else {
            // Email does not exist, insert new account
            $insert_query = "INSERT INTO users (email, user_password, username) VALUES (?, ?, ?)";
            if ($insert_stmt = mysqli_prepare($conn, $insert_query)) {
                // Bind variables to the prepared statement as parameters
                mysqli_stmt_bind_param($insert_stmt, "sss", $email, $password, $username);
                
                // Attempt to execute the prepared statement
                if (mysqli_stmt_execute($insert_stmt)) {
                    // Redirect to dashboard
                    header("Location: dashboard.php");
                    exit();
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }
                mysqli_stmt_close($insert_stmt);
            }
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Oops! Something went wrong. Please try again later.";
    }
    
    mysqli_close($conn);
} else {
    header("Location: index.php?error=Fill out the necessary information!");
    exit();
}
?>
