<?php
if($dinleden == 1){
	$id = $mus_id;
	// $fid =$fid;
	$ks = $kose;	
}else{
	$id = trim(filter_input(INPUT_POST, 'mus_atlat', FILTER_SANITIZE_NUMBER_INT));
	$fid = trim(filter_input(INPUT_POST, 'fid', FILTER_SANITIZE_NUMBER_INT));
	$ks = trim(filter_input(INPUT_POST, 'ks', FILTER_SANITIZE_STRING));	
}
// echo"id:$id fid:$fid ks:$ks ";
	$muskontrolsql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? ");
	$muskontrolsql->execute(array($id));
	$mu = $muskontrolsql->fetch(PDO::FETCH_ASSOC);
	$mu_say = $muskontrolsql->rowCount();
	
	$fid = 	$mu[fid];
	$brs = 	$mu[brs];
	$stl = 	$mu[stl];
	$kat = 	$mu[kat];
	$skl = 	$mu[skl];
	$tab = 	$mu[tab];
	
	$rkr  = $mu[rkr];
	$red  = $mu[red];
	$rbl  = $mu[rbl];
	
	$bkr  = $mu[bkr];
	$blue = $mu[blue];
	$bbl  = $mu[bbl];
	
	$tur  = $mu[tur];
	$ring = $mu[ring];
	$gun  = $mu[gun];
	$md   = $mu[d];
	
	$d   = 1;
	$ex = -1;
    $yap  = 0;
   
 //  echo"$id - ";	

	$ileri_gun = $gun + 1;
	$ileri_tur = $tur -1;

