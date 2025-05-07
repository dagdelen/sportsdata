<script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function () {
	$(".edt_inp").change(function(){
		var element = $(this);
        var id = element.attr("id");
        var t = element.attr("t");
        var o = element.attr("o");
        var s = element.attr("s");
        var rl = element.attr("rl");
        var wo = element.attr("wo");
		var dg = $(this).val();
		  
		$(".dz_tex_sp_"+t+o+s+id).html('<div class="spinner-border" style=" position:absolute; width: 3rem; height: 3rem;" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'edt_inp_ok=' + id + '&t=' + t  + '&o=' + o  + '&s=' + s + '&dg=' + dg + '&rl=' + rl + '&wo=' + wo;

		$.ajax({
			type: "POST",
			url: "ajx.php"
			,data: info,
			success: function(html){
				$(".dz_tex_sp_"+t+o+s+id).html(html).show();
			}
		});	
	});
	
});
</script>
<style>
    .satir:hover{background-color:rgb(204, 215, 231);}
</style>		
<?php
include ("config.php");
// include ("ana_js.php");



if($_GET[f]>0 && $_GET[r]>0){include("mod/faaliyet/musabaka/skor.php");}
if($_POST[yonet_modal]){include("mod/faaliyet/inc/modal_musabaka.php");}
if($_POST[artir]){ include("mod/faaliyet/inc/modal_musabaka.php"); }
if($_POST[eksilt]){ include("mod/faaliyet/inc/modal_musabaka.php"); }


 if($_POST[mus_geri]){ include("mod/faaliyet/musabaka/mus_geri.php"); }
 if($_POST[mus_atlat]){ include("mod/faaliyet/musabaka/mus_atlat.php"); }
if($_GET[f]>0 && $_GET[s]>0){include("mod/faaliyet/musabaka/tablo.php");}


