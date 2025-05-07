<div class="row">
 <?php  // blue > 0 AND 
 
 // ?mod=faaliyet&m=gorev&e=1&g=mac&rn=2&gn=1
 
 if($_GET[rn] > 0){
	 $rn_gn_krt = "AND ring = $_GET[rn] ";
	 	
	 $gun = $_GET[gn];
	 
	 	if($gun == 0){
			 $d_krt = "AND d = 0 AND blue > 0 AND gun =  $_GET[gn]";
		}else{
			 $d_krt = "AND d = 1 AND blue > 0 AND gun =  $_GET[gn]";			
		}
	 ?>
     <?php
 }else{
	 $rn_gn_krt = "AND ring > 0";
	 $d_krt = "AND d = 0";
	 $gun = 0;
 }
 
 $murngsql =  "SELECT * FROM fa_mus WHERE fid = ? ".$rn_gn_krt."  GROUP BY ring ORDER BY ring ASC";
 $rmsparams = array($fid);	
 $rmsstmt = DB::prepare($murngsql);
 $rmsstmt->execute($rmsparams);
 foreach($rmsstmt as $mrng)
 {
	$ringadsql = DB::prepare("SELECT * FROM fa_mus_ring WHERE fa_mus_ring_id = ? ");
	$ringadsql->execute(array($mrng->ring));
	$rndad = $ringadsql->fetch(PDO::FETCH_ASSOC);
	?>
<script type="text/javascript"> 
    $(document).ready(function() { 
	
        $("#test-list<?=$mrng->ring?>").sortable({ 
            handle : '.handle', 
            update : function () { 
                var order = $('#test-list<?=$mrng->ring?>').sortable('serialize'); 
                $("#info<?=$mrng->ring?>").load("mod/faaliyet/gorev/prg/sira.php?"+order+"&f=<?=$fid?>&r=<?=$mrng->ring?>"); 
            } 
        });
		
		
		 
    }); 
</script>
 <div class="col-lg-12">
 <div class="card">
	<div class="card-body"> 



       <div>
	   		<?=_Ring?>: <font size="+2" lang="th"><?=$rndad[fa_mus_ring_ad]?></font>

            
            <?php  if($_GET[rn] > 0){?>
             <a href="/?mod=faaliyet&m=gorev&e=<?=$_GET[e]?>&g=mac&rn=<?=$_GET[rn]?>&gn=<?=$_GET[gn]?>" class="badge text-bg-success mt-2 float-end"><?=_Geri?></a>
            <?php }?>
            
       		<span class="badge text-bg-info mt-2 float-end sirala" id="<?=$mrng->ring?>"  
            data-bs-toggle="tooltip" data-bs-title="<?=_Siralamayi_Duzenle?> (sortable)"
             style="cursor:crosshair; margin-right:15px;">
			<?=_Sirala?></span>
            
       		<span class="badge text-bg-info mt-2 float-end saat_prg" id="<?=$mrng->ring?>"
             data-bs-toggle="tooltip" data-bs-title="<?=_Musabaka_Zamanlari?>"
             style="cursor:crosshair; margin-right:15px;">
			<?=_Saat?></span>
       </div>
       
       <div class="row saat_prg_ saat_prg_<?=$mrng->ring?> z-3" style=" display:none; position:fixed; top:65px; background-color:#FFF; width:70%;">

			<?php 
            $GRfmprg = DB::prepare("SELECT * FROM fa_program WHERE fid = ? AND mac > 0 GROUP BY gun ORDER BY gun ASC  ");
            $GRfmprg->execute(array($fid));
            foreach($GRfmprg as $GRprg)
            {	
            ?>
            <div class="col-lg-4">
            	<div class="card">
				<div class="card-body"> 
                    <span class="badge text-bg-secondary"> <b><?=$GRprg->gun?></b>.<?=_gun?> <?=date( 'd.m.Y', strtotime($GRprg->tarih))?> </span>
                        <?php
                        $fmprg = DB::prepare("SELECT * FROM fa_program WHERE fid = ? AND gun = ? AND mac > 0 ORDER BY gun, fa_program_id ASC  ");
                        $fmprg->execute(array($fid, $GRprg->gun));
                        foreach($fmprg as $prg)
                        { 
                        ?>
                            <div style="font-size:0.8em; padding:0; margin:0; border-bottom:solid 1px #CCC;">
                                <span class="badge text-bg-info saat" fid="<?=$fid?>" ring="<?=$mrng->ring?>" gun="<?=$gun?>" prg="<?=$prg->fa_program_id?>" style="cursor:crosshair; margin-left:20px;"> 
                                    <?=_islem?> 
                                </span>
                                <?=substr($prg->baslama,0,5)?> - <?=substr($prg->bitis,0,5)?>  <?=mb_substr($prg->program,0,10, 'UTF-8')?>
                            </div>
                        <?php
                        }  
                        ?>
            	</div>
            	</div>
            </div>
            <?php
            }
            ?>
            	<div style="width:100%;">
                   <span class="badge text-bg-danger saat" fid="<?=$fid?>" ring="<?=$mrng->ring?>" gun="<?=$gun?>" prg="-1" 
                    style="cursor:crosshair; margin-left:20px; margin-top:-25px; width:100px;"><?=_Sil?></span> 
                </div>
        </div>
        
		<div id="info<?=$mrng->ring?>" style="height:15px;"> </div> 
		<div id="test-list<?=$mrng->ring?>"> 
            <?php								// AND blue > 0 AND tab > 1 
             $lstmurngsql =  "SELECT * FROM fa_mus WHERE fid = ? AND ring = ? ".$d_krt." ORDER BY tur DESC, kat DESC ";
             $lstrmsparams = array($fid, $mrng->ring);	
             $lstrmsstmt = DB::prepare($lstmurngsql);
             $lstrmsstmt->execute($lstrmsparams);
			 $sr=0;
             foreach($lstrmsstmt as $musr)
            {

                    include("mod/faaliyet/gorev/prg/prg_list.php");

            }
         ?>
		</div> 
         

 	</div>
 </div>
 </div>
         
 <?php
 }
 
 
 
 ?>
</div>    