if($id > 0){


    if($rbl == 2){  $irbl = 1;  $rk_no = 1; $bu_rk = 3; $yap = 1; $ack = 1; }

    if($bbl == 3){  $irbl = 1;  $rk_no = 1; $bu_rk = 2; $yap = 1; $ack = 1; }

    if($rbl == 4){  $irbl = 2;  $rk_no = 3; $bu_rk = 5; $yap = 1; $ack = 2; }
    if($bbl == 5){  $irbl = 2;  $rk_no = 3; $bu_rk = 4; $yap = 1; $ack = 2; }

    if($rbl == 6){  $ibbl = 3;  $rk_no = 2; $bu_rk = 7; $yap = 1; $ack = 3; }
    if($bbl == 7){  $ibbl = 3;  $rk_no = 2; $bu_rk = 6; $yap = 1; $ack = 3; }

    if($rbl == 8){  $irbl = 4;  $rk_no = 5; $bu_rk = 9; $yap = 1; $ack = 4; }
    if($bbl == 9){  $irbl = 4;  $rk_no = 5; $bu_rk = 8; $yap = 1; $ack = 4; }

    if($rbl == 10){$ibbl = 5;  $rk_no = 4; $bu_rk = 11; $yap = 1; $ack = 5; }
    if($bbl == 11){$ibbl = 5;  $rk_no = 4; $bu_rk = 10; $yap = 1; $ack = 5; }

    if($rbl == 12){$irbl = 6;  $rk_no = 7; $bu_rk = 13; $yap = 1; $ack = 6; }
    if($bbl == 13){$irbl = 6;  $rk_no = 7; $bu_rk = 12; $yap = 1; $ack = 6; }

    if($rbl == 14){$ibbl = 7;  $rk_no = 6; $bu_rk = 15; $yap = 1; $ack = 7; }
    if($bbl == 15){$ibbl = 7;  $rk_no = 6; $bu_rk = 14; $yap = 1; $ack = 7; }

    if($rbl == 16){$irbl = 8;  $rk_no = 9; $bu_rk = 17; $yap = 1; $ack = 8; }
    if($bbl == 17){$irbl = 8;  $rk_no = 9; $bu_rk = 16; $yap = 1; $ack = 8; }

    if($rbl == 18){$ibbl = 9;  $rk_no = 8; $bu_rk = 19; $yap = 1; $ack = 9; }
    if($bbl == 19){$ibbl = 9;  $rk_no = 8; $bu_rk = 18; $yap = 1; $ack = 9; }

    if($rbl == 20){$irbl = 10; $rk_no = 11; $bu_rk = 21; $yap = 1; $ack = 10; }
    if($bbl == 21){$irbl = 10; $rk_no = 11; $bu_rk = 20; $yap = 1; $ack = 10; }

    if($rbl == 22){$ibbl = 11; $rk_no = 10; $bu_rk = 23; $yap = 1; $ack = 11; }
    if($bbl == 23){$ibbl = 11; $rk_no = 10; $bu_rk = 22; $yap = 1; $ack = 11; }

    if($rbl == 24){$irbl = 12; $rk_no = 13; $bu_rk = 25; $yap = 1; $ack = 12; }
    if($bbl == 25){$irbl = 12; $rk_no = 13; $bu_rk = 24; $yap = 1; $ack = 12; }

    if($rbl == 26){$ibbl = 13; $rk_no = 12; $bu_rk = 27; $yap = 1; $ack = 13; }
    if($bbl == 27){$ibbl = 13; $rk_no = 12; $bu_rk = 26; $yap = 1; $ack = 13; }

    if($rbl == 28){$irbl = 14; $rk_no = 15; $bu_rk = 29; $yap = 1; $ack = 14; }
    if($bbl == 29){$irbl = 14; $rk_no = 15; $bu_rk = 28; $yap = 1; $ack = 14; }

    if($rbl == 30){$ibbl = 15; $rk_no = 14; $bu_rk = 31; $yap = 1; $ack = 15; }
    if($bbl == 31){$ibbl = 15; $rk_no = 14; $bu_rk = 30; $yap = 1; $ack = 15; }

    if($rbl == 32){$irbl = 16; $rk_no = 17; $bu_rk = 33; $yap = 1; $ack = 16; }
    if($bbl == 33){$irbl = 16; $rk_no = 17; $bu_rk = 32; $yap = 1; $ack = 16; }

    if($rbl == 34){$ibbl = 17; $rk_no = 16; $bu_rk = 35; $yap = 1; $ack = 17; }
    if($bbl == 35){$ibbl = 17; $rk_no = 16; $bu_rk = 34; $yap = 1; $ack = 17; }

    if($rbl == 36){$irbl = 18; $rk_no = 19; $bu_rk = 37; $yap = 1; $ack = 18; }
    if($bbl == 37){$irbl = 18; $rk_no = 19; $bu_rk = 36; $yap = 1; $ack = 18; }

    if($rbl == 38){$ibbl = 19; $rk_no = 18; $bu_rk = 39; $yap = 1; $ack = 19; }
    if($bbl == 39){$ibbl = 19; $rk_no = 18; $bu_rk = 38; $yap = 1; $ack = 19; }

    if($rbl == 40){$irbl = 20; $rk_no = 21; $bu_rk = 41; $yap = 1; $ack = 20; }
    if($bbl == 41){$irbl = 20; $rk_no = 21; $bu_rk = 40; $yap = 1; $ack = 20; }

    if($rbl == 42){$ibbl = 21; $rk_no = 20; $bu_rk = 43; $yap = 1; $ack = 21; }
    if($bbl == 43){$ibbl = 21; $rk_no = 20; $bu_rk = 42; $yap = 1; $ack = 21; }

    if($rbl == 44){$irbl = 22; $rk_no = 23; $bu_rk = 45; $yap = 1; $ack = 22; }
    if($bbl == 45){$irbl = 22; $rk_no = 23; $bu_rk = 44; $yap = 1; $ack = 22; }

    if($rbl == 46){$ibbl = 23; $rk_no = 22; $bu_rk = 47; $yap = 1; $ack = 23; }
    if($bbl == 47){$ibbl = 23; $rk_no = 22; $bu_rk = 46; $yap = 1; $ack = 23; }

    if($rbl == 48){$irbl = 24; $rk_no = 25; $bu_rk = 49; $yap = 1; $ack = 24; }
    if($bbl == 49){$irbl = 24; $rk_no = 25; $bu_rk = 48; $yap = 1; $ack = 24; }

    if($rbl == 50){$ibbl = 25; $rk_no = 24; $bu_rk = 51; $yap = 1; $ack = 25; }
    if($bbl == 51){$ibbl = 25; $rk_no = 24; $bu_rk = 50; $yap = 1; $ack = 25; }

    if($rbl == 52){$irbl = 26; $rk_no = 27; $bu_rk = 53; $yap = 1; $ack = 26; }
    if($bbl == 53){$irbl = 26; $rk_no = 27; $bu_rk = 52; $yap = 1; $ack = 26; }

    if($rbl == 54){$ibbl = 27; $rk_no = 26; $bu_rk = 55; $yap = 1; $ack = 27; }
    if($bbl == 55){$ibbl = 27; $rk_no = 26; $bu_rk = 54; $yap = 1; $ack = 27; }

    if($rbl == 56){$irbl = 28; $rk_no = 29; $bu_rk = 57; $yap = 1; $ack = 28; }
    if($bbl == 57){$irbl = 28; $rk_no = 29; $bu_rk = 56; $yap = 1; $ack = 28; }

    if($rbl == 58){$ibbl = 29; $rk_no = 28; $bu_rk = 59; $yap = 1; $ack = 29; }
    if($bbl == 59){$ibbl = 29; $rk_no = 28; $bu_rk = 58; $yap = 1; $ack = 29; }

    if($rbl == 60){$irbl = 30; $rk_no = 31; $bu_rk = 61; $yap = 1; $ack = 30; }
    if($bbl == 61){$irbl = 30; $rk_no = 31; $bu_rk = 60; $yap = 1; $ack = 30; }

    if($rbl == 62){$ibbl = 31; $rk_no = 30; $bu_rk = 63; $yap = 1; $ack = 31; }
    if($bbl == 63){$ibbl = 31; $rk_no = 30; $bu_rk = 62; $yap = 1; $ack = 31; }

} // id > 0

