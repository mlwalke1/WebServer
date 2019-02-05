<?php
class Database {
	private static $dbName = 'mlwalke1';
	private static $dbHost = 'localhost';
	private static $dbUsername = 'mlwalke1';
	private static $dbUserPassword = '555386';
	
	private static $cont = null;
	
	public function __construct() {
		die('Init function is not allowed');
	}
	
	public static function connect() {
		if (self::$cont == null) {
			try {
				self::$cont = new PDO("mysql:host=".self::$dbHost.";"."dbname=".self::$dbName, self::$dbUsername, self::$dbUserPassword);
			}
			catch(PDOException $e) {
				die($e->getMessage());
			}
		}
		return self::$cont;
	}
	
	public static function disconnect() {
		self::$cont = null;
	}
} 
?>