<?php
class formguide_update
{
	var $formid;
	var $fields;
	var $tablename;

    function __construct($formid)
    {
		global $db, $FORMGUIDE;
		$this->db = &$db;
		$this->formid = intval($formid);
		if($this->formid < 1) return false; 
		$this->tablename = DB_PRE.'form_'.$FORMGUIDE[$this->formid]['tablename'];
		$this->fields = cache_read($this->formid.'_formfields.inc.php', CACHE_MODEL_PATH);
    }

	function formguide_update($formid)
	{
		$this->__construct($formid);
	}

	function update($data)
	{
		$info = array();
		foreach($data as $field=>$value)
		{
			if(!isset($this->fields[$field])) continue;
			$func = $this->fields[$field]['formtype'];
			$info[$field] = method_exists($this, $func) ? $this->$func($field, $value) : $value;
		}
		return $info;
	}

	
	function editor($field, $value)
	{
	    global $attachment, $_userid, $mod;
		if(!is_a($attachment, 'attachment'))
		{
			require 'attachment.class.php';
			$attachment = new attachment($mod);
		}
		if(!$value) return false;
		$attachment->upload($field, $value);
		return $value;
	}}
?>