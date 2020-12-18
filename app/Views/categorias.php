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
                    <a class="nav-link" href="<?php echo base_url()?>/">Categorias</a>
                </li>
                <li class="nav-item">
            </ul>
        </div>
    </nav>
    
    <div class="container">
        <div class="row">
            <div class="col-sm-11 mx-auto mt-3">
                <center>
                    <h3>Categorias</h3>
                </center>
                <!-- Button de la modal -->
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                    Nueva Categoria <i class="fas fa-folder-open"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-11 mx-auto mt-3">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered" id="Tabla">
                        <tr>
                            <th>Clave</th>
                            <th>Categoria</th>
                            <th>Descripción</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach($Datos as $Key): ?>
                        <tr>
                            <td><?php echo $Key->id_categoria ?></td>
                            <td><?php echo $Key->categoria ?></td>
                            <td><?php echo $Key->descripcion ?></td>
                            <td>
                                <a href="<?php echo base_url().'/getCategoria/'.$Key->id_categoria ?>"
                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'/eliminac/'.$Key->id_categoria ?>" class="btn btn-danger btn-sm"><i
                                        class="far fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Nueva Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url().'/nuevac'?>">
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
                            <button type="submit" class="btn btn-primary">Guardar Categoria</button>
                            <a href="<?php echo base_url()?>/categorias" class="btn btn-secondary">Cancelar</a>
                        </center>
                    </form>
                </div>
                <div class="modal-footer">
                    <span>...</span>
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

        $(function(){
            let hoy = new Date();
            let dia = hoy.getDate();
            let mes = hoy.getMonth()+1;
            let año = hoy.getFullYear();

            let fecha = año+"-"+mes+"-"+dia;
            $('#Fecha').val(fecha);
        });

    let mensaje = '<?php echo $Mensaje ?>';

    if (mensaje == 1) {
        swal(':3', 'Contacto Creado', 'success');
    } else if (mensaje == 2) {
        swal(':(', 'Error al crear', 'error');
    } else if (mensaje == 3) {
        swal('<3', 'Actualización Exitosa!', 'success');
    } else if (mensaje == 4) {
        swal(':(', 'Fallo Actualización', 'error');
    }else if (mensaje == 5) {
        swal(';)', 'Eliminación Exitosa!', 'success');
    } else if (mensaje == 6) {
        swal(':/', 'Eliminación Fallída', 'error');
    }
    </script>
</body>

</html>