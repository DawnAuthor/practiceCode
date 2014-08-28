<?php


class Debug{
	public static function log($data=array()){
		$request_agent = php_sapi_name();
		$nl = ($request_agent != 'cli')?"<br />":"\n";
		$debug_info = "DEBUG: INFORMATION" . $nl . "Date: " . date("m-d-Y H:i:s"). $nl;
		echo $debug_info;
		if(is_array($data) || is_object($data)){
    		echo ($request_agent != 'cli')?"<pre>":'';
   			print_r($data);
   			echo ($request_agent != 'cli')?"</pre>":'';
   		}else if(is_string($data) || is_bool($data) || is_numeric($data)){
			echo ($request_agent != 'cli')?"<pre>":'';
   			echo $data;
   			echo ($request_agent != 'cli')?"</pre>":'';
   			//var_dump($data);
   		}else{
   		    print_r("Empty");
   		}
		$debug_trace = debug_backtrace();
		if(isset($debug_trace[0])){
			echo "DEBUG TRACE:". $nl . "File: " . end(explode('/',$debug_trace[0]['file'])) . $nl . "Line: " . $debug_trace[0]['line'] . $nl.$nl;
		}else{
			echo "NO DEBUG TRACE AVAILABLE". $nl;
		}
		// echo "Terminating Scipt Execution!";
		// die();
	}

	public static function logBig($string, $bufferSize = 8192)
	{
	   // suggest doing a test for Integer & positive bufferSize
	   for ($chars=strlen($string)-1,$start=0;$start <= $chars;$start += $bufferSize) {
	       var_dump(substr($string,$start,$bufferSize));
	   }
	}

	public static function stop($str=""){
		$request_agent = php_sapi_name();
		$nl = ($request_agent != 'cli')?"<br />":"\n";
		echo "DEBUG: SCRIPT TERMINATION CALLING DIE FUNCTION" . $nl . 'Date: ' . date("m-d-Y H:i:s") . $nl.$nl;
		$debug_trace = debug_backtrace();
		if(isset($debug_trace[0])){
			echo "DEBUG TRACE:". $nl . "File: " . end(explode('/',$debug_trace[0]['file'])) . $nl . "Line: " . $debug_trace[0]['line'] . $nl.$nl;
		}else{
			echo "NO DEBUG TRACE AVAILABLE". $nl;
		}
		if(is_string($str)){
			die('DIE CALLED WITH STRING: '.$str);
		}
	}
}
?>