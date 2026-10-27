<?php 
// DB credentials.
define('DB_HOST', getenv('DB_HOST') ?: 'localhost');
define('DB_USER', getenv('DB_USER') ?: 'root');
define('DB_PASS', getenv('DB_PASS') ?: '');
define('DB_NAME', getenv('DB_NAME') ?: 'poultry');
// Establish database connection (mysqli used by most pages).
$con = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (mysqli_connect_errno()) {
    define('DB_CONNECTED', false);
} else {
    define('DB_CONNECTED', true);
    mysqli_set_charset($con, 'utf8');
}
// Optional PDO connection (non-fatal if unavailable).
$dbh = null;
try {
    $dbh = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS, array(
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_SILENT
    ));
} catch (PDOException $e) {
    $dbh = null;
}
?>