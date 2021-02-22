<?php
include('inc/config.php');
?><!DOCTYPE html>
<head>


</head>
<body>
<?php

$image = $_GET['id'];
$patharray = explode("|",$_GET['fx']);
$path = $patharray[0].'/'.$patharray[1].'/'.$patharray[2];
//copy file & rename
//echo "inc/filters/".$path."/covert-".$patharray[3].".jpg";
copy("".$image."","inc/filters/".$path."/cover-".$patharray[3].".jpg");
//process square
//process thumb
//http://localhost:8080/admin.php?id=photo/photo-upload-5135-23934-51913.jpg&fx=en|classic-filters|artistic|black-and-white-vintage

/*small image*/
$thumbnail_height = 300;
$thumbnail_width = 300;
$source_path = $image;
$thumbnail_image_path = "inc/filters/".$path."/".$patharray[3].".jpg";
list($source_width, $source_height, $source_type) = getimagesize($source_path);

switch ($source_type) {
    case IMAGETYPE_GIF:
        $source_gdim = imagecreatefromgif($source_path);
        break;
    case IMAGETYPE_JPEG:
        $source_gdim = imagecreatefromjpeg($source_path);
        break;
    case IMAGETYPE_PNG:
        $source_gdim = imagecreatefrompng($source_path);
        break;
}

$source_aspect_ratio = $source_width / $source_height;
$desired_aspect_ratio = $thumbnail_width / $thumbnail_height;

if ($source_aspect_ratio > $desired_aspect_ratio) {
    $temp_height = $thumbnail_height;
    $temp_width = ( int ) ($thumbnail_height * $source_aspect_ratio);
} else {
    $temp_width = $thumbnail_width;
    $temp_height = ( int ) ($thumbnail_width / $source_aspect_ratio);
}


$temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
imagecopyresampled(
    $temp_gdim,
    $source_gdim,
    0, 0,
    0, 0,
    $temp_width, $temp_height,
    $source_width, $source_height
);

$x0 = ($temp_width - $thumbnail_width) / 2;
$y0 = ($temp_height - $thumbnail_height) / 2;
$desired_gdim = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
imagecopy(
    $desired_gdim,
    $temp_gdim,
    0, 0,
    $x0, $y0,
    $thumbnail_width, $thumbnail_height
);

imagejpeg($desired_gdim, $thumbnail_image_path, 90);



/*png thumb*/
/*small image*/
$thumbnail_height = 25;
$thumbnail_width = 25;
$source_path = $image;
$thumbnail_image_pathpng = "inc/filters/".$path."/".$patharray[3].".png";
list($source_width, $source_height, $source_type) = getimagesize($source_path);

switch ($source_type) {
    case IMAGETYPE_GIF:
        $source_gdim = imagecreatefromgif($source_path);
        break;
    case IMAGETYPE_JPEG:
        $source_gdim = imagecreatefromjpeg($source_path);
        break;
    case IMAGETYPE_PNG:
        $source_gdim = imagecreatefrompng($source_path);
        break;
}

$source_aspect_ratio = $source_width / $source_height;
$desired_aspect_ratio = $thumbnail_width / $thumbnail_height;

if ($source_aspect_ratio > $desired_aspect_ratio) {
    $temp_height = $thumbnail_height;
    $temp_width = ( int ) ($thumbnail_height * $source_aspect_ratio);
} else {
    $temp_width = $thumbnail_width;
    $temp_height = ( int ) ($thumbnail_width / $source_aspect_ratio);
}


$temp_gdim = imagecreatetruecolor($temp_width, $temp_height);
imagecopyresampled(
    $temp_gdim,
    $source_gdim,
    0, 0,
    0, 0,
    $temp_width, $temp_height,
    $source_width, $source_height
);

$x0 = ($temp_width - $thumbnail_width) / 2;
$y0 = ($temp_height - $thumbnail_height) / 2;
$desired_gdim = imagecreatetruecolor($thumbnail_width, $thumbnail_height);
imagecopy(
    $desired_gdim,
    $temp_gdim,
    0, 0,
    $x0, $y0,
    $thumbnail_width, $thumbnail_height
);

imagepng($desired_gdim, $thumbnail_image_pathpng);
?>
done. you can close this page now.
<br />
Important : this feature will not work for 90° or 270° rotation.
</body>
</html>