<?php

class TimeClass{

	private static $days = array(
		'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'
	);

	public static function relative($time, $format = 'jS F Y'){
		if(date('d/m/Y', $time) === date('d/m/Y')){
			return 'Today';
		}else if(date('d/m/Y', $time) === date('d/m/Y', $time() - 3600 * 24)){
			return 'Yesterday';
		}else if((time() - $time) < 3600 * 24 * 8){
			return 'Last ' . self::$days[date('w', $time)];
		}else{
			return date($format, $time);
		}
	}

	public static function relativeTime($timestamp, $format = 'Y-m-d H:i'){
		$dif = time() - $timestamp;

		$dateArray = array(
			'second' => 60,
			'minute' => 60,
			'hour' => 24,
			'day' => 7,
			'month' => 12,
			'year' => 10
		);

		foreach($dateArray as $key => $item){
			if($dif < $item){
				return $dif . ' ' . $key . ($dif == 1? '' : 's') . ' ago';
			}

			$dif = round($dif/$item);
		}

		return date($format, $timestamp);
	}
}

echo TimeClass::relative(time());