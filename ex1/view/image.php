<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="header">
<h2>{ JSON }</h2>
</div>
<div class="body">
<div class="container">
<?php
$images = file_get_contents('upload.json');
$images = json_decode($images, true) ;
for($i=0; $i<count($images); $i++):
?>
<div class="content">
<b><?php echo $images[$i]['file']; ?></b>
</div>
<?php endfor; ?>
</div>
</div>
    
</body>
</html>