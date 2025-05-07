<?php
if($uye > 0){
  ?>
    <script>
        window.location='./';
      </script>    
  <?php
  }
?>

<div class="col-lg-6 m-0 p-0 m-auto">
	<div class="card">
	<div class="card-body">
    
<?php
if (isset($_POST['gsm'], $_POST['sifre'])) 
{
	

	    $gsm = trim(filter_input(INPUT_POST, 'gsm', FILTER_SANITIZE_STRING));  
			$gsm = str_replace(str_split('\\/:*?"<>)(|+- '), '', $gsm); 
			$gsm = substr($gsm, -10);
	    $sifre = trim(filter_input(INPUT_POST, 'sifre', FILTER_SANITIZE_NUMBER_INT));
	    $hata = 0;
	
       

	if (empty($gsm) || empty($sifre)) 
	{ 
		?><div class="alert alert-danger p-2 mb-2" role="alert">Lütfen formu eksiksiz doldurun!</div><?php
		$hata = 1;
	}

	if($hata == 0){
 echo" $gsm, $sifre ";
            $login = DB::prepare("SELECT * FROM uye WHERE gsm = ? AND pin = ? ");
            $login->execute(array($gsm, $sifre));
            $l = $login->fetch(PDO::FETCH_ASSOC);

            if($l){
                 echo '<span style="color:blue;">Giriş Başarılı</span>';
                $_SESSION["uye"] = $l["uye_id"];
				        setcookie("uye","$l[uye_id]",time()+3600*24);
                header("location:/$sub");
				        echo "<script>window.location='/$sub'</script>";
            }
            else{
                echo '<span style="color:red;">Kullanıcıadı Şifrenizi Hatalı Girdiniz</span>';
            }			
	}

}
?>

  <div class="m-3" style="display:block; height:75px;">
    <img class=" m-0 float-start" src="<?=$logo?>" alt="" width="72" height="72">
    <h4 class=" m-1 fw-normal float-none"> <?=_Uye_Giris?></h4>
    <h5 class=" fw-normal float-none" > <?=$yer_ad?></h5>
  </div>
  
  <form id="uyegir" action="" method="post">

    <div class="form-floating mb-1" id="kul">
      <input type="text" value="" name="gsm" class="form-control" id="floatingInput">
      <label for="kul"><?=_Gsm_no?></label>
    </div>
    <div class="form-floating mb-1" id="sif">
      <input type="password" value="" name="sifre" class="form-control" id="floatingPassword">
      <label for="sif">pin</label>
    </div>

    <div class="form-floating mt-3">
        <button class="btn btn-primary col-lg-4 py-2" type="submit"><?=_Giris?></button>
     </div>
   
    <div class="form-floating text-start mt-4">

    </div>
   
   
  </form>
  
  
	</div>
	</div>
</div>
        


        