<?php
    $Categoria = $datos[0]['categoria'];
    $Descripcion = $datos[0]['descripcion'];
    $Id = $datos[0]['id_categoria'];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Jannete</title>
    <link rel="stylesheet" href="<?php echo base_url() ?>/Css/boost.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/Css/EstilosAgenda.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css"
        integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="<?php echo base_url()?>/"><i class="fas fa-heart"></i> Jannete Ramos Rios</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>/agenda">Agenda
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url()?>/categorias">Categorias</a>
                </li>
                <li class="nav-item">
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-11 mx-auto mt-3">
                <center>
                    <h3>Actualizar Categoria</h3>
                </center>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-11 mx-auto mt-3">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Actualiza Categorias</h5>
                            <a href="<?php echo base_url()?>/categorias" class="close" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </a>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="<?php echo base_url().'/actualizac'?>">
                                <div class="mb-3">
                                    <label for="id_categoria" class="form-label">id_categoria:</label>
                                    <input type="text" readonly class="form-control disable" id="id_categoria"
                                        name="id_categoria" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Categoria" class="form-label">Categoria:</label>
                                    <input type="text" class="form-control" id="Categoria" name="Categoria" required>
                                </div>
                                <div class="mb-3">
                                    <label for="Descripcion" class="form-label">Descripción:</label>
                                    <input type="text" class="form-control" id="Descripcion" name="Descripcion" required>
                                </div>
                                <input type="text" readonly name="Fecha" id="Fecha" style="display: none;">
                                <center>
                                    <button type="submit" class="btn btn-primary">Actualizar Categoria</button>
                                    <a href="<?php echo base_url()?>/categorias" class="btn btn-secondary">Cancelar</a>
                                </center>
                            </form>
                        </div>
                        <div class="modal-footer">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
    $(function() {
        $('#Categoria').val('<?php echo $Categoria?>');
        $('#Descripcion').val('<?php echo $Descripcion?>');
        $('#id_categoria').val('<?php echo $Id?>');
    })
    </script>
</body>

</html>