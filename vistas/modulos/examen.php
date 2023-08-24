<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Examen</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="inicio">Home</a></li>
                        <li class="breadcrumb-item active">Actores</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content 
    Modal para el ingresode clientes-->
    <section class="content">

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Actores</button>


            </div>
            <!-- modal para crear clientes -->
            <div class="card-body">
                <form method="POST">
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Añadir Actores</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="modal-body">

                                    <div class="input-group mb-">
                                        <input type="text" class="form-control" placeholder="Nombre" name="nombres" id="nombres" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Sexo" name="sexo" id="sexo" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" placeholder="Fecha Nacimiento" name="fecha_nacimiento" id="fecha_nacimiento" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-route"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Email" name="email" id="email" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Origen" name="origen" id="origen" required>
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Guardar </button>
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                    <?php
                                    $objUsuario = new ControladorExamen();
                                    $objUsuario->crtlGuardarActores();
                                    ?>
                                </div>
                            </div>

                        </div>

                    </div>
                </form>
            </div>
            <!-- /.Tabla de clientes -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Datos de Actores</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Email</th>
                                <th>Origen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $parametro = null;
                            $datosActores = ControladorExamen::ctrlCargarActores($parametro, 0);
                            foreach ($datosActores as $datos => $valor) {
                                echo "
                  <tr>
                    <td>" . $valor['id_actor'] . "</td>
                    <td>" . $valor["nombres"] . "</td>
                    <td>" . $valor["sexo"] . "</td>
                    <td>" . $valor["fecha_nacimiento"] . "</td>
                    <td>" . $valor["email"] . "</td>
                    <td>" . $valor["origen"] . "</td>
                    <td>
                        <div class='btn btn-group'>
                        <button class='btn btn-warning btnCargarDatos' idActores='" . $valor['id_actor'] . "'  data-toggle='modal' data-target='#modificar'><i class='fas fa-edit'></i></button>
                        <button class='btn btn-danger btnEliminarDatos' idActores='" . $valor['id_actor'] . "'><i class='fas fa-trash-alt '></i></button>
                        </div>
                    </td>
                  </tr>";
                            }
                            ?>

                            <?php ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>Id</th>
                                <th>Nombre</th>
                                <th>Sexo</th>
                                <th>Fecha Nacimiento</th>
                                <th>Email</th>
                                <th>Origen</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>

            <!-- /.card-footer-->
        </div>
        <!-- /.card -->

        <!-- modal para modificar clientes -->
        <div>
            <form method="POST">
                <div id="modificar" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Modificar Clientes</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>

                            </div>
                            <div class="modal-body">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Cédula de identidad" name="modificar_cedula" id="modificar_cedula" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Nombres completos" name="modificar_nombre" id="modificar_nombre" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Apelidos completos" name="modificar_apellido" id="modificar_apellido" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="Direccion" name="modificar_direccion" id="modificar_direccion" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-route"></i></span>
                                    </div>
                                    <input type="text" class="form-control" placeholder="Telefono" name="modificar_telefono" id="modificar_telefono" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                    </div>
                                </div>
                                <div class="input-group mb-3">
                                    <input type="email" class="form-control" placeholder="Email" name="modificar_correo" id="modificar_correo" required>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="id" id="id">
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <?php
                                #Código php para cagar datos al modal
                                $objUsuario->ctrlActualizarCliente();
                                ?>
                            </div>
                        </div>

                    </div>

                </div>
            </form>
        </div>

    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->