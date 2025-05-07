	
<style>
    .yukselt{height:500;}
    .display td
    {
        text-overflow:ellipsis; 
        overflow:hidden; 
        white-space:nowrap;
        position: relative;
        max-width:100px;
    }
    .sigdir{
        overflow:hidden; 
        white-space:nowrap;
        position: relative;
        }
        
    .sampR{color:#00a693;}
    .sampBC, .bc0{background-color:#00a693;}

    .turfinR{color:#967bb6;}
    .turfinBC, .bc1{background-color:#967bb6;}

    .turyarR{color:#eb7e1a;}
    .turyarBC, .bc2{background-color:#eb7e1a;}

    .turceyR{color:#12c8bc;}
    .turceyBC, .bc3{background-color:#12c8bc;}

    .tur2R{color:#ca9282;}
    .tur2BC, .bc4{background-color:#ca9282;}

    .tur1R{color:#000000;}
    .tur1BC, .bc5{background-color:#000000;}

    .uturu{font-size:1.2em;}

    .opac1{opacity:0.1;}
    .opac2{opacity:0.2;}
    .opac3{opacity:0.3;}
    .opac4{opacity:0.4;}
    .opac5{opacity:0.5;}
    .opac6{opacity:0.6;}
    .opac7{opacity:0.7;}
    .opac8{opacity:0.8;}
    .opac9{opacity:0.9;}
    .opac10{opacity:1;}

    .sira div{display:inline-block;}
    .handle{cursor:cell; display:none; font-size:1.5em; color:#D9D900; margin-right:10px;}
    .handle:hover{color:#990000;}
    .sp_ad{    
        text-overflow:ellipsis; 
        overflow:hidden; 
        white-space:nowrap;
        position: relative;
        width:200px;
    }
    .sp_yer{    
        /*text-overflow:ellipsis; */
        overflow:hidden; 
        white-space:nowrap;
        position: relative;
        width:100px;
    }
    .ad_ara_list{
       /* border:solid 1px #336699; */
        -webkit-box-shadow: 2px 2px 10px 4px #ddd;  /* Safari 3-4, iOS 4.0.2 - 4.2, Android 2.3+ */
        -moz-box-shadow:    2px 2px 10px 4px  #ddd;  /* Firefox 3.5 - 3.6 */
        box-shadow:         2px 2px 10px 4px  #ddd; 
        border-radius: 10px;
    }

</style>
<script>
  $(document).ready(function () {
	
	$(".btn_super_user").click(function(){
		$(".super_user").toggle();
	});	
	$(".sirala").click(function(){
		var element = $(this);
        var id = element.attr("id");
		$(".handle").hide();
		$(".handle"+id).toggle();
	});	
	$(".saat_prg").click(function(){
		var element = $(this);
        var id = element.attr("id");
		//$(".saat_prg_").hide();
		$(".saat_prg_"+id).toggle();
	});	
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
	$(".saat").click(function(){
		var element = $(this);
        var fid = element.attr("fid");
        var ring = element.attr("ring");
        var prg = element.attr("prg");
        var gun = element.attr("gun");
		  
		  $(this).addClass("opac4");// .hide(300);;
          $(".saat_prg_").hide();
		  
		$("#info"+ring).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'fid=' + fid + '&ring=' + ring + '&prg=' + prg + '&gun=' + gun;

		$.ajax({
			type: "POST",
			url: "mod/faaliyet/gorev/prg/saat.php",
			data: info,
			success: function(html){
				$("#info"+ring).html(html).show();
			}
		});	
	});
	$(".mus_geri").click(function(){
		var element = $(this);
        var id = element.attr("id");
        var fid = element.attr("fid");
        var ks = element.attr("ks");
	    /* 
		var cf = element.attr("cf");
		var eminmisin = confirm(cf);
		if (eminmisin) {
		}	
		
	    */		
	    $(".geri_").html("");
	
			$(".geri_"+id).html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
			var info = 'mus_geri=' + id + '&fid=' + fid  + '&ks=' + ks;
				$.ajax({
					type: "POST",
					url: "ajx.php",
					data: info,
					success: function(html){
						$(".geri_"+id).html(html).show();
					}
				});	
		

	});
	$(".localhost").click(function(){
		var element = $(this);
        var fid = element.attr("fid");
        var ring = element.attr("id");
        var dr = element.attr("dr");

		  $(this).addClass("opac4"); 
		  
		$("#info"+ring).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'fid=' + fid + '&ring=' + ring + '&dr=' + dr;

		$.ajax({
			type: "POST",
			url: "mod/faaliyet/gorev/prg/local_indir.php",
			data: info,
			success: function(html){
				$("#info"+ring).html(html).show();
			}
		});	
	});
		
		
  });
</script>
<?php
$fid = $_GET[e];
$gad = $_GET[g];

	$ufgorevlimi = DB::prepare("SELECT * FROM fa_gorevli WHERE uye = ? ");
	$ufgorevlimi->execute(array($uye));
	if($ufgorevlimi->rowCount() == 0){echo "<script>window.location='/?mod=faaliyet'</script>";}	
	//$fgr = $ufgorevlimi->fetch(PDO::FETCH_ASSOC);
	if(!$_GET[e])
	{
        ?>
        <div class="col-lg-12 m-0">
          <div class="card">
            <div class="card-body mt-3 mb-0">
                <?php
                foreach($ufgorevlimi as $bgr)
                {
                    $lfaaliyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
                    $lfaaliyetsqll->execute(array($bgr->fid));
                    $lfa = $lfaaliyetsqll->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div style="border-bottom:solid 1px #336699;">
                        <a href="/?mod=faaliyet&m=gorev&e=<?=$bgr->fid?>"><?=$lfa[faaliyet_ad]?></a>
                    </div>	
                    <?php
                }
                ?>
            </div>
          </div>
        </div>
        <?php
	} 

	$faaliyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
	$faaliyetsqll->execute(array($fid));
	$fa = $faaliyetsqll->fetch(PDO::FETCH_ASSOC);
	
	$faaliyetadmsisqll = DB::prepare("SELECT ad,soyad FROM uye WHERE uye_id = ? ");
	$faaliyetadmsisqll->execute(array($fa[admin]));
	$fadm = $faaliyetadmsisqll->fetch(PDO::FETCH_ASSOC);
	
	$faaliyetgorevsqll = DB::prepare("SELECT * FROM fa_gorevli WHERE fid = ? AND uye = ? ");
	$faaliyetgorevsqll->execute(array($fid, $uye));
	$fag = $faaliyetgorevsqll->fetch(PDO::FETCH_ASSOC);

	if($fa[kimler] == "uye"){$fa_kimler = _uye;}
	if($fa[kimler] == "sporcu"){$fa_kimler = _sporcu;}
	if($fa[kimler] == "antrenor"){$fa_kimler = _antrenor;}
	if($fa[kimler] == "hakem"){$fa_kimler = _hakem;}

if($faaliyetgorevsqll->rowCount() > 0){
	?>	
 <div class="col-lg-12 m-0">
	<div class="card">
        <div class="card-body mt-3 mb-0">
            <h5>
                <?=$fa[faaliyet_ad]?>
                <small><small><i>(<?=date( 'd.m.Y', strtotime($fa[baslama]))?> - <?=date( 'd.m.Y', strtotime($fa[bitis]))?> )</i></small></small>
            </h5>          
            <div <?php  if($_GET[g] == "prg" && $_GET[rn] > 0 && $_GET[gn] > 0){?> style="display:none;" <?php  }?>  >    
            
                    <a class="btn btn-outline-success btn-sm btn_super_user float-end">?</a>
                    <?php  if($fa[admin] == $uye && ($gad == "fed" || $gad == "dok" || $gad == "tar")){ ?> 
                        
                        <!--  ÇOK ÖNEMLİ  rl="1" -->
                        <div class="form-check form-switch super_user float-end" style="font-size:1.2em; display:none;">
                            <input class="form-check-input check_all" t="fa_uye" k="<?=$gad?>" id="<?=$fid?>" rl="1" cf="emimmisin bunu geri dönüşü yok!!!" type="checkbox"  />
                            
                            <div class="all_fa_uye_<?=$gad?>_<?=$fid?>" style="  "> 
                                <?=_tumune_islem_yap?>
                            </div> 
                        </div>  
                        
                        
                    <?php  }else{ ?>      
                        <a class="btn btn-outline-success btn-sm super_user float-end" style="display:none;">
                            <i><?=mb_substr($fadm[ad],0,3, 'UTF-8')?>*** <?=mb_substr($fadm[soyad],0,3, 'UTF-8')?>***</i> <b><?=_Cagir?></b>
                        </a>
                    <?php  } ?>      

            
            
                    <?php  
                    if($fag[fed] > 0){ ?>                       
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=fed" class="btn btn-outline-success btn-sm <?php  if($gad == "fed"){?> active <?php  }?> "><?=_Akredite?></a>
                    <?php  }?>

                    <?php  if($fag[oda] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=oda" class="btn btn-outline-success btn-sm <?php  if($gad == "oda"){?> active <?php  }?> "><?=_Konaklama?></a>
                    <?php  }?>
                    <?php  if($fag[dok] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=dok" class="btn btn-outline-success btn-sm <?php  if($gad == "dok"){?> active <?php  }?> "><?=_Doktor?></a>
                    <?php  }?>
                    <?php  if($fag[tar] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=tar" class="btn btn-outline-success btn-sm <?php  if($gad == "tar"){?> active <?php  }?> "><?=_Tarti?></a>
                    <?php  }?>
                    <?php  if($fag[kur] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=kur" class="btn btn-outline-success btn-sm <?php  if($gad == "kur"){?> active <?php  }?> "><?=_Kura?></a>
                    <?php  }?>
                    <?php  if($fag[ayr] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=ayr" class="btn btn-outline-success btn-sm <?php  if($gad == "ayr"){?> active <?php  }?> "><?=_Ayar?> <small>(<?=_Saha?>)</small></a>
                    <?php  }?>
                    
                    <?php  if($fag[pln] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=pln" class="btn btn-outline-success btn-sm <?php  if($gad == "pln"){?> active <?php  }?> "><?=_Plan?> <small>(<?=_Ring?>)</small></a>
                    <?php  }?>
                    <?php  if($fag[prg] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=prg" class="btn btn-outline-success btn-sm <?php  if($gad == "prg"){?> active <?php  }?> "><?=_Plan?> <small>(<?=_Gun_Saat?>)</small></a>
                    <?php  }?>
                    
                    
                        <?php  if($fag[gor] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=gor" class="btn btn-outline-success btn-sm <?php  if($gad == "gor"){?> active <?php  }?> "><?=_Gorevler?></a>
                    <?php  }?>

                    <?php  if($fag[pln] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=local" class="btn btn-outline-success btn-sm <?php  if($gad == "local"){?> active <?php  }?> ">localhost</a>
                    <?php  }?>    
                    
                    <?php  if($fag[gor] > 0){ ?>
                        <a href="/?mod=faaliyet&m=<?=$_GET[m]?>&e=<?=$fid?>&g=mac" class="btn btn-outline-success btn-sm <?php  if($gad == "mac"){?> active <?php  }?> "><?=_Musabaka?></a>
                    <?php  }?>
            

                    <?php if($_GET[g] != "local"){ ?>         
                            <div class="m-2">   
                                <?php
                                $faringgsql =  "SELECT * FROM fa_mus_ring WHERE fid = ? ";
                                $frngparams = array($fid);	
                                $frgstmt = DB::prepare($faringgsql);
                                $frgstmt->execute($frngparams);
                                foreach($frgstmt as $frng)
                                { 	
                                    $famusgunlersql =  "SELECT * FROM fa_mus WHERE fid = ? AND ring = ? AND gun > -1 AND blue > 0 GROUP BY gun";
                                    $musgparams = array($fid, $frng->fa_mus_ring_id);	
                                    $musgstmt = DB::prepare($famusgunlersql);
                                    $musgstmt->execute($musgparams);
                                    foreach($musgstmt as $msgun)
                                    {
                                        
                                        $gunmussqysql = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND ring = ? AND gun = ?  AND blue > 0 AND d > -1 ");
                                        $gunmussqysql->execute(array($fid, $frng->fa_mus_ring_id, $msgun->gun));
                                        $msbk_say = $gunmussqysql->rowCount();	  	
                                        ?>
                                    
                                        <a href="/?mod=faaliyet&m=gorev&e=<?=$fid?>&g=mac&rn=<?=$frng->fa_mus_ring_id?>&gn=<?=$msgun->gun?>" 
                                            class="btn btn-outline-success btn-sm position-relative m-1 <?php  if($gad == "mac" && $_GET[rn] == $frng->fa_mus_ring_id && $_GET[gn] == $msgun->gun){?> active <?php  }?> ">
                                                <?=$frng->fa_mus_ring_ad?> <?=$msgun->gun?>
                                                
                                            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                <?=$msbk_say?>
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                                
                                        </a>  
                                        <?php
                                    }
                                        if($musgstmt->rowCount() > 0){
                                            $sonmusqli = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND ring = ? AND tur = 0 ");
                                            $sonmusqli->execute(array($fid, $frng->fa_mus_ring_id));
                                            $musn = $sonmusqli->fetch(PDO::FETCH_ASSOC);
                                            $sonmu_say = $sonmusqli->rowCount();
                                            if($sonmu_say > 0){
                                            ?>
                                            <a href="/?mod=faaliyet&m=gorev&e=<?=$fid?>&g=mac&rn=<?=$frng->fa_mus_ring_id?>&gn=son" 
                                                class="btn btn-outline-success btn-sm position-relative m-1 <?php  if($gad == "mac" && $_GET[rn] == $frng->fa_mus_ring_id && $_GET[gn] == "son"){?> active <?php  }?> " style="margin:1px;">
                                                    <?=$frng->fa_mus_ring_ad?> <?=_sonuc?>
                                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                                        <?=$sonmu_say?>
                                                        <span class="visually-hidden">unread messages</span>
                                                    </span>
                                            </a>
                                                <?php
                                                }
                                                ?>
                                            <div> </div> 
                                            <?php
                                        }
                                }
                                ?>
                            </div>
                    <?php } ?>    

            </div>
            

        </div>
	</div>
 </div>
	<?php
		if (file_exists("mod/faaliyet/gorev/$gad.php")) 
		{
			if($gad != "gor" && $gad != "prg")
			{
                ?>
                <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body mt-3 mb-0">
                                            
                                <?php
                                if($gad == "fed" || $gad == "oda" || $gad == "dok" || $gad == "tar" || $gad == "kur"){
                                    include("mod/faaliyet/gorev/datatable/gorev_datatable.php");
                                }
                                    
                                    include("mod/faaliyet/gorev/$gad.php"); 
                                ?> 
                            </div>
                        </div>
                    </div>
                <?php 
			
			}
			else
			{

							if($gad == "fed" || $gad == "oda" || $gad == "dok" || $gad == "tar" || $gad == "kur"){
								include("mod/faaliyet/gorev/datatable/gorev_datatable.php");
							}
								
								include("mod/faaliyet/gorev/$gad.php"); 

				
			}
		}
		else
		{
			?>
			<div class="col-lg-8 m-auto">
				<div class="card">
					<div class="card-body">
						<?php
						include("mod/faaliyet/inc/fa_form.php");
						?>
					</div>
				</div>
			</div>
			<?php
		}
}
    ?>





