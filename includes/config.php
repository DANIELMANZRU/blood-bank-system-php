<?php
// Database configuration
define('DATABASE_SERVER', '127.0.0.1');
define('DATABASE_USERNAME', 'admin');
define('DATABASE_PASSWORD', 'secure_password');
define('DATABASE_NAME', 'blood_donation_system');

// Initialize database connection
try {
    $connection = new PDO(
        "mysql:host=" . DATABASE_SERVER . ";dbname=" . DATABASE_NAME,
        DATABASE_USERNAME,
        DATABASE_PASSWORD,
        array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'")
    );
} catch (PDOException $error) {
    die("Connection failed: " . $error->getMessage());
}
// DB credentials.
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','bbdms');
// Establish database connection.
try
{
$dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME,DB_USER, DB_PASS,array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
exit("Error: " . $e->getMessage());
}
?>