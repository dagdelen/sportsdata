<script>
 $(document).ready(function () {
	$(".ana_modal").click(function(){
		var element = $(this);
        var id = element.attr("id");
        var m = element.attr("m");
        var t = element.attr("t");
        var k = element.attr("k");
        var md = element.attr("md");
        var ad = element.attr("ad");

    $(".ana_modal_baslik").html(ad);    
    $(".modal-dialog").addClass(md);    

		$(".ana_modal_islem").html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'ana_modal=' + m  + '&t=' + t  + '&k=' + k  + '&id=' + id;
		$.ajax({
			type: "POST"
			,url: "ajx.php",
			data: info,
			success: function(html){
				$(".ana_modal_islem").html(html).show();
			}
		});	
	});
	
	$(".kalan_modal").click(function(){
		var element = $(this);
        var id = element.attr("id");
        var m = element.attr("m");
        var t = element.attr("t");
        var k = element.attr("k");
        var md = element.attr("md");
        var ad = element.attr("ad");

    $(".kalan_modal_baslik").html(ad);   
	$(".modal-dialog").addClass(md);   
	 
		$(".kalan_modal_islem").html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'ana_modal=' + m  + '&t=' + t  + '&k=' + k  + '&id=' + id;
		$.ajax({
			type: "POST",
			url: "ajx.php",
			data: info,
			success: function(html){
				$(".kalan_modal_islem").html(html).show();
			}
			});	
		
		
		
	});
	
	
  $("#myModal").on('show.bs.modal', function (e) {
 
    var triggerLink = $(e.relatedTarget);

    var mod = triggerLink.data("mod");
    var m = triggerLink.data("m");
    var id = triggerLink.data("id");
    var g = triggerLink.data("g");
    var md = triggerLink.data("md");
    var ad = triggerLink.data("ad");
 
	$(".baslik").html(ad); 
	$(".modal-dialog").addClass(md);  
 
 	$(".modal-body").html('<div class="spinner-border spinner-border-sm" role="status"><span class="visually-hidden">Loading...</span></div>').show();
		var info = 'modal=' + mod  + '&m=' + m  + '&id=' + id  + '&g=' + g;
		
		$.ajax({
			type: "POST",
			url: "ajx.php?m=" + m  +"&e=" + id +" ",
			data: info,
			success: function(html){
				$(".modal-body").html(html).show();
			}
			});	 
  });
	
 });
</script>	
                               <!--   modal-auto-clear    data-backdrop="static"  -->
<div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"  role="dialog">
 <!--    
	<div class="modal fade" id="myModal"  data-backdrop="static" >
  -->    
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header"><div class="baslik"></div>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
          </div>
          
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default " data-dismiss="modal"><?=_kapat?></button>
          </div>
 
        </div>
      </div>
    </div>

    
<div class="modal fade" id="ana_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" <?php if($_GET[n]=="pln"){?>data-bs-backdrop="static" <?php }?>>
  <div class="modal-dialog">
    <div class="modal-content mt-0">
      <div class="modal-header">
        <h5 class="ana_modal_baslik"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="ana_modal_islem"></div>
      </div>
              <div class="modal-footer">
               	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">iptal</button>
              </div> 
    </div>
  </div>
</div>

<div class="modal fade" id="kalan_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog">
    <div class="modal-content mt-0">
      <div class="modal-header">
        <h5 class="kalan_modal_baslik"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="kalan_modal_islem"></div>
      </div>
              <div class="modal-footer">
               	<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">iptal</button>
              </div> 
    </div>
  </div>
</div>

