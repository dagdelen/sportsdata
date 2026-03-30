<?php 
  include("config.php"); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>e-sportsdata.com</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <link href="<?=$favicon?>" rel="icon">
  <link href="<?=$apple_touch_icon?>" rel="apple-touch-icon">

  <script src="assets/js/jquery-3.7.1.js"></script>
  <script src="assets/js/1.14.1/jquery-ui.js"></script>
  <link rel="stylesheet" href="assets/css/jquery-ui.css">

   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">

  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">

  <link href="assets/css/style.css" rel="stylesheet">

</head>

<body>

  <header id="header" class="header fixed-top d-flex align-items-center">
    <?php  
     include("ust.php"); 
    ?> 
</header>
  <aside id="sidebar" class="sidebar">
    <?php  
       include("yan.php"); 
   ?>  
</aside>
  <main id="main" class="main mt-5">
    <?php  
      include("ana.php"); 
    ?>
</main>


  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>e-SportsData.com</span></strong>. All Rights Reserved
    </div>
  </footer>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/js/moment.min.js"></script>

  <script src="assets/vendor/quill/quill.min.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>

  <script src="assets/js/main.js"></script>

<script src="assets/cdn/dataTables.js"></script>
<script src="assets/cdn/dataTables.buttons.js"></script>
<script src="assets/cdn/buttons.dataTables.js"></script>
<script src="assets/cdn/jszip.min.js"></script>
<script src="assets/cdn/pdfmake.min.js"></script>
<script src="assets/cdn/vfs_fonts.js"></script>
<script src="assets/cdn/buttons.html5.min.js"></script>
<script src="assets/cdn/buttons.print.min.js"></script>

<link href="assets/cdn/dataTables.dataTables.css" rel="stylesheet">
<link href="assets/cdn/buttons.dataTables.css" rel="stylesheet">

<script type="text/javascript" src="assets/cdn/bootstrap.min.js"></script> 


<?php 
   include("mod/ana_modal.php"); 
?>
</body>

</html>