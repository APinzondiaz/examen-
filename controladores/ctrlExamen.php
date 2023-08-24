<?php
class ControladorExamen{
    //Función para recibir los datos para gurardar cliente
    public function crtlGuardarActores(){
        
        if (isset($_POST['nombres']) &&
            isset($_POST['sexo']) &&   
            isset($_POST['fecha_nacimiento']) &&       
            isset($_POST['email']) &&
            isset($_POST['origen'])){ 
                $tabla ="actores";
                $data = array('nombres' => $_POST['nombres'],    
                             'sexo' => $_POST['sexo'],
                             'fecha_nacimiento' => $_POST['fecha_nacimiento'],
                             'email' => $_POST['email'],
                             'origen' => $_POST['origen']);
                
                $res = ModeloExamen::mdlGuardarActores($tabla, $data);
                if($res == 'ok'){
                    echo '<script>
                    Swal.fire({
                        icon:"success",
                        title: "¡Datos de Actores guardados Correctamente...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "examen";
                        }
                    })
                  </script>';
                } else{
                    echo '<script>
                    Swal.fire({
                        icon:"error",
                        title: "¡Datos de produtos no se puden ser guardados...!",
                        showConfirmButton: true,
                        confirmButtonText: "Cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location= "examen";
                        }
                    })
                  </script>';

                }
            }
    }

    //Función para cargar datos del cliente
    public static function ctrlCargarActores($parametro, $id){
        $tabla = "actores";
        $datosActores = ModeloExamen::mdlCargarActores($tabla, $parametro, $id);
        return $datosActores;
    }
 
    

    //Función par actualizar datos
    public static function ctrlActualizarCliente(){
        if (isset($_POST['modificar_cedula']) &&
        isset($_POST['modificar_nombre']) &&
        isset($_POST['modificar_apellido']) &&
        isset($_POST['modificar_direccion']) &&
        isset($_POST['modificar_telefono']) &&
        isset($_POST['modificar_correo'])){
            $tabla ="cliente";
            $data = array('cedula' => $_POST['modificar_cedula'],
                         'nombre' => $_POST['modificar_nombre'],
                         'apellidos' => $_POST['modificar_apellido'],
                         'direccion' => $_POST['modificar_direccion'],
                         'telefono' => $_POST['modificar_telefono'],
                         'email' => $_POST['modificar_correo'],
                         'id_cliente' => $_POST['id']);
            $res = ModeloCliente::mdlActualizarCliente($tabla, $data);
            if($res == 'ok'){
                echo '<script>
                Swal.fire({
                    icon:"success",
                    title: "¡Datos de cliente actualizados Correctamente...!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "cliente";
                    }
                })
              </script>';
            } else{
                echo '<script>
                Swal.fire({
                    icon:"error",
                    title: "¡Datos de cliente no se puden ser actualizados...!",
                    showConfirmButton: true,
                    confirmButtonText: "Cerrar"
                }).then(function(result){
                    if(result.value){
                        window.location= "cliente";
                    }
                })
              </script>';
                                                     
            }
        }

    }

   public static function ctrlEliminarClientes($id) {
    
    $tabla = "cliente"; 
    $datosCliente = ModeloCliente::mdlEliminarCliente($tabla, $id);
    return $datosCliente;
   }
}

