<?php
// ------------------------- config.php 파일은 시작 폴더에 있어야 함 --------------------------------
// 로딩 여부
if (defined("LOAD_CONFIG")) return;
define('LOAD_CONFIG', TRUE);

	// 에러메세지 출력 여부
	if ($_SERVER['REMOTE_ADDR'] == "123.142.108.140") {
		error_reporting(E_ALL ^ E_NOTICE);
		ini_set("display_errors", true);
	} else 
		ini_set("display_errors", false);

	// 세션 스타트
	session_start();

	// 환경상수
	// 문자셋
	const CHARSET = 'utf8';

	// 경로
	define(DOCUMENT_ROOT, $_SERVER['DOCUMENT_ROOT']);
//	const PATH_ROOT = '/';
	define(PATH_ROOT, substr(__DIR__, strlen($_SERVER['DOCUMENT_ROOT'])).'/');
	define(PATH_DATA, PATH_ROOT.'data/');
	define(PATH_MOA, PATH_ROOT.'moa/');
	define(PATH_LIB, PATH_MOA.'lib/');

	// 환경설정 변수
	$MOA = array();

	// 기본 기능 활성화 여부
	$MOA['set'] = array(
		'db'=>true, 
		'member'=>true, 
		'log'=>true,
		'querylog'=>true,
		'counter'=>true,
		'menu'=>ture,
		'debug'=>1 // 레벨 1 - 시간/메모리, 2 - 문자열 출력, 3 - DB 저장 (예정)
	);

	// DB
	$MOA['db'] = array(
		'type'=>'pdo',
		'dsn'=>'mysql:host=localhost;dbname=',
		'username'=>'',
		'password'=>''
	);
/*
	// 경로
	$MOA['path'] = array(
		'root'=>PATH_ROOT,
		'data'=>PATH_ROOT.'data/',
		'moa'=>PATH_ROOT.'moa/',
		'lib'=>PATH_ROOT.'moa/lib/',
	);
*/
	// 권한
	$MOA['level'] = array(
		'devel'=>200, // 개발
		'master'=>100, // 총관리
		'admin'=>99 // 일반 관리
	);

?>