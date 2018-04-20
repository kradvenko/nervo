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
    <asp:ContentPlaceHolder ID="head" runat="server">
    </asp:ContentPlaceHolder>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-4">
                Paises
            </div>
            <div class="col-4">
                Estado/Región
            </div>
            <div class="col-4">
                Ciudad
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control"/>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary">Agregar país</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Lista de paises
                    </div>
                    <div class="col-6">
                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        Lista de paises
                    </div>
                    <div class="col-6">
                        
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="row">
                    <div class="col-6">
                        Elija un páis
                    </div>
                    <div class="col-6">
                        <select class="form-control">
                            <option>México</option>
                            <option>Chile</option>
                            <option>Francia</option>
                        </select>                    
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <input type="text" class="form-control"/>
                    </div>
                    <div class="col-6">
                        <button class="btn btn-primary">Agregar nuevo</button>
                    </div>
                </div>
            </div>
            <div class="col-4">
                
            </div>
        </div>
    </div>    
</body>
</html>