<?php
// ---------------- 기본 함수들 (무조건 로딩) ----------------------
// 로딩 여부
if (defined("LOAD_FUNCTION_CORE")) return;
define('LOAD_FUNCTION_CORE', TRUE);
/*
	echobr($str) -  한줄 내리고 출력
	echospace($str) - 내용이 없으면 공백으로 출력
	move($link='', $msg='', $dom='', $script = '') -  페이지 이동
	javascript($content) - 자바스크립트문 출력
	printr($vars, $title = NULL, $output = false) - 배열값을 출력 ($output=true는 값을 리턴한다.)
*/

	function echobr($str) { 
		global $MOA;
		if ( ! $str) return;
		if ( ! headers_sent() && CHARSET) Header("Content-type: text/html; charset=".CHARSET);
		echo '<br>'.$str; 
	} // function

	function echospace($str='') {
		echo ($str) ? $str:'&nbsp;';
	} // function


	function move($link='', $msg='', $dom='', $script = '') { // 페이지 이동 (메세지 출력)
		global $MOA;
		if (!$msg && !$link) return;
		if ( ! headers_sent() && CHARSET) Header("Content-type: text/html; charset=".CHARSET);
		echo '<script>';
		if ($msg) echo "alert('".$msg."');";
		if ($script) echo $script;
		if ($link=="close") echo "window.close();";
		else if ($link=="back") echo "history.go(-1);";
		else if ($link) {
			if (strpos($link, 'redirect=') === false) {
				echo "{$dom}document.location.href='".str_replace('&amp;', '&', $link)."';";
			} else { // 로그인시 되돌아가기 url이 있을때
				echo "
				// 부모 프레임이 존재할 경우
				if (parent.location.href != '' && parent.location.href != window.document.location.href)
					{$dom}document.location.href='".str_replace('&amp;', '&', url_edit($link, 'redirect='))."&redirect=' + parent.location.href;
				else
					{$dom}document.location.href='".str_replace('&amp;', '&', $link)."';";
			} // else
		} // else if
		echo "</script>";
		exit();
	 } // function Move

	function javascript($content) { // 자바스크립트문 출력
		global $MOA;
		if (!$content) return;
		if ( ! headers_sent() && CHARSET) Header("Content-type: text/html; charset=".CHARSET);
		// echo "<script type='text/javascript'>\n";
		echo "<script>\n";
		echo $content;
		echo "\n</script>\n";
	} // function Msg

	// 배열값 출력
	function printr($vars, $title = NULL, $output = false) {
		if (isset($title) && $title) echo '<h1>'.$title.'</h1>';
		if ( ! $output) {
			echo '<pre>';
			print_r($vars);
			echo '</pre>';
		} else {
			return '<pre>'.print_r($vars, true).'</pre>';
		} // else
	} // function
?>