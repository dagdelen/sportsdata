<?php 
include("../../../../config.php");
$fid 	= $_POST[fid];
$ring 	= $_POST[ring];
$dr 	= $_POST[dr];

$faaliyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
$faaliyetsqll->execute(array($fid));
$fa = $faaliyetsqll->fetch(PDO::FETCH_ASSOC);
$fad = $fa[faaliyet_ad];

//	 echo"fid:$fid ring:$ring prg:$prg gun:$gun ";
 $lstmurngsql =  "SELECT * FROM fa_mus WHERE fid = ? AND ring = ?  ORDER BY sr ASC ";
 $lstrmsparams = array($fid, $ring);	
 $lstrmsstmt = DB::prepare($lstmurngsql);
 $lstrmsstmt->execute($lstrmsparams);
 $i=0;
 foreach($lstrmsstmt as $mus)
 { 
 $i++;
	//////////////////////////	
	$ringadsql = DB::prepare("SELECT * FROM fa_mus_ring WHERE fa_mus_ring_id = ? ");
	$ringadsql->execute(array($mus->ring));
	$rndad = $ringadsql->fetch(PDO::FETCH_ASSOC);
    $ring_ad = $rndad[fa_mus_ring_ad];
	
	$brssql = DB::prepare("SELECT * FROM brans WHERE brans_id = ? ");
	$brssql->execute(array($mus->brs));
	$brs = $brssql->fetch(PDO::FETCH_ASSOC);	
	
	$sitadsql = DB::prepare("SELECT * FROM stil WHERE stil_id = ? ");
	$sitadsql->execute(array($mus->stl));
	$stl = $sitadsql->fetch(PDO::FETCH_ASSOC);	
	
	$katadsql = DB::prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
	$katadsql->execute(array($mus->kat));
	$kat = $katadsql->fetch(PDO::FETCH_ASSOC);	
	
	$sklsql = DB::prepare("SELECT * FROM siklet WHERE siklet_id = ? ");
	$sklsql->execute(array($mus->skl));
	$skl = $sklsql->fetch(PDO::FETCH_ASSOC);	
		
								//===================									
								$redfauyesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
								$redfauyesql->execute(array($mus->red));
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
								$bluefauyesql->execute(array($mus->blue));
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
								 
										 $Btemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
										 $Btemssql->execute(array($Buyyr[$fa[temsil]]));
										 $Btms = $Btemssql->fetch(PDO::FETCH_ASSOC);
										 
										 $Btms_ad_son = "_ad";
										 $Btms_adne = "$fa[temsil]$Btms_ad_son";
										 $Btms_yer_ad = "$Btms[$Btms_adne]";
									}
								//===================	    
                                $prgkont = DB::prepare("SELECT * FROM fa_program WHERE fid = ? AND fa_program_id = ? ");
                                $prgkont->execute(array($fid, $mus->prg));
                                $mprg = $prgkont->fetch(PDO::FETCH_ASSOC);

	?>
	<script>
	$(".local_<?=$mus->fa_mus_id?>").html('<iframe width="100%" frameborder="0" scrolling="no" style="height:30px; padding:0; margin:0;" src="http://localhost/sportsdata.php?dr=<?=$dr?>&id=<?=$mus->fa_mus_id?>&sr=<?=$mus->sr?>&fid=<?=$mus->fid?>&brs=<?=$mus->brs?>&brs_ad=<?=$brs[brans_ad]?>&stl=<?=$mus->stl?>&stl_ad=<?=$stl[stil_ad]?>&kat=<?=$mus->kat?>&kat_ad=<?=$kat[kategori_ad]?>&skl=<?=$mus->skl?>&skl_ad=<?=$skl[siklet_ad]?>&tab=<?=$mus->tab?>&rkr=<?=$mus->rkr?>&red=<?=$mus->red?>&red_ad=<?=$Ruye[ad]?>&red_soyad=<?=$Ruye[soyad]?>&red_yer=<?=$Rtms_yer_ad?>&rbl=<?=$mus->rbl?>&bkr=<?=$mus->bkr?>&blue=<?=$mus->blue?>&blue_ad=<?=$Buye[ad]?>&blue_soyad=<?=$Buye[soyad]?>&blue_yer=<?=$Btms_yer_ad?>&bbl=<?=$mus->bbl?>&tur=<?=$mus->tur?>&ring=<?=$mus->ring?>&ring_ad=<?=$ring_ad?>&prg=<?=$mus->prg?>&prg_tar=<?=$mprg[tarih]?>&gun=<?=$mus->gun?>&d=<?=$mus->d?>&saat=<?=$mus->saat?>&sd=<?=$mus->sd?>&rdp=<?=$mus->rdp?>&blp=<?=$mus->blp?>&Rgeri=<?=$mus->Rgeri?>&Rkose=<?=$mus->Rkose?>&Bgeri=<?=$mus->Bgeri?>&Bkose=<?=$mus->Bkose?>&fad=<?=$fad?>" ></iframe>');
	
		// $(".local_<?=$mus->fa_mus_id?>").html("<?=$mus->fa_mus_id?>");
		/*  
		$(".sira<?=$mus->fa_mus_id?>").fadeIn('slow').animate({opacity: 0.4}, 700).fadeOut('slow',function() {
			$(".sira<?=$mus->fa_mus_id?>").remove(); 
		});
		*/		
				
	</script>
	<?php
						
	
 	
 }
 ?>