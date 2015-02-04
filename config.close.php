<?php
	// 마지막 닫히기전 작업
	if ($MOA['set']['debug']) {
		debug_add('End');
		if ($MOA['set']['debug'] == 1) {
			$no = 0;
			//printr($DEBUG['stack']);
			foreach ($DEBUG['stack'] as $value) {
				echo '<h2>'.$value['title'].'</h2>';
				echo '<p>';
				if (!$no) { $start_time = $value['time']; echo '0'; }
				else echo number_format($value['time'] - $start_time, 5);
				echo '초, ';
				echo $value['memory'];
				++$no;
			} // foreach
		} // if
	} // if

?>