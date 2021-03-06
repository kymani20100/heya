<?php 

// GET THE CONNECTION TO THE DB WHEN ALREADY CREATED
global $db;

class DB {
	
	private static $_instance = null;
	private $_pdo,
			$_query,
			$_error = false,
			$_results,
			$_count = 0;
	
	// DATABASE CONSTRUCT / CONNECTION
	private function __construct(){
		try{
			require_once 'configs.php';
			$this->_pdo =  $db;
		}catch(PDOException $e){
			die($e->getMessage());
		}
		
	}
	
	// SINGLETON DB INSTANCE
	public static function getInstance(){
		if(!isset(self::$_instance)){
			self::$_instance = new DB();
		}
		return self::$_instance;
	} 
	
	// QUERYING DATABASE FUNCTION 
	public function query($sql, $params = array()){
		$this->_error = false;
		if($this->_query = $this->_pdo->prepare($sql)){
			$x = 1;
			if(count($params)){
				foreach($params as $param){
					$this->_query->bindValue($x, $param);
					$x++;
				}
			}
			
			if($this->_query->execute()){
				$this->_results = $this->_query->fetchAll(PDO::FETCH_OBJ);
				$this->_count = $this->_query->rowCount();
			}else{
				$this->_error = true;
			}	
		}
		return $this;
	}
	
	// ACTION QUERYING DATABASE FUNCTION 
	public function action($action, $table, $where = array()){
		if(count($where) === 3){
			$operators = array('=', '>', '<', '>=', '<=', '!=');
			
			$field     = $where[0];
			$operator  = $where[1];
			$value     = $where[2];
			
			if(in_array($operator, $operators)){
				$sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
				
				if(!$this->query($sql, array($value))->error()){
					return $this;
				}		
			}	
		}
		return false;
	}
	
	// GET ACTION TO SELECT FROM DATABASE FUNCTION 
	public function get($table, $where){
		return $this->action('SELECT *', $table, $where);
	}
	
	// DELETE ACTION TO DELETE FROM DATABASE FUNCTION 
	public function delete($table, $where){
		return $this->action('DELETE', $table, $where);
	}
	
	// INSERT ACTION TO INSERT INTO DATABASE FUNCTION 
	public function insert($table, $fields = array()){
		if(count($fields)){ 
			$keys = array_keys($fields);
			$values = '';
			$x = 1;
			
			foreach($fields as $field){
				$values .= '?';
				if($x < count($fields)){
					$values .= ', ';
				}
				$x++;
			}
			
			$sql = "INSERT INTO {$table}(". implode(', ', $keys). ") VALUES({$values})";
			
			if(!$this->query($sql, $fields)->error()){
				return true;
			}
		}
		return false;
	}
	
	// UPDATE ACTION TO UPDATE TABLE FUNCTION 
	public function update($table, $id, $fields){
		$set = '';
		$x = 1;
		foreach($fields as $name => $value){
			$set .= "{$name} = ?";
			if($x < count($fields)){
				$set .= ', ';
			}
			$x++;
		}
		$sql = "UPDATE {$table} SET {$set} WHERE id = {$id} ";
		if(!$this->query($sql, $fields)->error()){
			return true;
		}
		return false;
	}
	
	// RETURN RESULTS FUNCTION 
	public function results(){
		return $this->_results;
	}
	
	// GETTING ONLY THE FIRST ROW
	public function first(){
		return $this->results()[0];
	}
	
	public function error(){
		return $this->_error;
	}
	
	
	public function count(){
		return $this->_count;
	}
	
}