<?php
    set_time_limit(300);
    ini_set('memory_limit', '512M');
    if(isset($_FILES["pdfInp"]["type"]))
    {
        $temporary = explode(".", $_FILES["pdfInp"]["name"]);
        $file_extension = end($temporary);
        if (($_FILES["pdfInp"]["type"] == "application/pdf")) {
                if ($_FILES["pdfInp"]["error"] > 0)
                {
                    echo "Return Code: " . $_FILES["pdfInp"]["error"] . "<br/><br/>";
                }
                else
                {
                    if (file_exists("upload/" . $_FILES["pdfInp"]["name"])) {
                        echo $_FILES["pdfInp"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
                }
                else
                {
                    $sourcePath = $_FILES['pdfInp']['tmp_name']; 
                    $targetPath = "libros/" . $_POST["idFichaLibro"] . "/" . $_FILES['pdfInp']['name']; 
                    if (!file_exists("libros/" . $_POST["idFichaLibro"] . "/")) {
                        mkdir("libros/" . $_POST["idFichaLibro"] . "/", 0777, true);
                    }
                    move_uploaded_file($sourcePath, $targetPath);
                    /*
                    echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
                    echo "<br/><b>File Name:</b> " . $_FILES["pdfInp"]["name"] . "<br>";
                    echo "<b>Type:</b> " . $_FILES["pdfInp"]["type"] . "<br>";
                    echo "<b>Size:</b> " . ($_FILES["pdfInp"]["size"] / 1024) . " kB<br>";
                    echo "<b>Temp file:</b> " . $_FILES["pdfInp"]["tmp_name"] . "<br>";
                    */
                    echo "OK";                   
                }
            }
        } else {
            echo "<span id='invalid'>***Invalid file Size or Type***<span>";
        }
    } else {
        var_dump($_FILES);
    }
?>