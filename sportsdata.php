<?php
include("config.php");

if($_GET[local] > 0)
{
	$lfid = $_GET[local];
	$luye = $_GET[u];
	$ifr = $_GET[ifr];
	$lran = $_GET[ran];
	//	echo" http://localhost/ == ifr:$ifr = uye: $luye  == fid: $lfid == ran: $lran ==> VAR. <br>";
	?>
	<!--
		<iframe  width="100%" height="100%" frameborder="0" scrolling="yes" src="http://www.e-sportsdata.com/iframe.php?local=<?=$lfid?>&u=<?=$luye?>&r=<?=$lran?>" frameborder="0"></iframe>	
		-->
		<iframe  width="100%" height="100%" frameborder="0" scrolling="yes" src="http://www.e-sportsdata.com/iframe.php?local=<?=$lfid?>&ifr=<?=$ifr?>&u=<?=$luye?>&r=<?=$lran?>" frameborder="0"></iframe>	

	<?php
}

	if($_GET[brans_id] > 0)
	{
		$fabrsqll = DB::prepare("SELECT * FROM brans WHERE brans_id = ? ");
		$fabrsqll->execute(array($_GET[brans_id]));
		if( $fabrsqll->rowCount() == 0){
			$ybrs = DB::insert('INSERT INTO brans (brans_id,brans_ad)VALUES(?, ?)',array($_GET[brans_id],$_GET[brans_ad]));	
		}
	}

	if($_GET[stil_id] > 0)
	{
		$fastlll = DB::prepare("SELECT * FROM stil WHERE stil_id = ? ");
		$fastlll->execute(array($_GET[stil_id]));
		if( $fastlll->rowCount() == 0){
			$ystl = DB::insert('INSERT INTO stil (stil_id,stil_ad)VALUES(?, ?)',array($_GET[stil_id],$_GET[stil_ad]));	
		}	
	}

		// faaliyet_id,org,dunya,kita,ulke,bolge,il,ilce,kulup,sube,ne,kimler,brans,stil,kat_drc,kaz_drc,temsil,kayit,kk,yetki,yetki_id,faaliyet_ad,ucret,baslama,bitis,adres,location,admin,aktif,afis,talimat,dz_tarih,dz_adm,faaliyet_foto,faaliyet_not,faaliyet_ran,salon_en,salon_boy
	if($_GET[faaliyet_id] > 0)
	{
		$faaliyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
		$faaliyetsqll->execute(array($_GET[faaliyet_id]));
		if( $faaliyetsqll->rowCount() == 0){
			$yfad = DB::insert('INSERT INTO faaliyet (faaliyet_id,org,dunya,kita,ulke,bolge,il,ilce,kulup,sube,ne,kimler,brans,stil,kat_drc,kaz_drc,temsil,kayit,kk,yetki,yetki_id,faaliyet_ad,ucret,baslama,bitis,adres,location,admin,aktif,afis,talimat,dz_tarih,dz_adm,faaliyet_foto,faaliyet_not,faaliyet_ran,salon_en,salon_boy) 
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[faaliyet_id],$_GET[org],$_GET[dunya],$_GET[kita],$_GET[ulke],$_GET[bolge],$_GET[il],$_GET[ilce],$_GET[kulup],$_GET[sube],$_GET[ne],$_GET[kimler],$_GET[brans],$_GET[stil],$_GET[kat_drc],$_GET[kaz_drc],$_GET[temsil],$_GET[kayit],$_GET[kk],$_GET[yetki],$_GET[yetki_id],$_GET[faaliyet_ad],$_GET[ucret],$_GET[baslama],$_GET[bitis],$_GET[adres],$_GET[location],$_GET[admin],$_GET[aktif],$_GET[afis],$_GET[talimat],$_GET[dz_tarih],$_GET[dz_adm],$_GET[faaliyet_foto],$_GET[faaliyet_not],$_GET[faaliyet_ran],$_GET[salon_en],$_GET[salon_boy]));	
		}
	}

	if($_GET[fa_cihaz_id] > 0)
	{
		$facihazsql = DB::prepare("SELECT * FROM fa_cihaz WHERE fa_cihaz_id = ? ");
		$facihazsql->execute(array($_GET[fa_cihaz_id]));

		if( $facihazsql->rowCount() == 0){
			$ycihaz = DB::insert('INSERT INTO fa_cihaz (fa_cihaz_id,fid,cihaz,yer,yer_id,ring,kim,nci,kod)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_cihaz_id],$_GET[fid],$_GET[cihaz],$_GET[yer],$_GET[yer_id],$_GET[ring],$_GET[kim],$_GET[nci],$_GET[kod]));	
		}else{echo _var;}
	} 
	
	if($_GET[fa_gorevli_id] > 0)
	{
		// echo" $_GET[fa_gorevli_id],$_GET[fid],$_GET[uye],$_GET[admin],$_GET[fed],$_GET[oda],$_GET[dok],$_GET[tar],$_GET[kur],$_GET[ayr],$_GET[gor],$_GET[pln],$_GET[prg],$_GET[ano],$_GET[yan],$_GET[ort],$_GET[son],$_GET[ring],$_GET[aktif] ";	
		$fagorevlisql = DB::prepare("SELECT * FROM fa_gorevli WHERE fa_gorevli_id = ? ");
		$fagorevlisql->execute(array($_GET[fa_gorevli_id]));

		if( $fagorevlisql->rowCount() == 0){
			$ygorevli = DB::insert('INSERT INTO fa_gorevli (fa_gorevli_id,fid,uye,admin,fed,oda,dok,tar,kur,ayr,gor,pln,prg,ano,yan,ort,son,ring,aktif)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_gorevli_id],$_GET[fid],$_GET[uye],$_GET[admin],$_GET[fed],$_GET[oda],$_GET[dok],$_GET[tar],$_GET[kur],$_GET[ayr],$_GET[gor],$_GET[pln],$_GET[prg],$_GET[ano],$_GET[yan],$_GET[ort],$_GET[son],$_GET[ring],$_GET[aktif]));	
		}else{echo _var;}
	} 
	
	if($_GET[gor_uye_id] > 0)
	{
		$guyeesql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
		$guyeesql->execute(array($_GET[gor_uye_id]));
		if( $guyeesql->rowCount() == 0){
			$gyuye = DB::insert('INSERT INTO uye (uye_id,ad,soyad,gsm,cin,pin)
			VALUES(?, ?, ?, ?, ?,?)'
			,array($_GET[gor_uye_id],$_GET[ad],$_GET[soyad],$_GET[gsm],$_GET[cin],$_GET[pin]));	
		}else{echo _var;}

	} 

	if($_GET[fa_kat_id] > 0)
	{
		$fakatsql = DB::prepare("SELECT * FROM fa_kat WHERE fa_kat_id = ? ");
		$fakatsql->execute(array($_GET[fa_kat_id]));

		if( $fakatsql->rowCount() == 0){
			$yfakat = DB::insert('INSERT INTO fa_kat (fa_kat_id,brans,stil,fid,kategori)
			VALUES(?, ?, ?, ?, ?)'
			,array($_GET[fa_kat_id],$_GET[brans],$_GET[stil],$_GET[fid],$_GET[kategori]));	
		}else{echo _var;}

		$fakatgqll = DB::prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
		$fakatgqll->execute(array($_GET[kategori]));
		if( $fakatgqll->rowCount() == 0){
			$yfkat = DB::insert('INSERT INTO kategori (kategori_id,kategori_ad)VALUES(?, ?)',array($_GET[kategori],$_GET[kategori_ad]));	
			
		}

	} 

	if($_GET[fa_left_top_id] > 0)
	{
		$falefttopsql = DB::prepare("SELECT * FROM fa_left_top WHERE fa_left_top_id = ? ");
		$falefttopsql->execute(array($_GET[fa_left_top_id]));

		if( $falefttopsql->rowCount() == 0){
			$ylefttop = DB::insert('INSERT INTO fa_left_top (fa_left_top_id,fid,tablo,kolon,id,nci,sol,ust)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_left_top_id],$_GET[fid],$_GET[tablo],$_GET[kolon],$_GET[id],$_GET[nci],$_GET[sol],$_GET[ust]));	
		}else{echo _var;}
	} 

	if($_GET[fa_mus_id] > 0)
	{
		$famussql = DB::prepare("SELECT * FROM fa_mus WHERE fa_mus_id = ? ");
		$famussql->execute(array($_GET[fa_mus_id]));

		if( $famussql->rowCount() == 0){
			$yfamus = DB::insert('INSERT INTO fa_mus (fa_mus_id,sr,fid,brs,stl,kat,skl,tab,rkr,red,rbl,bkr,blue,bbl,tur,ring,prg,gun,d,saat,sd,rdp,blp,Rgeri,Rkose,Bgeri,Bkose)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_mus_id],$_GET[sr],$_GET[fid],$_GET[brs],$_GET[stl],$_GET[kat],$_GET[skl],$_GET[tab],$_GET[rkr],$_GET[red],$_GET[rbl],$_GET[bkr],$_GET[blue],$_GET[bbl],$_GET[tur],$_GET[ring],$_GET[prg],$_GET[gun],$_GET[d],$_GET[saat],$_GET[sd],$_GET[rdp],$_GET[blp],$_GET[Rgeri],$_GET[Rkose],$_GET[Bgeri],$_GET[Bkose]));	
		}else{echo _var;}
	} 

	if($_GET[fa_mus_gorev_id] > 0)
	{
		$famusgorevsql = DB::prepare("SELECT * FROM fa_mus_gorev WHERE fa_mus_gorev_id = ? ");
		$famusgorevsql->execute(array($_GET[fa_mus_gorev_id]));

		if( $famusgorevsql->rowCount() == 0){
			$yfamusgor = DB::insert('INSERT INTO fa_mus_gorev (fa_mus_gorev_id,fid,fa_mus_id,fa_gorevli_id,gorev,yer)
			VALUES(?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_mus_gorev_id],$_GET[fid],$_GET[fa_mus_id],$_GET[fa_gorevli_id],$_GET[gorev],$_GET[yer]));	
		}else{echo _var;}
	} 

	if($_GET[fa_mus_ring_id] > 0)
	{
		$famusringsql = DB::prepare("SELECT * FROM fa_mus_ring WHERE fa_mus_ring_id = ? ");
		$famusringsql->execute(array($_GET[fa_mus_ring_id]));

		if( $famusringsql->rowCount() == 0){
			$yfamusring = DB::insert('INSERT INTO fa_mus_ring (fa_mus_ring_id,fid,fa_mus_ring_ad,en,boy,yukseklik,rad,bosluk,admin,cihaz,juri,yan,orta,ring_amir)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_mus_ring_id],$_GET[fid],$_GET[fa_mus_ring_ad],$_GET[en],$_GET[boy],$_GET[yukseklik],$_GET[rad],$_GET[bosluk],$_GET[admin],$_GET[cihaz],$_GET[juri],$_GET[yan],$_GET[orta],$_GET[ring_amir]));	
		}else{echo _var;}
	} 
	
	if($_GET[fa_mus_sure_id] > 0)
	{
		$famussuresql = DB::prepare("SELECT * FROM fa_mus_sure WHERE fa_mus_sure_id = ? ");
		$famussuresql->execute(array($_GET[fa_mus_sure_id]));

		if( $famussuresql->rowCount() == 0){
			$yfamussure = DB::insert('INSERT INTO fa_mus_sure (fa_mus_sure_id,fid,brans,stil,kategori,siklet,raund,sure,mola,ara,admin,aktif)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_mus_sure_id],$_GET[fid],$_GET[brans],$_GET[stil],$_GET[kategori],$_GET[siklet],$_GET[raund],$_GET[sure],$_GET[mola],$_GET[ara],$_GET[admin],$_GET[aktif]));	
		}else{echo _var;}
	} 
	
	if($_GET[fa_program_id] > 0)
	{
		$famussuresql = DB::prepare("SELECT * FROM fa_program WHERE fa_program_id = ? ");
		$famussuresql->execute(array($_GET[fa_program_id]));

		if( $famussuresql->rowCount() == 0){
			$yfamussure = DB::insert('INSERT INTO fa_program (fa_program_id,fid,gun,tarih,baslama,bitis,program,msb,mac)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_program_id],$_GET[fid],$_GET[gun],$_GET[tarih],$_GET[baslama],$_GET[bitis],$_GET[program],$_GET[msb],$_GET[mac]));	
		}else{echo _var;}
	} 
	
	if($_GET[fa_skl_id] > 0)
	{
		$fasikletsql = DB::prepare("SELECT * FROM fa_skl WHERE fa_skl_id = ? ");
		$fasikletsql->execute(array($_GET[fa_skl_id]));

		if( $fasikletsql->rowCount() == 0){
			$yfaskl = DB::insert('INSERT INTO fa_skl (fa_skl_id,brans,stil,fid,kategori,siklet)
			VALUES(?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_skl_id],$_GET[brans],$_GET[stil],$_GET[fid],$_GET[kategori],$_GET[siklet]));	
		}else{echo _var;}

		$sikletsql = DB::prepare("SELECT * FROM siklet WHERE siklet_id = ? ");
		$sikletsql->execute(array($_GET[siklet]));
		if( $sikletsql->rowCount() == 0){
			$ysklet = DB::insert('INSERT INTO siklet (siklet_id,siklet_ad)VALUES(?, ?)',array($_GET[siklet],$_GET[siklet_ad]));	
		}else{echo _var;}

				
	} 
	
	if($_GET[fa_uye_id] > 0)
	{
		$fauyesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
		$fauyesql->execute(array($_GET[fa_uye_id]));
		if( $fauyesql->rowCount() == 0){
			$yfuye = DB::insert('INSERT INTO fa_uye (fa_uye_id,fid,brans,stil,kategori,siklet,uye,sphk,admin,org,dunya,kita,ulke,bolge,il,ilce,kulup,sube,yatak,fed,tarih_fed,adm_fed,dok,tarih_dok,adm_dok,tamgr,tar,tarih_tar,adm_tar,kura,tarih_kura,adm_kura)
			VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
			,array($_GET[fa_uye_id],$_GET[fid],$_GET[brans],$_GET[stil],$_GET[kategori],$_GET[siklet],$_GET[uye],$_GET[sphk],$_GET[admin],$_GET[org],$_GET[dunya],$_GET[kita],$_GET[ulke],$_GET[bolge],$_GET[il],$_GET[ilce],$_GET[kulup],$_GET[sube],$_GET[yatak],$_GET[fed],$_GET[tarih_fed],$_GET[adm_fed],$_GET[dok],$_GET[tarih_dok],$_GET[adm_dok],$_GET[tamgr],$_GET[tar],$_GET[tarih_tar],$_GET[adm_tar],$_GET[kura],$_GET[tarih_kura],$_GET[adm_kura]));	
			echo "$yfuye";
		}else{echo _var;}
		/*
		$uyeesql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
		$uyeesql->execute(array($_GET[uye_id]));
		if( $uyeesql->rowCount() == 0){
			$yuye = DB::insert('INSERT INTO uye (uye_id,ad) VALUES(?, ?)' ,array($_GET[uye_id],$_GET[ad]));	
		}else{echo _var;}
		*/
	} 

	if($_GET[uye_id] > 0)
	{
		$uyeesql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
		$uyeesql->execute(array($_GET[uye_id]));
		if( $uyeesql->rowCount() == 0){
			$yuye = DB::insert('INSERT INTO uye (uye_id,ad,soyad,gsm,cin,pin)VALUES(?, ?, ?, ?, ?,?)' ,array($_GET[uye_id],$_GET[ad],$_GET[soyad],$_GET[gsm],$_GET[cin],$_GET[pin]));	
			echo"$yuye";
		}else{echo _var;}

	} 

	if($_GET[uye_yer_id] > 0)
	{
	$yuyeesql = DB::prepare("SELECT * FROM uye_yer WHERE uye_yer_id = ? ");
	$yuyeesql->execute(array($_GET[uye_yer_id]));
	if( $yuyeesql->rowCount() == 0){
		$yyuye = DB::insert('INSERT INTO uye_yer (uye_yer_id,uye,org,dunya,kita,country,ulke,bolge,il,ilce,kulup,sube,amir,amir_id,aktif)
		VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)'
		,array($_GET[uye_yer_id],$_GET[uye],$_GET[org],$_GET[dunya],$_GET[kita],$_GET[country],$_GET[ulke],$_GET[bolge],$_GET[il],$_GET[ilce],$_GET[kulup],$_GET[sube],$_GET[amir],$_GET[amir_id],$_GET[aktif]));	
	}else{echo _var;}
	} 

	if($_GET[org_id] > 0)
	{
	$orgsql = DB::prepare("SELECT * FROM org WHERE org_id = ? ");
	$orgsql->execute(array($_GET[org_id]));
	if( $orgsql->rowCount() == 0){
		$yorg = DB::insert('INSERT INTO org (org_id,org_ad)VALUES(?, ?)',array($_GET[org_id],$_GET[org_ad]));	
	}else{echo _var;}
	} 

	if($_GET[dunya_id] > 0)
	{
	$dnysql = DB::prepare("SELECT * FROM dunya WHERE dunya_id = ? ");
	$dnysql->execute(array($_GET[dunya_id]));
	if( $dnysql->rowCount() == 0){
		$ydny = DB::insert('INSERT INTO dunya (dunya_id,dunya_ad)VALUES(?, ?)',array($_GET[dunya_id],$_GET[dunya_ad]));	
	}else{echo _var;}
	} 

	if($_GET[kita_id] > 0)
	{
	$ktasql = DB::prepare("SELECT * FROM kita WHERE kita_id = ? ");
	$ktasql->execute(array($_GET[kita_id]));
	if( $ktasql->rowCount() == 0){
		$ykta = DB::insert('INSERT INTO kita (kita_id,kita_ad)VALUES(?, ?)',array($_GET[kita_id],$_GET[kita_ad]));	
	}else{echo _var;}
	} 

	if($_GET[ulke_id] > 0)
	{
	$ulksql = DB::prepare("SELECT * FROM ulke WHERE ulke_id = ? ");
	$ulksql->execute(array($_GET[ulke_id]));
	if( $ulksql->rowCount() == 0){
		$yulk = DB::insert('INSERT INTO ulke (ulke_id,ulke_ad)VALUES(?, ?)',array($_GET[ulke_id],$_GET[ulke_ad]));	
	}else{echo _var;}
	} 

	if($_GET[bolge_id] > 0)
	{
	$blgsql = DB::prepare("SELECT * FROM bolge WHERE bolge_id = ? ");
	$blgsql->execute(array($_GET[bolge_id]));
	if( $blgsql->rowCount() == 0){
		$yblg = DB::insert('INSERT INTO bolge (bolge_id,bolge_ad)VALUES(?, ?)',array($_GET[bolge_id],$_GET[bolge_ad]));	
	}else{echo _var;}
	} 

	if($_GET[il_id] > 0)
	{
	$illsql = DB::prepare("SELECT * FROM il WHERE il_id = ? ");
	$illsql->execute(array($_GET[il_id]));
	if( $illsql->rowCount() == 0){
		$yill = DB::insert('INSERT INTO il (il_id,il_ad)VALUES(?, ?)',array($_GET[il_id],$_GET[il_ad]));	
	}else{echo _var;}
	} 

	if($_GET[ilce_id] > 0)
	{
	$ilcelsql = DB::prepare("SELECT * FROM ilce WHERE ilce_id = ? ");
	$ilcelsql->execute(array($_GET[ilce_id]));
	if( $ilcelsql->rowCount() == 0){
		$yilcl = DB::insert('INSERT INTO ilce (ilce_id,ilce_ad)VALUES(?, ?)',array($_GET[ilce_id],$_GET[ilce_ad]));	
	}else{echo _var;}
	} 

	if($_GET[kulup_id] > 0)
	{
	$klpsql = DB::prepare("SELECT * FROM kulup WHERE kulup_id = ? ");
	$klpsql->execute(array($_GET[kulup_id]));
	if( $klpsql->rowCount() == 0){
		$yklp = DB::insert('INSERT INTO kulup (kulup_id,kulup_ad)VALUES(?, ?)',array($_GET[kulup_id],$_GET[kulup_ad]));	
	}else{echo _var;}
	} 

	if($_GET[sube_id] > 0)
	{
		$sbesql = DB::prepare("SELECT * FROM sube WHERE sube_id = ? ");
		$sbesql->execute(array($_GET[sube_id]));
		if( $sbesql->rowCount() == 0){
			$ysbe = DB::insert('INSERT INTO kulup (sube_id,sube_ad)VALUES(?, ?)',array($_GET[sube_id],$_GET[sube_ad]));	
		}else{echo _var;}
	} 






 
 

                 