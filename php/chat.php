<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="../css/stylesheet1.css">
</head>
<body>
<img src="../homepagebilder/images/logox.png" width="100%" height="auto">
<div class="menu">
<table>
    <tr>
      <th><a href="index.php">Home</a></th>
      <th>Forum</th>
      <th>Chat</th>
      <th><div class="dropdown">
		<button class="dropbtn"><b>Galerie</b>
			<i class="fa fa-caret-down"></i>
		</button>

    <div class="dropdown-content">
			<a href="#">Winter 2019</a>
			<a href="#">Sommer 2018</a>
			<a href="#">Winter 2018</a>
			<a href="#">Sommer 2017</a>
			<a href="#">Sommer 2016</a>
	</div>
		</div>
		</div></th>
	  <th>
	 <?php
	 if(isset($_SESSION)) {
	
		if($_SESSION['angemeldet'] != 1)
		{
			echo "<a href='../html/logIn.html'> Login </a>";
		}
		else {
			echo "Profil";
		}
	 }
	 else {
		 echo "<a href='../html/logIn.html'> Login </a>";
	 }
		#<a href="logIn.php"> Login </a>if($isLoggedIn == 1)		$fpasswort1 == $passwort
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
      <p><iframe width="450" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" allowtransparency="true" src="https://chatroll.com/embed/chat/wn57?id=495VFZY4Ot7&platform=html"></iframe>
	  </p>
    </div>
</div>
<br>
<div class="footer">
<h2 class="widget-title">powered by</h2>
<br>
<a href="https://www.communardo.de/"><img src="../homepagebilder/images/communardo.png" srcset="../homepagebilder/images/communardoi.png 320w, ../homepagebilder/images/communardom.png 600w, ../homepagebilder/images/communardo.png 900w" alt="Communardo"></a>
<a href="https://www.sap.com/germany/index.html"><img src="../homepagebilder/images/sap.png" srcset="../homepagebilder/images/sapi.png 320w, ../homepagebilder/images/sapm.png 600w, ../homepagebilder/images/sap.png 900w" alt="SAP"></a>
<a href="https://www.t-systems-mms.com/"><img src="../homepagebilder/images/tsystems.png" srcset="../homepagebilder/images/tsystemsi.png 320w,../homepagebilder/images/tsystemsm.png 600w, ../homepagebilder/images/tsystems.png 900w" alt="T-Systems"></a>
</div>
</body>
</html>
