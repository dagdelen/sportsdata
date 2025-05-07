<?php 
if($modal == 1){
	include("config.php");
}else{
	include("../../../config.php");	
}

	$fid = $_GET[f];
	$ring_id = $_GET[r];
	$mus_id = $_GET[m];
	$modal = $_GET[md];
	$randval = $_GET[randval];
	//echo"fid:$fid ring_id:$ring_id md:$modal r:$randval"; 

	$faaliyetuyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
	$faaliyetuyetsqll->execute(array($fid));
	$fa = $faaliyetuyetsqll->fetch(PDO::FETCH_ASSOC);
	

	/*if($modal == 1){
	$musaktifsql = DB::prepare("SELECT * FROM faaliyet_musabaka_aktif WHERE fid = ? AND rng = ? AND mid = ? ");
	$musaktifsql->execute(array($fid, $ring_id, $mus_id));
	}else{
	$musaktifsql = DB::prepare("SELECT * FROM faaliyet_musabaka_aktif WHERE fid = ? AND rng = ? ");
	$musaktifsql->execute(array($fid, $ring_id));
	}*/
	
	// poz  0 hazır, 1 oynuyor, 2 duraklat, 3 mola,   -1 maç bitti ara başladı
	$musaktifsql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND ring = ? ");
	$musaktifsql->execute(array($fid, $ring_id));

	$akt_mus = $musaktifsql->fetch(PDO::FETCH_ASSOC);
	$mus_aktif_say = $musaktifsql->rowCount();
