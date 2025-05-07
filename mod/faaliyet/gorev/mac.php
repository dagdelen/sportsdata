
<link rel="stylesheet" type="text/css" href="assets/datatable/resources/demo.css">
<?php if($_GET[rn] > 0){?>  
<script type="text/javascript" language="javascript" class="init">
    $(document).ready(function() {

    const table = new DataTable('#datagorev', {	
    //    order: [[0, 'asc']],
     order: [[1, 'asc']],
	"pageLength": 50,
    //	order: [ [ 1, 'asc' ],[ 0, 'asc' ] ],

	language: {
		lengthMenu: '_MENU_', //  sayfa başına
		 search: 'ara:',
		info: 'sayfa _PAGE_/_PAGES_',
		infoFiltered: "<i>(yetkinde _TOTAL_ kayıt)</i>", // , toplam _MAX_
		emptyTable: 'Tabloda veri yok'
	},		

	layout: {
		topStart: {
					
		pageLength: {
			menu: [[5, 10, 25, 50, 100, 250, 500, -1], [5, 10, 25, 50, 100, 250, 500, "tümü"]],
		},
						
					
		buttons: [
			{
			extend: 'collection',
			text: '<?=_indir?>',
				 buttons: [
	
					{
						extend: 'copy',
						text:'kopyala',
						title: 'e-SportsData.com',
						exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
					},	//kopyala
					{
						extend: 'print',
						text: 'Yazdır',
						title: 'e-SportsData.com',
							customize: function ( doc ) {
								doc['footer']=(function(page, pages) {
									return {
										columns: [
															
											{
												alignment: 'center',
													text: [{ text: page.toString(), italics: true },' / ',{ text: pages.toString(), italics: true }]
												}
											],
											margin: [10, 0]
										}
								});
							},
							exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
					}, // Yazdır 
					{
						extend: 'pdfHtml5',
						download: 'open',
						text:'pdf aç dikey',
						title: 'e-SportsData.com',
						customize: function ( doc ) {
									doc['footer']=(function(page, pages) {
										return {
											columns: [
														
												{
													alignment: 'center',
													text: [{ text: page.toString(), italics: true },' / ',{ text: pages.toString(), italics: true }]
												}
											],
											margin: [5, 0]
										}
									});
									doc.defaultStyle.fontSize = 9;
								},
						exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
											
											
					}, // pdf aç dikey
					{
						extend: 'pdfHtml5',
						download: 'open',
						text:'pdf aç yatay',
						title: 'e-SportsData.com',
						orientation: 'landscape',
						pageSize: 'LEGAL',
						customize: function ( doc ) {
												doc['footer']=(function(page, pages) {
													return {
													columns: [
													
													{
													alignment: 'center',
													text: [
													{ text: page.toString(), italics: true },
													' / ',
													{ text: pages.toString(), italics: true }
													]
													}
													],
													margin: [10, 0]
													}
													});
												doc.defaultStyle.fontSize = 12;	
											},
						exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
			
					}, // pdf aç yatay
					{
						extend: "pdfHtml5",
						text: 'Pdf indir dikey',
							customize: function ( doc ) {
												doc['footer']=(function(page, pages) {
													return {
													columns: [
													
													{
													alignment: 'center',
													text: [
													{ text: page.toString(), italics: true },
													' / ',
													{ text: pages.toString(), italics: true }
													]
													}
													],
													margin: [5, 0]
													}
													});
												doc.defaultStyle.fontSize = 9;	
											},
							exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
												
					}, // Pdf indir dikey
					{
						extend: "pdfHtml5",
						text: 'Pdf indir yatay',
						title: 'e-SportsData.com',
						orientation: 'landscape',
						pageSize: 'LEGAL',
						
							customize: function ( doc ) {
												doc['footer']=(function(page, pages) {
													return {
													columns: [
													
													{
													alignment: 'center',
													text: [
													{ text: page.toString(), italics: true },
													' / ',
													{ text: pages.toString(), italics: true }
													]
													}
													],
													margin: [10, 0]
													}
													});
												doc.defaultStyle.fontSize = 12;	
											},
							exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
												
					}, // Pdf indir yatay
					{
						extend: 'excel',
						text:'excel',
						filename: 'e-SportsData',
						title: 'e-SportsData.com',
						
							exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
						
					},	// excel				
					
					
		   						
				]
				
				
		    }
	            ],
		
					
						  
							  
					}
				},	

	columnDefs: [
		{
		targets: 0, // ilk sütun üzerine yazar
			render: function(data, type) {
				return type === 'export'? number++ : data;
			}
		}
		
		
		
		
	    ]

    });
 
    //  $("body").addClass("toggle-sidebar"); 
		/*
	$(".kalan_modal").click(function(){
		var element = $(this);
        var id = element.attr("id");
		 $(".satir").removeClass("vurgula"); 
		 $(".satir" + id).addClass("vurgula"); 
	});	
		*/

    });
</script>	
<?php } ?>  	
<style>

    .red_ad{  border:solid 1px #FF0000; width:250px; padding:1px; margin:0; border-radius:5px 0 0 5px; font-size:0.9em;
	text-overflow:ellipsis; 
	overflow:hidden; 
	white-space:nowrap;
    position: relative;
	}
	
    .red_yer{  margin:0; font-size:0.9em;
	text-overflow:ellipsis; 
	overflow:hidden; 
	white-space:nowrap;
    position: relative;
	}

    .blue_ad{ border:solid 1px #0000FF; width:250px; padding:1px; margin:0; border-radius:0 5px 5px 0; font-size:0.9em;
	text-overflow:ellipsis; 
	overflow:hidden; 
	white-space:nowrap;
    position: relative;
	}
    .blue_yer{ margin:0; font-size:0.9em;
	text-overflow:ellipsis; 
	overflow:hidden; 
	white-space:nowrap;
    position: relative;
	}
