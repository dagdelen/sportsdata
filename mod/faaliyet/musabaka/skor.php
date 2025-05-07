 <?php 

		$fid 	    = $_GET[f];
		$ring_id    = $_GET[r];
		$mus_id     = $_GET[m];
		$modal      = $_GET[md];

	if($modal == 1){ 
	/* ?><script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script><?php  */		
		?><script src="../../../assets/js/jquery.min.js"></script><?php 
	
      //  echo"fid:$fid ring_id:$ring_id mus_id:$mus_id modal:$modal ";

    //  $faaliyetim_eki = "mod/faaliyet/musabaka/";  
      $faaliyetim_eki = "";  
      	 $vw = "22vw"; // iframe ise
	//	$vw = "7vw";
		$theight = "90%";

		$ritop = "0";
        $rileft = "0";
        $riright = "0";

		$rtop = "1em";
		$rleft = "0";
        $rright = "0";

		$skr = "0.3em";
		$skr_pn = "0.1em";
		// $ring = $ring_id;
        $raundlar =  "0.08em";

	}else{

		$fid 	= $_GET[f];
		$ring_id= $_GET[r];
		$mus_id = $_GET[m];
		$modal = $_GET[md];		
		
		$faaliyetim_eki = "mod/faaliyet/musabaka/";	
		$vw = "22vw"; 
		$theight = "97%"; 

		$ritop = "0";
        $rileft = "0";
        $riright = "0";

		$rtop = "1.2em";
        $rleft = "0";
        $rright = "0";
        
		$skr = "0.5em";
		$skr_pn = "0.0001em";
        $raundlar =  "0.3em";
		
		$fid = $_GET[f];
		$ring_id = $_GET[r];

        ?>


    <?php

	}
   ?>
<style>
	.win {animation: blinker 0.9s linear infinite;}
      @keyframes blinker { 50% { opacity: 0; }}
	#table{font-family:Verdana, Geneva, sans-serif;font-weight:bold;font-size:<?=$vw?>; width:100%; margin:0; padding:0; height:<?=$theight?>; }

	.ring {position: absolute; 
        left: <?=$rileft?>;  top: <?=$ritop?>;  right:<?=$rright?>;
        margin-inline: auto; width: fit-content;font-size:0.35em; 
		font-family:Verdana, Geneva, sans-serif; color:#999;} 
     
	.raund {position: absolute; 
        left: <?=$rleft?>;  top: <?=$rtop?>;  right:<?=$rright?>;
        margin-inline: auto; width: fit-content;font-size:0.35em; 
		font-family:Verdana, Geneva, sans-serif; color:#CCCCCC;
    } 

	.red,.red_raundlar,.red_yan,.red_rau{background-color:#FF0000; color:#FFF;}
	.red_puan{text-align:center; width:50%; font-size:0.8em;}
	.blue,.blue_raundlar,.blue_yan,.blue_rau{background-color:#00F; color:#FFF; }
	.blue_puan{text-align:center; width:50%; font-size:0.8em;}
	.red_ad_skr, .blue_ad_skr,.red_yer_ad,.blue_yer_ad{font-size:0.13em; text-align:center; padding:0; margin:0;}
	.kronometre{font-size:<?=$skr?>; text-align:center; padding:<?=$skr_pn?>; margin:0; padding:0; background-color:#336699; color:#fff;}
	.raundlar{font-size:<?=$raundlar?>;}
	.rapor{font-size:0.15em;}
    
</style>
<script>
	$(document).ready(function() {
		$("#dinle").load("<?=$faaliyetim_eki?>skor_dinle.php");
		var refreshId = setInterval(function() {
			$("#dinle").load('<?=$faaliyetim_eki?>skor_dinle.php?f=<?=$fid?>&r=<?=$ring_id?>&m=<?=$mus_id?>&md=<?=$modal?>&randval='+ Math.floor(Math.random() * 1000));
		}, 1000);
	});
</script>
<div class="skorboard" >
<table border="0" id="table" cellspacing="0" cellpadding="0"  style="min-width:400px; min-height:250px;">
    <tr>
        <td class="" style="text-align:center;"> </td>
        <td colspan="2" class="ring" style="text-align:center;">R</td>
        <td class="" style="text-align:center;"> </td>
    </tr>
    <tr>
        <td class="red_yan"> </td>
        <td colspan="2" class="raund" style="text-align:center;">r</td>
        <td class="blue_yan"> </td>
    </tr>
    <tr>
    	<td class="red_yan"> </td>
        <td class="red_ad_skr red">red ad</td>
        <td class="blue_ad_skr blue">blue ad</td>
        <td class="blue_yan"> </td>
    </tr>  
    <tr>
    	<td class="red_yan"> </td>
        <td class="red_yer_ad red">red yer</td>
        <td class="blue_yer_ad blue">blue yer</td>
        <td class="blue_yan"> </td>
    </tr>
    <tr>
    	<td class="raundlar red_raundlar">
            <div align="center">
                
                <table border="0" class="red_rau" cellspacing="0" cellpadding="0">
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                </table>
                   
            </div>
        </td>
        <td class="red red_puan">RR</td>
        <td class="blue blue_puan">BB</td>
        <td class="raundlar blue_raundlar">
            <div align="center">
                   
                <table border="0" class="blue_rau" cellspacing="0" cellpadding="0">
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                    <tr>
                        <td> </td>
                    </tr>
                </table>    
                   
            </div>
        </td>
    </tr>  
    <tr>
        <td colspan="4" id="time" align="center" class="kronometre">00:00</td>
    </tr> 

</table>
</div>
<div id="dinle" style="color:#000; position:absolute; bottom:40px; background-color:#FFFFFF;">....</div>

