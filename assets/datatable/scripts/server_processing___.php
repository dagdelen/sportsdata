<?php
$table = 'sporcular';

$primaryKey = 'id';

$columns = array(
	array( 'db' => '`u`.`ad`', 			'dt' => 0, 'field' => 'ad' ),
	array( 'db' => '`u`.`soyad`',  		'dt' => 1, 'field' => 'soyad' ),
	array( 'db' => '`d`.`ad`',   'dt' => 2, 'field' => 'der' ),
	array( 'db' => '`i`.`ad`',   	'dt' => 3, 'field' => 'ad' ),
	array( 'db' => '`k`.`ad`',   	'dt' => 4, 'field' => 'ad' )
);

$sql_details = array(
	'user' => 'myafyonc_sportsdata',
	'pass' => 'tKEHhnTUXqwad9UhwvKs',
	'db'   => 'myafyonc_sportsdata',
	'host' => 'localhost'
);

require('ssp.customized.class.php' );
$dene = 34;

	$joinQuery = "FROM `sporcular` AS `s` 
	JOIN `uyeler` AS `u` ON (`u`.`id` = `s`.`uye`) 
	JOIN `dereceler` AS `d` ON (`s`.`derece` = `d`.`id`)
	JOIN `il` AS `i` ON (`s`.`il` = `i`.`id`)
	JOIN `kulup` AS `k` ON (`s`.`kulup` = `k`.`id`)
	";
	$extraWhere = "`s`.`il` = $dene";
 	$groupBy = "`s`.`uye`";
// $having = "`s`.`derece` > 0";

echo json_encode(
	SSP::simple( $_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere, $groupBy, $having )
);

/*
FROM sporcular s
		  LEFT JOIN uyeler u
			ON u.id = s.uye
		  LEFT JOIN dereceler d
			ON s.derece = d.derece_id
			
			*/