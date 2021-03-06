<?php
    set_time_limit(300);
    ini_set('memory_limit', '512M');
    if(isset($_FILES["imgInp"]["type"]))
    {
        $validextensions = array("jpeg", "jpg", "png");
        $temporary = explode(".", $_FILES["imgInp"]["name"]);
        $file_extension = end($temporary);
        if ((($_FILES["imgInp"]["type"] == "image/png") || ($_FILES["imgInp"]["type"] == "image/jpg") || ($_FILES["imgInp"]["type"] == "image/jpeg"))) {
                if ($_FILES["imgInp"]["error"] > 0)
                {
                    echo "Return Code: " . $_FILES["imgInp"]["error"] . "<br/><br/>";
                }
                else
                {
                    if (file_exists("upload/" . $_FILES["imgInp"]["name"])) {
                        echo $_FILES["imgInp"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                }
                else
                {
                    $sourcePath = $_FILES['imgInp']['tmp_name']; // Storing source path of the file in a variable
                    $targetPath = "publicaciones/" . $_POST["idFichaPublicacion"] . "/" . $_FILES['imgInp']['name']; // Target path where file is to be stored
                    if (!file_exists("publicaciones/" . $_POST["idFichaPublicacion"] . "/")) {
                        mkdir("publicaciones/" . $_POST["idFichaPublicacion"] . "/", 0777, true);
                    }
                    move_uploaded_file($sourcePath, $targetPath) ; // Moving Uploaded file
                    $thumbPath = "thumbs/publicaciones/" . $_POST["idFichaPublicacion"] ."_" . $_FILES['imgInp']['name'];
                    make_thumb($targetPath, $thumbPath, "200");
                    echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                    echo "<br/><b>File Name:</b> " . $_FILES["imgInp"]["name"] . "<br>";
                    echo "<b>Type:</b> " . $_FILES["imgInp"]["type"] . "<br>";
                    echo "<b>Size:</b> " . ($_FILES["imgInp"]["size"] / 1024) . " kB<br>";
                    echo "<b>Temp file:</b> " . $_FILES["imgInp"]["tmp_name"] . "<br>";
                    
                }
            }
        }
        else
        {
            echo "<span id='invalid'>***Invalid file Size or Type***<span>";
        }
    } else {
        var_dump($_FILES);
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