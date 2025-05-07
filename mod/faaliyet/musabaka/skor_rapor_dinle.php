<?php 
    if($modal == 1){
        include("config.php");
    }else{
        include("../../../config.php");	
    }
	    ?>
	<script>
		$(document).ready(function () {
		
			$(".ref").mouseover(function(){ 
				var element = $(this);
				var id = element.attr("id");
				$(".ref_"+id).addClass("vurgula");
			});
		
			$(".ref").mouseout(function(){
				var element = $(this);
				var id = element.attr("id");
				$(".ref_"+id).removeClass("vurgula");
			});


		});	
	</script>
		<?php

	$fid = $_GET[f];
	$ring_id = $_GET[r];
	$mus_id = $_GET[m];
	$modal = $_GET[md];
	$randval = $_GET[randval];
	
 //   echo"fid:$fid ring_id:$ring_id md:$modal r:$randval <br> "; 

	$faaliyetuyetsqll = DB::prepare("SELECT * FROM faaliyet WHERE faaliyet_id = ? ");
	$faaliyetuyetsqll->execute(array($fid));
	$fa = $faaliyetuyetsqll->fetch(PDO::FETCH_ASSOC);
	
	// poz  0 hazır, 1 oynuyor, 2 duraklat, 3 mola,   -1 maç bitti ara başladı
	$musaktifsql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND ring = ? ");
	$musaktifsql->execute(array($fid, $ring_id));

	$akt_mus = $musaktifsql->fetch(PDO::FETCH_ASSOC);
	$mus_aktif_say = $musaktifsql->rowCount();
