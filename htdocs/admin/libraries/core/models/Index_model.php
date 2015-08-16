<?php
defined('_EXEC') or die;

class Index_model extends Model
{
	function __construct()
	{
		parent::__construct();
	}
	
	function query($query)
	{
		return $this->database->query($query)->fetchAll(PDO::FETCH_ASSOC);
	}
}