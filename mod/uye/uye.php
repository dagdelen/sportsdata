<script>
$(document).ready(function () {

    $(".yeni_ekle").click(function(){
        $(".yeni_ekle_div").toggle();
    });	
    
	$(".brans_input").change(function(){
		var element = $(this);
        var brans = $(this).val();
		  
		$(".stil_sec").html('<div class="spinner-border" style="width: 3rem; height: 3rem; position:absolute;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'brans=' + brans;//  + '&t=' + t  + '&k=' + k + '&dg=' + dg + '&rl=' + rl + '&wo=' + wo;
				
		$.ajax({
			type: "POST",
			url: "ajx.php"
			,data: info,
			success: function(html){
				$(".stil_sec").html(html).show();
			}
		});	
	
		
	});

});
</script>




<?php


if($_GET[m] == "list"){
	if(!$yetki){echo "<script>window.location='/'</script>";}

	$kim = "uye";	
	$kim_ad = ""._Uye."";	
}else if($_GET[m] == "sporcu"){
	if(!$yetki){echo "<script>window.location='/'</script>";}

	$kim = "sporcu";	
	$kim_ad = ""._Sporcu."";	
}else if($_GET[m] == "antrenor"){
	if(!$yetki){echo "<script>window.location='/'</script>";}

	$kim = "antrenor";	
	$kim_ad = ""._Antrenor."";	
}else if($_GET[m] == "hakem"){
	if(!$yetki){echo "<script>window.location='/'</script>";}

	$kim = "hakem";	
	$kim_ad = ""._Hakem."";	
}


if($_GET[e] > 0){
	?>
     <div class="row">
     <?php
     include("mod/uye/inc/uye_bilgileri.php");
	 
	 ?>
     </div>
    <?php	
}




 if($_GET[m] == "list" || $_GET[m] == "sporcu" || $_GET[m] == "antrenor" || $_GET[m] == "hakem")
 {
?>
<style>
    .derece_ad
    {
    /* text-overflow:ellipsis; */
        overflow:hidden; 
        white-space:nowrap;
        position: relative;
        max-width:50px;
    }
    .kulup_ad
    {
    /*
        display:inline-block;
        */
        text-overflow:ellipsis; 
        
        overflow:hidden; 
        white-space:nowrap;
        position: relative;
        max-width:80px;
        /* 
        float:left;
        
        */

    }
	
    .tooltipim{color:#F00; position:absolute; right:5px; top:0; font-size:0.9em;} /*   GEÇİCİ SİLİNECEKKKKKKKKKKKKKKKKK       */
</style>
<section class="section m-0 p-0">
	<div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                            
            <!--  yeniekle -->             
            <div class="input-group mt-3 mb-1 z-5">
            
                <div class=" w-50 resim_div mb-1 p-1">
                    <h1 class="mt-2"><?=$kim_ad?> <span><?=_liste?></span></h1>
                </div>
            
                <div class=" w-50 resim_div mb-1 p-1">
                    <div class="clearfix" > 
                    <?php  if($_GET[m] == "list"){?>
                           <button type="button" class="kalan_modal btn btn-success float-end mt-3 yeniekle" 
                           data-bs-target="#kalan_modal" m="uye" t="<?=$kim?>" k="" id="" ad="<?=_Yeni?> <?=$kim_ad?>" data-bs-toggle="modal">
                                <?=$kim_ad?> <?=_Ekle?> <i class="bi bi-plus-square"></i>
                           </button>
                     <?php  }else{?>
                        <button type="button" class="btn btn-success float-end mt-3 yeni_ekle">
                            <?=_Ekle?> <i class="bi bi-plus-square"></i>
                        </button>  
                     <?php  }?>                
                    </div>
                </div>             
            
            </div>
            <!--  yeni_ekle_div 
               <?=$amir?> <?=$amir_id?>-->
            <div class="row yeni_ekle_div" style="display:none;">
             <div class="col-lg-8">
             <div class="input-group">
             
                <div class="form-floating w-25">
                    <select class="form-select brans_input" aria-label="Default select example">
                       <option value="0"><?=_Brans?></option> 
                        <?php
                        if($dunya_derece == 1)
                        {
                            $ybrssql =  "SELECT * FROM brans WHERE dunya = ?";
                            $ybrsparams = array($buyr[dunya]);
                        }else{
                            $ybrssql =  "SELECT * FROM brans WHERE $amir = ?";
                            $ybrsparams = array($amir_id);	   
                        }

                        $ybrsstmt = DB::prepare($ybrssql);
                        $ybrsstmt->execute($ybrsparams);
                        foreach($ybrsstmt as $ybrs)
                        {
                        ?>
                            <option value="<?=$ybrs->brans_id?>" <?php  if($ybrs->brans_id == $brans){?>selected<?php  }?> ><?=$ybrs->brans_ad?></option>
                        <?php
                        }
                        ?>
                    </select>     
                    <!--<input type="text" value="<?=$brans?>" class="form-control brans_input">-->
                    <label class="z-0"><?=_Brans?></label>
                </div> 
             
                <div class=" form-control w-25 p-0">
                   <span class=" stil_sec"></span> 

                           <input type="hidden" value="" class="stil_input">
                </div> 
                    
                <div class="form-floating w-50">
                  <input type="text" value="" class="form-control input_ara_ekle"
                   t="<?=$kim?>" k="uye" mod="<?=$_GET[mod]?>" m="<?=$_GET[m]?>" id="<?=$uye?>" style="border:solid 1px #060;" >
                  <label for="ekle"><?=_eklemek_icin_uye_ara?> </label>  
                  <!--   <span class="ekle_<?=$kim?>_<?=$_GET[mod]?>_<?=$_GET[m]?>_<?=$uye?> z-3 ad_ara_list" style="position:absolute;"></span> -->
                </div> 
                    <div class="clearfix">
                        <div class="ekle_<?=$kim?>_<?=$_GET[mod]?>_<?=$_GET[m]?>_<?=$uye?> z-3 ad_ara_list"></div>
                    </div> 
             </div> 
             </div> 
            </div>                
                            
				<?php
            	include("mod/uye/datatable/uye_datatable.php");
 }
				
                if($_GET[m]){include("mod/$_GET[mod]/$_GET[m].php"); }
				
			 if($_GET[m] == "list" || $_GET[m] == "sporcu" || $_GET[m] == "antrenor" || $_GET[m] == "hakem")
			 {                
			?>
            </div>
          </div>

        </div>
      </div>
</section>

<?php
 }
?>