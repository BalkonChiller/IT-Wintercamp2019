<img src="../homepagebilder/images/logox.png" width="100%" height="auto">
<div class="menu">
<table>
    <tr>
      <th><a href="../index.php">Home</a></th>
      <th><a href="../php/forum.php">Forum</a></th>
      <th><a href="../php/globalchat.php">Chat</a></th>
      <th><div class="dropdown">
		<button class="dropbtn"><b>Galerie</b>
			<i class="fa fa-caret-down"></i>
		</button>

    <div class="dropdown-content">
      <a href="../galerie/galerie.php?campid=191">Winter 2019</a>
      <a href="../galerie/galerie.php?campid=180">Sommer 2018</a>
      <a href="../galerie/galerie.php?campid=181">Winter 2018</a>
      <a href="../galerie/galerie.php?campid=170">Sommer 2017</a>
      <a href="../galerie/galerie.php?campid=160">Sommer 2016</a>
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
        echo "<a href='../php/profil.php'> Profil </a>";
			}
    } else {
     echo "<a href='../php/logIn.php'> Login </a>";
   }
?>
	  </th>
    </tr>
</table>
</div>