/*

if($_POST[brans]){include("mod/uye/inc/stil_sec.php");}
if($_POST[kopyala]){include("mod/ajx/kopyala.php");}

if($_POST[mus_yan_cihaz]){include("mod/faaliyet/musabaka/mus_yan_cihaz.php");}
if($_POST[kac_gram]){include("mod/faaliyet/gorev/kac_gram.php");}

 if($_POST[mus_gorev_ver]){ include("mod/faaliyet/musabaka/mus_gorev_ver.php"); }
 if($_POST[ring_belirle]){ include("mod/faaliyet/musabaka/ring_belirle.php"); }
 if($_POST[fa_top_left]){ include("mod/faaliyet/inc/fa_top_left.php"); }

//==========================================
 if($_POST[uyem_kaydet]){ include("mod/ajx/uyem_kaydet.php"); }
//==========================================
// ajx.php?mod=faaliyet&m=gorev&e=34&g=fed
 if($_GET[mod] && $_GET[m] && $_GET[g] && $_GET[i]){
	 if (file_exists("mod/$_GET[mod]/$_GET[m]/popup.php")) {
		 include("mod/$_GET[mod]/$_GET[m]/popup.php");
	 }else{
		echo _HATA; 
	 } 
 }
//==========================================
 if($_POST[ekle]){include("mod/ajx/ekle.php");}
//==========================================
 if($_POST[bosalt]){include("mod/ajx/bosalt.php");}
//==========================================
 if($_POST[check_ekl_ckr]){include("mod/ajx/check_ekl_ckr.php");}
//==========================================

if($_POST[edt_inp_ok])
{
	$id = trim(filter_input(INPUT_POST, 'edt_inp_ok', FILTER_SANITIZE_NUMBER_INT));
	$t = trim(filter_input(INPUT_POST, 't', FILTER_SANITIZE_STRING));
	$o = trim(filter_input(INPUT_POST, 'o', FILTER_SANITIZE_STRING));
	$s = trim(filter_input(INPUT_POST, 's', FILTER_SANITIZE_STRING));
	$dg = trim(filter_input(INPUT_POST, 'dg', FILTER_SANITIZE_STRING));

	$rl = trim(filter_input(INPUT_POST, 'rl', FILTER_SANITIZE_NUMBER_INT));
	$wo = trim(filter_input(INPUT_POST, 'wo', FILTER_SANITIZE_STRING));
	
	// echo"id:$id t:$t o:$o s:$s dg:$dg";
	
	$idkrt = "_id";
	$id_krt = "$t$idkrt";
	
	$kolon_krt = "$o$s";	
		
	$duzenle = DB::prepare("UPDATE $t SET $kolon_krt = ? WHERE $id_krt = ? ");  
	$duzenle->bindParam(1, $dg, PDO::PARAM_STR);
	$duzenle->bindParam(2, $id, PDO::PARAM_INT);
	$duzenle->execute();	
		
	if ($duzenle->rowCount() > 0) {
		?>
		<script>
			$(".dz_tex_sp_<?=$t?><?=$o?><?=$s?><?=$id?>").html("<?=$dg?>")
			
			<?php if($rl > 0){?> window.location.reload();  <?php }?> 
		</script>	    
		<?php 				
					
	} else {
		echo"!";
	}		
	
}
//==========================================

if($_POST[tex])
{
	$id = trim(filter_input(INPUT_POST, 'tex', FILTER_SANITIZE_NUMBER_INT));
	$t = trim(filter_input(INPUT_POST, 't', FILTER_SANITIZE_STRING));
	$o = trim(filter_input(INPUT_POST, 'o', FILTER_SANITIZE_STRING));
	$s = trim(filter_input(INPUT_POST, 's', FILTER_SANITIZE_STRING));

	$rl = trim(filter_input(INPUT_POST, 'rl', FILTER_SANITIZE_NUMBER_INT));
	$wo = trim(filter_input(INPUT_POST, 'wo', FILTER_SANITIZE_STRING));
	
/// 	echo"id:$id t:$t ";

	$idkrt = "_id";
	$id_krt = "$t$idkrt";
	
	$adkrt = "_ad";
	$ad_krt = "$t$adkrt";

	$kolon_krt = "$o$s";	

	$texsql = DB::prepare("SELECT * FROM $t WHERE $id_krt = ? ");
	$texsql->execute(array($id));
	$txe = $texsql->fetch(PDO::FETCH_ASSOC);
	
	$length = strlen($txe[$kolon_krt]);
	$inw = $length * 11;
	
		if($t == "fa_mus_sure" && $o == "raund"){
			$inw = 8;
		}
			
	?>
	<style>
        .edtinpolcu{width:<?=$inw?>px;}
    </style>
	<script>
		$(".edt_inp<?=$id?><?=$t?><?=$o?>").addClass("edtinpolcu");
		$(".edt_inp<?=$id?><?=$t?><?=$o?>").val("<?=$txe[$kolon_krt]?>").select();
	</script>
	<?php
}



//==========================================
 if($_POST[sil]){
	/// !!!!!!!!!!!!!!!!!!!!- silmeden önce her tablo için extra kontrolleri yap
	include("mod/ajx/sil.php");
 }
//==========================================

if($_POST[kaydet]){
	if($_POST[t] == "sub"){
		include("mod/ajx/sub_kaydet.php");
	}else if($_POST[t] == "uye"  && $_POST[k] == "gsm"){
		include("mod/ajx/gsm_guncelle.php");
	}else if($_POST[t] == "uye"  && $_POST[k] == "email"){
		include("mod/ajx/email_guncelle.php");
	}else{
		echo"kaydet ? ";
	}

}

if($_POST[edit_tek]){
	if($_POST[t] == "sub"){
		include("mod/ajx/sub_kontrol.php");
	}else if($_POST[t] == "uye" && $_POST[k] == "gsm"){
		include("mod/ajx/gsm_kontrol.php");
	}else if($_POST[t] == "uye" && $_POST[k] == "email"){
		include("mod/ajx/email_kontrol.php");
	}else{
		echo"kontrol ? ";
	}
}
if($_POST[input_ara_ekle]){ include("mod/uye/input_ara_ekle/input_ara_ekle.php");}

// $yetki == "patron" &&  ///////////////////////////////////// GEÇİCİ !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
if($_GET[mod] == "patron"){ include("mod/patron/patron.php"); }
if($_GET[mod]){ include("mod/".$_GET[mod]."/ajx/".$_GET[dos].".php");}
if($_POST[mod]){include("mod/".$_POST[mod]."/ajx/".$_POST[dos].".php");}



if($_POST[check_all]){include("mod/ajx/check_all.php");}
if($_POST[check_edt]){include("mod/ajx/check_edt.php");}

if($_POST[input_edt_tcno]){include("mod/ajx/edit_tcno.php");}

if($_POST[kura_sil]){include("mod/faaliyet/musabaka/kura/kura_sil.php");}
if($_POST[kura_cek]){include("mod/faaliyet/musabaka/kura/kura_cek.php");}
if($_POST[kura_cek_el]){include("mod/faaliyet/musabaka/kura/kura_cek_el.php");}

*/


//===========================================
//===========================================
//===========================================
if($_POST[ana_modal])
{
	$m_ne = trim(filter_input(INPUT_POST, 'ana_modal', FILTER_SANITIZE_STRING));
	$t_ne = $_POST[t];
	$k_ne = $_POST[k];
	$id = $_POST[id];
	
//	echo"id:$id m_ne:$m_ne t_ne:$t_ne k_ne:$k_ne  <br>  mod/$m_ne/inc/modal_$t_ne.php";
		include("mod/$m_ne/inc/modal_$t_ne.php");
	

}
if($_POST[modal])
{
	$mod = trim(filter_input(INPUT_POST, 'modal', FILTER_SANITIZE_STRING));
	$m = trim(filter_input(INPUT_POST, 'm', FILTER_SANITIZE_STRING));
	$id = trim(filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT));
	$g = trim(filter_input(INPUT_POST, 'g', FILTER_SANITIZE_STRING));
	
	 if (file_exists("mod/$mod/modal_$mod.php")) {
		 include("mod/$mod/modal_$mod.php");
	 }else{
		echo _YAPIM_ASAMASINDA; 
	 }
}
if($_POST[input_edt_str]){include("mod/ajx/edit.php");}
?>
