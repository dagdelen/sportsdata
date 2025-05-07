<?php 
include("../../../../config.php");
$fid = $_GET[f];
$ring = $_GET[r];

foreach ($_GET['listItem'] as $sr => $item)
{
	$bossaat = "00:00:00";
	$sr = $sr+1;;
	$sorgu = DB::prepare("UPDATE fa_mus SET  sr = ?, saat = ? WHERE fa_mus_id = ? ");
	$sorgu->bindParam(1, $sr, PDO::PARAM_INT);
	$sorgu->bindParam(2, $bossaat, PDO::PARAM_STR);
	$sorgu->bindParam(3, $item, PDO::PARAM_INT);
	$sorgu->execute();  
  
	?>  
	<script>
		$(".sr_<?=$item?>").html("<?=$sr?> -");
		$(".mac_saati<?=$item?>").html("00:00");
    </script>
	<?php
  
}

?>