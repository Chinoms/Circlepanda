<?php
# Set up debug mode
define("DEBUG_MODE", true);
# Database connection constants
define("DATABASE_HOST", "localhost");
define("DATABASE_USERNAME", "root");
define("DATABASE_PASSWORD", "root");
define("DATABASE_NAME", "circtgfh_pandadb");
define('MODREWRITE', true);
define('DEVELOPER_MOODE', '1');
define('DEVELOPMENT_PHASE', 2);
# Define base_url
define("BASE_URL", "http://localhost:8888/circlepanda/");
# Site root
define("SITE_ROOT", "C:/wamp/www/");
# This is the address that will appear coming from (Sender)
define('EMAIL', 'admin@circlepanda.com');
# Master admin
define("AUTH_ADMIN","admin");
define("AUTH_PASS","1792127910@tom");
# Location of web files on host
define("HOST_WWW_ROOT", "/Applications/MAMP/htdocs");
$upload_dir = HOST_WWW_ROOT . "/circlepanda/uploads/";
$upload_dir_dp = HOST_WWW_ROOT . "/circlepanda/uploads/dp/";
$upload_dir_board = HOST_WWW_ROOT . "/circlepanda/uploads/board/";
# Standard Date Format for Circlepanda
$date = date(DATE_RFC2822);
# IP Address
@$ip = $_SERVER['REMOTE_ADDR'];
@$ip_proxy = $_SERVER['HTTP_X_FORWARDED'];
# Default time zone, to be able to send mails
$mailDate = date_default_timezone_set('UTC');
# Convert Default path to path route to file system
function get_web_path($file_system_path) {
	return str_replace($_SERVER['DOCUMENT_ROOT'], '', $file_system_path);
}
# Config error page
function debug_print($message) {
	if (DEBUG_MODE) {
		echo $message;
	}
}
# Config error handler function
function handle_error($user_error_message, $system_error_message) {
	header("Location: " . BASE_URL . "app/error/404?" .
	"error_message={$user_error_message}&" .
	"system_error_message={$system_error_message}");
	exit($conn);
}
?>
