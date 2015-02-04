<?php
	// 개발 서버
	const IP = '123.142.108.146';
	const ACCESS_IP = '123.142.108.140';

	if( $_SERVER['SERVER_ADDR'] = IP) {
		// 개발 DB
		$MOA['db'] = array(
			'type'=>'pdo',
			'dsn'=>'mysql:host=localhost;dbname=moainfo150203',
			'username'=>'moainfo',
			'password'=>'ahdkwjdqh9754'
		);
	} // if
?>