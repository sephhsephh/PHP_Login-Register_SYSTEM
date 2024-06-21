<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'php_login_system');

// Enable error reporting
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    // Create connection
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Set the charset to utf8mb4
    $conn->set_charset("utf8mb4");
    
} catch (mysqli_sql_exception $e) {
    // Handle connection error
    die("Connection failed: " . $e->getMessage());
}

