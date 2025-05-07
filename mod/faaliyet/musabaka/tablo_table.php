<?php
 // include("mod/faaliyet/musabaka/tablo_style.php");
 if(!$tablo){$tablo = 8;}
?>
<style>
    .table td{min-width:2vw; max-width:350px; padding:3px; height:10px; font-family:"Trebuchet MS", Arial, Helvetica, sans-serif; font-size:1.2vw;}
    .alt{border-left-width: 1px; border-right-width: 1px; border-top-width: 1px; border-bottom-style: solid; border-bottom-width: 1px; border-color:#336699;}
    .sag{border-left-width: 1px; border-right-style: solid; border-right-width: 1px; border-top-width: 1px; border-bottom-width: 1px; border-color:#336699;}

    <?php if($tablo < 5){?>
    .tur1,.tur1k,.tur2,.tur2k,.cey,.ceyk
    {display:none;}
    <?php }?>
    <?php if($tablo < 8 ){?>
    .tur1,.tur1k,.tur2,.tur2k
    {display:none;}
    <?php }?>
    <?php if($tablo < 9 ){?>
    .tur1,.tur1k,.tur2,.tur2k,.ceyk
    {display:none;}
    <?php }?>
    <?php if($tablo < 17 ){?>
    .tur1,.tur1k, .tur2k
    {display:none;}
    <?php } ?>

</style>

<table class="table" border="0" cellspacing="0" cellpadding="0" style=" <?=$yazikrt?> margin:0 0 0 10px;"  >
	<tr style="text-align:center;">
		<td class="tur1 " width="300">TUR1</td><!--5 -->
		<td class="tur2 " width="300">TUR2</td><!--4 -->
		<td class="cey " width="300">ÇEYREK FİNAL</td><!--3 -->
		<td class="yari " width="300">YARI FİNAL</td><!--2 -->
		<td width="300">FİNAL</td><!--1 -->
		<td width="300"><!--WIN--></td>
	</tr>
	<tr class="tur2k ceyk yarik finalk">
		<td class="alt tur1 red "><?=$m321?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk yarik finalk">
		<td class="sag tur1 hakem h32 "><?=$h32?></td>
		<td class="alt tur2 c16 red "><?=$c16?><?=$m161?><?=$m173?><?=$m185?><?=$m197?><?=$m209?><?=$m2111?><?=$m2213?><?=$m2315?><?=$m2417?><?=$m2519?><?=$m2621?><?=$m2723?><?=$m2825?><?=$m2927?><?=$m3029?><?=$m3131?></td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk yarik finalk">
		<td class="alt sag tur1 blue "><?=$m322?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h16 "><?=$h16?></td>
		<td class="alt cey c8 red "><?=$c8?><?=$m81?><?=$m93?><?=$m105?><?=$m117?><?=$m129?><?=$m1311?><?=$m1413?><?=$m1515?></td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk yarik finalk">
		<td class="alt tur1 red "><?=$m311?><?=$m323?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk yarik finalk">
		<td class="sag tur1 hakem h31 "><?=$h31?></td>
		<td class="alt sag tur2 c17 blue "><?=$c17?><?=$m2316?><?=$m162?><?=$m174?><?=$m186?><?=$m198?><?=$m2010?><?=$m2112?><?=$m2214?><?=$m2418?><?=$m2520?><?=$m2622?><?=$m2724?><?=$m2826?><?=$m2928?><?=$m3030?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk yarik finalk">
		<td class="alt sag tur1 blue "><?=$m312?><?=$m324?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey hakem h8 "><?=$h8?></td>
		<td class="alt yari c4 red "><?=$c4?><?=$m41?><?=$m53?><?=$m65?><?=$m77?></td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m301?><?=$m313?><?=$m325?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h30 "><?=$h30?></td>
		<td class="alt tur2 c18 red "><?=$c18?><?=$m151?><?=$m163?><?=$m175?><?=$m187?><?=$m199?><?=$m2011?><?=$m2113?><?=$m2215?><?=$m2317?><?=$m2419?><?=$m2521?><?=$m2623?><?=$m2725?><?=$m2827?><?=$m2929?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m302?><?=$m314?><?=$m326?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h15 "><?=$h15?></td>
		<td class="alt sag cey c9 blue "><?=$c9?><?=$m82?><?=$m94?><?=$m106?><?=$m118?><?=$m1210?><?=$m1312?><?=$m1414?></td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m291?><?=$m303?><?=$m315?><?=$m327?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h29 "><?=$h29?></td>
		<td class="alt sag tur2 c19 blue "><?=$c19?><?=$m152?><?=$m164?><?=$m176?><?=$m188?><?=$m1910?><?=$m2012?><?=$m2114?><?=$m2216?><?=$m2318?><?=$m2420?><?=$m2522?><?=$m2624?><?=$m2726?><?=$m2828?></td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m292?><?=$m304?><?=$m316?><?=$m328?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari hakem h4 "><?=$h4?></td>
		<td class="alt c2 red "><?=$c2?><?=$m21?><?=$m33?></td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m281?><?=$m293?><?=$m305?><?=$m317?><?=$m329?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h28 "><?=$h28?></td>
		<td class="alt tur2 c20 red "><?=$c20?><?=$m141?><?=$m153?><?=$m165?><?=$m177?><?=$m189?><?=$m1911?><?=$m2013?><?=$m2115?><?=$m2217?><?=$m2319?><?=$m2421?><?=$m2523?><?=$m2625?><?=$m2727?></td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m282?><?=$m294?><?=$m306?><?=$m318?><?=$m3210?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h14 "><?=$h14?></td>
		<td class="alt cey c10 red "> <?=$c10?><?=$m71?><?=$m83?><?=$m95?><?=$m107?><?=$m119?><?=$m1211?><?=$m1313?></td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m271?><?=$m283?><?=$m295?><?=$m307?><?=$m319?><?=$m3211?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h27 "><?=$h27?></td>
		<td class="alt sag tur2 c21 blue "><?=$c21?> <?=$m142?><?=$m154?><?=$m166?><?=$m178?><?=$m1810?><?=$m1912?><?=$m2014?><?=$m2116?><?=$m2218?><?=$m2320?><?=$m2422?><?=$m2524?><?=$m2626?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m272?><?=$m284?><?=$m296?><?=$m308?><?=$m3110?><?=$m3212?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey hakem h7 "><?=$h7?></td>
		<td class="alt sag yari c5 blue "><?=$c5?><?=$m42?><?=$m54?><?=$m66?></td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m261?><?=$m273?><?=$m285?><?=$m297?><?=$m309?><?=$m3111?><?=$m3213?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h26 "><?=$h26?></td>
		<td class="alt tur2 c22 red "><?=$c22?><?=$m131?><?=$m143?><?=$m155?><?=$m167?><?=$m179?><?=$m1811?><?=$m1913?><?=$m2015?><?=$m2117?><?=$m2219?><?=$m2321?><?=$m2423?><?=$m2525?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m262?><?=$m274?><?=$m286?><?=$m298?><?=$m3010?><?=$m3112?><?=$m3214?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h13 "><?=$h13?> </td>
		<td class="alt sag cey c11 blue "><?=$c11?><?=$m72?><?=$m84?><?=$m96?><?=$m108?><?=$m1110?><?=$m1212?></td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m251?><?=$m263?><?=$m275?><?=$m287?><?=$m299?><?=$m3011?><?=$m3113?><?=$m3215?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h25 "><?=$h25?></td>
		<td class="alt sag tur2 c23 blue "><?=$c23?><?=$m132?><?=$m144?><?=$m156?><?=$m168?><?=$m1710?><?=$m1812?><?=$m1914?><?=$m2016?><?=$m2118?><?=$m2220?><?=$m2322?><?=$m2424?></td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m252?><?=$m264?><?=$m276?><?=$m288?><?=$m2910?><?=$m3012?><?=$m3114?><?=$m3216?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag hakem h2 "><?=$h2?></td>
		<td class="alt c1 sampiyon " style=" font-weight:bold;">&nbsp; 
            <?php  if($_GET[fson] > 0){?>
            <div style="position:absolute; top:7vw; right:2vw;">
            	<?php
				$qrkod = "http://$_SERVER[SERVER_NAME]$_SERVER[REQUEST_URI]";
				$enboy = 100;
				include("mod/qr/index.php");
				?>
        	</div>
           <?php  }?>
        
			<?=$c1?> 
            <div class="sonuc_list" style="position:absolute; margin-left:1.5vw; margin-top:1vw; max-width:25vw;  ">
            	<div class="birinci"> <?=$birinci?></div>
            	<div class="ikinci"> <?=$ikinci?></div>
            	<div class="ucuncu"> <?=$ucuncu?></div>
            	<div class="dorduncu"> <?=$dorduncu?></div>
            </div>
          
        </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m241?><?=$m253?><?=$m265?><?=$m277?><?=$m289?><?=$m2911?><?=$m3013?><?=$m3115?><?=$m3217?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp;</td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h24 "><?=$h24?></td>
		<td class="alt tur2 c24 red "><?=$c24?><?=$m121?><?=$m133?><?=$m145?><?=$m157?><?=$m169?><?=$m1711?><?=$m1813?><?=$m1915?><?=$m2017?><?=$m2119?><?=$m2221?><?=$m2323?></td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m242?><?=$m254?><?=$m266?><?=$m278?><?=$m2810?><?=$m2912?><?=$m3014?><?=$m3116?><?=$m3218?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h12 "><?=$h12?></td>
		<td class="alt cey c12 red "><?=$c12?><?=$m61?><?=$m73?><?=$m85?><?=$m97?><?=$m109?><?=$m1111?></td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp;</td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m231?><?=$m243?><?=$m255?><?=$m267?><?=$m279?><?=$m2811?><?=$m2913?><?=$m3015?><?=$m3117?><?=$m3219?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h23 "><?=$h23?></td>
		<td class="alt sag tur2 c25 blue "><?=$c25?><?=$m122?><?=$m134?><?=$m146?><?=$m158?><?=$m1610?><?=$m1712?><?=$m1814?><?=$m1916?><?=$m2018?><?=$m2120?><?=$m2222?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m232?><?=$m244?><?=$m256?><?=$m268?><?=$m2710?><?=$m2812?><?=$m2914?><?=$m3016?><?=$m3118?><?=$m3220?></td>
		<td class="tur2 tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="tur2 tur2 ">&nbsp; </td>
		<td class="sag cey hakem h6 "><?=$h6?></td>
		<td class="alt yari c6 red "><?=$c6?><?=$m31?><?=$m43?><?=$m55?></td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m221?><?=$m233?><?=$m245?><?=$m257?><?=$m269?><?=$m2711?><?=$m2813?><?=$m2915?><?=$m3017?><?=$m3119?><?=$m3221?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h22 "><?=$h22?></td>
		<td class="alt tur2 c26 red "><?=$c26?><?=$m111?><?=$m123?><?=$m135?><?=$m147?><?=$m159?><?=$m1611?><?=$m1713?><?=$m1815?><?=$m1917?><?=$m2019?><?=$m2121?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m222?><?=$m234?><?=$m246?><?=$m258?><?=$m2610?><?=$m2712?><?=$m2814?><?=$m2916?><?=$m3018?><?=$m3120?><?=$m3222?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h11 "><?=$h11?></td>
		<td class="alt sag cey c13 blue "><?=$c13?><?=$m62?><?=$m74?><?=$m86?><?=$m98?><?=$m1010?></td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m211?><?=$m211?><?=$m223?><?=$m235?><?=$m247?><?=$m259?><?=$m2611?><?=$m2713?><?=$m2815?><?=$m2917?><?=$m3019?><?=$m3121?><?=$m3223?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h21 "><?=$h21?></td>
		<td class="alt sag tur2 c27 blue "><?=$c27?><?=$m112?><?=$m124?><?=$m136?><?=$m148?><?=$m1510?><?=$m1612?><?=$m1714?><?=$m1816?><?=$m1918?><?=$m2020?> </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m212?><?=$m224?><?=$m236?><?=$m248?><?=$m2510?><?=$m2612?><?=$m2714?><?=$m2816?><?=$m2918?><?=$m3020?><?=$m3122?><?=$m3224?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td class="sag ">&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari hakem h3 "><?=$h3?></td>
		<td class="alt sag c3 blue "><?=$c3?><?=$m22?></td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m201?><?=$m213?><?=$m225?><?=$m237?><?=$m249?><?=$m2511?><?=$m2613?><?=$m2715?><?=$m2817?><?=$m2919?><?=$m3021?><?=$m3123?><?=$m3225?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h20 "><?=$h20?></td>
		<td class="alt tur2 c28 red "><?=$c28?><?=$m101?><?=$m113?><?=$m125?><?=$m137?><?=$m149?><?=$m1511?><?=$m1613?><?=$m1715?><?=$m1817?><?=$m1919?></td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m202?><?=$m214?><?=$m226?><?=$m238?><?=$m2410?><?=$m2512?><?=$m2614?><?=$m2716?><?=$m2818?><?=$m2920?><?=$m3022?><?=$m3124?><?=$m3226?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h10 "><?=$h10?></td>
		<td class="alt cey c14 red "><?=$c14?><?=$m51?><?=$m63?><?=$m75?><?=$m87?><?=$m99?></td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m191?><?=$m203?><?=$m215?><?=$m227?><?=$m239?><?=$m2411?><?=$m2513?><?=$m2615?><?=$m2717?><?=$m2819?><?=$m2921?><?=$m3023?><?=$m3125?><?=$m3227?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h19 "><?=$h19?></td>
		<td class="alt sag tur2 c29 blue "><?=$c29?><?=$m102?><?=$m114?><?=$m126?><?=$m138?><?=$m1410?><?=$m1512?><?=$m1614?><?=$m1716?><?=$m1818?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m192?><?=$m204?><?=$m216?><?=$m228?><?=$m2310?><?=$m2412?><?=$m2514?><?=$m2616?><?=$m2718?><?=$m2820?><?=$m2922?><?=$m3024?><?=$m3126?><?=$m3228?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="sag yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey hakem h5 "><?=$h5?></td>
		<td class="alt sag yari c7 blue "><?=$c7?><?=$m32?><?=$m44?></td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m181?><?=$m193?><?=$m205?><?=$m217?><?=$m229?><?=$m2311?><?=$m2413?><?=$m2515?><?=$m2617?><?=$m2719?><?=$m2821?><?=$m2923?><?=$m3025?><?=$m3127?><?=$m3229?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="ceyk ">
		<td class="sag tur1 hakem h18 "><?=$h18?></td>
		<td class="alt tur2 c30 red "><?=$c30?><?=$m91?><?=$m103?><?=$m115?><?=$m127?><?=$m139?><?=$m1411?><?=$m1513?><?=$m1615?><?=$m1717?></td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt sag tur1 blue "><?=$m182?><?=$m194?><?=$m206?><?=$m218?><?=$m2210?><?=$m2312?><?=$m2414?><?=$m2516?><?=$m2618?><?=$m2720?><?=$m2822?><?=$m2924?><?=$m3026?><?=$m3128?><?=$m3230?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="sag cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr>
		<td class="tur1 ">&nbsp; </td>
		<td class="sag tur2 hakem h9 "><?=$h9?></td>
		<td class="alt sag cey c15 blue "><?=$c15?><?=$m52?><?=$m64?><?=$m76?><?=$m88?></td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk ">
		<td class="alt tur1 red "><?=$m171?><?=$m183?><?=$m195?><?=$m207?><?=$m219?><?=$m2211?><?=$m2313?><?=$m2415?><?=$m2517?><?=$m2619?><?=$m2721?><?=$m2823?><?=$m2925?><?=$m3027?><?=$m3129?><?=$m3231?></td>
		<td class="sag tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class=" ceyk yarik finalk">
		<td class="sag tur1 hakem h17 "><?=$h17?></td>
		<td class="alt sag tur2 c31 blue "><?=$c31?><?=$m92?><?=$m104?><?=$m116?><?=$m128?><?=$m1310?><?=$m1412?><?=$m1514?><?=$m1616?></td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
	<tr class="tur2k ceyk yarik finalk">
		<td class="alt sag tur1 blue "><?=$m172?><?=$m184?><?=$m196?><?=$m208?><?=$m2110?><?=$m2212?><?=$m2314?><?=$m2416?><?=$m2518?><?=$m2620?><?=$m2722?><?=$m2824?><?=$m2926?><?=$m3028?><?=$m3130?><?=$m3232?></td>
		<td class="tur2 ">&nbsp; </td>
		<td class="cey ">&nbsp; </td>
		<td class="yari ">&nbsp; </td>
		<td>&nbsp; </td>
		<td>&nbsp; </td>
	</tr>
</table>