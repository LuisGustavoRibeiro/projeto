<?php
require 'environment.php';

define("BASE_URL", "http://localhost/projeto");

global $config;
$config = array();

if(ENVIRONMENT == 'development') {
	//DESENVOLVIMENTO
	$config['dbname'] = 'projeto';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	//PRODUÇÃO
	$config['dbname'] = '';
	$config['host'] = '';
	$config['dbuser'] = '';
	$config['dbpass'] = '';
}
?>