if($mus_aktif_say > 0)
{
		$akt_id 	= $akt_mus[fa_mus_aktif_id];
		$aktif_raund= $akt_mus[aktR];
		$poz 		= $akt_mus[poz];
		$raund 		= $akt_mus[raund];
		$sure 		= $akt_mus[sure];
		$mola 		= $akt_mus[mola];
		$ara 		= $akt_mus[ara];
		$akt_raund 	= $akt_mus[aktR];
		$kro 		= $akt_mus[kro];
		$raund_fark = $raund - $akt_raund;
		
		$poz_hazir = 0;
		$poz_mola = 3;
		$poz_bitti = -1;

		$cihaz 	= $akt_mus[cihaz]; // 101 102 gibi juri kodu

		$sifir = 0;
		$bir = 1;

            //  AND rp > 0 AND bp > 0
		$kirmizi=DB::prepare("SELECT SUM(rp) AS takma_ad FROM fa_mus_skor 
		WHERE fid = ".$fid." AND mid = ".$akt_mus[mid]." AND akt = ".$akt_id." AND poz = 1 ");
		$kirmizi->execute();
		$redpuanlar= $kirmizi->fetch(PDO::FETCH_ASSOC);
		$red_topla = $redpuanlar[takma_ad];

		$mavi=DB::prepare("SELECT SUM(bp) AS takma_ad FROM fa_mus_skor 
		WHERE fid = ".$fid." AND mid = ".$akt_mus[mid]." AND akt = ".$akt_id."  AND poz = 1 ");
		$mavi->execute();
		$bluepuanlar= $mavi->fetch(PDO::FETCH_ASSOC);
		$blue_topla = $bluepuanlar[takma_ad];
		/*
		$red_puan 	= $akt_mus[redP];
		$blue_puan 	= $akt_mus[blueP];
		*/
		$red_puan 	= $red_topla;
		$blue_puan 	= $blue_topla;

        $res_height = "40%"; //   20vw
        $res_width  = "40%"; // 20vw 100%

    // JURI 

	if($modal == 1)
	{

        $res_height = "30%"; //10vw
        $res_width  = "30%";

			// HAZIR
			if($poz == 0)
			{ echo"HAZIR";
				$mac_sn = $kro;
				$sn = $mac_sn % 60;
				$dk = floor($mac_sn / 60);
				if(strlen($dk) == 1){$dk = "0$dk";}
				if(strlen($sn) == 1){$sn = "0$sn";}		
			
			} // OYNUYOR
			else if($poz == 1 && $kro > 0)
			{ echo"OYNUYOR";

					$kro = $kro - 1;
					$usorgu = DB::prepare("UPDATE fa_mus_aktif SET kro = ? WHERE fa_mus_aktif_id = ?  ");  
					$usorgu->bindParam(1, $kro, PDO::PARAM_INT);				
					$usorgu->bindParam(2, $akt_id, PDO::PARAM_INT);
					$usorgu->execute();	
			
			} // MOLA BAŞLAT  
			else if($poz == 1 && $kro == 0)
			{ echo" MOLA BAŞLAT poz 3";
			

					if($raund_fark == 0){
						
							// BERABERLİK VAR !!!!!!!!!!!!!!!!!!!!!!!!!!!!!	
							if($red_puan == $blue_puan)
							{ 
								echo" BERABERE BİTMİŞ poz 0 yapıp juri nin uzatmaları ayarlamasını bekleyelim  RAUN sayısını artırmalısın";
									
									$usorgu = DB::prepare("UPDATE fa_mus_aktif SET poz = ? , kro = ? WHERE fa_mus_aktif_id = ?  ");  
									$usorgu->bindParam(1, $poz_hazir, PDO::PARAM_INT);
									$usorgu->bindParam(2, $sifir, PDO::PARAM_INT);
									$usorgu->bindParam(3, $akt_id, PDO::PARAM_INT);
									$usorgu->execute();		
															
							}
							else
							{
								
                                    ?>
                                    <script>
                                        var audio = new Audio('gong.mp3');
                                        audio.play();       
                                    </script>
                                    <?php							
									echo" MÜSABAKA BİTTİ ARA BAŞLAT";
								// 	$koor = 2; AND koor = ? $usorgu->bindParam(3, $koor, PDO::PARAM_INT);
									$usorgu = DB::prepare("UPDATE fa_mus_aktif SET poz = ? , kro = ? WHERE fa_mus_aktif_id = ?  ");  
									$usorgu->bindParam(1, $poz_bitti, PDO::PARAM_INT);
									$usorgu->bindParam(2, $ara, PDO::PARAM_INT);
									$usorgu->bindParam(3, $akt_id, PDO::PARAM_INT);
									$usorgu->execute();		
								
								
									$zaman = date('Y-m-d H:i:s');
									$drm = 1; 
                                    /*
									$kayd = DB::insert('INSERT INTO fa_mus_skor (fid, mid, ring_id, raund, red, blue, zaman, drm) VALUES (?,?,?,?,?,?,?,?)'
									,array($fid, $mus_id, $ring_id, $akt_raund, $red_puan, $blue_puan, $zaman, $drm));
									if($error = DB::getLastError())
									{
										// echo ' hata mesajı: ' . $error[2];
										
									}
									else
									{

	
									}
									*/	
										if($red_puan > $blue_puan){$kose = "red";}
										if($red_puan < $blue_puan){$kose = "blue";}

										$dinleden = 1;
										include("mus_atlat.php");


										
							}
							
					
					
							

					}else{
						
					$usorgu = DB::prepare("UPDATE fa_mus_aktif SET poz = ? , kro = ? WHERE fa_mus_aktif_id = ?  ");  
					//$usorgu->bindParam(1, $raund_ileri, PDO::PARAM_INT); aktR = ? , 
					$usorgu->bindParam(1, $poz_mola, PDO::PARAM_INT);
					$usorgu->bindParam(2, $mola, PDO::PARAM_INT);
					$usorgu->bindParam(3, $akt_id, PDO::PARAM_INT);
					$usorgu->execute();	
						
					}
					
					
				
			} // DURAKLAT 
			else if($poz == 2)
			{ 
			
				echo"DURAKLAT";
			
				
			} // MOLA DÖNÜYOR
			else if($poz == 3 && $kro > 0 && $raund_fark > 0)
			{ echo"MOLA DÖNÜYOR ";
					
					$kro = $kro - 1;
					$usorgu = DB::prepare("UPDATE fa_mus_aktif SET kro = ? WHERE fa_mus_aktif_id = ?  ");  
					$usorgu->bindParam(1, $kro, PDO::PARAM_INT);
					$usorgu->bindParam(2, $akt_id, PDO::PARAM_INT);
					$usorgu->execute();	
			
			} //  MOLA BİTTİ İLERİ RAUNDA HAZIR
			else if($poz == 3 && $kro == 0 && $raund_fark > 0)
			{	echo" MOLA BİTTİ İLERİ RAUNDA HAZIR";
					$raund_ileri = $akt_raund + 1;
					$usorgu = DB::prepare("UPDATE fa_mus_aktif SET  aktR = ? , poz = ? , kro = ? WHERE fa_mus_aktif_id = ?  ");  
					$usorgu->bindParam(1, $raund_ileri, PDO::PARAM_INT);
					$usorgu->bindParam(2, $poz_hazir, PDO::PARAM_INT);
					$usorgu->bindParam(3, $sure, PDO::PARAM_INT);
					$usorgu->bindParam(4, $akt_id, PDO::PARAM_INT);
					$usorgu->execute();	

			} //  SON RAUND HAZIRLA
			else if($poz == 3 && $kro == 0 && $raund_fark == 0)
			{	echo" SON RAUND HAZIRLA SON RAUND ";

					$usorgu = DB::prepare("UPDATE fa_mus_aktif SET poz = ? , kro = ? WHERE fa_mus_aktif_id = ?  ");  
					$usorgu->bindParam(1, $poz_hazir, PDO::PARAM_INT);
					$usorgu->bindParam(2, $sure, PDO::PARAM_INT);
					$usorgu->bindParam(3, $akt_id, PDO::PARAM_INT);
					$usorgu->execute();	



			} 
			else if($poz == -1)
			{	echo" ARA SAYIYOR ";
			
					$kro = $kro - 1;
					$usorgu = DB::prepare("UPDATE fa_mus_aktif SET kro = ? WHERE fa_mus_aktif_id = ?  ");  
					$usorgu->bindParam(1, $kro, PDO::PARAM_INT);
					$usorgu->bindParam(2, $akt_id, PDO::PARAM_INT);
					$usorgu->execute();	
				
			}
		
            echo" $poz";
	}

	if($poz == -1)
	{
		// GALİBİ YANAR DÖNER YAPABİLİRİZ	
		if($red_puan > $blue_puan)
		{
			?><script>$(document).ready(function () { $('.red_ad_skr').addClass('win'); });</script><?php	
		}else if($red_puan < $blue_puan){
			?><script>$(document).ready(function () { $('.blue_ad_skr').addClass('win'); });</script><?php	
		}else if($red_puan == $blue_puan){
			?><script>$(document).ready(function () { $('.red_ad_skr').addClass('win'); });</script><?php	
			?><script>$(document).ready(function () { $('.blue_ad_skr').addClass('win'); });</script><?php	
		}
		
	}else{
		?><script>$(document).ready(function () { $('.red_ad_skr').removeClass('win'); });</script><?php	
		?><script>$(document).ready(function () { $('.blue_ad_skr').removeClass('win'); });</script><?php	
	}
			
	if($poz == 0){
		?><script>$(document).ready(function () { $('.raund').addClass('win'); });</script><?php	
	}else{
		?><script>$(document).ready(function () { $('.raund').removeClass('win'); });</script><?php	
	}

	if($poz == 2){
		?><script>$(document).ready(function () { $('.kronometre').addClass('win'); });</script><?php	
	}else{
		?><script>$(document).ready(function () { $('.kronometre').removeClass('win'); });</script><?php	
	}

	if($poz == 3){
		?><script>$(document).ready(function () { $('.ring').addClass('win'); });</script><?php	
	}else{
		?><script>$(document).ready(function () { $('.ring').removeClass('win'); });</script><?php	
	}
			
		/*			
		$kirmizi=DB::prepare("SELECT SUM(rp) AS takma_ad FROM fa_mus_skor 
		WHERE fid = ".$fid." AND mid = ".$akt_mus[mid]." AND akt = ".$akt_id." AND rp > 0 AND poz = 1 ");
		$kirmizi->execute();
		$redpuanlar= $kirmizi->fetch(PDO::FETCH_ASSOC);
		$red_topla = $redpuanlar[takma_ad];

		$mavi=DB::prepare("SELECT SUM(bp) AS takma_ad FROM fa_mus_skor 
		WHERE fid = ".$fid." AND mid = ".$akt_mus[mid]." AND akt = ".$akt_id." AND bp > 0 AND poz = 1 ");
		$mavi->execute();
		$bluepuanlar= $mavi->fetch(PDO::FETCH_ASSOC);
		$blue_topla = $bluepuanlar[takma_ad];
		*/
		
		$mac_sn = $kro;
		$sn = $mac_sn % 60;
		$dk = floor($mac_sn / 60);
		if(strlen($dk) == 1){$dk = "0$dk";}
		if(strlen($sn) == 1){$sn = "0$sn";}		
		

			$famussql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ?  ");
			$famussql->execute(array($akt_mus[mid]));
			$mus = $famussql->fetch(PDO::FETCH_ASSOC);	
			$musay = $famussql->rowCount();	 		
			
			$redsql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id=? ");
			$redsql->execute(array($mus[red]));
			$fred = $redsql->fetch(PDO::FETCH_ASSOC);	
							
			$reduyesql = DB::prepare("SELECT * FROM uye WHERE uye_id=? ");
			$reduyesql->execute(array($fred[uye]));
			$ured = $reduyesql->fetch(PDO::FETCH_ASSOC);	
			$ured_ad = "$ured[ad] $ured[soyad]";
            $ured_ad = mb_substr($ured_ad,0,21, 'UTF-8');

           
            if(file_exists("../../../$ured[resim]")){
                $r_resim = "../../../$ured[resim]";
            }else{
                $r_resim = "../../../assets/img/img_avatar$ured[cin].png";
            }

	//===================		
	$Rfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
	$Rfauyeyersql->execute(array($fred[uye]));
	$Ruyyr = $Rfauyeyersql->fetch(PDO::FETCH_ASSOC);
                                         
		if($fa[temsil] == "uye"){
			$tms_yer_ad = "";//_bireysel;
		}else{
			$tms_id_son = "_id";
			$tms_idne = "$fa[temsil]$tms_id_son";
        	$Rtemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
        	$Rtemssql->execute(array($Ruyyr[$fa[temsil]]));
        	$Rtms = $Rtemssql->fetch(PDO::FETCH_ASSOC);
                                                 
        	$Rtms_ad_son = "_ad";
        	$Rtms_adne = "$fa[temsil]$Rtms_ad_son";
         	$ured_yer = "$Rtms[$Rtms_adne]";

             $redyerbol =explode(" ", $ured_yer);	
             $ured_yer = "$redyerbol[0] $redyerbol[1]";
             $ured_yer = mb_substr($ured_yer,0,21, 'UTF-8'); 
			
		}
	        //===================														
				$bluesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id=? ");
				$bluesql->execute(array($mus[blue]));
				$fblue = $bluesql->fetch(PDO::FETCH_ASSOC);	
								
				$blueuyesql = DB::prepare("SELECT * FROM uye WHERE uye_id=? ");
				$blueuyesql->execute(array($fblue[uye]));
				$ublue = $blueuyesql->fetch(PDO::FETCH_ASSOC);	
				$ublue_ad = "$ublue[ad] $ublue[soyad]";
                $ublue_ad = mb_substr($ublue_ad,0,21, 'UTF-8');

                   
                if(file_exists("../../../$ublue[resim]")){
                    $b_resim = "../../../$ublue[resim]";
                }else{
                    $b_resim = "../../../assets/img/img_avatar$ublue[cin].png";
                }

        //===================														
        $Bfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
        $Bfauyeyersql->execute(array($fblue[uye]));
        $Buyyr = $Bfauyeyersql->fetch(PDO::FETCH_ASSOC);
                                         
		if($fa[temsil] == "uye"){
        	$tms_yer_ad = "";// _bireysel;
		}else{
        	$Btemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
        	$Btemssql->execute(array($Buyyr[$fa[temsil]]));
        	$Btms = $Btemssql->fetch(PDO::FETCH_ASSOC);
                                                 
        	$Btms_ad_son = "_ad";
         	$Btms_adne = "$fa[temsil]$Btms_ad_son";
         	$ublue_yer = "$Btms[$Btms_adne]";

             $blueyerbol =explode(" ", $ublue_yer);	
             $ublue_yer = "$blueyerbol[0] $blueyerbol[1]";  
             $ublue_yer = mb_substr($ublue_yer,0,21, 'UTF-8');         
		}
    	//===================	
				$eingsqli = DB::prepare("SELECT * FROM fa_mus_ring WHERE fa_mus_ring_id=? ");
				$eingsqli->execute(array($mus[ring]));
				$rng = $eingsqli->fetch(PDO::FETCH_ASSOC);	
				$ring_ad = $rng[fa_mus_ring_ad];	
			
}
		
            if(!$red_topla){$red_topla = 0;}
            if(!$blue_topla){$blue_topla = 0;}


        /*
       if($poz == 0 && $akt_raund == 1){  
            $red_topla = "<img src='$r_resim' style=' height:$$res_height; border-radius: 50% !important; width: $res_width; height: auto; vertical-align: middle; overflow-clip-margin: content-box; overflow: clip; '  >";    
            $blue_topla = "<img src='$b_resim'style=' height:$$res_height; border-radius: 50% !important; width: $res_width; height: auto; vertical-align: middle; overflow-clip-margin: content-box; overflow: clip; '>";          
       }  
       */
        
?>
		<script>
			$(document).ready(function(){
			 	$('.ring').html('<?=$ring_ad?>');
				$('.raund').html('<?=$aktif_raund?>');
				$('.red_ad_skr').html('<?=$ured_ad?>');
				$('.blue_ad_skr').html('<?=$ublue_ad?>');
				$('.red_yer_ad').html('<?=$ured_yer?>');
				$('.blue_yer_ad').html('<?=$ublue_yer?>');
				/*
				$('.red_puan').html('<?=$red_puan?>');
				$('.blue_puan').html('<?=$blue_puan?>');
				*/
				$('.red_puan').html("<?=$red_topla?>");
				$('.blue_puan').html("<?=$blue_topla?>");
				$('.kronometre').html('<?=$dk?>:<?=$sn?>');
			});	
		</script>
		<?php 		
				







?>


