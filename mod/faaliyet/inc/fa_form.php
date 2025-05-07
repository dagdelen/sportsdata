<!--   afiş yükle -->
<script>
		function previewafis() {
			afis.src = URL.createObjectURL(event.target.files[0]);
			$(".afis_yukle").show();
        }
        function clearImage() {
            document.getElementById('afisupl').value = null;
            afis.src = "";
		}
		
	function previewicon() {
		icon.src = URL.createObjectURL(event.target.files[0]);
		$(".icon_yukle").show();
	}
	function clearImage() {
		document.getElementById('iconupl').value = null;
		icon.src = "";
	}
		
		
		

	$(document).ready(function () { 

		$(".afis_div").mouseover(function(){
			$(".afis_sec").show();
		});		
		
		$(".afis_div").mouseout(function(){
			$(".afis_sec").hide();
		});		
		
		$(".talimat_inp").change(function(){
			$(".talimat_yukle").show();
		});		
		

	});		
			
</script>
<?php
if($fa_edt == 1){
	include("mod/faaliyet/inc/afis_talimat.php");
}
?>

	<!--  afiş -->
	<div class="form-control mb-1 p-1 afis_div" style="min-height:50px;"> 
    	<img id="afis" src="<?=$fa[afis]?>" class="img-fluid col-lg-12 m-0 p-0 m-auto" />
    <?php if($fa_edt == 1){?> 
            <div class="clearfix" > 
                <label for="afisupl" class="form-label mt-2 float-start " style="margin:0 100px 50px 0;" >
                    <a class="text-decoration-none afis_sec" style="cursor:cell; position:absolute; display:none;"> <?=_Afis?><br />  
                            <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-cloud-arrow-up-fill" viewBox="0 0 16 16">
                                <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2m2.354 5.146a.5.5 0 0 1-.708.708L8.5 6.707V10.5a.5.5 0 0 1-1 0V6.707L6.354 7.854a.5.5 0 1 1-.708-.708l2-2a.5.5 0 0 1 .708 0z"></path>
                            </svg>                
                        <?php  
                        foreach($faaliyet_afis_filetype as $faf){ echo"$faf, "; } 
                        $kackb = floor($faaliyet_afis_filesize/1024);
                        echo" max $kackb.kb" 
                        ?>
                    </a>
                </label>
                <form action="" method="post"  enctype="multipart/form-data"> 
                    <input class="form-control afis_inp" type="file" id="afisupl" onchange="previewafis()" name="afis" style="display:none;">  
                    <input type="hidden" name="eski_afis" value="<?=$fa[afis]?>">
                    <button type="submit" class="btn btn-primary m-3 float-end afis_yukle" style="display:none;"><?=_yukle?></button>
                </form>
        	</div>
    <?php }?>
    </div>
    <!-- Faaliyet Adı  -->
    <div class="form-floating mb-1" id="ad"> 
    	<?php if($fa_edt == 1){?>
          <input type="text" name="ad" value="<?=$fa[faaliyet_ad]?>" class="form-control <?php if($fa_edt == 1){?> input_edt_str <?php }?> " t="faaliyet" k="faaliyet_ad" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[faaliyet_ad]?>" >
        <?php }else{?>
        	<div class="form-control row_fa_ad"><b><?=$fa[faaliyet_ad]?></b></div>
        <?php }?>
          <label for="ad"><?=_Ad?> <span class="eski_faaliyet_faaliyet_ad_<?=$fa[faaliyet_id]?>"></span></label>   
    </div>
    <!-- Başlama Bitiş -->            
    <div class="input-group mb-1 z-5">
        <div class="form-floating">
        	<?php if($fa_edt == 1){?>
              <input type="date" name="baslama" value="<?=$fa[baslama]?>" class="form-control <?php if($fa_edt == 1){?> input_edt_str <?php }?> " t="faaliyet" k="baslama" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[baslama]?>" >
            <?php }else{?>
            	<div class="form-control">
                	<b><?=substr($fa[baslama],8,2)?>.<?=substr($fa[baslama],5,2)?>.<?=substr($fa[baslama],0,4)?></b>
                </div>
            <?php }?>
          <label class="z-0" for="baslama"><?=_Baslama?> <span class="eski_faaliyet_baslama_<?=$fa[faaliyet_id]?>"></span></label>
        </div> 
          <span class="input-group-text">-</span> 
        <div class="form-floating">
        	<?php if($fa_edt == 1){?>
              <input type="date" name="bitis" value="<?=$fa[bitis]?>" class="form-control <?php if($fa_edt == 1){?> input_edt_str <?php }?> " t="faaliyet" k="bitis" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[bitis]?>" >
            <?php }else{?>
            <div class="form-control">
                <b><?=substr($fa[bitis],8,2)?>.<?=substr($fa[bitis],5,2)?>.<?=substr($fa[bitis],0,4)?></b>
            </div>
            <?php }?>
          <label class="z-0" for="bitis"><?=_Bitis?> <span class="eski_faaliyet_bitis_<?=$fa[faaliyet_id]?>"></span></label>
        </div>
    </div> 
    <!-- talimat ucret -->
    <div class="input-group mb-1 z-5">
        
        <div class="form-floating" id="talimat"> 
            <?php if($fa_edt == 1){?>
                <div class="form-control"> <!-- class="btn btn-outline-success btn-sm"   -->
                	<?php if($fa[talimat]){ ?><a href="<?=$fa[talimat]?>" ><b><i><?=_indir?></i></b></a><?php }?>
                    	<?php 
						$kackb = floor($faaliyet_talimat_filesize/1024);
						?>
                    <label for="talimatupl" class="form-label mt-2 float-end" style="font-size:0.8em; cursor:cell;" 
                    	title="<?php foreach($faaliyet_talimat_filetype as $faf){ echo"$faf, "; } echo" max $kackb.kb" ?>">
                     	<?=_yukle?>
                    </label>
                    
               		<form action="" method="post"  enctype="multipart/form-data"> 
                    	<input class="form-control talimat_inp" type="file" id="talimatupl" name="talimat" style="display:none;">  
                    	<input type="hidden" name="eski_talimat" value="<?=$fa[talimat]?>">
                    	<button type="submit" class="btn btn-primary m-3 float-end talimat_yukle" style="display:none;"><?=_Talimat?> <?=_yukle?></button>
                	</form>
                </div>
        	<?php }else{?>
                <div class="form-control"><?php if($fa[talimat]){ ?><a href="<?=$fa[talimat]?>"><b><i><?=_indir?></i></b></a><?php }?></div>
        	<?php }?>
            <label for="talimat"><?=_Talimat?></label>            
        </div>          
        
        <div class="form-floating">
        	<?php if($fa_edt == 1){?>
              <input type="text" name="ucret" value="<?=$fa[ucret]?>" class="form-control input_edt_str" t="faaliyet" k="ucret" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[ucret]?>" >
            <?php }else{?>
            	<div class="form-control">
                	<b><?=$fa[ucret]?></b>
                    
                </div>
            <?php }?>
            
          <label class="z-0" for="ucret"><?=_Ucreti?> <span class="eski_faaliyet_ucret_<?=$fa[faaliyet_id]?>"></span></label>
        </div> 
        <span class="input-group-text"><?=$para_birim?></span>
        
    </div> 
         
    <!-- Adres Location -->            
    <div class="input-group mb-1">
        <div class="form-floating w-75">
        <?php if($fa_edt == 1){?>
          <input type="text" name="adres" value="<?=$fa[adres]?>" class="form-control <?php if($fa_edt == 1){?> input_edt_str <?php }?> "
           t="faaliyet" k="adres" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[adres]?>" >
        <?php }else{?>
        	<div class="form-control row_fa_adres"><?=$fa[adres]?></div>
        <?php }?>
          <label for="adres"><?=_Adres?> <span class="eski_faaliyet_adres_<?=$fa[faaliyet_id]?>"></span></label>   
        </div>  
                
          <span class="input-group-text">
          	<?php if($fa[location]){?>
            <a href="https://www.google.com/maps/place/<?=$fa[location]?>" target="_blank">
          		<i class="bi bi-geo-alt"></i>
            </a>
            <?php }?>
          </span>
        
        <?php if($fa_edt == 1){?>     
        <div class="form-floating w-25">
        <?php if($fa_edt == 1){?>
          <input type="text" name="location" value="<?=$fa[location]?>" class="form-control <?php if($fa_edt == 1){?> input_edt_str <?php }?> "
           t="faaliyet" k="location" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[location]?>" >
        <?php }else{?>
        	<div class="form-control" style="font-size:0.7em;"><?=$fa[location]?></div>
        <?php }?>
          <label for="adres"> Location <span class="eski_faaliyet_location_<?=$fa[faaliyet_id]?>"></span> </label>   
        </div>
        <?php }?>
        
    </div>  


  
  
     <!--   faaliyet_foto -->
	<?php if($fa[faaliyet_foto] || $fa_edt == 1){ ?>     
	<div class="input-group mb-1">
        <div class="form-floating sec" id="foto">
        <?php if($fa_edt == 1){?>
        	<input type="text" value="<?=$fa[faaliyet_foto]?>" class="form-control input_edt_str" t="faaliyet" k="faaliyet_foto" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[faaliyet_foto]?>" style="height:50px;" >
        <?php }else{?>
        	<div class="form-control"><a href="<?=$fa[faaliyet_foto]?>" target="_blank" style="font-size:0.8em;"><b><i><?=$fa[faaliyet_foto]?></i></b></a></div>
        <?php }?>

		<label for="not"><?=_Foto_Arsiv?>  <span class="eski_faaliyet_faaliyet_foto_<?=$fa[faaliyet_id]?>"></span></label>  
        </div>
	</div>     
     <?php }?>  
     


