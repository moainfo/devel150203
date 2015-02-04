<?php
// -------------- 디버그 관련 함수들 -------------------
// 로딩 여부
if (defined('LOAD_FUNCTION_DEBUG')) return;
define('LOAD_FUNCTION_DEBUG', TRUE);

	 //
	function microtime_float() {
		//list($usec, $sec) = explode(" ", microtime());
		//return ((float)$usec + (float)$sec);
		return microtime(true);
	} // function
	
	//
	if ( ! function_exists('memory_get_usage')) {
		function memory_get_usage()	{
			if ( substr(PHP_OS,0,3) == 'WIN') {
				   $output = array();
				   exec( 'tasklist /FI "PID eq ' . getmypid() . '" /FO LIST', $output );
				   return preg_replace( '/[\D]/', '', $output[5] ) * 1024;            
			} else {
			   $pid = getmypid();
			   exec("ps -eo%mem,rss,pid | grep $pid", $output);
			   $output = explode("  ", $output[0]);
			   return $output[1] * 1024;
			} // else
		} // function
	} // if
	
	function memory_format($num) {
		if ($num < 1024) 
			return number_format($num)." bytes";
		elseif ($num < 1048576) 
			return number_format(round($num/1024, 2))." Kbytes"; 
		else 
			return number_format(round($num/1048576, 2))." Mbytes"; 
	} // function

	function debug_add($str='NoName') {
		global $DEBUG;
		if (!isset($DEBUG['stack'])) $DEBUG['stack'] = array();
		array_push($DEBUG['stack'], array('title'=>$str, 'time'=>microtime_float(), 'memory'=>memory_format(memory_get_usage())));
	} // function

	// 모든 상수 출력
	function print_const() {
		printr(get_defined_constants(true));
	} // function

	debug_add('Start'); // 
?>
