<?php 
class SQL{
    
    public static $mysqli;
	private static $initialized = false;

        function __construct(){}
        
        public static function test(){
            return 'test';
        }
		
		public static function init(){
			if (self::$initialized)
					self::$initialized = true; 
					self::$mysqli = new \mysqli(DBPATH,DBUSER,DBPASS,DBNAME);
					if(self::$mysqli->connect_errno){
							die ('connection error');
					}else{
						return self::$mysqli;
					}
				return;
		}	

		public static function getOne($sql){
			$rows = array();
			$result = self::$mysqli->query($sql);
			if($result === false){
				return $rows;
			}
			if (self::countRows($sql)> 1) {
				while($row = $result->fetch_assoc()){
					$rows[] = $row;
				}
			}else{
				$rows = $result->fetch_assoc();
			}
			return $rows;
		}

		public static function countRows($sql){
			if($sql){
				if($q = self::$mysqli->query($sql)){
					return $q->num_rows;
				}
			}
		}

		public static function runQuery($sql) {
			$result = self::$mysqli->query($sql);
			return $result;
		}

		public static function error(){
			$connection = self::init();
			return $connection;	
		}

		public static function build_sql_update($table, $data, $where){
			$cols = array();
			foreach($data as $key=>$val) {
				$cols[] = "$key = '$val'";
			}
			$sql = "UPDATE $table SET " . implode(', ', $cols) . " WHERE $where";
			return($sql);
		}
		
		public static function insert($keyValue){ 
			if(is_array($keyValue)){
				foreach($keyValue as $key => $value){
					$fields[] = '`'.$key.'`';
					$values[] = "'".htmlspecialchars($value)."'";
				}
				return '('.implode(' , ',$fields).') VALUES '.'('.implode(' , ',$values).')';
			}
			return '';
		}

		public function __toString(){
			return get_class(self);
		}
}
SQL::init();
?>