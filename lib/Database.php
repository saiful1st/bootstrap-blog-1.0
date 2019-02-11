<?php
class Database{
	public $host = DB_HOST;
	public $user = DB_USER;
	public $password = DB_PASS;
	public $dbname = DB_NAME;

	public $connection;

	public function __construct(){
		$this->connection = new mysqli($this->host, $this->user, $this->password, $this->dbname);
	}

	public function select($query){
		$result = $this->connection->query($query) or die($this->connection->error.__LINE__);
		if ($result->num_rows > 0) {
			return $result;
		}else{
			return false;
		}
	}

	public function insert($query){
		$inserted_row = $this->connection->query($query) or die($this->connection->error.__LINE__);
		if ($inserted_row) {
			return $inserted_row;
		}else{
			return false;
		}
	}

	public function update($query){
		$update_rows = $this->connection->query($query) or die($this->connection->error.__LINE__);
		if ($update_rows) {
			return $update_rows;
		}else{
			return false;
		}
	}

	public function delete($query){
		$delete_row = $this->connection->query($query) or die($this->connection->error.__LINE__);
		if ($delete_row) {
			return $delete_row;
		}else{
			return false;
		}
	}
}



?>