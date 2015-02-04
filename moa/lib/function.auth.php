<?php
// -------------- 권한 관련 함수들 -------------------
// 로딩 여부
if (defined("LOAD_FUNCTION_AUTH")) return;
define('LOAD_FUNCTION_AUTH', TRUE);

	// 권한
	// 로그인 여부
	function is_login() { return ($_SESSION['login_id']) ? TRUE:FALSE; }

	// 관리자 여부
	function is_admin() { global $MOA; return ($_SESSION['login_id'] && $_SESSION['login_level'] >= $MOA['levelAdmin']) ? TRUE:FALSE; }
	
	// 담당자 여부
	function is_Courseadmin() { global $MOA; return ($_SESSION['login_id'] && $_SESSION['login_level'] >= $MOA['levelCourseAdmin']) ? TRUE:FALSE; }


	// 총관리자 여부
	function is_master() { global $MOA; return ($_SESSION['login_id'] && $_SESSION['login_level'] >= $MOA['levelMaster']) ? TRUE:FALSE; }

	// 개발자 여부
	function is_developer() { global $MOA; return ($_SESSION['login_id'] && $_SESSION['login_level'] >= $MOA['levelDevel']) ? TRUE:FALSE; }

	// 실명인증 여부
	function is_realname() { 
		global $MOA;
		if ( ! $_SESSION["login_namevalidate"]) {
			Move($MOA['loginNamePath']);
		}
	} // function

	// 로그인 사용자만 접근, 로그인 아닐 시 로그인 페이지로 바로 이동
	function access_login($url = '', $message = '', $dom = '') {
		global $MOA;
		if ( ! $url) $url = $MOA['loginPath'];
		if ( ! $dom) $dom = 'top.';
		if ( ! is_login()) Move($url, $message, $dom);
	} // function

	// 관리자만 접근되게
	function access_admin() {
		global $MOA;
		access_login($MOA['loginPath'], '', 'top.');
		//if ( ! is_admin()) Move($MOA['homePath'], '관리자만 접근이 가능합니다.', 'top.');
		if ( ! is_Courseadmin()) Move($MOA['homePath'], '관리자와 코스담당자만 접근이 가능합니다.', 'top.');
	} // function

	// 전체관리자 접속
	function access_master() {
		global $MOA;
		access_login();
		if ($_SESSION['login_level'] < $MOA['levelMaster']) Move($MOA['homePath'], '전체관리자만 접근이 가능합니다.', 'top.');
	} // function

	// 개발자 접속
	function access_developer() {
		global $MOA;
		access_login();
		if ($_SESSION['login_level'] < $MOA['levelDevel']) Move($MOA['homePath'], '개발자만 접근이 가능합니다.', 'top.');
	} // function

	function access_login_msg($msg) {
		if ($_SESSION['login_id']) Error_Msg($msg,"알 림", "back","center");
		else Error_Msg($msg,"알 림", "login","center");
	} // function


?>