// echo" ack:$ack ";

 if($ks == "red"){
	$kazanan = $red;
    $win = 1;
	/* 
	$Rgeri = $id;
	$Bgeri = 0;
	
	$geri_krt 	= "Rgeri";   
	$kose_krt 	= "Rkose";   
	$kose_dg 	= "red";   
	*/ 
 }else if($ks == "blue"){
	$kazanan = $blue;
    $win = 2;
	/* 
	$Rgeri = 0;
	$Bgeri = $id;
	
	$geri_krt 	= "Bgeri"; 
	$kose_krt	= "Bkose";   
	$kose_dg 	= "blue"; 
	*/ 
 }

if($irbl > 0 && $ks != "gun"){
	$rk_renk = "blue";
	$rk_blm = "bbl";
	$bu_renk = "red";
	$bu_blm = "rbl";
	$ileri_bl= $irbl;
	// echo"  irbl > 0  -- <br>"
	
			// BU GERİDEN GELDİĞİ KÖŞE
			 if($ks == "red"){
				$Rgeri = $id;
				$Bgeri = 0;
				
				$geri_krt 	= "Rgeri";   
				$kose_krt 	= "Rkose";   
				$kose_dg 	= 1;   
				 
			 }else if($ks == "blue"){
				$Rgeri = $id;
				$Bgeri = 0;
				
				$geri_krt 	= "Rgeri"; 
				$kose_krt	= "Rkose";   
				$kose_dg 	= 2; 
				 
			 }
}

