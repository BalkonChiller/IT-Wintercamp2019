<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="stylesheet.css">
</head>
<body>
<img src="logo.jpg" width="50%" height="auto">
<h1>IT-Camp</h1>
<div class="menu">
<table>
    <tr>
      <th><a href="frontend.php">Home</a></th>
      <th>Forum</th>
      <th>Chat</th>
      <th>Gallerie</th>
	  <th>
	 <?php
		$isLoggedIn = 0;
		//$isLoggedIn = $_SESSION["isLoggedIn"];
		if($isLoggedIn == 1) {
			echo "Profil";
		}
		else {
			echo "Login";
		}
	  ?>
	  </th>
    </tr>
</table>
</div>
<br>
<div class="row">
   <div class="col-3 col-s-3 menu">
   </div>

    <div class="aside">
      <h2>Informationen</h2>
      <p>Hier könnte Ihre Werbung stehen</p>
    </div>
</div>
<br>
<div class="footer">
<h2 class="widget-title">powered by</h2>
<br>
<a href="https://www.communardo.de/"><img src="images/communardo.png" alt="Communardo" height="100px"></a>
<a href="https://www.sap.com/germany/index.html"><img src="images/sap.png" alt="SAP" height="100px"></a>
<a href="https://www.t-systems-mms.com/"><img src="images/tsystems.png" alt="T-Systems" height="100px"></a>
</div>
</body>
</html>
