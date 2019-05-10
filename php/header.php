<img src="../homepagebilder/images/logox.png" width="100%" height="auto">
<div class="menu">
<table>
    <tr>
      <th><a href="index.php">Home</a></th>
      <th>Forum</th>
      <th><a href="chat.php">Chat</a></th>
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
      session_start();

      if(isset($_SESSION['angemeldet'])){
        if ($_SESSION['angemeldet'] == 1) {

        }
         else {
          $_SESSION['angemeldet'] = 0;
        }
      } else {
        $_SESSION['angemeldet'] = 0;
      }

     if(isset($_SESSION)) {


			if($_SESSION['angemeldet'] != 1) {
				echo "<a href='../php/logIn.php'> Login </a>";
			}
			else {
        echo "<a href='../html/ProfielÜbersich.html'> Profil </a>";
			}
    } else {
     echo "<a href='../php/logIn.php'> Login </a>";
   }
		#<a href="logIn.php"> Login </a>if($isLoggedIn == 1)		$fpasswort1 == $passwort
	?>
	  </th>
    </tr>
</table>
</div>
