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