if($mus_aktif_say > 0)
{
    $akt_id 	= $akt_mus[fa_mus_aktif_id];
    $aktif_raund= $akt_mus[aktR];
    $poz 		= $akt_mus[poz];
	$raund 		= $akt_mus[raund];
	$sure 		= $akt_mus[sure];
	$mola 		= $akt_mus[mola];
	$ara 		= $akt_mus[ara];
	$akt_raund 	= $akt_mus[aktR];
	$kro 		= $akt_mus[kro];
	$raund_fark = $raund - $akt_raund;
	
	$poz_hazir = 0;
	$poz_mola = 3;
	$poz_bitti = -1;
	$cihaz 	= $akt_mus[cihaz]; // 101 102 gibi juri kodu
	$red_puan 	= $akt_mus[redP];
	$blue_puan 	= $akt_mus[blueP];
	$sifir = 0;
	$bir = 1;

/*
    if($modal == 1)
    {
        $famusskorsql = DB::prepare("SELECT * FROM fa_mus_skor  WHERE fid = ? AND mid = ? AND akt = ? ORDER BY fa_mus_skor_id DESC");
        $famusskorsql->execute(array($fid, $akt_mus[mid], $akt_id));
        foreach($famusskorsql as $skr)
        { 
            // AND poz = 1 
            $kirmizi=DB::prepare("SELECT SUM(rp) AS takma_ad FROM fa_mus_skor WHERE fa_mus_skor_id = ".$skr->fa_mus_skor_id."  AND rp > 0 ");
			$kirmizi->execute();
			$redpuanlar= $kirmizi->fetch(PDO::FETCH_ASSOC);
			$red_topla = $redpuanlar[takma_ad];

            echo"$skr->fa_mus_skor_id > rt: $red_topla -  red: $skr->red -  rp: $skr->rp = blue: $skr->blue - bp: $skr->bp >  poz: $skr->poz <br>";

        } 

    }
*/
if($modal == 1)
{

        ?> 
    <table id="datarapor" class="compact hover" cellspacing="0" width="100%" style="font-size:0.7em; border-collapse: collapse; border-style: solid; border-width: 0">
    <thead>
        <tr>
            <th> </th>
            <th> 
            <a style="cursor:cell;" onclick="window.open('?rp=<?=$akt_mus[mid]?>','rapor','height=400,width=600,left=100,top=100,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=no');">
            <i class="bi bi-folder-symlink-fill" style="font-size:1.5em;"></i>
            </a>

                    <!--
                <a href="?rp=<?=$akt_mus[mid]?>" target="_blank"> <i class="bi bi-folder-symlink-fill" style="font-size:1.5em;"></i> </a>
                    -->
            </th>
            <th>zaman</th>
            <th><i>m.sc</i></th>
            <th>rau</th>
            <th>pz</th>
            <th>hkm</th>

            <th>red</th>
            <th>RED</th>
            <th>blue</th>
            <th>BLUE</th>


            <th>fark sn</th>
            <th>fark ml </th>
            <th>ref</th>
            <th>red</th>
            <th>blue</th>
            

            <th>volt</th>
        <tr>
    </thead>
        <tbody>
                <?php
            $famusskorsql = DB::prepare("SELECT * FROM fa_mus_skor  WHERE fid = ? AND mid = ? AND akt = ? ORDER BY fa_mus_skor_id DESC");
            $famusskorsql->execute(array($fid, $akt_mus[mid], $akt_id));
            $sy = $famusskorsql->rowCount()+1;

            foreach($famusskorsql as $skr)
            { 
                $sy--;
                // AND rp > 0 
                $kirmizi=DB::prepare("SELECT SUM(rp) AS takma_ad FROM fa_mus_skor WHERE fa_mus_skor_id = ".$skr->fa_mus_skor_id." AND poz = 1 ");
                $kirmizi->execute();
                $redpuanlar= $kirmizi->fetch(PDO::FETCH_ASSOC);
                $red_topla = $redpuanlar[takma_ad];

                $mavi=DB::prepare("SELECT SUM(bp) AS takma_ad FROM fa_mus_skor WHERE fa_mus_skor_id = ".$skr->fa_mus_skor_id." AND poz = 1 ");
                $mavi->execute();
                $bluepuanlar= $mavi->fetch(PDO::FETCH_ASSOC);
                $blue_topla = $bluepuanlar[takma_ad];

                if(6 <= $skr->volt){ $pil = '<i class="bi bi-battery-full" style="font-size:1.5em; color:rgb(26, 87, 2);"></i>'; }
                if($skr->volt == 5){ $pil = '<i class="bi bi-battery-half" style="font-size:1.5em; color:rgb(223, 173, 8);"></i>';  }
                if($skr->volt < 5){ $pil = '<i class="bi bi-battery" style="font-size:1.5em; color:rgb(189, 4, 4);"></i>';   }
                
                if($red_topla == 1){ $red_pu = '<i class="bi bi-1-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(189, 4, 4);"></i>';   
                }else if($red_topla == 2){ $red_pu = '<i class="bi bi-2-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(189, 4, 4);"></i>';   
                }else if($red_topla == 3){ $red_pu = '<i class="bi bi-3-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(189, 4, 4);"></i>';   
                }else if($red_topla == 4){ $red_pu = '<i class="bi bi-4-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(189, 4, 4);"></i>';   
                }else{$red_pu = "";}

                if($blue_topla == 1){ $blue_pu = '<i class="bi bi-1-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(16, 5, 179);"></i>';   
                }else if($blue_topla == 2){ $blue_pu = '<i class="bi bi-2-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(16, 5, 179);"></i>';   
                }else if($blue_topla == 3){ $blue_pu = '<i class="bi bi-3-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(16, 5, 179);"></i>';   
                }else if($blue_topla == 4){ $blue_pu = '<i class="bi bi-4-circle-fill ref" id="'.$skr->fa_mus_skor_id.'" style="font-size:1.3em; cursor:help; color:rgb(16, 5, 179);"></i>';   
                }else{$blue_pu = "";}

                
                    ?>
                <tr class="satir ref_<?=$skr->ref?>" style="border-bottom:solid 1px #CCC;">
                    <td><?=$sy?>-</td>
                    <td><?=$skr->fa_mus_skor_id?></td>
                    <td><?=substr($skr->zaman,11,8)?></td>
                    <td><i><?=$skr->mil?></i></td>
                    <td align="center"><?=$skr->aktR?></td>
                    <td align="center"><?=$skr->poz?></td>
                    <td align="center"><?=substr($skr->hakem,2,2)?></td>
                    
                    <td align="center"><?=$skr->red?></td>
                    <td align="center"><?=$red_pu?></td>

                    <td align="center"><?=$skr->blue?></td>
                    <td align="center"><?=$blue_pu?></td>

                    <td align="center"><?=$skr->fark?></td>
                    <td align="center"><?=$skr->fark_mil?></td>
                    <td align="center"><?=$skr->ref?></td>
                    <td align="center"><?=$skr->rp?></td>
                    <td align="center"><?=$skr->bp?></td>

                    <td><?=$pil?></td>
                </tr>
                <?php

            } 
                ?>            
        </tbody>  
    </table>

        <?php


}




}

?>    