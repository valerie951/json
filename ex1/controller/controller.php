<?php
include 'header.php';
function convertImage($source, $dst, $width, $height, $quality){
     $imageSize = getimagesize($source) ;
     $imageRessource= imagecreatefromjpeg($source) ;
     $imageFinal = imagecreatetruecolor($width, $height) ;
     $final = imagecopyresampled($imageFinal, $imageRessource, 0,0,0,0, $width, $height, $imageSize[0], $imageSize[1]) ;
     imagejpeg($imageFinal, $dst, $quality) ;
   } 
if(isset($_POST['submit'])){
$dossier = 'images/';
$fichier = basename($_FILES['file']['name']);
$newName = date('H_i_s');
$taille_maxi = 100000;
$taille = filesize($_FILES['file']['tmp_name']);
$extensions = array('.png', '.gif', '.jpg', '.jpeg' , '.pdf');
$extension = strrchr($_FILES['file']['name'], '.'); 
//Début des vérifications de sécurité...
if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg, jpeg, txt, pdf ou doc...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['file']['tmp_name'], $dossier . $newName. $extension)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {  
          
          convertImage('images/13_50_22.jpg', 'images/new.jpg', '800', '720', 100);




$arr = array('origin' =>$fichier, 'nom' => $newName, 'ext' => $extension, 'taille' => $taille);

$js = file_get_contents('upload.json');
 $js = json_decode($js, true);
$js[] = $arr;
$js = json_encode($js);
file_put_contents('upload.json' , $js);

 header('Location: image.php');
 exit();

     }
     else //Sinon (la fonction renvoie FALSE).
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}
}
    ?>
    