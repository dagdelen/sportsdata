<?php
include("config.php");
/* 
$mes 	= $_GET[m];
    echo" [$mes web]";
$juri 	= substr($mes,0,3); // cihaz kodu
$red 	= substr($mes,3,1);
$blue 	= substr($mes,4,1);
$hakem 	= substr($mes,5,4);
$volt 	= substr($mes,9,2);
*/
$juri = $_GET['j'];
$hakem = $_GET['h'];
$red = $_GET['r'];
$blue = $_GET['b'];
$volt = $_GET['v'];


/*
$aktifmussql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE cihaz = ? ");
$aktifmussql->execute(array($juri));
$akt = $aktifmussql->fetch(PDO::FETCH_ASSOC);
*/
$aktifmussql = DB::prepare("SELECT a.fa_mus_aktif_id,a.fid,a.mid,a.aktR,a.poz
FROM fa_cihaz AS c 
JOIN fa_mus_aktif AS a ON (c.ring = a.ring)
WHERE  c.fid = a.fid AND c.cihaz = ? AND a.cihaz = ? AND c.kod = ? ");
$aktifmussql->execute(array($juri, $juri, $hakem ));
$akt = $aktifmussql->fetch(PDO::FETCH_ASSOC);
$akt_mus   = $akt[fa_mus_aktif_id];
$fid   = $akt[fid];
$akt_mid = $akt[mid];
$aktR  = $akt[aktR];
$poz   = $akt[poz];

$eksibir = -1;
$puan_mils = 500; // bu kadar mili saniye geçerse puan olsun, ( daha eski olanları da pasifleştir UNUTMA! )
$puan_hakem = 2; // bukadar hakem puan_mils içinde verirse puan olur
$hakem_lmt = $puan_hakem - 1; // eksi son gelen
$fark_sn = $puan_mils / 1000;

$dt = new DateTime();
 $zaman = $dt->format('Y-m-d H:i:s.u');
//$zaman = $dt->format('Y-m-d H:i:s');
$butar = strtotime($zaman); 
$mil = $dt->format('u');
$mil = substr($mil,0,3);

if($red > 0){
  $kose_renk = "red";
  $kose_puan = $red;
  $kp = "rp";
}else if($blue > 0){
  $kose_renk = "blue";
  $kose_puan = $blue;
  $kp = "bp";
}

$yeni = DB::insert('INSERT INTO fa_mus_skor (fid, akt, mid, juri, aktR, poz, '.$kose_renk.', hakem, zaman, mil, volt,ack) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)',
array($fid, $akt_mus, $akt_mid, $juri, $aktR, $poz, $kose_puan, $hakem, $zaman, $mil, $volt, "ref"));

$famusskorsql = DB::prepare("SELECT * FROM fa_mus_skor 
WHERE fa_mus_skor_id != ".$yeni." AND hakem != ".$hakem." AND juri = ? AND $kose_renk = ? AND ref = 0 ");
$famusskorsql->execute(array($juri, $kose_puan));
$skr_say = $famusskorsql->rowCount();	
if($skr_say == $hakem_lmt)
{
  foreach($famusskorsql as $skr)
  {   
    $ilktar   = strtotime($skr->zaman);
    $fark     = $butar - $ilktar;
    $fark_mil = $mil - $skr->mil;
    $ack      = $butar - $ilktar;

    $usorgu = DB::prepare("UPDATE fa_mus_skor SET fark = ?, fark_mil = ?, ref = ?, ack = ? WHERE fa_mus_skor_id = ?  ");  
    $usorgu->bindParam(1, $fark, PDO::PARAM_INT);
    $usorgu->bindParam(2, $fark_mil, PDO::PARAM_INT);
    $usorgu->bindParam(3, $yeni, PDO::PARAM_INT);
    $usorgu->bindParam(4, $ack, PDO::PARAM_STR);
    $usorgu->bindParam(5, $skr->fa_mus_skor_id, PDO::PARAM_INT);
    $usorgu->execute();

    $hesap = $fark * 1000 + $fark_mil;
    $ack_hesap = "$hesap";

    if($hesap <= $puan_mils){
      $yengun = DB::prepare("UPDATE fa_mus_skor SET ref = ?, $kp = ?, ack = ? WHERE fa_mus_skor_id = ?  ");  
      $yengun->bindParam(1, $skr->fa_mus_skor_id, PDO::PARAM_INT);
      $yengun->bindParam(2, $kose_puan, PDO::PARAM_INT);
      $yengun->bindParam(3, $ack_hesap, PDO::PARAM_STR);
      $yengun->bindParam(4, $yeni, PDO::PARAM_INT);
      $yengun->execute();         
    }else{
        $yengun = DB::prepare("UPDATE fa_mus_skor SET ref = ?, ack = ? WHERE fa_mus_skor_id = ?  ");  
        $yengun->bindParam(1, $skr->fa_mus_skor_id, PDO::PARAM_INT);
        $yengun->bindParam(2, $ack_hesap, PDO::PARAM_STR);
        $yengun->bindParam(3, $yeni, PDO::PARAM_INT);
        $yengun->execute();      
    }

    
  }
}



//  eskileri pasifleştir
 $esk_hesap = ceil($butar - $fark_sn);
 //  $esk_hesap = $butar - $fark_sn;
$eskfamusskorsql = DB::prepare("SELECT * FROM fa_mus_skor WHERE  juri = ? AND ref = 0 ");
$eskfamusskorsql->execute(array($juri));
foreach($eskfamusskorsql as $eskr)
{ 
  if(strtotime($eskr->zaman) < $esk_hesap)
  {
  //  $ackl = "".strtotime($eskr->zaman)." < $esk_hesap";

    $eskgn = DB::prepare("UPDATE fa_mus_skor SET ref = ?, ack = ? WHERE fa_mus_skor_id = ? ");  
    $eskgn->bindParam(1, $eksibir, PDO::PARAM_INT);
    $eskgn->bindParam(2, $ackl, PDO::PARAM_STR);
    $eskgn->bindParam(3, $eskr->fa_mus_skor_id, PDO::PARAM_INT);
    $eskgn->execute(); 
  }
}




?>