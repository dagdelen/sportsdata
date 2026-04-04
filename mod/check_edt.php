<?php

	$id = trim(filter_input(INPUT_POST, 'check_edt', FILTER_SANITIZE_NUMBER_INT));	
	$t = trim(filter_input(INPUT_POST, 't', FILTER_SANITIZE_STRING));	
	$k = trim(filter_input(INPUT_POST, 'k', FILTER_SANITIZE_STRING));	
	$dg = trim(filter_input(INPUT_POST, 'dg', FILTER_SANITIZE_NUMBER_INT));	
	$rl = trim(filter_input(INPUT_POST, 'rl', FILTER_SANITIZE_NUMBER_INT));	
	$wo = trim(filter_input(INPUT_POST, 'wo', FILTER_SANITIZE_NUMBER_INT));	
	
//	include("mod/ajx_mod.php");
	if($dg == 1){$dg = 1;}else{$dg = 0;}
	$id_krt = "".$t."_id";
//	echo"id:$id t:$t k:$k dg:$dg id_krt:$id_krt ";
	$duzenle = DB::prepare("UPDATE $t SET $k = ? WHERE $id_krt = ? ");  
	$duzenle->bindParam(1, $dg, PDO::PARAM_INT);
	$duzenle->bindParam(2, $id, PDO::PARAM_INT);
	$duzenle->execute();		
	
		//  branşın stilleri aynı kategoriyi kullanır
		//   && ($k == "fed" || $k == "dok")
		if($t == "fa_uye")
		{
			$tar_krt = "tarih_$k";
			$adm_krt = "adm_$k";
			
			if($k == "fed" || $k == "dok" || $k == "tar"){
				$admedt = DB::prepare("UPDATE $t SET $tar_krt = ?, $adm_krt = ? WHERE $id_krt = ? ");  
				$admedt->bindParam(1, $tarih, PDO::PARAM_STR);
				$admedt->bindParam(2, $uye, PDO::PARAM_INT);
				$admedt->bindParam(3, $id, PDO::PARAM_INT);
				$admedt->execute();	
				
					// tartı ise siklet_ad siklet'+row[0]+ a yazdır 
					if($k == "tar"){
						$famuysql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
						$famuysql->execute(array($id));
						$muy = $famuysql->fetch(PDO::FETCH_ASSOC);	
										
						$sklsqli = DB::prepare("SELECT * FROM siklet WHERE siklet_id = ? ");
						$sklsqli->execute(array($muy[siklet]));
						$fskl = $sklsqli->fetch(PDO::FETCH_ASSOC);	
							?> 
							<script>
								$('.siklet<?=$id?>').html("<?=$fskl[siklet_ad]?>");		
							</script>			
							<?php
						}
					
			}
			
			?> 
			<script>
				$(document).ready(function () {
					<?php if($dg == 1){?>
						$(".<?=$k?><?=$id?>").html('<i class="bi bi-check-square-fill" style="color:#00CC33; font-size:1.2em;"></i>');
					<?php }else if($dg == 0){?>
						$(".<?=$k?><?=$id?>").html('<i class="bi bi-dash-circle-fill" style="color:#FF0000; font-size:1.2em;"></i>');
					<?php }?>
					$('.tarih_<?=$id?>').html("<?=substr($tarih, 11,8)?>");
					//top.close(100); // !!! BURASI ANA PENCEREYİ KAPATIYOR
					$('.modal').hide();
					// $('body').removeClass('modal-open');
					$('.modal-backdrop').remove();
	
				});
			</script>
            <?php
		}

		
		
		
		if($rl > 0){
			?><script>window.location.reload();</script><?php
		}else{


            $dzkontsql = DB::prepare("SELECT * FROM $t WHERE $k = ? AND $id_krt = ?  ");
            $dzkontsql->execute(array($dg, $id));
            $okmu=$dzkontsql->rowCount();

				if ($okmu > 0) {
					?> 
					<script>
						$(".check_<?=$t?>_<?=$k?>_<?=$id?>").prepend('<i class="bi bi-check-all ok<?=$id?>" style="color:#33CC00;"></i>')
						.fadeIn('slow').animate({opacity: 1.0}, 1000).fadeOut('slow',function() {
							$(".ok<?=$id?>").remove();
								 
							//  top.close(100); // !!! BURASI ANA PENCEREYİ KAPATIYOR

						});
				</script>	    
				<?php 				
								
				} else {
					echo"!";
				}	
		}
					
	

?>