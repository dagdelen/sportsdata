
    <i class="bi bi-5-circle-fill tur1R" data-bs-toggle="tooltip" data-bs-title="<?=_Tur1_Eleme?>"></i>
    <i class="bi bi-4-circle-fill tur2R" data-bs-toggle="tooltip" data-bs-title="<?=_Tur2_Eleme?>"></i>
    <i class="bi bi-3-circle-fill turceyR" data-bs-toggle="tooltip" data-bs-title="<?=_Ceyrek_Final?>"></i>
    <i class="bi bi-2-circle-fill turyarR" data-bs-toggle="tooltip" data-bs-title="<?=_Yari_Final?>"></i>
    <i class="bi bi-1-circle-fill turfinR" data-bs-toggle="tooltip" data-bs-title="<?=_Final?>"></i>
    <i class="bi bi-0-circle-fill sampR" data-bs-toggle="tooltip" data-bs-title="<?=_Sampiyon?>"></i>

<div class="row">
	<?php
     $turlar = array(5,4,3,2,1);
     foreach ($turlar as $tur)
     {
         if($tur == 0){$turu = _sampiyon; 		$bacol = "sampBC";}
         if($tur == 1){$turu = _final; 			$bacol = "turfinBC";}
         if($tur == 2){$turu = _yari_final; 	$bacol = "turyarBC";}
         if($tur == 3){$turu = _ceyrek_final; 	$bacol = "turceyBC";}
         if($tur == 4){$turu = _tur2_eleme; 	$bacol = "tur2BC";}
         if($tur == 5){$turu = _tur1_eleme; 	$bacol = "tur1BC";}

		$turusql = DB::prepare("SELECT * FROM fa_mus WHERE fid=? AND tur = '$tur' AND blue > 0  ");
		$turusql->execute(array($fid));
		$turu_say=$turusql->rowCount();
		if($turu_say > 0){ 
		?>	
		 <div class="col-lg-3">
		 <div class="card <?=$bacol?>">
			<div class="card-body"> 
				<div><?=$turu?></div>	
				<div><b><?=$turu_say?></b> <?=_mac?></div>
			</div>
		 </div>
		 </div> 	
		<?php
		}
     }
	 
 $mustlsql =  "SELECT * FROM fa_mus WHERE fid = ? AND blue > 0 GROUP BY stl ";
 $msparams = array($fid);	
 $msstmt = DB::prepare($mustlsql);
 $msstmt->execute($msparams);
 foreach($msstmt as $mus)
 {
	$sitadsql = DB::prepare("SELECT * FROM stil WHERE stil_id = ? ");
	$sitadsql->execute(array($mus->stl));
	$sitad = $sitadsql->fetch(PDO::FETCH_ASSOC);

	$stillquery = DB::prepare("SELECT * FROM fa_mus WHERE fid=? AND stl = '$mus->stl' AND blue > 0  ");
	$stillquery->execute(array($fid));
	$stl_say=$stillquery->rowCount();
	if($stl_say > 0){ 
  ?>	
     <div class="col-lg-12">
     <div class="card">
        <div class="card-body"> 
            <div class="m-2"><b><?=$sitad[stil_ad]?></b> <i style="font-size:0.8em;">(<b><?=$stl_say?></b> <?=_mac?>)</i></div>
            
                <div class="row">
                <?php
                 $mukatsql =  "SELECT * FROM fa_mus WHERE fid = ? AND stl = ? AND blue > 0 GROUP BY kat ";
                 $mkparams = array($fid, $mus->stl);	
                 $mkstmt = DB::prepare($mukatsql);
                 $mkstmt->execute($mkparams);
                 foreach($mkstmt as $muk)
                 {
                    $katadsql = DB::prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
                    $katadsql->execute(array($muk->kat));
                    $katad = $katadsql->fetch(PDO::FETCH_ASSOC);
	
					$katsquery = DB::prepare("SELECT * FROM fa_mus WHERE fid=? AND kat = '$muk->kat' AND blue > 0  ");
					$katsquery->execute(array($fid));
					$kat_say=$katsquery->rowCount();
					if($kat_say > 0){ 
					 ?>
					 <div class="col-lg-6">
					 <div class="card">
						<div class="card-body"> 
                        
							<div class="p-1 m-1">
                            
                            	<b><?=$katad[kategori_ad]?></b> <i style="font-size:0.8em;">(<b><?=$kat_say?></b> <?=_mac?>)</i>
                                <i class="bi bi-arrows-vertical float-end toggle" id="kat<?=$muk->kat?>" style="cursor:cell;"></i>

								<?=_Ring?>:
                                <select class="ring_belirle p-1" t="fa_mus" k="kat" id="<?=$muk->kat?>" fid="<?=$fid?>" rl="1" wo="" style="display:inline-block;">
                                    <option value="0"><?=_sec?></option>
                                        <?php
                                         $muringsql =  "SELECT * FROM fa_mus_ring WHERE fid = ?";
                                         $muringparams = array($fid);	
                                         $muringstmt = DB::prepare($muringsql);
                                         $muringstmt->execute($muringparams);
                                         foreach($muringstmt as $fmrng)
                                         {
                                         ?>
                                            <option value="<?=$fmrng->fa_mus_ring_id?>" <?php if($fmrng->fa_mus_ring_id == $muk->ring){?>selected<?php }?> ><?=$fmrng->fa_mus_ring_ad?></option>
                                    <?php
                                    }
                                    ?>
                                </select> 
                                <span class="eski_fa_mus_kat_<?=$muk->kat?>"></span>            

                            </div>
                                                    
                            <div class="card toggle_ toggle_kat<?=$muk->kat?> z-3 p-4 pt-2" 
                            style="font-size:0.7em; background-color:#FFFFFF; border:solid 1px #CCCCCC; display:none; position:absolute;">
                            <table width="100%">			
                            <?php
                             $ki = 0;           //  AND blue > 0 
                             $musklsql =  "SELECT * FROM fa_mus WHERE fid = ? AND kat = ?  ";
                             $msklparams = array($fid, $muk->kat);	
                             $msstlstmt = DB::prepare($musklsql);
                             $msstlstmt->execute($msklparams);
                             foreach($msstlstmt as $mustl)
                             {
                              $ki ++; 
								//===================									
								$redfauyesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
								$redfauyesql->execute(array($mustl->red));
								$Rfuy = $redfauyesql->fetch(PDO::FETCH_ASSOC);		
									
								$reduyadsql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
								$reduyadsql->execute(array($Rfuy[uye]));
								$Ruye = $reduyadsql->fetch(PDO::FETCH_ASSOC);			

								 $Rfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
								 $Rfauyeyersql->execute(array($Rfuy[uye]));
								 $Ruyyr = $Rfauyeyersql->fetch(PDO::FETCH_ASSOC);
								 
									if($fa[temsil] == "uye"){
										$tms_yer_ad = _bireysel;
									}else{
										 $tms_id_son = "_id";
										 $tms_idne = "$fa[temsil]$tms_id_son";
										 $Rtemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
										 $Rtemssql->execute(array($Ruyyr[$fa[temsil]]));
										 $Rtms = $Rtemssql->fetch(PDO::FETCH_ASSOC);
										 
										 $Rtms_ad_son = "_ad";
										 $Rtms_adne = "$fa[temsil]$Rtms_ad_son";
										 $Rtms_yer_ad = "$Rtms[$Rtms_adne]";
									}
								//===================														
								$bluefauyesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
								$bluefauyesql->execute(array($mustl->blue));
								$Bfuy = $bluefauyesql->fetch(PDO::FETCH_ASSOC);			
														
								$blueuyadsql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
								$blueuyadsql->execute(array($Bfuy[uye]));
								$Buye = $blueuyadsql->fetch(PDO::FETCH_ASSOC);	
								
								 $Bfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
								 $Bfauyeyersql->execute(array($Bfuy[uye]));
								 $Buyyr = $Bfauyeyersql->fetch(PDO::FETCH_ASSOC);
								 
									if($fa[temsil] == "uye"){
										$tms_yer_ad = _bireysel;
									}else{
								 
									//	 $tms_id_son = "_id";
									//	 $tms_idne = "$fa[temsil]$tms_id_son";
										 $Btemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
										 $Btemssql->execute(array($Buyyr[$fa[temsil]]));
										 $Btms = $Btemssql->fetch(PDO::FETCH_ASSOC);
										 
										 $Btms_ad_son = "_ad";
										 $Btms_adne = "$fa[temsil]$Btms_ad_son";
										 $Btms_yer_ad = "$Btms[$Btms_adne]";
									}
								//===================														
								
										
								$sikletadsql = DB::prepare("SELECT * FROM siklet WHERE siklet_id = ? ");
								$sikletadsql->execute(array($mustl->skl));
								$Sadi = $sikletadsql->fetch(PDO::FETCH_ASSOC);	
								
								if($mustl->tur == 1){$uturu = '<i class="bi bi-1-square-fill turfinR" data-bs-toggle="tooltip" data-bs-title="'._Final.'"></i>';}
								if($mustl->tur == 2){$uturu = '<i class="bi bi-2-square-fill turyarR" data-bs-toggle="tooltip" data-bs-title="'._Yari_Final.'"></i>';}
								if($mustl->tur == 3){$uturu = '<i class="bi bi-3-square-fill turceyR" data-bs-toggle="tooltip" data-bs-title="'._Ceyrek_Final.'"></i>';}
								if($mustl->tur == 4){$uturu = '<i class="bi bi-4-square-fill tur2R" data-bs-toggle="tooltip" data-bs-title="'._Tur2_Eleme.'"></i>';}
								if($mustl->tur == 5){$uturu = '<i class="bi bi-5-square-fill tur1R" data-bs-toggle="tooltip" data-bs-title="'._Tur1_Eleme.'"></i>';}
                             ?>
                                 <!--<tr>
                                 	<td colspan="4"><?=$Sadi[siklet_ad]?></td>
                                 </tr> -->                     
                                 <tr class="satir">
                                 	<td style="border-bottom:solid #000;"><?=$ki?>- </td>
                                    <td class="uturu" style="border-bottom:solid #000; font-size:1.5em;"><?=$uturu?></td>
                                    <td style="border-bottom:double #000; min-width:40px;"><b><?=$Sadi[siklet_ad]?></b></td>
                                    <td class="sigdir" style="border-bottom:solid #FF0000;">
										<div><?=$Ruye[ad]?> <?=$Ruye[soyad]?></div>
                                        <div><b><?=mb_substr($Rtms_yer_ad,0,20, 'UTF-8')?></b></div>
                                    </td>
                                    <td style="border-bottom:solid #000000;">&nbsp;  </td>
                                    <td class="sigdir" style="border-bottom:solid #00F;">
										<div><?=$Buye[ad]?> <?=$Buye[soyad]?></div>
                                        <div><b><?=mb_substr($Btms_yer_ad,0,20, 'UTF-8')?></b></div>
                                    </td>
                                    <td style="border-bottom:solid #000000; font-size:1.2em;"> 
                                    <?php if($mustl->ring > 0){ ?>
                                        <select class="p-1 ring_belirle" t="fa_mus" k="id" id="<?=$mustl->fa_mus_id?>" fid="<?=$fid?>" rl="0" wo="" style="display:inline-block;">
                                            <option value="0"><?=_sec?></option>
                                                <?php
                                                 $idmuringsql =  "SELECT * FROM fa_mus_ring WHERE fid = ?";
                                                 $idmuringparams = array($fid);	
                                                 $idmuringstmt = DB::prepare($idmuringsql);
                                                 $idmuringstmt->execute($idmuringparams);
                                                 foreach($idmuringstmt as $idfmrng)
                                                 {
                                                 ?>
                                                    <option value="<?=$idfmrng->fa_mus_ring_id?>" <?php if($idfmrng->fa_mus_ring_id == $mustl->ring){?>selected<?php }?> ><?=$idfmrng->fa_mus_ring_ad?></option>
                                            	<?php
                                            	}
                                            	?>
                                        </select> 
                                        <span class="eski_fa_mus_id_<?=$mustl->fa_mus_id?>" style="position:absolute;"></span>   
                                    <?php } ?>
                                    </td>
                                 </tr>  
                            <?php 
                             }
                            ?>
                            </table>           
                            </div>
                                        
						</div>
					 </div>
					 </div> 	
					 <?php
					 }
					 }
					?>
					</div>
            
            
        </div>
     </div>
     </div> 	
 <?php
 }
 }
 ?>
    



</div>



