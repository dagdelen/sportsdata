
<div class="alert alert-success mesaj_success" role="alert" style="display:none;"></div>
<div class="mesaj" style="display:none;"></div>
<?php
if($_GET[a] && $_GET[yi])
{
	
	if($uye == 1){

				$_SESSION["yetki"] = $_GET["a"];
				setcookie("yetki", "$_GET[a]",time()+3600*24);	
				
				$_SESSION["yetki_id"] = "$_GET[yi]";
				setcookie("yetki_id", "$_GET[yi]", time()+3600*24);	
				
				echo "<script>window.location='/'</script>";
		
	}else{
			echo" yetki geçişi kontrolü yapılıyor";
			$yetkidogrumu = DB::prepare("SELECT * FROM yetki WHERE yer = ? AND yer_id = ? AND uye = ? ");
			$yetkidogrumu->execute(array($_GET[a], $_GET[yi], $uye));
			$ytkmi = $yetkidogrumu->rowCount();
			if($ytkmi > 0)
			{
				
				$_SESSION["yetki"] = $_GET["a"];
				setcookie("yetki","$_GET[a]",time()+3600*24);	
				
				$_SESSION["yetki_id"] = $_GET["yi"];
				setcookie("yetki_id","$_GET[yi]",time()+3600*24);	
				
				echo "<script>window.location='/'</script>";
			}
		
	}
					
}
else if($_GET[mod])
{
	include("mod/$_GET[mod]/$_GET[mod].php");
}
else if(!$uye)
{
	include("mod/uye/gir.php");
}
include("ana_js.php");
?>


