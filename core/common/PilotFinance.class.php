<?php
class PilotFinance extends CodonData
{
	#Pilot Finance
	public static function pilots()
	{
		$sql ="SELECT * FROM ".TABLE_PREFIX."pilots";
		return DB::get_results($sql);		
	}
	
	public static function page_pilots($count = '', $start = '')
	{
		$sql ="SELECT * FROM ".TABLE_PREFIX."pilots";
		if (strlen($count) != 0) {
            $sql .= ' LIMIT ' . $count;
        }

        if (strlen($start) != 0) {
            $sql .= ' OFFSET ' . $start;
        }
		return DB::get_results($sql);		
	}
	
	public static function last_reports($pilotid)
	{
		$sql ="SELECT * FROM ".TABLE_PREFIX."pireps WHERE pilotid = '$pilotid' ORDER BY submitdate";
		return DB::get_results($sql);		
	}
	
	public static function airlines()
	{
		$sql ="SELECT * FROM ".TABLE_PREFIX."airlines";
		return DB::get_results($sql);		
	}
	
	public static function fuel_sum($pilotid, $code)
	{
		$sql ="SELECT SUM(fuelprice) as total FROM ".TABLE_PREFIX."pireps WHERE pilotid = '$pilotid' AND code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function expense_sum($pilotid, $code)
	{
		$sql ="SELECT SUM(expenses) as total FROM ".TABLE_PREFIX."pireps WHERE pilotid = '$pilotid' AND code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function gross_sum($pilotid, $code)
	{
		$sql ="SELECT SUM(gross) as total FROM ".TABLE_PREFIX."pireps WHERE pilotid = '$pilotid' AND code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function revenue_sum($pilotid, $code)
	{
		$sql ="SELECT SUM(revenue) as total FROM ".TABLE_PREFIX."pireps WHERE pilotid = '$pilotid' AND code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function pilotrevenue_sum($pilotid)
	{
		
		$sql ="SELECT SUM(revenue) AS total FROM ".TABLE_PREFIX."pireps WHERE pilotid= '$pilotid'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function get_reports($pilotid, $code)
	{
		$sql ="SELECT * FROM ".TABLE_PREFIX."pireps WHERE pilotid = '$pilotid' AND code = '$code'";
		$row = DB::get_row($sql);
		return $row;		
	}
	
	#Airline Finance
	public static function expenses()
	{
		$sql ="SELECT * FROM ".TABLE_PREFIX."expenses";
		return DB::get_results($sql);
	}
	
	public static function airlinefuel_sum($code)
	{
		$sql ="SELECT SUM(fuelprice) AS total FROM ".TABLE_PREFIX."pireps WHERE code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function airlinepayrate_sum($code)
	{
		$sql ="SELECT SUM(pilotpay) AS total FROM ".TABLE_PREFIX."pireps WHERE code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function airlineexpense_sum($code)
	{
		$sql ="SELECT SUM(expenses) AS total FROM ".TABLE_PREFIX."pireps WHERE code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function airlinegross_sum($code)
	{
		$sql ="SELECT SUM(gross) AS total FROM ".TABLE_PREFIX."pireps WHERE code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
		
	public static function airlinerevenue_sum($code)
	{
		$sql ="SELECT SUM(revenue) AS total FROM ".TABLE_PREFIX."pireps WHERE code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	public static function airlineflighttime_sum($code)
	{
		$sql ="SELECT SUM(flighttime) AS total FROM ".TABLE_PREFIX."pireps WHERE code = '$code'";
		$row = DB::get_row($sql);		
		return $row->total;
	}
	
	
	
}
?>

