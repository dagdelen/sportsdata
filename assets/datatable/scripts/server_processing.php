<?php
$table = 'sporcu';

$primaryKey = 'sporcu_id';

$columns = array(

	array( 'db' => '`u`.`uye_id`', 		'dt' => 0, 'field' => 'uye_id' ),
	array( 'db' => '`u`.`ad`', 			'dt' => 1, 'field' => 'ad' ),
	array( 'db' => '`u`.`soyad`',  		'dt' => 2, 'field' => 'soyad' ),
	array( 'db' => '`u`.`dtarih`', 		'dt' => 3, 'field' => 'dtarih', 'formatter' => function( $d, $row ) {
																	return date( 'd.m.Y', strtotime($d));
																}),
	array( 'db' => '`d`.`derece_ad`',   'dt' => 4, 'field' => 'derece_ad' ),
	array( 'db' => '`i`.`il_ad`',   	'dt' => 5, 'field' => 'il_ad' ),
	array( 'db' => '`k`.`kulup_ad`',   	'dt' => 6, 'field' => 'kulup_ad' ),
	array( 'db' => '`u`.`cin`',  		'dt' => 7, 'field' => 'cin',
	'formatter' =>  function ($d, $row ) {
        if ($d === "0") {
            return '?';
        }
        if ($d == 1) {
            return 'E';
        }
        if ($d == 2) {
            return 'K';
        }
        return '!';
     }
	
	
	 )
	 
	 
	 
/*  */	

	/*	array( 'db' => 'sporcu_id', 'dt' => 'DT_RowId',
		'formatter' => function( $d, $row ) {
			return 'row_'.$d;
		}
	),*/

/* 
	array( 'db' => '`s`.`sporcu_id`', 	'dt' => 'sporcu_id' ),
	array( 'db' => '`u`.`ad`', 			'dt' => 'ad' ),
	array( 'db' => '`u`.`soyad`',  		'dt' => 'soyad' ),
	array( 'db' => '`u`.`dtarih`', 		'dt' =>  'dtarih' ),
	array( 'db' => '`d`.`derece_ad`',   'dt' =>  'derece_ad' ),
	array( 'db' => '`i`.`il_ad`',   	'dt' =>  'il_ad' ),
	array( 'db' => '`k`.`kulup_ad`',   	'dt' =>  'kulup_ad' ),
	array( 'db' => '`u`.`cin`',  		'dt' =>  'cin' )
  */		
	
);

$sql_details = array(
	'user' => 'myafyonc_sportsdata',
	'pass' => 'tKEHhnTUXqwad9UhwvKs',
	'db'   => 'myafyonc_sportsdata',
	'host' => 'localhost'
);

require('../../../../config.php' );
require('ssp.customized.class.php' );
$dene = 34;

	$joinQuery = "FROM `sporcu` AS `s` 
	JOIN `uye` AS `u` ON (`u`.`uye_id` = `s`.`uye`) 
	JOIN `derece` AS `d` ON (`s`.`derece` = `d`.`derece_id`)
	JOIN `il` AS `i` ON (`s`.`il` = `i`.`il_id`)
	JOIN `kulup` AS `k` ON (`s`.`kulup` = `k`.`kulup_id`)
	";
	$extraWhere = "`s`.`".$yer."` = $yer_id";
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