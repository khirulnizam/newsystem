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
        <form action="kamus-peribahasa.php" method="get">
            <input type="text" name="txt" placeholder="taip sebahagian peribahasa..."><br>
            <input type="submit" name="btntxt" value="Cari peribahasa">
        </form>

    </div>
</div>
</body>
</html>
