    <div class="d-flex align-items-center justify-content-between">
      <a href="./" class="logo d-flex align-items-center">
        <span class="d-none d-lg-block" style="font-size:1.2em;">localhost <?=_Sicil_Sistem?> </span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
      <!--  border:1px solid #E4E4E4;  -->
		<li class="nav-item d-block d-lg-none" style="margin-right:3px; font-size:0.9em; padding:1px;">
       <?php if($yer_kisa){?>
			<div><?=$yer_kisa?>  <?=_Sicil_Sistem?></div>
        <?php }else{?>
			<div><?=mb_substr($yer_ad,0,20, 'UTF-8')?></div>
        <?php }?>
            
        </li>

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#" style="margin-right:5px;">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->


         <?php if($uye > 0){?>
         
         		<?php if($benyetki_say == 1){?>
                
                	<div class="d-none d-md-block m-1" style="max-width:140px; font-size:0.8em;">
                      <?=mb_substr($yetki_yerin_adi,0,20, 'UTF-8')?>
                	</div>
                    
         		<?php }else if($benyetki_say > 1){?>
                	<?php if($yetki){?>  
                		<div class="d-none d-md-block m-1" style="max-width:140px; font-size:0.8em;">
                      		<?=mb_substr($yetki_yerin_adi,0,20, 'UTF-8')?> 
                      		
                		</div>
					<?php }?>
                    <li class="nav-item dropdown">
                    
                      <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-gear <?php if(!$yetki){?> vurgula <?php }?>"></i>
                        <small><span class="badge bg-success badge-number" style="font-size:0.5em; margin-left:10px;"><?=$benyetki_say?></span></small>
                      </a> 
            
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages p-0">
                        <li class="dropdown-header"><?=_Yetkileriniz?></li>
                        <li><hr class="dropdown-divider"></li>
                        <?php 
                        $yetkiquery = "SELECT * FROM yetki WHERE uye = ? ORDER BY yetki_id ASC";
                        $params = array($uye);
                        $yetk = DB::prepare($yetkiquery);
                        $yetk->execute($params);
                        foreach($yetk as $ytk)
                        {     
                        $yetyer = $ytk->yer;
                        $yetbrs = $ytk->brans;
                        $yetstl = $ytk->stil;
                        
						
                             if($yetyer == "org"){
								 $ner ="Organizasyon";
								 $ner_id_krt = "org_id";
								 $ner_ad_krt = "org_ad";
							 }else if($yetyer == "dunya"){
								 $ner ="Dünya";
								 $ner_id_krt = "dunya_id";
								 $ner_ad_krt = "dunya_ad";
                             }else if($yetyer == "kita"){
								 $ner ="Kıta";
								 $ner_id_krt = "kita_id";
								 $ner_ad_krt = "kita_ad";
                             }else if($yetyer == "ulke"){
								 $ner ="Ülke";
								 $ner_id_krt = "ulke_id";
								 $ner_ad_krt = "ulke_ad";
                             }else if($yetyer == "bolge"){
								 $ner ="Bölge";
								 $ner_id_krt = "bolge_id";
								 $ner_ad_krt = "bolge_ad";
                             }else if($yetyer == "il"){
								 $ner ="İl";
								 $ner_id_krt = "il_id";
								 $ner_ad_krt = "il_ad";
                             }else if($yetyer == "ilce"){
								 $ner ="İlçe";
								 $ner_id_krt = "ilce_id";
								 $ner_ad_krt = "ilce_ad";
                             }else if($yetyer == "kulup"){
								 $ner ="Kulüp";
								 $ner_id_krt = "kulup_id";
								 $ner_ad_krt = "kulup_ad";
                             }else if($yetyer == "sube"){
								 $ner ="Şube";
								 $ner_id_krt = "sube_id";
								 $ner_ad_krt = "sube_ad";
                             }						
						
						
						
                            $yersqli = DB::prepare("SELECT * FROM ".$ytk->yer." WHERE ".$ner_id_krt." = ? ");
                            $yersqli->execute(array($ytk->yer_id));
                            $yerrr = $yersqli->fetch(PDO::FETCH_ASSOC);
                            
                            $brssqli = DB::prepare("SELECT * FROM brans WHERE id = ? ");
                            $brssqli->execute(array($yetbrs));
                            $ybrs = $brssqli->fetch(PDO::FETCH_ASSOC);
                            
                            $stlsqli = DB::prepare("SELECT * FROM stil WHERE id = ? ");
                            $stlsqli->execute(array($yetstl));
                            $ystl = $stlsqli->fetch(PDO::FETCH_ASSOC);
                            
                        ?>
                        
            
                        <li class="message-item p-1">
                          <a href="?a=<?=$ytk->yer?>&yi=<?=$ytk->yer_id?>" title="<?=$yerrr[$ner_ad_krt]?>">
                           <!-- <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">-->
                            <div style="min-width:300px; ">
                            
                             	<?php if($yetki_id == $ytk->yer_id){ ?>
                                    <div>
                                        <h4 style="color:#336699;">
                                            <small><?=$ner?> <?=$ybrs[ad]?> <?=$ystl[ad]?>: </small>
                                            <small><b><?=mb_substr($yerrr[$ner_ad_krt],0,30, 'UTF-8')?></b></small>
                                        </h4>
                                    </div>
                                 <?php }else{?>
                                    <div>
                                        <h4>
                                            <small><?=$ner?> <?=$ybrs[ad]?> <?=$ystl[ad]?>: </small> 
                                            <small><?=mb_substr($yerrr[$ner_ad_krt],0,30, 'UTF-8')?></small>
                                           
                                        </h4>
                                    </div>
                              <?php }?>                  
                              
                            </div>
                          </a>
                        </li>
                        <li>
                          <hr class="dropdown-divider">
                        </li>            
                        <?php            
                        }	
                        ?>	
                         <li><hr class="dropdown-divider"></li>
                      </ul><!-- End Messages Dropdown Items -->
            
                    </li>
         
         
         		<?php }?>
         
         
         
                    <li class="nav-item dropdown pe-3">
            
                      <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="<?=$resim?>" alt="Profile" class="rounded-circle">
                        <span class="d-none d-md-block dropdown-toggle ps-2"><?=$ad?> <?=$soyad?></span>
                      </a><!-- End Profile Iamge Icon -->
            
                      <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="">
                        <li class="dropdown-header">
                          <h6><?=$ben_adsoyad?></h6>
                          <!--<span>Yetki???</span>-->
                        </li>
                        
                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
                        <li>
                          <a class="dropdown-item d-flex align-items-center" href="?mod=uye&m=profil">
                            <i class="bi bi-person"></i>
                            <span>Profil</span>
                          </a>
                        </li>

                        <li>
                          <hr class="dropdown-divider">
                        </li>
            
            
                        <li class="nav-item dropdown pe-3">
                          <a class="dropdown-item d-flex align-items-center" href="?mod=uye&m=out">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Çıkış</span>
                          </a>
                        </li>
            
            
            
                      </ul><!-- End Profile Dropdown Items --> 
                    </li><!-- End Profile Nav -->
         <?php }else{?>

            <li class="nav-item pe-3">  
                <a href="?mod=uye&m=ol" class="text-decoration-none nav-link nav-profile d-flex align-items-center pe-0" >
                   <span class="d-none d-md-block ps-2"><small><?=_Uye_ol?></small></span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                      <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                      <path d="M2 13c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4"/>
                    </svg>    
                </a>
            </li>  
            
            <li class="nav-item  dropdown pe-3">
                <a href="?mod=uye&m=gir" class="text-decoration-none nav-link nav-profile d-flex align-items-center pe-0" > 
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-fill-lock" viewBox="0 0 16 16">
                        <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5v-1a2 2 0 0 1 .01-.2 4.49 4.49 0 0 1 1.534-3.693Q8.844 9.002 8 9c-5 0-6 3-6 4m7 0a1 1 0 0 1 1-1v-1a2 2 0 1 1 4 0v1a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1h-4a1 1 0 0 1-1-1zm3-3a1 1 0 0 0-1 1v1h2v-1a1 1 0 0 0-1-1"/>
                    </svg>
                    <span class="d-none d-md-block ps-1"><small><?=_giris?></small></span>
                 </a>   
                  <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile" style="">
                        <li class="dropdown-header">
                          <h6>giriş</h6>
                        
                        </li>
                        
                        <li>
                          <hr class="dropdown-divider">
                        </li>
					</ul>  
            </li>         
         <?php }?>
         <!-- End Profile Nav -->
         

      </ul>
    </nav><!-- End Icons Navigation -->