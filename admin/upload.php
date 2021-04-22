<?php
include 'conexao.php';

$base_img_dir = "uploads/";

$img_conv_dir = "bin/";

$table = "fotos_evento";

$uniq = uniqid("");

$filename = $base_img_dir.$uniq;

move_uploaded_file($HTTP_POST_FILES["file"]["tmp_name"],$filename);

$imginfo = getimagesize($filename);

switch ($imginfo[2]) {
    case 1: // Convertendo gif para png

        $command = $img_conv_dir."gif2png $filename";
        exec($command);
        unlink($filename);
        rename("$filename.png", $filename);
        $img = imagecreatefrompng($filename);
        imagepng($img, $filename);
        imagedestroy($img);
        
        $img_type = "PNG";
        break;
    case 2: // jpeg
        
        $img = imagecreatefromjpeg($filename);
        imagejpeg($img, $filename);
        imagedestroy($img);
        
        $img_type = "JPG";
        break;

    case 3: // png

        $img = imagecreatefrompng($filename);
        imagepng($img, $filename);
        imagedestroy($img);
        
        $img_type = "PNG";
        break;
    case 4: // bmp

        rename($filename, "$filename.bmp");
        
        // convertendo bmp para png
        $command = $img_conv_dir."bmptoppm $filename.bmp | ".
                   $img_conv_dir."pnmtopng > $filename";
        exec($command);
        unlink("$filename.bmp");
        $img = imagecreatefrompng($filename);
        imagepng($img, $filename);
        imagedestroy($img);
        
        $img_type = "PNG";
        break;

    default:
        break;
}
$imgbytes = filesize($filename);

$sql = "INSERT INTO $table (img_file, img_type, img_height,
   img_width, img_bytes, img_alt, ano)
  VALUES('$uniq', '$img_type', ".$imginfo[1].", ".$imginfo[0].",
         $imgbytes,'".addslashes($HTTP_POST_VARS["alt"])."', '$ano');";
$inserir = mysqli_query($conexao,$sql);

echo "Imagem upada.<br><img src=\"img.php?f($uniq)+x(300)\"><br>".
     "URL: img.php?f($uniq)";
?>