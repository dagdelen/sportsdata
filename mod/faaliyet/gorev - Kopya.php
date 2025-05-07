	
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





