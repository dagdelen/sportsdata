<?php

    $sr++;
    $stlsql = DB::prepare("SELECT * FROM stil WHERE stil_id = ? ");
    $stlsql->execute(array($musr->stl));
    $stl = $stlsql->fetch(PDO::FETCH_ASSOC);
    
    $katsqli = DB::prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
    $katsqli->execute(array($musr->kat));
    $kat = $katsqli->fetch(PDO::FETCH_ASSOC);
    
    $kategori_ad = $kat[kategori_ad];
    $katbol =explode(" ", $kat[kategori_ad]);	
    $kategori_kisa = "".mb_substr($katbol[0],0,1, 'UTF-8')."".mb_substr($katbol[1],0,1, 'UTF-8')."".mb_substr($katbol[2],0,1, 'UTF-8')."";

    
    $sklsqli = DB::prepare("SELECT * FROM siklet WHERE siklet_id = ? ");
    $sklsqli->execute(array($musr->skl));
    $skl = $sklsqli->fetch(PDO::FETCH_ASSOC);
 
                            //===================									
                            $redfauyesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
                            $redfauyesql->execute(array($musr->red));
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
                            $bluefauyesql->execute(array($musr->blue));
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
                            
    if($musr->tur == 0){$turu = _sampiyon; 	$bacol = "sampBC"; 		$turR = "sampR"; 	$tur_ico = '<i class="bi bi-0-circle-fill sampR" data-bs-toggle="tooltip" data-bs-title="'._Sampiyon.'"></i>';}
    if($musr->tur == 1){$turu = _final; 		$bacol = "turfinBC"; 	$turR = "turfinR"; 	$tur_ico = '<i class="bi bi-1-circle-fill turfinR" data-bs-toggle="tooltip" data-bs-title="'._Final.'"></i>';}
    if($musr->tur == 2){$turu = _yari_final; 	$bacol = "turyarBC"; 	$turR = "turyarR"; 	$tur_ico = '<i class="bi bi-2-circle-fill turyarR" data-bs-toggle="tooltip" data-bs-title="'._Yari_Final.'"></i>';}
    if($musr->tur == 3){$turu = _ceyrek_final; $bacol = "turceyBC"; 	$turR = "turceyR"; 	$tur_ico = '<i class="bi bi-3-circle-fill turceyR" data-bs-toggle="tooltip" data-bs-title="'._Ceyrek_Final.'"></i>';}
    if($musr->tur == 4){$turu = _tur2_eleme; 	$bacol = "tur2BC"; 		$turR = "tur2R"; 	$tur_ico = '<i class="bi bi-4-circle-fill tur2R" data-bs-toggle="tooltip" data-bs-title="'._Tur2_Eleme.'"></i>';}
    if($musr->tur == 5){$turu = _tur1_eleme; 	$bacol = "tur1BC"; 		$turR = "tur1R";	$tur_ico = '<i class="bi bi-5-circle-fill tur1R" data-bs-toggle="tooltip" data-bs-title="'._Tur1_Eleme.'"></i>';}
    
    if($_GET[g] == "prg"){
        if($musr->sr != $sr){
                $srgunc = DB::prepare("UPDATE fa_mus SET  sr = ? WHERE fa_mus_id = ? ");
            $srgunc->bindParam(1, $sr, PDO::PARAM_INT);
            $srgunc->bindParam(2, $musr->fa_mus_id, PDO::PARAM_INT);
            $srgunc->execute();  
        }
    }
