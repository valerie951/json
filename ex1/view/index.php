<?php
include 'header.php';
include '../controller/controller.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="row">
        <div class="col-12">
            <h2>merci de télécharger une image</h2>
        </div>
        <form enctype="multipart/form-data" action="" id="formulaire" method="POST">

    
 
    <input type="hidden" name="MAX_FILE_SIZE" value="100000">
            Fichier : <input type="file" name="file">
            <input class="mt-3" type="submit" name="submit" value="Envoyer le fichier">
    </div>
    </div>
    </form>
    </div>

<?php
include 'footer.php';
?>    
</body>
</html>