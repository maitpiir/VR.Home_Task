<?php

class Database {

	private $connection;

	public function __construct() {
		$mysqli = new mysqli(DATABASE_URL, DATABASE_USER, DATABASE_PASSWORD,DATABASE_NAME);

		if($mysqli->connect_errno) {
			return;
		}

		$this->connection  = $mysqli;

		mysqli_set_charset($this->connection, 'utf8');

	}
	
	public function get($query) {

		$result = $this->connection->query($query);

		$returnData = [];
		if ( $result ) {
			while($row = $result->fetch_row()) {
				$returnData[] = $row;
			}
		}

		return $returnData;
	}

	public function create($query) {

		$result = $this->connection->query( $query );

		if ( $result ) {
			 return $this->connection->insert_id;
		}
		else {
			return false;
		}
		
		return 0;
	}

	public function update($query) {
		$result = $this->connection->query($query);

		if(!$result) {
			return false;
		}

		return $result != false;
	}

	public function execute($sql) {
		$result = $this->connection->query($sql);
		if(!$result) {
			return false;
		}
		return $result;
	}

}