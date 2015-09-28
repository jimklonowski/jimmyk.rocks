<?php
	class Database{
		public $host = DB_HOST;
		public $user = DB_USER;
		public $pass = DB_PASS;
		public $db_name = DB_NAME;
		public $link;
		public $error;
		//constructor
		public function __construct(){
			$this->connect();
		}
		//connector
		private function connect(){
			$this->link = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
			//verify connection
			if(!$this->link){
				$this->error = "Connection Failed: ".$this->link->connect_error;
				return false;
			}
		}
		//select
		public function select($query){
			$result = $this->link->query($query) or die($this->link->error.__LINE__);
			if($result->num_rows > 0){
				return $result;
			}else{
				return false;
			}
		}
		//insert
		public function insert($query){
			$insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if(insert_row){
				header("Location: index.php?msg=".urlencode('Record Added'));
				ob_end_flush();
				exit();
			}else{
				die('Error: ('.$this->link->errorno.') '.$this->link->error);
			}
		}
		//update
		public function update($query){
			$update_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if($update_row){
				header("Location: index.php?msg=".urlencode('Record Updated'));
				ob_end_flush();
				exit();
			}else{
				die('Error: ('.$this->link->errorno.') '.$this->link->error);
			}
		}
		//delete
		public function delete($query){
			$delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
			if($delete_row){
				header("Location: index.php?msg=".urlencode('Record Deleted'));
				ob_end_flush();
				exit();
			}else{
				die('Error: ('.$this->link->errorno.') '.$this->link->error);
			}
		}
	}
?>