?>
    <div id="listItem_<?=$musr->fa_mus_id?>" class="sira satir sira<?=$musr->fa_mus_id?> satir<?=$musr->fa_mus_id?>" >
    
        <div style="width:20px;"><i class="bi bi-list handle handle<?=$mrng->ring?>"></i></div>

        <div class="sr_<?=$musr->fa_mus_id?>" style="width:40px; font-size:0.9em; color:#666;"><?=$musr->sr?> -</div>
    
        <div class="tex"  id="<?=$musr->fa_mus_id?>" t="fa_mus" o="prg" s="" style="width:30px; font-size:0.7em; color:#666;"><i><?=$musr->prg?></i></div>

        <div class="mac_saati<?=$musr->fa_mus_id?> tex" id="<?=$musr->fa_mus_id?>" t="fa_mus" o="saat" s="" style="width:60px;">
            <?=substr($musr->saat,0,5)?>
        </div>
            
        <div style="width:20px; ">
            <div style="border:solid 1px #666; width:18px; height:18px; font-size:0.7em; text-align:center; padding:1px; margin:-15px 0 0 0;
                border-radius:16px 16px 16px 16px; cursor:help; background-color:#000; color:#FFF; display:inline-block; position:absolute; "
                data-bs-toggle="tooltip" data-bs-title="<?=$musr->tab?> <?=_sporcu?>" >
                <?=$musr->tab?>
            </div>
        </div>
        
        <div style="width:25px; font-size:1.2em; padding:3px 0 0 0;"><?=$tur_ico?></div>

        <div style="width:40px; text-align:center;" title="<?=$stl[stil_ad]?>"><?=mb_substr($stl[stil_ad],0,3, 'UTF-8')?></div>

        <div style="width:40px; text-align:center;" title="<?=$kategori_ad?>" data-bs-toggle="tooltip" data-bs-title="<?=$kategori_ad?>" ><?=$kategori_kisa?></div>

        <div style="width:75px;">
            <a  style="cursor:cell" onclick="window.open('ajx.php?f=<?=$fid?>&s=<?=$musr->skl?><?=$son_krt?>','tablo','height=500,width=1000,left=100,top=100,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=no');">
                <?=$skl[siklet_ad]?>
            </a>
        </div>
        
        <div class="sp_ad" title="<?=$Ruye[ad]?> <?=$Ruye[soyad]?>" style="border-bottom: solid 2px #f70303;">
            <?=$Ruye[ad]?> <?=$Ruye[soyad]?>
        </div>
        <!-- 
        <div style="display:inline-block; width:20px;">
            <i class="bi bi-arrow-up-square-fill kirmizi mus_atlat" id="<?=$musr->fa_mus_id?>" fid="<?=$fid?>" ks="red"  
            data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> > <?=$Ruye[ad]?> <?=$Ruye[soyad]?>" style="cursor:cell;"></i>
        </div>
        -->
        <div class="sp_yer" style="text-align:center; border-bottom: solid 2px #f70303;">
            <?=$Rtms_yer_ad?>
        </div>

        <div style="display:inline-block; width:20px;"> <> </div>

        <div class="sp_yer" style="text-align:center; border-bottom: solid 2px #0703f7;">
            <?=$Btms_yer_ad?>
        </div>
        
        <div style="display:inline-block; width:20px;">
            <!--
            <i class="bi bi-arrow-up-square-fill mavi mus_atlat" id="<?=$musr->fa_mus_id?>" fid="<?=$fid?>" ks="blue" 
            data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> > <?=$Buye[ad]?> <?=$Buye[soyad]?>" style="cursor:cell;"></i>
            -->
        </div>
        
        <div class="sp_ad" title="<?=$Buye[ad]?> <?=$Buye[soyad]?>" style="border-bottom: solid 2px #0703f7;">
            <?=$Buye[ad]?> <?=$Buye[soyad]?>
        </div>
        
        <div style="width:20px; font-size:1.2em;  float:right;"> 
            <?php if($musr->tab > 1 && $musr->saat == "00:00:00"){?>
                <i class="atlat_<?=$musr->fa_mus_id?> z-3" style="position:absolute;"></i>
                <i class="bi bi-arrow-right-square-fill mus_atlat <?=$turR?>" id="<?=$musr->fa_mus_id?>" fid="<?=$fid?>" ks="gun" 
                data-bs-toggle="tooltip" data-bs-title="<?=$turu?> > <?=_ileri_gun?> <?=$musr->fa_mus_id?>" style="cursor:cell;"></i> 
            <?php }?>
        </div>
        
                <?php 
                $Tfamugorev = DB::prepare("SELECT * FROM fa_mus_gorev WHERE fid = ? AND fa_mus_id = ?  ");
		        $Tfamugorev->execute(array($fid, $musr->fa_mus_id));
		        $tpl_say = $Tfamugorev->rowCount();	       
                ?>
                <span class="say_<?=$musr->fa_mus_id?>" data-bs-toggle="tooltip" data-bs-title="<?=$tpl_say?> <?=_gorev?>" style="font-size: 1.2em; ">
                    <b><i class="bi bi-<?=$tpl_say?>-square-fill"><?php if($tpl_say > 9){?><?=$tpl_say?><?php }?></i></b>
                </span>  
                <!--
                <div class="say_<?=$musr->fa_mus_id?>" style="border:solid 1px #666666; width: 18px; height: 18px; font-size: 0.8em; text-align: center; padding: 1px; margin: 5px 0 0 0;
                    border-radius:16px 16px 16px 16px; cursor:help; background-color: #4e5257; color: #FFFFFF; display: inline-block; position: absolute; "
                    data-bs-toggle="tooltip" data-bs-title="<?=$tpl_say?> <?=_gorev?>" >
                    <b><?=$tpl_say?></b>
                </div>
                 -->

                 <?php 
        if($_GET[g] == "gor")
        {
                ?>  
                <!--
            <div style="width:350px;">
             </div>
                -->
                <div class="form-check form-switch" style="display:inline-block;"> 
                    <input class="form-check-input mus_gorev_ver mus_gor_che 
                        mus_kont_<?=$musr->fa_mus_id?>  " 
                        t="fa_mus" k="id" id="<?=$musr->fa_mus_id?>" fid="<?=$fid?>" ring="<?=$musr->ring?>" rl="0" wo="" type="checkbox"  />
                </div>
                <span class="gorev_fa_mus_id_<?=$musr->ring?>_<?=$musr->fa_mus_id?>" style=" position:absolute;"></span> 
                <?php 

        }

        ?>

                      
        
        <span class="mac_saati_ack<?=$musr->fa_mus_id?>  atlat_<?=$musr->fa_mus_id?>" style="width:100%;"></span>
    </div> 
        <?php
?>