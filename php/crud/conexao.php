<?php 

	namespace php\crud;

	class conexao{
		private static $pdo;

		public static function getConexao(){

			if(!isset(self::$pdo)){
				self::$pdo = new \PDO('mysql:host=localhost;dbname=crudpoo;charset=utf8', 'root', '');
			}

			return self::$pdo;

		}

	}