if($ibbl > 0 && $ks != "gun"){
	$rk_renk = "red";
	$rk_blm = "rbl";
	$bu_renk = "blue";
	$bu_blm = "bbl";
	$ileri_bl= $ibbl;
	// echo"  ibbl > 0  -- <br>";
			// BU GERİDEN GELDİĞİ KÖŞE
			 if($ks == "red"){
				$Rgeri = 0;
				$Bgeri = $id;
				
				$geri_krt 	= "Bgeri";   
				$kose_krt 	= "Bkose";   
				$kose_dg 	= 1;   
				 
			 }else if($ks == "blue"){
				$Rgeri = 0;
				$Bgeri = $id;
				
				$geri_krt 	= "Bgeri"; 
				$kose_krt	= "Bkose";   
				$kose_dg 	= 2; 
				 
			 }
	
}
		
	
if(($irbl > 0 || $ibbl > 0)  && ($ks != "gun" && $ks != "geri"))
{
	
	$eksibir = -1;
	$ivarmisql = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND brs = ? AND stl = ? AND kat = ? AND skl = ?  AND ".$rk_renk." > 0 AND ".$rk_blm." = ".$rk_no." AND ".$bu_renk." = 0 AND ".$bu_blm." = 0 AND tur = ".$ileri_tur ."  AND d > 0  ");  
	$ivarmisql->execute(array($fid, $brs,  $stl, $kat, $skl));
	$ivm = $ivarmisql->fetch(PDO::FETCH_ASSOC);
	$i_say = $ivarmisql->rowCount();	

	if($i_say == 0)
	{
		$ekuy = DB::insert('INSERT INTO fa_mus (fid,brs,stl,kat,skl,tab,'.$bu_renk.','.$bu_blm.',tur,ring,gun,d,Rgeri,Bgeri,'.$kose_krt.') VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
		array($fid,$brs,$stl,$kat,$skl,$tab,$kazanan,$ileri_bl,$ileri_tur,$ring,$ileri_gun,$d,$Rgeri,$Bgeri,$kose_dg));
			if($ekuy = DB::getLastError())
			{
				echo ' HATA1: ' . $ekuy[2]; 
			}
			else
			{
				$guncl = DB::prepare("UPDATE fa_mus SET d = ?, win = ? WHERE fa_mus_id = ?  ");  
				$guncl->bindParam(1, $ex, PDO::PARAM_INT);
				$guncl->bindParam(2, $win, PDO::PARAM_INT);
				$guncl->bindParam(3, $id, PDO::PARAM_INT);
				$guncl->execute();
			
				$gorguncl = DB::prepare("UPDATE fa_mus_gorev SET d = ? WHERE fid = ? AND fa_mus_id = ?  ");  
				$gorguncl->bindParam(1, $ex, PDO::PARAM_INT);
				$gorguncl->bindParam(2, $fid, PDO::PARAM_INT);
				$gorguncl->bindParam(3, $id, PDO::PARAM_INT);
				$gorguncl->execute();

				$guncolmu = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? AND d = ? AND win = ?  ");
				$ivarmisql->execute(array($id, $ex, $win));
				$dz_say = $ivarmisql->rowCount();	

                
				if($dz_say == 0){
					?>
					 <script>
					 	$(".satir<?=$id?>").fadeOut(500);
                     </script>
					<?php
                    /* 	 */  
					if($dinleden == 1){?><script>window.parent.reload();</script><?php }
                     
					$sonmusqli = DB::prepare("SELECT * FROM fa_mus 
					WHERE fid = ? AND brs = ? AND stl = ? AND kat = ? AND skl = ? AND tab = ? AND tur = ? AND gun = ? AND d > ? AND fa_mus_id != ".$ekuy." ");
					$sonmusqli->execute(array($mu[fid], $mu[brs], $mu[stl], $mu[kat], $mu[skl], $mu[tab], $mu[tur], $mu[gun], $ex));
					$musn = $sonmusqli->fetch(PDO::FETCH_ASSOC);
					$sonmu_say = $sonmusqli->rowCount();
					if($sonmu_say == 0){?><script>window.location.reload();</script><?php }					
					
				}else{echo"HATA2";}
				
			}
			
		
	}
	else if($i_say == 1)
	{
				$ileriye = DB::prepare("UPDATE fa_mus SET ".$bu_renk." = ?, ".$bu_blm." = ? , ".$geri_krt." = ?, ".$kose_krt." = ?  WHERE fa_mus_id = ? ");  
				$ileriye->bindParam(1, $kazanan, PDO::PARAM_INT);
				$ileriye->bindParam(2, $ileri_bl, PDO::PARAM_INT);
				$ileriye->bindParam(3, $id, PDO::PARAM_INT);
				$ileriye->bindParam(4, $kose_dg, PDO::PARAM_INT);
				$ileriye->bindParam(5, $ivm[fa_mus_id], PDO::PARAM_INT);
				$ileriye->execute();	
				
				$gorguncl = DB::prepare("UPDATE fa_mus_gorev SET d = ? WHERE fid = ? AND fa_mus_id = ?  ");  
				$gorguncl->bindParam(1, $ex, PDO::PARAM_INT);
				$gorguncl->bindParam(2, $fid, PDO::PARAM_INT);
				$gorguncl->bindParam(3, $id, PDO::PARAM_INT);
				$gorguncl->execute();

				$eksyap = DB::prepare("UPDATE fa_mus SET d = ?, win = ? WHERE fa_mus_id = ?  ");  
				$eksyap->bindParam(1, $ex, PDO::PARAM_INT);
				$eksyap->bindParam(2, $win, PDO::PARAM_INT);
				$eksyap->bindParam(3, $id, PDO::PARAM_INT);
				$eksyap->execute();	
				?><script>$(".satir<?=$id?>").fadeOut(500);</script><?php	
                /*  */	
                if($dinleden == 1){?><script>window.parent.reload();</script><?php }
              
					$sonmusqli = DB::prepare("SELECT * FROM fa_mus 
					WHERE fid = ? AND brs = ? AND stl = ? AND kat = ? AND skl = ? AND tab = ? AND tur = ? AND gun = ? AND d > ? AND fa_mus_id != ".$id." ");
					$sonmusqli->execute(array($mu[fid], $mu[brs], $mu[stl], $mu[kat], $mu[skl], $mu[tab], $mu[tur], $mu[gun], $ex));
					$musn = $sonmusqli->fetch(PDO::FETCH_ASSOC);
					$sonmu_say = $sonmusqli->rowCount();
					if($sonmu_say == 0){?><script>window.location.reload();</script><?php }
				
							
	}else{echo "  BİRDEN FAZLA VAR !! $i_say  <BR> ";}
	
}
else if($ks == "gun")
{
    //	echo" GÜN ATLAT ";
	if($red > 0 && $blue > 0)
	{
		
			//echo"<br>fid:$mu[fid] - brs:$mu[brs] - stl:$mu[stl] - kat:$mu[kat] - skl:$mu[skl] - tab:$mu[tab] - rkr:$mu[rkr] - red:$mu[red] - rbl:$mu[rbl] - bkr:$mu[bkr] - blue:$mu[blue] - bbl:$mu[bbl] - tur:$mu[tur] - ring:$mu[ring] - (<b>gun:$mu[gun] +1 = $ileri_gun </b> ) - d:$mu[d]  ";
			//echo"<br>fid:$fid - brs:$brs - stl:$stl - kat:$kat - skl:$skl - tab:$tab - rkr:$rkr - red:$red - rbl:$rbl - bkr:$bkr - blue:$blue - bbl:$bbl -  tur:$tur -  ring:$ring - (<b>gun:$gun +1 = $ileri_gun </b>) - d:$md; ";
		
			$ekuy = DB::insert('INSERT INTO fa_mus (fid, brs, stl, kat, skl, tab, rkr, red, rbl, bkr, blue, bbl, tur, ring, gun, d) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)', 
			array($fid, $brs, $stl, $kat, $skl, $tab, $rkr, $red, $rbl, $bkr, $blue, $bbl, $tur, $ring, $ileri_gun, $d));
				if($error = DB::getLastError()){
					echo ' HATA11: ' . $error[2];
				}else{
					$guncl = DB::prepare("UPDATE fa_mus SET d = ? WHERE fa_mus_id = ?  ");  
					$guncl->bindParam(1, $ex, PDO::PARAM_INT);
					$guncl->bindParam(2, $id, PDO::PARAM_INT);
					$guncl->execute();
				
                    $gorguncl = DB::prepare("UPDATE fa_mus_gorev SET d = ? WHERE fid = ? AND fa_mus_id = ?  ");  
                    $gorguncl->bindParam(1, $ex, PDO::PARAM_INT);
                    $gorguncl->bindParam(2, $fid, PDO::PARAM_INT);
                    $gorguncl->bindParam(3, $id, PDO::PARAM_INT);
                    $gorguncl->execute();

					$guncolmu = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? AND d = ?  ");
					$guncolmu->execute(array($id, $ex));
					//$ivm = $ivarmisql->fetch(PDO::FETCH_ASSOC);
					$dz_say = $guncolmu->rowCount();	
					if($dz_say > 0){
						?> KAPAT 44
						<script>
							$(".satir<?=$id?>").fadeOut(500);
							$(".atlat_<?=$id?>").html("");
							$(".mus_atlat").show();
							/*window.location.reload();*/
                        </script>
						<?php		
					}else{echo"HATA22";}
				}
	
	}
	else if($red > 0 && $blue == 0)
	{


			if($red > 0 && $rbl > 0 && $blue == 0 && $bbl == 0){
						//	echo" bu red blue bu_rk:$bu_rk <br>";
			
				$ivarmisql = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND brs = ? AND stl = ? AND kat = ? AND skl = ? AND bbl = ".$bu_rk."   ");  //  AND d > 0
					// !!!!!! BELKİ İLERİ TUR GÜN KONTROL ETMEYE GEREK YOKTUR BUNU DÜŞÜN VE DENE BAKALIM -------!!!!!! ÇOK ÖNEMLİ!!!!!!
				$ivarmisql->execute(array($fid, $brs, $stl, $kat, $skl));
				$ivm = $ivarmisql->fetch(PDO::FETCH_ASSOC);
				$i_say = $ivarmisql->rowCount();	
					//echo"  i_say == 1 ??? ";	
					
					if($i_say == 1)
					{
						//echo" ivm:$ivm[id]";
						$ileriye = DB::prepare("UPDATE fa_mus SET red = ?, rbl = ? WHERE fa_mus_id = ? ");  
						$ileriye->bindParam(1, $red, PDO::PARAM_INT);
						$ileriye->bindParam(2, $rbl, PDO::PARAM_INT);
						$ileriye->bindParam(3, $ivm[fa_mus_id], PDO::PARAM_INT);
						$ileriye->execute();	
								
						$guncl = DB::prepare("UPDATE fa_mus SET d = ? WHERE fa_mus_id = ?  ");  
						$guncl->bindParam(1, $ex, PDO::PARAM_INT);
						$guncl->bindParam(2, $id, PDO::PARAM_INT);
						$guncl->execute();
					
                        $gorguncl = DB::prepare("UPDATE fa_mus_gorev SET d = ? WHERE fid = ? AND fa_mus_id = ?  ");  
                        $gorguncl->bindParam(1, $ex, PDO::PARAM_INT);
                        $gorguncl->bindParam(2, $fid, PDO::PARAM_INT);
                        $gorguncl->bindParam(3, $id, PDO::PARAM_INT);
                        $gorguncl->execute();

						$guncolmu = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? AND d = ?  ");
						$guncolmu->execute(array($id, $ex));
						//$ivm = $ivarmisql->fetch(PDO::FETCH_ASSOC);
						$dz_say = $guncolmu->rowCount();	
						if($dz_say > 0){
							?>  
							<script>
								$(".satir<?=$id?>").fadeOut(500);
								$(".atlat_<?=$id?>").html("");
								// window.location.reload();
							</script>
							<?php		
						}else{echo"HATA 33";}						
						
					}else{echo" HENÜZ DEĞİL ";}
			
	
				}
		
		}
}
else if($ks == "geri")
{	

    if($mu[gun] > 0){
        $geri_gun = $mu[gun] - 1;
        

        $musgerisqli = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND red = ?  AND blue = ?  AND gun = ?   AND d = -1   ");
        $musgerisqli->execute(array($mu[fid], $mu[red], $mu[blue], $geri_gun));
        $mg = $musgerisqli->fetch(PDO::FETCH_ASSOC);
        $mg_say = $musgerisqli->rowCount();

        if($mg_say > 0){

            echo"GERİ GÜNÜ VAR   $d, $mg[fa_mus_id] ";
            // GÜN 0 İSE d 0 YAP
            if($geri_gun == 0){$d = 0;}
         
            $gerigunc = DB::prepare("UPDATE fa_mus SET d = ? WHERE fa_mus_id = ?  ");  
            $gerigunc->bindParam(1, $d, PDO::PARAM_INT);
            $gerigunc->bindParam(2, $mg[fa_mus_id], PDO::PARAM_INT);
            $gerigunc->execute();

            $sklsil = DB::prepare("DELETE FROM fa_mus WHERE fa_mus_id = ?  ");
            $sklsil->bindParam(1, $id, PDO::PARAM_INT);
            $sklsil->execute();		           

            ?>  
            <script>
                $(".satir<?=$id?>").fadeOut(500);
                $(".atlat_<?=$id?>").html("");
                $(".mus_atlat").show();
            </script>
            <?php	
           

        }
        // echo"geri  fa_mus_id:$mu[fa_mus_id]  red:$mu[red]  blue:$mu[blue] gun:$mu[gun]   d:$mu[d]    ";

    }else if($mu[gun] == 0){
        echo" GÜN ZATER 0 ";
    }


}
	
	


		
	


		
?>