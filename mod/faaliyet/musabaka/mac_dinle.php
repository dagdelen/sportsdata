<svg width="24" height="24" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><circle cx="4" cy="12" r="3"><animate id="spinner_qFRN" begin="0;spinner_OcgL.end+0.25s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="12" cy="12" r="3"><animate begin="spinner_qFRN.begin+0.1s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle><circle cx="20" cy="12" r="3"><animate id="spinner_OcgL" begin="spinner_qFRN.begin+0.2s" attributeName="cy" calcMode="spline" dur="0.6s" values="12;6;12" keySplines=".33,.66,.66,1;.33,0,.66,.33"/></circle></svg>

<?php
include("../../../config.php");
$fid    = $_GET[fid];
$rn   = $_GET[rn];
$gn     = $_GET[gn];


$famussql = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND ring = ?  ORDER BY saat ASC ");
$famussql->execute(array($fid, $_GET[rn]));
if($famussql->rowCount() > 0)
{
foreach($famussql as $mus)
{
$sn++;
    
    $aktifmussql = DB::prepare("SELECT * FROM fa_mus_aktif WHERE fid = ? AND mid = ? AND ring = ?  ");
    $aktifmussql->execute(array($fid, $mus->fa_mus_id, $rn));
    $akt_mus = $aktifmussql->rowCount();
    if($akt_mus > 0){
         ?>
             <script>
                  $(".satir").removeClass("vurgula"); 
                  $(".satir<?=$mus->fa_mus_id?>").addClass("vurgula");
             </script>
         <?php  
 
     }

    if($mus->d < 0){
        ?>
            <script>
                $(".satir<?=$mus->fa_mus_id?>").hide();
            </script>
        <?php  

    }

}
}
?>

     


   