<link rel="stylesheet" type="text/css" href="assets/datatable/resources/demo.css">
<script type="text/javascript" language="javascript" class="init">
$(document).ready(function() {
const table = new DataTable('#datagorev', {	
		
	"processing": true,
	"serverSide": true,
	"ajax": "mod/<?=$_GET[mod]?>/<?=$_GET[m]?>/datatable/data_<?=$gad?>.php?y=<?=$yetki?>&i=<?=$yetki_id?>&e=<?=$_GET[e]?>&g=<?=$_GET[g]?>&cin=<?=$_GET[cin]?>&stl=<?=$_GET[stl]?>&ktg=<?=$_GET[ktg]?>&skl=<?=$_GET[skl]?>&ok=<?=$_GET[ok]?>",
	"fnRowCallback" : function(nRow, aData, iDisplayIndex){$("td:first", nRow).html(iDisplayIndex +1); return nRow; },	// ilk kolona sıra numarası basar	
	"searching": true,
	"ordering": true,
	"lengthChange": true, 
	<?php if($_GET[m] == "dunya"){?> 
	"pageLength": 25,
	<?php }else{?> 
	"pageLength": 10,
	<?php }?> 
     order: [[0, 'desc']],
	
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
			text: 'indir',
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
											margin: [10, 0]
										}
									});
								},
						exportOptions: { orthogonal: "export", rows: function(idx, data, node) { number = 1; return true;} }
											
											
					}, // pdf aç dikey
					{
						extend: 'pdfHtml5',
						download: 'open',
						text:'pdf aç yatay',
						title: 'e-SportsData.com',
						//extend: 'pdfHtml5',
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
													margin: [10, 0]
													}
													});
												
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
		,{ 
		"targets": 4,  
            "render": function ( data, type, row, meta ) {                                     
				return '<a href="?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=<?=$_GET[g]?>&cin='+row[4]+'&stl=<?=$_GET[stl]?>&ktg=<?=$_GET[ktg]?>&skl=<?=$_GET[skl]?>&ok=<?=$_GET[ok]?>" class="suz_'+row[4]+' siyah" >'+row[11]+'</a>';
  				}
		}
		,{ 
		"targets": 5,  
            "render": function ( data, type, row, meta ) {                                     
				return '<a href="?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=<?=$_GET[g]?>&cin=<?=$_GET[cin]?>&stl='+row[5]+'&ktg=<?=$_GET[ktg]?>&skl=<?=$_GET[skl]?>&ok=<?=$_GET[ok]?>" class="suz_'+row[5]+' siyah" >'+row[12]+'</a>';
  				}
		}
		,{ 
		"targets": 6,  
            "render": function ( data, type, row, meta ) {                                      
				return '<a href="?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=<?=$_GET[g]?>&cin=<?=$_GET[cin]?>&stl=<?=$_GET[stl]?>&ktg='+row[6]+'&skl=<?=$_GET[skl]?>&ok=<?=$_GET[ok]?>" class="suz_'+row[6]+' siyah" >'+row[13]+'</a>';
  				}
		}
		,{ 
		"targets": 7,  
            "render": function ( data, type, row, meta ) {                                      
				return '<a href="?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=<?=$_GET[g]?>&cin=<?=$_GET[cin]?>&stl=<?=$_GET[stl]?>&ktg=<?=$_GET[ktg]?>&skl='+row[7]+'&ok=<?=$_GET[ok]?>" class="siklet'+row[0]+' siyah" >'+row[14]+'</a>';
  				}
		}
		,{ 
		"targets": 10,  
            "render": function ( data, type, row, meta ) {  
                if(row[15] == 1) {
				    return '<a href="?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=<?=$_GET[g]?>&cin=<?=$_GET[cin]?>&stl=<?=$_GET[stl]?>&ktg=<?=$_GET[ktg]?>&skl=<?=$_GET[skl]?>&ok=1" class="tarih_'+row[0]+' siyah"  style="color:#336699; font-size:0.8em;"><i>'+row[10]+'</i></a>';
                }else{
				    return '<a href="?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=<?=$_GET[g]?>&cin=<?=$_GET[cin]?>&stl=<?=$_GET[stl]?>&ktg=<?=$_GET[ktg]?>&skl=<?=$_GET[skl]?>&ok=2" class="tarih_'+row[0]+' siyah"  style="color:#336699; font-size:0.8em;"><i>'+row[10]+'</i></a>';
                }                                    
  			}
		}

		  /// || ($yer == $yetki && $yer == $amir && $yer_id == $yetki_id && $yer_id == $amir_id)
		<?php if($yetki == "patron" || $fag[$_GET[g]] > 0 ){ ?> 		
		,{ 
		"targets": 1,  
            "render": function ( data, type, row, meta ) {                                         <!--   href="#'+row[0]+'"   -->
				return '<a class="<?=$_GET[g]?>'+row[0]+'" data-mod="<?=$_GET[mod]?>" data-m="<?=$_GET[m]?>" data-id="'+row[0]+'" data-g="<?=$_GET[g]?>" data-ad="'+row[2]+' '+row[3]+'" data-md="" href="" data-toggle="modal" data-target="#myModal">'+data+'</a>';
  				}
		}
        /*
		,{ 
		"targets": 10,  
            "render": function ( data, type, row, meta ) {
					return '<i class="tarih_'+row[0]+'" style="color:#336699; font-size:0.8em;">'+row[10]+'</i>';
  			}
		} 		
        */
		<?php } ?>




		<?php /*if($yetki == "patron" || $fag[$_GET[g]] > 0 ){?> 		
		,{ 
		"targets": 10,  
            "render": function ( data, type, row, meta ) {
				if(data == 1) {
					return '<div class="form-check form-switch"><input class="form-check-input check_edt" t="fa_uye" k="<?=$_GET[g]?>" id="'+row[0]+'" type="checkbox" checked /></div><div class="check_fa_uye_<?=$_GET[g]?>_'+row[0]+'" style=" position:absolute;"></div>';
				}else if(data == 0){
					return '<div class="form-check form-switch"><input class="form-check-input check_edt" t="fa_uye" k="<?=$_GET[g]?>" id="'+row[0]+'" type="checkbox" /></div><div class="check_fa_uye_<?=$_GET[g]?>_'+row[0]+'" style=" position:absolute;"></div>';
				}
				
  			}
		}
		<?php }*/ ?>
		
		
	]
		
});

/*   
	(function() {
		var url = 'https://debug.datatables.net/bookmarklet/DT_Debug.js';
		if (typeof DT_Debug != 'undefined') {
			if (DT_Debug.instance !== null) {
				DT_Debug.close();
			} else {
				new DT_Debug();
			}
		} else {
			var n = document.createElement('script');
			n.setAttribute('language', 'JavaScript');
			n.setAttribute('src', url + '?rand=' + new Date().getTime());
			document.body.appendChild(n);
		}
	})(); //  HATA AYIKLAMA !!!   https://debug.datatables.net/
  */
  
});
</script>

	