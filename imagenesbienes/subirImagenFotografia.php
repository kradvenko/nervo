<?php
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
                    $targetPath = "fotografias/" . $_POST["idFichaFotografia"] . "/" . $_FILES['imgInp']['name']; // Target path where file is to be stored
                    if (!file_exists("fotografias/" . $_POST["idFichaFotografia"] . "/")) {
                        mkdir("fotografias/" . $_POST["idFichaFotografia"] . "/", 0777, true);
                    }
                    move_uploaded_file($sourcePath, $targetPath) ; // Moving Uploaded file
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
?>