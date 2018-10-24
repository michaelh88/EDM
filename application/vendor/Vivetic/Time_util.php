<?php
/*
Example usage:
  $unixtime = TimeUtil::dateTimeToTimestamp('2009-04-01 15:36:13');
  echo TimeUtil::UTCToPST("M d, Y - H:i:s", $unixtime);
*/

// You should move this to your regular init method
date_default_timezone_set('UTC'); // make this match the server timezone

class TimeUtil {
    public static function timestampToDateTime($timestamp) {
        return gmdate('Y-m-d H:i:s', $timestamp);
    }

    public static function dateTimeToTimestamp($dateTime) {
        // dateTimeToTimestamp expects MySQL format
        // If it gets a fully numeric value, we'll assume it's a timestamp
        // You can comment out this if block if you don't want this behavior
        if(is_numeric($dateTime)) {
            // You should probably log an error here
            return $dateTime;
        }
        $date = new DateTime($dateTime); 
        $ret = $date->format('U');
        return ($ret < 0 ? 0 : $ret);
    }

    public static function UTCToPST($format, $time) {
        $dst      = intval(date("I", $time));
        $tzOffset = intval(date('Z', time()));
        return date($format, $time + $tzOffset - 28800 + $dst * 3600);
    }
		/* list des dates de l'intervalle de date choisie*/
 	public static function listDayOfDates ($date_start,$date_end)
	{ 
			$list     = array();		
			$date_tmp = $date_start;
			$i        = 1;
			$list[0] = $date_start;
			while($date_tmp != $date_end){
				list($year , $month, $day) = explode("-",$date_start);
				$daty = mktime( 0,0,0,date($month)-1  ,date($day) ,date($year)    );										   
				$j = "+1 day";
				$date_tmp   = date('Y-m-d', strtotime($date_start. $j));
				$date_start = $date_tmp;
				
				list($year_ , $month_, $day_) = explode("-",$date_tmp);
			    $sdate = $year_."-".$month_."-".$day_;
				$list[$i] = $sdate;
				$i++;
			}			
			
			return $list;
		}
	public static function dateToNumeric ($date)
	{ 
		list($year , $month, $day) = explode("-",$date);
		$daty = mktime( 0,0,0,date($month)-1  ,date($day) ,date($year)    );	
		return $daty;
	}
	/* list couplet de date lundi|dimanche de l'intervalle de date choisie*/

	public static function listWeekOfDates ($nList, $date_start ,$date_end)
	{  
	    $i_           = 0;
		$listDateWeek = array();
		$_fdate       = $date_end;
		$nextMonday   = $date_start;						
		$idatefin     = TimeUtil::dateToNumeric($_fdate);
		$_date   = $date_start;
		
							
		while ($i_ < $nList){
				$numDate = TimeUtil::numDate($_date);	
				
				if ($numDate == 0 && $i_== 0) 
				{ 
					 array_push($listDateWeek,$_date."|".$_date);
					 $nextMonday = TimeUtil::dateNDaysLater($_date,1);
					 $_date = $nextMonday;
					 $i_ += 1 ;					
				}
				else
				{   
				    $nextSunday    = TimeUtil::dateNDaysLater($_date,(7-$numDate));
					$nextMonday    = TimeUtil::dateNDaysLater($nextSunday,1);					
				    $i_ += (7-$numDate) ;
					$j = $i_ +7 ;
					if ($j > $nList){
						$j1 =   strtotime ($date_end) - strtotime ($nextMonday) ;
						if ($j1 >= 0 )
						{ 
						 array_push($listDateWeek,$_date."|".$nextSunday);
						 array_push($listDateWeek,$nextMonday."|".$date_end);
						}
						$i_ = $nList;						
						
					}else{  
							$j1     =    strtotime ($nextSunday) - strtotime ($date_end) ;
							if ($j1 >= 0) $nextSunday = $date_end;								
							$j2     =    strtotime ($nextSunday) - strtotime ($_date) ;
							if ($j2 >= 0) array_push($listDateWeek,$_date."|".$nextSunday);
							$_date  = $nextMonday;
						
					}
				}
						
			
			}
		return $listDateWeek; 
						
	}
	
	public static function dateValid ($date)
	{  
	  $date_f = $date;
		list($year,$month,$day) = explode('-', $date);
		$date_f = $year."-".$month."-31";
				if (checkdate($month,"31",$year) == false) {
					$date_f = $year."-".$month."-30";
					if (checkdate($month,"30",$year) == false) {
						$date_f = $year."-".$month."-29";
						if (checkdate($month,"29",$year) == false) {
						    $date_f = $year."-".$month."-28";
						}
					}
				}
		return $date_f ;
	}
	public static function listMonthOfDates ($_month, $date_start ,$date_end)
	{  
	    $i = 0;
		$listDateMonth = array();
		list($year, $month, $day)    = explode("-",$date_start);
		$date_d = $year."-".$month."-01";
			
	    while ($i < $_month){
				list($year, $month, $day)    = explode("-",$date_d);
				$next_month = $month+1;
				$next_year = $year;
				if ($next_month >12) {
					$next_month -= 12 ;
					$next_year = $year+1;
					if (strlen($next_month) == 1) $next_month = "0".$next_month;
				}else{
					if (strlen($next_month) == 1) $next_month = "0".$next_month;
				}
				
		      if ($i>0 && $i <$_month){
			  if($i == 1) $date_d = $date_start;
				$date_f = TimeUtil::dateValid($date_d) ;
				array_push($listDateMonth,$date_d."|".$date_f);				    			
				$date_d = $next_year."-".$next_month."-01";			
				
			}
			$i++;
		
		}
		$date_f = TimeUtil::dateValid($date_d) ;
		array_push($listDateMonth,$date_d."|".$date_end);				    			
		return $listDateMonth; 
	}
	
	public static function dateNDaysLater ($date_start,$j){ 
			//format "aaaa-mm-dd";
			$date_tmp = $date_start;			
			list($year , $month, $day) = explode("-",$date_tmp);			
			$j1       = "+".$j." day";			
			$date_tmp = date('Y-m-d', strtotime($date_start. $j1));			
			$sdate 	  = substr($date_tmp,0,4)."-".substr($date_tmp,5,2)."-".substr($date_tmp,8,2);
				
			return $sdate;
		}
	public static function numDate($date){
		
			list($year , $month, $day) = explode("-",$date);		
			$date_tmp = mktime( 0,0,0,date($month)  ,date($day) ,date($year)    );
			$num 	  = date('w',$date_tmp);
			return $num;
	}

   public static function getTimeToTzClt($date , $clTzSec){
			$t=explode("-", $date);
			list($date1,$time)=explode(" ", $t[2]);
			list($h,$m,$s)=explode(":", $time);
			$date_tmp_ =date ('Y-m-d H:m:s',mktime($h,$m,$s-$clTzSec,$t[1],$date1,$t[0]));
			return $date_tmp_; 
   }

}