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
                    <h3>Contactos</h3>
                </center>
                <!-- Button de la modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Agregar <i class="fas fa-user-plus"></i>
                </button>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-11 mx-auto mt-3">
                <div class="table table-responsive">
                    <table class="table table-hover table-bordered" id="Tabla">
                        <tr>
                            <th>Nombre(s)</th>
                            <th>Apellido Paterno</th>
                            <th>Apellido Materno</th>
                            <th>Categoria</th>
                            <th>Telefono</th>
                            <th>E-mail</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                        <?php foreach($Datos as $Key): ?>
                        <tr>
                            <td><?php echo $Key->nombre ?></td>
                            <td><?php echo $Key->paterno ?></td>
                            <td><?php echo $Key->materno ?></td>
                            <td><?php echo $Key->id_categoria ?></td>
                            <td><?php echo $Key->telefono ?></td>
                            <td><?php echo $Key->email ?></td>
                            <td>
                                <a href="<?php echo base_url().'/getNombre/'.$Key->id_contacto ?>"
                                    class="btn btn-warning btn-sm"><i class="fas fa-edit"></i>
                                </a>
                            </td>
                            <td>
                                <a href="<?php echo base_url().'/elimina/'.$Key->id_contacto ?>" class="btn btn-danger btn-sm"><i
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
                    <h5 class="modal-title" id="exampleModalLabel">Nuevo Contacto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="<?php echo base_url().'/nuevo'?>" id="Formulario">
                        <div class="mb-3">
                            <label for="Categoria" class="form-label">Categoria:</label>
                            <select name="Categoria" id="Categoria" required>
                                <option value="0" selected="true" disabled>Selecciona Una Categoria</option>
                                <?php foreach($Categorias as $Key): ?>
                                <option value="<?php echo $Key->id_categoria ?>"><?php echo $Key->categoria ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Nombre" class="form-label">Nombre (s):</label>
                            <input type="text" class="form-control" id="Nombre" name="Nombre" required>
                        </div>
                        <div class="mb-3">
                            <label for="AppP" class="form-label">Apellido Paterno:</label>
                            <input type="text" class="form-control" id="AppP" name="AppP" required>
                        </div>
                        <div class="mb-3">
                            <label for="AppM" class="form-label">Apellido Materno:</label>
                            <input type="text" class="form-control" id="AppM" name="AppM" required>
                        </div>
                        <div class="mb-3">
                            <label for="Telefono" class="form-label">Telefono:</label>
                            <input type="number" class="form-control" id="Telefono" name="Telefono" required>
                        </div>
                        <div class="mb-3">
                            <label for="Email" class="form-label">E-Mail:</label>
                            <input type="email" class="form-control" id="Email" name="Email" required>
                        </div>
                        <center>
                            <button type="submit" class="btn btn-primary" id="GC">Guardar Contacto</button>
                            <a href="<?php echo base_url()?>/agenda" class="btn btn-secondary">Cancelar</a>
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
            $('#GC').click(function(e){
                e.preventDefault();
                if($('#Categoria').val() == null){
                    swal(':(','Por Favor Selecciona Una Categoria Valida','error');
                }
                else if($('#Nombre').val() == "" ||$('#AppP').val() == "" || $('#AppM').val() == "" || $('#Telefono').val() == "" || $('#Email').val() == ""){
                    swal(':/','Por Favor Llena Todos Los Campos','error');
                }
                else{
                    $('#Formulario').submit();
                }
            })
        })
    </script>

    <script>
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