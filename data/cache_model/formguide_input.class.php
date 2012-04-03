<?php
class formguide_input
{
	var $db;
	var $formid;
	var $fields;

    function __construct($formid)
    {
		global $db;
		$this->db = &$db;
		$this->formid = $formid;
		if($this->formid < 1) return false;
		$this->fields = cache_read($this->formid.'_formfields.inc.php', CACHE_MODEL_PATH);
	}

    function formguide_input($formid)
    {
    	$this->__construct($formid);	
    }
    
	function get($data)
	{
		global $_roleid, $_groupid;
		$info = array();
		foreach($data as $field=>$value)
		{
			if(!isset($this->fields[$field]) || check_in($_roleid, $this->fields[$field]['unsetroleids']) || check_in($_groupid, $this->fields[$field]['unsetgroupids'])) continue;
			$name = $this->fields[$field]['name'];
			$minlength = $this->fields[$field]['minlength'];
			$maxlength = $this->fields[$field]['maxlength'];
			$pattern = $this->fields[$field]['pattern'];
			$length = strlen($value);
			if(empty($this->fields[$field]['errortips'])) 
			{
				$errortips = $name." 不符合要求！";
			}
			else
			{
				$errortips = $this->fields[$field]['errortips'];
			}
			if($this->fields[$field]['issystem'] && !$value) showmessage("$name 为必填字段");
			if($minlength && $length < $minlength) showmessage("$name 不得少于 $minlength 个字符！");
			if($maxlength && $length > $maxlength) showmessage("$name 不得超过 $minlength 个字符！");
			if($pattern && $length && !preg_match($pattern, $value)) showmessage($errortips);
			$func = $this->fields[$field]['formtype'];
			if(method_exists($this, $func))
			{		
				$value = $this->$func($field, $value);
			}
			$info[$field] = $value;
		}
		return $info;
	}

	function areaid($field, $value)
	{
		global $AREA;
		if($value && !isset($AREA[$value])) showmessage("所选地区不存在！");
		return $value;
	}

	function box($field, $value)
	{
		if($this->fields[$field]['boxtype'] == 'checkbox') 
		{
			if(!is_array($value) || empty($value)) return false;
			$value = implode(',', $value);
		}
		return $value;
	}
	function datetime($field, $value)
	{
		if($this->fields[$field]['dateformat'] == 'int')
		{
			$value = strtotime($value);
		}
		return $value;
	}	function editor($field, $value)
	{
	    global $attachment;
		if($this->fields[$field]['enablesaveimage']) $value = $attachment->download($field, $value);
		return $value;
	}
	function textarea($field, $value)
	{
		if(!$this->fields[$field]['enablehtml']) $value = strip_tags($value);
		return $value;
	}
}
?>