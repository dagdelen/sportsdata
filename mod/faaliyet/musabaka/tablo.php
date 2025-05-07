
<?php
$fid = $_GET[f];
$skl = $_GET[s];
$adm = $_GET[kr];

$faaliyetuyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
$faaliyetuyetsqll->execute(array($fid));
$fa = $faaliyetuyetsqll->fetch(PDO::FETCH_ASSOC);	
$fa_say = $faaliyetuyetsqll->rowCount();

if($fa_say > 0){

	$faasikletsql = DB::prepare("SELECT * FROM siklet WHERE siklet_id = ? ");
	$faasikletsql->execute(array($skl));
	$fasikl = $faasikletsql->fetch(PDO::FETCH_ASSOC);	
	
	if($fasikl[stil]){
		$stilisqllq = DB::prepare("SELECT * FROM stil WHERE stil_id = ? ");
		$stilisqllq->execute(array($fasikl[stil]));
		$fastl = $stilisqllq->fetch(PDO::FETCH_ASSOC);	
	}
						
	$faketesql = DB::prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
	$faketesql->execute(array($fasikl[kategori]));
	$kate = $faketesql->fetch(PDO::FETCH_ASSOC);	
						
	
?>
<!--<meta http-equiv="refresh" content="5;url="">-->
<title> <?=$fastl[stil_ad]?> <?=$kate[kategori_ad]?> <?=$fasikl[siklet_ad]?> </title>

<div style=" margin:5px 7px 0 7px; background-color:#336699; color:#fff; padding:7px 20px 7px 20px; border-radius:5px 5px 5px 5px; font-size:1.5vw;">
<b><?=$fa[faaliyet_ad]?> (<?=$fastl[stil_ad]?> <?=$kate[kategori_ad]?> <?=$fasikl[siklet_ad]?>)</b>
</div>




<?php
//	echo" 11111111 mod/faaliyet/musabaka/tablo_inc.php <br>"; 
	include("mod/faaliyet/musabaka/tablo_inc.php");
 
if(!$_GET[fson]){ 
	?>
<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="12" r="3"><animate id="spinner_qFRN" begin="0;spinner_OcgL.end+0.25s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="12" cy="12" r="3"><animate begin="spinner_qFRN.begin+0.1s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="20" cy="12" r="3"><animate id="spinner_OcgL" begin="spinner_qFRN.begin+0.2s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle></svg>
<span id="dinle">...<br></span>
	<script>
	 $(document).ready(function() {
		 $("#dinle").load("mod/faaliyet/musabaka/tablo_dinle.php");
			var refreshId = setInterval(function() {
		  $("#dinle").load('mod/faaliyet/musabaka/tablo_dinle.php?f=<?=$fid?>&s=<?=$skl?>&t=<?=$tablo?>&sd=<?=$skldinle?>&kr=<?=$adm?>&tek=<?=$_GET[tek]?>&randval='+ Math.random());
	   }, 1000);
	});
	</script>
	<?php
}
 
if($tablo > 16 && 32 < $tablo){ $yazikrt = "font-size:0.6em;";}
if($tablo > 8 && 17 < $tablo){ $yazikrt = "font-size:0.7em;";}
if($tablo > 4 && 9 < $tablo){ $yazikrt = "font-size:0.8em;";}else{ $yazikrt = "font-size:0.9em;";}

	// echo"222222222 mod/faaliyet/musabaka/tablo_table.php <br> ";
	include("mod/faaliyet/musabaka/tablo_table.php");

}
?>