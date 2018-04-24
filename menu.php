<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/nervo.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/nervo.js"></script>

    <title>Acervo artístico de Amado Nervo</title>
</head>
<body>
    <div class="container">
        <div class="row divBackgroundBlack">
            <div class="divLogo">

            </div>
        </div>        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navegación</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link mainMenuElement" href="menu.php">Menú principal</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mainMenuElement" href="localidades.php">Control de localidades</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link mainMenuElement" href="instituciones.php">Control de instituciones</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle mainMenuElement" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Fichas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item mainMenuElement" href="ficha_foto.php   ">Fotografías</a>
                    <a class="dropdown-item mainMenuElement" href="#">Libros</a>
                    <a class="dropdown-item mainMenuElement" href="#">Lugares</a>
                    </div>
                </li>
                </ul>
            </div>
        </nav>
    </div>
</body>
<script>
    $( document ).ready(function() {
        
    });    
</script>
</html>