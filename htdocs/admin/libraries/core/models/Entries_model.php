<?php
defined('_EXEC') or die;

class Entries_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	
    function select($table, $columns, $where=false)
	{
		return $this->database->select($table, $columns, $where);
	}
	function insert($table, $datas)
	{
		return $this->database->insert($table, $datas);
	}
	function delete($table, $where)
	{
		return $this->database->delete($table, $where);
	}

}