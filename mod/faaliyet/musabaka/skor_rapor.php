<?php 
    $fid 	= $_GET[f];
    $ring_id= $_GET[r];
    $mus_id = $_GET[m];
    $modal = $_GET[md];

	    if($modal == 1){ 
        /* ?><script src="https://cdn-script.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script><?php  */		
            ?><script src="../../../assets/js/jquery.min.js"></script><?php 
        
            $faaliyetim_eki = "";  
             $vw = "22vw"; // iframe ise
        //	$vw = "7vw";
            $theight = "90%";
            $rtop = "2em";
            $skr = "0.3em";
            $skr_pn = "0.1em";
            // $ring = $ring_id;
        }else{
            
            
            $faaliyetim_eki = "mod/faaliyet/musabaka/";	
            $vw = "22vw"; 
            $theight = "97%"; 
            $rtop = "1.6em";
            $skr = "0.5em";
            $skr_pn = "0.0001em";
            
            $fid = $_GET[f];
            $ring_id = $_GET[r];
        }

 ?>
 <script>
	$(document).ready(function() {
		$("#dinle").load("<?=$faaliyetim_eki?>skor_rapor_dinle.php");
		var refreshId = setInterval(function() {
			$("#dinle").load('<?=$faaliyetim_eki?>skor_rapor_dinle.php?f=<?=$fid?>&r=<?=$ring_id?>&m=<?=$mus_id?>&md=<?=$modal?>&randval='+ Math.floor(Math.random() * 1000));
		}, 1000);
	});
</script>

<div id="dinle" style="color:#000; background-color:#FFFFFF;">....</div>