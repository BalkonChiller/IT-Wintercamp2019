<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="HomepageCSS.css">
</head>
<body>
<img src="logo.png" width="40%" height="auto">
<img src="logo2.png" width="30%" height="auto">
<div class="menu">
<table>
    <tr>
      <th>Home</th>
      <th>Forum</th>
      <th>Chat</th>
      <th>Galerie</th>
	  <th>
	 <?php
		$isLoggedIn = 1;
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
<a href="https://www.communardo.de/"><img src="images/communardo.png" srcset="small.jpg 320w, communardom.png 600w, images/communardo.png 900w" alt="Communardo"></a>
<a href="https://www.sap.com/germany/index.html"><img src="images/sap.png" srcset="small.jpg 320w, sapm.png 600w, images/sap.png 900w" alt="SAP"></a>
<a href="https://www.t-systems-mms.com/"><img src="images/tsystems.png" srcset="small.jpg 320w, tsystemsm.png 600w, images/tsystems.png 900w" alt="T-Systems"></a>
</div>
</body>
</html>