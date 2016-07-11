<?php
	function pre($list, $exit = true)
	{
	    echo "<pre>";
	    print_r($list);
	    //if($exit)
	    //{
	       // die();
	    //}
	    echo "</pre>";
	}
	function public_url($url = '')
	{
		return base_url('/public'.$url);
	}
	function upload_url($url = '')
	{
		return base_url('/upload/'.$url);
	}
	function gettimenow()
	{
		$now = getdate();
		$fulltime = $now['year'].'-'.$now['mon'].'-'.$now['mday'].' '.$now['hours'].':'.$now['minutes'].':'.$now['seconds'];
		return $fulltime;
	}
	function blockpage()
	{
			redirect(base_url(),'refresh');
	}
	function getbeginweek()
	{
		$now = getdate();
		switch ($now['wday']) {
			case 0:
				$space = 6;
				break;
			case 1:
				$space = 0;
				break;
			case 2:
				$space = 1;
				break;
			case 3:
				$space = 2;
				break;
			case 4:
				$space = 3;
				break;
			case 5:
				$space = 4;
				break;
			case 6:
				$space = 5;
				break;
		}
		$startday = $now['mday'] - $space;
		return $startday;
	}
	function getWeekInfo()
	{
		$weekinfo = array();
		
	}
?>