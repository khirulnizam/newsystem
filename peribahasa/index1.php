<html>
<head>
<title>Cari peribahasa dari teks bahasa Melayu - capaian Mobile</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/themes/peribahasa2.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
  <link rel="stylesheet" href="css/jquery.mobile.structure-1.4.5.min.css" /> 
  <script src="js/jquery-1.11.1.min.js"></script> 
  <script src="js/jquery.mobile-1.4.5.min.js"></script>
<?php
//include "analytics.php";
?>
</head>

<body bgcolor="#C8FCC2">
<!-- main page -->
<div data-role="page" id="carian-peribahasa">
	<!-- header -->
	<div data-role="header" data-position="fixed">
		<h1>Peribahasa Dictionary</h1>
	</div>
	
	<!-- content -->
	<div role="main" class="ui-content">
        <img src="peribahasa-melayu.png" 
        alt="Banner Peribahasa melayu" 
        width="100%">
    <script>
    function carian(){
       let string = document.getElementById("txt").value;
       if (!string || string.length === 0){
           alert("Pastikan taip carian peribahasa anda");
           document.getElementById("txt").focus();
       }
       else{
        window.location.replace("kamus-peribahasa.php?txt="+string);
       }
    }
    function cadangan(){
       let string = document.getElementById("txt").value;
       if (!string || string.length === 0){
           alert("Pastikan taip carian peribahasa anda");
           document.getElementById("txt").focus();
       }
       else{
            window.location.replace("and-cadang-peribahasa.php?txt="+string);
        }
    }
    </script>
        <form action="#" method="get">
            <input type="text" id="txt" name="txt" placeholder="taip sebahagian peribahasa..."><br>
            <input type="button" name="btntxt" 
            value="Carian peribahasa" onClick="carian()">
            <input type="button" name="btntxt" 
            value="Cadangan peribahasa" onClick="cadangan()">
        </form>


    <hr>
    <p align="center">
<a href="http://khirulnizam.com">Dibangunkan oleh http://khirulnizam.com</a><br>

<a href="https://www.facebook.com/khirulnizam"><img src="peribahasa-google-play-150.png"></a><br>
<a href="https://www.facebook.com/khirulnizam">hubungi kami di Facebook</a><br>

</p>
	</div><!-- end content -->
	
	<!-- footer -->
	<!-- footer -->
	<div data-role="footer" data-position="fixed">
		Pembangun khirulnizam.com
	</div><!-- end footer -->
</div><!-- end of Carian Peribahasa -->
</body>
</html>
