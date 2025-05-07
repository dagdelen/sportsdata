<ul class="sidebar-nav" id="sidebar-nav">

<li class=""><?=$uye?>=<?=$ip?></li>

  <?php 
if($uye)
{
      $faaliyetsql =  "SELECT * FROM faaliyet ORDER BY faaliyet_id DESC ";
      $faali = DB::prepare($faaliyetsql);
      $faali->execute();
      foreach($faali as $fa)
      {
          ?>
          <hr>
        <a class="btn btn-outline-success btn-sm  <?php  if($_GET[e] == $fa->faaliyet_id){?> active <?php  }?> " 
        href="/?mod=faaliyet&m=gorev&e=<?=$fa->faaliyet_id?>"
        style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
          <li class="nav-heading" <?php  if($_GET[e] == $fa->faaliyet_id){?> style="color:#FFFFFF;" <?php  }else{?>style="color:#336699;" <?php  } ?> ><?=$fa->faaliyet_ad?></li>
        </a>


        <?php if($_GET[g] != "local"){ ?>     <?php } ?>         
            <div class="m-2">   
              <?php
              $gad = $_GET[g];
              $faringgsql =  "SELECT * FROM fa_mus_ring WHERE fid = ? ";
              $frngparams = array($fa->faaliyet_id);	
              $frgstmt = DB::prepare($faringgsql);
              $frgstmt->execute($frngparams);
              foreach($frgstmt as $frng)
              { 	
                
                  $famusgunlersql =  "SELECT * FROM fa_mus WHERE fid = ? AND ring = ? AND gun > -1 AND blue > 0 GROUP BY gun ORDER BY gun ASC";
                  $musgparams = array($fa->faaliyet_id, $frng->fa_mus_ring_id);	
                  $musgstmt = DB::prepare($famusgunlersql);
                  $musgstmt->execute($musgparams);
                  foreach($musgstmt as $msgun)
                  {
                                        
                    $gunmussqysql = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND ring = ? AND gun = ?  AND blue > 0 AND d > -1 ");
                    $gunmussqysql->execute(array($fa->faaliyet_id, $frng->fa_mus_ring_id, $msgun->gun));
                    $msbk_say = $gunmussqysql->rowCount();	  	
                      ?>
                                    
                      <a href="/?mod=faaliyet&m=gorev&e=<?=$fa->faaliyet_id?>&g=mac&rn=<?=$frng->fa_mus_ring_id?>&gn=<?=$msgun->gun?>" 
                      class="btn btn-outline-success btn-sm position-relative m-1 <?php  if($gad == "mac" && $_GET[rn] == $frng->fa_mus_ring_id && $_GET[gn] == $msgun->gun){?> active <?php  }?> "
                      style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                          <?=$frng->fa_mus_ring_ad?> <?=$msgun->gun?>
                                                
                          <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                            <?=$msbk_say?>
                            <span class="visually-hidden">unread messages</span>
                          </span>
                                                
                      </a>  
                      <?php
                  }
                      if($musgstmt->rowCount() > 0){
                        $sonmusqli = DB::prepare("SELECT * FROM fa_mus WHERE fid = ? AND ring = ? AND tur = 0 ");
                        $sonmusqli->execute(array($fa->faaliyet_id, $frng->fa_mus_ring_id));
                        $musn = $sonmusqli->fetch(PDO::FETCH_ASSOC);
                        $sonmu_say = $sonmusqli->rowCount();
                          if($sonmu_say > 0){
                                            
                              ?>
                              <a href="/?mod=faaliyet&m=gorev&e=<?=$fa->faaliyet_id?>&g=mac&rn=<?=$frng->fa_mus_ring_id?>&gn=son" 
                                class="btn btn-outline-success btn-sm <?php  if($gad == "mac" && $_GET[rn] == $frng->fa_mus_ring_id && $_GET[gn] == "son"){?> active <?php  }?> " 
                                style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" >
                                  <?=$frng->fa_mus_ring_ad?> <?=_sonuc?>
                              </a>
                              <?php
                          }
                            ?>
                            <div> </div> 
                            <?php
                      }
              }
              ?>
            </div>
                         

          <?php 
      }
}
  ?>







 

</ul>