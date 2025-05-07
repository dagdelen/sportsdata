<?php
		setcookie("uye",$uye,time()-3600*24);
		
		setcookie("yetki",$yetki,time()-3600*24);
		setcookie("yetki_id",$yetki_id,time()-3600*24);
/* 	
		setcookie("yer",$yer,time()-3600*24);
		setcookie("yer_id",$yer_id,time()-3600*24);
 */			
		setcookie("kilit",$kilit,time()-3600*24);
		
//		session_destroy();
		session_unset(); 
			
		header("location:/");
		echo "<script>window.location='/'</script>";
		
		?>