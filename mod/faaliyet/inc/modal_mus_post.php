<?php
	$aid        = $_POST[aid];		
	$fid        = $_POST[fid];		
	$mus_id     = $_POST[yonet_modal];		
	$ring_id    = $_POST[ring_id];	
	$poz        = $_POST[poz];	
	$ne         = $_POST[ne];	
	$bit_krt    = $_POST[bit_krt];
	$kazanan    = $_POST[kazanan]; // red blue
	$redp       = $_POST[redp]; // red puan
	$bluep      = $_POST[bluep]; // blue puan 
	
	$eks        = $_POST[eks]; // arti eksi
	$arti_eksi  = $_POST[arti_eksi]; //red blue
	$eks_puan   = $_POST[eks_puan]; // puan
	
	$aktifmussql = DB::prepare("SELECT * FROM faaliyet_musabaka_aktif WHERE id = ? ");
	$aktifmussql->execute(array($aid));
	$aktmus = $aktifmussql->fetch(PDO::FETCH_ASSOC);	

        // echo"aid:$aid fid:$fid mus_id:$mus_id ring_id:$ring_id poz:$poz ne:$ne <br>";

	if($ne == "akt")
	{

			$famussql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ?  ");
			$famussql->execute(array($mus_id));
			$mus = $famussql->fetch(PDO::FETCH_ASSOC);	
			        $musay = $famussql->rowCount();	 		
			 
			$famusringsql = DB::prepare("SELECT * FROM fa_mus_ring WHERE fa_mus_ring_id = ?  ");
			$famusringsql->execute(array($ring_id));
			$mur = $famusringsql->fetch(PDO::FETCH_ASSOC);	


                $brsstlkatskl = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid=? AND brans=? AND stil=? AND kategori=? AND siklet=? AND aktif=1 ");
                $brsstlkatskl->execute(array($mus[fid], $mus[brs], $mus[stl], $mus[kat], $mus[skl] ));

                $brsstlkat = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid=? AND brans=? AND stil=? AND kategori=? AND siklet=0 AND aktif=1 ");
                $brsstlkat->execute(array($mus[fid], $mus[brs], $mus[stl], $mus[kat] ));

                $brsstl = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid=? AND brans=? AND stil=? AND kategori=0 AND siklet=0 AND aktif=1 ");
                $brsstl->execute(array($mus[fid], $mus[brs], $mus[stl]));

                $brssdc = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid=? AND brans=? AND stil=0 AND kategori=0 AND siklet=0 AND aktif=1 ");
                $brssdc->execute(array($mus[fid], $mus[brs]));

                $hicbiseysiz = DB::prepare("SELECT * FROM fa_mus_sure WHERE fid=? AND brans=0 AND stil=0 AND kategori=0 AND siklet=0 AND aktif=1 ");
                $hicbiseysiz->execute(array($mus[fid]));

                if($hicbiseysiz->rowCount() > 0){
                    $msur = $hicbiseysiz->fetch(PDO::FETCH_ASSOC);

                }else if($brssdc->rowCount() > 0){
                        $msur = $brssdc->fetch(PDO::FETCH_ASSOC);
    
                }else if($brsstl->rowCount() > 0){
                    $msur = $brsstl->fetch(PDO::FETCH_ASSOC);

                }else if($brsstlkat->rowCount() > 0){
                    $msur = $brsstlkat->fetch(PDO::FETCH_ASSOC);

                }else if($brsstlkatskl->rowCount() > 0){
                    $msur = $brsstlkatskl->fetch(PDO::FETCH_ASSOC);

                }
               
                $cihaz  = $mur[cihaz];
                $raund  = $msur[raund];
                $sure   = $msur[sure];
                $mola   = $msur[mola];
                $ara    = $msur[ara];
                
              
                		//	echo" vami > ";
			    // BU RİNG İN HİÇ BİR KAYDI VARMI YANİ VT SIFIR GİBİ BİŞEY
			$musaktifsql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND ring = ? ");
			$musaktifsql->execute(array($fid, $ring_id));
			$mus_aktif_say = $musaktifsql->rowCount();
			if($mus_aktif_say == 0)
			{

                $aktR = 1;

                    // echo" yok  >>  ";
					
					$ekuy = DB::insert('INSERT INTO fa_mus_aktif (fid, mid, ring, cihaz, raund, sure, mola, ara, aktR, kro) VALUES (?,?,?,?,?,?,?,?,?,?)'
					,array($fid, $mus_id, $ring_id, $cihaz, $raund, $sure, $mola, $ara, $aktR, $sure));
					if($ekuy = DB::getLastError())
					{
						echo ' HATA1: ' . $ekuy[2];
					}
					else
					{
						echo"  ok ";
					}		
			}
			else
			{
                        		//echo"vt _aktif guncelle >>  ";
			
					$kirmizi=DB::prepare("SELECT SUM(red) AS takma_ad FROM fa_mus_skor 
					WHERE fid = ".$fid."  AND mus_id = ".$mus_id." AND ring_id = ".$ring_id." AND poz = 1 ");
					$kirmizi->execute();
					$redpuanlar= $kirmizi->fetch(PDO::FETCH_ASSOC);
					$red_topla = $redpuanlar[takma_ad];
			
					$mavi=DB::prepare("SELECT SUM(blue) AS takma_ad FROM fa_mus_skor 
					WHERE fid = ".$fid."  AND mus_id = ".$mus_id." AND ring_id = ".$ring_id." AND poz = 1 ");
					$mavi->execute();
					$bluepuanlar= $mavi->fetch(PDO::FETCH_ASSOC);
					$blue_topla = $bluepuanlar[takma_ad];
                        //				echo" skor da maç bitmiş mi? <br>";				
				        // SKOR DA MAÇ BİTİRİLMİŞ Mİ ?
				$skordrmsqll = DB::prepare("SELECT * FROM fa_mus_skor WHERE fid = ?  AND mus_id = ? AND ring_id = ? AND drm > 0 ");
				$skordrmsqll->execute(array($fid, $mus_id, $ring_id));
				$skr = $skordrmsqll->fetch(PDO::FETCH_ASSOC);
				$mus_skor_drm_say = $skordrmsqll->rowCount();		
		
					
				if($mus_skor_drm_say > 0)
				{
                         		//	echo" sadece puan yayinla <br>";
					    // echo" BU MÜSABAKA  BİTİRİLMİŞ SADECE PUANLARI YAYINLAYACAK GÜNCELLEMEYİ YAPALIM";
					
					$kirmizi=DB::prepare("SELECT SUM(red) AS takma_ad FROM fa_mus_skor 
					WHERE fid = ".$fid."  AND mus_id = ".$mus_id." AND ring_id = ".$ring_id." AND poz = 1 ");
					$kirmizi->execute();
					$redpuanlar= $kirmizi->fetch(PDO::FETCH_ASSOC);
					$red_topla = $redpuanlar[takma_ad];
			
					$mavi=DB::prepare("SELECT SUM(blue) AS takma_ad FROM fa_mus_skor 
					WHERE fid = ".$fid."  AND mus_id = ".$mus_id." AND ring_id = ".$ring_id." AND poz = 1 ");
					$mavi->execute();
					$bluepuanlar= $mavi->fetch(PDO::FETCH_ASSOC);
					$blue_topla = $bluepuanlar[takma_ad];
					
					$sifir = 0;
					$poz_izleme = -2;
					
					$usorgu = DB::prepare("UPDATE fa_mus_aktif 
					SET mid = ? , ring = ? , raund = ? , sure = ? , mola = ? , ara = ? , aktR = ? , redP = ? , blueP = ? , poz = ?, kro = ? WHERE fid = ? AND ring = ? ");  
					$usorgu->bindParam(1, $mus_id, PDO::PARAM_INT);
					$usorgu->bindParam(2, $ring_id, PDO::PARAM_INT);
					$usorgu->bindParam(3, $sifir, PDO::PARAM_INT);
					$usorgu->bindParam(4, $sifir, PDO::PARAM_INT);
					$usorgu->bindParam(5, $sifir, PDO::PARAM_INT);
					$usorgu->bindParam(6, $sifir, PDO::PARAM_INT);
					$usorgu->bindParam(7, $sifir, PDO::PARAM_INT);
					$usorgu->bindParam(8, $red_topla, PDO::PARAM_INT);
					$usorgu->bindParam(9, $blue_topla, PDO::PARAM_INT);
					$usorgu->bindParam(10, $poz_izleme, PDO::PARAM_INT);
					$usorgu->bindParam(11, $sifir, PDO::PARAM_INT);
					$usorgu->bindParam(12, $fid, PDO::PARAM_INT);
					$usorgu->bindParam(13, $ring_id, PDO::PARAM_INT);
					$usorgu->execute();						
					
						?><script>
						$(".yonet_durum").html("");
						$(".mola").show();
						$(".basla").show();
						$(".yonet_akt").hide();
						$(".arti_eksi_bit").show();
                        </script><?php   
						
				}
				else
				{
                         		//		echo"oynayacak yap <br>";
					    // OYNAYACAK MÜSABAKA YAPALIM VEYA YARIM KALMIŞMI KONTROL ET FAKAT RAUN VE SÜRELERİ EN BAŞTAN ALIR GEREKİRSE DÜZENLE !!!
					$yarimskorsqli = DB::prepare("SELECT * FROM fa_mus_skor WHERE fid = ?  AND mus_id = ? AND ring_id = ? AND drm = '0' ");
					$yarimskorsqli->execute(array($fid, $mus_id, $ring_id));
					$yrm = $yarimskorsqli->fetch(PDO::FETCH_ASSOC);
					$yarim_skor_say = $yarimskorsqli->rowCount();		
                    //				echo"yarim_skor_say:$yarim_skor_say<br>";	
					if($yarim_skor_say > 0)
					{
						
						$aktR = 1;
						$poz_hazir = 0;
						$puan_sifirla = 0;
						if($red_topla > 0){ $red_puani = $red_topla;}else{$red_puani = $puan_sifirla;}
						if($blue_topla > 0){ $blue_puani = $blue_topla;}else{$blue_puani = $puan_sifirla;}
						
						$usorgu = DB::prepare("UPDATE fa_mus_aktif 
						SET mid = ? , ring = ? , raund = ? , sure = ? , mola = ? , ara = ? , aktR = ? , redP = ? , blueP = ? , poz = ?, kro = ?
						WHERE fid = ? AND ring = ? ");  
						$usorgu->bindParam(1, $mus_id, PDO::PARAM_INT);
						$usorgu->bindParam(2, $ring_id, PDO::PARAM_INT);
						$usorgu->bindParam(3, $raund, PDO::PARAM_INT);
						$usorgu->bindParam(4, $sure, PDO::PARAM_INT);
						$usorgu->bindParam(5, $mola, PDO::PARAM_INT);
						$usorgu->bindParam(6, $ara, PDO::PARAM_INT);
						$usorgu->bindParam(7, $aktR, PDO::PARAM_INT);
						$usorgu->bindParam(8, $red_puani, PDO::PARAM_INT);
						$usorgu->bindParam(9, $blue_puani, PDO::PARAM_INT);
						$usorgu->bindParam(10, $poz_hazir, PDO::PARAM_INT);
						$usorgu->bindParam(11, $sure, PDO::PARAM_INT);
						$usorgu->bindParam(12, $fid, PDO::PARAM_INT);
						$usorgu->bindParam(13, $ring_id, PDO::PARAM_INT);
						$usorgu->execute();							
						
					}
					else
					{
                            		//			echo"yarim skor yok <br>";	
						$poz_hazir = 0;
						$sifir = 0;	
						$bir = 1;	
						$usorgu = DB::prepare("UPDATE fa_mus_aktif 
						SET mid = ? , ring = ? , raund = ? , sure = ? , mola = ? , ara = ? , aktR = ? , redP = ? , blueP = ? , poz = ?, kro = ?
						WHERE fid = ? AND ring = ? ");  
						$usorgu->bindParam(1, $mus_id, PDO::PARAM_INT);
						$usorgu->bindParam(2, $ring_id, PDO::PARAM_INT);
						$usorgu->bindParam(3, $raund, PDO::PARAM_INT);
						$usorgu->bindParam(4, $sure, PDO::PARAM_INT);
						$usorgu->bindParam(5, $mola, PDO::PARAM_INT);
						$usorgu->bindParam(6, $ara, PDO::PARAM_INT);
						$usorgu->bindParam(7, $bir, PDO::PARAM_INT);
						$usorgu->bindParam(8, $sifir, PDO::PARAM_INT);
						$usorgu->bindParam(9, $sifir, PDO::PARAM_INT);
						$usorgu->bindParam(10, $poz_hazir, PDO::PARAM_INT);
						$usorgu->bindParam(11, $sure, PDO::PARAM_INT);
						$usorgu->bindParam(12, $fid, PDO::PARAM_INT);
						$usorgu->bindParam(13, $ring_id, PDO::PARAM_INT);
						$usorgu->execute();						
					
						?><script>
						$(".yonet_durum").html("");
						$(".mola").show();
						$(".basla").show();
						$(".yonet_akt").hide();
						$(".arti_eksi_bit").show();
                        </script><?php
					
					}
					
					
				?>
				<script>
					$(".yonet_durum").html("");
					$(".mola").show();
					$(".basla").show();
					$(".yonet_akt").hide();
					$(".arti_eksi_bit").show();
                </script>
				<?php  					
						
				}

								
			}		
	}
	    // poz 1 basla 2 mola
	if($ne == "poz")
	{
		
		$musaktifsql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND ring = ? ");
		$musaktifsql->execute(array($fid, $ring_id));
		$akt_mus = $musaktifsql->fetch(PDO::FETCH_ASSOC);
		$mus_aktif_say = $musaktifsql->rowCount();
		
		// echo" $fid, $ring_id ";
		
		if($mus_aktif_say > 0)
		{
			$usorgu = DB::prepare("UPDATE fa_mus_aktif SET poz = ? WHERE fid = ? AND ring = ? ");  
			$usorgu->bindParam(1, $poz, PDO::PARAM_INT);
			$usorgu->bindParam(2, $fid, PDO::PARAM_INT);
			$usorgu->bindParam(3, $ring_id, PDO::PARAM_INT);
			$usorgu->execute();		
			
		}else{ 	echo"OYNAYAN BAŞKA BİR MÜSABAKA VAR !!! "; }
		
			
				
		
	}
	
	if($_POST[artir])
	{

		$arti    = $_POST[artir];
		$kose    = $_POST[ks];

		$famussql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ?  ");
		$famussql->execute(array($arti));
		$mus = $famussql->fetch(PDO::FETCH_ASSOC);			
		
		$musaktifsql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND ring = ? ");
		$musaktifsql->execute(array($fid, $mus[ring]));
		$akt_mus = $musaktifsql->fetch(PDO::FETCH_ASSOC);		


		$dt = new DateTime();
		$zaman = $dt->format('Y-m-d H:i:s.u');

		$mil = $dt->format('u');
		$mil = substr($mil,0,3);

		if($kose == "red"){
			$kose_krt = "rp";
		}else if($kose == "blue"){
			$kose_krt = "bp";
		}
		

	    //	echo"fid:$mus[fid]  mid:$arti zaman:$zaman mil:$mil fark: $kose_krt:1 ack:juri ";
		$yeni = DB::insert('INSERT INTO fa_mus_skor (fid,mid,akt,poz,'.$kose_krt.',zaman,mil,ack) VALUES (?,?,?,?,?,?,?,?)'
		,array($mus[fid],$arti,$akt_mus[fa_mus_aktif_id],"1","1", $zaman, $mil, "juri"));


	}

	if($_POST[eksilt])
	{
		$eksi    = $_POST[eksilt];
		$kose    = $_POST[ks];

		$famussql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ?  ");
		$famussql->execute(array($eksi));
		$mus = $famussql->fetch(PDO::FETCH_ASSOC);			
		
		$musaktifsql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND ring = ? ");
		$musaktifsql->execute(array($fid, $mus[ring]));
		$akt_mus = $musaktifsql->fetch(PDO::FETCH_ASSOC);

		$dt = new DateTime();
		$zaman = $dt->format('Y-m-d H:i:s.u');

		$mil = $dt->format('u');
		$mil = substr($mil,0,3);


		if($kose == "red"){
			$kose_krt = "rp";
		}else if($kose == "blue"){
			$kose_krt = "bp";
		}


		$yeni = DB::insert('INSERT INTO fa_mus_skor (fid,mid,akt,poz,'.$kose_krt.',zaman,mil,ack) VALUES (?,?,?,?,?,?,?,?)'
		,array($mus[fid],$eksi,$akt_mus[fa_mus_aktif_id],"1","-1", $zaman, $mil, "juri"));		

            if($ekuy = DB::getLastError())
			{
				echo ' HATA1: ' . $ekuy[2];
			}
			else
			{
				echo"  ok ";
			}	
	}	

?>