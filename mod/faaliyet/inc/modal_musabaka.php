<?php
if($_POST[yonet_modal] || $_POST[artir] || $_POST[eksilt]){
    include("mod/faaliyet/inc/modal_mus_post.php");
}else if($_POST[id])
{
    ?>	
<script>
    $(document).ready(function () {

        $('.yonet').click(function() {
            var element = $(this);
            var aid = element.attr("id");
            var fid = element.attr("fid");
            var mus_id = element.attr("mus_id");
            var ring_id = element.attr("ring_id");
            var poz = element.attr("poz");
            var ne = element.attr("ne");
            var bit_krt = $(".bit_krt").val();
            var kazanan = $(".kazanan").val();
            var redp = $(".redp").val();
            var bluep = $(".bluep").val();
            
            var eks = $(".eks").val();
            var arti_eksi = $(".arti_eksi").val();
            var eks_puan = $(".eks_puan").val();
            
            if(ne == "poz" || ne == "bit"){
                if(poz == 1 || poz == 2 || ne == "bit"){
                    var audio = new Audio('mod/faaliyet/musabaka/gong.mp3');
                    audio.play();
                }
            }

            $(".yonet_durum").html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
            var info = 'yonet_modal=' + mus_id  + '&fid=' + fid  + '&ring_id=' + ring_id  + '&poz=' + poz  + '&ne=' + ne  + 
            '&bit_krt=' + bit_krt  + '&aid=' + aid  + '&kazanan=' + kazanan  + '&redp=' + redp  + '&bluep=' + bluep  + 
            '&eks=' + eks  + '&arti_eksi=' + arti_eksi  + '&eks_puan=' + eks_puan;
                $.ajax({
                    type: "POST",
                    url: "ajx.php",
                    data: info,
                    success: function(html)
                    {
                            $(".yonet_durum").html(html).show();
                        
                    } 
            });	
        });	
        
        $('.ding').mouseover(function() {
                var audio = new Audio('mod/faaliyet/musabaka/ding.mp3');
                audio.play();	
        });		
        $('.ding').click(function() {
                var audio = new Audio('mod/faaliyet/musabaka/ding.mp3');
                audio.play();	
        });		



        $('.gong').click(function() {
                var audio = new Audio('mod/faaliyet/musabaka/gong.mp3');
                audio.play();	
        });		
        

    $('.bitir').click(function() {$(".atlat_bolum").toggle();});		
	$('.arti').click(function() {$(".arti_bolum").toggle();	});		
	$('.eksi').click(function() {$(".eksi_bolum").toggle();	});		

	$(".mus_atlat").click(function(){
		var element = $(this);
        var id = element.attr("id");
        var fid = element.attr("fid");
        var ks = element.attr("ks");
		

			$(".atlat_"+id).html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
			var info = 'mus_atlat=' + id + '&fid=' + fid  + '&ks=' + ks;
				$.ajax({
					type: "POST",
					url: "ajx.php",
					data: info,
					success: function(html){
						$(".atlat_"+id).html(html).show();
					}
				});		
	});	

	$(".artir").click(function(){
		var element = $(this);
        var id = element.attr("id");
        var fid = element.attr("fid");
        var ks = element.attr("ks");
		

			$(".artir_"+id).html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
			var info = 'artir=' + id + '&fid=' + fid  + '&ks=' + ks;
				$.ajax({
					type: "POST",
					url: "ajx.php",
					data: info,
					success: function(html){
						$(".artir_"+id).html(html).show();
					}
				});		
	});	


	$(".eksilt").click(function(){
		var element = $(this);
        var id = element.attr("id");
        var fid = element.attr("fid");
        var ks = element.attr("ks");
		

			$(".eksilt_"+id).html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
			var info = 'eksilt=' + id + '&fid=' + fid  + '&ks=' + ks;
				$.ajax({
					type: "POST",
					url: "ajx.php",
					data: info,
					success: function(html){
						$(".eksilt_"+id).html(html).show();
					}
				});		
	});	



        
    });
</script>

    <style>
        #tableana{padding: 100px;}
        /*   
        #tablem td{border:solid 1px #999; padding:0; margin:0;}
        .skor td{border:solid 1px #CCCCCC;}*/
        .yan1{transform: rotate(-90deg); margin: -70px 0 0 -80px;  position:absolute; text-align:center; 
        }

        .yan3{transform: rotate(-90deg); margin: -70px 0 0 -65px; position:absolute; text-align:center;  
        }
        .hkm{border: solid 1px #DDDDDD; width:150px; height:20px; font-size: 0.8em;}
        .yan2{margin-left: 175px;}
        .orta{margin-left: 175px; } /* margin-top: -40px; */ 
        .juri{ display: inline-block;}

    </style>
    <?php
    // overflow:hidden; ruby-overhang:!important; font-size:0.9em;
    $fid 		= $k_ne; 
    // $fa_mus_id = $id;
    //	 echo"m_ne:$m_ne t_ne:$t_ne k_ne:$k_ne id:$id ";
	$faaliyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
	$faaliyetsqll->execute(array($fid));
	$fa = $faaliyetsqll->fetch(PDO::FETCH_ASSOC);

	$famussql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? ");
	$famussql->execute(array($id));
	$mus = $famussql->fetch(PDO::FETCH_ASSOC);	
	$musay = $famussql->rowCount();	 
	
	$ring_id = $mus[ring];
	$mus_id =  $id;
		
	$musaktifsql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND ring = ? ");
	$musaktifsql->execute(array($fid, $ring_id));
	$akt_mus = $musaktifsql->fetch(PDO::FETCH_ASSOC);
	$mus_aktif_say = $musaktifsql->rowCount();
	
	if($mus_aktif_say > 0)
	{
		
	}
		
    ?>	
    <!--  
	<a class="float-end" href="java.php?f=<?=$fid?>&r=<?=$ring_id?>" target="_blank" style="position:absolute; right:10px; top:10px;">
    -->   
	<a  style="cursor:cell; font-size:1.5em; position:absolute; right:10px; top:10px;" onclick="window.open('ajx.php?f=<?=$fid?>&r=<?=$ring_id?>','skor<?=$ring_id?>','height=400,width=600,left=100,top=100,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=no');">
		<i class="md_bi bi bi-display"></i>
	</a>
    <!-- --> 

    <div align="center" style="padding-left: 50px;">
        <table border="0" width="100%" id="tableana" cellpadding="4">
            <tr>
                <td width="50%" height="100%">

                    <div class="clearfix">
                        <div class="yonet_durum z-3" style="position:absolute; color:#336699; font-size:0.8em; margin-top:-40px;">
                            <svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="12" r="3"><animate id="spinner_qFRN" begin="0;spinner_OcgL.end+0.25s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="12" cy="12" r="3"><animate begin="spinner_qFRN.begin+0.1s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="20" cy="12" r="3"><animate id="spinner_OcgL" begin="spinner_qFRN.begin+0.2s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle></svg>
                        </div>
                    </div>
                    
                    <table border="0" id="tablem" >
                        <tr>
                            <td>&nbsp;</td>
                            <td valign="top">
                                    <?php
                                    $yanikisql = DB::prepare("SELECT uy.ad,uy.soyad
                                    FROM fa_mus_gorev AS fmg 
                                    JOIN fa_gorevli AS fg ON (fg.fa_gorevli_id = fmg.fa_gorevli_id)
                                    JOIN uye AS uy ON (uy.uye_id = fg.uye)
                                    WHERE  fmg.fid = ? AND fg.fid = ? AND fmg.fa_mus_id = ? AND fmg.yer = 2 ");
                                    $yanikisql->execute(array($fid,$fid,$mus_id));
                                    $yan2 = $yanikisql->fetch(PDO::FETCH_ASSOC);	
                                    ?>
                                <div class="clearfix">
                                    <div class="yan2 hkm ;" align="center"><?=$yan2[ad]?> <?=$yan2[soyad]?> </div>
                                </div>
                                
                            </td>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td>
                                    <?php
                                    $yanbirsql = DB::prepare("SELECT uy.ad,uy.soyad
                                    FROM fa_mus_gorev AS fmg 
                                    JOIN fa_gorevli AS fg ON (fg.fa_gorevli_id = fmg.fa_gorevli_id)
                                    JOIN uye AS uy ON (uy.uye_id = fg.uye)
                                    WHERE  fmg.fid = ? AND fg.fid = ? AND fmg.fa_mus_id = ? AND fmg.yer = 1 ");
                                    $yanbirsql->execute(array($fid,$fid,$mus_id));
                                    $yan1 = $yanbirsql->fetch(PDO::FETCH_ASSOC);	
                                    ?>                           
                                <div class="yan1 hkm" align="center"><?=$yan1[ad]?> <?=$yan1[soyad]?></div>
                            </td>
                            <td>
                                <!-- -->   
                            <iframe src="mod/faaliyet/musabaka/skor.php?f=<?=$fid?>&r=<?=$ring_id?>&m=<?=$mus_id?>&md=1" scrolling="no" width="500" height="300"></iframe> 
                                     
                        <?php  
                           // $modal = 1;
                          //  include("mod/faaliyet/musabaka/skor.php");
                        ?>       
                                    <?php
                                    $orthksql = DB::prepare("SELECT uy.ad,uy.soyad
                                    FROM fa_mus_gorev AS fmg 
                                    JOIN fa_gorevli AS fg ON (fg.fa_gorevli_id = fmg.fa_gorevli_id)
                                    JOIN uye AS uy ON (uy.uye_id = fg.uye)
                                    WHERE  fmg.fid = ? AND fg.fid = ? AND fmg.fa_mus_id = ? AND fmg.yer = 4 ");
                                    $orthksql->execute(array($fid,$fid,$mus_id));
                                    $ort = $orthksql->fetch(PDO::FETCH_ASSOC);	
                                    ?> 
                                <div class="clearfix">
                                    <div class="orta hkm ;" align="center"><?=$ort[ad]?> <?=$ort[soyad]?></div>
                                </div>


                                        <?php
                                    $jurihksql = DB::prepare("SELECT uy.ad,uy.soyad
                                    FROM fa_mus_gorev AS fmg 
                                    JOIN fa_gorevli AS fg ON (fg.fa_gorevli_id = fmg.fa_gorevli_id)
                                    JOIN uye AS uy ON (uy.uye_id = fg.uye)
                                    WHERE  fmg.fid = ? AND fg.fid = ? AND fmg.fa_mus_id = ? AND fmg.yer > 4 ");
                                    $jurihksql->execute(array($fid,$fid,$mus_id));
                                    foreach($jurihksql as $hjr)
                                    { 
                                        ?> 
                                        <div class="juri hkm m-2" align="center"><?=$hjr->ad?> <?=$hjr->soyad?> </div>
                                        <?php
                                    }
                                        ?>

                                <div align="center" style="height:80px;">

                                    <table class="arti_bolum" width="100%" style="display:none;">
                                        <tr>
                                            <td>
                                                <i class="bi bi-arrow-up-square-fill kirmizi artir" id="<?=$mus[fa_mus_id]?>" fid="<?=$fid?>" ks="red"  
                                                data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$mus[fa_mus_id]?>" style="cursor:cell;"></i>
                                            </td>
                                            <td class="artir_<?=$mus[fa_mus_id]?>"></td>
                                            <td>
                                                <i class="bi bi-arrow-up-square-fill mavi artir" id="<?=$mus[fa_mus_id]?>" fid="<?=$fid?>" ks="blue" 
                                                data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$mus[fa_mus_id]?>" style="cursor:cell; float:right;"></i>
                                            </td>
                                        </tr>
                                    </table> 

                                    <table class="atlat_bolum" width="100%" style="display:none;">
                                        <tr>
                                            <td>
                                                <i class="md_bi bi bi-trophy-fill kirmizi mus_atlat" id="<?=$mus[fa_mus_id]?>" fid="<?=$fid?>" ks="red"  
                                                data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$mus[fa_mus_id]?>" style="cursor:cell;"></i>
                                            </td>
                                            <td class="atlat_<?=$mus[fa_mus_id]?>"></td>
                                            <td>
                                                <i class="md_bi bi bi-trophy-fill mavi mus_atlat" id="<?=$mus[fa_mus_id]?>" fid="<?=$fid?>" ks="blue" 
                                                data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$mus[fa_mus_id]?>" style="cursor:cell; float:right;"></i>
                                            </td>
                                        </tr>
                                    </table>                                       
                                    
                                    <table class="eksi_bolum" width="100%" style="display:none;">
                                        <tr>
                                            <td>
                                                <i class="bi bi-arrow-down-square-fill kirmizi eksilt" id="<?=$mus[fa_mus_id]?>" fid="<?=$fid?>" ks="red"  
                                                data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$mus[fa_mus_id]?>" style="cursor:cell;"></i>
                                            </td>
                                            <td class="eksilt_<?=$mus[fa_mus_id]?>"></td>
                                            <td>
                                                <i class="bi bi-arrow-down-square-fill mavi eksilt" id="<?=$mus[fa_mus_id]?>" fid="<?=$fid?>" ks="blue" 
                                                data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$mus[fa_mus_id]?>" style="cursor:cell; float:right;"></i>
                                            </td>
                                        </tr>
                                    </table>                                

                                </div>


                                
                            </td>
                            <td>
                                <?php
                                    $yanucsql = DB::prepare("SELECT uy.ad,uy.soyad
                                    FROM fa_mus_gorev AS fmg 
                                    JOIN fa_gorevli AS fg ON (fg.fa_gorevli_id = fmg.fa_gorevli_id)
                                    JOIN uye AS uy ON (uy.uye_id = fg.uye)
                                    WHERE  fmg.fid = ? AND fg.fid = ? AND fmg.fa_mus_id = ? AND fmg.yer = 3 ");
                                    $yanucsql->execute(array($fid,$fid,$mus_id));
                                    $yan3 = $yanucsql->fetch(PDO::FETCH_ASSOC);	
                                    ?>    

                                <div class="yan3 hkm" align="center"><?=$yan3[ad]?> <?=$yan3[soyad]?></div>
                            </td>
                        </tr>
                            	

                            <tr>
                                <td>&nbsp;</td>
                                <td valign="middle">
                                
                            <?php  
                        $skordrmsqll = DB::prepare("SELECT * FROM fa_mus_skor WHERE fid = ?  AND mus_id = ? AND ring_id = ? AND drm > 0 ");
                        $skordrmsqll->execute(array($fid, $mus_id, $ring_id));
                        $mus_skor_drm_say = $skordrmsqll->rowCount();		
                        if($mus_skor_drm_say == 0)
                        {
                            ?>
                        
                            <!-- kontrol panel   -->
                            <div class="col-lg-12" style="">
                                <div class="card p-1">
                                <div class="card-body p-0 clearfix" style="text-align:center;"> 

                                <i class="md_bi bi bi-play-btn-fill yonet basla float-start " id="<?=$akt_mus[id]?>" fid="<?=$fid?>" mus_id="<?=$id?>" ring_id="<?=$ring_id?>" poz="1" ne="poz"
                                style=" position:absolute; left:3px; top:-6px; font-size:2em; <?php if($mus_aktif_say > 0 && $akt_mus[mid] != $mus_id){?>display:none; <?php }?> "></i>
                                
                                <i class="md_bi bi bi-pause-btn-fill yonet mola float-start " id="<?=$akt_mus[id]?>" fid="<?=$fid?>" mus_id="<?=$id?>" ring_id="<?=$ring_id?>" poz="2" ne="poz" 
                                style=" position:absolute; left:50px; top:-6px; font-size:2em; <?php if($mus_aktif_say > 0 && $akt_mus[mid] != $mus_id){?> display:none; <?php }?> "></i>


                                <i class="md_bi m-2 bi bi-volume-up-fill gong"></i>        

                                <span class="arti_eksi_bit" style=" <?php if($mus_aktif_say > 0 && $akt_mus[mid] != $mus_id){?>display:none; <?php }?>">                                              
                                    <i class="md_bi bi bi-plus-circle-fill arti" style="font-size:1.2em; cursor:cell;"></i>
                                    <i class="md_bi bi bi-trophy-fill m-2 bitir" style="font-size:1.2em; cursor:cell;"></i>
                                    <i class="md_bi bi bi-dash-circle-fill eksi" style="font-size:1.2em; cursor:cell;"></i>  
                                </span>
                                                                           
                        
                                <i class="md_bi m-2 bi bi-volume-up ding"></i>


                                <?php 
                                if($mus_aktif_say == 0){
                                ?>
                                    <i class="yonet yonet_akt oynayan float-end md_bi bi bi-caret-up-square-fill" id="<?=$akt_mus[id]?>" fid="<?=$fid?>" mus_id="<?=$id?>" ring_id="<?=$ring_id?>" 
                                    poz="0" ne="akt" style="position:absolute; right:10px; font-size:1.7em;"></i>
                                <?php  
                                }else{ 
                                    if($akt_mus[mid] != $mus_id){
                                    ?> 
                                        <i class="yonet yonet_akt vurgula float-end md_bi bi bi-caret-up-square-fill" id="<?=$akt_mus[id]?>" fid="<?=$fid?>" mus_id="<?=$id?>" ring_id="<?=$ring_id?>" 
                                        poz="0" ne="akt" style="position:absolute; right:10px; font-size:1.7em;"></i>       
                                    <?php 
                                    } 
                                }
                                ?>
                                </div>
                                </div>
                            </div> 
                            
                            <?php
                        }
                            ?>  
                            
                                </td>
                                <td>&nbsp;</td>
                            </tr>

                    </table>                    


                </td>
                <td width="40%" height="100%">
                    
                <iframe src="mod/faaliyet/musabaka/skor_rapor.php?f=<?=$fid?>&r=<?=$ring_id?>&m=<?=$mus_id?>&md=1" scrolling="yes" width="100%" height="400"></iframe> 
                            


                </td>
            </tr>
        </table>

                        <div class="">
                            <?php
                            $RGmusgorvsql =  "SELECT * FROM fa_mus_gorev WHERE fid = ? AND fa_mus_id = ? ORDER BY yer ASC ";
                            $RGgorparams = array($fid, $mus_id);	
                            $RGgorstmt = DB::prepare($RGmusgorvsql);
                            $RGgorstmt->execute($RGgorparams);
                            foreach($RGgorstmt as $mgor)
                            {
                                $fagorevlisql = DB::prepare("SELECT * FROM fa_gorevli WHERE fa_gorevli_id = ? ");
                                $fagorevlisql->execute(array($mgor->fa_gorevli_id));
                                $fagr = $fagorevlisql->fetch(PDO::FETCH_ASSOC);	

                                $uyesqlli = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
                                $uyesqlli->execute(array($fagr[uye]));
                                $uy = $uyesqlli->fetch(PDO::FETCH_ASSOC);		 
                                
                                if($uy[resim]){ 
                                    if (file_exists($uy[resim])){$uye_resim = $uy[resim];
                                    }else{$uye_resim = "assets/img/img_avatar$uy[cin].png";}
                                }else{ $uye_resim = "assets/img/img_avatar$uy[cin].png";
                                }
                                            
                                $uyeyerisql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
                                $uyeyerisql->execute(array($mgor->uye));
                                $yr = $uyeyerisql->fetch(PDO::FETCH_ASSOC);		
                                
                                if($fa[temsil] == "uye"){
                                    $Gtms_yer_ad = _bireysel;
                                }else{
                                    $tms_id_son = "_id";
                                    $tms_idne = "$fa[temsil]$tms_id_son";
                                    $Gtemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
                                    $Gtemssql->execute(array($uy[$fa[temsil]]));
                                    $Gtms = $Gtemssql->fetch(PDO::FETCH_ASSOC);
                                                                        
                                    $Gtms_ad_son = "_ad";
                                    $Gtms_adne = "$fa[temsil]$Gtms_ad_son";
                                    $Gtms_yer_ad = "$Gtms[$Gtms_adne]";                            
                                }
                                ?>
                                <div class="mgs_ mgs_<?=$mgor->fa_gorevli_id?>" data-bs-toggle="tooltip" data-bs-title="ad soyad">
                                    <img src="<?=$uye_resim?>" 
                                    class="z-3 img-fluid mus_gorevli_sec" t="fa_gorevli" k="kont" ring="<?=$mgor->ring?>" id="<?=$mgor->fa_gorevli_id?>" fid="<?=$fid?>"  
                                        alt="" style="max-height:70px;" />

                                        <div class="p-0 m-0" style="font-size:0.6em; color: #000000"> 
                                            <div><?=mb_substr($uy[ad],0,10, 'UTF-8')?></div>
                                            <div><?=mb_substr($uy[soyad],0,10, 'UTF-8')?></div>
                                            <div><?=mb_substr($Gtms_yer_ad,0,10, 'UTF-8')?></div>  
                                        </div>
        
                                        <select class="form-select input_edt_str p-0 m-0" 
                                            t="fa_mus_gorev" k="yer" id="<?=$mgor->fa_mus_gorev_id?>" ex="" 
                                            aria-label="Default select example" style="font-size:0.8em; width: 80px;">
                                            <option value="0"><?=_sec?></option>
                                            <option value="1" <?php if($mgor->yer == 1){?> selected<?php }?>>1.<?=_yan?></option>
                                            <option value="2" <?php if($mgor->yer == 2){?> selected<?php }?>>2.<?=_yan?></option>
                                            <option value="3" <?php if($mgor->yer == 3){?> selected<?php }?>>3.<?=_yan?></option>
                                            <option value="4" <?php if($mgor->yer == 4){?> selected<?php }?>><?=_orta?></option>
                                            <option value="5" <?php if($mgor->yer == 5){?> selected<?php }?>>1.<?=_juri?></option>
                                            <option value="6" <?php if($mgor->yer == 6){?> selected<?php }?>>2.<?=_juri?></option>
                                            <option value="5" <?php if($mgor->yer == 7){?> selected<?php }?>>3.<?=_juri?></option>

                                        </select> 
                                            <span class="eski_fa_mus_gorev_yer_<?=$mgor->fa_mus_gorev_id?>" style="positon: absolute;"></span>  

                                                                            
                                    
                                    <span class="gorev_fa_gorevli_kont_<?=$fid?>_<?=$mgor->fa_gorevli_id?>" style="position:absolute;"></span>  
                                </div>    
                                <?php
                                }
                            ?>
                        </div>   

    </div>




    <div align="center" style="panding:10px;"></div>
       
<?php
} 
?>
