<html>
<head>
<meta http-equiv="content-type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css"  href="../css/stylesheet1.css">
</head>
<body>
<?php

include '../php/header.php';

?><div class="row">
   <div class="col-3 col-s-3 menu">
   </div>

    <div class="aside">
<form action="galerie_upload.php" method="post" enctype="multipart/form-data">
    <h1>Wähle ein Bild aus.</h1>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Hochladen" name="submit">
</form>
  </div>
</div>
<br>
<?php

include '../php/footer.php';

?>
</body>
</html>
