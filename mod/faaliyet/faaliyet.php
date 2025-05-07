<script>
$(document).ready(function () {

	$(".ring_belirle").change(function(){
		var element = $(this);
        var id = element.attr("id");
        var fid = element.attr("fid");
        var t = element.attr("t");
        var k = element.attr("k");
        var rl = element.attr("rl");
        var wo = element.attr("wo");
		var dg = $(this).val();
		
		$(".eski_"+t+"_"+k+"_"+id).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'ring_belirle=' + id + '&fid=' + fid  + '&t=' + t  + '&k=' + k + '&dg=' + dg + '&rl=' + rl + '&wo=' + wo;

		$.ajax({
			type: "POST",
			url: "ajx.php",
			data: info,
			success: function(html){
				$(".eski_"+t+"_"+k+"_"+id).html(html).show();
			}
		});	
	});

    $(".toggle").click(function(){ 
		var element = $(this);
        var id = element.attr("id");
		$(".toggle_list"+id).toggle(); 
	});

	 
    $(".grv_mola_inp").click(function(){ 

		$(this).select();
	});

        /* 
	$(".mouseover").mouseover(function(){ 
		var element = $(this);
        var id = element.attr("id");
        var t = element.attr("t");
        var k = element.attr("k");
        var ring = element.attr("ring");
		$(".mouseover_"+t+"_"+k+"_"+ring+"_"+id).slideDown();
	});

	$(".mouseover").mouseout(function(){
		var element = $(this);
        var id = element.attr("id");
        var t = element.attr("t");
        var k = element.attr("k");
        var ring = element.attr("ring");
		$(".mouseover_"+t+"_"+k+"_"+ring+"_"+id).slideUp();
	});
        */
	$(".mus_gorev_ver").change(function(){
		var element = $(this);
        var id = element.attr("id");
        var fid = element.attr("fid");
        var ring = element.attr("ring");
        var t = element.attr("t");
        var k = element.attr("k");
        var rl = element.attr("rl");
        var wo = element.attr("wo");
		var gor = $(".gorev_verilen").val();
		var basla = $(".basla"+ring).val();
		var gorev = $(".gorev"+ring).val();
		var mola = $(".mola"+ring).val();

		isChecked = $(this).is(':checked')
		if(isChecked){var dg = 1;}else{var dg = 2;}

		isChecked = $(".ayni_bolge"+ring).is(':checked')
		if(isChecked){var blg = 1;}else{var blg = 2;}
				
		

		$(".gorev_"+t+"_"+k+"_"+ring+"_"+id).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'mus_gorev_ver=' + id + '&fid=' + fid  + '&t=' + t  + '&k=' + k + '&ring=' + ring + '&dg=' + dg + '&rl=' + rl + '&wo=' + wo + '&gor=' + gor + '&blg=' + blg + '&basla=' + basla + '&gorev=' + gorev + '&mola=' + mola;

		$.ajax({ 
			type: "POST",
			url: "ajx.php",
			data: info,
			success: function(html){
				$(".gorev_"+t+"_"+k+"_"+ring+"_"+id).html(html).show();
			}
		});	
	});

	$(".mus_gorevli_sec").click(function(){
		var element = $(this);
        var id = element.attr("id");
        var t = element.attr("t");
        var k = element.attr("k");
        var fid = element.attr("fid");
        var ring = element.attr("ring");
		
		$(".gorev_verilen").val(id);
		$(".mus_gor_che").show();
		$(".ayni_bolge_ch").show();
		

		$(".mus_gor_che").prop('checked',false); 
		$(".mgs_").removeClass("mgs");
		$(".mgs_"+id).addClass("mgs");
		
		$(".toggle_kat").slideUp();

		$(".toggle_list").slideUp();
		$(".toggle_list"+ring).slideDown();

		
		
		$(".gorev_"+t+"_"+k+"_"+fid+"_"+id).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'mus_gorev_ver=' + id + '&fid=' + fid  + '&t=' + t  + '&k=' + k;

		$.ajax({
			type: "POST",
			url: "ajx.php",
			data: info,
			success: function(html){
				$(".gorev_"+t+"_"+k+"_"+fid+"_"+id).html(html).show();
			}
		});	
		
	});

	$(".mus_yan_cihaz").change(function(){
		var element = $(this);
        var id = element.attr("id");
        var s = element.attr("s");
        var t = element.attr("t");
        var k = element.attr("k");
        var rl = element.attr("rl");
        var wo = element.attr("wo");
		var kod = $(this).val();
		var ring = element.attr("r");
				
		// $(".cihaz_"+t).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		$(".cihaz_"+t+"_"+k+"_"+id+"_"+s).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'mus_yan_cihaz=' + id + '&t=' + t  + '&k=' + k + '&rl=' + rl + '&wo=' + wo + '&kod=' + kod + '&s=' + s + '&ring=' + ring;

         $.ajax({
            type: "POST",
            url: "ajx.php",
            data: info,
            success: function(html){
               $(".cihaz_"+t+"_"+k+"_"+id+"_"+s).html(html).show();
            }
         });

	   });


});
</script>
<style>
    .satir{ border-bottom:solid 1px#dddddd; padding:0; margin:1px; font-size:0.9em; background-color:#FFF;}
	.satir:hover{background-color:rgb(241, 243, 213);}
	.mgs_{display:inline-block; border:solid 2px #CCC; padding: 3px; margin: 2px; border-radius: 8px 8px 0 0;}
	.mgs_ img{border-radius: 8px 8px 0 0;}
	
	.mgs{border:solid 2px #05cf20;}
</style>	
<?php

if($_GET[m]){
	if($_GET[e]){ $fid = $_GET[e]; }
		include("mod/faaliyet/$_GET[m].php");
	
}else{
	if($_GET[e] > 0){
		
	$fid = $_GET[e];
	
	if($yetki == "patron"){
	$fayetkikontsql = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
	$fayetkikontsql->execute(array($fid));
	}else{
	$fayetkikontsql = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? AND $amir = ? AND  yetki = ? AND yetki_id = ? ");
	$fayetkikontsql->execute(array($fid, $amir_id, $yetki, $yetki_id));
	}
	
        /* 
            if($fayetkikontsql->rowCount() == 0){echo "<script>window.location='/?mod=faaliyet'</script>";}
        */	
 
	if($fayetkikontsql->rowCount() > 0){ $fa_edt = 1; }else{ $fa_edt = 0; }
 

	if($yetki == "patron"){
	$faaliyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
	$faaliyetsqll->execute(array($fid));
	}else{
	$faaliyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? AND $yer = ? ");
	$faaliyetsqll->execute(array($fid, $yer_id));
	} 
 
	$fa = $faaliyetsqll->fetch(PDO::FETCH_ASSOC);
	
		if($fa_edt == 1)
		{ 
		
            // ne 1 musabaka, 2 kurs
            if($fa[ne] == 1){$fa_ne = "musabaka";}
            if($fa[ne] == 2){$fa_ne = "kurs";}
            ?>
            <div class="col-lg-12 m-auto">
                <div class="card">
                <div class="card-body mt-3 mb-0">
                
                    <div class="mb-0"><?=$fa[faaliyet_ad]?></div>
                    
                <a href="/?mod=faaliyet&e=<?=$_GET[e]?>" class="btn btn-outline-success btn-sm <?php if(!$_GET[d]){?> active <?php }?> "><?=_Genel?></a>
                <a href="/?mod=faaliyet&e=<?=$_GET[e]?>&d=gorevli" class="btn btn-outline-success btn-sm <?php if($_GET[d]=="gorevli"){?> active <?php }?> "><?=_Gorevler?></a>
                <a href="/?mod=faaliyet&e=<?=$_GET[e]?>&d=program" class="btn btn-outline-success btn-sm <?php  if($_GET[d]=="program"){?> active <?php  }?> "><?=_Program?></a>
        
                <?php  if($fa[ne] == 1){ ?>
                <a href="/?mod=faaliyet&e=<?=$_GET[e]?>&d=kategori" class="btn btn-outline-success btn-sm <?php  if($_GET[d]=="kategori"){?> active <?php  }?> "><?=_Kategori?></a>
                <a href="/?mod=faaliyet&e=<?=$_GET[e]?>&d=ring" class="btn btn-outline-success btn-sm <?php  if($_GET[d]=="ring"){?> active <?php  }?> "><?=_Ring?></a>
                <a href="/?mod=faaliyet&e=<?=$_GET[e]?>&d=raund" class="btn btn-outline-success btn-sm <?php  if($_GET[d]=="raund"){?> active <?php  }?> "><?=_Raund?></a>
                <?php  }?>                
                
                </div>
                </div>
            </div>
            <?php  
        }	
            ?>


			<?php
				if(!$_GET[d]){
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
				}else if($_GET[d]){
					
					include("mod/faaliyet/$fa_ne/$_GET[d].php");
				
				}
			?>
        
		    <?php			
			
			
		}else{
	
	include("mod/faaliyet/faaliyet_liste.php");
	}
}
					