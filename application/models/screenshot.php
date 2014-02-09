<?php

class Screenshot extends CI_Model{
	protected static $table = "screenshots";
	protected static $dbfields = array('id', 'name', 'app_id');
	
	public $id, $name="", $app_id="";
	
	/**
	 * fetches all rows from a given table
	 * with an optional clause, and it
	 * returns an array of objects which 
	 * are instances of the called class
	 */
	public function select_all($clause=""){
		$sql = "SELECT * FROM ".self::$table." ";
		$sql.= $clause;
		$result_array = $this->db->query($sql);
		return $result_array->result();
	}
	
	public function find_by_id($id){
		$sql = "SELECT * FROM ".self::$table." WHERE id=".$this->db->escape($id)." LIMIT 1";
        $query = $this->db->query($sql);
		$result_array = $query->result();
        return !empty($result_array)?array_shift($result_array):false;
	}
	
	
    public function count_all($clause=""){
        $sql = "SELECT COUNT(*) FROM ".self::$table." ";
		$sql.= $clause;
        $result_set = $this->db->query($sql);
        $row = $result_set->result_array();
        return array_shift($row);
    }
	
    /**
	 * return an array of attribute keys and their values
	 */
	protected function attributes(){
        $attributes = array();
        foreach(self::$dbfields as $field){
            if(property_exists($this, $field)){
                $attributes[$field] = $this->$field;
            }
        }
        return $attributes;
    }
	
	private function has_attribute($attribute){
        $object_vars = $this->attributes();
        return array_key_exists($attribute, $object_vars);
    }
	
	protected function sanitized_attributes(){
        $clean_attributes = array();
        foreach($this->attributes() as $key=>$value){
            $clean_attributes[$key] = $this->db->escape($value);
        }
        return $clean_attributes;
    }
	
	/**
	 * this function recieves an object which is an instance
     * of the user class, which means it has all d attributes
	 */
	public function create(){
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO ".self::$table."(`";
        $sql.= implode("`, `", array_keys($attributes));
        $sql.= "`) VALUES(";
        $sql.= implode(", ", array_values($attributes));
        $sql.= ")";
        if($this->db->query($sql)){
            $this->id = $this->db->insert_id();
            return true;
        } else {
        	return false;
        }
    }
	
    public function update(){
        $attributes = $this->sanitized_attributes();
        $attribute_pairs = array();
        foreach($attributes as $key=>$value){
            $attribute_pairs[] = "`".$key."` = ".$value;
        }
        $sql = "UPDATE ".self::$table." SET ";
        $sql.= implode(", ", $attribute_pairs);
        $sql.= " WHERE `id`=".$this->db->escape($this->id);
        $query = $this->db->query($sql);
        return ($this->db->affected_rows()==1)?true:false;
    }
    
    public function delete($id=""){
    	if($id==""){
    		$id=$this->id;
    	}
        $sql = "DELETE FROM ".self::$table." WHERE ";
        $sql.= "`id`=".$this->db->escape($id);
        $sql.= " LIMIT 1";
        $this->db->query($sql);
        return ($this->db->affected_rows()==1)?true:false;
    }
    
    public function save(){
		
	}
}