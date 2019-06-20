<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" content="text/css" href="../css/hpstyle.css">
        <title>IT-Camp/passwortvergessen</title>
    </head>
    <body>
        <?php
            include '../php/header.php';
        ?>
        <div class="row">
            <div class="col-3 col-s-3 menu"></div>
            <div class="aside">
                <h1>IT-Camp</h1>
                <h2>Passwort vergessen</h2>
                <br/>
                <form action="Passwortvergessen.php" method="post">
                    <input type="email" name="femail" placeholder="Email" class="vergessen">
                    <br/><br/>
                    <input type="submit" class="btn btn-danger">
                </form>
            </div>
        </div>
        <?php
            include '../php/footer.php';
        ?>
    </body>
</html>
