<?php 
include("../../../../config.php");
$fid 	= $_POST[fid];
$ring 	= $_POST[ring];
$prg 	= $_POST[prg]; 
$gun 	= $_POST[gun]; 

//	 echo"fid:$fid ring:$ring prg:$prg gun:$gun ";
$sifir = 0;

if($gun == 0){
	$d_krt = "AND d = 0";
}else{
	$d_krt = "AND d > 0";
	
}

	if($prg > 0){
		$faprogramsql = DB::prepare("SELECT tarih,baslama,bitis FROM fa_program WHERE fa_program_id = ? ");
		$faprogramsql->execute(array($prg));
		$fapr = $faprogramsql->fetch(PDO::FETCH_ASSOC);	
						
		$mac_baslama_saati 	= $fapr[baslama];
		$mac_bitis_saati 	= $fapr[bitis];
		
		$mac_basla 			= strtotime($mac_baslama_saati);
		$mac_bit 			= strtotime($mac_bitis_saati);	
		//          AND d > 0 
 $lstmurngsql =  "SELECT * FROM fa_mus WHERE fid = ? AND blue > 0 AND ring = ? AND saat = ? AND gun = ? ".$d_krt."
 ORDER BY sr ASC ";
 $lstrmsparams = array($fid, $ring, "00:00:00", $gun);	
 
	}else if($prg == -1){
 $lstmurngsql =  "SELECT * FROM fa_mus WHERE fid = ? AND blue > 0 AND ring = ? AND gun = ?  ".$d_krt."
 ORDER BY sr ASC ";
 $lstrmsparams = array($fid, $ring, $gun);	
 
	}
 $lstrmsstmt = DB::prepare($lstmurngsql);
 $lstrmsstmt->execute($lstrmsparams);
 $i=0;
 foreach($lstrmsstmt as $musr)
 { 
 $i++;
	//////////////////////////	
	$fabrssuresql = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid = ? AND brans = ? AND stil = 0  AND kategori = 0 AND siklet = 0 ");
	$fabrssuresql->execute(array($fid,$musr->brs));
	$brs_sure_say = $fabrssuresql->rowCount();
	if($brs_sure_say > 0){  
	$mac_sure = $fabrssuresql->fetch(PDO::FETCH_ASSOC);	
	}
					
	$fastlsuresql = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid = ? AND brans = ? AND stil = ? AND kategori = 0 AND siklet = 0 ");
	$fastlsuresql->execute(array($fid,$musr->brs,$musr->stl));
	$stl_sure_say = $fastlsuresql->rowCount();
	if($stl_sure_say > 0){  
	$mac_sure = $fastlsuresql->fetch(PDO::FETCH_ASSOC);	
	}
						
	$fakatsuresql = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid = ? AND brans = ? AND stil = ? AND kategori = ? AND siklet = 0  ");
	$fakatsuresql->execute(array($fid,$musr->brs,$musr->stl,$musr->kat));
	$kat_sure_say = $fakatsuresql->rowCount();
	if($kat_sure_say > 0){  
	$mac_sure = $fakatsuresql->fetch(PDO::FETCH_ASSOC);	
	}
				
	$fasklsuresql = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid = ? AND brans = ? AND stil = ? AND kategori = ? AND siklet = ?  ");
	$fasklsuresql->execute(array($fid,$musr->brs,$musr->stl,$musr->kat,$musr->skl));
	$skl_sure_say = $fasklsuresql->rowCount();
	if($skl_sure_say > 0){  
	$mac_sure = $fasklsuresql->fetch(PDO::FETCH_ASSOC);	
	}
	
	 $bos_saat = "00:00:00";
	//////////////////////////	
	if($prg > 0){
				
		if($mac_bit > $mac_basla)
		{
			if($musr->blue > 0){ 
				$mola_hesap = $mac_sure[raund] - 1;
				$mola_hesap = $mola_hesap * $mac_sure[mola];
				
				$raund_hesap = $mac_sure[sure]  * $mac_sure[raund];
				
				$mac_basla = $mac_basla + $mola_hesap  + $raund_hesap + $mac_sure[ara];	
				
					if($i == 1){$mac_basla = strtotime($mac_baslama_saati);}
					
					$macsaati = date("H:i", $mac_basla);
			}
		
		
					$saatgunc = DB::prepare("UPDATE fa_mus SET prg = ?,gun = ?, saat = ? WHERE fa_mus_id = ? ");  
					$saatgunc->bindParam(1, $prg, PDO::PARAM_INT);
					$saatgunc->bindParam(2, $gun, PDO::PARAM_INT);
					$saatgunc->bindParam(3, $macsaati, PDO::PARAM_STR);
					$saatgunc->bindParam(4, $musr->fa_mus_id, PDO::PARAM_INT);
					$saatgunc->execute();	
							
					 ?>
					 <script>
						$(".mac_saati<?=$musr->fa_mus_id?>").html("<?=$macsaati?>");
						/* 
						$(".sira<?=$musr->fa_mus_id?>")
						.fadeIn('slow').animate({opacity: 0.4}, 700)
						.fadeOut('slow',function() {$(".sira<?=$musr->fa_mus_id?>").remove(); });
					 */
					//	$(".mac_saati_ack<?=$musr->fa_mus_id?>").html("<?=$mac_sure[sure]?> x <?=$mac_sure[raund]?> + <?=$mac_sure[mola]?> sn mola, <?=$mac_sure[ara]?> sn ara.");
					 </script>
					 <?php
						
					
										

			
		}else{
			$macsaati = "sıradaki";
		}
 
	}else if($prg == -1){
		
					$saatgunc = DB::prepare("UPDATE fa_mus SET prg = ?, saat = ? WHERE fa_mus_id = ? ");  
					$saatgunc->bindParam(1, $sifir, PDO::PARAM_STR);
					$saatgunc->bindParam(2, $bos_saat, PDO::PARAM_STR);
					$saatgunc->bindParam(3, $musr->fa_mus_id, PDO::PARAM_INT);
					$saatgunc->execute();	
					
							
					 ?>
					 <script>
						$(".mac_saati<?=$musr->fa_mus_id?>").html("00:00");
						/*
						$(".sira<?=$musr->fa_mus_id?>").addClass("opac4");
						$(".sira<?=$musr->fa_mus_id?>")
						.fadeIn('slow').animate({opacity: 0.4}, 700)
						.fadeOut('slow',function() {$(".sira<?=$musr->fa_mus_id?>").remove(); });
						*/
						// window.location.reload();
					 </script>
					 <?php
						
		
	}
 	
 }
 ?>