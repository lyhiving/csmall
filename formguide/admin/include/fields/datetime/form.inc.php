	function datetime($field, $value, $fieldinfo)
	{
		extract($fieldinfo);
		if(!$value)
		{
			if($defaulttype == 0)
			{
				$value = '';
			}
			elseif($defaulttype == 1)
			{
				$df = $dateformat == 'datetime' ? 'Y-m-d H:i:s' : 'Y-m-d';
				$value = date($df, TIME);
			}
			else
			{
				$value = $defaultvalue;
			}
		}
		if(substr($value, 0, 10) == '0000-00-00') $value = '';
		$isdatetime = $dateformat == 'datetime' ? 1 : 0;
		$str = form::date("info[$field]", $value, $isdatetime);
		return $str;
	}