<div class="fa_aktif" <?php if($_GET[mod] != "faaliyet" && $fa[aktif] == 0){?> style=" display:none; "  <?php }?> >    
    
    <!-- brans stil -->            
    <div class="input-group mb-1">
        <div class="form-floating">
        <?php if($fa_edt == 1){?>
            <select class="form-select input_edt_str " t="faaliyet" k="brans" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[brans]?>" aria-label="Default select example">
              <option value="0"><?=_Tumu?></option>
				<?php
                 $brssql =  "SELECT * FROM brans WHERE $amir = ?";
                 $brsparams = array($amir_id);	
                 $brsstmt = DB::prepare($brssql);
                 $brsstmt->execute($brsparams);
                 foreach($brsstmt as $brs)
                 {
                ?>
                    <option value="<?=$brs->brans_id?>" <?php if($brs->brans_id == $fa[brans]){?>selected<?php }?> ><?=$brs->brans_ad?></option>
                <?php
                 }
                ?>
            </select> 
        <?php }else{
			
				if($fa[brans] >0 ){
					$fabrssql = DB::prepare("SELECT * FROM brans WHERE brans_id = ? ");
					$fabrssql->execute(array($fa[brans]));
					$fabrs = $fabrssql->fetch(PDO::FETCH_ASSOC);
					$fa_brans = $fabrs[brans_ad];
				}else{
					$fa_brans = _Tumu;
				}
			?>
        	<div class="form-control"><?=$fa_brans?></div>
        <?php }?>
        	<label for="brans"><?=_Brans?> <span class="eski_faaliyet_brans_<?=$fa[faaliyet_id]?>"></span></label> 
        </div>

        <div class="form-floating">
        <?php if($fa_edt == 1){?>
            <select class="form-select input_edt_str " t="faaliyet" k="stil" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[stil]?>" aria-label="Default select example">
              <option value="0"><?=_Tumu?></option>
				<?php
                 $stlsql =  "SELECT * FROM stil WHERE brans = ?";
                 $stlparams = array($fa[brans]);	
                 $stlstmt = DB::prepare($stlsql);
                 $stlstmt->execute($stlparams);
                 foreach($stlstmt as $stl)
                 {
                ?>
                    <option value="<?=$stl->stil_id?>" <?php if($stl->stil_id == $fa[stil]){?>selected<?php }?> ><?=$stl->stil_ad?></option>
                <?php
                 }
                ?>
            </select> 
        <?php }else{
			
				if($fa[stil] >0 ){
					$fastilsql = DB::prepare("SELECT * FROM stil WHERE stil_id = ? ");
					$fastilsql->execute(array($fa[stil]));
					$fastl = $fastilsql->fetch(PDO::FETCH_ASSOC);
					$fa_stil = $fastl[stil_ad];
				}else{
					$fa_stil = _Tumu;
				}
			?>
        	<div class="form-control"><?=$fa_stil?></div>
        <?php }?>
        	<label for="stil"><?=_Stil?> <span class="eski_faaliyet_stil_<?=$fa[faaliyet_id]?>"></span></label> 
        </div>

	</div>    
    
    
     <!-- Ne Faaliyeti 1 müsabaka, 2 kurs  -   Kimler Katılabilir  -  temsil yeri  -->          
    <div class="input-group mb-1">
        <div class="form-floating" id="ne">
        <?php if($fa_edt == 1){?>
            <select class="form-select <?php if($fa_edt == 1){?> input_edt_str <?php }?> " t="faaliyet" k="ne" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[ne]?>" aria-label="Default select example">
              <option><?=_sec?></option>
              <option value="1" <?php if($fa[ne]==1){?>selected<?php }?> ><?=_musabaka?></option>
              <option value="2" <?php if($fa[ne]==2){?>selected<?php }?> ><?=_kurs?></option>
            </select> 
        <?php }else{?>
        	<div class="form-control"><b><?php if($fa[ne]==1){echo _Musabaka;}else if($fa[ne]==2){echo _kurs;} ?> </b></div>
        <?php }?>
            <label for="ne"><?=_ne_faaliyeti?> <span class="eski_faaliyet_ne_<?=$fa[faaliyet_id]?>"></span></label>            
        </div>          
        <div class="form-floating sec" id="kimler">
        <?php if($fa_edt == 1){?>
            <select class="form-select <?php if($fa_edt == 1){?> input_edt_str <?php }?> " t="faaliyet" k="kimler" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[kimler]?>" aria-label="Default select example">
              <option><?=_sec?></option>
              <option value="uye" <?php if($fa[kimler]=="uye"){?>selected<?php }?> ><?=_Uyeler?></option>
              <option value="sporcu" <?php if($fa[kimler]=="sporcu"){?>selected<?php }?> ><?=_Sporcular?></option>
              <option value="antrenor" <?php if($fa[kimler]=="antrenor"){?>selected<?php }?> ><?=_Antrenorler?></option>
              <option value="hakem" <?php if($fa[kimler]=="hakem"){?>selected<?php }?> ><?=_Hakemler?></option>
            </select> 
        <?php }else{?>
        	<div class="form-control"><b><?php if($fa[kimler]=="uye"){echo _Uyeler;}else if($fa[kimler]=="sporcu"){echo _Sporcular;}else if($fa[kimler]=="antrenor"){echo _Antrenorler;}else if($fa[kimler]=="hakem"){echo _Hakemler;} ?> </b></div>
        <?php }?>
            <label for="ne"><?=_kimler_katilir?> <span class="eski_faaliyet_kimler_<?=$fa[faaliyet_id]?>"></span></label>            
        </div>

        <div class="form-floating" id="temsil">
        <?php if($fa_edt == 1){?>
            <select class="form-select <?php if($fa_edt == 1){?> input_edt_str <?php }?> " t="faaliyet" k="temsil" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[temsil]?>" aria-label="Default select example">
              <option value="uye"><?=_uye?></option>
              <option value="kulup" <?php if($fa[temsil]=="kulup"){?>selected<?php }?> ><?=_Kulup?></option>
              <option value="ilce" <?php if($fa[temsil]=="ilce"){?>selected<?php }?> ><?=_ilce?></option>
              <option value="il" <?php if($fa[temsil]=="il"){?>selected<?php }?> ><?=_il?></option>
              <option value="bolge" <?php if($fa[temsil]=="bolge"){?>selected<?php }?> ><?=_Bolge?></option>
              <option value="ulke" <?php if($fa[temsil]=="ulke"){?>selected<?php }?> ><?=_Ulke?></option>
              <option value="kita" <?php if($fa[temsil]=="kita"){?>selected<?php }?> ><?=_Kita?></option>
            </select> 
        <?php }else{?>
        	<div class="form-control"><b><?php if($fa[temsil]=="kulup"){echo _Kulup;}else if($fa[temsil]=="ilce"){echo _ilce;}else if($fa[temsil]=="il"){echo _il;}else if($fa[temsil]=="bolge"){echo _Bolge;}else if($fa[temsil]=="ulke"){echo _Ulke;}else if($fa[temsil]=="kita"){echo _Kita;} ?> </b></div>
        <?php }?>
            <label for="ne"><?=_Temsil_Yeri?> <span class="eski_faaliyet_temsil_<?=$fa[faaliyet_id]?>"></span></label>            
        </div>          
          
    </div> 
    <!--   -    _Kayit_Yetkilisi - kimin üyeleri genel mi sadece bana ait uyekermi-->
	<div class="input-group mb-1">
        <div class="form-floating sec" id="kayit">
        <?php if($fa_edt == 1){?>
            <select class="form-select <?php if($fa_edt == 1){?> input_edt_str <?php }?> " t="faaliyet" k="kayit" id="<?=$fa[faaliyet_id]?>" ex="" aria-label="Default select example">
              <option><?=_sec?></option>
              <option value="ozel" <?php if($fa[kayit]=="ozel"){?>selected<?php }?> ><?=_Ozel_Katilim?></option>
              <option value="uye" <?php if($fa[kayit]=="uye"){?>selected<?php }?> ><?=_Uyeler?></option>
              <option value="sporcu" <?php if($fa[kayit]=="sporcu"){?>selected<?php }?> ><?=_Sporcular?></option>
              <option value="antrenor" <?php if($fa[kayit]=="antrenor"){?>selected<?php }?> ><?=_Antrenorler?></option>
              <option value="hakem" <?php if($fa[kayit]=="hakem"){?>selected<?php }?> ><?=_Hakemler?></option>
              <option value="kulup" <?php if($fa[kayit]=="kulup"){?>selected<?php }?> ><?=_Kulupler?></option>
              <option value="ilce" <?php if($fa[kayit]=="ilce"){?>selected<?php }?> ><?=_ilceler?></option>
              <option value="il" <?php if($fa[kayit]=="il"){?>selected<?php }?> ><?=_iller?></option>
              <option value="bolge" <?php if($fa[kayit]=="bolge"){?>selected<?php }?> ><?=_Bolgeler?></option>
              <option value="ulke" <?php if($fa[kayit]=="ulke"){?>selected<?php }?> ><?=_Ulkeler?></option>
              <option value="kita" <?php if($fa[kayit]=="kita"){?>selected<?php }?> ><?=_Kitalar?></option>
            </select> 
        <?php }else{?>
        	<div class="form-control"><b><?php if($fa[kayit]=="ozel"){echo _Ozel_Katilim;}else if($fa[kayit]=="uye"){echo _Uyeler;}else if($fa[kayit]=="sporcu"){echo _Sporcular;}else if($fa[kayit]=="antrenor"){echo _Antrenorler;
			}else if($fa[kayit]=="hakem"){echo _Hakemler;}else if($fa[kayit]=="kulup"){echo _Kulupler;}else if($fa[kayit]=="ilce"){echo _ilceler;}else if($fa[kayit]=="il"){echo _iller;
			}else if($fa[kayit]=="bolge"){echo _Bolgeler;}else if($fa[kayit]=="ulke"){echo _Ulkeler;}else if($fa[kayit]=="kita"){echo _Kitalar;
			} ?> </b></div>
        <?php }?>
            <label for="ne"><?=_Kayit_Yetkilisi?> <span class="eski_faaliyet_kayit_<?=$fa[faaliyet_id]?>"></span></label>            
        </div>
        
        
     <!--  ozel katilim    -->
	<?php 
	if($fa[kayit]=="ozel")
	{ 
		$ozel_katilim_linki = "?mod=faaliyet&m=katil&e=$fa[faaliyet_id]&ran=$fa[faaliyet_ran]";
	?>

        
        <div class="form-floating" id="ozel_adr"> 
        	<div class="form-control">
            	<?php if($fa_edt == 1){?>
                    <a href="<?=$ozel_katilim_linki?>" target="_blank" style="font-size:0.8em;">
                        <i><b><?=_Katilim_Linki?></b></i>
                    </a>
        		<?php }else{?>
                	<i><?=_yetkiliden_talep_et?>!</i>
        		<?php }?>

                
            </div>
            <label for="ozel_adr"><?=_Katilim_Linki?></label>  
		</div>        
    	
        <?php if($fa_edt == 1){?>
        <div class="form-floating" id="ozel"> 
        	<input type="text" value="<?=$fa[faaliyet_ran]?>" class="form-control input_edt_str" 
        		t="faaliyet" k="faaliyet_ran" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[faaliyet_ran]?>" maxlength="10" >
			<label for="ozel"><?=_Ozel_Kod?>  <span class="eski_faaliyet_faaliyet_ran_<?=$fa[faaliyet_id]?>"></span></label>            
        </div>   
    	<?php }?>
	<?php 
	}else{
	?>         
         <div class="form-floating sec" id="kayit_kim">
			<?php 
			if($fa[kk]==0){$kk_krt = _Tum_Uyeler;}
			if($fa[kk]==1){$kk_krt = _Benim_Uyeler;}
			
			if($fa_edt == 1){?>
                <select class="form-select input_edt_str" t="faaliyet" k="kk" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[kk]?>" aria-label="Default select example">
                  <option><?=_sec?></option>
                  <option value="0" <?php if($fa[kk]==0){?>selected<?php }?> ><?=_Tum_Uyeler?> (open)</option>
                  <option value="1" <?php if($fa[kk]==1){?>selected<?php }?> ><?=_Benim_Uyeler?></option>
                </select> 
            <?php }else{?>
            	<div class="form-control"><b><?=$kk_krt?></b></div>
            <?php }?>
             <label for="kayit_kim"><?=_Hangi_Uyeler?> <span class="eski_faaliyet_kk_<?=$fa[faaliyet_id]?>"></span></label>                    
         </div>
         
	<?php 
	} 
	?>         
        

        
         
    </div>

	<?php if($fa[faaliyet_not] || $fa_edt == 1){ ?>     
	<div class="input-group mb-1">
        <div class="form-floating sec" id="not">
        <?php if($fa_edt == 1){?>
        <!--  
        	<input type="text" value="<?=$fa[faaliyet_not]?>" class="form-control input_edt_str" t="faaliyet" k="faaliyet_not" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[faaliyet_not]?>" style="height:50px;" >
       -->
       
       <textarea class="form-control input_edt_str" t="faaliyet" k="faaliyet_not" id="<?=$fa[faaliyet_id]?>" ex="<?=$fa[faaliyet_not]?>">
       		<?=$fa[faaliyet_not]?>
       </textarea>
        <?php }else{?>
        	<div class="form-control"><?=$fa[faaliyet_not]?></div>
        <?php }?>

		<label for="not"><?=_Not?>  <span class="eski_faaliyet_faaliyet_not_<?=$fa[faaliyet_id]?>"></span></label>  
        </div>
	</div>     
     <?php }?>  
     
     
     
        
    <!--  durum    -->
    <div class="input-group mb-1 z-7">

        <div class="form-floating ">  
                <div class="form-control" id="drm"> 
                	<?php include("mod/faaliyet/inc/fa_katil_krt.php");?>
                </div>
            <label for="drm"><?=_Durum?></label>            
        </div>
        
    </div> 

    
</div>    
    
    
	