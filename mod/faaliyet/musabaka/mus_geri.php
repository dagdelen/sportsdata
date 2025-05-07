<?php
if($dinleden == 1){
	$id = $mus_id;
	$fid =$fid;
	$ks = $kose;	
}else{
	$id = trim(filter_input(INPUT_POST, 'mus_geri', FILTER_SANITIZE_NUMBER_INT));
	$fid = trim(filter_input(INPUT_POST, 'fid', FILTER_SANITIZE_NUMBER_INT));
	$ks = trim(filter_input(INPUT_POST, 'ks', FILTER_SANITIZE_STRING));	
	
}

// echo"id:$id fid:$fid   ";

	$muskontrolsql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? ");
	$muskontrolsql->execute(array($id));
	$mu = $muskontrolsql->fetch(PDO::FETCH_ASSOC);
	$mu_say = $muskontrolsql->rowCount();
	
	$fid = 	$mu[fid];
	$brs = 	$mu[brs];
	$stl = 	$mu[stl];
	$kat = 	$mu[kat];
	$skl = 	$mu[skl];
	$tab = 	$mu[tab];
	
	$rkr  = $mu[rkr];
	$red  = $mu[red];
	$rbl  = $mu[rbl];
	
	$bkr  = $mu[bkr];
	$blue = $mu[blue];
	$bbl  = $mu[bbl];
	
	$tur  = $mu[tur];
	$ring = $mu[ring];
	$gun  = $mu[gun];
	$md   = $mu[d];

	$Rgeri   = $mu[Rgeri];
	$Rkose   = $mu[Rkose];

	$Bgeri   = $mu[Bgeri];
	$Bkose   = $mu[Bkose];

	$sifir = 0;
	$bir = 1;

//   echo" id:$id  ks:$ks   Rgeri:$Rgeri Rkose:$Rkose  Bgeri:$Bgeri Bkose:$Bkose <br> ";
  
	if($ks == "red"){

		if($Rgeri > 0){
			$gerikontsq = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? ");
			$gerikontsq->execute(array($Rgeri));
			$gr = $gerikontsq->fetch(PDO::FETCH_ASSOC);
			
			if($gr[gun] == 0){$gr_d = 0;}else{$gr_d = 1;}
			
			echo" id:$id  red = ?, rbl = ?, Rgeri = ?, Rkose = ?  --- geri_id:$Rgeri   gr_d:$gr_d ";
			
			
				$eksyap = DB::prepare("UPDATE fa_mus SET red = ?, rbl = ?, Rgeri = ?, Rkose = ? WHERE fa_mus_id = ?  ");  
				$eksyap->bindParam(1, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(2, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(3, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(4, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(5, $id, PDO::PARAM_INT);
				$eksyap->execute();
				
				$gerigunc = DB::prepare("UPDATE fa_mus SET d = ? WHERE fa_mus_id = ?  ");  
				$gerigunc->bindParam(1, $gr_d, PDO::PARAM_INT);
				$gerigunc->bindParam(2, $Rgeri, PDO::PARAM_INT);
				$gerigunc->execute();
			
				if($tur == 0){
					$sklsil = DB::prepare("DELETE FROM fa_mus WHERE fa_mus_id = ?  ");
					$sklsil->bindParam(1, $id, PDO::PARAM_INT);
					$sklsil->execute();			
				}
				
				?><script>window.location.reload();</script><?php
			
		}
		
		
	}else if($ks == "blue"){
		
		if($Bgeri > 0){
			$gerikontsq = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? ");
			$gerikontsq->execute(array($Bgeri));
			$gr = $gerikontsq->fetch(PDO::FETCH_ASSOC);
			
			if($gr[gun] == 0){$gr_d = 0;}else{$gr_d = 1;}
			
			echo"  id:$id  blue = ?, bbl = ?, Bgeri = ?, Bkose = ?  ---  geri_id:$Bgeri geri_kose:$Bkose   gr_d:$gr_d  ";
			
				$eksyap = DB::prepare("UPDATE fa_mus SET blue = ?, bbl = ?, Bgeri = ?, Bkose = ? WHERE fa_mus_id = ?  ");  
				$eksyap->bindParam(1, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(2, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(3, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(4, $sifir, PDO::PARAM_INT);
				$eksyap->bindParam(5, $id, PDO::PARAM_INT);
				$eksyap->execute();
				
				$gerigunc = DB::prepare("UPDATE fa_mus SET d = ? WHERE fa_mus_id = ?  ");  
				$gerigunc->bindParam(1, $gr_d, PDO::PARAM_INT);
				$gerigunc->bindParam(2, $Bgeri, PDO::PARAM_INT);
				$gerigunc->execute();
		
		
				if($tur == 0){
					$sklsil = DB::prepare("DELETE FROM fa_mus WHERE fa_mus_id = ?  ");
					$sklsil->bindParam(1, $id, PDO::PARAM_INT);
					$sklsil->execute();			
				}
		
				?><script>window.location.reload();</script><?php
			
		}

		
	}



?>