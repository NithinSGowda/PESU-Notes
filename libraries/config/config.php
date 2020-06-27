<?php
error_reporting(E_ALL);
ini_set('display_errors', 'On');
define('BASE_PATH', dirname(dirname(__FILE__)));
define("PARENT",     "/var/www/pesu");
define('APP_FOLDER', 'pesu_notes');
define('CURRENT_PAGE', basename($_SERVER['REQUEST_URI']));

require_once BASE_PATH . '/lib/MysqliDb/MysqliDb.php';
require_once BASE_PATH . '/helpers/helpers.php';

define('DB_HOST', "localhost");
define('DB_USER', "root");
define('DB_PASSWORD', "9419002492");
define('DB_NAME', "pesu_notese");

function getDbInstance() {
	return new MysqliDb(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
}

