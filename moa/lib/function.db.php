<?php
// -------------- 데이터베이스 관련 함수들 -------------------
// 로딩 여부
if (defined("LOAD_FUNCTION_DB")) return;
define('LOAD_FUNCTION_DB', TRUE);

	// DB 접속
	if ($MOA['db']['type']=='pdo') {
		try {
			$pdo = new PDO($MOA['db']['dsn'], $MOA['db']['username'], $MOA['db']['password']);
			if (CHARSET) $pdo->exec('SET CHARACTER SET '.CHARSET);
			// 에러 출력하지 않음
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
			// Warning만 출력
			//$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
			// 에러 출력
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo 'db connect';

		} catch(PDOException $e) {
			echo 'DB Connect Error';
			if(ACCESS_IP == $_SERVER['REMOTE_ADDR']) echo ' - '.$e->getMessage();
			exit();
		}
	} else exit('Not support.');

?>