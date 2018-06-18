<?php
    require_once('connection.php');
    set_time_limit(300);
    ini_set('memory_limit', '512M');

    $con = new mysqli($hn, $un, $pw, $db);
    
    $sql = "Select *
            From fotografiaimagenes 
            Where idfotografiaimagen > 625";
    
    $con = new mysqli($hn, $un, $pw, $db);

    $result = $con->query($sql);

    while ($row = $result->fetch_array()) {
        $thumbPath = "imagenesbienes/thumbs/fotografias/" . $row["thumbnail"];
        if (!file_exists($thumbPath)) {
            make_thumb($row["rutaimagen"], $thumbPath, "200");
            echo $row["idfotografia"];
        }
        $thumbPath = null;
    }
    
    

    function make_thumb($src, $dest, $desired_width) {

        /* read the source image */
        $source_image = imagecreatefromjpeg($src);
        $width = imagesx($source_image);
        $height = imagesy($source_image);
        
        /* find the "desired height" of this thumbnail, relative to the desired width  */
        $desired_height = floor($height * ($desired_width / $width));
        
        /* create a new, "virtual" image */
        $virtual_image = imagecreatetruecolor($desired_width, $desired_height);
        
        /* copy source image at a resized size */
        imagecopyresampled($virtual_image, $source_image, 0, 0, 0, 0, $desired_width, $desired_height, $width, $height);
        
        /* create the physical thumbnail image to its destination */
        imagejpeg($virtual_image, $dest);
    }
?>