</style>         
 
<?php
	$ac = 1;
	// GÜVENLİK YAPILACAK !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
	$mac_atlat 	= 1;
	$mac_oynat	= 1;
	$mac_plan	= 1;
	// GÜVENLİK YAPILACAK !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

	if($_GET[gn] == "son"){
		$d_krt = " AND d = 1 AND tur = 0 ";
		$oynat = 0;
		$ac = 0;
		?>
		<style>

			.red_ad,.red_yer{border:solid 1px #FFF;} 
			.red_yer{text-align:left;}
		</style>
	
		<?php
	}else if($_GET[gn] == 0){
		$d_krt = " AND d = 0 AND blue > 0 AND gun = ".$_GET[gn]." ";
		$oynat = 1;
	}else{
		$d_krt = "AND d > 0 AND blue > 0 AND gun = ".$_GET[gn]." ";
		$oynat = 1;
	}

	if($mac_plan == 1){
	?>  
	<a href="?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=prg&rn=<?=$_GET[rn]?>&gn=<?=$_GET[gn]?>"><span class="badge text-bg-info mt-2 float-end" style="cursor:crosshair;"><?=_Sirala?> - <?=_Saat?></span></a>        
	<?php		
	}
	?>

    <?php if($_GET[rn] > 0){?>  
     <div id="dinle" style="position:absolute;">...</div>   
        <script>
            $(document).ready(function() {
                // $("#dinle").load("mod/faaliyet/musabaka/mac_dinle.php");
                var refreshId = setInterval(function() {
                    $("#dinle").load('mod/faaliyet/musabaka/mac_dinle.php?fid=<?=$fid?>&rn=<?=$_GET[rn]?>&gn=<?=$_GET[gn]?>&randval='+ Math.floor(Math.random() * 1000));
                }, 1000);
            });
        </script> 
        
    <?php }?>  


		<!--  display   row-border    -->
<table id="datagorev" class="compact hover" cellspacing="0" width="100%" style=" font-size:0.9em; border-collapse: collapse; border-style: solid; border-width: 0">
	<thead>
		<tr>
	    <?php if($ac==1){?>
            <th>sr</th>
			<th>saat</th>
	    <?php }?>
			<th></th><!--tur -->
			<th></th> <!-- stl-->
			<th></th> <!-- kat-->
			<th></th> <!-- skl-->
            
            
			<th><?php if($ac==1){?>RED<?php }else{?><?=_Sampiyon?><?php }?></th> 
	    <?php if($ac==1 && $_GET[gn] != "son"){?>  <?php }?>           
			<th></th><!--  geri -->
	           
			<th> </th>
            
	    <?php if($ac==1){?>
            <th> </th> 
			<th> </th>
			<th> </th>
            
			<th></th>
            <th></th><!--  geri -->
			<th>BLUE</th>
            <th></th>
	        <?php }?>
		</tr>
	</thead>
	<tbody>
 <?php 
 $famussql = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND ring = ? ".$d_krt."  ORDER BY saat ASC ");
 $famussql->execute(array($fid, $_GET[rn]));
 foreach($famussql as $mus)
 { 
 $sn++;
	$ringadsql = DB::prepare("SELECT * FROM fa_mus_ring WHERE fa_mus_ring_id = ? ");
	$ringadsql->execute(array($mus->ring));
	$rndad = $ringadsql->fetch(PDO::FETCH_ASSOC);
	
	$sitadsql = DB::prepare("SELECT * FROM stil WHERE stil_id = ? ");
	$sitadsql->execute(array($mus->stl));
	$sitad = $sitadsql->fetch(PDO::FETCH_ASSOC);	
	
	$katadsql = DB::prepare("SELECT * FROM kategori WHERE kategori_id = ? ");
	$katadsql->execute(array($mus->kat));
	$katad = $katadsql->fetch(PDO::FETCH_ASSOC);	

		$kategori_ad = $katad[kategori_ad];
		$katbol =explode(" ", $katad[kategori_ad]);	
		$kategori_kisa = "".mb_substr($katbol[0],0,1, 'UTF-8')."".mb_substr($katbol[1],0,1, 'UTF-8')."";
	
	$sklsql = DB::prepare("SELECT * FROM siklet WHERE siklet_id = ? ");
	$sklsql->execute(array($mus->skl));
	$sklad = $sklsql->fetch(PDO::FETCH_ASSOC);	
					
	//===================									
	$redfauyesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
	$redfauyesql->execute(array($mus->red));
	$Rfuy = $redfauyesql->fetch(PDO::FETCH_ASSOC);		
                                            
	$reduyadsql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
	$reduyadsql->execute(array($Rfuy[uye]));
	$Ruye = $reduyadsql->fetch(PDO::FETCH_ASSOC);			
        
	$Rfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
	$Rfauyeyersql->execute(array($Rfuy[uye]));
	$Ruyyr = $Rfauyeyersql->fetch(PDO::FETCH_ASSOC);
                                         
		if($fa[temsil] == "uye"){
			$tms_yer_ad = _bireysel;
		}else{
			$tms_id_son = "_id";
			$tms_idne = "$fa[temsil]$tms_id_son";
        	$Rtemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
        	$Rtemssql->execute(array($Ruyyr[$fa[temsil]]));
        	$Rtms = $Rtemssql->fetch(PDO::FETCH_ASSOC);
                                                 
        	$Rtms_ad_son = "_ad";
        	$Rtms_adne = "$fa[temsil]$Rtms_ad_son";
         	$Rtms_yer_ad = "$Rtms[$Rtms_adne]";
		}
	//===================														
	$bluefauyesql = DB::prepare("SELECT * FROM fa_uye WHERE fa_uye_id = ? ");
	$bluefauyesql->execute(array($mus->blue));
	$Bfuy = $bluefauyesql->fetch(PDO::FETCH_ASSOC);			
                                                                
	$blueuyadsql = DB::prepare("SELECT * FROM uye WHERE uye_id = ? ");
	$blueuyadsql->execute(array($Bfuy[uye]));
	$Buye = $blueuyadsql->fetch(PDO::FETCH_ASSOC);	
                                        
	$Bfauyeyersql = DB::prepare("SELECT * FROM uye_yer WHERE uye = ? ");
	$Bfauyeyersql->execute(array($Bfuy[uye]));
	$Buyyr = $Bfauyeyersql->fetch(PDO::FETCH_ASSOC);
                                         
		if($fa[temsil] == "uye"){
        	$tms_yer_ad = _bireysel;
		}else{
                                         
        	//	 $tms_id_son = "_id";
        	//	 $tms_idne = "$fa[temsil]$tms_id_son";
        	$Btemssql = DB::prepare("SELECT * FROM $fa[temsil] WHERE $tms_idne = ? ");
        	$Btemssql->execute(array($Buyyr[$fa[temsil]]));
        	$Btms = $Btemssql->fetch(PDO::FETCH_ASSOC);
                                                 
        	$Btms_ad_son = "_ad";
         	$Btms_adne = "$fa[temsil]$Btms_ad_son";
         	$Btms_yer_ad = "$Btms[$Btms_adne]";
		}
	//===================	
         if($mus->tur == 0){$turu = _sampiyon; 		$bacol = "sampBC"; 		$turR = "sampR"; 	$tur_ico = '<i class="bi bi-0-circle-fill sampR" data-bs-toggle="tooltip" data-bs-title="'._Sampiyon.'"></i>';}
         if($mus->tur == 1){$turu = _final; 		$bacol = "turfinBC"; 	$turR = "turfinR"; 	$tur_ico = '<i class="bi bi-1-circle-fill turfinR" data-bs-toggle="tooltip" data-bs-title="'._Final.'"></i>';}
         if($mus->tur == 2){$turu = _yari_final; 	$bacol = "turyarBC"; 	$turR = "turyarR"; 	$tur_ico = '<i class="bi bi-2-circle-fill turyarR" data-bs-toggle="tooltip" data-bs-title="'._Yari_Final.'"></i>';}
         if($mus->tur == 3){$turu = _ceyrek_final; 	$bacol = "turceyBC"; 	$turR = "turceyR"; 	$tur_ico = '<i class="bi bi-3-circle-fill turceyR" data-bs-toggle="tooltip" data-bs-title="'._Ceyrek_Final.'"></i>';}
         if($mus->tur == 4){$turu = _tur2_eleme; 	$bacol = "tur2BC"; 		$turR = "tur2R"; 	$tur_ico = '<i class="bi bi-4-circle-fill tur2R" data-bs-toggle="tooltip" data-bs-title="'._Tur2_Eleme.'"></i>';}
         if($mus->tur == 5){$turu = _tur1_eleme; 	$bacol = "tur1BC"; 		$turR = "tur1R";	$tur_ico = '<i class="bi bi-5-circle-fill tur1R" data-bs-toggle="tooltip" data-bs-title="'._Tur1_Eleme.'"></i>';}

 $prgkont = DB::prepare("SELECT * FROM fa_program WHERE fid = ? AND fa_program_id = ? ");
 $prgkont->execute(array($fid, $mus->prg));
 $mprg = $prgkont->fetch(PDO::FETCH_ASSOC);

	?> 
	<tr class="sira satir sira<?=$mus->fa_mus_id?> satir<?=$mus->fa_mus_id?>" style="border-bottom:solid 1px #CCC;">
    
 <?php if($ac==1){?>
        <td class="sr_<?=$mus->fa_mus_id?>"><?php if($mus->tur > 0){?><?=$mus->sr?>-<?php }?> </td>
        <td>
			<?php if($mus->saat != "00:00:00"){?>
				<?php if($mus->tur > 0){?>
                    <span class="mac_saati<?=$mus->fa_mus_id?>" style="border:solid 1px #666; border-radius:5px 5px 5px 5px; padding:2px; font-size:0.9em;">
                        <small><?=date( 'd.m', strtotime($mprg[tarih]))?></small>
                        <b><?=date( 'H.i', strtotime($mus->saat))?></b> 
                    </span>
                <?php }?>  
            <?php }?> 
            
        <?php 
    if($mus->gun > 0)
    {
        $geri_gun = $mus->gun - 1;
        $musgerisqli = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND red = ?  AND blue = ?  AND gun = ?   AND d = -1   ");
        $musgerisqli->execute(array($mus->fid, $mus->red, $mus->blue, $geri_gun));
        $mg = $musgerisqli->fetch(PDO::FETCH_ASSOC);
        $mg_say = $musgerisqli->rowCount();

        if($mg_say){
            if($mac_plan == 1 && $oynat == 1){
                ?>
        	<i class="bi bi-arrow-left-square-fill mus_atlat <?=$turR?>" id="<?=$mus->fa_mus_id?>" fid="<?=$fid?>" ks="geri" 
            	data-bs-toggle="tooltip" data-bs-title="<?=$turu?> <?=_geri_gun?> <?=$mus->fa_mus_id?>" style="cursor:cell;"></i> 
                <?php 
            }
        }
            
    }              
        ?>   
      
          

        </td>
 <?php }?>
 
    	<td><?=$tur_ico?></td>
		<td><small data-bs-toggle="tooltip" data-bs-title="<?=$sitad[stil_ad]?>"><?=mb_substr($sitad[stil_ad],0,3, 'UTF-8')?></small></td>
		<td><small data-bs-toggle="tooltip" data-bs-title="<?=$katad[kategori_ad]?>"><?=$kategori_kisa?></small></td>
        <td>
        	<?php if($_GET[gn] == "son"){$son_krt = "&fson=1";}?>
        	<!--<a  href="ajx.php?f=<?=$fid?>&s=<?=$mus->skl?><?=$son_krt?>" target="_blank">-->
            <a  style="cursor:cell" onclick="window.open('ajx.php?f=<?=$fid?>&s=<?=$mus->skl?><?=$son_krt?>','tablo','height=500,width=1000,left=100,top=100,resizable=no,scrollbars=no,toolbar=no,menubar=no,location=no,directories=no, status=no');">
                <div style="min-width:40px;"><?=$sklad[siklet_ad]?></div>
            </a>
        </td>
        
		<td style="max-width:120px;"><?php if($mus->red > 0){?><div class="red_ad"><b><?=$Ruye[ad]?> <?=$Ruye[soyad]?></b></div><?php }?></td>
        
 <?php if($ac==1){?>
        <td>
        	<!--<i class="atlat_<?=$mus->fa_mus_id?> z-3" style="position:absolute;"></i>-->
            <?php if($mac_atlat == 1 && $oynat == 1 && $mus->red > 0 && $mus->blue > 0){?>
        	<i class="bi bi-arrow-up-square-fill kirmizi mus_atlat" id="<?=$mus->fa_mus_id?>" fid="<?=$fid?>" ks="red"  
			data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$Ruye[ad]?> <?=$Ruye[soyad]?> <?=$mus->fa_mus_id?>" style="cursor:cell;"></i>
            <?php }?>
        </td>
 <?php }?>
 
		<td style="max-width:70px; text-align:right;"><?php if($mus->red > 0){?><div class="red_yer"><?=$Rtms_yer_ad?></div><?php }?></td>
        
 <?php if($ac==1 || $_GET[gn] != "son"){?>    <?php }?>      
        <td style="text-align:center;">  
        	<?php if(($mac_oynat == 1 && $mus->red > 0 && $mus->gun > 0) || $mus->tur == 0){?>
            	<!--<i class="geri_<?=$mus->fa_mus_id?> z-3" style="position:absolute;"></i>-->
                <i class="bi bi-arrow-left-square-fill mus_geri" id="<?=$mus->fa_mus_id?>" fid="<?=$fid?>" ks="red" cf="<?=_eminmisin?>"   
            	data-bs-toggle="tooltip" data-bs-title="<?=_islemi_geriye_al?> <?=$mus->fa_mus_id?>" style="cursor:cell;"></i>
            <?php }?>
        </td>
        
        
 <?php if($ac==1){?>
 
 
 
        <td style="text-align:center; ">
        	<?php if($mac_oynat == 1 && $oynat == 1 && $mus->red > 0 && $mus->blue > 0){?>
            <!--  modal-lg -->
        	<i class="bi bi-controller kalan_modal" md="modal-xl" 
            m="faaliyet" t="musabaka" k="<?=$fid?>" id="<?=$mus->fa_mus_id?>" 
            ad="<?=$Ruye[ad]?> <?=$Ruye[soyad]?> & <?=$Buye[ad]?> <?=$Buye[soyad]?>" 
            data-bs-toggle="modal" data-bs-target="#kalan_modal" style="font-size:1.3em; color:#063; cursor:cell;"></i>
            
            <?php }?>
        </td>
        
        
        
        
        <td style="text-align:center;">
        	<?php if($mac_oynat == 1 && $mus->blue > 0 && $mus->gun > 0 ){?>
            	<!--<i class="geri_<?=$mus->fa_mus_id?> z-3" style="position:absolute;"></i>-->
                <i class="bi bi-arrow-left-square-fill mus_geri" id="<?=$mus->fa_mus_id?>" fid="<?=$fid?>" ks="blue" cf="<?=_eminmisin?>" 
            	data-bs-toggle="tooltip" data-bs-title="<?=_islemi_geriye_al?> <?=$mus->fa_mus_id?>" style="cursor:cell;"></i>
            <?php }?>
        </td>
        <td style="max-width:70px; text-align:left;"><?php if($mus->blue > 0){?><div class="blue_yer"><?=$Btms_yer_ad?></div><?php }?></td>
        <td>
        	<!--<i class="atlat_<?=$mus->fa_mus_id?> z-3" style="position:absolute;"></i>-->
            <?php if($mac_atlat == 1 && $oynat == 1 && $mus->red > 0 && $mus->blue > 0){?>
        	<i class="bi bi-arrow-up-square-fill mavi mus_atlat" id="<?=$mus->fa_mus_id?>" fid="<?=$fid?>" ks="blue" 
            data-bs-toggle="tooltip" data-bs-title="<?=_Musabakayi_Kazandi?> <?=$Buye[ad]?> <?=$Buye[soyad]?> <?=$mus->fa_mus_id?>" style="cursor:cell; float:right;"></i>
        	<?php }?>
        </td>
		<td style="max-width:120px;"><?php if($mus->blue > 0){?><div class="blue_ad"><b><?=$Buye[ad]?> <?=$Buye[soyad]?></b></div><?php }?></td>
        <td>
        	<?php if($mac_plan == 1 && $oynat == 1){?>
        	<i class="bi bi-arrow-right-square-fill mus_atlat <?=$turR?>" id="<?=$mus->fa_mus_id?>" fid="<?=$fid?>" ks="gun" 
            	data-bs-toggle="tooltip" data-bs-title="<?=$turu?> <?=_ileri_gun?> <?=$mus->fa_mus_id?>" style="cursor:cell;"></i> 
            <?php }?>    
        </td>
 <?php }?>
 
	</tr> 
    
    <i class="atlat_<?=$mus->fa_mus_id?> geri_ geri_<?=$mus->fa_mus_id?> z-3" style="position:absolute;"></i>
	
 <?php
 }
 
 // }
 ?>            
	</tbody>  
</table>

</div>    
    