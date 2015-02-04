<?php
// 로딩 여부
if (defined("LOAD_CONFIG_LOAD")) return;
define('LOAD_CONFIG_LOAD', TRUE);

	//  설정값
	include dirname(__FILE__).'/config.php';

	// DEVELOPER
	if (is_file(dirname(__FILE__).'/devel/config.devel.php')) include dirname(__FILE__).'/devel/config.devel.php';
	
	// 기본 함수
	include DOCUMENT_ROOT.PATH_LIB.'function.core.php';

	// 디버깅 여부
	if ($MOA['set']['debug']) include DOCUMENT_ROOT.PATH_LIB.'function.debug.php';

	// DB
	if ($MOA['set']['db']) include DOCUMENT_ROOT.PATH_LIB.'function.db.php';

	

?>