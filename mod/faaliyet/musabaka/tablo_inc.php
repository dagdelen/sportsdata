<?php
    ///////////////////////// KURA LİSTESİNİ YERLEŞTİRİR ///////////////////////////
	$muskurasqlli = DB::prepare("SELECT * FROM fa_uye WHERE fid = ?  AND siklet = ? AND  tar > 0 AND kura > 0 ");
	$muskurasqlli->execute(array($fid, $skl));
	$mus_kura_say = $muskurasqlli->rowCount();
	
	if($mus_kura_say > 0)
    {

			// kura listesini yerleştirir sadece
			$fuquery = "SELECT * FROM fa_uye WHERE fid = ? AND siklet = ? AND  tar > 0 ORDER BY fa_uye_id DESC ";
			$fuparams = array($fid,$skl);	
			$fusers = DB::prepare($fuquery);
			$fusers->execute($fuparams);
			$tablo = $fusers->rowCount();  
			
			foreach($fusers as $u)
			{
				$kura = $u->kura;
					
					$faaliyetuyetsqll = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
					$faaliyetuyetsqll->execute(array($u->uye));
					$fuy = $faaliyetuyetsqll->fetch(PDO::FETCH_ASSOC);	
					$muad 	= 	$fuy[ad];			
					$musoyad 	= 	$fuy[soyad];			

			if($fa[temsil] == "uye"){
				$uyye_yer_ad = _bireysel;
			}else{
				 $fauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
				 $fauyeyersql->execute(array($u->uye));
				 $uyyr = $fauyeyersql->fetch(PDO::FETCH_ASSOC);
										
				 $yer_id_sonek = "_id";	
				 $yer_id_krt = "$fa[temsil]$yer_id_sonek";
										
				 $fayersqli = DB::prepare("SELECT * FROM $fa[temsil] WHERE $yer_id_krt = ? ");
				 $fayersqli->execute(array($uyyr[$fa[temsil]]));
				 $fyer = $fayersqli->fetch(PDO::FETCH_ASSOC);	
									
				 $tms_ad_son = "_ad";
				 $tms_adne = "$fa[temsil]$tms_ad_son";
				 $uyye_yer_ad = "$fyer[$tms_adne]";					
			 }					
					
					
				//	$yer 	= 	$uyye_yer_ad;	
					$yaz = "<b>$muad $musoyad</b> <small>(<i>$uyye_yer_ad</i>)</small>";	// 	<small><i>$kura -</i></small>  
					
				include("mod/faaliyet/musabaka/tablo_uye.php"); 
			}
	
	}else{
		$skldinle = $skl;
	}
    ///////////////////////// \ KURA LİSTESİNİ YERLEŞTİRİR ///////////////////////////

	$fumusquery = "SELECT * FROM fa_mus WHERE fid = ? AND skl = ? AND tab = ?  ORDER BY fa_mus_id DESC ";
	$fuparams = array($fid, $skl, $tablo);	
	$fumussers = DB::prepare($fumusquery);
	$fumussers->execute($fuparams);
	$fa_mus_say = $fumussers->rowCount();  // ------- faaliyet_musabaka sayı
        //	echo" fa_mus_say:$fa_mus_say ";
	foreach($fumussers as $fm)
	{
		$tur = $fm->tur;
		$gun = $fm->gun;
		
		$faaliyetredbsqll = DB::prepare("SELECT uye FROM fa_uye WHERE fa_uye_id = ? ");
		$faaliyetredbsqll->execute(array($fm->red));
		$red_fuy = $faaliyetredbsqll->fetch(PDO::FETCH_ASSOC);	
		
		$faauyredetsqll = DB::prepare("SELECT uye_id,ad,soyad FROM uye WHERE uye_id = ? ");
		$faauyredetsqll->execute(array($red_fuy[uye]));
		$fuyr = $faauyredetsqll->fetch(PDO::FETCH_ASSOC);	
		
		$rad 	= 	$fuyr[ad];			
		$rsoyad = 	$fuyr[soyad];			
        //-------------------------				
			if($fa[temsil] == "uye"){
				$Ruyye_yer_ad = "";//_bireysel;
			}else{
				 $Rfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
				 $Rfauyeyersql->execute(array($red_fuy[uye]));
				 $Ruyyr = $Rfauyeyersql->fetch(PDO::FETCH_ASSOC);
										
				 $Ryer_id_sonek = "_id";	
				 $Ryer_id_krt = "$fa[temsil]$Ryer_id_sonek";
										
				 $Rfayersqli = DB::prepare("SELECT * FROM $fa[temsil] WHERE $Ryer_id_krt = ? ");
				 $Rfayersqli->execute(array($Ruyyr[$fa[temsil]]));
				 $Rfyer = $Rfayersqli->fetch(PDO::FETCH_ASSOC);	
									
				 $Rtms_ad_son = "_ad";
				 $Rtms_adne = "$fa[temsil]$Rtms_ad_son";
				 $Ruyye_yer_ad = "$Rfyer[$Rtms_adne]";					
			 }	
			
			$R_nci = "$rad $rsoyad  ($Ruyye_yer_ad) ";	//$fm->red $fa[temsil] :   <small><i>($Ruyye_yer_ad)</i></small>		
        //-------------------------			
		$faaliyetbluesqll = DB::prepare("SELECT uye FROM fa_uye WHERE fa_uye_id = ? ");
		$faaliyetbluesqll->execute(array($fm->blue));
		$blue_fuy = $faaliyetbluesqll->fetch(PDO::FETCH_ASSOC);	

		$faauyblueetsqll = DB::prepare("SELECT uye_id,ad,soyad FROM uye WHERE uye_id = ? ");
		$faauyblueetsqll->execute(array($blue_fuy[uye]));
		$fuyb = $faauyblueetsqll->fetch(PDO::FETCH_ASSOC);	
		
		$bad 	= 	$fuyb[ad];			
		$bsoyad = 	$fuyb[soyad];			
        //-------------------------			
			if($fa[temsil] == "uye"){
				$Buyye_yer_ad = "";//_bireysel;
			}else{
				 $Bfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
				 $Bfauyeyersql->execute(array($blue_fuy[uye]));
				 $Buyyr = $Bfauyeyersql->fetch(PDO::FETCH_ASSOC);
										
				 $Byer_id_sonek = "_id";	
				 $Byer_id_krt = "$fa[temsil]$Byer_id_sonek";
										
				 $Bfayersqli = DB::prepare("SELECT * FROM $fa[temsil] WHERE $Byer_id_krt = ? ");
				 $Bfayersqli->execute(array($Buyyr[$fa[temsil]]));
				 $Bfyer = $Bfayersqli->fetch(PDO::FETCH_ASSOC);	
									
				 $Btms_ad_son = "_ad";
				 $Btms_adne = "$fa[temsil]$Btms_ad_son";
				 $Buyye_yer_ad = "$Bfyer[$Btms_adne]";					
			 }	
			 
		$B_nci = "$bad $bsoyad ($Buyye_yer_ad) "; // $fm->blue <small><i>($Buyye_yer_ad)</i></small>		
        //-------------------------	
		$r_yaz = "$rad $rsoyad";
		$b_yaz = "$bad $bsoyad";


		
        if($_GET[fson])
        {
            

                //============
                    
                    
                //============


                if($fm->tur == 0){
                    $bir_id = $fm->red;
                    $birinci = "1. $R_nci";
                    
                }
                
                if($fm->tur == 1){
                    if($fm->red == $bir_id){ //  $fm->blue > 0 && 
                        $iki_id = $fm->blue;
                        $ikinci = "2. $B_nci";
                    /*}else{
                        $ikinci = " 1- $fm->id :fauye den al ";*/
                    }
                    
                    
                    if($fm->blue == $bir_id){ // $fm->red > 0 && 
                        $iki_id = $fm->red;
                        $ikinci = "2. $R_nci";
                    /*}else{
                        $ikinci = " 2- $fm->id :uye den al ";*/
                    }
                    
                    
                }
                
                if($fm->tur == 2){
                    if($fm->red == $bir_id){
                        $uc_id = $fm->blue;
                        $ucuncu = "3. $B_nci";
                    }
                    if($fm->blue == $bir_id){
                        $uc_id = $fm->red;
                        $ucuncu = "3. $R_nci";
                    }
                }
                
                if($fm->tur == 2){
                    if($fm->red == $iki_id){
                        $dort_id = $fm->blue;
                        $dorduncu = "3. $B_nci";
                    }
                    if($fm->blue == $iki_id){
                        $dort_id = $fm->red;
                        $dorduncu = "3. $R_nci";
                    }
                }
                
            
        }

                    

		if($tablo == 1)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
		}
		if($tablo == 2)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
		}
		if($tablo == 3)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
		}
		if($tablo == 4)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}	
			
			
		}
		if($tablo == 5)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}

			if($fm->bbl == 7){$c7 = "$b_yaz";}
		}
		if($tablo == 6)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}

			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
		}
		if($tablo == 7)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}

			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
		}
		if($tablo == 8)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
		}
		if($tablo == 9)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}

			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 10)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}

			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 11)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}

			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 12)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 13)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 14)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 15)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 16)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
		}
		if($tablo == 17)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 18)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 19)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 20)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 21)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 22)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 23)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 24)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 25)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 26)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 22){$c22 = "$r_yaz";}
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 27)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 21){$c21 = "$b_yaz";}
			if($fm->rbl == 22){$c22 = "$r_yaz";}
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 28)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 20){$c20 = "$r_yaz";}
			if($fm->bbl == 21){$c21 = "$b_yaz";}
			if($fm->rbl == 22){$c22 = "$r_yaz";}
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 29)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 19){$c19 = "$b_yaz";}
			if($fm->rbl == 20){$c20 = "$r_yaz";}
			if($fm->bbl == 21){$c21 = "$b_yaz";}
			if($fm->rbl == 22){$c22 = "$r_yaz";}
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 30)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 18){$c18 = "$r_yaz";}
			if($fm->bbl == 19){$c19 = "$b_yaz";}
			if($fm->rbl == 20){$c20 = "$r_yaz";}
			if($fm->bbl == 21){$c21 = "$b_yaz";}
			if($fm->rbl == 22){$c22 = "$r_yaz";}
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 31)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->bbl == 17){$c17 = "$b_yaz";}
			if($fm->rbl == 18){$c18 = "$r_yaz";}
			if($fm->bbl == 19){$c19 = "$b_yaz";}
			if($fm->rbl == 20){$c20 = "$r_yaz";}
			if($fm->bbl == 21){$c21 = "$b_yaz";}
			if($fm->rbl == 22){$c22 = "$r_yaz";}
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
		if($tablo == 32)
		{
			if($fm->rbl == 1){$c1 = "$r_yaz";}
			if($fm->rbl == 2){$c2 = "$r_yaz";}
			if($fm->bbl == 3){$c3 = "$b_yaz";}
			if($fm->rbl == 4){$c4 = "$r_yaz";}
			if($fm->bbl == 5){$c5 = "$b_yaz";}
			if($fm->rbl == 6){$c6 = "$r_yaz";}
			if($fm->bbl == 7){$c7 = "$b_yaz";}
			
			if($fm->rbl == 8){$c8 = "$r_yaz";}
			if($fm->bbl == 9){$c9 = "$b_yaz";}
			if($fm->rbl == 10){$c10 = "$r_yaz";}
			if($fm->bbl == 11){$c11 = "$b_yaz";}
			if($fm->rbl == 12){$c12 = "$r_yaz";}
			if($fm->bbl == 13){$c13 = "$b_yaz";}
			if($fm->rbl == 14){$c14 = "$r_yaz";}
			if($fm->bbl == 15){$c15 = "$b_yaz";}
			
			if($fm->rbl == 16){$c16 = "$r_yaz";}
			if($fm->bbl == 17){$c17 = "$b_yaz";}
			if($fm->rbl == 18){$c18 = "$r_yaz";}
			if($fm->bbl == 19){$c19 = "$b_yaz";}
			if($fm->rbl == 20){$c20 = "$r_yaz";}
			if($fm->bbl == 21){$c21 = "$b_yaz";}
			if($fm->rbl == 22){$c22 = "$r_yaz";}
			if($fm->bbl == 23){$c23 = "$b_yaz";}
			if($fm->rbl == 24){$c24 = "$r_yaz";}
			if($fm->bbl == 25){$c25 = "$b_yaz";}
			if($fm->rbl == 26){$c26 = "$r_yaz";}
			if($fm->bbl == 27){$c27 = "$b_yaz";}
			if($fm->rbl == 28){$c28 = "$r_yaz";}
			if($fm->bbl == 29){$c29 = "$b_yaz";}
			if($fm->rbl == 30){$c30 = "$r_yaz";}
			if($fm->bbl == 31){$c31 = "$b_yaz";}
		}
			
	
	
	}



////////////////////////////////////////////////////
if($mus_kura_say > 0){
    ?>
    <!--<button onclick="window.print()" style="float:right;">Yazdır</button>-->
    <style>
        body{font-family:Verdana, Geneva, sans-serif;}
        .table td{min-width:160px; max-width:300px; padding-left:5px; height:5px; }
        /*.hakem{ background-color:#F0F0F0;}*/
        .alt{border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px; border-color:#336699;}
        .sag{border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-width: 1px; border-bottom-width: 1px; border-color:#336699;}
        <?php if($tablo < 5){?>
        .tur1{display:none;}
        .tur2,.tur1k{display:none;}
        .cey,.ceyk{display:none;}
        <?php }?>
        <?php if($tablo < 8 ){?>
        .tur1{display:none;}
        .tur2,.tur1k,.ceyk{display:none;}
        <?php }?>
        <?php if($tablo < 9 ){?>
        .tur1{display:none;}
        .tur2,.tur1k,.ceyk{display:none;}
        <?php }?>
        <?php if($tablo < 17 ){?>
        .tur1,.tur1k{display:none;}
        <?php } ?>
    </style>

<?php
}
?>
