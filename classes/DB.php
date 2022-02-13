<?php


class DB {
	private static $_instance;
	private $_connection;


	private function __construct() {
		$host = Config::get('mysql/host');
		$username = Config::get('mysql/username');
		$password = Config::get('mysql/password');
		$dbname = Config::get('mysql/dbname');

		try {
			$this->_connection = new PDO("mysql:dbname=$dbname;host=$host", $username, $password);

		} catch (PDOException $e) {
			die('ERROR: ' . $e->getMessage());
		}
	}

	public static function get_instance() {
		if(!self::$_instance)
			self::$_instance = new self();

		return self::$_instance;
	}

	private function action($query, $data) {
		try {
			$stmt = $this->_connection->prepare($query);
			$stmt->execute($data);
			return $stmt;

		} catch (PDOException $e) {
			die('ERROR: ' . $e->getMessage());
		}
	}

	public function insert($table, $data) {
		$columns = implode(', ', array_keys($data));
		$values = implode(', ', array_map(function($e) { return '?'; }, array_values($data)));
		$query = "INSERT INTO $table ($columns) VALUES($values)";

		return (bool) $this->action($query, array_values($data))->rowCount();
	}

	public function delete($table, $condition_then_data = [], $limit = false) {
		$query = "DELETE FROM $table";

		if(count($condition_then_data)) {
			$query .= " WHERE $condition_then_data[0]";
			$data = array_splice($condition_then_data, 1);
		}

		if(false !== $limit)
			$query .= " LIMIT $limit";

		return $this->action($query, $data ?? [])->rowCount();
		
	}

	public function update($table, $data, $condition_then_data = [], $limit = false) {
		$columns = implode(', ', array_map(function($e) { return "$e = ?"; }, array_keys($data)));
		$values = array_values($data);
		$query = "UPDATE $table SET $columns";

		if(count($condition_then_data)) {
			$query .= " WHERE $condition_then_data[0]";
			array_push($values, ...array_splice($condition_then_data, 1));
		}

		if(false !== $limit)
			$query .= " LIMIT $limit";

		return $this->action($query, $values)->rowCount();
	}

	public function select($columns, $table, $condition_then_data = [], $limit = false) {
		$query = "SELECT $columns FROM $table";

		if(count($condition_then_data)) {
			$query .= " WHERE $condition_then_data[0]";
			$data = array_splice($condition_then_data, 1);
		}

		if(false !== $limit)
			$query .= " LIMIT $limit";

		return $this->action($query, $data ?? [])->fetchAll(PDO::FETCH_OBJ);
	}

	public function query($query, $data = []) {
		return $this->action($query, $data);
	}

	public function __destruct() {
		$this->_connection = null;
	}
}