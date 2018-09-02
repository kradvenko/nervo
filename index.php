<!DOCTYPE html>

<html>
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/login.css" />
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/nervo.js"></script>

    <title>Acervo artístico de Amado Nervo</title>
    <asp:ContentPlaceHolder ID="head" runat="server">
    </asp:ContentPlaceHolder>
</head>
<body>
    <div class="container">        
        <div class="row">
            <div class="col-4">
            </div>
            <div class="col-4">
                <div class="divLogin">
                    <div class="divLoginHeader">
                        Inicio de sesión
                    </div>
                    <div class="">
                        Usuario
                    </div>
                    <div class="">
                        <input type="text" id="tbUsuario" class="form-control"/>
                    </div>
                    <div class="">
                        Contraseña
                    </div>
                    <div class="">
                        <input type="password" id="tbPassword" class="form-control"/>
                    </div>
                </div>
            </div>
            <div class="col-4">
            </div>
        </div>
    </div>    
</body>
<script>
    $(document).ready(function() {
        $("#tbUsuario").keyup(function(event) {
            if (event.keyCode === 13) {
                userLogin();
            }
        });
        $("#tbPassword").keyup(function(event) {
            if (event.keyCode === 13) {
                userLogin();
            }
        });
        $("#tbUsuario").focus();
    });
</script>
</html>